<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'dean';
$introText = "The Deans of Faculties at RKDF University, Bhopal provide academic vision, curriculum governance, research supervision, and departmental leadership across all university faculties.

Working in close coordination with Institute Heads and Department Heads (HODs), our Faculty Deans ensure state-of-the-art education, multidisciplinary research, accreditation standards, and student excellence.";

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
        'Faculty Deans Directory',
        'about',
        '13 · ACADEMIC LEADERSHIP',
        'Directory of Deans leading constituent faculties of Engineering, Pharmacy, Management, Science, Law, Agriculture, and Paramedical across RKDF University Bhopal.',
        'images/lovable/rkdf-students-quad.jpg',
        'Deans of University Faculties',
        $introText,
        'rkdf, university, bhopal, faculty deans directory, deans list',
        'Faculty Deans Directory - RKDF University Bhopal. Meet the academic Deans heading university faculties.',
        $pageSlug
    ]);
    echo "site_pages for dean updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 13)");
    $insertStmt->execute([
        $pageSlug,
        'Faculty Deans Directory',
        'about',
        '13 · ACADEMIC LEADERSHIP',
        'Directory of Deans leading constituent faculties of Engineering, Pharmacy, Management, Science, Law, Agriculture, and Paramedical across RKDF University Bhopal.',
        'images/lovable/rkdf-students-quad.jpg',
        'Deans of University Faculties',
        $introText,
        'rkdf, university, bhopal, faculty deans directory, deans list',
        'Faculty Deans Directory - RKDF University Bhopal. Meet the academic Deans heading university faculties.'
    ]);
    echo "site_pages for dean inserted successfully!\n";
}

// 2. Clear old page_sections for dean and insert all 12 Deans
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$deans = [
    [
        'title' => 'Dr. Santram Lodhi',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Santram Lodhi.jfif',
        'text_val' => 'Dean, Faculty of Pharmaceutical Sciences, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Ashvini Joshi',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Ashvini Joshi.jfif',
        'text_val' => 'Dean, Faculty of Social Science, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. N. K. Shrivastava',
        'subtitle' => 'Faculty of Commerce',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/NK Shrivastava.jfif',
        'text_val' => 'Dean, Faculty of Commerce, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Arun Kumar Patel',
        'subtitle' => 'Faculty of Engineering and Technology',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Arun Patel.jfif',
        'text_val' => 'Dean, Faculty of Engineering and Technology, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Vinod Kumar Pandey',
        'subtitle' => 'Faculty of Science',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/VK Pandey.jfif',
        'text_val' => 'Dean, Faculty of Science, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Arpit Bhargava',
        'subtitle' => 'Faculty of Paramedical',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Arpit Bhargav.jfif',
        'text_val' => 'Dean, Faculty of Paramedical, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Anoop J. Katyayan',
        'subtitle' => 'Faculty of Health Science',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Anoop J. Katyayan.jfif',
        'text_val' => 'Dean, Faculty of Health Science, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. M. S. Pawar',
        'subtitle' => 'Department of Education',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/MS Pawar.jfif',
        'text_val' => 'Dean, Department of Education, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Satendra Singh Thakur',
        'subtitle' => 'Faculty of Management',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Satyendra Thakur.jfif',
        'text_val' => 'Dean, Faculty of Management, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Krishna Chandra Pandey',
        'subtitle' => 'Faculty of Agriculture',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/KC Pandey.jfif',
        'text_val' => 'Dean, Faculty of Agriculture, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Anshuma Upadhyay',
        'subtitle' => 'Faculty of Law',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Anshuma Upadhya.jfif',
        'text_val' => 'Dean, Faculty of Law, RKDF University Bhopal MP.'
    ],
    [
        'title' => 'Dr. Richa Pathe',
        'subtitle' => 'Faculty of Architecture',
        'badge_text' => 'FACULTY DEAN',
        'image_path' => 'images/deanshod/Richa Pathe.jfif',
        'text_val' => 'Dean, Faculty of Architecture, RKDF University Bhopal MP.'
    ]
];

$order = 1;
foreach ($deans as $d) {
    $insSec->execute([
        $pageSlug,
        'deans',
        $d['title'],
        $d['subtitle'],
        (string)$order,
        $d['text_val'],
        $d['image_path'],
        '',
        $d['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for dean inserted successfully (" . count($deans) . " Deans)!\n";
