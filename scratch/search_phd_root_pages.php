<?php
$files = glob(__DIR__ . '/../*phd*');
foreach ($files as $f) {
    echo basename($f) . "\n";
}
$files2 = glob(__DIR__ . '/../*PhD*');
foreach ($files2 as $f) {
    echo basename($f) . "\n";
}
