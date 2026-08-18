<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'contact-us';
$introText = "RKDF University Bhopal welcomes inquiries from prospective students, parents, research scholars, corporate recruiters, and visitors.\n\nReach out to our campus offices, administrative deans, toll-free admission helpline, or submit your query online below.";

// 1. Update/Insert site_pages for contact-us
$stmtCheck = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmtCheck->execute([$pageSlug]);
if ($stmtCheck->fetch()) {
    $updateStmt = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
    $updateStmt->execute([
        'Contact Us & Campus Directory',
        'About Us',
        'CONNECT WITH US · RKDF CAMPUS DIRECTORY',
        'Campus address, official email contacts, administrative office phone numbers, toll-free admission helplines, and location map.',
        'images/lovable/rkdf-why-bg.jpg',
        'Get in Touch with RKDF University',
        $introText,
        $pageSlug
    ]);
} else {
    $insStmt = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $insStmt->execute([
        $pageSlug,
        'Contact Us & Campus Directory',
        'About Us',
        'CONNECT WITH US · RKDF CAMPUS DIRECTORY',
        'Campus address, official email contacts, administrative office phone numbers, toll-free admission helplines, and location map.',
        'images/lovable/rkdf-why-bg.jpg',
        'Get in Touch with RKDF University',
        $introText
    ]);
}

// 2. Clear old page_sections for contact-us
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$contactCards = [
    [
        'group' => 'Key Offices',
        'title' => 'Admissions Cell & General Enquiries',
        'sub' => 'Main Admission Desk',
        'badge' => 'TOLL FREE: 1800 270 0320',
        'link' => 'tel:18002700320',
        'text' => 'Direct Admission Phone: +91 755 2751 000 / 2740395. Email: admissions@rkdf.ac.in, rkdfuniversitybpl@gmail.com'
    ],
    [
        'group' => 'Key Offices',
        'title' => 'Vice Chancellor (VC) Secretariat',
        'sub' => 'VC Office',
        'badge' => 'PHONE: +91 755 2740395',
        'link' => 'tel:+917552740395',
        'text' => 'Vice Chancellor Office. Email: vc@rkdf.ac.in. Location: Central Administrative Block.'
    ],
    [
        'group' => 'Key Offices',
        'title' => 'Registrar Secretariat & Legal Cell',
        'sub' => 'Registrar Office',
        'badge' => 'PHONE: +91 755 2740395',
        'link' => 'tel:+917552740395',
        'text' => 'Office of the Registrar. Email: registrar@rkdf.ac.in. Official administrative correspondence.'
    ],
    [
        'group' => 'Key Offices',
        'title' => 'Campus Address & Location',
        'sub' => 'Bhopal Main Campus',
        'badge' => 'PIN: 462033',
        'link' => '#map',
        'text' => 'RKDF University, Airport Bypass Road, Gandhi Nagar, Bhopal, Madhya Pradesh 462033, India.'
    ]
];

$order = 1;
foreach ($contactCards as $c) {
    $insSec->execute([
        $pageSlug,
        $c['group'],
        $c['title'],
        $c['sub'],
        (string)$order,
        $c['text'],
        'images/img/contact us.jpeg',
        $c['link'],
        $c['badge'],
        $order
    ]);
    $order++;
}

echo "Seeded contact-us page in CMS DB with " . count($contactCards) . " contact entries!\n";
