<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

echo "=== PAGE_SECTIONS for staff ===\n";
$stmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = 'staff'");
$stmt->execute();
$sections = $stmt->fetchAll();
var_dump($sections);
