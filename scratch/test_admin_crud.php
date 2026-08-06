<?php
require_once __DIR__ . '/../config/db.php';
try {
    $pdo = getDbConnection();
    
    // Simulate updating section metadata for sec_01_numbers
    $stmt = $pdo->prepare("UPDATE homepage_sections SET title_main = 'The University', title_accent = 'in Numbers' WHERE section_key = 'sec_01_numbers'");
    $stmt->execute();
    echo "SECTION UPDATE TEST: SUCCESS\n";

    // Verify
    $stmtVer = $pdo->prepare("SELECT title_main, title_accent FROM homepage_sections WHERE section_key = 'sec_01_numbers'");
    $stmtVer->execute();
    $res = $stmtVer->fetch();
    echo "FETCHED: " . $res['title_main'] . " " . $res['title_accent'] . "\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
