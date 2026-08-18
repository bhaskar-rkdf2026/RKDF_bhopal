<?php
$root = realpath(__DIR__ . '/..');
$skipDirs = ['scratch', '.git', 'vendor', 'node_modules'];

function scanForms($dir, $skipDirs) {
    $results = [];
    $items = @scandir($dir);
    if (!$items) return $results;

    foreach ($items as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $f;
        if (is_dir($path)) {
            if (in_array(strtolower($f), $skipDirs)) continue;
            $results = array_merge($results, scanForms($path, $skipDirs));
        } else if (pathinfo($path, PATHINFO_EXTENSION) === 'php' || pathinfo($path, PATHINFO_EXTENSION) === 'html') {
            // Skip admin files for form scanning (we want public user-facing forms)
            if (strpos($path, DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR) !== false) {
                continue;
            }

            $content = file_get_contents($path);

            if (preg_match_all('/<form[^>]*action=["\']([^"\']*)["\'][^>]*>/i', $content, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $m) {
                    $results[] = [
                        'file' => str_replace($root, '', $path),
                        'action' => $m[1] ?: basename($path),
                        'full_form_tag' => $m[0]
                    ];
                }
            } else if (strpos($content, '<form') !== false) {
                $results[] = [
                    'file' => str_replace($root, '', $path),
                    'action' => basename($path),
                    'full_form_tag' => '<form (no action attribute)>'
                ];
            }
        }
    }
    return $results;
}

$forms = scanForms($root, $skipDirs);
echo "Total Public Form Tags Found: " . count($forms) . "\n\n";

$uniqueFiles = [];
foreach ($forms as $fm) {
    $fn = $fm['file'];
    if (!isset($uniqueFiles[$fn])) {
        $uniqueFiles[$fn] = [];
    }
    $uniqueFiles[$fn][] = $fm['action'];
}

foreach ($uniqueFiles as $fn => $actions) {
    echo "File: {$fn}\n";
    foreach ($actions as $act) {
        echo "   -> Action: {$act}\n";
    }
}
