<?php
// Test standalone Careers.php
ob_start();
include __DIR__ . '/../Careers.php';
$out1 = ob_get_clean();

echo "Careers.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'Careers & Academic Recruitment': " . (strpos($out1, 'Careers & Academic Recruitment') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Current Openings & Walk-In Interviews': " . (strpos($out1, 'Current Openings & Walk-In Interviews') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=careers
$_GET['slug'] = 'careers';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=careers Output Length: " . strlen($out2) . " bytes\n";
