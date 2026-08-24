<?php
$files = scandir(__DIR__ . '/..');
$out = [];
$dynamic = [];
$staticOrCheck = [];

foreach ($files as $f) {
    if (pathinfo($f, PATHINFO_EXTENSION) !== 'php') continue;
    if (in_array($f, ['test_db.php', 'migrate_legacy.php', 'export_legacy_all.php'])) continue;

    $content = file_get_contents(__DIR__ . '/../' . $f);
    $isDynamic = (
        strpos($content, 'site_pages') !== false ||
        strpos($content, 'page_sections') !== false ||
        strpos($content, 'homepage_sections') !== false ||
        strpos($content, 'homepage_items') !== false ||
        strpos($content, 'cms_get_') !== false ||
        strpos($content, 'getDbConnection(') !== false ||
        strpos($content, 'site_settings.php') !== false ||
        strpos($content, 'get_site_setting(') !== false ||
        strpos($content, 'subpage_template.php') !== false ||
        strpos($content, 'mysql_compat.php') !== false
    );

    if ($isDynamic) {
        $dynamic[] = $f;
    } else {
        $staticOrCheck[] = $f;
    }
}

$report = "TOTAL PHP PAGES IN ROOT: " . (count($dynamic) + count($staticOrCheck)) . "\n";
$report .= "DYNAMIC PAGES (CMS / DB / Settings Connected): " . count($dynamic) . "\n";
$report .= "PAGES TO REVIEW OR CONNECT: " . count($staticOrCheck) . "\n\n";

if (!empty($staticOrCheck)) {
    $report .= "--- PAGES REQUIRING CMS CONNECTION ---\n";
    foreach ($staticOrCheck as $p) {
        $report .= " - $p\n";
    }
} else {
    $report .= "ALL PAGES ARE 100% DYNAMIC!\n";
}

$report .= "\n--- DYNAMIC PAGES LIST ---\n";
foreach ($dynamic as $dp) {
    $report .= " + $dp\n";
}

file_put_contents(__DIR__ . '/dynamic_audit_report.txt', $report);
echo "Report written successfully.\n";
