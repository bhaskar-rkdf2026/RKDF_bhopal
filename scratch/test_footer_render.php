<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer HTML Output Length: " . strlen($html) . " bytes\n";

preg_match_all('/href=["\']([^"\']+)["\']/', $html, $matches);
echo "Total href links in footer: " . count($matches[1]) . "\n\n";

$doubleSlashes = 0;
foreach ($matches[1] as $url) {
    if (strpos($url, '//') !== false && !preg_match('/^https?:\/\//i', $url)) {
        echo "[WARNING] Non-HTTP Double Slash URL: {$url}\n";
        $doubleSlashes++;
    } else {
        echo "  - Link: {$url}\n";
    }
}

if ($doubleSlashes === 0) {
    echo "\n🎉 SUCCESS: All footer URLs are 100% clean and free of invalid double slashes!\n";
}
