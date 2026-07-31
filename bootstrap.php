<?php
declare(strict_types=1);

/**
 * Secure file include utility.
 */

function include_safe(string $file): void
{
    // Define a whitelist of allowed include paths
    $allowed_paths = [
        realpath(__DIR__ . '/config/db.php'),
        realpath(__DIR__ . '/includes/header.php'),
        realpath(__DIR__ . '/includes/footer.php'),
        realpath(__DIR__ . '/includes/headercall.php'),
    ];

    $real_file = realpath($file);

    if ($real_file === false || !in_array($real_file, $allowed_paths, true)) {
        http_response_code(403);
        exit('Access denied: unauthorized file include.');
    }

    // Use include_once for performance and safety
    include_once $real_file;
}
