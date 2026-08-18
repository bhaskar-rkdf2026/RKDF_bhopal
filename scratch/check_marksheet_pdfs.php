<?php
foreach([
    'exam/Marksheet_Correction_form.PDF',
    'exam/Marksheet_Correction_form.pdf',
    'forms/Marksheet_Verification_Form.PDF',
    'forms/Marksheet_Verification_Form.pdf',
    'forms/Verification Form.pdf'
] as $f) {
    echo $f . ': ' . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
