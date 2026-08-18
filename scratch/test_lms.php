<?php
ob_start();
include __DIR__ . '/../LMS.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Learning Management System (LMS)': " . (strpos($out, 'Learning Management System (LMS)') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Basics of Satellite Communication': " . (strpos($out, 'Basics of Satellite Communication') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Basic_of_satellite_Communication_By_Sachin_Bandewar.mp4': " . (strpos($out, 'Basic_of_satellite_Communication_By_Sachin_Bandewar.mp4') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 404 links count: " . substr_count($out, 'naac/criteria3/3.4.7') . "\n";
