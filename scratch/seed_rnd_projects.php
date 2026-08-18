<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'rnd-projects';
$introText = "The Research & Development (R&D) Cell at RKDF University Bhopal leads groundbreaking interdisciplinary research sponsored by premier national funding agencies including DST (Department of Science & Technology), AICTE, ISRO, CSIR, and ICAR.\n\nOur research ecosystem spans advanced carbon capture technology plants, solar energy systems, pharmaceutical formulations, agricultural biotechnology, and AI-driven engineering innovations.";

// 1. Update site_pages for rnd-projects
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
    'R&D Sponsored Research Projects & Innovation',
    'rnd',
    'RESEARCH & DEVELOPMENT · SPONSORED PROJECTS',
    'Government funded research projects (DST, AICTE, ISRO, CSIR), innovation labs, patents, and technology transfer initiatives.',
    'images/lovable/rkdf-research.jpg',
    'Ongoing & Completed Research Projects',
    $introText,
    'rkdf, university, bhopal, rnd projects, research grants, dst funded projects',
    'R&D Sponsored Research Projects - RKDF University Bhopal. Download research project lists and overview reports.',
    $pageSlug
]);

// 2. Clear old page_sections for rnd-projects
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$rndItems = [
    // Group 1: Sponsored Research Documents & Projects
    [
        'group' => 'Sponsored Research Documents & Grants',
        'title' => 'Official Funded Research Projects Directory (PDF)',
        'subtitle' => 'DST, AICTE, ISRO & CSIR Grants',
        'badge' => 'PROJECTS DIRECTORY PDF',
        'link' => 'research/Project List.pdf',
        'text' => 'Comprehensive catalogue of sponsored research projects funded by DST, AICTE, ISRO, and UGC.'
    ],
    [
        'group' => 'Sponsored Research Documents & Grants',
        'title' => 'Research Grants & Innovations At A Glance (PDF)',
        'subtitle' => 'Executive Research Summary',
        'badge' => 'PROJECTS AT A GLANCE PDF',
        'link' => 'research/Projects At a Glance.PDF',
        'text' => 'Executive summary report detailing major research milestones, patents filed, and lab grants.'
    ],
    [
        'group' => 'Sponsored Research Documents & Grants',
        'title' => 'RKDF R&D Infrastructure & Capabilities Presentation',
        'subtitle' => 'Directorate of Research',
        'badge' => 'R&D PRESENTATION PDF',
        'link' => 'research/R&D Presentation.pdf',
        'text' => 'Comprehensive presentation highlighting high-tech research centers, carbon capture plants, and lab facilities.'
    ],
    [
        'group' => 'Sponsored Research Documents & Grants',
        'title' => 'R&D Project Proposal Templates & Formats (RAR)',
        'subtitle' => 'Research Proposal Desk',
        'badge' => 'PROPOSAL FORMATS RAR',
        'link' => 'research/R&D FORMATS.rar',
        'text' => 'Downloadable archive containing prescribed templates for submitting intramural and extramural research grants.'
    ],

    // Group 2: Innovation & Video Walkthroughs
    [
        'group' => 'Research Innovation & Video Walkthroughs',
        'title' => 'Carbon Capture Research Plant Video Demonstration',
        'subtitle' => 'Environmental Technology Cell',
        'badge' => 'WATCH VIDEO ↗',
        'link' => 'Content/Videos/5. Carbon capture plants-Part1.mp4',
        'text' => 'Video demonstration of the university\'s pilot Carbon Capture Research Plant designed for industrial emission abatement.'
    ]
];

$order = 1;
foreach ($rndItems as $r) {
    $insSec->execute([
        $pageSlug,
        $r['group'],
        $r['title'],
        $r['subtitle'],
        (string)$order,
        $r['text'],
        'images/lovable/rkdf-research.jpg',
        $r['link'],
        $r['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for rnd-projects updated with " . count($rndItems) . " research project documents!\n";
