<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SITE_PAGES for tnp / placement / t&p ===\n";
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug LIKE '%placement%' OR page_slug LIKE '%tnp%' OR page_slug LIKE '%t%p%' OR page_title LIKE '%placement%' OR page_title LIKE '%training%'");
$stmt->execute();
print_r($stmt->fetchAll());

echo "\n=== FILES IN WORKSPACE ===\n";
foreach ([
    't&p.php',
    'tnp.php',
    'placement.php',
    'Placement.php',
    't-and-p.php'
] as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
