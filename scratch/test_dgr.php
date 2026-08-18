<?php
ob_start();
include __DIR__ . '/../dgr.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Dr. Vinod Kumar Sethi': " . (strpos($out, 'Dr. Vinod Kumar Sethi') !== false ? 'YES' : 'NO') . "\n";
echo "Contains photo 'vk sethi sir.jpg': " . (strpos($out, 'vk sethi sir.jpg') !== false ? 'YES' : 'NO') . "\n";
echo "Contains email 'vksethi1949@gmail.com': " . (strpos($out, 'vksethi1949@gmail.com') !== false ? 'YES' : 'NO') . "\n";
