<?php
echo "=== scholarship.php ===\n";
if (file_exists(__DIR__ . '/../scholarship.php')) {
    $c = file_get_contents(__DIR__ . '/../scholarship.php');
    echo "Length: " . strlen($c) . " bytes\n";
    echo "First 10 lines:\n" . implode("\n", array_slice(explode("\n", $c), 0, 10)) . "\n";
} else {
    echo "NOT FOUND\n";
}

echo "\n=== admissionform.php ===\n";
if (file_exists(__DIR__ . '/../admissionform.php')) {
    $c2 = file_get_contents(__DIR__ . '/../admissionform.php');
    echo "Length: " . strlen($c2) . " bytes\n";
    echo "First 10 lines:\n" . implode("\n", array_slice(explode("\n", $c2), 0, 10)) . "\n";
} else {
    echo "NOT FOUND\n";
}
