<?php
$slugs = [
    'international-admissions',
    'academic-departments',
    'bank-details',
    'fee-structure',
    'campus-facility',
    'pay-paytm',
    'inhouse-scheme',
    'meritorious-scheme'
];

foreach ($slugs as $s) {
    $_GET['slug'] = $s;
    ob_start();
    include __DIR__ . '/../page.php';
    $out = ob_get_clean();

    echo "SLUG: {$s} => Length: " . strlen($out) . " bytes | Success: " . (strlen($out) > 5000 ? 'YES' : 'NO') . "\n";
}

// Standalone pages
ob_start();
include __DIR__ . '/../scholarship.php';
$outS = ob_get_clean();
echo "scholarship.php => Length: " . strlen($outS) . " bytes | Success: " . (strlen($outS) > 5000 ? 'YES' : 'NO') . "\n";

ob_start();
include __DIR__ . '/../admissionform.php';
$outA = ob_get_clean();
echo "admissionform.php => Length: " . strlen($outA) . " bytes | Success: " . (strlen($outA) > 5000 ? 'YES' : 'NO') . "\n";
