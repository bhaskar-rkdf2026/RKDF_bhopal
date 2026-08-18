<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'student-portal';
$introText = "Welcome to the RKDF University Official Student ERP & Digital Services Portal. This unified gateway provides instant access to student marksheet login, semester examination results, LMS e-learning video lectures, digital library e-resources, admit card downloads, and academic document verification services.\n\nStudents can log in to the live ERP portal using their Enrollment Number and password.";

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
    'Student ERP & Digital Services Portal',
    'examination',
    'EXAMINATION · STUDENT ERP & E-SERVICES PORTAL',
    'Unified digital gateway for student marksheet login, semester admit cards, exam timetables, fee payment, LMS video lectures, and online document verification.',
    'images/lovable/rkdf-students-quad.jpg',
    'RKDF Student ERP & E-Services Gateway',
    $introText,
    'rkdf, university, bhopal, student portal login, erp login, student erp portal',
    'Student ERP & Digital Services Portal - RKDF University Bhopal. Log in to student ERP and access digital campus services.',
    $pageSlug
]);

// 2. Clear old page_sections for student-portal
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$spItems = [
    // Group 1: Core Digital Services & ERP Gateways
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'Student ERP Live Login Portal',
        'subtitle' => 'Official Student Self Service ERP',
        'badge' => 'LIVE ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Access your digital profile, semester grade cards, attendance records, exam admit cards, and online fee payment.'
    ],
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'Declared Examination Results Portal',
        'subtitle' => 'Controller of Examinations Branch',
        'badge' => 'ONLINE RESULTS',
        'link' => 'page.php?slug=result',
        'text' => 'View declared semester results for undergraduate, postgraduate, diploma, BAMS, BHMS, Nursing & Pharmacy programs.'
    ],
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'LMS E-Learning & Video Lectures Portal',
        'subtitle' => 'Faculty E-Content Secretariat',
        'badge' => 'LMS E-LEARNING',
        'link' => 'page.php?slug=lms',
        'text' => 'Access over 1,200 subject video lectures, lecture notes, lab manuals, and digital learning modules.'
    ],
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'E-Resource & Digital Library Portal',
        'subtitle' => 'Central Library Network',
        'badge' => 'DIGITAL LIBRARY',
        'link' => 'page.php?slug=eresource-login',
        'text' => 'Access DELNET, National Digital Library of India (NDLI), e-journals, e-books, and research databases.'
    ],
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'Examination Time Table & Datesheets',
        'subtitle' => 'Exam Scheduling Branch',
        'badge' => 'EXAM TIMETABLE',
        'link' => 'page.php?slug=exam-timetable',
        'text' => 'Download official exam timetables, shift schedules, and datesheets for upcoming semester examinations.'
    ],
    [
        'group' => 'Core Digital Services & ERP Gateways',
        'title' => 'Degree & Marksheet Verification Secretariat',
        'subtitle' => 'Document Verification Cell',
        'badge' => 'VERIFICATION FORMS',
        'link' => 'page.php?slug=verification-form',
        'text' => 'Prescribed application forms and guidelines for degree verification, duplicate marksheets, and background checks.'
    ]
];

$order = 1;
foreach ($spItems as $s) {
    $insSec->execute([
        $pageSlug,
        $s['group'],
        $s['title'],
        $s['subtitle'],
        (string)$order,
        $s['text'],
        'images/lovable/rkdf-students-quad.jpg',
        $s['link'],
        $s['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for student-portal updated with " . count($spItems) . " core student portal service gateways!\n";
