<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'national-advisory';
$introText = "The National Core Advisory Group and Statutory Advisory Bodies of RKDF University Bhopal comprise eminent academicians, scientists, former Vice-Chancellors, UGC/ICAR/IAUA experts, and senior industry leaders.

The Advisory Council provides strategic direction, research governance, national ranking frameworks (NIRF), accreditation standards (NAAC), and academic innovation across all university faculties.";

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
    'Statutory & National Core Advisory Bodies',
    'about',
    '19 · ADVISORY & GOVERNANCE',
    'Eminent national academicians, scientists, and industry leaders guiding RKDF University Bhopal.',
    'images/lovable/rkdf-why-bg.jpg',
    'National Core Advisory Group',
    $introText,
    'rkdf, university, bhopal, statutory bodies, national core advisory group, advisory board',
    'Statutory & National Core Advisory Bodies - RKDF University Bhopal. National experts guiding university growth and research.',
    $pageSlug
]);

// 2. Clear old page_sections for national-advisory
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$advisoryMembers = [
    // 12 National Core Advisory Group Members
    [
        'group_key' => 'core_advisory',
        'title' => 'Prof. Panjab Singh',
        'subtitle' => 'Education & Academic Governance',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Education & Academic Governance).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Prof. Deepak Pental',
        'subtitle' => 'Biotechnology & Life Sciences',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Biotechnology & Life Sciences).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Prof. R. R. Gaur',
        'subtitle' => 'Engineering & Value Education',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Engineering & Value Education).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. R. P. Singh',
        'subtitle' => 'Indian Agricultural Universities Association (IAUA)',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: IAUA & Agricultural Research).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Prof. B. D. Singh',
        'subtitle' => 'Management & Corporate Strategy',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Management Studies).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. M. K. Salooja',
        'subtitle' => 'Distance & Open Learning',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Distance & Continuing Education).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. K. K. Singh',
        'subtitle' => 'Medical & Healthcare Sciences',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Medical & Health Sciences).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. Gautam Goswal',
        'subtitle' => 'Basic & Applied Sciences',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Basic & Applied Sciences).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. Kamal Singh',
        'subtitle' => 'Human Resource & Development',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: HR & Skill Development).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. Ashish Dongre',
        'subtitle' => 'Engineering & Technical Education',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Engineering & Technical Education).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. B. N. Singh',
        'subtitle' => 'University Administration',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: University Administration & Management).'
    ],
    [
        'group_key' => 'core_advisory',
        'title' => 'Dr. Siddharth Kapoor',
        'subtitle' => 'Management & Strategic Development',
        'badge_text' => 'CORE ADVISOR',
        'text_val' => 'National Core Advisory Group Member (Area: Management & Institutional Strategy).'
    ],

    // 7 Eminent Invitees
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Prof. R. B. Singh',
        'subtitle' => 'Education & Research Strategy',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: Education & Scientific Research).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Prof. Pritam Singh',
        'subtitle' => 'Management & Leadership',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: Management & Institutional Leadership).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Dr. Arvind Kumar',
        'subtitle' => 'Higher Education & Pedagogy',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: Higher Education Policy).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Dr. Vineeta Sharma',
        'subtitle' => 'Science & Technology Research',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: Science & Technology Grants).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Dr. R. K. Mittal',
        'subtitle' => 'Education & Accreditation Standards',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: Educational Accreditation & Quality Assurance).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Dr. K. P. Singh',
        'subtitle' => 'UGC Governance & Higher Education',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: UGC Regulations & Higher Education Compliance).'
    ],
    [
        'group_key' => 'eminent_invitee',
        'title' => 'Dr. S. N. Puri',
        'subtitle' => 'IAUA & Agricultural Education',
        'badge_text' => 'EMINENT INVITEE',
        'text_val' => 'Eminent Special Invitee (Area: IAUA & Agricultural Universities Administration).'
    ]
];

$order = 1;
foreach ($advisoryMembers as $m) {
    $insSec->execute([
        $pageSlug,
        $m['group_key'],
        $m['title'],
        $m['subtitle'],
        (string)$order,
        $m['text_val'],
        'images/lovable/rkdf-logo.png',
        '',
        $m['badge_text'],
        $order
    ]);
    $order++;
}

echo "page_sections for national-advisory updated with " . count($advisoryMembers) . " total members!\n";
