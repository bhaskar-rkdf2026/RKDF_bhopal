<?php
function findVideos($dir) {
    $results = [];
    if (!is_dir($dir)) return $results;
    $files = scandir($dir);
    foreach ($files as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $dir . '/' . $f;
        if (is_dir($path)) {
            $results = array_merge($results, findVideos($path));
        } else {
            if (preg_match('/\.(mp4|webm|ogg|avi|mov)$/i', $f)) {
                $results[] = $path;
            }
        }
    }
    return $results;
}

echo "=== LOCAL VIDEO FILES IN WORKSPACE ===\n";
$videos = findVideos('c:/xampp/htdocs/RKDF-bhopal');
print_r($videos);
