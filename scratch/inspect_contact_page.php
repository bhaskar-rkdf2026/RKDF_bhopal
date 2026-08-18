<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for contact ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%contact%' OR page_title LIKE '%contact%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== FILES IN WORKSPACE ===\n";
foreach ([
    'contact-us.php',
    'contact.php',
    'Contact.php',
    'Contact_Us.php'
] as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
