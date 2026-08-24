<?php
$queries = ['engineering', 'pharmacy', 'bams', 'result', 'admission', 'chancellor', 'fees', 'syllabus', 'placement', 'law'];

foreach ($queries as $q) {
    $cmd = 'C:\xampp\php\php.exe -r "$_GET=[\'q\'=>\'' . $q . '\']; include \'api_search.php\';"';
    $output = shell_exec($cmd);
    $data = json_decode($output, true);
    $cnt = $data['count'] ?? 0;
    $top = $data['results'][0]['title'] ?? 'NONE';
    $url = $data['results'][0]['url'] ?? '';
    echo sprintf("Query: %-12s => Found: %-2d | Top Match: %-55s | URL: %s\n", "'$q'", $cnt, $top, $url);
}
