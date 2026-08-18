<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test 1: All departments
$_GET['department_id'] = 'all';
ob_start();
include __DIR__ . '/../staffLnew.php';
$outAll = ob_get_clean();

// Test 2: Specific department Engineering & Technology
$_GET['department_id'] = 'Engineering & Technology';
ob_start();
include __DIR__ . '/../staffLnew.php';
$outEng = ob_get_clean();

echo "All Dept Output Length: " . strlen($outAll) . " bytes\n";
echo "Engineering Output Length: " . strlen($outEng) . " bytes\n";
echo "Contains 'Dr. Arun Kumar Patel': " . (strpos($outEng, 'Dr. Arun Kumar Patel') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Sunil Patil': " . (strpos($outEng, 'Dr. Sunil Patil') !== false ? 'YES' : 'NO') . "\n";
