<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for alumni ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = 'alumni'");
$stmt->execute();
print_r($stmt->fetch());

echo "\n=== PAGE_SECTIONS for alumni ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = 'alumni' ORDER BY sort_order ASC");
$stmt2->execute();
print_r($stmt2->fetchAll());
