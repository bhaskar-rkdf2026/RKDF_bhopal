<?php
$favs = array_merge(
    glob(__DIR__ . '/../*.ico'),
    glob(__DIR__ . '/../*.png'),
    glob(__DIR__ . '/../images/*.ico'),
    glob(__DIR__ . '/../images/*.png'),
    glob(__DIR__ . '/../images/lovable/*')
);

foreach ($favs as $f) {
    if (preg_match('/(fav|logo|icon)/i', basename($f))) {
        echo basename($f) . " => " . str_replace(realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR, '', realpath($f)) . "\n";
    }
}
