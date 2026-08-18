<?php
$root = realpath(__DIR__ . '/..');
$skipDirs = ['scratch', '.git', 'vendor', 'node_modules'];

function findFooterFiles($dir, $skipDirs) {
    $results = [];
    $items = @scandir($dir);
    if (!$items) return $results;

    foreach ($items as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $f;
        if (is_dir($path)) {
            if (in_array(strtolower($f), $skipDirs)) continue;
            $results = array_merge($results, findFooterFiles($path, $skipDirs));
        } else if (strpos(strtolower($f), 'footer') !== false) {
            $results[] = str_replace($root, '', $path);
        }
    }
    return $results;
}

$footers = findFooterFiles($root, $skipDirs);
echo "Footer files found in workspace:\n";
foreach ($footers as $ff) {
    echo "  - " . $ff . "\n";
}
