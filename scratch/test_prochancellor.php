<?php
ob_start();
include __DIR__ . '/../ProChancellor.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. Siddharth Kapoor': " . (strpos($out, 'Dr. Siddharth Kapoor') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Dr_Siddhart_Kapoor-N.jpeg': " . (strpos($out, 'Dr_Siddhart_Kapoor-N.jpeg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains full text snippet: " . (strpos($out, 'Education is for transition of a competent scholar') !== false ? 'YES' : 'NO') . "\n";
