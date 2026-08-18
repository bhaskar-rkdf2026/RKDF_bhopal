<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for verification-form ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%verification%' OR page_title LIKE '%verification%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== PAGE_SECTIONS for verification-form ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug LIKE '%verification%'");
$stmt2->execute();
print_r($stmt2->fetchAll());
