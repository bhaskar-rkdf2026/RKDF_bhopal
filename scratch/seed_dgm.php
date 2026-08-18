<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'dgm';
$introText = "The Director General Management (DGM) Office at RKDF University, Bhopal is responsible for overseeing operational management, strategic planning, infrastructure development, and day-to-day administrative execution across all university faculties and constituent units.

Under the guidance of Dr. B. N. Singh, Director General Management, the DGM Office ensures seamless academic administration, robust student support services, campus facility optimization, and institutional quality management.

Key Responsibilities & Focus Areas:
• Operational Leadership & Administrative Coordination across University Departments
• Infrastructure Expansion, Maintenance, and Resource Management
• Student Welfare, Discipline, and Enhancement of Campus Amenities
• Strategic Planning, Policy Implementation, and Quality Assurance
• Fostering Industry Linkages, Inter-Departmental Synergies, and Institutional Growth

Email Contact: drbnsingh@rkdf.ac.in";

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
        'Director General Management (DGM) Profile',
        'about',
        '06 · EXECUTIVE ADMINISTRATION',
        'Overseeing operational management, strategic planning, and campus administrative workflows under Dr. B. N. Singh.',
        'images/lovable/rkdf-library.jpg',
        'Director General Management (DGM) Office',
        $introText,
        'rkdf, university, bhopal, director general management, dgm profile, dr b n singh',
        'Director General Management (DGM) Profile - RKDF University Bhopal. Learn about Dr. B. N. Singh and the DGM Office.',
        $pageSlug
    ]);
    echo "site_pages for dgm updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 9)");
    $insertStmt->execute([
        $pageSlug,
        'Director General Management (DGM) Profile',
        'about',
        '06 · EXECUTIVE ADMINISTRATION',
        'Overseeing operational management, strategic planning, and campus administrative workflows under Dr. B. N. Singh.',
        'images/lovable/rkdf-library.jpg',
        'Director General Management (DGM) Office',
        $introText,
        'rkdf, university, bhopal, director general management, dgm profile, dr b n singh',
        'Director General Management (DGM) Profile - RKDF University Bhopal. Learn about Dr. B. N. Singh and the DGM Office.'
    ]);
    echo "site_pages for dgm inserted successfully!\n";
}

// 2. Clear old page_sections for dgm and insert clean sections
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

// Section 0: Main message/overview card
$insSec->execute([
    $pageSlug,
    'message',
    "Director General Management (DGM) Office",
    "Administrative Desk",
    "1",
    "Managing administrative operations, campus infrastructure, and student welfare across RKDF University.",
    "images/lovable/rkdf-library.jpg",
    "",
    "DGM OFFICE",
    1
]);

// Section 1: Profile card item
$insSec->execute([
    $pageSlug,
    'profile',
    "Dr. B. N. Singh",
    "Director General Management (DGM)",
    "2",
    "Director General Management, RKDF University, Bhopal. Dedicated to institutional excellence, campus administration, and operational management.",
    "images/img/dr. B.N. Singh.jpg",
    "mailto:drbnsingh@rkdf.ac.in",
    "Director General Management",
    2
]);

echo "page_sections for dgm inserted successfully!\n";
