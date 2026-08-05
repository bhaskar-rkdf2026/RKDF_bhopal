<?php
// ============================================================
// RKDF University — University Staff Directory
// World-Class Premium Design + High-Res Media Assets + 100% Dynamic DB Logic & Hierarchy Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
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

/**
 * Builds a hierarchical list of departments for the dropdown
 */
function buildDepartmentHierarchy(array $flatDepartments, $parentId = null, $level = 0, array &$indexedDepartments = []): array {
    $result = [];
    $indent = str_repeat('--- ', $level);

    if (empty($indexedDepartments)) {
        foreach ($flatDepartments as $dept) {
            $indexedDepartments[$dept['id']] = $dept;
        }
    }

    foreach ($flatDepartments as $dept) {
        if (($dept['parent_department_id'] === null && $parentId === null) || ($dept['parent_department_id'] == $parentId)) {
            $dept['display_name'] = $indent . htmlspecialchars($dept['name']);
            $result[] = $dept;
            $children = buildDepartmentHierarchy($flatDepartments, $dept['id'], $level + 1, $indexedDepartments);
            $result = array_merge($result, $children);
        }
    }
    return $result;
}

try {
    $pdo = getDbConnection();

    // Fetch active departments for dropdown
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
    $departments = buildDepartmentHierarchy($rawDepartments);

    // Fetch active teaching staff if department is selected
    if ($selectedDepartmentId !== null && $selectedDepartmentId > 0) {
        $offset = ($currentPage - 1) * ITEMS_PER_PAGE;

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

        if ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
            $offset = ($currentPage - 1) * ITEMS_PER_PAGE;
        } elseif ($totalPages == 0) {
            $currentPage = 1;
            $offset = 0;
        }

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
        $stmtStaff->bindValue(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $stmtStaff->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmtStaff->execute();
        $staffData = $stmtStaff->fetchAll(PDO::FETCH_ASSOC);

        $s_no_start = $offset + 1;
        foreach ($staffData as $key => &$member) {
            $member['s_no'] = $s_no_start + $key;
        }
        unset($member);
    }

} catch (PDOException $e) {
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
  <title>University Staff Directory — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/ai_staff/rkdf_staff_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .stf-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .stf-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .stf-grid-layout { grid-template-columns: 1fr; }
    }

    .stf-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .stf-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .stf-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .stf-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .stf-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .stf-card-body {
      padding: 32px 36px;
    }

    /* Filter Bar */
    .filter-bar {
      display: flex;
      gap: 16px;
      align-items: center;
      margin-bottom: 28px;
      background: #FAF9F5;
      padding: 18px 24px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.07);
    }
    @media (max-width: 600px) {
      .filter-bar { flex-direction: column; align-items: stretch; }
    }

    .filter-select {
      flex: 1;
      padding: 12px 18px;
      border-radius: 10px;
      border: 1px solid rgba(12, 20, 36, 0.15);
      background: #ffffff;
      font-size: 14.5px;
      color: #0C1424;
      font-weight: 600;
      outline: none;
    }
    .filter-btn {
      padding: 12px 26px;
      background: #0C1424;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.25s ease;
    }
    .filter-btn:hover {
      background: #E31B23;
    }

    /* Staff Table */
    .stf-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .stf-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 14px 18px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .stf-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .stf-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .staff-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #C5A059;
    }

    /* Pagination */
    .pagination-box {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 18px;
      margin-top: 28px;
    }
    .pg-btn {
      padding: 10px 22px;
      border-radius: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .pg-btn.active-btn {
      background: #0C1424;
      color: #ffffff;
    }
    .pg-btn.active-btn:hover {
      background: #E31B23;
    }
    .pg-btn.disabled-btn {
      background: #E2E8F0;
      color: #94A3B8;
      cursor: not-allowed;
      pointer-events: none;
    }

    /* Sidebar Links */
    aside {
      position: sticky;
      top: 100px;
    }

    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
    }

    .sidebar-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      padding-bottom: 14px;
      border-bottom: 2px solid #E31B23;
      margin-bottom: 20px;
    }

    .sidebar-nav-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .sidebar-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      border-radius: 8px;
      color: #334155;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.05);
      transition: all 0.25s ease;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
      background: #0C1424;
      color: #ffffff !important;
      border-color: #0C1424;
      transform: translateX(4px);
    }
    .sidebar-link.active {
      background: #E31B23;
      border-color: #E31B23;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">46 · FACULTY &amp; STAFF DIRECTORY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">University Staff Directory</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Explore faculty profiles, academic designations, subject disciplines, and department teaching staff across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="stf-main-section">
    <div class="rk-container">
      <div class="stf-grid-layout">
        
        <!-- LEFT COLUMN: DEPARTMENT FILTER & STAFF TABLE -->
        <div>

          <article class="stf-block-card">
            <div class="stf-card-header">
              <h2 class="stf-card-title">Teaching Staff Directory</h2>
              <span class="stf-badge">FACULTY &amp; ACADEMICS</span>
            </div>
            <div class="stf-card-body">

              <?php if (isset($errorMessage)): ?>
                <div style="background:#FEE2E2;border:1px solid #FCA5A5;color:#991B1B;padding:16px 20px;border-radius:10px;margin-bottom:24px;font-weight:600;">
                  <?php echo htmlspecialchars($errorMessage); ?>
                </div>
              <?php endif; ?>

              <!-- DEPARTMENT SELECTOR -->
              <form action="staffLnew.php" method="GET" class="filter-bar">
                <label for="departmentSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">Select Department:</label>
                <select id="departmentSelect" name="department_id" class="filter-select">
                  <option value="">-- Select Department --</option>
                  <?php foreach ($departments as $department): ?>
                    <option value="<?php echo htmlspecialchars($department['id']); ?>" <?php echo ($selectedDepartmentId == $department['id']) ? 'selected' : ''; ?>>
                      <?php echo $department['display_name']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="filter-btn">View Staff</button>
              </form>

              <!-- STAFF TABLE -->
              <div style="overflow-x:auto;">
                <table class="stf-table">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Photo</th>
                      <th>Faculty Name</th>
                      <th>Designation</th>
                      <th>Subject / Discipline</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($selectedDepartmentId === null || $selectedDepartmentId <= 0): ?>
                      <tr>
                        <td colspan="5" style="text-align:center;padding:36px;color:#64748B;font-weight:600;">
                          Please select a department from the dropdown above to view teaching staff.
                        </td>
                      </tr>
                    <?php elseif (empty($staffData)): ?>
                      <tr>
                        <td colspan="5" style="text-align:center;padding:36px;color:#64748B;font-weight:600;">
                          No active teaching staff members found for the selected department.
                        </td>
                      </tr>
                    <?php else: ?>
                      <?php foreach ($staffData as $member): ?>
                        <tr>
                          <td style="font-family:'JetBrains Mono',monospace;font-weight:700;color:#C5A059;"><?php echo htmlspecialchars($member['s_no']); ?></td>
                          <td>
                            <?php if (!empty($member['photo_url'])): ?>
                              <img src="images/Staff_Photos/<?php echo htmlspecialchars($member['photo_url']); ?>" alt="Photo of <?php echo htmlspecialchars($member['name']); ?>" class="staff-avatar" onerror="this.onerror=null;this.src='images/lovable/rkdf-student-2.jpg';">
                            <?php else: ?>
                              <img src="images/lovable/rkdf-student-2.jpg" alt="Default Avatar" class="staff-avatar">
                            <?php endif; ?>
                          </td>
                          <td style="font-weight:700;color:#0C1424;"><?php echo htmlspecialchars($member['name']); ?></td>
                          <td style="color:#475569;"><?php echo htmlspecialchars($member['designation']); ?></td>
                          <td style="color:#E31B23;font-weight:600;"><?php echo htmlspecialchars($member['subject_discipline']); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- PAGINATION -->
              <?php if ($selectedDepartmentId !== null && $selectedDepartmentId > 0 && $totalPages > 0): ?>
                <div class="pagination-box">
                  <?php if ($currentPage > 1): ?>
                    <a href="staffLnew.php?department_id=<?php echo htmlspecialchars($selectedDepartmentId); ?>&amp;page=<?php echo ($currentPage - 1); ?>" class="pg-btn active-btn">← Previous</a>
                  <?php else: ?>
                    <span class="pg-btn disabled-btn">← Previous</span>
                  <?php endif; ?>

                  <span style="font-family:'JetBrains Mono',monospace;font-size:13.5px;font-weight:600;color:#0C1424;">
                    Page <?php echo htmlspecialchars($currentPage); ?> of <?php echo htmlspecialchars($totalPages); ?>
                  </span>

                  <?php if ($currentPage < $totalPages): ?>
                    <a href="staffLnew.php?department_id=<?php echo htmlspecialchars($selectedDepartmentId); ?>&amp;page=<?php echo ($currentPage + 1); ?>" class="pg-btn active-btn">Next →</a>
                  <?php else: ?>
                    <span class="pg-btn disabled-btn">Next →</span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Faculty &amp; Staff Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="staffLnew.php" class="sidebar-link active">Staff Directory <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabi <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Feedback_Analysis.php" class="sidebar-link">Feedback &amp; Analysis <span>→</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <script>
    document.getElementById('departmentSelect').addEventListener('change', function() {
      this.form.submit();
    });
  </script>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
