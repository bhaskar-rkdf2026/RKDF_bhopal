<?php
$root = realpath(__DIR__ . '/..');

$skipDirs = ['scratch', '.git', 'vendor', 'node_modules', 'uploads', 'images'];

function scanDirFast($dir, $skipDirs) {
    $results = [];
    $items = @scandir($dir);
    if (!$items) return $results;

    foreach ($items as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $f;
        if (is_dir($path)) {
            if (in_array(strtolower($f), $skipDirs)) continue;
            $results = array_merge($results, scanDirFast($path, $skipDirs));
        } else if (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $results[] = $path;
        }
    }
    return $results;
}

$phpFiles = scanDirFast($root, $skipDirs);
$mysqlFiles = [];
$syntaxErrors = [];

foreach ($phpFiles as $path) {
    $content = file_get_contents($path);

    // Check for legacy mysql_ functions
    if (preg_match('/\bmysql_(connect|select_db|query|fetch_array|fetch_assoc|num_rows|real_escape_string)\b/i', $content)) {
        $mysqlFiles[] = $path;
    }
}

echo "Total PHP Files Scanned: " . count($phpFiles) . "\n";
echo "Files with legacy mysql_ functions (Risk of 500 error on PHP 7+ / 8+): " . count($mysqlFiles) . "\n\n";
foreach ($mysqlFiles as $mf) {
    echo "  - " . str_replace($root, '', $mf) . "\n";
}
