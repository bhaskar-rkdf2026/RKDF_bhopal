<?php
$file = 'C:/Users/Synergytop/.gemini/antigravity-ide/brain/32901b28-3cda-4af5-824f-e70e8c94751b/.system_generated/steps/659/content.md';
$c = file_get_contents($file);

preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $c, $matches, PREG_SET_ORDER);

echo "Total links found: " . count($matches) . "\n";
foreach ($matches as $m) {
    $url = trim($m[1]);
    $text = trim(strip_tags($m[2]));
    if (preg_match('/\.pdf$/i', $url) || strpos($url, 'timetable') !== false || strpos(strtolower($text), 'table') !== false) {
        echo "LINK: [{$text}] => {$url}\n";
    }
}
