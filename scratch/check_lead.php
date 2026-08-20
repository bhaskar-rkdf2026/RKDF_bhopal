<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$pdo = getDbConnection();
if ($pdo) {
    $rows = $pdo->query("SELECT * FROM homepage_items WHERE section_key='sec_02_leadership'")->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);
}
