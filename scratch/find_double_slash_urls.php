<?php
$root = realpath(__DIR__ . '/..');
$skipDirs = ['scratch', '.git', 'vendor', 'node_modules'];

function scanForDoubleSlash($dir, $skipDirs) {
    $results = [];
    $items = @scandir($dir);
    if (!$items) return $results;

    foreach ($items as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $f;
        if (is_dir($path)) {
            if (in_array(strtolower($f), $skipDirs)) continue;
            $results = array_merge($results, scanForDoubleSlash($path, $skipDirs));
        } else if (pathinfo($path, PATHINFO_EXTENSION) === 'php' || pathinfo($path, PATHINFO_EXTENSION) === 'html') {
            $content = file_get_contents($path);
            
            // Look for href="//" or href="/page.php" or href="http://" or double slash concatenations like $base . '/' . $url
            if (preg_match_all('/href=["\'](\/\/[^"\']+)["\']/', $content, $m)) {
                foreach ($m[1] as $match) {
                    $results[] = [
                        'file' => str_replace($root, '', $path),
                        'type' => 'href="//..."',
                        'url'  => $match
                    ];
                }
            }

            if (preg_match_all('/href=["\'](\/[^"\']+)["\']/', $content, $m2)) {
                foreach ($m2[1] as $match) {
                    if (strpos($match, '//') === 0) continue; // caught above
                    // Check if starts with double slash or single leading slash that might cause issue on subfolder deploy
                    $results[] = [
                        'file' => str_replace($root, '', $path),
                        'type' => 'href="/..."',
                        'url'  => $match
                    ];
                }
            }

            // Check PHP concatenations like . '/' . or similar that might create //
            if (preg_match_all('/(?:href|src)\s*=\s*["\']<\?=\s*[^"\']*\/[^"\']*\?>\//i', $content, $m3)) {
                foreach ($m3[0] as $match) {
                    $results[] = [
                        'file' => str_replace($root, '', $path),
                        'type' => 'PHP slash concatenation',
                        'url'  => $match
                    ];
                }
            }
        }
    }
    return $results;
}

$found = scanForDoubleSlash($root, $skipDirs);
echo "Total potential // or leading slash URL issues found: " . count($found) . "\n";
foreach (array_slice($found, 0, 50) as $item) {
    echo "  File: {$item['file']} | Type: {$item['type']} | URL: {$item['url']}\n";
}
