<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer Output Length: " . strlen($html) . " bytes\n";
echo "Contains Sitemap: " . (strpos($html, 'sitemap.php') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Crescent Digital Solutions Link: " . (strpos($html, 'https://crescentdigitalsolutions.com/') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Centered Layout Style: " . (strpos($html, 'justify-content: center') !== false ? 'YES' : 'NO') . "\n";
