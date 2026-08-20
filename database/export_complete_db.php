<?php
// database/export_complete_db.php
// Exports complete schema and all records from rkdf_cms_db into database/rkdf_cms_db_complete.sql

require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "ERROR: Unable to connect to local database.\n";
    exit(1);
}

$outputFile = __DIR__ . '/rkdf_cms_db_complete.sql';
$handle = fopen($outputFile, 'w');
if (!$handle) {
    echo "ERROR: Unable to open $outputFile for writing.\n";
    exit(1);
}

fwrite($handle, "-- ============================================================\n");
fwrite($handle, "-- RKDF University Bhopal — Complete CMS Database Dump\n");
fwrite($handle, "-- Generated: " . date('Y-m-d H:i:s') . "\n");
fwrite($handle, "-- Includes all 119 Site Pages, 549 Section Cards, Homepage, Menu & Settings\n");
fwrite($handle, "-- ============================================================\n\n");
fwrite($handle, "SET NAMES utf8mb4;\n");
fwrite($handle, "SET FOREIGN_KEY_CHECKS = 0;\n\n");

$tables = [
    'admin_users',
    'site_settings',
    'homepage_sections',
    'homepage_items',
    'site_pages',
    'page_sections',
    'nav_menu_items',
    'footer_links',
    'subpages',
    'subpage_items',
    'online_applications',
    'alumni',
    'verification_requests',
    'marksheet_requests',
    'migration_requests',
    'name_correction_requests',
    'contact_submissions',
    'feedback_submissions',
    'career_applications'
];

$existingTables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    if (!in_array($table, $existingTables)) {
        continue;
    }

    echo "Exporting table: $table ...\n";
    fwrite($handle, "-- ------------------------------------------------------------\n");
    fwrite($handle, "-- Table structure for `$table`\n");
    fwrite($handle, "-- ------------------------------------------------------------\n");

    $createStmt = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
    $createSql = $createStmt['Create Table'] ?? '';
    // Replace CREATE TABLE with CREATE TABLE IF NOT EXISTS
    $createSql = preg_replace('/^CREATE TABLE/i', 'CREATE TABLE IF NOT EXISTS', $createSql);
    fwrite($handle, $createSql . ";\n\n");

    // Fetch rows
    $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    $rowCount = count($rows);
    echo "  -> Found $rowCount rows.\n";

    if ($rowCount > 0) {
        fwrite($handle, "-- Dumping data for `$table` ($rowCount rows)\n");
        // Get column names
        $cols = array_keys($rows[0]);
        $escapedCols = array_map(function($c) { return "`$c`"; }, $cols);
        $colList = implode(', ', $escapedCols);

        // Chunk inserts by 50 rows
        $chunks = array_chunk($rows, 50);
        foreach ($chunks as $chunk) {
            $valueLines = [];
            foreach ($chunk as $row) {
                $escapedVals = [];
                foreach ($row as $val) {
                    if ($val === null) {
                        $escapedVals[] = "NULL";
                    } else {
                        $escapedVals[] = $pdo->quote($val);
                    }
                }
                $valueLines[] = "(" . implode(', ', $escapedVals) . ")";
            }
            fwrite($handle, "REPLACE INTO `$table` ($colList) VALUES\n" . implode(",\n", $valueLines) . ";\n");
        }
        fwrite($handle, "\n");
    }
}

fwrite($handle, "SET FOREIGN_KEY_CHECKS = 1;\n");
fclose($handle);

echo "\nSUCCESS: Database successfully exported to: $outputFile (" . round(filesize($outputFile) / 1024, 2) . " KB)\n";
