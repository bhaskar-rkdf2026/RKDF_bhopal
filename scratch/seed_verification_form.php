<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'verification-form';
$introText = "The Examination Branch Secretariat at RKDF University Bhopal provides official background verification services for degrees, diplomas, marksheets, and academic transcripts. Employers, background verification agencies, embassies, and alumni scholars can download the prescribed verification application forms below and follow the guidelines for processing.\n\nAll verification requests are processed by the Controller of Examinations after physical verification against original university Tabulation Registers (TR).";

// 1. Update site_pages
$updateStmt = $pdo->prepare("UPDATE site_pages SET 
    page_title = ?,
    category = ?,
    eyebrow = ?,
    hero_subtitle = ?,
    hero_bg_image = ?,
    intro_heading = ?,
    intro_text = ?,
    meta_keywords = ?,
    meta_description = ?,
    is_active = 1
    WHERE page_slug = ?");
$updateStmt->execute([
    'Document Verification Form & Guidelines',
    'examination',
    'EXAMINATION · DEGREE & MARKSHEET VERIFICATION',
    'Official background check, degree verification application forms, fee details, and submission guidelines for corporate employers and alumni.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Degree & Marksheet Verification Secretariat',
    $introText,
    'rkdf, university, bhopal, document verification form, degree verification, marksheet verification',
    'Document Verification Form & Guidelines - RKDF University Bhopal. Download official degree verification forms.',
    $pageSlug
]);

// 2. Clear old page_sections for verification-form
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$verForms = [
    // Group 1: Prescribed Verification Application Forms
    [
        'group' => 'Prescribed Verification Application Forms',
        'title' => 'Official Student Degree & Marksheet Verification Form',
        'subtitle' => 'Controller of Examinations Secretariat',
        'badge' => 'VERIFICATION FORM PDF',
        'link' => 'forms/Verification Form.pdf',
        'text' => 'Prescribed application form for corporate employers, MNC background check agencies, and student degree verifications.'
    ],
    [
        'group' => 'Prescribed Verification Application Forms',
        'title' => 'Marksheet Verification & Duplicate Grade Card Application',
        'subtitle' => 'Examination Branch',
        'badge' => 'MARKSHEET FORM PDF',
        'link' => 'forms/Marksheet_Verification_Form.PDF',
        'text' => 'Official application form for marksheet verification, duplicate marksheet issuance, and grade corrections.'
    ],
    [
        'group' => 'Prescribed Verification Application Forms',
        'title' => 'Revised Academic Document Verification Form (2025-26)',
        'subtitle' => 'Academic Affairs Cell',
        'badge' => 'REVISED FORM PDF',
        'link' => 'forms/Verification Form-29-June-2025.pdf',
        'text' => 'Updated verification form detailing revised fee structure and international verification requirements.'
    ],

    // Group 2: Degree Issue & Migration Application Forms
    [
        'group' => 'Degree Issue & Migration Application Forms',
        'title' => 'Application Form for Issue of Degree (English)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE FORM (ENGLISH)',
        'link' => 'forms/Application For English.pdf',
        'text' => 'Official application form for obtaining Original Degree / Convocation Certificate in English.'
    ],
    [
        'group' => 'Degree Issue & Migration Application Forms',
        'title' => 'Application Form for Issue of Degree (Hindi)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE FORM (HINDI)',
        'link' => 'forms/Application For Hindi.pdf',
        'text' => 'Official application form for obtaining Original Degree / Convocation Certificate in Hindi.'
    ]
];

$order = 1;
foreach ($verForms as $v) {
    $insSec->execute([
        $pageSlug,
        $v['group'],
        $v['title'],
        $v['subtitle'],
        (string)$order,
        $v['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $v['link'],
        $v['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for verification-form updated with " . count($verForms) . " verification form documents!\n";
