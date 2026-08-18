<?php
$pdfPath = 'Content/Documents/academic_council/Academic Council Members 2024.pdf';
$pdfData = file_get_contents($pdfPath);

echo "PDF Size: " . strlen($pdfData) . " bytes\n";

// First check if text can be extracted directly
preg_match_all('/[\x20-\x7E\x0A\x0D]{4,}/', $pdfData, $matches);
$strings = array_filter($matches[0], function($s) {
    return preg_match('/[a-zA-Z]{3,}/', $s) && !preg_match('/^(Font|Type|Encoding|Widths|Catalog|Pages|Parent|Resources|ProcSet|MediaBox|Filter|FlateDecode|Length|Stream|obj|endobj|xref|trailer|startxref)/i', trim($s));
});

echo "Text Strings Count: " . count($strings) . "\n";

// Extract raw JPEG images from PDF streams
$soi = "\xFF\xD8\xFF";
$eoi = "\xFF\xD9";

$offset = 0;
$imgCount = 0;
$outDir = __DIR__ . '/ac_pdf_images';
if (!file_exists($outDir)) {
    mkdir($outDir, 0777, true);
}

while (($start = strpos($pdfData, $soi, $offset)) !== false) {
    $end = strpos($pdfData, $eoi, $start);
    if ($end !== false) {
        $end += 2;
        $jpegData = substr($pdfData, $start, $end - $start);
        $imgCount++;
        $imgPath = $outDir . "/page_{$imgCount}.jpg";
        file_put_contents($imgPath, $jpegData);
        echo "Extracted JPEG {$imgCount}: " . strlen($jpegData) . " bytes -> {$imgPath}\n";
        $offset = $end;
    } else {
        break;
    }
}
