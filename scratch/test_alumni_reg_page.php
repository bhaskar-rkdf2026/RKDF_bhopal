<?php
ob_start();
include __DIR__ . '/../alumni_reg.php';
$out = ob_get_clean();

echo "alumni_reg.php Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'ALUMNI MEMBERSHIP REGISTRATION FORM': " . (strpos($out, 'ALUMNI MEMBERSHIP REGISTRATION FORM') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'University Enrollment Number': " . (strpos($out, 'University Enrollment Number') !== false ? 'YES' : 'NO') . "\n";
