<?php
require_once __DIR__ . '/../config/db.php';
try {
    $pdo = getDbConnection();
    $cols = [
        'qual_10th', 'qual_12th', 'qual_diploma', 'qual_grad', 'qual_pg',
        'nob1', 'yop1', 'tm1', 'mo1', 'per1',
        'nob2', 'yop2', 'tm2', 'mo2', 'per2',
        'nob3', 'yop3', 'tm3', 'mo3', 'per3',
        'nob4', 'yop4', 'tm4', 'mo4', 'per4',
        'nob5', 'yop5', 'tm5', 'mo5', 'per5'
    ];
    foreach ($cols as $col) {
        try {
            $pdo->exec("ALTER TABLE `online_applications` ADD COLUMN `$col` TEXT NULL;");
            echo "Added column: $col\n";
        } catch (Exception $ex) {
            echo "Column $col already exists or failed: " . $ex->getMessage() . "\n";
        }
    }

    $stmt = $pdo->query("DESCRIBE online_applications");
    echo "\nUPDATED COLUMNS IN online_applications:\n";
    print_r($stmt->fetchAll(PDO::FETCH_COLUMN));
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
