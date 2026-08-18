<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'alumni-form';
$introText = "Welcome to the RKDF University Global Alumni Association Membership & Registration Portal. We invite all graduates and alumni scholars across engineering, medical, management, science, agriculture, and humanities disciplines to register, update their contact profiles, submit feedback, and join our global professional network.\n\nAlumni can fill out the online registration form or download printable PDF application forms below.";

// 1. Update site_pages for alumni-form
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
    'Alumni Registration & Feedback Form Portal',
    'student-corner',
    'RKDF GLOBAL ALUMNI NETWORK · REGISTRATION & FEEDBACK',
    'Official registration form, feedback submission, alumni association membership guidelines, and network directory for RKDF University graduates.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Alumni Association Secretariat',
    $introText,
    'rkdf, university, bhopal, alumni form, alumni registration, alumni feedback form',
    'Alumni Registration & Feedback Form Portal - RKDF University Bhopal. Register online or download alumni membership forms.',
    $pageSlug
]);

// 2. Clear old page_sections for alumni-form
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$alumniForms = [
    // Group 1: Registration & Feedback Forms
    [
        'group' => 'Prescribed Alumni Forms & Registration',
        'title' => 'Printable Alumni Registration Form (PDF)',
        'subtitle' => 'Alumni Network Cell',
        'badge' => 'REGISTRATION FORM PDF',
        'link' => 'images/Alumni-form.pdf',
        'text' => 'Official printable membership registration form for joining the RKDF University Global Alumni Association.'
    ],
    [
        'group' => 'Prescribed Alumni Forms & Registration',
        'title' => 'Alumni Academic & Institutional Feedback Form',
        'subtitle' => 'Internal Quality Assurance Cell (IQAC)',
        'badge' => 'FEEDBACK FORM PDF',
        'link' => "forms/Alumni's_Feedback_Form.pdf",
        'text' => 'Prescribed feedback form for alumni to provide recommendations on curriculum, infrastructure, and placements.'
    ],
    [
        'group' => 'Prescribed Alumni Forms & Registration',
        'title' => 'RKDF University Alumni Association Guidelines',
        'subtitle' => 'Alumni Association Constitution',
        'badge' => 'GUIDELINES PDF',
        'link' => 'Download/Alumini_Association_RKDFU.pdf',
        'text' => 'Official constitution, executive body rules, and membership benefits of RKDF Alumni Association.'
    ],
    [
        'group' => 'Prescribed Alumni Forms & Registration',
        'title' => 'Online Alumni Membership Registration Portal',
        'subtitle' => 'Digital Alumni Registry',
        'badge' => 'ONLINE REGISTRATION',
        'link' => 'alumni_reg.php',
        'text' => 'Digital online portal for instant alumni profile registration and network directory entry.'
    ]
];

$order = 1;
foreach ($alumniForms as $af) {
    $insSec->execute([
        $pageSlug,
        $af['group'],
        $af['title'],
        $af['subtitle'],
        (string)$order,
        $af['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $af['link'],
        $af['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for alumni-form updated with " . count($alumniForms) . " alumni documents & links!\n";
