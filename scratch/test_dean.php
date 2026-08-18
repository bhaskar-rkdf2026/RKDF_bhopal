<?php
ob_start();
include __DIR__ . '/../dean.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. Santram Lodhi': " . (strpos($out, 'Dr. Santram Lodhi') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Arun Kumar Patel': " . (strpos($out, 'Dr. Arun Kumar Patel') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Satendra Singh Thakur': " . (strpos($out, 'Dr. Satendra Singh Thakur') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Santram Lodhi.jfif': " . (strpos($out, 'Santram Lodhi.jfif') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Arun Patel.jfif': " . (strpos($out, 'Arun Patel.jfif') !== false ? 'YES' : 'NO') . "\n";
