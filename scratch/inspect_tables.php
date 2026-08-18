<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== SHOW TABLES in DB ===\n";
$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
print_r($tables);

foreach (['departments', 'staff', 'faculty', 'universities', 'deans', 'hods', 'page_sections'] as $tbl) {
    if (in_array($tbl, $tables)) {
        echo "\n--- Structure of '$tbl' ---\n";
        $stmtDesc = $pdo->query("DESCRIBE `$tbl`");
        print_r($stmtDesc->fetchAll(PDO::FETCH_ASSOC));
    }
}
