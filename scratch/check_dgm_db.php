<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for dgm ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
$stmt->execute(['dgm']);
$page = $stmt->fetch();
var_dump($page);

echo "\n=== PAGE_SECTIONS for dgm ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ?");
$stmt2->execute(['dgm']);
$sections = $stmt2->fetchAll();
var_dump($sections);
