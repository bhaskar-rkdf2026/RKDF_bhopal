<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'local-advisory';
$introText = "A Local Core Group comprised of selected Directors, Principals, and Emeritus Faculty from RKDF University constituent colleges has been formed to pursue and execute the strategic recommendations of the National Core Advisory Group.\n\nLearning at RKDF University must be consummate — transcending traditional classroom boundaries to create an immersive academic environment where education seamlessly integrates with experiential learning, industry interaction, and all-round student development.";

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
    'Local Core Advisory Group',
    'about',
    '20 · LOCAL ADVISORY & EXECUTION',
    'Executive advisory body comprising college Directors, Principals, and Emeritus Faculty executing national recommendations across RKDF University.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Local Core Advisory Group (LCAG)',
    $introText,
    'rkdf, university, bhopal, local core advisory group, local advisory committee',
    'Local Core Advisory Group - RKDF University Bhopal. Directors, Principals & Emeritus Faculty implementing academic excellence.',
    $pageSlug
]);

// 2. Clear old page_sections for local-advisory
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$localAdvisoryObjectives = [
    [
        'group_key' => 'composition',
        'title' => 'College Directors & Institute Heads',
        'subtitle' => 'Institutional Execution Leaders',
        'badge_text' => 'INSTITUTE DIRECTORS',
        'text_val' => 'Directors of engineering, pharmacy, nursing, management, and Polytechnic institutes executing strategic academic policies.'
    ],
    [
        'group_key' => 'composition',
        'title' => 'College Principals & Faculty Deans',
        'subtitle' => 'Academic & Student Life Mentors',
        'badge_text' => 'COLLEGE PRINCIPALS',
        'text_val' => 'Principals and Deans governing daily academic discipline, curriculum implementation, and student welfare services.'
    ],
    [
        'group_key' => 'composition',
        'title' => 'Emeritus Faculty & Senior Professors',
        'subtitle' => 'Academic Visionaries & Researchers',
        'badge_text' => 'EMERITUS FACULTY',
        'text_val' => 'Senior emeritus professors guiding research projects, Ph.D. dissertations, and interdisciplinary academic publications.'
    ],

    // Strategic Mandates
    [
        'group_key' => 'mandates',
        'title' => 'Execution of National Advisory Guidelines',
        'subtitle' => 'Translating Vision into Action',
        'badge_text' => 'STRATEGIC MANDATE',
        'text_val' => 'Operationalizing recommendations formulated by the National Core Advisory Group across all campus departments.'
    ],
    [
        'group_key' => 'mandates',
        'title' => 'Holistic Learning Beyond Classrooms',
        'subtitle' => 'Transcending Traditional Pedagogy',
        'badge_text' => 'STUDENT LEARNING',
        'text_val' => 'Fostering an ecosystem where academic learning seamlessly integrates with industrial visits, workshops, and student life.'
    ],
    [
        'group_key' => 'mandates',
        'title' => 'Regional Industry & Skill Partnerships',
        'subtitle' => 'Community & Corporate Tie-ups',
        'badge_text' => 'INDUSTRY LINKAGE',
        'text_val' => 'Building strong relationships with regional industries, corporate houses, and public sector undertakings for student internships and placements.'
    ]
];

$order = 1;
foreach ($localAdvisoryObjectives as $la) {
    $insSec->execute([
        $pageSlug,
        $la['group_key'],
        $la['title'],
        $la['subtitle'],
        (string)$order,
        $la['text_val'],
        'images/lovable/rkdf-logo.png',
        '',
        $la['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for local-advisory updated with " . count($localAdvisoryObjectives) . " items!\n";
