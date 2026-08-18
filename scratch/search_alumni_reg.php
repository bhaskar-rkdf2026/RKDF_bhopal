<?php
$dir = new RecursiveDirectoryIterator(__DIR__ . '/..');
$iterator = new RecursiveIteratorIterator($dir);
foreach ($iterator as $file) {
    if (strpos(strtolower($file->getFilename()), 'alumni') !== false && $file->getExtension() === 'php') {
        echo $file->getPathname() . "\n";
    }
}
