<?php
$_GET['q'] = 'engineering';
ob_start();
include __DIR__ . '/../api_search.php';
$json = ob_get_clean();
echo "RESPONSE FROM API:\n" . $json . "\n";
