<?php
$dir = new RecursiveDirectoryIterator(__DIR__ . '/..');
$iterator = new RecursiveIteratorIterator($dir);
foreach ($iterator as $file) {
    $fn = strtolower($file->getFilename());
    if (strpos($fn, 'inhouse') !== false || strpos($fn, 'in-house') !== false || strpos($fn, 'merit') !== false || strpos($fn, 'bank') !== false || strpos($fn, 'paytm') !== false) {
        echo $file->getPathname() . "\n";
    }
}
