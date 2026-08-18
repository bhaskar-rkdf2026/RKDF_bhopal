<?php
// Test standalone contact-us.php
ob_start();
include __DIR__ . '/../contact-us.php';
$out1 = ob_get_clean();

echo "contact-us.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'Contact Us & Campus Directory': " . (strpos($out1, 'Contact Us & Campus Directory') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Toll Free 1800 270 0320: " . (strpos($out1, '1800 270 0320') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Google Maps iframe: " . (strpos($out1, 'maps/embed') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=contact-us
$_GET['slug'] = 'contact-us';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=contact-us Output Length: " . strlen($out2) . " bytes\n";
