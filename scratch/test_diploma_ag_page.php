<?php
ob_start();
include __DIR__ . '/../Result_2026/diplomaAG_result.php';
$out = ob_get_clean();

echo "diplomaAG_result.php Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'RESULT : DIPLOMA AG. JUN - 2026': " . (strpos($out, 'RESULT : DIPLOMA AG. JUN - 2026') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Enter University Roll Number': " . (strpos($out, 'Enter University Roll Number') !== false ? 'YES' : 'NO') . "\n";
