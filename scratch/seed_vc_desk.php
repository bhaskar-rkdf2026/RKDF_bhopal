<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$pdo = getDbConnection();

$vcMessage = "Higher education in the country is at the threshold of major institutional reforms targeted towards cutting edge R&D and innovations. The major challenges before the upcoming and emerging Universities apart from quality of teaching and learning process are the need of experienced and enlightened faculty. Network of knowledge management, creative teaching and research, strong industry interface and innovative curriculum are the need of the day. Apart from this the Nation is moving forward by implementing NEP2020.\n\nRKDF University is marching towards meeting these challenges to become a 'Global Knowledge Enterprise'. The University has a seamless synergy between Humanities, Social Sciences, Science and Engineering and we are targeting towards breaking molds of traditional departmental boundaries through interdisciplinary approach in teaching and research. We are also striving for creating knowledge network and connections with the national and global professional bodies, international centers of higher learning, industries for skill development and also with the society for sharing fruits of knowledge with the masses.\n\nWe, the RKDF Faculty Members and the Staff along with Our Learned Management are committed to build this University a real knowledge hub and, to work towards shaping the top class career of our students. We are moving ahead to help the villages through our extension programs. For this our resources have been mobilized for strengthening the youth & woman of the nearby village.\n\nWe do welcome your suggestions and feedback if we can work together for further improvement, in turn, enabling us to continue imparting world class education.\n\nWith Best Wishes for Ever to Our Students!";

if ($pdo) {
    // Update site_pages for vc-desk
    $updPage = $pdo->prepare("UPDATE site_pages SET intro_heading = 'Message From The Vice-Chancellor', intro_text = ? WHERE page_slug = 'vc-desk'");
    $updPage->execute([$vcMessage]);

    // Update page_sections for vc-desk
    $pdo->exec("DELETE FROM page_sections WHERE page_slug = 'vc-desk'");

    $ins1 = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES ('vc-desk', 'message', 'Message From The Vice-Chancellor', 'Vice-Chancellor Address', '1', ?, 'images/ai_vice_chancellor/rkdf_vc_campus_innovation.jpg', 'VC Portfolio.pdf', 'VICE-CHANCELLOR ADDRESS', 1, 1)");
    $ins1->execute([$vcMessage]);

    $ins2 = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES ('vc-desk', 'profile', 'Prof. Vijay K. Agrawal', 'Vice-Chancellor', '2', 'M.Sc., D.Phil., PGD (Chem. & Chem. Engg.), Tokyo Institute of Technology, Japan. Email: vc@rkdf.ac.in', 'images/vice-chancellor-prof-vijay.jpg', 'VC Portfolio.pdf', 'VICE-CHANCELLOR', 2, 1)");
    $ins2->execute();

    echo "DB updated for vc-desk.\n";
}

// Update JSON cache
$jsonPages = cms_load_json_file('site_pages.json');
foreach ($jsonPages as &$p) {
    if (($p['page_slug'] ?? '') === 'vc-desk') {
        $p['intro_heading'] = 'Message From The Vice-Chancellor';
        $p['intro_text'] = $vcMessage;
    }
}
cms_save_json_file('site_pages.json', $jsonPages);

$jsonSec = cms_load_json_file('page_sections.json');
$filtered = array_filter($jsonSec, fn($s) => ($s['page_slug'] ?? '') !== 'vc-desk');
$filtered[] = [
    'id' => 219,
    'page_slug' => 'vc-desk',
    'group_key' => 'message',
    'title' => 'Message From The Vice-Chancellor',
    'subtitle' => 'Vice-Chancellor Address',
    'number_val' => '1',
    'text_val' => $vcMessage,
    'image_path' => 'images/ai_vice_chancellor/rkdf_vc_campus_innovation.jpg',
    'link_url' => 'VC Portfolio.pdf',
    'badge_text' => 'VICE-CHANCELLOR ADDRESS',
    'sort_order' => 1,
    'is_active' => 1
];
$filtered[] = [
    'id' => 220,
    'page_slug' => 'vc-desk',
    'group_key' => 'profile',
    'title' => 'Prof. Vijay K. Agrawal',
    'subtitle' => 'Vice-Chancellor',
    'number_val' => '2',
    'text_val' => 'M.Sc., D.Phil., PGD (Chem. & Chem. Engg.), Tokyo Institute of Technology, Japan. Email: vc@rkdf.ac.in',
    'image_path' => 'images/vice-chancellor-prof-vijay.jpg',
    'link_url' => 'VC Portfolio.pdf',
    'badge_text' => 'VICE-CHANCELLOR',
    'sort_order' => 2,
    'is_active' => 1
];
cms_save_json_file('page_sections.json', array_values($filtered));
echo "JSON updated for vc-desk.\n";
