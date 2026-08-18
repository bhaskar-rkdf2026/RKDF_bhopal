<?php
$files = glob(__DIR__ . '/../images/img/*.*');
foreach ($files as $f) {
    $base = basename($f);
    if (stripos($base, 'sethi') !== false || stripos($base, 'vinod') !== false || stripos($base, 'vk') !== false || stripos($base, 'dgr') !== false) {
        echo $base . "\n";
    }
}
