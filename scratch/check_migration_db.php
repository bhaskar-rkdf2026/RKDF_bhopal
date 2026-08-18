<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for migration ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%migration%' OR page_title LIKE '%migration%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== PAGE_SECTIONS for migration ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug LIKE '%migration%'");
$stmt2->execute();
print_r($stmt2->fetchAll());
