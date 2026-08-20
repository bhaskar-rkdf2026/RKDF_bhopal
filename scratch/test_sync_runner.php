<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();
if (!$pdo) {
    echo "ERROR: DB Connection failed\n";
    exit(1);
}

$res = syncCompleteDatabase($pdo);
echo "Result: " . json_encode($res) . "\n";

$pagesCount = (int)$pdo->query("SELECT COUNT(*) FROM site_pages")->fetchColumn();
$cardsCount = (int)$pdo->query("SELECT COUNT(*) FROM page_sections")->fetchColumn();
$secCount   = (int)$pdo->query("SELECT COUNT(*) FROM homepage_sections")->fetchColumn();
$itemCount  = (int)$pdo->query("SELECT COUNT(*) FROM homepage_items")->fetchColumn();

echo "Site Pages: $pagesCount\n";
echo "Page Sections: $cardsCount\n";
echo "Homepage Sections: $secCount\n";
echo "Homepage Items: $itemCount\n";
