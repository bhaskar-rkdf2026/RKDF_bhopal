<?php
ob_start();
include __DIR__ . '/../BoM.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Board of Management (BoM)': " . (strpos($out, 'Board of Management (BoM)') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF document link 'Board of Management Member.pdf': " . (strpos($out, 'Board of Management Member.pdf') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Faculty of Agriculture': " . (strpos($out, 'Faculty of Agriculture') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Faculty of Engineering &amp; Technology': " . (strpos($out, 'Faculty of Engineering &amp; Technology') !== false ? 'YES' : 'NO') . "\n";
