<?php
$pdfPath = 'Content/Documents/board_of_management/Board of Management Member.pdf';
$content = file_get_contents($pdfPath);

// Extract printable ASCII/UTF-8 strings from PDF streams
preg_match_all('/[\x20-\x7E\x0A\x0D]{4,}/', $content, $matches);
$strings = array_filter($matches[0], function($s) {
    return preg_match('/[a-zA-Z]{3,}/', $s) && !preg_match('/^(Font|Type|Encoding|Widths|Catalog|Pages|Parent|Resources|ProcSet|MediaBox|Filter|FlateDecode|Length|Stream|obj|endobj|xref|trailer|startxref)/i', trim($s));
});

echo "EXTRACTED PDF STRINGS:\n";
echo implode("\n", array_slice($strings, 0, 100));
