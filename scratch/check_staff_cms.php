<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES matching staff / faculty / department ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%staff%' OR page_slug LIKE '%faculty%' OR page_slug LIKE '%dept%' OR page_title LIKE '%staff%'");
$stmt->execute();
$pages = $stmt->fetchAll();
var_dump($pages);

echo "\n=== ALL SITE_PAGES SLUGS ===\n";
$stmt2 = $pdo->query("SELECT id, page_slug, page_title FROM site_pages ORDER BY id ASC");
var_dump($stmt2->fetchAll());
