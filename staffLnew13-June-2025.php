<?php
// public/index.php

// Include database configuration
require_once __DIR__ . '/config/db.php';

// Define pagination constant
const ITEMS_PER_PAGE = 10;

// Initialize variables for selected department and current page
$selectedDepartmentId = filter_input(INPUT_GET, 'department_id', FILTER_VALIDATE_INT);
$currentPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

// Default to page 1 if not provided or invalid
if ($currentPage === false || $currentPage === null || $currentPage <= 0) {
    $currentPage = 1;
}

$departments = []; // Array to hold department data for dropdown
$staffData = [];   // Array to hold teaching staff data
$totalStaff = 0;   // Total staff count for pagination
$totalPages = 0;   // Total pages for pagination
$errorMessage = null; // Initialize error message

// --- Customizable Header Content ---
// We can replace this with your actual website's header HTML.
// For more complex headers, consider putting this into a separate file (e.g., 'templates/header.php')
// and using 'include __DIR__ . "/../templates/header.php";' instead.
$header_content = '
    <header class="bg-indigo-700 text-white p-4 shadow-md">
        <img src="images/RKDFU_Header.png" style="justify-self: anchor-center;"/>
        <div class="container mx-auto flex justify-between items-center">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="hover:text-indigo-200 transition-colors">Website Home</a></li>
                    <li><a href="contact-us.php" class="hover:text-indigo-200 transition-colors">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
';

// --- Customizable Footer Content ---
// We can replace this with your actual website's footer HTML.
// For more complex footers, consider putting this into a separate file (e.g., 'templates/footer.php')
// and using 'include __DIR__ . "/../templates/footer.php";' instead.
$footer_content = '
    <footer class="bg-gray-800 text-white p-6 mt-12 shadow-inner">
        <div class="container mx-auto text-center text-sm">
            <p>&copy; ' . date('Y') . ' RKDF University, Bhopal. All rights reserved.</p>
            <p class="mt-2">
                <a href="privacy.php" class="hover:text-gray-300 transition-colors">Privacy Policy</a> |
                <a href="terms&condition.php" class="hover:text-gray-300 transition-colors">Terms of Service</a>
            </p>
        </div>
    </footer>
';


/**
 * Builds a hierarchical list of departments for the dropdown,
 * adding indentation based on parent-child relationships.
 *
 * @param array $flatDepartments A flat array of department records from the database.
 * @param int $parentId The ID of the parent department to start building from (null for top-level).
 * @param int $level The current recursion level, used for indentation.
 * @param array $indexedDepartments An array to quickly lookup departments by ID.
 * @return array The sorted and indented list of departments.
 */
function buildDepartmentHierarchy(array $flatDepartments, $parentId = null, $level = 0, array &$indexedDepartments = []): array {
    $result = [];
    $indent = str_repeat('--- ', $level); // Indentation for sub-departments

    // Build an indexed array for quick lookup if not already built
    if (empty($indexedDepartments)) {
        foreach ($flatDepartments as $dept) {
            $indexedDepartments[$dept['id']] = $dept;
        }
    }

    foreach ($flatDepartments as $dept) {
        if (($dept['parent_department_id'] === null && $parentId === null) || ($dept['parent_department_id'] == $parentId)) {
            // Use 'display_name' for the <option> text
            $dept['display_name'] = $indent . htmlspecialchars($dept['name']);
            $result[] = $dept;

            // Recursively add children
            $children = buildDepartmentHierarchy($flatDepartments, $dept['id'], $level + 1, $indexedDepartments);
            $result = array_merge($result, $children);
        }
    }
    return $result;
}


try {
    $pdo = getDbConnection();

    // --- Fetch all active departments for the dropdown, including parent info ---
    // Join with universities to ensure only departments from active universities are shown.
    // Also join with departments again (aliased as pd) to get parent department names.
    $stmtDepartments = $pdo->prepare(
        "SELECT d.id, d.name, d.parent_department_id, pd.name AS parent_name, u.name AS university_name
         FROM departments d
         JOIN universities u ON d.university_id = u.id
         LEFT JOIN departments pd ON d.parent_department_id = pd.id AND pd.IsActive = 1
         WHERE d.IsActive = 1 AND u.IsActive = 1
         ORDER BY university_name ASC, d.name ASC"
    );
    $stmtDepartments->execute();
    $rawDepartments = $stmtDepartments->fetchAll(PDO::FETCH_ASSOC);

    // Build the hierarchical list for the dropdown
    // This will create a flat list with indentation in the 'display_name' key
    $departments = buildDepartmentHierarchy($rawDepartments);


    // --- Fetch active teaching staff if an active department is selected ---
    if ($selectedDepartmentId !== null && $selectedDepartmentId > 0) {
        $offset = ($currentPage - 1) * ITEMS_PER_PAGE;

        // Get total count of active teaching staff for the selected active department
        $countStmt = $pdo->prepare(
            "SELECT COUNT(*)
             FROM staff s
             JOIN departments d ON s.department_id = d.id
             JOIN universities u ON d.university_id = u.id
             WHERE s.department_id = :department_id
               AND s.is_teaching_staff = 1
               AND s.IsActive = 1
               AND d.IsActive = 1
               AND u.IsActive = 1"
        );
        $countStmt->bindParam(':department_id', $selectedDepartmentId, PDO::PARAM_INT);
        $countStmt->execute();
        $totalStaff = $countStmt->fetchColumn();

        $totalPages = ceil($totalStaff / ITEMS_PER_PAGE);

        // Ensure current page is not beyond total pages
        if ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
            $offset = ($currentPage - 1) * ITEMS_PER_PAGE;
        } elseif ($totalPages == 0) {
            $currentPage = 1; // No staff, reset page to 1
            $offset = 0;
        }

        // Fetch active teaching staff for the current page
        // MODIFIED: Added s.id, s.department_id, s.IsActive to the SELECT statement
        $stmtStaff = $pdo->prepare(
            "SELECT s.id, s.department_id, s.name, s.designation, s.subject_discipline, s.photo_url, s.profile_details, s.is_teaching_staff, s.IsActive, s.displayorder
             FROM staff s
             JOIN departments d ON s.department_id = d.id
             JOIN universities u ON d.university_id = u.id
             WHERE s.department_id = :department_id
               AND s.is_teaching_staff = 1
               AND s.IsActive = 1
               AND d.IsActive = 1
               AND u.IsActive = 1
             ORDER BY s.displayorder ASC
             LIMIT :limit OFFSET :offset"
        );
        $stmtStaff->bindParam(':department_id', $selectedDepartmentId, PDO::PARAM_INT);
        $stmtStaff->bindValue(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT); // Using bindValue for constants/non-references
        $stmtStaff->bindValue(':offset', $offset, PDO::PARAM_INT);       // Using bindValue for constants/non-references
        $stmtStaff->execute();
        $staffData = $stmtStaff->fetchAll(PDO::FETCH_ASSOC);

        // Add S.No. to each staff member
        $s_no_start = $offset + 1;
        foreach ($staffData as $key => &$member) {
            $member['s_no'] = $s_no_start + $key;
            // Convert boolean-like values to human-readable strings
            $member['is_teaching_staff_display'] = $member['is_teaching_staff'] == 1 ? 'Yes' : 'No';
            $member['IsActive_display'] = $member['IsActive'] == 1 ? 'Active' : 'Inactive';
        }
        unset($member); // Unset reference after loop
    }

} catch (PDOException $e) {
    // Log the error and display a user-friendly message
    error_log("Database error: " . $e->getMessage());
    $errorMessage = 'A database error occurred. Please try again later.';
    $departments = [];
    $staffData = [];
} catch (Exception $e) {
    error_log("General error: " . $e->getMessage());
    $errorMessage = 'An unexpected error occurred. Please try again later.';
    $departments = [];
    $staffData = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Staff Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Light gray background */
            display: flex; /* Flexbox for full page layout */
            flex-direction: column; /* Stack header, main, footer vertically */
            min-height: 100vh; /* Ensure full viewport height */
    }
        .container {
            max-width: 1024px;
            margin: 2rem auto;
            padding: 1.5rem;
            /* background-color: #ffffff; */
            border-radius: 0.75rem; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex-grow: 1; /* Allows main content to take available space */
        }
        select, button {
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }
        select {
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            color: #374151;
        }
        button {
            background-color: #4f46e5; /* Indigo */
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover:not(:disabled) {
            background-color: #4338ca; /* Darker indigo */
            transform: translateY(-1px);
        }
        button:disabled {
            background-color: #9ca3af; /* Gray */
            cursor: not-allowed;
        }
        table {
            width: 100%;
            border-collapse: separate; /* For rounded corners on cells */
            border-spacing: 0; /* Remove default spacing */
            margin-top: 1.5rem;
            overflow: hidden; /* Ensures rounded corners are visible */
            border-radius: 0.75rem;
            font-size: small;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb; /* Light gray border */
        }
        th {
            background-color: #edf2f7; /* Lighter gray for header */
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
            font-size: 0.875rem;
        }
        tr:last-child td {
            border-bottom: none; /* No border on last row */
        }
        tr:nth-child(even) {
            background-color: #f9fafb; /* Zebra striping */
        }
        .staff-photo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 9999px; /* Full circle */
            border: 2px solid #e0e7ff; /* Light blue border */
        }
        .profile-link {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }
        .profile-link:hover {
            text-decoration: underline;
        }
        .message-box {
            background-color: #fefcbf; /* Yellowish background */
            color: #92400e; /* Darker yellow text */
            padding: 1rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            border: 1px solid #fde68a;
            display: none; /* Hidden by default, shown by JS */
        }
        /* Style for displaying the current page and total pages */
        .page-info {
            font-weight: 500;
            color: #4a5568;
            margin: 0 1rem;
        }

        a {
            text-decoration: inherit;
        }
    </style>
</head>
<body>
    <?php echo $header_content; // Display the header ?>

    <div class="container">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">University Staff Directory</h1>

        <?php if (isset($errorMessage)): ?>
            <div id="messageBox" class="message-box bg-red-100 text-red-700 border-red-400" style="display: block;">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php else: ?>
            <div id="messageBox" class="message-box"></div>
        <?php endif; ?>

        <form action="staffLnew.php" method="GET" class="mb-6 flex items-center space-x-4">
            <label for="departmentSelect" class="text-gray-700 font-medium">Select Department:</label>
            <select id="departmentSelect" name="department_id" class="flex-grow rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">-- Select Department --</option>
                <?php foreach ($departments as $department): ?>
                    <option value="<?php echo htmlspecialchars($department['id']); ?>"
                        <?php echo ($selectedDepartmentId == $department['id']) ? 'selected' : ''; ?>>
                        <?php echo $department['display_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-sm">
                View Staff
            </button>
        </form>

        <div id="staffList" class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Teaching Staff</h2>
            <div class="overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <!-- <th>Staff ID</th>
                            <th>Dept. ID</th> -->
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Subject/Discipline</th>
                            <th>Photo</th>
                            <!-- <th>Profile Details</th> 
                            <th>Teaching Staff</th>
                            <th>Active</th> -->
                        </tr>
                    </thead>
                    <tbody id="staffTableBody">
                        <?php
                        // Determine the number of columns for colspan for empty states
                        // S.No (1) + Staff ID (1) + Dept. ID (1) + Name (1) + Designation (1) + Subject (1) + Photo (1) + Profile (1) + Teaching Staff (1) + Active (1) = 10 columns
                        $colspan = 10;
                        ?>
                        <?php if ($selectedDepartmentId === null || $selectedDepartmentId <= 0): ?>
                            <tr><td colspan="<?php echo $colspan; ?>" class="text-center text-gray-500 py-4">Please select a department to view staff.</td></tr>
                        <?php elseif (empty($staffData)): ?>
                            <tr><td colspan="<?php echo $colspan; ?>" class="text-center text-gray-500 py-4">No teaching staff found for this department.</td></tr>
                        <?php else: ?>
                            <?php foreach ($staffData as $member): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($member['s_no']); ?></td>
                                    <td><?php echo htmlspecialchars($member['name']); ?></td>
                                    <td><?php echo htmlspecialchars($member['designation']); ?></td>
                                    <td><?php echo htmlspecialchars($member['subject_discipline']); ?></td>
                                    <td>
                                        <?php if (!empty($member['photo_url'])): ?>
                                            <img src="images/Staff_Photos/Nursing/<?php echo htmlspecialchars($member['photo_url']); ?>" alt="Photo of <?php echo htmlspecialchars($member['name']); ?>" class="staff-photo" onerror="this.onerror=null;this.src='';">
                                        <?php else: ?>
                                            
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td>
                                        <?php if (!empty($member['profile_details'])): ?>
                                            <?php
                                                // Check if profile_details is a valid URL
                                                // https://rkdfu.org/Content/Documents/Research_Supervisors/DR%20SOHAIL%20BUX.pdf
                                                $profileUrl = filter_var("https://rkdfu.org/Content/Documents/Research_Supervisors/" . $member['profile_details'], FILTER_VALIDATE_URL);

                                                if ($profileUrl):
                                            ?>
                                                <a href="https://rkdfu.org/Content/Documents/Research_Supervisors/<?php echo htmlspecialchars($profileUrl); ?>" target="_blank" class="profile-link">View Profile</a>
                                            <?php else: ?>
                                                <a href="https://rkdfu.org/Content/Documents/Research_Supervisors/<?php echo htmlspecialchars($member['profile_details']); ?>" target="_blank" class="profile-link">View Profile</a>
                                                <?php echo htmlspecialchars($member['profile_details']); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            
                                        <?php endif; ?>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="navigation flex justify-center items-center space-x-4 mt-6">
                <?php
                    // Calculate Previous Page URL
                    $prevPageUrl = null;
                    if ($currentPage > 1) {
                        $prevPageUrl = 'staffLnew.php?department_id=' . htmlspecialchars($selectedDepartmentId) . '&page=' . ($currentPage - 1);
                    } else {
                        // If on first page and "Previous" is clicked, go to home (no department selected state)
                        // For "home page" behavior:
                        // $prevPageUrl = 'index.php';
                    }

                    // Calculate Next Page URL
                    $nextPageUrl = null;
                    if ($currentPage < $totalPages) {
                        $nextPageUrl = 'staffLnew.php?department_id=' . htmlspecialchars($selectedDepartmentId) . '&page=' . ($currentPage + 1);
                    } else {
                        // If on last page and "Next" is clicked, go to home (no department selected state)
                        // For "home page" behavior:
                        // $nextPageUrl = 'index.php';
                    }
                ?>
                <button
                    <?php if ($prevPageUrl === null || $selectedDepartmentId === null): ?>disabled<?php endif; ?>
                    onclick="window.location.href='<?php echo ($prevPageUrl !== null) ? htmlspecialchars($prevPageUrl) : 'index.php'; ?>'"
                    class="prev-btn bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-sm"
                >
                    Previous
                </button>

                <?php if ($selectedDepartmentId !== null && $selectedDepartmentId > 0 && $totalPages > 0): ?>
                    <span class="page-info">Page <?php echo htmlspecialchars($currentPage); ?> of <?php echo htmlspecialchars($totalPages); ?></span>
                <?php endif; ?>

                <button
                    <?php if ($nextPageUrl === null || $selectedDepartmentId === null): ?>disabled<?php endif; ?>
                    onclick="window.location.href='<?php echo ($nextPageUrl !== null) ? htmlspecialchars($nextPageUrl) : 'index.php'; ?>'"
                    class="next-btn bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-sm"
                >
                    Next
                </button>
            </div>
            <p class="text-center text-gray-500 text-sm mt-4">
                <?php if ($selectedDepartmentId !== null && $selectedDepartmentId > 0): ?>
                    <!-- Total active teaching staff in this department: <?php echo htmlspecialchars($totalStaff); ?> -->
                <?php endif; ?>
            </p>
        </div>
    </div>

        <?php echo $footer_content; // Display the footer ?>

    <script>
        // Optional: JavaScript for handling dropdown change without requiring a separate "View Staff" button click
        // This will automatically submit the form when the department selection changes.
        document.getElementById('departmentSelect').addEventListener('change', function() {
            this.form.submit();
        });

        // Small JS snippet to handle the "home page" logic for prev/next buttons
        // if they are clicked when disabled (which should trigger a page reset)
        document.getElementById('prevBtn').addEventListener('click', function(event) {
            // Check if button is truly disabled based on PHP state and we are on the first page
            if (this.disabled && <?php echo ($selectedDepartmentId !== null && $currentPage === 1) ? 'true' : 'false'; ?>) {
                event.preventDefault(); // Prevent default button action
                window.location.href = 'index.php'; // Go to home page
            }
        });

        document.getElementById('nextBtn').addEventListener('click', function(event) {
            // Check if button is truly disabled based on PHP state and we are on the last page
            if (this.disabled && <?php echo ($selectedDepartmentId !== null && $currentPage >= $totalPages) ? 'true' : 'false'; ?>) {
                event.preventDefault(); // Prevent default button action
                window.location.href = 'index.php'; // Go to home page
            }
        });
    </script>
</body>
</html>
