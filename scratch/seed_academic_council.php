<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'academic-council';
$introText = "As per Provision of RKDF University Bhopal Statute 11 and after approval of Competent Authority, the Academic Council of the University is constituted under Office Order No. 641/RKDF/2024 dated 09/03/2024.\n\nThe Academic Council is the principal academic body of RKDF University Bhopal. It maintains and regulates standards of instruction, education, research, curricula, degree awards, and examination systems across all university faculties.";

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
    'Academic Council',
    'about',
    '17 · ACADEMIC GOVERNANCE',
    'Official Academic Council constituted under Statute 11 (Order No. 641/RKDF/2024) of RKDF University Bhopal.',
    'images/lovable/rkdf-students-quad.jpg',
    'Constitution of Academic Council',
    $introText,
    'rkdf, university, bhopal, academic council, statute 11, members list 2024',
    'Academic Council - RKDF University Bhopal. Official list of constituted members under Statute 11.',
    $pageSlug
]);

// 2. Clear old page_sections for academic-council
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$acMembers = [
    [
        'title' => 'Vice Chancellor, RKDF University Bhopal',
        'subtitle' => 'Ex-Officio Chairman — Academic Council',
        'badge_text' => 'CHAIRMAN',
        'link_url' => 'Vice-Chancellor-Desk.php',
        'text_val' => 'Chairman of the Academic Council, governing academic policy, standards, and degree approvals.'
    ],
    [
        'title' => 'Registrar, RKDF University Bhopal',
        'subtitle' => 'Ex-Officio Member Secretary — Academic Council',
        'badge_text' => 'MEMBER SECRETARY',
        'link_url' => 'Registrar.php',
        'text_val' => 'Member Secretary of the Academic Council, managing official records, convocations, and academic governance.'
    ],
    [
        'title' => 'Dr. Mohan Lal Kori',
        'subtitle' => 'Member — Dean, Faculty of Pharmaceutical Sciences',
        'badge_text' => 'FACULTY DEAN MEMBER',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Pharmaceutical Sciences, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Mohan Singh Pawar',
        'subtitle' => 'Member — Dean, Faculty of Education',
        'badge_text' => 'FACULTY DEAN MEMBER',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Education, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Vandana Raghuwanshi',
        'subtitle' => 'Member — Principal, University College of Nursing',
        'badge_text' => 'COLLEGE PRINCIPAL MEMBER',
        'link_url' => 'deanhod.php',
        'text_val' => 'Principal, University College of Nursing, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Anshuma Upadhyay',
        'subtitle' => 'Member — Dean, Faculty of Law',
        'badge_text' => 'FACULTY DEAN MEMBER',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Law, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Virendra Kumar Patel',
        'subtitle' => 'Member — Principal, College of Pharmacy',
        'badge_text' => 'COLLEGE PRINCIPAL MEMBER',
        'link_url' => 'deanhod.php',
        'text_val' => 'Principal, College of Pharmacy, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. A. C. Nayak',
        'subtitle' => 'Member — I/C Dean, Faculty of Science',
        'badge_text' => 'FACULTY DEAN MEMBER',
        'link_url' => 'dean.php',
        'text_val' => 'I/C Dean, Faculty of Science, RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Ratnesh Kumar Jain',
        'subtitle' => 'Member — Dean Student Welfare (Senior Most Professor)',
        'badge_text' => 'CHANCELLOR NOMINEE',
        'link_url' => 'other-officers.php',
        'text_val' => 'Dean Student Welfare (DSW) & Senior Most Professor, RKDF University Bhopal (Chancellor Nominee).'
    ],
    [
        'title' => 'Dr. Arun Kumar Patel',
        'subtitle' => 'Member — Dean, Faculty of Engineering & Tech (Senior Most Professor)',
        'badge_text' => 'CHANCELLOR NOMINEE',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Engineering & Technology & Senior Most Professor, RKDF University Bhopal (Chancellor Nominee).'
    ],
    [
        'title' => 'Dr. Satendra Singh Thakur',
        'subtitle' => 'Member — Dean, Faculty of Management (Senior Most Professor)',
        'badge_text' => 'CHANCELLOR NOMINEE',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Management & Senior Most Professor, RKDF University Bhopal (Chancellor Nominee).'
    ],
    [
        'title' => 'MPPURC Nominated Representative (1)',
        'subtitle' => 'Member — MP Private University Regulatory Commission Nominee',
        'badge_text' => 'MPPURC NOMINEE',
        'link_url' => '',
        'text_val' => 'Representative nominated by Chairman MPPURC as per f 2(e) of Statute 11.'
    ],
    [
        'title' => 'MPPURC Nominated Representative (2)',
        'subtitle' => 'Member — MP Private University Regulatory Commission Nominee',
        'badge_text' => 'MPPURC NOMINEE',
        'link_url' => '',
        'text_val' => 'Representative nominated by Chairman MPPURC as per f 2(e) of Statute 11.'
    ],
    [
        'title' => 'Dr. A. K. Patra',
        'subtitle' => 'Member — Former Director, Indian Institute of Soil Science (ICAR)',
        'badge_text' => 'SCIENTIST NOMINEE',
        'link_url' => '',
        'text_val' => 'Eminent Scientist, Former Director ICAR Bhopal (Chancellor Nominee).'
    ],
    [
        'title' => 'Mr. Sanjay Mehta',
        'subtitle' => 'Member — Industrialist (E-3/4E Arera Colony, Bhopal)',
        'badge_text' => 'INDUSTRIALIST NOMINEE',
        'link_url' => '',
        'text_val' => 'Eminent Industrialist, Bhopal (Chancellor Nominee).'
    ],
    [
        'title' => 'Dr. B. N. Singh',
        'subtitle' => 'Special Invitee — Director Management, RKDF University',
        'badge_text' => 'SPECIAL INVITEE',
        'link_url' => 'dgm.php',
        'text_val' => 'Director General (DGM), RKDF University Bhopal.'
    ],
    [
        'title' => 'Dr. Sunil Patil',
        'subtitle' => 'Special Invitee — Controller of Examination, RKDF University',
        'badge_text' => 'SPECIAL INVITEE',
        'link_url' => 'other-officers.php',
        'text_val' => 'Controller of Examinations, RKDF University Bhopal.'
    ]
];

$order = 1;
foreach ($acMembers as $ac) {
    $insSec->execute([
        $pageSlug,
        'members',
        $ac['title'],
        $ac['subtitle'],
        (string)$order,
        $ac['text_val'],
        'images/lovable/rkdf-logo.png',
        $ac['link_url'],
        $ac['badge_text'],
        $order
    ]);
    $order++;
}

// Add Gazette Document PDF
$insSec->execute([
    $pageSlug,
    'document',
    'Official Academic Council Members 2024 Gazette PDF',
    'Office Order No. 641/RKDF/2024 (Dated 09/03/2024)',
    '18',
    'Official signed order notification of the Academic Council issued by the Registrar under Statute 11.',
    'images/lovable/rkdf-students-quad.jpg',
    'Content/Documents/academic_council/Academic Council Members 2024.pdf',
    'OFFICIAL PDF GAZETTE',
    $order
]);

echo "page_sections for academic-council updated with 18 items (17 members + 1 PDF document)!\n";
