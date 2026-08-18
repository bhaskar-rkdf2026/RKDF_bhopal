<?php
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
    $_GET['slug'] = $s;
    ob_start();
    include __DIR__ . '/../page.php';
    $out = ob_get_clean();

    echo "SLUG: {$s} => Length: " . strlen($out) . " bytes | Success: " . (strlen($out) > 5000 ? 'YES' : 'NO') . "\n";
}
