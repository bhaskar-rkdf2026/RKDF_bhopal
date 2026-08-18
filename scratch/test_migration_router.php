<?php
$_GET['slug'] = 'migration-hindi';
ob_start();
include __DIR__ . '/../page.php';
$outHindi = ob_get_clean();

$_GET['slug'] = 'migration-english';
ob_start();
include __DIR__ . '/../page.php';
$outEng = ob_get_clean();

echo "migration-hindi Output Length: " . strlen($outHindi) . " bytes\n";
echo "migration-english Output Length: " . strlen($outEng) . " bytes\n";

echo "Hindi Contains 'प्रव्रजन प्रमाणपत्र आवेदन पत्र (हिंदी)': " . (strpos($outHindi, 'प्रव्रजन प्रमाणपत्र आवेदन पत्र (हिंदी)') !== false ? 'YES' : 'NO') . "\n";
echo "Hindi Contains 'forms/Application For Hindi.pdf': " . (strpos($outHindi, 'forms/Application For Hindi.pdf') !== false ? 'YES' : 'NO') . "\n";

echo "Eng Contains 'Degree & Migration Certificate Form (English)': " . (strpos($outEng, 'Degree & Migration Certificate Form (English)') !== false ? 'YES' : 'NO') . "\n";
echo "Eng Contains 'forms/Application For English.pdf': " . (strpos($outEng, 'forms/Application For English.pdf') !== false ? 'YES' : 'NO') . "\n";
