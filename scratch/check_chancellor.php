<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$pdo = getDbConnection();
if ($pdo) {
    $rows = $pdo->query("SELECT * FROM page_sections WHERE page_slug='chancellor'")->fetchAll(PDO::FETCH_ASSOC);
    echo "DB rows for chancellor: " . count($rows) . "\n";
    print_r($rows);
}

$json = cms_load_json_file('page_sections.json');
$chanJson = array_filter($json, fn($s) => ($s['page_slug'] ?? '') === 'chancellor');
echo "JSON rows for chancellor: " . count($chanJson) . "\n";
print_r(array_values($chanJson));
