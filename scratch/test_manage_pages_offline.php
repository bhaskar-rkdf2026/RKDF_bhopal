<?php
// scratch/test_manage_pages_offline.php
session_start();
$_SESSION['admin_logged_in'] = true;
$_SESSION['admin_user'] = 'admin';
$_GET['slug'] = 'about';

// Temporarily override DB constants to invalid host to test resilience
define('DB_HOST', 'invalid_host_for_offline_test');

ob_start();
include __DIR__ . '/../admin/manage_pages.php';
$html = ob_get_clean();

echo "Offline HTML Length: " . strlen($html) . " bytes\n";
if (strpos($html, 'Select Page to Edit:') !== false) {
    echo "✔ Found 'Select Page to Edit:' dropdown in offline mode\n";
} else {
    echo "✖ Missing dropdown\n";
}

if (strpos($html, 'Header &amp; Hero Content for:') !== false || strpos($html, 'Header & Hero Content for:') !== false) {
    echo "✔ Found 'Header & Hero Content for:' in offline mode\n";
} else {
    echo "✖ Missing Hero Content section\n";
}

if (strpos($html, 'Database Setup Notice:') !== false) {
    echo "✔ Found Database Notice warning banner in offline mode\n";
}
