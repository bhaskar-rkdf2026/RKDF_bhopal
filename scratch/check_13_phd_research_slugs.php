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

echo "=== SITE_PAGES CHECK ===\n";
foreach ($slugs as $s) {
    $stmt = $pdo->prepare("SELECT id, page_slug, page_title, eyebrow, hero_subtitle FROM site_pages WHERE page_slug = ?");
    $stmt->execute([$s]);
    $row = $stmt->fetch();
    if ($row) {
        echo "[EXISTS] {$s} => Title: {$row['page_title']}\n";
    } else {
        echo "[MISSING] {$s}\n";
    }
}

echo "\n=== PAGE_SECTIONS CHECK ===\n";
foreach ($slugs as $s) {
    $stmt = $pdo->prepare("SELECT COUNT(*) as cnt FROM page_sections WHERE page_slug = ?");
    $stmt->execute([$s]);
    $row = $stmt->fetch();
    echo "{$s} => " . ($row['cnt'] ?? 0) . " sections\n";
}
