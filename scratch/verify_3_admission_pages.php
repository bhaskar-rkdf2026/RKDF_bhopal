<?php
$slugs = [
    'admission-notice',
    'admission-rules',
    'cuet-mapping'
];

foreach ($slugs as $s) {
    $_GET['slug'] = $s;
    ob_start();
    include __DIR__ . '/../page.php';
    $out = ob_get_clean();

    echo "SLUG: {$s} => Length: " . strlen($out) . " bytes | Success: " . (strlen($out) > 5000 ? 'YES' : 'NO') . "\n";
}
