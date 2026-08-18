<?php
ob_start();
include __DIR__ . '/../BOS.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Board of Studies (BOS)': " . (strpos($out, 'Board of Studies (BOS)') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Faculty of Agriculture': " . (strpos($out, 'Faculty of Agriculture') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Faculty of Social Science Regulations': " . (strpos($out, 'Faculty of Social Science Regulations') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF document link 'Research Methodology 703.pdf': " . (strpos($out, 'Research Methodology 703.pdf') !== false ? 'YES' : 'NO') . "\n";
