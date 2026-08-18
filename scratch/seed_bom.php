<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'bom';
$introText = "The Board of Management (BoM) is the principal executive body of RKDF University, Bhopal. It is responsible for overseeing university administrative operations, approving staff appointments, managing finances and property, and ensuring effective implementation of academic programs and statutory regulations.

The Board meets regularly to deliberate on university governance, statutory compliance, policy formulation, infrastructure expansion, and institutional development.";

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
        'Board of Management (BoM)',
        'about',
        '16 · STATUTORY GOVERNANCE',
        'Principal executive body responsible for administrative governance, statutory compliance, appointments, and institutional development.',
        'images/lovable/rkdf-library.jpg',
        'Board of Management (BoM) Secretariat',
        $introText,
        'rkdf, university, bhopal, board of management, bom, statutory governance',
        'Board of Management (BoM) - RKDF University Bhopal. Executive council and Board of Studies notifications.',
        $pageSlug
    ]);
    echo "site_pages for bom updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 16)");
    $insertStmt->execute([
        $pageSlug,
        'Board of Management (BoM)',
        'about',
        '16 · STATUTORY GOVERNANCE',
        'Principal executive body responsible for administrative governance, statutory compliance, appointments, and institutional development.',
        'images/lovable/rkdf-library.jpg',
        'Board of Management (BoM) Secretariat',
        $introText,
        'rkdf, university, bhopal, board of management, bom, statutory governance',
        'Board of Management (BoM) - RKDF University Bhopal. Executive council and Board of Studies notifications.'
    ]);
    echo "site_pages for bom inserted successfully!\n";
}

// 2. Clear old page_sections for bom and insert statutory items
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$items = [
    [
        'title' => 'Board of Management Member Gazette',
        'subtitle' => 'Official Statutory Executive Board',
        'badge_text' => 'OFFICIAL GAZETTE',
        'image_path' => 'images/lovable/rkdf-building-enhanced.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Management Member.pdf',
        'text_val' => 'Official notification listing members of the Board of Management of RKDF University Bhopal.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Agriculture',
        'subtitle' => 'Faculty of Agriculture',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Agriculture.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Agriculture.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Architecture',
        'subtitle' => 'Faculty of Architecture',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Architecture.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Architecture.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Commerce',
        'subtitle' => 'Faculty of Commerce',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Commerce.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Commerce.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Engineering & Technology',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Engineering and Technology 2024.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Engineering & Technology.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Management',
        'subtitle' => 'Faculty of Management',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Management.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Management.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Paramedical',
        'subtitle' => 'Faculty of Paramedical',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Paramedical.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Paramedical.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Pharmaceutical Sciences',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Pharmaceutical Sciences.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Pharmaceutical Sciences.'
    ],
    [
        'title' => 'Board of Studies — Faculty of Social Science',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Social Science.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Social Science.'
    ]
];

$order = 1;
foreach ($items as $it) {
    $insSec->execute([
        $pageSlug,
        'notifications',
        $it['title'],
        $it['subtitle'],
        (string)$order,
        $it['text_val'],
        $it['image_path'],
        $it['link_url'],
        $it['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for bom inserted successfully (" . count($items) . " items)!\n";
