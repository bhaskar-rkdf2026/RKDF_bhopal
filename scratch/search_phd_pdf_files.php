<?php
$dir = new RecursiveDirectoryIterator(__DIR__ . '/..');
$iterator = new RecursiveIteratorIterator($dir);
foreach ($iterator as $file) {
    if (strpos(strtolower($file->getFilename()), 'phd') !== false || strpos(strtolower($file->getFilename()), 'supervisor') !== false || strpos(strtolower($file->getFilename()), 'syllabus') !== false) {
        echo $file->getPathname() . "\n";
    }
}
