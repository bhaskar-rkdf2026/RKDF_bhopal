<?php
ob_start();
include __DIR__ . '/../dgm.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. B. N. Singh': " . (strpos($out, 'Dr. B. N. Singh') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'dr. B.N. Singh.jpg': " . (strpos($out, 'dr. B.N. Singh.jpg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains email 'drbnsingh@rkdf.ac.in': " . (strpos($out, 'drbnsingh@rkdf.ac.in') !== false ? 'YES' : 'NO') . "\n";
