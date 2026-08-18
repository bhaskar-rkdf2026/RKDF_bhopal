<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'privacy';
$introText = "RKDF University Bhopal is committed to protecting the privacy, confidentiality, and security of personal information collected from students, graduates, faculty, and institutional partners.\n\nThis Privacy Policy outlines the standards governing personal data protection, employee confidentiality agreements, and authorized disclosures under university regulations.";

// 1. Update/Insert site_pages for privacy
$stmtCheck = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmtCheck->execute([$pageSlug]);
if ($stmtCheck->fetch()) {
    $updateStmt = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
    $updateStmt->execute([
        'Institutional Privacy Policy',
        'About Us',
        'DATA PROTECTION · PRIVACY POLICY',
        'Official privacy policy governing personal data protection, confidentiality agreements, and student record security.',
        'images/lovable/rkdf-why-bg.jpg',
        'Personal Data Protection & Security Framework',
        $introText,
        $pageSlug
    ]);
} else {
    $insStmt = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $insStmt->execute([
        $pageSlug,
        'Institutional Privacy Policy',
        'About Us',
        'DATA PROTECTION · PRIVACY POLICY',
        'Official privacy policy governing personal data protection, confidentiality agreements, and student record security.',
        'images/lovable/rkdf-why-bg.jpg',
        'Personal Data Protection & Security Framework',
        $introText
    ]);
}

// 2. Clear old page_sections for privacy
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$privacyList = [
    [
        'title' => 'Personal Data Security & Employee NDA Agreements',
        'sub' => 'Confidentiality Protocol',
        'badge' => 'DATA SECURITY',
        'text' => 'The University protects personal information collected from students, graduates, staff, and business partners. All full-time and part-time employees and student interns sign an Employee Non-Disclosure and Confidentiality Agreement.'
    ],
    [
        'title' => 'Authorized Access & Academic Need-to-Know Limits',
        'sub' => 'Access Control',
        'badge' => 'ACCESS CONTROL',
        'text' => 'Access to personal records is restricted to: (1) Individuals accessing their own records, (2) Employees with legitimate academic need, (3) Authorized third parties, and (4) Legal or statutory bodies compelled by law.'
    ],
    [
        'title' => 'Non-Commercial Data Use & Marketing Disclosure Protection',
        'sub' => 'No Commercial Sale',
        'badge' => 'NO MARKETING SALE',
        'text' => 'RKDF University does not sell, rent, or trade student personal information to third parties for marketing purposes.'
    ],
    [
        'title' => 'Degree Verification & Public Academic Standing Inquiries',
        'sub' => 'Verification Inquiries',
        'badge' => 'VERIFICATION STANDING',
        'text' => 'The University may confirm public inquiries as to whether an individual holds a degree or diploma in good standing from RKDF University through official portals.'
    ],
    [
        'title' => 'Professional Bodies & Association Membership Benefits',
        'sub' => 'Professional Associations',
        'badge' => 'PROFESSIONAL BODIES',
        'text' => 'Limited name and address information may be shared with recognized professional industry organizations (e.g. AICTE, PCI, BCI, DELNET) solely for membership eligibility and professional benefits.'
    ]
];

$order = 1;
foreach ($privacyList as $p) {
    $insSec->execute([
        $pageSlug,
        'Statutory Privacy Standards',
        $p['title'],
        $p['sub'],
        (string)$order,
        $p['text'],
        'images/lovable/rkdf-why-bg.jpg',
        '#',
        $p['badge'],
        $order
    ]);
    $order++;
}

echo "Seeded privacy page in CMS DB with " . count($privacyList) . " statutory privacy standards!\n";
