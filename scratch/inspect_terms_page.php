<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for terms ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%term%' OR page_title LIKE '%term%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== TERMS FILE CONTENT ===\n";
if (file_exists(__DIR__ . '/../terms&condition.php')) {
    echo "terms&condition.php length: " . filesize(__DIR__ . '/../terms&condition.php') . " bytes\n";
} else {
    echo "terms&condition.php NOT FOUND\n";
}
