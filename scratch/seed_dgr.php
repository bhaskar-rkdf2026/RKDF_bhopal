<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'dgr';
$introText = "The Director General Research (DGR) Office at RKDF University, Bhopal plays a pivotal role in driving academic research excellence, innovation, sponsored R&D projects, and international academic linkages across all university departments.

Under the distinguished leadership of Dr. Vinod Kumar Sethi, Director General Research, the DGR Office promotes cutting-edge research, patent creation, scientific publications, and collaborative projects with premier national and international institutions (including CSIR, DST, AICTE, and ISRO).

Key Responsibilities & Research Focus:
• Promoting Cutting-edge R&D and Multidisciplinary Innovation Initiatives
• Facilitating Patent Filing, Intellectual Property Rights (IPR), and Technology Commercialization
• Overseeing Doctoral Research (Ph.D) & Post-Doctoral Fellowships
• Coordination of National & International Conferences, Seminars, and Workshops
• Industry-Academia MoUs, Carbon Capture & Sequestration Research, and Environmental Innovation

Email Contact: vksethi1949@gmail.com";

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
        'Director General Research (DGR) Profile',
        'about',
        '10 · RESEARCH LEADERSHIP',
        'Spearheading R&D grants, patent filing, doctoral research oversight, and international publications under Dr. Vinod Kumar Sethi.',
        'images/lovable/rkdf-research.jpg',
        'Director General Research (DGR) Office',
        $introText,
        'rkdf, university, bhopal, director general research, dgr profile, dr vinod kumar sethi',
        'Director General Research (DGR) Profile - RKDF University Bhopal. Learn about Dr. Vinod Kumar Sethi and the DGR Office.',
        $pageSlug
    ]);
    echo "site_pages for dgr updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 10)");
    $insertStmt->execute([
        $pageSlug,
        'Director General Research (DGR) Profile',
        'about',
        '10 · RESEARCH LEADERSHIP',
        'Spearheading R&D grants, patent filing, doctoral research oversight, and international publications under Dr. Vinod Kumar Sethi.',
        'images/lovable/rkdf-research.jpg',
        'Director General Research (DGR) Office',
        $introText,
        'rkdf, university, bhopal, director general research, dgr profile, dr vinod kumar sethi',
        'Director General Research (DGR) Profile - RKDF University Bhopal. Learn about Dr. Vinod Kumar Sethi and the DGR Office.'
    ]);
    echo "site_pages for dgr inserted successfully!\n";
}

// 2. Clear old page_sections for dgr and insert clean sections
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

// Section 0: Main message/overview card
$insSec->execute([
    $pageSlug,
    'message',
    "Director General Research (DGR) Office",
    "Research & Innovation Desk",
    "1",
    "Spearheading R&D projects, patent filings, doctoral research, and national & international academic collaborations.",
    "images/lovable/rkdf-research.jpg",
    "",
    "DGR OFFICE",
    1
]);

// Section 1: Profile card item
$insSec->execute([
    $pageSlug,
    'profile',
    "Dr. Vinod Kumar Sethi",
    "Director General Research (DGR)",
    "2",
    "Director General Research (DGR), RKDF University, Bhopal. Leading research innovation, patent developments, and university scientific initiatives.",
    "images/img/vk sethi sir.jpg",
    "mailto:vksethi1949@gmail.com",
    "Director General Research",
    2
]);

echo "page_sections for dgr inserted successfully!\n";
