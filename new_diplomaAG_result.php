<?php
// Start the session. This should be at the very top of your PHP script.
// In a production environment, consider configuring session parameters
// in php.ini or using session_set_cookie_params() for security (e.g., httponly, secure, samesite).
session_start();

// Define constants for image paths. This makes paths easier to manage and update.
// Using constants improves maintainability and readability.
define('BASE_IMAGE_PATH', '../images/');
define('LOGO_IMAGE_PATH', BASE_IMAGE_PATH . 'img/logo22.png');
define('APPROVAL_IMAGE_PATH', BASE_IMAGE_PATH . 'img/approval.gif');
define('BACKGROUND_IMAGE_PATH', BASE_IMAGE_PATH . 'dBg.jpg');
define('FOOTER_BACKGROUND_IMAGE_PATH', BASE_IMAGE_PATH . 'footerBg.png');
define('DROPDOWN_BACKGROUND_IMAGE_PATH', BASE_IMAGE_PATH . 'dropdownBg.png');

// Initialize error message variable.
// Sanitize and validate input parameters, even for display.
// htmlspecialchars() is used to prevent Cross-Site Scripting (XSS) vulnerabilities
// if the error message were ever to come from user-controlled input.
// ENT_QUOTES converts both single and double quotes. UTF-8 is the character encoding.
$errorMessage = '';
if (isset($_GET["err"])) {
    // The error message is hardcoded here, so XSS is not a direct threat from this specific string.
    // However, it's good practice to always sanitize output that goes into HTML.
    // We're providing a more user-friendly message than just "This Rollno Does Not Exist".
    $errorMessage = htmlspecialchars("The entered Roll Number does not exist. Please check and try again.", ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<!--
    Updated to HTML5 doctype for modern web standards.
    This ensures better browser compatibility and enables new HTML5 features.
-->
<html lang="en"> <head>
    <meta charset="UTF-8" />
    <!--
        Viewport meta tag for responsive design.
        Ensures the page scales correctly on various devices (mobile, tablet, desktop).
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diploma AG Result - RKDF University, Bhopal</title>

    <!--
        Internal CSS for styling. For a larger production application,
        it's highly recommended to move this CSS into an external .css file
        for better caching, maintainability, and separation of concerns.
        Example: <link rel="stylesheet" href="css/style.css">
    -->
    <style>
        /* Basic body styling, using constants for background images */
        body {
            font-family: 'Inter', Arial, Helvetica, sans-serif; /* Using Inter for a modern look */
            background-image: url('<?php echo BACKGROUND_IMAGE_PATH; ?>');
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat;
            background-attachment: fixed; /* Keep background fixed when scrolling */
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox for easy centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Ensure body takes full viewport height */
        }

        /* Main layout table styling */
        .main-layout-table {
            background-image: url('<?php echo FOOTER_BACKGROUND_IMAGE_PATH; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%; /* Make it fluid */
            max-width: 1026px; /* Max width to prevent it from getting too wide on large screens */
            border-collapse: collapse;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Deeper shadow for a more premium look */
            border-radius: 12px; /* More rounded corners */
            overflow: hidden; /* Ensures content respects border-radius */
        }

        /* Header background cell styling */
        .header-bg-cell {
            background-color: #000046;
            padding: 15px; /* Increased padding */
            text-align: center; /* Center images within the header */
        }

        .header-bg-cell img {
            max-width: 100%; /* Ensure images are responsive */
            height: auto; /* Maintain aspect ratio */
            vertical-align: middle; /* Align images nicely */
            margin: 0 10px; /* Space between images */
        }

        /* Dropdown background table styling */
        .dropdown-bg-table {
            background-image: url('<?php echo DROPDOWN_BACKGROUND_IMAGE_PATH; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 45px; /* Fixed height as per original */
        }

        /* Main content table styling */
        .main-content-table {
            background-image: url('<?php echo DROPDOWN_BACKGROUND_IMAGE_PATH; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            padding: 20px; /* Add internal padding for content */
            border-radius: 8px; /* Slightly rounded corners for inner table */
        }

        /* Specific text styles */
        .style3 {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            color: #400000;
            font-size: 22px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1); /* Subtle text shadow */
        }

        .style11 {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-style: italic;
            color: #A80000;
            font-size: 24px; /* Slightly larger font size */
            background: linear-gradient(to right, #FFAA55, #FFD700); /* Gradient background */
            padding: 10px 20px; /* More padding */
            border-radius: 8px; /* Rounded corners for the result banner */
            display: inline-block; /* Allows padding and border-radius */
            box-shadow: 0 2px 4px rgba(0,0,0,0.15); /* Subtle shadow */
        }

        .style12 {
            font-weight: bold;
            color: #D32F2F; /* A more standard red for error messages */
            font-size: 18px; /* Slightly larger for visibility */
            margin-top: 10px; /* Space above the message */
            display: block; /* Ensures it takes full width */
        }

        /* Input field styling */
        input[type="text"] {
            padding: 12px 15px; /* Increased padding */
            border: 2px solid #0067CE; /* Solid border with blue color */
            border-radius: 8px; /* More rounded corners */
            color: #0067CE;
            font-weight: bold;
            font-size: 18px; /* Larger font size */
            width: calc(100% - 30px); /* Full width minus padding */
            box-sizing: border-box; /* Include padding in width calculation */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
        }

        input[type="text"]:focus {
            border-color: #004080; /* Darker blue on focus */
            box-shadow: 0 0 0 3px rgba(0, 103, 206, 0.3); /* Glow effect on focus */
            outline: none; /* Remove default outline */
        }

        /* Submit button styling */
        input[type="submit"] {
            padding: 12px 25px; /* Increased padding */
            background-color: #4CAF50; /* A more vibrant green */
            background: linear-gradient(to right, #4CAF50, #66BB6A); /* Gradient for button */
            border: none; /* Remove default border */
            border-radius: 8px; /* Rounded corners */
            color: #FFFFFF; /* White text */
            font-weight: bold;
            font-size: 18px; /* Larger font size */
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease; /* Smooth transitions */
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #45A049, #5CB85C); /* Darker gradient on hover */
            transform: translateY(-2px); /* Slight lift effect */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Larger shadow on hover */
        }

        input[type="submit"]:active {
            transform: translateY(0); /* Press down effect */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Smaller shadow on active */
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .main-layout-table, .main-content-table {
                width: 95%; /* Adjust width for smaller screens */
                margin: 10px auto; /* Adjust margin */
            }

            .style3, .style11 {
                font-size: 18px; /* Smaller font sizes for mobile */
            }

            input[type="text"], input[type="submit"] {
                font-size: 16px; /* Smaller font sizes for mobile */
                padding: 10px;
            }

            .header-bg-cell img {
                display: block; /* Stack images vertically */
                margin: 10px auto; /* Center stacked images */
            }
        }
    </style>
</head>

<body>
    <!--
        The main layout table. Using inline style for background image for simplicity,
        but typically background images are handled in CSS classes.
    -->
    <table class="main-layout-table" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3">
                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                    style="background-image: url('<?php echo BACKGROUND_IMAGE_PATH; ?>'); background-size: cover;">

                    <tr>
                        <td class="header-bg-cell">
                            <!--
                                Images with alt attributes for accessibility. Using PHP constants for image paths.
                            -->
                            <img src="<?php echo LOGO_IMAGE_PATH; ?>" width="812" height="111" alt="RKDF University Logo" />
                            <img src="<?php echo APPROVAL_IMAGE_PATH; ?>" width="100" height="118" alt="Approval Logo" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="45" colspan="3">
                <table class="dropdown-bg-table" width="100%" border="0">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td width="6">&nbsp;</td>
            <td width="965">
                <form method="post" action="new_diplomaAG.php">
                    <table class="main-content-table" width="100%" height="249" border="0">
                        <tr>
                            <td width="8" height="55">&nbsp;</td>
                            <td width="320">&nbsp;</td>
                            <td width="623">
                                <span class="style11">RESULT : DIPLOMA AG. - June - 2025</span>
                            </td>
                        </tr>
                        <tr>
                            <td height="41">&nbsp;</td>
                            <td>
                                <div align="center">
                                    <label for="rollnoInput" class="style3">Enter Your Rollno.</label>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="rno" id="rollnoInput" required
                                    placeholder="e.g., 123456789" /> </td>
                        </tr>
                        <tr>
                            <td height="31">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" name="Submit" value="Show Result" />
                            </td>
                        </tr>
                        <tr>
                            <td height="45" colspan="3">&nbsp;</td> </tr>
                        <tr>
                            <td height="36">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php if (!empty($errorMessage)): ?>
                                    <span class="style12"><?php echo $errorMessage; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" colspan="3">&nbsp;</td> </tr>
                    </table>
                </form>
            </td>
            <td width="4">&nbsp;</td>
        </tr>
        <!--
            Consolidated remaining empty rows. In a modern layout, these
            would likely be replaced by CSS spacing (padding/margin) instead of empty table rows.
        -->
        <tr>
            <td colspan="3" height="220">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
    </table>
</body>

</html>
