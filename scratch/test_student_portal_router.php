<?php
$_GET['slug'] = 'student-portal';
ob_start();
include __DIR__ . '/../page.php';
$outSP = ob_get_clean();

echo "student-portal Output Length: " . strlen($outSP) . " bytes\n";
echo "Contains 'RKDF Student ERP & Digital Services Portal': " . (strpos($outSP, 'RKDF Student ERP & Digital Services Portal') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'ERP LOGIN PORTAL': " . (strpos($outSP, 'ERP LOGIN PORTAL') !== false ? 'YES' : 'NO') . "\n";
echo "Contains link 'https://erplive.rkdf.ac.in/': " . (strpos($outSP, 'https://erplive.rkdf.ac.in/') !== false ? 'YES' : 'NO') . "\n";
echo "Contains link 'page.php?slug=result': " . (strpos($outSP, 'page.php?slug=result') !== false ? 'YES' : 'NO') . "\n";
echo "Contains link 'page.php?slug=lms': " . (strpos($outSP, 'page.php?slug=lms') !== false ? 'YES' : 'NO') . "\n";
