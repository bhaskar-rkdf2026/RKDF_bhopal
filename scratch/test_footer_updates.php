<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer Length: " . strlen($html) . " bytes\n";
echo "Contains 'Designed By Crescent Digital Solutions': " . (strpos($html, 'Designed By <a href="https://crescentdigitalsolutions.com/"') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Newsletter Form: " . (strpos($html, 'rk-footer-newsletter') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Twitter/X icon: " . (strpos($html, 'Twitter/X') !== false ? 'YES' : 'NO') . "\n";
