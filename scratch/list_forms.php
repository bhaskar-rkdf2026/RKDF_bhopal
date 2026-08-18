<?php
foreach (glob(__DIR__ . '/../forms/*.*') as $file) {
    echo basename($file) . " => " . filesize($file) . " bytes\n";
}
