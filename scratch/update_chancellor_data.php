<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$pdo = getDbConnection();
if ($pdo) {
    $upd = $pdo->prepare("UPDATE page_sections SET image_path = 'images/chancellor-dr-sadhna.jpg' WHERE page_slug = 'chancellor' AND (group_key = 'profile' OR title LIKE '%Sadhna%')");
    $upd->execute();
    echo "Updated DB rows for Chancellor: " . $upd->rowCount() . "\n";

    // Also check Vice-Chancellor
    $updVc = $pdo->prepare("UPDATE page_sections SET image_path = 'images/vice-chancellor-prof-vijay.jpg' WHERE page_slug = 'vc-desk' AND (group_key = 'profile' OR title LIKE '%Vijay%')");
    $updVc->execute();
    echo "Updated DB rows for Vice-Chancellor: " . $updVc->rowCount() . "\n";
}

// Update JSON cache
$json = cms_load_json_file('page_sections.json');
foreach ($json as &$s) {
    if (($s['page_slug'] ?? '') === 'chancellor' && (($s['group_key'] ?? '') === 'profile' || strpos($s['title'] ?? '', 'Sadhna') !== false)) {
        $s['image_path'] = 'images/chancellor-dr-sadhna.jpg';
    }
    if (($s['page_slug'] ?? '') === 'vc-desk' && (($s['group_key'] ?? '') === 'profile' || strpos($s['title'] ?? '', 'Vijay') !== false)) {
        $s['image_path'] = 'images/vice-chancellor-prof-vijay.jpg';
    }
}
cms_save_json_file('page_sections.json', $json);
echo "Updated JSON cache successfully.\n";
