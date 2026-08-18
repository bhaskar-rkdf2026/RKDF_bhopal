<?php
foreach ([
    'research/Project List.pdf',
    'research/Projects At a Glance.PDF',
    'research/Projects At a Glance.pdf',
    'research/R&D Presentation.pdf',
    'research/R&D FORMATS.rar',
    'Content/Videos/5. Carbon capture plants-Part1.mp4'
] as $f) {
    echo $f . ': ' . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
