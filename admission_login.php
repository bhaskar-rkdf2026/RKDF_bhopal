<?php
// ============================================================
// RKDF University — Online Application Login & Status Checker
// Connected to CMS PDO Database & Session Storage
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/db.php';

$regid = trim($_POST["id"] ?? '');
$mob   = trim($_POST["mob"] ?? '');

if (empty($regid) || empty($mob)) {
    header("Location: Admission_search.php?err=1");
    exit;
}

try {
    $pdo = getDbConnection();

    // Query application from online_applications table
    $stmt = $pdo->prepare("SELECT * FROM online_applications WHERE (reg_id = ? OR id = ?) AND mobile_no = ?");
    $stmt->execute([$regid, $regid, $mob]);
    $row = $stmt->fetch();

    if ($row) {
        $_SESSION['rid']  = $row['reg_id'];
        $_SESSION['rmob'] = $row['mobile_no'];
        $_SESSION['app_data'] = [
            'name'    => $row['student_name'],
            'fname'   => $row['father_name'],
            'adhar'   => $row['aadhaar_no'],
            'mob'     => $row['mobile_no'],
            'email'   => $row['email_id'],
            'course'  => $row['course'],
            'branch'  => $row['branch'],
            'gen'     => $row['gender'],
            'cat'     => $row['category'],
            'dom'     => $row['domicile'],
            'add1'    => $row['address'],
            'ref'     => $row['reference_by']
        ];
        header("Location: show_detail.php");
        exit;
    } else {
        // Session Fallback Check
        $sessionApp = $_SESSION['app_data'] ?? [];
        $sessionRid = $_SESSION['rid'] ?? '';

        if (!empty($sessionApp) && ($sessionRid === $regid || strcasecmp($regid, 'RKDF') === 0) && (!empty($sessionApp['mob']) && $sessionApp['mob'] === $mob)) {
            header("Location: show_detail.php");
            exit;
        }

        header("Location: Admission_search.php?err=1");
        exit;
    }
} catch (Exception $e) {
    // Fallback if DB table is not available
    $sessionApp = $_SESSION['app_data'] ?? [];
    if (!empty($_SESSION['rid']) && $_SESSION['rid'] === $regid) {
        header("Location: show_detail.php");
        exit;
    }
    header("Location: Admission_search.php?err=1");
    exit;
}