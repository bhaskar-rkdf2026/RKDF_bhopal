<?php
// Test 1: page.php?slug=exam-timetable
$_GET['slug'] = 'exam-timetable';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

// Test 2: examtimetable.php
ob_start();
include __DIR__ . '/../examtimetable.php';
$outDirect = ob_get_clean();

echo "page.php?slug=exam-timetable Length: " . strlen($outRouter) . " bytes\n";
echo "examtimetable.php Length: " . strlen($outDirect) . " bytes\n";
echo "Contains 'B.Tech All Branches Exam Timetable': " . (strpos($outDirect, 'B.Tech All Branches Exam Timetable') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'BAMS 2nd & 3rd Professional Exam Timetable': " . (strpos($outDirect, 'BAMS 2nd &amp; 3rd Professional Exam Timetable') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'B.TECH TIME TABLE JUNE-2026.pdf': " . (strpos($outDirect, 'B.TECH TIME TABLE JUNE-2026.pdf') !== false ? 'YES' : 'NO') . "\n";
