<?php
$_GET['slug'] = 'exam-timetable';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

ob_start();
include __DIR__ . '/../examtimetable.php';
$outDirect = ob_get_clean();

echo "page.php?slug=exam-timetable Length: " . strlen($outRouter) . " bytes\n";
echo "examtimetable.php Length: " . strlen($outDirect) . " bytes\n";

$checks = [
    'Exam Postpond Notice 26 Mar 2026',
    'HOMOEOPATHY M.D. PART-1 TIME TABLE APRIL-2026',
    'D.PHARM SUPPLEMENTARY EXAM TIME TABLE AUGUST - 2026',
    'D.ARCH TIME TABLE JUNE-2026',
    'DIPLOMA ENGG TIME TABLE JUNE-2026',
    'LLM ALL BRANCH TIME TABLE JUNE-2026',
    'M.TECH TIME TABLE JUNE-2026',
    'TIME TABLE BAMS 2nd PROFESSIONAL - JUNE-2026 (Ayurveda)',
    'B.TECH TIME TABLE JUNE-2026',
    'B.SC AGRICULTURE TIME TABLE JUNE-2026',
    'BALLB TIME TABLE JUNE-2026'
];

foreach ($checks as $chk) {
    $foundInRouter = strpos($outRouter, htmlspecialchars($chk)) !== false || strpos($outRouter, $chk) !== false;
    $foundInDirect = strpos($outDirect, htmlspecialchars($chk)) !== false || strpos($outDirect, $chk) !== false;
    echo "Check '{$chk}': Router=" . ($foundInRouter ? 'YES' : 'NO') . " | Direct=" . ($foundInDirect ? 'YES' : 'NO') . "\n";
}
