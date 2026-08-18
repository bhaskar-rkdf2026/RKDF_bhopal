<?php
ob_start();
include __DIR__ . '/../localadvisory.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Local Core Advisory Group': " . (strpos($out, 'Local Core Advisory Group') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'College Directors & Institute Heads': " . (strpos($out, 'College Directors &amp; Institute Heads') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Emeritus Faculty': " . (strpos($out, 'Emeritus Faculty') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Execution of National Advisory Guidelines': " . (strpos($out, 'Execution of National Advisory Guidelines') !== false ? 'YES' : 'NO') . "\n";
