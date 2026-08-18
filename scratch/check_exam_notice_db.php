<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES matching exam / notice / timetable ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%exam%' OR page_slug LIKE '%notice%' OR page_title LIKE '%exam%' OR page_title LIKE '%notice%'");
$stmt->execute();
$pages = $stmt->fetchAll();
var_dump($pages);

echo "\n=== PAGE_SECTIONS matching exam / notice ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug LIKE '%exam%' OR page_slug LIKE '%notice%'");
$stmt2->execute();
$sections = $stmt2->fetchAll();
var_dump($sections);
