<?php
$file1 = __DIR__ . '/../Result_2026/diplomaAG_result.php';
$file2 = __DIR__ . '/../result_2026/diplomaAG_result.php';
$file3 = __DIR__ . '/../diplomaAG_result.php';

echo "Result_2026/diplomaAG_result.php: " . (file_exists($file1) ? 'YES' : 'NO') . "\n";
echo "result_2026/diplomaAG_result.php: " . (file_exists($file2) ? 'YES' : 'NO') . "\n";
echo "diplomaAG_result.php: " . (file_exists($file3) ? 'YES' : 'NO') . "\n";
