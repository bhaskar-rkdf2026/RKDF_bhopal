<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for student-portal ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%student%' OR page_title LIKE '%student%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== PAGE_SECTIONS for student-portal ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug LIKE '%student-portal%'");
$stmt2->execute();
print_r($stmt2->fetchAll());
