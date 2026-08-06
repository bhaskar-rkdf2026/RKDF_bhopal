<?php
require_once __DIR__ . '/../config/db.php';
try {
    $pdo = getDbConnection();
    echo "DB CONNECTION: OK\n";

    $secCount = $pdo->query("SELECT COUNT(*) FROM homepage_sections")->fetchColumn();
    echo "HOMEPAGE SECTIONS COUNT: " . $secCount . "\n";

    $itemCount = $pdo->query("SELECT COUNT(*) FROM homepage_items")->fetchColumn();
    echo "HOMEPAGE ITEMS COUNT: " . $itemCount . "\n";

    $sections = $pdo->query("SELECT section_key, tag_text, title_main, is_active FROM homepage_sections ORDER BY sort_order ASC")->fetchAll();
    echo "SECTIONS LIST:\n";
    foreach ($sections as $s) {
        echo " - [" . $s['section_key'] . "] (Active: " . $s['is_active'] . "): " . $s['tag_text'] . " | " . $s['title_main'] . "\n";
    }
} catch (Exception $e) {
    echo "DB ERROR: " . $e->getMessage() . "\n";
}
