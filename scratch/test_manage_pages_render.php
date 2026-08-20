<?php
session_start();
$_SESSION['admin_logged_in'] = true;
$_SESSION['admin_user'] = 'admin';
$_GET['slug'] = 'about';

ob_start();
include __DIR__ . '/../admin/manage_pages.php';
$html = ob_get_clean();

echo "HTML Length: " . strlen($html) . " bytes\n";
if (strpos($html, 'Select Page to Edit:') !== false) {
    echo "✔ Found 'Select Page to Edit:' dropdown in output\n";
} else {
    echo "✖ Missing dropdown\n";
}

if (strpos($html, 'Header &amp; Hero Content for:') !== false || strpos($html, 'Header & Hero Content for:') !== false) {
    echo "✔ Found 'Header & Hero Content for:' in output\n";
} else {
    echo "✖ Missing Hero Content section\n";
}
