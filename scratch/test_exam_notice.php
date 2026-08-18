<?php
// Test 1: page.php?slug=exam-notice
$_GET['slug'] = 'exam-notice';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

// Test 2: Exam_Notice.php
ob_start();
include __DIR__ . '/../Exam_Notice.php';
$outDirect = ob_get_clean();

echo "page.php?slug=exam-notice Length: " . strlen($outRouter) . " bytes\n";
echo "Exam_Notice.php Length: " . strlen($outDirect) . " bytes\n";
echo "Contains 'Official Semester Examination Notification': " . (strpos($outDirect, 'Official Semester Examination Notification') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'B.Tech All Branches Exam Timetable': " . (strpos($outDirect, 'B.Tech All Branches Exam Timetable') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF Link 'images/exam_notice.pdf': " . (strpos($outDirect, 'images/exam_notice.pdf') !== false ? 'YES' : 'NO') . "\n";
