<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

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
    echo "========================================\n";
    echo "SLUG: {$s}\n";
    $p = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
    $p->execute([$s]);
    print_r($p->fetch());

    $sec = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ?");
    $sec->execute([$s]);
    print_r($sec->fetchAll());
}
