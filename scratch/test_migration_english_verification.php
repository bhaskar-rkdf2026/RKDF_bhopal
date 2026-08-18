<?php
$_GET['slug'] = 'migration-english';
ob_start();
include __DIR__ . '/../page.php';
$outEng = ob_get_clean();

echo "migration-english Output Length: " . strlen($outEng) . " bytes\n";
echo "Contains 'Degree & Migration Certificate Form (English)': " . (strpos($outEng, 'Degree & Migration Certificate Form (English)') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'forms/Application For English.pdf': " . (strpos($outEng, 'forms/Application For English.pdf') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'forms/Application For English - 29-June-2025.pdf': " . (strpos($outEng, 'forms/Application For English - 29-June-2025.pdf') !== false ? 'YES' : 'NO') . "\n";
