<?php
$root = realpath(__DIR__ . '/..');

// 1. Copy images/fav.png to root favicon.ico and favicon.png for direct browser requests
$favSource = $root . '/images/fav.png';
if (file_exists($favSource)) {
    copy($favSource, $root . '/favicon.png');
    copy($favSource, $root . '/favicon.ico');
    echo "Created root /favicon.png and /favicon.ico\n";
}

// 2. Scan all PHP files in root, admin, include
$allPhpFiles = [];
$iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS));
foreach ($iter as $file) {
    $p = $file->getPathname();
    if (strpos($p, DIRECTORY_SEPARATOR . '.git') !== false) continue;
    if (strpos($p, DIRECTORY_SEPARATOR . 'scratch') !== false) continue;
    if (strpos($p, DIRECTORY_SEPARATOR . '_quarantine_') !== false) continue;
    if (strtolower(pathinfo($p, PATHINFO_EXTENSION)) === 'php') {
        $allPhpFiles[] = $p;
    }
}

$updated = [];
$alreadyHas = [];
$noHeadTag = [];

$faviconTag = '  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/fav.png">
  <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/fav.png">';

foreach ($allPhpFiles as $phpFile) {
    $content = file_get_contents($phpFile);
    
    // Skip partials / templates without <head>
    if (stripos($content, '<head>') === false && stripos($content, '<head ') === false) {
        $noHeadTag[] = basename($phpFile);
        continue;
    }

    // Check if already has favicon
    if (stripos($content, 'rel="icon"') !== false || stripos($content, 'rel="shortcut icon"') !== false) {
        // If it points to a broken path or old path, standardize it
        $alreadyHas[] = basename($phpFile);
    }

    // Insert right after <head> or right after <meta name="viewport"...>
    if (preg_match('/(<head[^>]*>)/i', $content, $m)) {
        // If it doesn't have favicon tag
        if (stripos($content, 'rel="icon"') === false && stripos($content, 'rel="shortcut icon"') === false) {
            $newContent = preg_replace('/(<head[^>]*>)/i', "$1\n" . $faviconTag, $content, 1);
            file_put_contents($phpFile, $newContent);
            $updated[] = basename($phpFile);
        }
    }
}

echo "Total PHP files with <head>: " . (count($updated) + count($alreadyHas)) . "\n";
echo "Files updated with Favicon: " . count($updated) . "\n";
echo "Files already having Favicon: " . count($alreadyHas) . "\n";
