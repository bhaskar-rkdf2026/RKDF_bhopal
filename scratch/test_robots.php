<?php
$_SERVER['PHP_SELF'] = '/index.php';
$_SERVER['HTTP_HOST'] = 'localhost';
$_SERVER['REQUEST_URI'] = '/index.php';

ob_start();
include __DIR__ . '/../include/head_meta.php';
$output = ob_get_clean();

preg_match('/<meta name="robots" content="(.*?)">/', $output, $mRobots);
preg_match('/<meta name="googlebot" content="(.*?)">/', $output, $mGoogle);

echo "Robots Tag: " . ($mRobots[1] ?? 'NOT FOUND') . "\n";
echo "Googlebot Tag: " . ($mGoogle[1] ?? 'NOT FOUND') . "\n";
