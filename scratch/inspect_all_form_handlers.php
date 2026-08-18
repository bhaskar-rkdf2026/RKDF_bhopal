<?php
$formsToInspect = [
    'admissionform.php',
    'alumni_reg.php',
    'Verification_Form.php',
    'Marksheet_Form.php',
    'Name_Correction_Form.php',
    'Migration_Hindi.php',
    'Migration_English.php',
    'contact-us.php',
    'rcp.php',
    'feedback.php',
    'admissionquery.php',
    'Careers.php'
];

$root = realpath(__DIR__ . '/..');

foreach ($formsToInspect as $fn) {
    $full = $root . '/' . $fn;
    if (file_exists($full)) {
        $content = file_get_contents($full);
        $hasPost = (strpos($content, '$_POST') !== false || strpos($content, 'REQUEST_METHOD') !== false);
        $hasDbInsert = (preg_match('/INSERT\s+INTO/i', $content) || preg_match('/pdo->prepare/i', $content));
        
        echo "File: {$fn}\n";
        echo "   - Handles POST/Submit: " . ($hasPost ? 'YES' : 'NO') . "\n";
        echo "   - Contains DB INSERT: " . ($hasDbInsert ? 'YES' : 'NO') . "\n";
        
        // Find table name if inserted
        if (preg_match('/INSERT\s+INTO\s+[`]?([a-zA-Z0-9_]+)[`]?/i', $content, $m)) {
            echo "   - Target Table: {$m[1]}\n";
        }
        echo "\n";
    } else {
        echo "File: {$fn} -> NOT FOUND\n\n";
    }
}
