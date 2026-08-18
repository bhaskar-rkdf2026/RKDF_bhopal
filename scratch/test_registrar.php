<?php
ob_start();
include __DIR__ . '/../Registrar.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. Satendra S. Thakur': " . (strpos($out, 'Dr. Satendra S. Thakur') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Dr SATENDRA SINGH THAKUR.jpeg': " . (strpos($out, 'Dr SATENDRA SINGH THAKUR.jpeg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains email 'registrar@rkdf.ac.in': " . (strpos($out, 'registrar@rkdf.ac.in') !== false ? 'YES' : 'NO') . "\n";
echo "Contains phone '+91 755-2740395': " . (strpos($out, '+91 755-2740395') !== false ? 'YES' : 'NO') . "\n";
