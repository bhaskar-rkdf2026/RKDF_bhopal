<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

$stmt = $pdo->query("SELECT page_slug, page_title FROM site_pages WHERE is_active = 1");
$pages = $stmt->fetchAll();

echo "Testing ALL " . count($pages) . " CMS Slugs in database...\n";
$errors = 0;

foreach ($pages as $p) {
    $slug = $p['page_slug'];
    $_GET['slug'] = $slug;
    
    ob_start();
    try {
        include __DIR__ . '/../page.php';
        $out = ob_get_clean();
        if (strlen($out) < 500) {
            echo "[SHORT OUTPUT WARNING] {$slug} => Length: " . strlen($out) . " bytes\n";
        }
    } catch (Throwable $e) {
        ob_end_clean();
        echo "[500 CRASH ERROR] {$slug} => " . $e->getMessage() . "\n";
        $errors++;
    }
}

if ($errors === 0) {
    echo "\n🎉 SUCCESS: ALL " . count($pages) . " CMS PAGES PASSED WITH ZERO 500 ERRORS!\n";
} else {
    echo "\n⚠️ Total 500 Errors Found: {$errors}\n";
}
