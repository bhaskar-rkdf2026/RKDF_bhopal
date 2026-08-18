<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for academic-council / academic_council ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug IN ('academic-council', 'academic_council')");
$stmt->execute();
$pages = $stmt->fetchAll();
var_dump($pages);

echo "\n=== PAGE_SECTIONS ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug IN ('academic-council', 'academic_council')");
$stmt2->execute();
$sections = $stmt2->fetchAll();
var_dump($sections);
