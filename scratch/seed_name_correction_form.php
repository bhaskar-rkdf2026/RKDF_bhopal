<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'name-correction-form';
$introText = "The Examination & Academic Registration Branch at RKDF University Bhopal provides an official portal for rectifying spelling errors in Student Name, Father's Name, or Mother's Name on semester marksheets, grade cards, and degree certificates.\n\nStudents seeking name correction must submit the prescribed application form along with a self-attested copy of their 10th/Matriculation Certificate (as official proof of name) and the original erroneous marksheet for replacement.";

// 1. Update site_pages for name-correction-form
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
    'Marksheet Name Correction & Affidavit Portal',
    'examination',
    'EXAMINATION · NAME CORRECTION & AFFIDAVIT CELL',
    'Official application form, affidavit formats, 10th certificate verification guidelines, and step-by-step procedure for correcting spelling errors in student/parent names.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Student & Father Name Correction Secretariat',
    $introText,
    'rkdf, university, bhopal, name correction marksheet, name correction form, affidavit format',
    'Marksheet Name Correction & Affidavit Portal - RKDF University Bhopal. Download official name correction application forms.',
    $pageSlug
]);

// 2. Clear old page_sections for name-correction-form
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$nameCorrForms = [
    // Group 1: Name Correction Forms & Affidavit Samples
    [
        'group' => 'Prescribed Name Correction Forms',
        'title' => 'Official Name & Spelling Correction Application Form',
        'subtitle' => 'Controller of Examinations',
        'badge' => 'NAME CORRECTION FORM',
        'link' => 'exam/Marksheet_Correction_form.PDF',
        'text' => 'Prescribed application form for correcting spelling errors in Student Name, Father\'s Name, or Mother\'s Name on marksheets.'
    ],
    [
        'group' => 'Prescribed Name Correction Forms',
        'title' => 'Sample Affidavit & Identity Verification Format',
        'subtitle' => 'Legal & Examination Secretariat',
        'badge' => 'AFFIDAVIT FORMAT PDF',
        'link' => 'forms/Marksheet_Verification_Form.PDF',
        'text' => 'Draft format for Rs. 50/100 Stamp Paper Notarized Affidavit required for major name spelling rectifications.'
    ],

    // Group 2: Degree Certificate Correction Forms
    [
        'group' => 'Degree Certificate Correction Forms',
        'title' => 'Application Form for Issue / Correction of Degree (English)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE CORRECTION (ENGLISH)',
        'link' => 'forms/Application For English.pdf',
        'text' => 'Official application form for requesting corrected Original Degree / Convocation Certificate in English.'
    ],
    [
        'group' => 'Degree Certificate Correction Forms',
        'title' => 'Application Form for Issue / Correction of Degree (Hindi)',
        'subtitle' => 'Degree Section',
        'badge' => 'DEGREE CORRECTION (HINDI)',
        'link' => 'forms/Application For Hindi.pdf',
        'text' => 'Official application form for requesting corrected Original Degree / Convocation Certificate in Hindi.'
    ]
];

$order = 1;
foreach ($nameCorrForms as $n) {
    $insSec->execute([
        $pageSlug,
        $n['group'],
        $n['title'],
        $n['subtitle'],
        (string)$order,
        $n['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $n['link'],
        $n['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for name-correction-form updated with " . count($nameCorrForms) . " distinct name correction documents!\n";
