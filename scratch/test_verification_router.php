<?php
$_GET['slug'] = 'verification-form';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

ob_start();
include __DIR__ . '/../Verification_Form.php';
$outDirect = ob_get_clean();

echo "page.php?slug=verification-form Length: " . strlen($outRouter) . " bytes\n";
echo "Verification_Form.php Length: " . strlen($outDirect) . " bytes\n";
echo "Contains 'Document & Marksheet Verification Secretariat': " . (strpos($outRouter, 'Document & Marksheet Verification Secretariat') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Official Student Degree & Marksheet Verification Form': " . (strpos($outRouter, 'Official Student Degree & Marksheet Verification Form') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'forms/Verification Form.pdf': " . (strpos($outRouter, 'forms/Verification Form.pdf') !== false ? 'YES' : 'NO') . "\n";
