<?php
ob_start();
include __DIR__ . '/../include/footer.php';
$html = ob_get_clean();

echo "Footer Length: " . strlen($html) . " bytes\n";
echo "Contains https://wecrescent.com/: " . (strpos($html, 'href="https://wecrescent.com/"') !== false ? 'YES' : 'NO') . "\n";
