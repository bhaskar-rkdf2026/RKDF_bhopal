<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for local-advisory / localadvisory ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug IN ('local-advisory', 'localadvisory')");
$stmt->execute();
$pages = $stmt->fetchAll();
var_dump($pages);

echo "\n=== PAGE_SECTIONS ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug IN ('local-advisory', 'localadvisory')");
$stmt2->execute();
$sections = $stmt2->fetchAll();
var_dump($sections);
