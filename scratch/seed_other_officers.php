<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'other-officers';
$introText = "The Executive & Administrative Officers of RKDF University, Bhopal manage key operational, academic, financial, and student support departments across the campus.

Working in synergy with the Chancellor, Vice-Chancellor, Pro-Chancellor, and Registrar offices, our executive officers ensure seamless academic administration, rigorous examination standards, financial integrity, and comprehensive student welfare services.";

// 1. Update or insert site_pages
$stmt = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmt->execute([$pageSlug]);
$exists = $stmt->fetch();

if ($exists) {
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
        "Other Officer's Directory",
        'about',
        '12 · EXECUTIVE ADMINISTRATION',
        'Key administrative officers, exam controller, dean student welfare, and chief finance officer of RKDF University Bhopal.',
        'images/lovable/rkdf-library.jpg',
        'Executive & Administrative Officers',
        $introText,
        'rkdf, university, bhopal, other officers directory, exam controller, dsw, cfao',
        "Other Officer's Directory - RKDF University Bhopal. Contact profiles of Exam Controller, Dean Student Welfare, and Chief Finance Officer.",
        $pageSlug
    ]);
    echo "site_pages for other-officers updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 12)");
    $insertStmt->execute([
        $pageSlug,
        "Other Officer's Directory",
        'about',
        '12 · EXECUTIVE ADMINISTRATION',
        'Key administrative officers, exam controller, dean student welfare, and chief finance officer of RKDF University Bhopal.',
        'images/lovable/rkdf-library.jpg',
        'Executive & Administrative Officers',
        $introText,
        'rkdf, university, bhopal, other officers directory, exam controller, dsw, cfao',
        "Other Officer's Directory - RKDF University Bhopal. Contact profiles of Exam Controller, Dean Student Welfare, and Chief Finance Officer."
    ]);
    echo "site_pages for other-officers inserted successfully!\n";
}

// 2. Clear old page_sections for other-officers and insert officer profile cards
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

// Officer 1: Dr. Sunil Patil (Exam Controller)
$insSec->execute([
    $pageSlug,
    'officers',
    "Dr. Sunil Patil",
    "Exam Controller (M.Tech, Ph.D.)",
    "1",
    "Controller of Examinations, RKDF University Bhopal. Managing university examination schedules, evaluation systems, result publication, and academic evaluation compliance.",
    "images/img/Patil Sir.jpg",
    "",
    "EXAM CONTROLLER",
    1
]);

// Officer 2: Dr. Ratnesh Kumar Jain (Dean Student Welfare)
$insSec->execute([
    $pageSlug,
    'officers',
    "Dr. Ratnesh Kumar Jain",
    "Dean Student Welfare (M.Tech, Ph.D.)",
    "2",
    "Dean Student Welfare (DSW), RKDF University Bhopal. Overseeing student extracurricular activities, grievance redressal, campus discipline, and holistic student support.",
    "images/img/Ratnesh Sir.jpg",
    "",
    "DEAN STUDENT WELFARE",
    2
]);

// Officer 3: Sohaib Siddique (C.F.A.O)
$insSec->execute([
    $pageSlug,
    'officers',
    "Sohaib Siddique",
    "Chief Finance & Accounts Officer (C.F.A.O)",
    "3",
    "Chief Finance & Accounts Officer (C.F.A.O), RKDF University Bhopal. Managing university financial planning, budgeting, accounts, fee audit, and fiscal compliance.",
    "images/img/Sohaib siddiqui.jfif",
    "",
    "CHIEF FINANCE OFFICER",
    3
]);

echo "page_sections for other-officers inserted successfully!\n";
