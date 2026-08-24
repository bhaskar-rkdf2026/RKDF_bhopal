<?php
$_GET['q'] = 'pharmacy';
ob_start();
include __DIR__ . '/../search.php';
$html = ob_get_clean();
echo "search.php generated HTML size: " . strlen($html) . " bytes\n";
if (strpos($html, 'pharmacy.php') !== false) {
    echo "SUCCESS: Found 'pharmacy.php' in search.php output!\n";
} else {
    echo "FAILED\n";
}
