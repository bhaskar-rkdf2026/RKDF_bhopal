<?php
// Test standalone t&p.php
ob_start();
include __DIR__ . '/../t&p.php';
$out1 = ob_get_clean();

echo "t&p.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'RKDF University Training & Placement Cell': " . (strpos($out1, 'RKDF University Training & Placement Cell') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Mr. Waseem Zaidi': " . (strpos($out1, 'Mr. Waseem Zaidi') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=t&p
$_GET['slug'] = 't&p';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=t&p Output Length: " . strlen($out2) . " bytes\n";

// Test router page.php?slug=placement
$_GET['slug'] = 'placement';
ob_start();
include __DIR__ . '/../page.php';
$out3 = ob_get_clean();

echo "page.php?slug=placement Output Length: " . strlen($out3) . " bytes\n";
