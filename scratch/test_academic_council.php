<?php
ob_start();
include __DIR__ . '/../Academic_Council.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Academic Council': " . (strpos($out, 'Academic Council') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF document link 'Academic Council Members 2024.pdf': " . (strpos($out, 'Academic Council Members 2024.pdf') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Mohan Lal Kori': " . (strpos($out, 'Dr. Mohan Lal Kori') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. A. K. Patra': " . (strpos($out, 'Dr. A. K. Patra') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Order No: 641/RKDF/2024': " . (strpos($out, '641/RKDF/2024') !== false ? 'YES' : 'NO') . "\n";
