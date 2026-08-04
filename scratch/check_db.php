<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== HOMEPAGE SECTIONS ===\n";
$stmt = $pdo->query("SELECT id, section_key, tag_number, tag_text, title_main FROM homepage_sections ORDER BY sort_order");
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$r['id']} | Key: {$r['section_key']} | Tag: {$r['tag_number']} | Title: {$r['title_main']}\n";
}

echo "\n=== SITE PAGES REGISTERED ===\n";
$stmtP = $pdo->query("SELECT id, page_slug, page_title, category FROM site_pages ORDER BY category, page_title");
while ($p = $stmtP->fetch(PDO::FETCH_ASSOC)) {
    echo "Slug: {$p['page_slug']} | Title: {$p['page_title']} | Cat: {$p['category']}\n";
}
