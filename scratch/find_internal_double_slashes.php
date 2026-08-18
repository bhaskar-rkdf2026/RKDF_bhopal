<?php
$files = glob(__DIR__ . '/../*.php');
foreach ($files as $f) {
    $content = file_get_contents($f);
    if (preg_match_all('/href=["\']([^"\']*?\/\/[^"\']*?)["\']/', $content, $m)) {
        foreach ($m[1] as $url) {
            // Filter out http:// and https:// and tel: and mailto:
            if (!preg_match('/^https?:\/\//i', $url) && !preg_match('/^mailto:/i', $url) && !preg_match('/^tel:/i', $url)) {
                echo "File: " . basename($f) . " => Found // URL: " . $url . "\n";
            }
        }
    }
}
