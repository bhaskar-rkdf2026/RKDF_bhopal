<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer Length: " . strlen($html) . " bytes\n";
echo "Contains 'Designed By Crescent Digital Solutions': " . (strpos($html, 'Designed By <a href="https://crescentdigitalsolutions.com/"') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Uniform Color: " . (strpos($html, 'color: rgba(250,249,246,0.5)') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Centered Flex Layout: " . (strpos($html, 'justify-content: center') !== false ? 'YES' : 'NO') . "\n";
