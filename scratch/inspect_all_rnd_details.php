<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

$slugs = [
    'rnd-glance',
    'journals',
    'rnd-presentation',
    'rnd-formats',
    'funding-agencies',
    'publications',
    'mou-list',
    'patents',
    'conferences',
    'rnd-videos'
];

foreach ($slugs as $s) {
    echo "========================================\n";
    echo "SLUG: {$s}\n";
    $p = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
    $p->execute([$s]);
    print_r($p->fetch());

    $sec = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ?");
    $sec->execute([$s]);
    print_r($sec->fetchAll());
}
