<?php
$pdfPath = 'Content/Documents/board_of_management/Board of Management Member.pdf';
$pdfData = file_get_contents($pdfPath);

$soi = "\xFF\xD8\xFF";
$eoi = "\xFF\xD9";

$offset = 0;
$imgCount = 0;
$outDir = __DIR__ . '/pdf_images';
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

if ($imgCount === 0) {
    echo "No raw JPEGs found with SOI/EOI markers.\n";
}
