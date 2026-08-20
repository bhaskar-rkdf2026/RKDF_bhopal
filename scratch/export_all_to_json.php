<?php
// scratch/export_all_to_json.php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "ERROR: DB Connection failed\n";
    exit(1);
}

$dataDir = __DIR__ . '/../data';
if (!file_exists($dataDir)) {
    mkdir($dataDir, 0777, true);
}

$tables = [
    'site_pages',
    'page_sections',
    'homepage_sections',
    'homepage_items',
    'site_settings',
    'nav_menu_items',
    'footer_links',
    'admin_users'
];

$allData = [];

foreach ($tables as $t) {
    try {
        $rows = $pdo->query("SELECT * FROM `$t`")->fetchAll(PDO::FETCH_ASSOC);
        $allData[$t] = $rows;
        file_put_contents($dataDir . "/{$t}.json", json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo "Exported $t: " . count($rows) . " rows to data/{$t}.json\n";
    } catch (Throwable $e) {
        echo "Error on $t: " . $e->getMessage() . "\n";
    }
}

file_put_contents($dataDir . "/all_cms_data.json", json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Successfully exported all_cms_data.json!\n";
