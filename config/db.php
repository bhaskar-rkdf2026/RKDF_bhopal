<?php
// config/db.php

// Database connection parameters
// !! IMPORTANT: Change these values to your actual database credentials !!
// For a production environment, it's highly recommended to use environment variables
// or a more secure configuration management system instead of hardcoding.
const DB_HOST = 'localhost'; // Your database host (e.g., 'localhost', '127.0.0.1')
const DB_NAME = 'vedica_rkdf_results'; // The name of your MySQL database
const DB_USER = 'vedica_rkdfresults';      // Your MySQL username (AVOID 'root' in production, use a dedicated user)
const DB_PASS = 'CcW6JcDUF-Sl01';          // Your MySQL password (LEAVE EMPTY or set your password)

/**
 * Establishes a PDO database connection.
 * This function will connect to the MySQL database using the defined constants.
 * It is configured to throw exceptions on errors for robust error handling.
 *
 * @return PDO The PDO database connection object.
 * @throws PDOException If the database connection fails.
 */
function getDbConnection(): PDO {
    // Data Source Name (DSN) string
    // Specifies the database type (mysql), host, database name, and character set.
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    // PDO options for connection
    $options = [
        // PDO::ATTR_ERRMODE: How PDO handles errors.
        // PDO::ERRMODE_EXCEPTION: Throws PDOException on errors, allowing for try-catch blocks.
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

        // PDO::ATTR_DEFAULT_FETCH_MODE: Default fetch mode for results.
        // PDO::FETCH_ASSOC: Fetches rows as associative arrays (column name => value).
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        // PDO::ATTR_EMULATE_PREPARES: Disable prepared statement emulation.
        // Setting to false ensures that PDO uses native prepared statements,
        // which is more secure against SQL injection and often more performant.
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        // Create a new PDO instance and connect to the database
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo; // Return the established PDO connection object
    } catch (PDOException $e) {
        // Log the detailed database connection error to a file (for debugging, not to users)
        error_log("Database connection error: " . $e->getMessage());

        // Set HTTP response code to 500 (Internal Server Error)
        http_response_code(500);

        // Output a generic, user-friendly error message in JSON format
        // This prevents exposing sensitive database details to the public.
        echo json_encode(['error' => 'Database connection failed. Please try again later.']);

        // Terminate script execution to prevent further processing with a failed connection
        exit();
    }
}