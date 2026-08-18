<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for statutory-bodies / national-advisory ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug IN ('statutory-bodies', 'national-advisory', 'statuary-bodies')");
$stmt->execute();
$pages = $stmt->fetchAll();
var_dump($pages);

echo "\n=== PAGE_SECTIONS ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug IN ('statutory-bodies', 'national-advisory', 'statuary-bodies')");
$stmt2->execute();
$sections = $stmt2->fetchAll();
var_dump($sections);
