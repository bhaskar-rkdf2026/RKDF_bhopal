<?php
// config/db.php
// Dedicated Database Configuration & Auto-Sync Engine for RKDF Admin Panel & CMS
// Supports Local XAMPP, Live cPanel hosting (rkdfu.org), Environment Variables, JSON Config & Auto-Seeding

// Global SEO No-Index / No-Follow Header
if (!headers_sent()) {
    header("X-Robots-Tag: noindex, nofollow", true);
}

// Check if dynamic db_credentials.json exists
$jsonConfigFile = __DIR__ . '/db_credentials.json';
$jsonConfig = [];
if (file_exists($jsonConfigFile)) {
    $rawJson = @file_get_contents($jsonConfigFile);
    if ($rawJson) {
        $jsonConfig = json_decode($rawJson, true) ?: [];
    }
}

// Default Fallback Database Constants (Overridable via JSON, environment or defined constants)
defined('DB_HOST') || define('DB_HOST', $jsonConfig['db_host'] ?? (getenv('DB_HOST') ?: 'localhost'));
defined('DB_NAME') || define('DB_NAME', $jsonConfig['db_name'] ?? (getenv('DB_NAME') ?: 'rkdf_cms_db'));
defined('DB_USER') || define('DB_USER', $jsonConfig['db_user'] ?? (getenv('DB_USER') ?: 'root'));
defined('DB_PASS') || define('DB_PASS', isset($jsonConfig['db_pass']) ? $jsonConfig['db_pass'] : (getenv('DB_PASS') !== false ? getenv('DB_PASS') : ''));

$GLOBALS['LAST_DB_ERROR'] = '';

/**
 * Establishes a PDO database connection using smart multi-credential detection.
 *
 * @return PDO|null The PDO database connection object or null on failure.
 */
function getDbConnection(): ?PDO {
    static $pdoInstance = null;
    static $alreadyAttempted = false;

    if ($pdoInstance !== null) {
        return $pdoInstance;
    }

    if ($alreadyAttempted) {
        return null;
    }

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];

    // Priority connection candidate list
    $candidates = [
        // 1. Configured Constants / JSON / Environment Variables
        ['host' => DB_HOST, 'user' => DB_USER, 'pass' => DB_PASS, 'db' => DB_NAME],
        
        // 2. Live cPanel credentials found in production environment
        ['host' => 'localhost', 'user' => 'rkhare_prashant', 'pass' => 'Vcwbtbcpii09', 'db' => 'rkhare_rkdfcms'],
        ['host' => 'localhost', 'user' => 'rkhare_prashant', 'pass' => 'Vcwbtbcpii09', 'db' => 'rkhare_result2013'],
        ['host' => 'localhost', 'user' => 'rkhare_prashant', 'pass' => 'Vcwbtbcpii09', 'db' => 'rkdf_cms_db'],

        // 3. Common Local/Staging Credentials
        ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'db' => 'rkdf_cms_db'],
        ['host' => 'localhost', 'user' => 'root', 'pass' => 'rootwdp', 'db' => 'rkdf_cms_db'],
        ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'db' => 'rkdf_bhopal'],
        ['host' => '127.0.0.1', 'user' => 'root', 'pass' => '', 'db' => 'rkdf_cms_db'],
    ];

    // Remove duplicates while preserving order
    $uniqueCandidates = [];
    $seen = [];
    foreach ($candidates as $c) {
        $key = $c['host'] . '|' . $c['user'] . '|' . $c['pass'] . '|' . $c['db'];
        if (!isset($seen[$key])) {
            $seen[$key] = true;
            $uniqueCandidates[] = $c;
        }
    }

    $lastError = '';

    foreach ($uniqueCandidates as $cand) {
        try {
            // First try direct connection to target DB
            $dsn = "mysql:host=" . $cand['host'] . ";dbname=" . $cand['db'] . ";charset=utf8mb4";
            $pdo = new PDO($dsn, $cand['user'], $cand['pass'], $options);

            $pdoInstance = $pdo;
            break;
        } catch (Throwable $e1) {
            $lastError = $e1->getMessage();
            // If database doesn't exist, try connecting without dbname and creating it
            try {
                $dsnNoDb = "mysql:host=" . $cand['host'] . ";charset=utf8mb4";
                $pdoNoDb = new PDO($dsnNoDb, $cand['user'], $cand['pass'], $options);
                $pdoNoDb->exec("CREATE DATABASE IF NOT EXISTS `" . $cand['db'] . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                
                $dsn = "mysql:host=" . $cand['host'] . ";dbname=" . $cand['db'] . ";charset=utf8mb4";
                $pdo = new PDO($dsn, $cand['user'], $cand['pass'], $options);

                $pdoInstance = $pdo;
                break;
            } catch (Throwable $e2) {
                // Continue to next candidate
            }
        }
    }

    $GLOBALS['LAST_DB_ERROR'] = $lastError;
    $alreadyAttempted = true;

    if ($pdoInstance) {
        // Ensure core tables exist and are populated with baseline CMS data
        ensureDatabaseAutoInitialized($pdoInstance);
        return $pdoInstance;
    }

    error_log("RKDF CMS Database Connection Error: " . $lastError);
    return null;
}

/**
 * Checks if the database connection is active and operational.
 */
function isDbConnected(): bool {
    return getDbConnection() !== null;
}

/**
 * Automatically initializes tables and populates data if the database is unseeded.
 */
function ensureDatabaseAutoInitialized(PDO $pdo): void {
    static $checked = false;
    if ($checked) return;
    $checked = true;

    try {
        // Check if site_pages table exists and has records
        $stmt = $pdo->query("SHOW TABLES LIKE 'site_pages'");
        $tableExists = $stmt && $stmt->fetch();

        $needsSeed = false;
        if (!$tableExists) {
            $needsSeed = true;
        } else {
            $count = (int)$pdo->query("SELECT COUNT(*) FROM site_pages")->fetchColumn();
            if ($count === 0) {
                $needsSeed = true;
            }
        }

        if ($needsSeed) {
            syncCompleteDatabase($pdo);
        } else {
            // Ensure hero_bg_image column exists in site_pages
            try {
                $pdo->exec("ALTER TABLE site_pages ADD COLUMN hero_bg_image VARCHAR(255) DEFAULT NULL");
            } catch (Throwable $e) {}
        }
    } catch (Throwable $e) {
        error_log("Database Auto-Init Warning: " . $e->getMessage());
    }
}

/**
 * Synchronizes or seeds the complete CMS schema & data from rkdf_cms_db_complete.sql.
 *
 * @param PDO $pdo Active PDO connection
 * @return array Result summary ['success' => bool, 'message' => string, 'queries' => int]
 */
function syncCompleteDatabase(PDO $pdo): array {
    $sqlFile = __DIR__ . '/../database/rkdf_cms_db_complete.sql';
    if (!file_exists($sqlFile)) {
        $sqlFile = __DIR__ . '/../database/schema.sql';
    }

    if (!file_exists($sqlFile)) {
        return ['success' => false, 'message' => 'SQL dump file not found on server.', 'queries' => 0];
    }

    try {
        $sqlContent = file_get_contents($sqlFile);
        if (empty($sqlContent)) {
            return ['success' => false, 'message' => 'SQL dump file is empty.', 'queries' => 0];
        }

        // Execute queries
        $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
        
        // Split by semicolon statements
        $statements = preg_split('/;\s*[\r\n]+/', $sqlContent);
        $executed = 0;
        foreach ($statements as $stmt) {
            $clean = trim($stmt);
            if (!empty($clean) && !str_starts_with($clean, '--') && !str_starts_with($clean, '/*')) {
                try {
                    $pdo->exec($clean);
                    $executed++;
                } catch (Throwable $exStmt) {
                    // Ignore minor insert duplicate or non-breaking errors
                }
            }
        }

        $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

        // Ensure admin user exists with admin / admin123
        try {
            $adminCheck = $pdo->query("SELECT id FROM admin_users WHERE username = 'admin'")->fetch();
            if (!$adminCheck) {
                $passHash = password_hash('admin123', PASSWORD_DEFAULT);
                $ins = $pdo->prepare("INSERT INTO admin_users (username, password_hash, full_name, email, role) VALUES ('admin', ?, 'RKDF Administrator', 'admin@rkdf.ac.in', 'admin')");
                $ins->execute([$passHash]);
            }
        } catch (Throwable $eAdmin) {}

        return [
            'success' => true,
            'message' => "Successfully synchronized database ($executed statements executed).",
            'queries' => $executed
        ];
    } catch (Throwable $e) {
        return [
            'success' => false,
            'message' => 'Database Sync Error: ' . $e->getMessage(),
            'queries' => 0
        ];
    }
}