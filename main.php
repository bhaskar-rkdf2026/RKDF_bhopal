<?php
// main.php
declare(strict_types=1);

// Define the full path to the file to avoid path issues
$file = __DIR__ . '/functions.php';

// Check if file exists before including
if (file_exists($file)) {
    include_once $file;
} else {
    http_response_code(500);
    exit('Required file not found.');
}

// Now you can safely use the function
echo greet("John Corner");
