<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection FAILED\n";
    exit(1);
}
echo "DB Connected successfully\n";
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
foreach ($tables as $t) {
    $c = $pdo->query("SELECT COUNT(*) FROM `$t`")->fetchColumn();
    echo "$t: $c rows\n";
}
