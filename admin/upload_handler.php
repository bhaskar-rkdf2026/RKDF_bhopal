<?php
// admin/upload_handler.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized access']);
    exit();
}

/**
 * Process image file upload
 * @param array $file $_FILES['image']
 * @return array ['success' => bool, 'path' => string, 'error' => string]
 */
function handleImageUpload($file) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'No file uploaded or upload error code: ' . ($file['error'] ?? 'unknown')];
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $fileInfo = pathinfo($file['name']);
    $extension = strtolower($fileInfo['extension'] ?? '');

    if (!in_array($extension, $allowedExtensions)) {
        return ['success' => false, 'error' => 'Invalid file extension. Allowed: jpg, jpeg, png, webp, gif'];
    }

    // Target upload directory
    $uploadDir = __DIR__ . '/../uploads/homepage/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $uniqueName = 'img_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
    $targetPath = $uploadDir . $uniqueName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['success' => true, 'path' => 'uploads/homepage/' . $uniqueName];
    } else {
        return ['success' => false, 'error' => 'Failed to save uploaded file on server.'];
    }
}
