<?php
foreach (['result', 'admission', 'pharmacy', 'chancellor', 'fees'] as $query) {
    $_GET['q'] = $query;
    ob_start();
    include __DIR__ . '/../api_search.php';
    $json = ob_get_clean();
    $data = json_decode($json, true);
    echo "Query: '$query' => Found " . ($data['count'] ?? 0) . " items. Top: " . ($data['results'][0]['title'] ?? 'None') . "\n";
}
