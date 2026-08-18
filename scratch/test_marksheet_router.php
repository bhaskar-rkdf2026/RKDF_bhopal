<?php
$_GET['slug'] = 'marksheet-form';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

ob_start();
include __DIR__ . '/../Marksheet_Form.php';
$outDirect = ob_get_clean();

echo "page.php?slug=marksheet-form Length: " . strlen($outRouter) . " bytes\n";
echo "Marksheet_Form.php Length: " . strlen($outDirect) . " bytes\n";
echo "Contains 'Duplicate & Corrected Marksheet Branch': " . (strpos($outRouter, 'Duplicate & Corrected Marksheet Branch') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Official Marksheet Correction & Duplicate Form': " . (strpos($outRouter, 'Official Marksheet Correction & Duplicate Form') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'exam/Marksheet_Correction_form.PDF': " . (strpos($outRouter, 'exam/Marksheet_Correction_form.PDF') !== false ? 'YES' : 'NO') . "\n";
