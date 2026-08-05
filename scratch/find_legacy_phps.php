<?php
// scratch/find_legacy_phps.php
$root = os_path_abspath(__DIR__ . '/..');

function os_path_abspath($path) {
    return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, realpath($path) ?: $path);
}

$files = glob($root . DIRECTORY_SEPARATOR . '*.php');
$legacyFiles = [];
$modernFiles = [];
$utilityFiles = [];

foreach ($files as $f) {
    $base = basename($f);
    if (str_contains($base, '-202') || str_contains($base, '-201') || str_contains($base, 'test') || str_contains($base, 'NotUsed') || str_contains($base, 'backup')) {
        continue;
    }

    $raw = file_get_contents($f);

    // Skip utility/backend only scripts
    if (!str_contains($raw, '<html') && !str_contains($raw, '<body') && !str_contains($raw, '<div')) {
        $utilityFiles[] = $base;
        continue;
    }

    if (str_contains($raw, 'new_navbar.php')) {
        $modernFiles[] = $base;
    } else {
        $legacyFiles[] = $base;
    }
}

echo "Total UI PHP files scanned: " . (count($modernFiles) + count($legacyFiles)) . "\n";
echo "Modern UI Pages (using new_navbar): " . count($modernFiles) . "\n";
echo "Legacy UI Pages needing upgrade: " . count($legacyFiles) . "\n\n";

if (!empty($legacyFiles)) {
    echo "Legacy Pages List:\n";
    foreach ($legacyFiles as $lf) {
        echo " - " . $lf . "\n";
    }
}
