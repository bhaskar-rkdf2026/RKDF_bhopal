<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'marksheet-form';
$introText = "The Examination Branch Secretariat at RKDF University Bhopal provides official forms and procedures for obtaining Duplicate Marksheets, Corrected Grade Cards, and Transcript Verification documents.\n\nStudents whose original marksheets are lost, damaged, or require spelling/name corrections can download the prescribed application forms below and follow the guidelines for processing.";

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
    'Duplicate & Corrected Marksheet Form',
    'examination',
    'EXAMINATION · MARKSHEET CORRECTION & DUPLICATE',
    'Official application forms and procedures for duplicate grade card issuance, name spelling corrections, and marksheet verification.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Duplicate & Corrected Marksheet Branch',
    $introText,
    'rkdf, university, bhopal, duplicate marksheet form, marksheet correction form, grade card verification',
    'Duplicate & Corrected Marksheet Form - RKDF University Bhopal. Download official marksheet correction forms.',
    $pageSlug
]);

// 2. Clear old page_sections for marksheet-form
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$marksheetForms = [
    // Group 1: Prescribed Application Forms
    [
        'group' => 'Prescribed Marksheet Forms',
        'title' => 'Official Marksheet Correction & Duplicate Form',
        'subtitle' => 'Controller of Examinations Secretariat',
        'badge' => 'MARKSHEET CORRECTION PDF',
        'link' => 'exam/Marksheet_Correction_form.PDF',
        'text' => 'Official application form for requesting duplicate semester marksheets and grade card corrections.'
    ],
    [
        'group' => 'Prescribed Marksheet Forms',
        'title' => 'Marksheet Verification & Grade Card Application',
        'subtitle' => 'Examination Branch',
        'badge' => 'VERIFICATION PDF',
        'link' => 'forms/Marksheet_Verification_Form.PDF',
        'text' => 'Application form for background verification of semester marksheets and consolidated transcripts.'
    ],
    [
        'group' => 'Prescribed Marksheet Forms',
        'title' => 'Official Document & Degree Verification Form',
        'subtitle' => 'Academic Cell',
        'badge' => 'DOCUMENT VERIFICATION PDF',
        'link' => 'forms/Verification Form.pdf',
        'text' => 'Prescribed application form for corporate employers, embassies, and student background checks.'
    ],

    // Group 2: Name Correction & Degree Forms
    [
        'group' => 'Name Correction & Degree Forms',
        'title' => 'Application Form for Issue of Degree (English)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE FORM (ENGLISH)',
        'link' => 'forms/Application For English.pdf',
        'text' => 'Official application form for obtaining Original Degree / Convocation Certificate in English.'
    ],
    [
        'group' => 'Name Correction & Degree Forms',
        'title' => 'Application Form for Issue of Degree (Hindi)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE FORM (HINDI)',
        'link' => 'forms/Application For Hindi.pdf',
        'text' => 'Official application form for obtaining Original Degree / Convocation Certificate in Hindi.'
    ]
];

$order = 1;
foreach ($marksheetForms as $m) {
    $insSec->execute([
        $pageSlug,
        $m['group'],
        $m['title'],
        $m['subtitle'],
        (string)$order,
        $m['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $m['link'],
        $m['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for marksheet-form updated with " . count($marksheetForms) . " marksheet form documents!\n";
