<?php
// Test standalone policies.php
ob_start();
include __DIR__ . '/../policies.php';
$out1 = ob_get_clean();

echo "policies.php Output Length: " . strlen($out1) . " bytes\n";
echo "Contains 'University Policies & Statutory Regulations': " . (strpos($out1, 'University Policies & Statutory Regulations') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'id=\"accessibility\"': " . (strpos($out1, 'id="accessibility"') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Divyangjan policy: " . (strpos($out1, 'Divyangjan-Friendly Policy') !== false ? 'YES' : 'NO') . "\n";

// Test router page.php?slug=policies
$_GET['slug'] = 'policies';
ob_start();
include __DIR__ . '/../page.php';
$out2 = ob_get_clean();

echo "page.php?slug=policies Output Length: " . strlen($out2) . " bytes\n";
