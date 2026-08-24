<?php
$files = glob(__DIR__ . '/../*.php');
$dynamic = [];
$needsReview = [];

foreach ($files as $f) {
    $basename = basename($f);
    if (in_array($basename, ['test_db.php', 'migrate_legacy.php', 'export_legacy_all.php'])) continue;
    $content = file_get_contents($f);
    
    // Check if page fetches from DB / site_pages / page_sections / homepage_sections / cms_engine / site_settings
    $isDynamic = (
        strpos($content, 'site_pages') !== false ||
        strpos($content, 'page_sections') !== false ||
        strpos($content, 'homepage_sections') !== false ||
        strpos($content, 'homepage_items') !== false ||
        strpos($content, 'cms_get_') !== false ||
        strpos($content, 'getDbConnection()') !== false ||
        strpos($content, 'site_settings.php') !== false ||
        strpos($content, 'get_site_setting(') !== false ||
        strpos($content, 'subpage_template.php') !== false
    );

    if ($isDynamic) {
        $dynamic[] = $basename;
    } else {
        $needsReview[] = $basename;
    }
}

echo "TOTAL PHP FILES IN ROOT: " . count($files) . "\n";
echo "DYNAMIC (CMS/DB/Settings Connected): " . count($dynamic) . "\n";
echo "NEEDS REVIEW OR STATIC: " . count($needsReview) . "\n\n";

if (!empty($needsReview)) {
    echo "--- FILES REQUIRING DYNAMIC CMS CONNECTION ---\n";
    foreach ($needsReview as $nr) {
        echo " - " . $nr . "\n";
    }
} else {
    echo "ALL PAGES ARE 100% DYNAMIC!\n";
}
