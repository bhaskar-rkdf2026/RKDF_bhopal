<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'terms&condition';
$introText = "Welcome to the official web portal of RKDF University Bhopal. By accessing or using this website, online admission forms, or student ERP services, you agree to comply with and be bound by the following Terms & Conditions of use.\n\nPlease read these statutory terms carefully before accessing university e-services.";

// 1. Update/Insert site_pages for terms&condition
$stmtCheck = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmtCheck->execute([$pageSlug]);
if ($stmtCheck->fetch()) {
    $updateStmt = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
    $updateStmt->execute([
        'Terms & Conditions of Use',
        'About Us',
        'LEGAL & COMPLIANCE · TERMS OF USE',
        'Official terms and conditions governing the use of RKDF University website, online admission portal, and ERP e-services.',
        'images/lovable/rkdf-why-bg.jpg',
        'Website Terms & Conditions Framework',
        $introText,
        $pageSlug
    ]);
} else {
    $insStmt = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $insStmt->execute([
        $pageSlug,
        'Terms & Conditions of Use',
        'About Us',
        'LEGAL & COMPLIANCE · TERMS OF USE',
        'Official terms and conditions governing the use of RKDF University website, online admission portal, and ERP e-services.',
        'images/lovable/rkdf-why-bg.jpg',
        'Website Terms & Conditions Framework',
        $introText
    ]);
}

// 2. Clear old page_sections for terms&condition
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$termsList = [
    [
        'title' => 'General Information & Website Content Usage',
        'sub' => 'Clause 01',
        'badge' => 'TERM 01',
        'text' => 'The content of the pages of this website is for your general information and academic use only. It is subject to change without prior notice.'
    ],
    [
        'title' => 'Warranty & Disclaimer of Accuracy',
        'sub' => 'Clause 02',
        'badge' => 'TERM 02',
        'text' => 'Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose.'
    ],
    [
        'title' => 'User Risk & Service Requirements',
        'sub' => 'Clause 03',
        'badge' => 'TERM 03',
        'text' => 'Your use of any information or materials on this website is entirely at your own risk. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements.'
    ],
    [
        'title' => 'Reservation of Right to Refuse Service',
        'sub' => 'Clause 04',
        'badge' => 'TERM 04',
        'text' => 'RKDF University reserves the right to refuse service, reject applications, or restrict portal access to anyone at any time in accordance with university regulations.'
    ],
    [
        'title' => 'Intellectual Property & Copyright Protection',
        'sub' => 'Clause 05',
        'badge' => 'TERM 05',
        'text' => 'This website contains material which is owned by or licensed to us, including design, layout, look, graphics, and trademarks. Reproduction is prohibited except in accordance with copyright law.'
    ],
    [
        'title' => 'Trademark Acknowledgment',
        'sub' => 'Clause 06',
        'badge' => 'TERM 06',
        'text' => 'All trademarks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.'
    ],
    [
        'title' => 'Unauthorized Use & Penalties',
        'sub' => 'Clause 07',
        'badge' => 'TERM 07',
        'text' => 'Unauthorized use, hacking, or tampering with this website or database may give rise to a claim for damages and/or be a criminal offense under Indian IT Law.'
    ],
    [
        'title' => 'External Links & Hyperlinks Disclaimer',
        'sub' => 'Clause 08',
        'badge' => 'TERM 08',
        'text' => 'This website may include links to external portals (such as NTA, UGC, DELNET). These links are provided for convenience and do not signify university endorsement.'
    ],
    [
        'title' => 'Linking Policy',
        'sub' => 'Clause 09',
        'badge' => 'TERM 09',
        'text' => 'You may not create a hyperlink to this website from another website or document without prior written consent from RKDF University administration.'
    ],
    [
        'title' => 'Governing Law & Legal Jurisdiction',
        'sub' => 'Clause 10',
        'badge' => 'TERM 10',
        'text' => 'Your use of this website and any legal dispute arising out of such use is subject to the laws of India and falls exclusively under the jurisdiction of the Courts of Bhopal, Madhya Pradesh.'
    ]
];

$order = 1;
foreach ($termsList as $t) {
    $insSec->execute([
        $pageSlug,
        'Statutory Terms of Use Clauses',
        $t['title'],
        $t['sub'],
        (string)$order,
        $t['text'],
        'images/lovable/rkdf-why-bg.jpg',
        '#',
        $t['badge'],
        $order
    ]);
    $order++;
}

echo "Seeded terms&condition page in CMS DB with " . count($termsList) . " statutory clauses!\n";
