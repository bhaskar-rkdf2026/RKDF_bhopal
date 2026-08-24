<?php
$testPages = [
    'index.php',
    'about.php',
    'admissionform.php',
    'Result.php',
    'Engineering.php',
    'pharmacy.php',
    'Management.php',
    'BAMS.php',
    'Chancellor.php',
    'contact-us.php'
];

echo "=== SEO ENGINE OUTPUT VERIFICATION ===\n\n";

foreach ($testPages as $page) {
    $_SERVER['PHP_SELF'] = '/' . $page;
    $_SERVER['HTTP_HOST'] = 'rkdf.ac.in';
    $_SERVER['REQUEST_URI'] = '/' . $page;
    
    // reset variables
    unset($pageTitle, $mainTitle, $metaDesc, $heroSubtitle, $metaKeywords);
    
    ob_start();
    include __DIR__ . '/../include/head_meta.php';
    $output = ob_get_clean();

    preg_match('/<title>(.*?)<\/title>/', $output, $titleMatch);
    preg_match('/<meta name="description" content="(.*?)">/', $output, $descMatch);
    preg_match('/<meta name="keywords" content="(.*?)">/', $output, $keyMatch);
    preg_match('/<link rel="canonical" href="(.*?)">/', $output, $canMatch);

    echo "Page: $page\n";
    echo " -> Title: " . ($titleMatch[1] ?? 'NOT FOUND') . "\n";
    echo " -> Description: " . substr(($descMatch[1] ?? 'NOT FOUND'), 0, 95) . "...\n";
    echo " -> Canonical: " . ($canMatch[1] ?? 'NOT FOUND') . "\n\n";
}
