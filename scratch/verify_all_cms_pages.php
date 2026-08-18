<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

$stmt = $pdo->query("SELECT id, page_slug, page_title, category, is_active, updated_at FROM site_pages ORDER BY sort_order ASC, page_title ASC");
$pages = $stmt->fetchAll();

echo "=== TOTAL CMS DYNAMIC PAGES IN DB: " . count($pages) . " ===\n\n";

foreach ($pages as $p) {
    $secStmt = $pdo->prepare("SELECT COUNT(*) FROM page_sections WHERE page_slug = ?");
    $secStmt->execute([$p['page_slug']]);
    $count = $secStmt->fetchColumn();
    echo sprintf("[%02d] Slug: %-25s | Sections: %-2d | Title: %s\n", $p['id'], $p['page_slug'], $count, $p['page_title']);
}
