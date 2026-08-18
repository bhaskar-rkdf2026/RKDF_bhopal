<?php
$deanImgs = [
    'images/deanshod/Santram Lodhi.jfif',
    'images/deanshod/Ashvini Joshi.jfif',
    'images/deanshod/NK Shrivastava.jfif',
    'images/deanshod/Arun Patel.jfif',
    'images/deanshod/VK Pandey.jfif',
    'images/deanshod/Arpit Bhargav.jfif',
    'images/deanshod/Anoop J. Katyayan.jfif',
    'images/deanshod/MS Pawar.jfif',
    'images/deanshod/Satyendra Thakur.jfif',
    'images/deanshod/KC Pandey.jfif',
    'images/deanshod/Anshuma Upadhya.jfif',
    'images/deanshod/Richa Pathe.jfif'
];

foreach ($deanImgs as $img) {
    $full = __DIR__ . '/../' . $img;
    echo $img . ' => ' . (file_exists($full) ? 'EXISTS' : 'NOT FOUND') . "\n";
}
