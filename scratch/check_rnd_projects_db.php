<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for rnd / research ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%rnd%' OR page_slug LIKE '%research%' OR page_title LIKE '%research%' OR page_title LIKE '%R&D%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== PAGE_SECTIONS for rnd-projects ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug LIKE '%rnd%'");
$stmt2->execute();
print_r($stmt2->fetchAll());
