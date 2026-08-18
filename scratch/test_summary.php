<?php
$_GET['slug'] = 'name-correction-form';
ob_start();
include __DIR__ . '/../page.php';
$outNC = ob_get_clean();

$_GET['slug'] = 'marksheet-form';
ob_start();
include __DIR__ . '/../page.php';
$outMF = ob_get_clean();

echo "NC Contains 'Name Correction Portal': " . (strpos($outNC, 'Name Correction Portal') !== false ? 'YES' : 'NO') . "\n";
echo "NC Contains '10th Marksheet Copy': " . (strpos($outNC, '10th Marksheet Copy') !== false ? 'YES' : 'NO') . "\n";
echo "NC Contains 'Rs. 50 Stamp Affidavit': " . (strpos($outNC, 'Rs. 50 Stamp Affidavit') !== false ? 'YES' : 'NO') . "\n";

echo "MF Contains 'Duplicate & Corrected Marksheet Branch': " . (strpos($outMF, 'Duplicate & Corrected Marksheet Branch') !== false ? 'YES' : 'NO') . "\n";
echo "MF Contains 'Duplicate Fee': " . (strpos($outMF, 'Duplicate Fee') !== false ? 'YES' : 'NO') . "\n";

echo "Are both pages identical? " . ($outNC === $outMF ? 'YES (ERROR)' : 'NO (DIFFERENT & DISTINCT!)') . "\n";
