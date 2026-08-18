<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'result';
$introText = "Welcome to the Controller of Examinations Online Results Portal at RKDF University Bhopal. Below are declared semester examination results for undergraduate, postgraduate, diploma, nursing, pharmacy, BAMS, and BHMS programs.\n\nStudents can click on ERP Login to access detailed digital scorecards using their Enrollment Number.";

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
    'Examination Results',
    'examination',
    '73 · ONLINE RESULTS & REVALUATION PORTAL',
    'Declared semester examination results, ERP student marksheet login, revaluation application deadlines, and official grade circulars.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Declared Examination Results & Scorecards',
    $introText,
    'rkdf, university, bhopal, examination results, erp result login, revaluation form',
    'Examination Results - RKDF University Bhopal. Check semester examination results online.',
    $pageSlug
]);

// 2. Clear old page_sections for result
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$resultsList = [
    // Group 1: Results Session Feb-2026
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BAMS — 1st Sem (Regular / Ex)',
        'subtitle' => 'Faculty of Ayurveda',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS — 4th Sem (Regular / Reappear)',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS — 3rd Sem (Regular / Reappear)',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING (New Scheme) — 7th Sem (Regular)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],

    // Group 2: Results Session June-2026
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.ARCH — 10th Sem (Regular)',
        'subtitle' => 'Faculty of Architecture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'MBA — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'MCA — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'Diploma Engg (CE/CS/EE/ME/ET) — 6th Sem (Regular)',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 21/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.PHARMA — 8th Sem (Regular)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 20/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BE All Branches — 8th Sem (Regular)',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BALLB — 10th Sem (Regular)',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'LLB — 6th Sem (Regular / Ex)',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'Diploma Agriculture — June 2026',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'OFFICIAL RESULT',
        'link' => 'Result_2026/diplomaAG_result.php',
        'text' => 'Official result Gazette for Diploma in Agriculture.'
    ]
];

$order = 1;
foreach ($resultsList as $r) {
    $insSec->execute([
        $pageSlug,
        $r['group'],
        $r['title'],
        $r['subtitle'],
        (string)$order,
        $r['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $r['link'],
        $r['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for result updated with " . count($resultsList) . " declared results!\n";
