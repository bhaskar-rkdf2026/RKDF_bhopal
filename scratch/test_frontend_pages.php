<?php
$pages = [
    'about.php',
    'Vision&mission.php',
    'Chancellor.php',
    'BoM.php',
    'dgm.php',
    'dgr.php',
    'academic&departments.php',
    'scholarship.php',
    'Statuary-Bodies.php',
    'Objectives.php'
];

foreach ($pages as $p) {
    if (file_exists(__DIR__ . '/../' . $p)) {
        ob_start();
        include __DIR__ . '/../' . $p;
        $html = ob_get_clean();
        echo "✔ $p rendered: " . strlen($html) . " bytes\n";
    } else {
        echo "⚠ $p file not found\n";
    }
}
