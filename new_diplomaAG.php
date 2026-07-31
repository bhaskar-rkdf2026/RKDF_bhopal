<?php
// Start the session. This should be at the very top of your PHP script.
// In a production environment, ensure session parameters are configured securely
// in php.ini (e.g., session.cookie_httponly = 1, session.cookie_secure = 1, session.cookie_samesite = "Lax")
// or via session_set_cookie_params() before session_start().
session_start();

// --- Configuration ---
// IMPORTANT: In a real production environment, these credentials should NOT be hardcoded.
// Use environment variables (e.g., $_ENV, getenv()), a dedicated configuration file
// outside the web root, or a secrets management service.
define('DB_HOST', 'localhost');
define('DB_USER', 'rkdfu_rkdfresults');     // Replace with your actual database user
define('DB_PASS', 'CcW6JcDUF-Sl');         // Replace with your actual database password
define('DB_NAME', 'rkdfu_rkdf_results');    // Replace with your actual database name

// Define constants for image paths. This improves maintainability and readability.
define('BASE_IMAGE_PATH', 'images/'); // Assuming images are in ../images/ relative to this file
define('LOGO_IMAGE_PATH', 'RKDF_LOGO2.png'); // Assuming this is in the same directory as diplomaAG.php
define('BACKGROUND_IMAGE_PATH', 'logobg_2.png'); // Assuming this is in the same directory as diplomaAG.php

// --- Error Handling Setup ---
// In production, display_errors should be 'Off' in php.ini.
// Errors should be logged to a file for security and debugging.
// ini_set('display_errors', 'Off');
// ini_set('log_errors', 'On');
// ini_set('error_log', 'php_error.log'); // IMPORTANT: Set a real path to your log file

// Function to handle critical errors gracefully without exposing details
function handleCriticalError($message, $redirectPage = 'new_diplomaAG_result.php?err=server_error') {
    error_log("<br>" . "CRITICAL ERROR: First call to - new_diplomaAG_result.php - " . $message); // Log the detailed error
    // Redirect to a generic error page or the login page with a generic error code
    header("Location: " . $redirectPage);
    exit(); // Terminate script execution
}

$rno=$_REQUEST["rno"];
$rno = trim($_POST["rno"]);
$_SESSION['xrno'] = $rno;

// --- Session Validation ---
// Ensure the roll number is set in the session.
if (!isset($_SESSION['xrno']) || empty($_SESSION['xrno'])) {
    // If not set, redirect to the login/result page with an error.
    handleCriticalError("Session roll number not found or empty.", "new_diplomaAG_result.php?err=session_expired");
}

// Sanitize the session roll number for database query
$xrno = htmlspecialchars($_SESSION['xrno'], ENT_QUOTES, 'UTF-8');

// --- Database Connection (using mysqli) ---
// Create a new mysqli connection object.
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check for connection errors.
if ($mysqli->connect_error) {
    handleCriticalError("Database connection failed: " . $mysqli->connect_error);
}

// --- Prepared Statement to Prevent SQL Injection ---
// Prepare the SQL query. Use '?' as a placeholder for the roll number.
$query = "SELECT * FROM diploamag_result_1 WHERE rollno = ?";

// Prepare the statement.
$stmt = $mysqli->prepare($query);

// Check if the statement preparation was successful.
if (false === $stmt) {
    handleCriticalError("Failed to prepare statement: " . $mysqli->error);
}

// Bind parameters. 's' indicates the parameter is a string.
$stmt->bind_param("s", $xrno);

// Execute the prepared statement.
if (!$stmt->execute()) {
    handleCriticalError("Statement execution failed: " . $stmt->error);
}

// Get the result set from the executed statement.
$result = $stmt->get_result();

// Fetch the row.
// We expect only one row for a unique roll number.
$row = $result->fetch_assoc(); // Use fetch_assoc() for associative array

// Close the statement and connection as we've fetched the data.
$stmt->close();
$mysqli->close();

// Check if a result was found for the roll number.
if (!$row) {
    // If no result found, redirect back to the result page with an error.
    handleCriticalError("No result found for roll number: " . $xrno, "diplomaAG_result.php?err=no_result");
}

// --- Data Extraction and Sanitization for Display ---
// Extract data from the fetched row and sanitize it using htmlspecialchars()
// to prevent XSS vulnerabilities when displaying on the page.
$rno            = htmlspecialchars($row["rollno"] ?? '', ENT_QUOTES, 'UTF-8');
$name           = htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8');
$fname          = htmlspecialchars($row["fname"] ?? '', ENT_QUOTES, 'UTF-8');
$theory1        = htmlspecialchars($row["theory1"] ?? '', ENT_QUOTES, 'UTF-8');
$sessional1     = htmlspecialchars($row["sessional1"] ?? '', ENT_QUOTES, 'UTF-8');
$total1         = htmlspecialchars($row["total1"] ?? '', ENT_QUOTES, 'UTF-8');
$theory2        = htmlspecialchars($row["theory2"] ?? '', ENT_QUOTES, 'UTF-8');
$sessional2     = htmlspecialchars($row["sessional2"] ?? '', ENT_QUOTES, 'UTF-8');
$total2         = htmlspecialchars($row["total2"] ?? '', ENT_QUOTES, 'UTF-8');
$practical1     = htmlspecialchars($row["practical1"] ?? '', ENT_QUOTES, 'UTF-8');
$practical2     = htmlspecialchars($row["practical2"] ?? '', ENT_QUOTES, 'UTF-8');
$practicaltotal = htmlspecialchars($row["practicaltotal"] ?? '', ENT_QUOTES, 'UTF-8');
$viva1          = htmlspecialchars($row["viva1"] ?? '', ENT_QUOTES, 'UTF-8');
$viva2          = htmlspecialchars($row["viva2"] ?? '', ENT_QUOTES, 'UTF-8');
$vivatotal      = htmlspecialchars($row["vivatotal"] ?? '', ENT_QUOTES, 'UTF-8');
$totalfig       = htmlspecialchars($row["totalfig"] ?? '', ENT_QUOTES, 'UTF-8');
$totalword      = htmlspecialchars($row["totalword"] ?? '', ENT_QUOTES, 'UTF-8');
$fresult        = htmlspecialchars($row["result"] ?? '', ENT_QUOTES, 'UTF-8');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diploma AG - Result - RKDF University, Bhopal</title>
    <style type="text/css">
    body {
        font-family: 'Inter', Arial, Helvetica, sans-serif;
        background-color: #E6E9D1;
        /* Original background color */
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        /* Align to top */
        min-height: 100vh;
    }

    .result-container {
        background-color: #FFFFFF;
        /* White background for the content area */
        border: 1px solid #ccc;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        /* Enhanced shadow */
        border-radius: 10px;
        /* Rounded corners */
        padding: 25px;
        max-width: 900px;
        /* Max width for readability */
        width: 100%;
        box-sizing: border-box;
        /* Include padding in width */
        overflow: hidden;
        /* Ensure content stays within bounds */
    }

    .bg {
        background-image: url('<?php echo BACKGROUND_IMAGE_PATH; ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: scroll;
        background-size: cover;
        /* Ensure background image covers the area */
        border-collapse: collapse;
        /* Remove table cell spacing */
        width: 100%;
    }

    .style8 {
        font-size: 35px;
        font-weight: bold;
        color: #333;
        /* Darker color for better contrast */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .style1 {
        font-size: 24px;
        font-weight: bold;
        color: #555;
    }

    .style7 {
        /* Assuming style7 was intended for color/style */
        color: #880000;
        /* Example color for emphasis */
    }

    .style9 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #666;
        font-size: 16px;
        /* Adjusted for readability */
    }

    .fonttb {
        font-size: 15px;
        padding: 8px 10px;
        /* Add padding to table cells */
        border: 1px solid #ddd;
        /* Lighter border for tables */
        text-align: left;
        /* Default text alignment */
    }

    .fonttb strong {
        color: #333;
        /* Darker text for strong elements */
    }

    .style10 {
        font-size: 15px;
        font-weight: bold;
        padding: 8px 10px;
        border: 1px solid #ddd;
        text-align: center;
        /* Centered for headers */
        background-color: #f0f0f0;
        /* Light background for header cells */
    }

    /* Specific table styling for marks sheet */
    .marks-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .marks-table th,
    .marks-table td {
        border: 1px solid #ccc;
        /* Consistent borders */
        padding: 10px;
        text-align: center;
    }

    .marks-table th {
        background-color: #e0e0e0;
        font-weight: bold;
    }

    .note-section {
        margin-top: 20px;
        padding: 10px;
        border: 1px dashed #999;
        background-color: #f9f9f9;
        color: #777;
        font-size: 14px;
        text-align: center;
        border-radius: 5px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .result-container {
            padding: 15px;
        }

        .style8 {
            font-size: 28px;
        }

        .style1 {
            font-size: 20px;
        }

        .fonttb,
        .style10 {
            font-size: 13px;
            padding: 6px 8px;
        }

        .header-logo {
            width: 80px;
            /* Smaller logo for mobile */
            height: auto;
        }

        .marks-table,
        .marks-table tbody,
        .marks-table tr,
        .marks-table td {
            display: block;
            /* Stack table cells on small screens */
            width: 100%;
        }

        .marks-table tr {
            margin-bottom: 15px;
            border: 1px solid #eee;
            display: flex;
            flex-wrap: wrap;
        }

        .marks-table td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            /* Space for pseudo-element labels */
            text-align: right;
        }

        .marks-table td:before {
            content: attr(data-label);
            /* Use data-label for mobile headers */
            position: absolute;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
            color: #555;
        }

        /* Hide original table headers on mobile */
        .marks-table thead {
            display: none;
        }

        /* Specific adjustments for marks table layout on small screens */
        .marks-table tr td:nth-child(1) {
            /* Subject Code */
            width: 100%;
            text-align: center;
            font-weight: bold;
            background-color: #f9f9f9;
            border-bottom: 2px solid #ddd;
        }

        .marks-table tr td:nth-child(2) {
            /* Title of Paper */
            width: 100%;
            text-align: center;
            font-weight: bold;
        }
    }
    </style>
</head>

<body>
    <div class="result-container">
        <table class="bg" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="18%" rowspan="3"><img src="images/RKDF_LOGO2.png" width="118" height="160"
                        alt="RKDF University Logo" class="header-logo" /></td>
                <td height="75" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span></td>
            </tr>
            <tr>
                <td height="48" colspan="2" align="center"><span class="style9">&quot;Established under M.P. Govt. Act
                        and Registered with UGC under Act2(f) 1956&quot;</span></td>
            </tr>
            <tr>
                <td height="57" colspan="2" align="center"><span class="style1 style7">STATEMENT OF MARKS MAY-2025</span></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="98%" cellpadding="0" cellspacing="0" border="1" class="marks-info-table">
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="34%" height="24" class="fonttb"><strong>ROLL NO. : </strong></td>
                            <td width="39%" class="fonttb"><strong><?php echo $rno; ?> </strong></td>
                            <td width="14%" class="fonttb">
                                <div align="left"><strong>STATUS :</strong></div>
                            </td>
                            <td width="13%" class="fonttb">
                                <div align="left"><strong>Regular</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="34%" height="25" class="fonttb"><strong>NAME OF STUDENT : </strong></td>
                            <td width="39%" class="fonttb"><strong><?php echo $name; ?> </strong></td>
                            <td width="14%" class="fonttb">&nbsp;</td>
                            <td width="13%" class="fonttb">&nbsp;</td>
                        </tr>

                        <tr>
                            <td height="21" class="fonttb"><strong>FATHER'S/HUSBAND NAME: </strong></td>
                            <td colspan="3" class="fonttb"><strong><?php echo $fname; ?> </strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="25" colspan="3" align="center"><strong>DIPLOMA IN AGRICULTURE </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="marks-table" border="1" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="11%" rowspan="2" class="fonttb">SUBJECT CODE</th>
                                <th width="25%" rowspan="2" class="style10">TITLE OF PAPER</th>
                                <th height="26" colspan="3" class="style10">MAXIMUM MARKS</th>
                                <th colspan="3" class="style10">MARKS OBTAINED</th>
                            </tr>
                            <tr>
                                <th width="10%" height="51" class="style10">FINAL EXAM</th>
                                <th width="13%" class="style10">SESSIONAL</th>
                                <th width="10%" class="style10">TOTAL MARKS</th>
                                <th width="8%" class="style10">FINAL EXAM</th>
                                <th width="13%" class="style10">SESSIONAL</th>
                                <th width="10%" class="style10">TOTAL MARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="49" class="fonttb" colspan="8">
                                    <div align="center">MANAGEMENT FOR INPUT DEALERS (PESTICIDES & FERTILIZERS) IN
                                        AGRICULTURE EXTENSION SERVICES</div>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="4" class="fonttb">
                                    <div align="center"><strong>DAG - 101</strong></div>
                                </td>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(A)PLANT PROTECTION AND PESTICIDE MANAGEMENT </strong>
                                    </div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>25</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>25</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>50</strong></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $theory1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $sessional1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $total1; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(B)SOIL FERTILITY AND FERTILIZER MANAGEMENT </strong>
                                    </div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>25</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>25</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>50</strong></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $theory2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $sessional2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $total2; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(C)PRACTICAL &amp; FIELD VISIT </strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>20</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>20</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>40</strong></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practical1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practical2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practicaltotal; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(D) VIVA </strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>05</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>05</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>10</strong></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $viva1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $viva2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $vivatotal; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="46" class="fonttb">
                                    <div align="center"></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>TOTAL</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"><strong>150</strong></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"></div>
                                </td>
                                <td class="fonttb">
                                    <div align="center"></div>
                                </td>
                                <td class="style10">
                                    <div align="center"><?php echo $totalfig; ?></div>
                                </td>
                            </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="87%" height="56" border="1" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="249" class="fonttb">
                                <div align="right"><strong>OBTAINED MARKS IN WORDS : </strong></div>
                            </td>
                            <td width="311" height="25" class="fonttb"><strong>&nbsp; <?php echo $totalword; ?></strong>
                            </td>
                        </tr>

                        <tr>
                            <td height="29" class="fonttb">
                                <div align="right"><strong>RESULT : </strong></div>
                            </td>
                            <td colspan="2" class="fonttb"><strong> &nbsp; <?php echo $fresult; ?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="81%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><strong>NOTE:-</strong> This is a Computer Generated Statement Should Not Be Treated As Original*
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
</body>

</html>