<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_SETTINGS TABLE ===\n";
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM site_settings");
    foreach ($stmt->fetchAll() as $r) {
        echo "  " . $r['setting_key'] . " => " . $r['setting_value'] . "\n";
    }
}

echo "\n=== SEARCH FOR DOUBLE SLASH (//) IN PAGE_SECTIONS AND SITE_PAGES ===\n";
if ($pdo) {
    $stmt2 = $pdo->query("SELECT page_slug, title, link_url, image_path FROM page_sections WHERE link_url LIKE '%//%' OR image_path LIKE '%//%'");
    $rows = $stmt2->fetchAll();
    echo "Double slash in page_sections: " . count($rows) . "\n";
    foreach ($rows as $rw) {
        echo "  - Slug: {$rw['page_slug']} | Title: {$rw['title']} | Link: {$rw['link_url']} | Img: {$rw['image_path']}\n";
    }

    $stmt3 = $pdo->query("SELECT page_slug, hero_bg_image FROM site_pages WHERE hero_bg_image LIKE '%//%'");
    $rows3 = $stmt3->fetchAll();
    echo "Double slash in site_pages hero_bg_image: " . count($rows3) . "\n";
    foreach ($rows3 as $rw3) {
        echo "  - Slug: {$rw3['page_slug']} | Img: {$rw3['hero_bg_image']}\n";
    }
}
