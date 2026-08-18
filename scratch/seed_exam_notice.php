<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'exam-notice';
$introText = "Welcome to the Controller of Examinations Secretariat at RKDF University Bhopal. Official examination circulars, semester datesheets, admit card notifications, revaluation forms, and fee payment deadlines for all undergraduate, postgraduate, diploma, and doctoral courses are published below.\n\nStudents can view and download official signed PDF notifications and datesheets directly.";

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
    'Examination Notices & Datesheets',
    'examination',
    'EXAMINATION · NOTICES & CIRCULARS',
    'Controller of Examinations notifications, semester datesheets, exam fee circulars, and revaluation forms.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Examination Branch Secretariat Notifications',
    $introText,
    'rkdf, university, bhopal, examination notice, exam timetable, datesheet, revaluation form',
    'Examination Notices & Datesheets - RKDF University Bhopal. Download official exam notifications and datesheets.',
    $pageSlug
]);

// 2. Clear old page_sections for exam-notice
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$examNotices = [
    // Category 1: Official Notifications & Circulars
    [
        'group_key' => 'Official Exam Circulars',
        'title' => 'Official Semester Examination Notification',
        'subtitle' => 'Controller of Examinations',
        'badge_text' => 'OFFICIAL NOTICE',
        'link_url' => 'images/exam_notice.pdf',
        'text_val' => 'Official notification regarding end-semester examination rules, admit card distribution, and exam hall instructions.'
    ],
    [
        'group_key' => 'Official Exam Circulars',
        'title' => 'Exam Fee Circular — BHMS & Paramedical Courses',
        'subtitle' => 'Examination Branch',
        'badge_text' => 'FEE CIRCULAR',
        'link_url' => 'exam/timetable_sept_24/notices/Circular - Exam Fees BHMS & Paramedical Aug 2024.pdf',
        'text_val' => 'Notification regarding examination fee submission deadlines and fine schedules for BHMS and Paramedical students.'
    ],
    [
        'group_key' => 'Official Exam Circulars',
        'title' => 'B.E. Lateral Entry Examination Circular',
        'subtitle' => 'Faculty of Engineering',
        'badge_text' => 'LATERAL ENTRY NOTICE',
        'link_url' => 'images/NOTICE_BE_LETRAL.pdf',
        'text_val' => 'Notice for lateral entry B.E. students regarding practical and theory examination timetables.'
    ],

    // Category 2: Semester Datesheets & Timetables
    [
        'group_key' => 'Semester Exam Timetables',
        'title' => 'B.Tech All Branches Exam Timetable',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge_text' => 'B.TECH DATESHEET',
        'link_url' => 'exam/timetable_june26/B.TECH TIME TABLE JUNE-2026.pdf',
        'text_val' => 'Complete semester-wise examination schedule for B.Tech CSE, Mechanical, Civil, Electrical & ECE branches.'
    ],
    [
        'group_key' => 'Semester Exam Timetables',
        'title' => 'B.Sc Agriculture Semester Exam Timetable',
        'subtitle' => 'Faculty of Agriculture',
        'badge_text' => 'AGRICULTURE DATESHEET',
        'link_url' => 'exam/timetable_june26/B.SC AGRICULTURE TIME TABLE JUNE-2026.pdf',
        'text_val' => 'End-semester theory and practical examination timetable for B.Sc. (Hons.) Agriculture.'
    ],
    [
        'group_key' => 'Semester Exam Timetables',
        'title' => 'BBA & MBA All Specializations Exam Timetable',
        'subtitle' => 'Faculty of Management',
        'badge_text' => 'MANAGEMENT DATESHEET',
        'link_url' => 'exam/timetable_june26/MBA TIME TABLE JUNE-2026.pdf',
        'text_val' => 'Semester examination datesheet for BBA and MBA (Finance, Marketing, HR, IT, IB).'
    ],
    [
        'group_key' => 'Semester Exam Timetables',
        'title' => 'BCA & MCA NEP Semester Exam Timetable',
        'subtitle' => 'Faculty of Computer Applications',
        'badge_text' => 'BCA/MCA DATESHEET',
        'link_url' => 'exam/timetable_june26/BCA NEP TIME TABLE JUNE-2026.pdf',
        'text_val' => 'Datesheet for BCA (NEP Scheme) and MCA semester examinations.'
    ],
    [
        'group_key' => 'Semester Exam Timetables',
        'title' => 'LL.B & LL.M Semester Examination Timetable',
        'subtitle' => 'Faculty of Law',
        'badge_text' => 'LAW DATESHEET',
        'link_url' => 'exam/timetable_june26/LLB TIME TABLE JUNE-2026.pdf',
        'text_val' => 'Semester examination datesheet for LL.B (3 Year) and LL.M programs.'
    ],

    // Category 3: Revaluation & Verification Forms
    [
        'group_key' => 'Revaluation & Verification Forms',
        'title' => 'Answer Script Revaluation & Rechecking Form',
        'subtitle' => 'Examination Branch',
        'badge_text' => 'REVALUATION FORM',
        'link_url' => 'result_2016/revel_form.pdf',
        'text_val' => 'Application form for retotaling, revaluation, and inspection of evaluated answer scripts.'
    ],
    [
        'group_key' => 'Revaluation & Verification Forms',
        'title' => 'Revaluation Notification & Guidelines',
        'subtitle' => 'Controller of Examinations',
        'badge_text' => 'REVALUATION GUIDELINES',
        'link_url' => 'result_2016/noticervl.pdf',
        'text_val' => 'Rules, fee details, and submission deadlines for semester result revaluation.'
    ],
    [
        'group_key' => 'Revaluation & Verification Forms',
        'title' => 'Student Degree & Marksheet Verification Form',
        'subtitle' => 'Academic Cell',
        'badge_text' => 'VERIFICATION FORM',
        'link_url' => 'forms/Verification Form.pdf',
        'text_val' => 'Official application form for background verification of degrees, diplomas, and grade cards.'
    ]
];

$order = 1;
foreach ($examNotices as $n) {
    $insSec->execute([
        $pageSlug,
        $n['group_key'],
        $n['title'],
        $n['subtitle'],
        (string)$order,
        $n['text_val'],
        'images/lovable/rkdf-students-quad.jpg',
        $n['link_url'],
        $n['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for exam-notice updated with " . count($examNotices) . " official notices and datesheets!\n";
