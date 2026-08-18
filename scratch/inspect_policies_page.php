<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for policies / privacy / terms ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%polic%' OR page_slug LIKE '%privacy%' OR page_slug LIKE '%terms%' OR page_title LIKE '%policy%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== FILES IN WORKSPACE ===\n";
foreach ([
    'policies.php',
    'privacy.php',
    'terms&condition.php',
    'terms-and-conditions.php'
] as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
