<?php
// config/db.php
// Dedicated Database Configuration for RKDF Admin Panel CMS

// Dedicated Database Name for CMS (Isolated from results database)
defined('DB_HOST') || define('DB_HOST', 'localhost');
defined('DB_NAME') || define('DB_NAME', 'rkdf_cms_db');
defined('DB_USER') || define('DB_USER', 'root');
defined('DB_PASS') || define('DB_PASS', '');

/**
 * Establishes a PDO database connection to the dedicated CMS Database.
 * Automatically creates the 'rkdf_cms_db' database if it does not exist yet.
 *
 * @return PDO The PDO database connection object.
 */
function getDbConnection(): PDO {
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        // Try connecting directly to the dedicated CMS database
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // If database doesn't exist, connect to MySQL server and auto-create DB
        try {
            $serverDsn = "mysql:host=" . DB_HOST . ";charset=utf8mb4";
            $serverPdo = new PDO($serverDsn, DB_USER, DB_PASS, $options);
            $serverPdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

            // Re-connect to the created database
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            return new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $ex) {
            // Log error silently
            error_log("CMS Database Error: " . $ex->getMessage());

            // Throw exception for caller or seeder to handle
            throw new Exception("Unable to connect or create CMS database: " . $ex->getMessage());
        }
    }
}