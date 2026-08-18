<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for other-officers ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
$stmt->execute(['other-officers']);
$page = $stmt->fetch();
var_dump($page);

echo "\n=== PAGE_SECTIONS for other-officers ===\n";
$stmt2 = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ?");
$stmt2->execute(['other-officers']);
$sections = $stmt2->fetchAll();
var_dump($sections);
