<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for privacy ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%privac%' OR page_title LIKE '%privac%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== PRIVACY FILE CONTENT ===\n";
if (file_exists(__DIR__ . '/../privacy.php')) {
    echo "privacy.php length: " . filesize(__DIR__ . '/../privacy.php') . " bytes\n";
} else {
    echo "privacy.php NOT FOUND\n";
}
