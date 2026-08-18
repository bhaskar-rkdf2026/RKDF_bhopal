<?php
$slugs = [
    'phd-subjects',
    'phd-admission',
    'phd-syllabus',
    'phd-students',
    'phd-admissions-2026',
    'supervisors',
    'research-policy',
    'consultancy-policy',
    'institutional-distinctiveness',
    'govt-projects',
    'csir-projects',
    'solar-carbon-report',
    'incubation'
];

foreach ($slugs as $s) {
    $_GET['slug'] = $s;
    ob_start();
    include __DIR__ . '/../page.php';
    $out = ob_get_clean();

    echo "SLUG: {$s} => Length: " . strlen($out) . " bytes | Success: " . (strlen($out) > 5000 ? 'YES' : 'NO') . "\n";
}
