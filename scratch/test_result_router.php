<?php
$_GET['slug'] = 'result';
ob_start();
include __DIR__ . '/../page.php';
$outRouter = ob_get_clean();

ob_start();
include __DIR__ . '/../Result.php';
$outDirect = ob_get_clean();

echo "page.php?slug=result Output Length: " . strlen($outRouter) . " bytes\n";
echo "Result.php Output Length: " . strlen($outDirect) . " bytes\n";
echo "Contains 'Declared Examination Results': " . (strpos($outRouter, 'Declared Examination Results') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'BAMS — 1st Sem': " . (strpos($outRouter, 'BAMS — 1st Sem') !== false ? 'YES' : 'NO') . "\n";
