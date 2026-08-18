<?php
// Test standalone terms&condition.php
ob_start();
include __DIR__ . '/../terms&condition.php';
$out1 = ob_get_clean();

echo "terms&condition.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'Terms & Conditions of Use': " . (strpos($out1, 'Terms & Conditions of Use') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Jurisdiction of the Courts of Bhopal': " . (strpos($out1, 'Bhopal, Madhya Pradesh') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=terms&condition
$_GET['slug'] = 'terms&condition';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=terms&condition Output Length: " . strlen($out2) . " bytes\n";
