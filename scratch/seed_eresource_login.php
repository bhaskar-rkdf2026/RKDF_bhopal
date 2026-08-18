<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'eresource-login';
$introText = "RKDF University Central Library provides 24/7 access to digital e-resources, research databases, national e-learning portals, and international open-access repositories for all registered students, researchers, and faculty members.\n\nPlease enter your Enrollment Number below to verify your student identity and unlock full access to SWAYAM, Shodhganga, NDL, DELNET, NPTEL, ScienceDirect, and global university repositories.";

// 1. Check or Insert site_pages for eresource-login
$chkStmt = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$chkStmt->execute([$pageSlug]);
$exists = $chkStmt->fetch();

if (!$exists) {
    $insStmt = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 35)");
    $insStmt->execute([
        $pageSlug,
        'Library E-Resource Portal Login',
        'academic',
        'CENTRAL LIBRARY · DIGITAL RESOURCES',
        '24/7 Portal access to national e-learning repositories, research databases, and e-journals for RKDF students.',
        'images/lovable/rkdf-library.jpg',
        'Student Identity & E-Resource Access Portal',
        $introText,
        'rkdf, university, bhopal, e-resource login, library portal, swayam, shodhganga, ndl, delnet',
        'Library E-Resource Login - RKDF University Bhopal. Access national digital repositories and e-learning portals.'
    ]);
} else {
    $updStmt = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?,
        eyebrow = ?,
        hero_subtitle = ?,
        hero_bg_image = ?,
        intro_heading = ?,
        intro_text = ?,
        is_active = 1
        WHERE page_slug = ?");
    $updStmt->execute([
        'Library E-Resource Portal Login',
        'CENTRAL LIBRARY · DIGITAL RESOURCES',
        '24/7 Portal access to national e-learning repositories, research databases, and e-journals for RKDF students.',
        'images/lovable/rkdf-library.jpg',
        'Student Identity & E-Resource Access Portal',
        $introText,
        $pageSlug
    ]);
}

// 2. Clear old page_sections for eresource-login and seed features & portals catalog
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$portals = [
    [
        'title' => 'SWAYAM — Online Courses & Certifications',
        'subtitle' => 'MHRD Govt of India',
        'badge_text' => 'GOVT PORTAL',
        'link_url' => 'https://swayam.gov.in/',
        'image_path' => 'images/img/swayam.png',
        'text_val' => 'Free online courses by top IITs and IISc.'
    ],
    [
        'title' => 'Shodhganga — Indian Ph.D. Theses Repository',
        'subtitle' => 'INFLIBNET Centre',
        'badge_text' => 'THESES BANK',
        'link_url' => 'https://shodhganga.inflibnet.ac.in/',
        'image_path' => 'images/img/shodh-ganga.gif',
        'text_val' => 'Repository of full-text Ph.D. dissertations.'
    ],
    [
        'title' => 'National Digital Library of India (NDLI)',
        'subtitle' => 'IIT Kharagpur',
        'badge_text' => 'NATIONAL LIBRARY',
        'link_url' => 'https://ndl.iitkgp.ac.in/',
        'image_path' => 'images/img/ndl.png',
        'text_val' => 'Over 7 Crore learning resources across all disciplines.'
    ],
    [
        'title' => 'DELNET — Developing Library Network',
        'subtitle' => 'Inter-Library Resource Sharing',
        'badge_text' => 'E-JOURNALS',
        'link_url' => 'http://delnet.in/index.html',
        'image_path' => 'images/img/Delnet.jpg',
        'text_val' => 'Access to thousands of e-books, e-journals, and articles.'
    ],
    [
        'title' => 'NPTEL — E-Learning Engineering & Science',
        'subtitle' => 'IITs & IISc Joint Initiative',
        'badge_text' => 'VIDEO LECTURES',
        'link_url' => 'https://nptel.ac.in/',
        'image_path' => 'images/img/nptel.jpg',
        'text_val' => 'Video courses and lecture series in engineering and basic sciences.'
    ],
    [
        'title' => 'e-PG Pathshala — Post Graduate Courses',
        'subtitle' => 'UGC Initiative',
        'badge_text' => 'PG CURRICULUM',
        'link_url' => 'https://epgp.inflibnet.ac.in/',
        'image_path' => 'images/img/epg.png',
        'text_val' => 'High quality, interactive e-content for post-graduate students.'
    ]
];

$order = 1;
foreach ($portals as $p) {
    $insSec->execute([
        $pageSlug,
        'featured_portal',
        $p['title'],
        $p['subtitle'],
        (string)$order,
        $p['text_val'],
        $p['image_path'],
        $p['link_url'],
        $p['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for eresource-login updated successfully!\n";
