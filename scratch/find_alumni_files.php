<?php
$files = glob(__DIR__ . '/../*alumni*');
foreach ($files as $f) {
    echo basename($f) . "\n";
}
