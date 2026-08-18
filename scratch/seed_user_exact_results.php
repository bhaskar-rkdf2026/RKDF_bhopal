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

$userHTMLItems = [
    // Group 1: Results Session Feb-2026
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BAMS - 1 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Ayurveda',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS - 4 SEM - REGULAR / REAPPEAR',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BHMS - 3 SEM - REGULAR / REAPPEAR',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'B.SC NURSING - 04 SEM - Regular',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BACHELOR OF SCIENCE(NURSING) NEW SCHEMA - 07 SEM - Regular',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BACHELOR OF SCIENCE(NURSING) NEW SCHEMA - 06 SEM - Ex',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session Feb-2026',
        'title' => 'BACHELOR OF SCIENCE(NURSING) NEW SCHEMA - 01 SEM - Regular',
        'subtitle' => 'Faculty of Nursing',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],

    // Group 2: Results Session June - 2026
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BACHELOR OF PHARMACY - 6 SEM - REGULAR / (LATERAL)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BACHELOR OF PHARMACY - 5 SEM - EX / (LATERAL)',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARMA- (PRA) - 2 SEM - REGULAR',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACEUTICS - 2 SEM - REGULAR',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACOGNOSY - 2 SEM - REGULAR',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACOLOGY - 2 SEM - REGULAR',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARMA-(PRA) - 1 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACEUTICS - 1 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACOGNOSY - 1 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.PHARM-PHARMACOLOGY - 1 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.Sc (Ag) - 2 / 4 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.Sc (Ag) - 3 / 5 SEM - EX',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.Sc (Ag) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.Tech (Ag) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Agricultural Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.Sc (Ag) - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.Sc (Ag) - 3 SEM - EX',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (CE) / BE Lateral (CE) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Civil Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (EEE) / BE Lateral (EEE) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (EE) / BE Lateral (EE) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Electrical Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (ECE) / BE Lateral (ECE) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of ECE',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (ME) / BE Lateral (ME ) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Mechanical Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (CSE) / BE Lateral (CSE) - 6 SEM - EX',
        'subtitle' => 'Faculty of CSE',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (EE) / BE Lateral (EE) - 6 SEM - EX',
        'subtitle' => 'Faculty of Electrical Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (CE) / BE Lateral (CE) - 5 SEM - EX',
        'subtitle' => 'Faculty of Civil Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (CSE) / BE Lateral (CSE) - 5 SEM - EX',
        'subtitle' => 'Faculty of CSE',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (EE) / BE Lateral (EE) - 5 SEM - EX',
        'subtitle' => 'Faculty of Electrical Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (ME) / BE Lateral (ME ) - 5 SEM - EX',
        'subtitle' => 'Faculty of Mechanical Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 16/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BALLB - 4 / 6 / 8 SEM - REGULAR',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/08/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BALLB - 3 / 5 / 7 SEM - EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/08/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLB - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/08/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLB - 3 SEM - EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/08/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BMLT - 1 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BMLT - 2 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BMLT - 3 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'DMLT - 2 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'DMLT - 1 SEM - REGULAR',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BPT - 1 / 3 SEM - REGULAR',
        'subtitle' => 'Faculty of Physiotherapy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BPT - 2 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Physiotherapy',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'Diploma in X-Ray - 1 SEM - REGULAR',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 03/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.ARCH - 10 SEM - Regular',
        'subtitle' => 'Faculty of Architecture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MBA - 4 SEM - Regular',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MBA - 3 SEM - EX',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MCA - 4 SEM - Regular',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'Diploma ME / CE / EE / ET / CSE (Reg +Lat) - 5 SEM - EX',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 24/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'DIPLOMA IN CIVIL / CS / EE / ME / ET - 6 SEM - Regular',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 21/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'DIPLOMA IN CIVIL / CS / EE / ME / ET (LATERAL) - 6 SEM - Regular',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 21/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.PHARMA - 8 SEM - Regular',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 20/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.PHARMA (Lateral) - 8 SEM - Regular',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 20/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.PHARMA - 7 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 20/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.PHARMA (Lateral) - 7 SEM - EX',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 20/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.Sc (NEP) - 6 SEM - Regular',
        'subtitle' => 'Faculty of Science',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'The last date for revaluation – 20/07/2026'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (Civil / CSE / EEE / EE / IT / ECE / ME) (Regular +Lateral) - 8 SEM - REGULAR',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BE (Civil / CSE / EEE / EE / IT / ECE / ME) (Regular +Lateral) - 7 SEM - EX',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BCA - 5 SEM - EX',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B. Sc (AG) - 7 SEM - EX',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BALLB - 10 SEM - REGULAR',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BALLB - 9 SEM - EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLB - 6 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLB - 5 SEM - EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLM - 2 SEM - REGULAR',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'LLM - 1 SEM - EX',
        'subtitle' => 'Faculty of Law',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.Sc (Biotechnology) - 4 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Science',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.Sc (Botany / Chemistry / Computer Science / Food Science & Technology / Mathematics / Microbiology / Physics / Zoology / ) - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Science',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.Sc(Biotechnology / Mathematics / Physics) - 3 SEM - EX',
        'subtitle' => 'Faculty of Science',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BCA (NEP) - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.ED - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Education',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.ED - 3 SEM - REAPPEAR',
        'subtitle' => 'Faculty of Education',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.ED - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Education',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.ED - 3 SEM - REAPPEAR',
        'subtitle' => 'Faculty of Education',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BA - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Humanities',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BA - 5 SEM - EX',
        'subtitle' => 'Faculty of Humanities',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MA (HINDI / ENGLISH / POLITICAL SCIENCE / SOCIOLOGY) - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MA (ENGLISH / POLITICAL SCIENCE / SOCIOLOGY) - 3 SEM - EX',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'MSW - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Social Work',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.COM (NEP) - 6 / 5 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.COM COMPUTER (NEP) - 6 / 5 SEM - REGULAR / EX',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'M.COM - 4 SEM - REGULAR',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.SC (Ag) - 8 SEM - REGULAR',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'B.TECH (Ag) - 8 SEM - REGULAR',
        'subtitle' => 'Faculty of Agricultural Engineering',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'Diploma Agriculture - June -2026',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'VIEW RESULT',
        'link' => 'https://rkdf.ac.in/Result_2026/diplomaAG_result.php',
        'text' => 'Official Diploma Result Gazette'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BBA - 6 SEM - REGULAR',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],
    [
        'group' => 'Results Session June - 2026',
        'title' => 'BBA - 5 SEM - EX',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ],

    // Group 3: Results Session Dec - 2025
    [
        'group' => 'Results Session Dec - 2025',
        'title' => 'BAMS - 2 SEM - REGULAR / REAPPEAR',
        'subtitle' => 'Faculty of Ayurveda (RKDF Medical College)',
        'badge' => 'ERP LOGIN',
        'link' => 'https://erplive.rkdf.ac.in/',
        'text' => 'Last date of Revaluation Next 10 days'
    ]
];

$order = 1;
foreach ($userHTMLItems as $r) {
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

echo "page_sections for result re-seeded with " . count($userHTMLItems) . " exact items matching user HTML!\n";
