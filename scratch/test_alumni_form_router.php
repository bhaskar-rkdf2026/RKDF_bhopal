<?php
$_GET['slug'] = 'alumni-form';
ob_start();
include __DIR__ . '/../page.php';
$outAF = ob_get_clean();

echo "alumni-form Output Length: " . strlen($outAF) . " bytes\n";
echo "Contains 'Alumni Registration & Feedback Portal': " . (strpos($outAF, 'Alumni Registration & Feedback Portal') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Dr. Puneet Dwivedi': " . (strpos($outAF, 'Dr. Puneet Dwivedi') !== false ? 'YES' : 'NO') . "\n";
echo "Contains PDF link 'images/Alumni-form.pdf': " . (strpos($outAF, 'images/Alumni-form.pdf') !== false ? 'YES' : 'NO') . "\n";
echo "Contains Feedback link 'forms/Alumni\'s_Feedback_Form.pdf': " . (strpos($outAF, "forms/Alumni's_Feedback_Form.pdf") !== false ? 'YES' : 'NO') . "\n";
