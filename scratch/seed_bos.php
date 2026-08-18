<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'bos';
$introText = "The Board of Studies (BOS) is the statutory academic authority responsible for designing, revising, and modernizing course curricula, syllabi, schemes of examination, and textbook references across all constituent faculties at RKDF University Bhopal.\n\nWorking under the guidance of the Academic Council, the Board of Studies meets annually to align university degree programs with the National Education Policy (NEP-2020), Choice Based Credit System (CBCS), outcome-based education (OBE), and current industry requirements.";

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
    'Board of Studies (BOS)',
    'about',
    '18 · CURRICULUM & SYLLABUS BOARD',
    'Departmental Boards of Studies designing innovative CBCS and NEP-2020 course curricula across all university faculties.',
    'images/lovable/rkdf-research.jpg',
    'Departmental Boards of Studies (BOS) Secretariat',
    $introText,
    'rkdf, university, bhopal, board of studies, bos, curriculum, syllabus, nep-2020',
    'Board of Studies (BOS) - RKDF University Bhopal. Faculty Board of Studies constitutions and syllabus regulations.',
    $pageSlug
]);

// 2. Clear old page_sections for bos and insert all items
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$bosItems = [
    // Faculty Constitutions
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Agriculture',
        'subtitle' => 'Faculty of Agriculture',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Agriculture.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Agriculture.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Architecture',
        'subtitle' => 'Faculty of Architecture',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Architecture.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Architecture.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Commerce',
        'subtitle' => 'Faculty of Commerce',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Commerce.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Commerce.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Engineering & Technology',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge_text' => 'FACULTY BOS 2024',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Engineering and Technology 2024.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Engineering & Technology (2024).'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Management',
        'subtitle' => 'Faculty of Management',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Management.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Management.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Paramedical',
        'subtitle' => 'Faculty of Paramedical',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Paramedical.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Paramedical.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Pharmaceutical Sciences',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Pharmaceutical Sciences.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Pharmaceutical Sciences.'
    ],
    [
        'group_key' => 'faculty_bos',
        'title' => 'Board of Studies — Faculty of Social Science',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'FACULTY BOS',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Social Science.pdf',
        'text_val' => 'Official Board of Studies constitution for Faculty of Social Science.'
    ],

    // Social Science BOS Course Regulations (Nov 2025/2026)
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Hindi — B.A-HI-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-701 &702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for B.A-HI-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Economics — BA-EC-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-EC- 701& 702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-EC-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Sociology — BA-SO-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-701 & 702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-SO-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. English — BA-EN-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-EN-701 & 702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-EN-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Political Science — BA-PS-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-701 & 702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-PS-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. History — BAHS-701 & 702',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BAHS-701 & 702.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BAHS-701 & 702.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Hindi Advanced — B.A-HI-801 & 802',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-801 & 802.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for B.A-HI-801 & 802.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. English Advanced — BA-EN-801 & 802',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-EN- 801 & 802.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-EN-801 & 802.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Political Science Advanced — BA-PS-801 & 802',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-801 & 802.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-PS-801 & 802.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. Sociology Advanced — BA-SO-801 & 802',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-801 & 802.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BA-SO-801 & 802.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'B.A. History Advanced — BAHS-801 & 802',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/BAHS-801 & 802.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for BAHS-801 & 802.'
    ],
    [
        'group_key' => 'social_science_bos',
        'title' => 'Research Methodology — Course 703',
        'subtitle' => 'Faculty of Social Science',
        'badge_text' => 'SYLLABUS & REGULATION',
        'link_url' => 'Content/Documents/BOS_Social_Science_Nov-2025/Research Methodology 703.pdf',
        'text_val' => 'Official Board of Studies curriculum & syllabus regulation for Research Methodology (703).'
    ]
];

$order = 1;
foreach ($bosItems as $b) {
    $insSec->execute([
        $pageSlug,
        $b['group_key'],
        $b['title'],
        $b['subtitle'],
        (string)$order,
        $b['text_val'],
        'images/lovable/rkdf-why-bg.jpg',
        $b['link_url'],
        $b['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for bos updated with " . count($bosItems) . " total items!\n";
