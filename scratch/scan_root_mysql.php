<?php
$files = glob(__DIR__ . '/../*.php');
$found = [];
foreach ($files as $f) {
    $c = file_get_contents($f);
    if (preg_match('/mysql_(connect|select_db|query|fetch_array|fetch_assoc)/i', $c)) {
        $found[] = basename($f);
    }
}
echo "Root PHP files containing legacy mysql_ functions: " . count($found) . "\n";
foreach ($found as $fn) {
    echo " - " . $fn . "\n";
}
