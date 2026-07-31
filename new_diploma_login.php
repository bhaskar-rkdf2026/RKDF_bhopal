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
define('DB_PASS', 'Rkdfu12345!@#');         // Replace with your actual database password
define('DB_NAME', 'rkdfu_rkdf_results');    // Replace with your actual database name

// --- Error Handling Setup ---
// In production, display_errors should be 'Off' in php.ini.
// Errors should be logged to a file for security and debugging.
// ini_set('display_errors', 'Off');
// ini_set('log_errors', 'On');
// ini_set('error_log', '/php_error.log'); // IMPORTANT: Set a real path to your log file

// Set the absolute path to your error log file
// This path should be outside your web root (e.g., public_html, www, htdocs)
// Ensure the directory '/var/log/php/' exists and is writable by your web server user (e.g., www-data or apache)
// ini_set('error_log', '/var/log/php/my_application_errors.log');

// Example: Trigger an error to see it in the log file
// trigger_error("<br>" . "Line #30 This is a test error message from my application.", E_USER_WARNING);

// In a real application, you might have
// error_log("Debug info: User " . $userId . " logged in.");

// Function to handle critical errors gracefully without exposing details
function handleCriticalError($message, $redirectPage = 'new_diplomaAG_result.php?err=server_error') {
    error_log("Line #41 CRITICAL ERROR: " . $message); // Log the detailed error
    
    // Redirect to a generic error page or the login page with a generic error code
    header("Location: " . $redirectPage);
    exit(); // Terminate script execution
}

$rno=$_REQUEST["rno"];
$rno = trim($_POST["rno"]);

// Check if the request method is POST and roll number is provided
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rno"])) 
{
    // --- Input Validation and Sanitization ---
    // Get the roll number from the POST request.
    // Use trim to remove whitespace from the beginning and end.
    $rno = trim($_POST["rno"]);

    // Validate the roll number.
    // This is a crucial step to prevent invalid data from reaching the database.
    // Adjust the regex according to your actual roll number format.
    // Example: only alphanumeric characters.
    if (empty($rno) || !preg_match('/^[A-Za-z0-9]+$/', $rno)) {
        handleCriticalError("Invalid roll number format received: " . $rno, "new_diplomaAG_result.php?err=invalid_format");
    }

    // --- Database Connection (using mysqli) ---
    // Create a new mysqli connection object.
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check for connection errors.
    if ($mysqli->connect_error) {
        // Log the connection error and redirect to a generic error page.
        handleCriticalError("Database connection failed: " . $mysqli->connect_error);
    }

    // --- Prepared Statements to Prevent SQL Injection ---
    // Prepare the SQL query. Use '?' as a placeholder for the roll number.
    // This separates the SQL logic from the user-provided data.
    $query = "SELECT rollno FROM diplomaag WHERE rollno = ?";

    // Prepare the statement.
    $stmt = $mysqli->prepare($query);

    // Check if the statement preparation was successful.
    if (false === $stmt) {
        // Log the preparation error and redirect.
        handleCriticalError("Failed to prepare statement: " . $mysqli->error);
    }

    // Bind parameters. 's' indicates the parameter is a string.
    // This tells MySQLi how to treat the data, preventing injection.
    $stmt->bind_param("s", $rno);

    // Execute the prepared statement.
    if (!$stmt->execute()) {
        // Log execution error and redirect.
        handleCriticalError("Statement execution failed: " . $stmt->error);
    }

    // Get the result set from the executed statement.
    $result = $stmt->get_result();

    // Fetch the row.
    $row = $result->fetch_assoc(); // Use fetch_assoc() for associative array

    // Check if a row was found (i.e., roll number exists).
    if ($row) {
        // Roll number exists in the database.
        // Store the roll number in the session.
        // Sanitize the value from the database just in case (though it should be clean if validated on insert).
        $_SESSION['xrno'] = htmlspecialchars($row["rollno"], ENT_QUOTES, 'UTF-8');

        // Close the statement and connection.
        $stmt->close();
        $mysqli->close();

        // Redirect to the diplomaAG.php page.
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        ?>

        <?php
        $target_url = "https://rkdfu.org/new_diplomaAG_result.php";
        ?>        
<script type="text/javascript">
    // Use window.location.replace for a cleaner redirect (no history entry)
    window.location.replace("<?php echo $target_url; ?>");

    // Alternatively, for a link-like behavior (adds to history)
    // window.location.href = "<?php echo $target_url; ?>";
</script>

<p>If you are not redirected automatically, <a href="<?php echo $target_url; ?>">click here</a>.</p>
        <?php
            header("Location: https://rkdfu.org/new_diplomaAG_result.php");
        ?>
        <?php
        exit(); // Always exit after a header redirect
        }
    } else {
        // Roll number does not exist.
        // Close the statement and connection.
        $stmt->close();
        $mysqli->close();

        // Redirect back to the result page with an error parameter.
        // The diplomaAG_result.php will display a user-friendly message.
        header("Location: new_diplomaAG_result.php?err=1");
        exit(); // Always exit after a header redirect
    }

} else {
    // If the request is not a POST request or 'rno' is not set,
    // redirect to the main result page. This prevents direct access to diploma_login.php.
    header("Location: new_diplomaAG_result.php");
    exit();
}
?>
