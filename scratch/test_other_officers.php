<?php
ob_start();
include __DIR__ . '/../other-officers.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. Sunil Patil': " . (strpos($out, 'Dr. Sunil Patil') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Ratnesh Kumar Jain': " . (strpos($out, 'Dr. Ratnesh Kumar Jain') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Sohaib Siddique': " . (strpos($out, 'Sohaib Siddique') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Patil Sir.jpg': " . (strpos($out, 'Patil Sir.jpg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Ratnesh Sir.jpg': " . (strpos($out, 'Ratnesh Sir.jpg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'Sohaib siddiqui.jfif': " . (strpos($out, 'Sohaib siddiqui.jfif') !== false ? 'YES' : 'NO') . "\n";
