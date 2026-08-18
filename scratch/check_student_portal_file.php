<?php
$f1 = __DIR__ . '/../student-portal.php';
$f2 = __DIR__ . '/../student_portal.php';
$f3 = __DIR__ . '/../Student_Portal.php';

echo "student-portal.php: " . (file_exists($f1) ? 'YES' : 'NO') . "\n";
echo "student_portal.php: " . (file_exists($f2) ? 'YES' : 'NO') . "\n";
echo "Student_Portal.php: " . (file_exists($f3) ? 'YES' : 'NO') . "\n";
