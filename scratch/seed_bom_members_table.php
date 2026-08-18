<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'bom';
$introText = "As per Provision in RKDF University, Bhopal Statute 10 regarding Constitution of Board of Management & after getting nomination from Sponsoring Society of Ayushmati Education & Social Society and obtaining nomination under Statute 10 (sub-clause IV & V) by competent authority, the Board of Management of RKDF University Bhopal is constituted under Order No. 1694 /RKDF/2022.\n\nThe Board of Management is the principal executive organ responsible for administrative governance, academic appointments, financial oversight, and infrastructure development of the University.";

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
    'Board of Management (BoM)',
    'about',
    '16 · STATUTORY GOVERNANCE',
    'Official Board of Management constituted under Statute 10 (Order No. 1694 /RKDF/2022) of RKDF University Bhopal.',
    'images/lovable/rkdf-library.jpg',
    'Constitution of Board of Management',
    $introText,
    'rkdf, university, bhopal, board of management, bom members, statute 10',
    'Board of Management (BoM) - RKDF University Bhopal. Official list of constituted members under Statute 10.',
    $pageSlug
]);

// 2. Clear old page_sections for bom and insert official 9 members + document gazettes
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$allBoMItems = [
    // 9 Official Board Members
    [
        'group_key' => 'members',
        'title' => 'Vice Chancellor, RKDF University Bhopal',
        'subtitle' => 'Chairman — Board of Management',
        'number_val' => '1',
        'badge_text' => 'CHAIRMAN',
        'image_path' => 'images/lovable/rkdf-logo.png',
        'link_url' => 'Vice-Chancellor-Desk.php',
        'text_val' => 'Chairman of the Board of Management, leading university executive governance and academic operations.'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. B. N. Singh',
        'subtitle' => 'Member — Sponsoring Society Nominee',
        'number_val' => '2',
        'badge_text' => 'SOCIETY NOMINEE',
        'image_path' => 'images/img/dr. B.N. Singh.jpg',
        'link_url' => 'dgm.php',
        'text_val' => 'Director General (DGM), RKDF University. 301-B Block, Eden Park Jatkedi, Hoshangabad Road, Bhopal (M.P.).'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. V. K. Sethi',
        'subtitle' => 'Member — Sponsoring Society Nominee',
        'number_val' => '3',
        'badge_text' => 'SOCIETY NOMINEE',
        'image_path' => 'images/img/vk sethi sir.jpg',
        'link_url' => 'dgr.php',
        'text_val' => 'Director General Research (DGR), RKDF University. A-48, Dwarka Dham, Airport Bypass Road, Bhopal (M.P.).'
    ],
    [
        'group_key' => 'members',
        'title' => 'State Govt. Representative (Nominee 1)',
        'subtitle' => 'Member — State Government Nominee',
        'number_val' => '4',
        'badge_text' => 'STATE GOVT NOMINEE',
        'image_path' => 'images/lovable/rkdf-logo.png',
        'link_url' => '',
        'text_val' => 'Representative nominated by the Government of Madhya Pradesh.'
    ],
    [
        'group_key' => 'members',
        'title' => 'State Govt. Representative (Nominee 2)',
        'subtitle' => 'Member — State Government Nominee',
        'number_val' => '5',
        'badge_text' => 'STATE GOVT NOMINEE',
        'image_path' => 'images/lovable/rkdf-logo.png',
        'link_url' => '',
        'text_val' => 'Representative nominated by the Government of Madhya Pradesh.'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. N. K. Shrivastava',
        'subtitle' => 'Member — Statute 10 Subclause (iv)',
        'number_val' => '6',
        'badge_text' => 'FACULTY DEAN MEMBER',
        'image_path' => 'images/deanshod/NK Shrivastava.jfif',
        'link_url' => 'dean.php',
        'text_val' => 'Dean, Faculty of Commerce, RKDF University Bhopal.'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. Virendra Kumar Chaudhary',
        'subtitle' => 'Member — Statute 10 Subclause (iv)',
        'number_val' => '7',
        'badge_text' => 'INSTITUTE HEAD MEMBER',
        'image_path' => 'images/deanshod/Virendra Choudhary.jfif',
        'link_url' => 'deanhod.php',
        'text_val' => 'Principal, RKDF College of Technology & Research (RKDFCTR), RKDF University Bhopal.'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. Vandana Raghuwanshi',
        'subtitle' => 'Member — Statute 10 Subclause (v)',
        'number_val' => '8',
        'badge_text' => 'COLLEGE PRINCIPAL MEMBER',
        'image_path' => 'images/deanshod/Vandana Raghuvanshi.jfif',
        'link_url' => 'deanhod.php',
        'text_val' => 'Principal, University College of Nursing, RKDF University Bhopal.'
    ],
    [
        'group_key' => 'members',
        'title' => 'Dr. Anoop Katyayan',
        'subtitle' => 'Member — Statute 10 Subclause (v)',
        'number_val' => '9',
        'badge_text' => 'COLLEGE PRINCIPAL MEMBER',
        'image_path' => 'images/deanshod/Anoop J. Katyayan.jfif',
        'link_url' => 'dean.php',
        'text_val' => 'Principal, Ram Krishna College of Homoeopathy and Medical Sciences, RKDF University Bhopal.'
    ],

    // Gazette Documents & Board of Studies Links
    [
        'group_key' => 'document',
        'title' => 'Official Board of Management Member Gazette PDF',
        'subtitle' => 'Order No. 1694 /RKDF/2022',
        'number_val' => '10',
        'badge_text' => 'OFFICIAL PDF GAZETTE',
        'image_path' => 'images/lovable/rkdf-building-enhanced.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Management Member.pdf',
        'text_val' => 'Download or view the official signed gazette notification issued by the Chancellor.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Agriculture',
        'subtitle' => 'Faculty of Agriculture',
        'number_val' => '11',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Agriculture.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Agriculture.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Architecture',
        'subtitle' => 'Faculty of Architecture',
        'number_val' => '12',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Architecture.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Architecture.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Commerce',
        'subtitle' => 'Faculty of Commerce',
        'number_val' => '13',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Commerce.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Commerce.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Engineering & Technology',
        'subtitle' => 'Faculty of Engineering & Technology',
        'number_val' => '14',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Engineering and Technology 2024.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Engineering & Technology.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Management',
        'subtitle' => 'Faculty of Management',
        'number_val' => '15',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Management.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Management.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Paramedical',
        'subtitle' => 'Faculty of Paramedical',
        'number_val' => '16',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Paramedical.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Paramedical.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Pharmaceutical Sciences',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'number_val' => '17',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Pharmaceutical Sciences.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Pharmaceutical Sciences.'
    ],
    [
        'group_key' => 'bos',
        'title' => 'Board of Studies — Faculty of Social Science',
        'subtitle' => 'Faculty of Social Science',
        'number_val' => '18',
        'badge_text' => 'BOARD OF STUDIES',
        'image_path' => 'images/lovable/rkdf-why-bg.jpg',
        'link_url' => 'Content/Documents/board_of_management/Board of Studies Faculty of Social Science.pdf',
        'text_val' => 'Official Board of Studies notification for Faculty of Social Science.'
    ]
];

$order = 1;
foreach ($allBoMItems as $bm) {
    $insSec->execute([
        $pageSlug,
        $bm['group_key'],
        $bm['title'],
        $bm['subtitle'],
        $bm['number_val'],
        $bm['text_val'],
        $bm['image_path'],
        $bm['link_url'],
        $bm['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for bom updated with " . count($allBoMItems) . " total items (members + documents)!\n";
