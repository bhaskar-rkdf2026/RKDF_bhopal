<?php
ob_start();
include __DIR__ . '/../Statuary-Bodies.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'National Core Advisory Group': " . (strpos($out, 'National Core Advisory Group') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Prof. Panjab Singh': " . (strpos($out, 'Prof. Panjab Singh') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Prof. Deepak Pental': " . (strpos($out, 'Prof. Deepak Pental') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Eminent Invitees': " . (strpos($out, 'Eminent Invitees') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Prof. R. B. Singh': " . (strpos($out, 'Prof. R. B. Singh') !== false ? 'YES' : 'NO') . "\n";
