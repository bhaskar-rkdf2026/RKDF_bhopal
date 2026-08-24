<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$files = glob(__DIR__ . '/../*.php');
$results = [];

foreach ($files as $f) {
    $basename = basename($f);
    if (in_array($basename, ['test_db.php', 'migrate_legacy.php', 'export_legacy_all.php'])) continue;
    $content = file_get_contents($f);
    $hasDb = (
        strpos($content, 'site_pages') !== false ||
        strpos($content, 'page_sections') !== false ||
        strpos($content, 'getDbConnection') !== false ||
        strpos($content, 'get_site_setting') !== false ||
        strpos($content, 'homepage_sections') !== false ||
        strpos($content, 'cms_') !== false ||
        strpos($content, 'mysql_compat.php') !== false
    );
    $results[$basename] = $hasDb ? 'DYNAMIC' : 'STATIC_OR_CHECK';
}

echo "TOTAL PHP ROOT FILES: " . count($results) . "\n";
echo "--------------------------------------------------------\n";
foreach ($results as $file => $status) {
    printf("%-35s => %s\n", $file, $status);
}
