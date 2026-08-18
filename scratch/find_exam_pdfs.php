<?php
function findPdfs($dir) {
    $results = [];
    if (!is_dir($dir)) return $results;
    $files = scandir($dir);
    foreach ($files as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . '/' . $f;
        if (is_dir($path)) {
            $results = array_merge($results, findPdfs($path));
        } else {
            if (preg_match('/(exam|time|table|notice|datesheet|schedule|admit|result|form|verification|mark|degree)/i', $f) && preg_match('/\.pdf$/i', $f)) {
                $results[] = $path;
            }
        }
    }
    return $results;
}

echo "=== EXAM RELATED PDF FILES IN WORKSPACE ===\n";
$pdfs = findPdfs('c:/xampp/htdocs/RKDF-bhopal');
print_r($pdfs);
