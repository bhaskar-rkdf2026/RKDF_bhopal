<?php
$file = 'C:/Users/Synergytop/.gemini/antigravity-ide/brain/32901b28-3cda-4af5-824f-e70e8c94751b/.system_generated/steps/723/content.md';
$c = file_get_contents($file);

preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $c, $matches, PREG_SET_ORDER);

echo "Total links found in live Result.php: " . count($matches) . "\n";
foreach ($matches as $m) {
    $url = trim($m[1]);
    $text = trim(strip_tags($m[2]));
    if (strpos(strtolower($url), 'result') !== false || strpos(strtolower($url), 'erp') !== false || strpos(strtolower($text), 'sem') !== false || strpos(strtolower($text), 'bams') !== false || strpos(strtolower($text), 'bhms') !== false || strpos(strtolower($text), 'nursing') !== false) {
        echo "RESULT ITEM: [{$text}] => {$url}\n";
    }
}
