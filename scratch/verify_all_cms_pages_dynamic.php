<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

$stmt = $pdo->query("SELECT COUNT(*) as total_pages FROM site_pages");
$total = $stmt->fetch()['total_pages'];

$secStmt = $pdo->query("SELECT COUNT(*) as total_sections FROM page_sections");
$totalSections = $secStmt->fetch()['total_sections'];

echo "=== RKDF CMS DATABASE SUMMARY ===\n";
echo "Total Active / Editable Pages in DB: {$total}\n";
echo "Total Editable Content Sections & Blocks in DB: {$totalSections}\n\n";

$catStmt = $pdo->query("SELECT category, COUNT(*) as page_count FROM site_pages GROUP BY category");
echo "=== PAGES BY CATEGORY ===\n";
foreach ($catStmt->fetchAll() as $row) {
    echo "  - " . ucfirst($row['category'] ?: 'General') . ": " . $row['page_count'] . " pages\n";
}
