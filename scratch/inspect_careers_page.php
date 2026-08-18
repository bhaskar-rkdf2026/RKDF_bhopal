<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for careers / career ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%career%' OR page_title LIKE '%career%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== FILES IN WORKSPACE ===\n";
foreach ([
    'Careers.php',
    'careers.php',
    'career.php',
    'Career.php'
] as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
