<?php
// Test standalone alumni.php
ob_start();
include __DIR__ . '/../alumni.php';
$out1 = ob_get_clean();

echo "alumni.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'RKDF University Alumni Association': " . (strpos($out1, 'RKDF University Alumni Association') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Puneet Dwivedi': " . (strpos($out1, 'Dr. Puneet Dwivedi') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=alumni
$_GET['slug'] = 'alumni';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=alumni Output Length: " . strlen($out2) . " bytes\n";
echo "Contains 'Alumni Network & Global Association': " . (strpos($out2, 'Alumni Network & Global Association') !== false ? 'YES' : 'NO') . "\n";
