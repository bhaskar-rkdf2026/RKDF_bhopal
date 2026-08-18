<?php
ob_start();
include __DIR__ . '/../Careers.php';
$out = ob_get_clean();

echo "Title in output: " . (preg_match('/<title>(.*?)<\/title>/', $out, $m) ? $m[1] : 'NONE') . "\n";
echo "Contains 'careers@rkdf.ac.in': " . (strpos($out, 'careers@rkdf.ac.in') !== false ? 'YES' : 'NO') . "\n";
