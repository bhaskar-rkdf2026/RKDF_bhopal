<?php
// Test standalone privacy.php
ob_start();
include __DIR__ . '/../privacy.php';
$out1 = ob_get_clean();

echo "privacy.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'Institutional Privacy Policy': " . (strpos($out1, 'Institutional Privacy Policy') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Employee Non-Disclosure': " . (strpos($out1, 'Employee Non-Disclosure') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=privacy
$_GET['slug'] = 'privacy';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=privacy Output Length: " . strlen($out2) . " bytes\n";
