<?php
$files = [
    'ADMISSION POLICY 2026-27.pdf',
    'Admission_Rules_2025-26.pdf',
    'images/06/Mapping list for CUET(UG)- 2023.pdf',
    'University_Fees_Structure.pdf',
    'admissionform.php'
];

foreach ($files as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}

echo "\n--- Search all admission/cuet files ---\n";
$dir = new RecursiveDirectoryIterator(__DIR__ . '/..');
$iterator = new RecursiveIteratorIterator($dir);
foreach ($iterator as $file) {
    $fn = strtolower($file->getFilename());
    if (strpos($fn, 'cuet') !== false || strpos($fn, 'admission_policy') !== false || strpos($fn, 'admission policy') !== false || strpos($fn, 'admission_rule') !== false || strpos($fn, 'admission rule') !== false) {
        echo $file->getPathname() . "\n";
    }
}
