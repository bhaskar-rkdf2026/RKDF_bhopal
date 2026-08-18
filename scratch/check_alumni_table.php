<?php
require_once __DIR__ . '/../config/db.php';
$pdo = getDbConnection();

try {
    $stmt = $pdo->query("DESCRIBE alumni");
    echo "=== ALUMNI TABLE SCHEMA ===\n";
    print_r($stmt->fetchAll());
} catch (Exception $e) {
    echo "Alumni table does not exist or error: " . $e->getMessage() . "\n";
    
    // Create alumni table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS alumni (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NULL,
        fname VARCHAR(255) NULL,
        gender VARCHAR(50) NULL,
        marital VARCHAR(50) NULL,
        mobile VARCHAR(50) NULL,
        email VARCHAR(255) NULL,
        `add` TEXT NULL,
        enrollment VARCHAR(100) NULL,
        college VARCHAR(255) NULL,
        course VARCHAR(255) NULL,
        branch VARCHAR(255) NULL,
        occupation VARCHAR(255) NULL,
        company VARCHAR(255) NULL,
        job VARCHAR(255) NULL,
        city VARCHAR(255) NULL,
        course_study VARCHAR(255) NULL,
        college_study VARCHAR(255) NULL,
        univ VARCHAR(255) NULL,
        contribute VARCHAR(255) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Created alumni table successfully!\n";
}
