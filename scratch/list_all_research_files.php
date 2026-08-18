<?php
$files = glob(__DIR__ . '/../research/*');
foreach ($files as $f) {
    echo basename($f) . "\n";
}
