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
function getDbConnection(): ?PDO {
    static $pdoInstance = null;
    if ($pdoInstance !== null) {
        return $pdoInstance;
    }

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdoInstance = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdoInstance;
    } catch (Throwable $e) {
        error_log("CMS Database Connection Warning: " . $e->getMessage());
        return null;
    }
}