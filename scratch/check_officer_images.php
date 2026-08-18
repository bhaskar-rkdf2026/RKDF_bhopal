<?php
$imgs = [
    'images/img/Patil Sir.jpg',
    'images/img/Ratnesh Sir.jpg',
    'images/img/Sohaib siddiqui.jfif'
];

foreach ($imgs as $img) {
    $full = __DIR__ . '/../' . $img;
    echo $img . ' => ' . (file_exists($full) ? 'EXISTS' : 'NOT FOUND') . "\n";
}
