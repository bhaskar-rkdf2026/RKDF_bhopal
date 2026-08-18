<?php
$_GET['slug'] = 'rnd-projects';
ob_start();
include __DIR__ . '/../page.php';
$outRP = ob_get_clean();

echo "rnd-projects Output Length: " . strlen($outRP) . " bytes\n";
echo "Contains 'R&D Sponsored Research Projects & Innovation': " . (strpos($outRP, 'R&D Sponsored Research Projects & Innovation') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'DST FUNDED': " . (strpos($outRP, 'DST FUNDED') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'research/Project List.pdf': " . (strpos($outRP, 'research/Project List.pdf') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Video link 'Content/Videos/5. Carbon capture plants-Part1.mp4': " . (strpos($outRP, 'Content/Videos/5. Carbon capture plants-Part1.mp4') !== false ? 'YES' : 'NO') . "\n";
