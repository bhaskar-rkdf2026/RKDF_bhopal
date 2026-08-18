<?php
$files = [
    'research/Project List.pdf',
    'research/Projects At a Glance.PDF',
    'research/R&D Presentation.pdf',
    'research/R&D FORMATS.rar',
    'research/Funding agencies for Research Projects.pdf',
    'research/List of Publications.pdf',
    'research/List of MoU.pdf',
    'patent.php',
    'research/Conferences__Visits_and_Student_acivities.pdf',
    'Content/Videos/5. Carbon capture plants-Part1.mp4'
];

foreach ($files as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
