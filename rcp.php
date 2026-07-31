<?php
// Database configuration
$host = 'localhost';
$db   = 'vedica_rkdf_results';
$user = 'vedica_rkdfresults';
$pass = 'CcW6JcDUF-Sl01';

// const DB_HOST = 'localhost'; // Your database host (e.g., 'localhost', '127.0.0.1')
// const DB_NAME = 'vedica_rkdf_results'; // The name of your MySQL database
// const DB_USER = 'vedica_rkdfresults';      // Your MySQL username (AVOID 'root' in production, use a dedicated user)
// const DB_PASS = 'CcW6JcDUF-Sl01';          // Your MySQL password (LEAVE EMPTY or set your password)


$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $consent = isset($_POST['consent']) ? 1 : 0;

    // Server-side validation
    if (!preg_match("/^[6-9]\d{9}$/", $phone)) {
        $message = "Error: Please enter a valid 10-digit Indian mobile number.";
    } elseif (!$consent) {
        $message = "Error: You must provide consent to proceed.";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO users_registration (phone_number, consent_given) VALUES (?, ?)");
            $stmt->execute([$phone, $consent]);
            
            // Redirect to thank-you page after success
            header("Location: thank-you.html");
            exit();
        } catch (PDOException $e) {
            $message = "Database Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
</head>

<body>
    <h2>User Registration</h2>
    <?php if ($message) echo "<p style='color:red;'>" . htmlspecialchars($message) . "</p>"; ?>

    <form method="POST" action="rcp.php" onsubmit="return validateForm()">
        <label>Phone Number:</label><br>
        <input type="text" name="phone" id="phone" required placeholder="9876543210"><br><br>

        <input type="checkbox" name="consent" id="consent" required>
        <label for="consent">I agree to receive all updates via SMS, WhatsApp, RCS, Email, and any other communication
            channel.</label><br><br>

        <button type="submit">Submit</button>
    </form>

    <script>
    function validateForm() {
        var phone = document.getElementById("phone").value;
        var consent = document.getElementById("consent").checked;
        var indianPhoneRegex = /^[6-9]\d{9}$/;

        if (!indianPhoneRegex.test(phone)) {
            alert("Please enter a valid 10-digit Indian mobile number.");
            return false;
        }
        if (!consent) {
            alert("You must agree to the consent terms.");
            return false;
        }
        return true;
    }
    </script>
</body>

</html>