<?php
$files = glob(__DIR__ . '/../images/img/*.*');
foreach ($files as $f) {
    $base = basename($f);
    if (stripos($base, 'singh') !== false || stripos($base, 'b.n') !== false || stripos($base, 'dgm') !== false || stripos($base, 'dr') !== false) {
        echo $base . "\n";
    }
}
