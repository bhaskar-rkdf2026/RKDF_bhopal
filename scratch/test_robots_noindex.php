<?php
ob_start();
include __DIR__ . '/../include/site_settings.php';
include __DIR__ . '/../index.php';
$output = ob_get_clean();

echo "Checking index.php output for robots meta tag:\n";
if (strpos($output, 'name="robots" content="noindex, nofollow"') !== false) {
    echo "✔ Found <meta name=\"robots\" content=\"noindex, nofollow\"> in index.php\n";
} else {
    echo "✖ Not found in index.php\n";
}

$robotsTxt = file_get_contents(__DIR__ . '/../robots.txt');
echo "\nChecking robots.txt:\n" . $robotsTxt . "\n";
