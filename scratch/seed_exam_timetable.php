<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'exam-timetable';
$introText = "Welcome to the Controller of Examinations Secretariat at RKDF University Bhopal. Below are official semester-wise examination timetables, datesheets, and supplementary schedules for all Diploma, Under-Graduate, Post-Graduate, BAMS, BHMS, and Pharmacy courses.\n\nClick on any course datesheet below to view or download the official signed PDF document.";

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
    'Examination Time Table & Datesheets',
    'examination',
    'EXAMINATION · SEMESTER DATESHEETS',
    'Official course-wise semester examination timetables and datesheets across all RKDF University faculties.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Course-wise Examination Schedules',
    $introText,
    'rkdf, university, bhopal, exam timetable, semester datesheet, btech timetable, mba timetable, bams timetable',
    'Examination Time Table & Datesheets - RKDF University Bhopal. Download course-wise exam schedules.',
    $pageSlug
]);

// 2. Clear old page_sections for exam-timetable
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$timetables = [
    // Group 1: Under-Graduate Programmes
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'B.Tech All Branches Exam Timetable',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'B.TECH DATESHEET',
        'link' => 'exam/timetable_june26/B.TECH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination schedule for B.Tech CSE, Mechanical, Civil, ECE, & EE.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'B.Sc (Hons.) Agriculture Exam Timetable',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'AGRICULTURE DATESHEET',
        'link' => 'exam/timetable_june26/B.SC AGRICULTURE TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester theory and practical examination datesheet for B.Sc. Agriculture.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'BBA & BCA (NEP Scheme) Exam Timetable',
        'subtitle' => 'Faculty of Management & Computer Applications',
        'badge' => 'BBA/BCA DATESHEET',
        'link' => 'exam/timetable_june26/BBA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester datesheet for BBA and BCA under National Education Policy scheme.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'B.Pharm All Semesters Exam Timetable',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'PHARMACY DATESHEET',
        'link' => 'exam/timetable_june26/B.PHARM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination schedule for B.Pharmacy 1st to 8th Semesters.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'BAMS 2nd & 3rd Professional Exam Timetable',
        'subtitle' => 'Faculty of Ayurvedic Medicine (RKDF Medical College)',
        'badge' => 'AYUSH DATESHEET',
        'link' => 'exam/timetable_june26/TIME TABLE BAMS 3RD PROFESSIONAL JUNE-2026.pdf',
        'text' => 'Regular and supplementary datesheet for BAMS 2nd & 3rd Professional examinations.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'BHMS Professional Exam Timetable',
        'subtitle' => 'Faculty of Homoeopathy (RKDF Homoeopathic College)',
        'badge' => 'BHMS DATESHEET',
        'link' => 'exam/timetable_sept_24/BHMS Time Table Sep 2024.pdf',
        'text' => 'Professional examination datesheet for BHMS degree program.'
    ],
    [
        'group' => 'Under-Graduate Programmes',
        'title' => 'LL.B & B.A. LL.B All Semesters Exam Timetable',
        'subtitle' => 'Faculty of Law',
        'badge' => 'LAW DATESHEET',
        'link' => 'exam/timetable_june26/LLB TIME TABLE JUNE-2026.pdf',
        'text' => 'Datesheet for 3-Year LL.B and 5-Year Integrated B.A. LL.B courses.'
    ],

    // Group 2: Post-Graduate Programmes
    [
        'group' => 'Post-Graduate Programmes',
        'title' => 'M.Tech All Specializations Exam Timetable',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'M.TECH DATESHEET',
        'link' => 'exam/timetable_june26/M.TECH TIME TABLE JUNE-2026.pdf',
        'text' => 'End-semester datesheet for M.Tech Structural, Power Systems, & Thermal Engineering.'
    ],
    [
        'group' => 'Post-Graduate Programmes',
        'title' => 'MBA All Specializations Exam Timetable',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'MBA DATESHEET',
        'link' => 'exam/timetable_june26/MBA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination schedule for MBA Finance, HR, Marketing, & International Business.'
    ],
    [
        'group' => 'Post-Graduate Programmes',
        'title' => 'MCA & M.Sc (NEP Scheme) Exam Timetable',
        'subtitle' => 'Faculty of Science & Computer Applications',
        'badge' => 'MCA/M.SC DATESHEET',
        'link' => 'exam/timetable_june26/MCA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester datesheet for MCA and M.Sc Physics, Chemistry, Biotech, & Math.'
    ],
    [
        'group' => 'Post-Graduate Programmes',
        'title' => 'M.Pharm All Branches Exam Timetable',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'M.PHARM DATESHEET',
        'link' => 'exam/timetable_june26/M.PHARM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester datesheet for M.Pharm Pharmaceutics, Pharmacology, & Chemistry.'
    ],
    [
        'group' => 'Post-Graduate Programmes',
        'title' => 'M.D. Homoeopathy Part-1 Exam Timetable',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'M.D. HOMOEOPATHY',
        'link' => 'exam/timetable_april_26/HOMOEOPATHY M.D PART-1 TIME TABLE APRIL-2026.pdf',
        'text' => 'Examination schedule for M.D. Homoeopathy Part-1 degree candidates.'
    ],

    // Group 3: Diploma & Paramedical Programmes
    [
        'group' => 'Diploma & Paramedical Programmes',
        'title' => 'Polytechnic Diploma Engineering Exam Timetable',
        'subtitle' => 'Faculty of Engineering (Diploma Wing)',
        'badge' => 'DIPLOMA ENGG',
        'link' => 'exam/timetable_june26/DIPLOMA ENGG TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination schedule for Polytechnic Diploma in Civil, Mech, & Electrical.'
    ],
    [
        'group' => 'Diploma & Paramedical Programmes',
        'title' => 'D.Pharmacy Supplementary Exam Timetable',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'D.PHARM DATESHEET',
        'link' => 'exam/timetable_aug26/D.PHARM SUPPLEMENTARY  EXAM TIME TABLE AUGUST -2026.pdf',
        'text' => 'Supplementary examination timetable for Diploma in Pharmacy.'
    ],
    [
        'group' => 'Diploma & Paramedical Programmes',
        'title' => 'DMLT & BMLT Paramedical Exam Timetable',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'PARAMEDICAL DATESHEET',
        'link' => 'exam/timetable_june26/DMLT TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester datesheet for Diploma and Degree in Medical Lab Technology.'
    ]
];

$order = 1;
foreach ($timetables as $t) {
    $insSec->execute([
        $pageSlug,
        $t['group'],
        $t['title'],
        $t['subtitle'],
        (string)$order,
        $t['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $t['link'],
        $t['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for exam-timetable updated with " . count($timetables) . " course timetables!\n";
