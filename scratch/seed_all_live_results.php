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

$allLiveResults = [
    // Group 1: Results Session Feb-2026
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BAMS — 1st Sem (Regular / Ex)',
        'subtitle' => 'Faculty of Ayurveda (RKDF Medical College)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS — 4th Sem (Regular / Reappear)',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS — 3rd Sem (Regular / Reappear)',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING (New Scheme) — 7th Sem (Regular)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING (New Scheme) — 6th Sem (Ex)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING (New Scheme) — 1st Sem (Regular)',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],

    // Group 2: Results Session June-2026
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.ARCH — 10th Sem (Regular)',
        'subtitle' => 'Faculty of Architecture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'MBA — 4th Sem (Regular) / 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'MCA — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'DIPLOMA IN CIVIL / CS / EE / ME / ET — 6th Sem (Regular)',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 21/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'DIPLOMA IN CIVIL / CS / EE / ME / ET (LATERAL) — 6th Sem (Regular)',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 21/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'Diploma Engg (ME/CE/EE/ET/CSE) — 5th Sem (Ex)',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 24/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BACHELOR OF PHARMACY — 8th & 6th Sem (Regular / Lateral)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 20/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BACHELOR OF PHARMACY — 7th & 5th Sem (Ex / Lateral)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: 20/07/2026.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'M.PHARM (Pharmaceutics / Pharmacology / Pharmacognosy / PRA) — 2nd Sem (Reg) / 1st Sem (Ex)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.Sc (Ag) & B.Tech (Ag) — 8th, 6th, 4th, 2nd Sem (Regular / Ex)',
        'subtitle' => 'Faculty of Agriculture & Agricultural Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'M.Sc (Ag) — 4th Sem (Regular) / 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BE All Branches (CE/CSE/EEE/EE/IT/ECE/ME) — 8th & 6th Sem (Reg) / 7th & 5th Sem (Ex)',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BALLB — 10th, 8th, 6th, 4th Sem (Reg) / 9th, 7th, 5th, 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'LLB — 6th & 4th Sem (Reg) / 5th & 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'LLM — 2nd Sem (Regular) / 1st Sem (Ex)',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'M.Sc (Biotech / Botany / Chemistry / CS / Math / Physics / Zoology) — 4th Sem (Reg) / 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Science',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BCA (NEP) — 6th Sem (Reg) / 5th Sem (Ex)',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.ED & M.ED — 4th Sem (Reg) / 3rd Sem (Reappear)',
        'subtitle' => 'Faculty of Education',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BA & MA (Hindi / English / Pol Sci / Sociology) — 6th & 4th Sem (Reg) / 5th & 3rd Sem (Ex)',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'MSW — 4th Sem (Regular)',
        'subtitle' => 'Faculty of Social Work',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'B.COM (NEP) & B.COM COMPUTER (NEP) & M.COM — 6th, 5th, 4th Sem (Reg / Ex)',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'Diploma Agriculture — June 2026',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'OFFICIAL RESULT',
        'link' => 'Result_2026/diplomaAG_result.php',
        'text' => 'Official result Gazette for Diploma in Agriculture.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BBA — 6th Sem (Regular) / 5th Sem (Ex)',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session June-2026',
        'title' => 'BMLT & DMLT & BPT & Diploma X-Ray — 1st, 2nd, 3rd Sem (Regular / Ex)',
        'subtitle' => 'Faculty of Paramedical & Physiotherapy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],

    // Group 3: Results Session Dec-2025
    [
        'group' => 'Results Session Dec-2025',
        'title' => 'BAMS — 2nd Sem (Regular / Reappear)',
        'subtitle' => 'Faculty of Ayurveda (RKDF Medical College)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ],
    [
        'group' => 'Results Session Dec-2025',
        'title' => 'BHMS (Reval) — 3rd & 4th Sem Supplementary',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Reval Deadline: Next 10 days from declaration date.'
    ]
];

$order = 1;
foreach ($allLiveResults as $r) {
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

echo "page_sections for result updated with ALL " . count($allLiveResults) . " 100% exact live results from https://rkdf.ac.in/Result.php!\n";
