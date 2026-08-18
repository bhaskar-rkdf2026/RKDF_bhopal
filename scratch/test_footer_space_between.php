<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer Length: " . strlen($html) . " bytes\n";
echo "Contains space-between: " . (strpos($html, 'justify-content: space-between') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Left Copyright: " . (strpos($html, 'text-align: left') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Center Credit: " . (strpos($html, 'text-align: center') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Right Legal Links: " . (strpos($html, 'justify-content: flex-end') !== false ? 'YES' : 'NO') . "\n";
