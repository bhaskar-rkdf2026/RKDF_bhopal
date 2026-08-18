<?php
$files = glob(__DIR__ . '/../admin/*.php');
echo "Admin PHP Files:\n";
foreach ($files as $f) {
    echo "  - " . basename($f) . "\n";
}
