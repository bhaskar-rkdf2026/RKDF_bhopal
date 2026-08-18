<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'staff';
$introText = "Welcome to the RKDF University Bhopal Teaching Staff & Faculty Directory. Browse academic profiles, designations, subject disciplines, and research expertise across all 12 university faculties.\n\nUse the department filter below to view faculty members for Engineering, Pharmacy, Management, Agriculture, Science, Education, Law, Commerce, Nursing, Paramedical, Architecture, and Social Sciences.";

// 1. Update or Insert site_pages for 'staff'
$chk = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$chk->execute([$pageSlug]);
if ($chk->fetch()) {
    $upd = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?,
        eyebrow = ?,
        hero_subtitle = ?,
        hero_bg_image = ?,
        intro_heading = ?,
        intro_text = ?,
        is_active = 1
        WHERE page_slug = ?");
    $upd->execute([
        'University Teaching Staff Directory',
        'FACULTY & ACADEMIC DIRECTORY',
        'Comprehensive directory of professors, associate professors, and department teaching staff across RKDF University.',
        'images/lovable/rkdf-students-quad.jpg',
        'Teaching Staff & Faculty Directory',
        $introText,
        $pageSlug
    ]);
} else {
    $ins = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 46)");
    $ins->execute([
        $pageSlug,
        'University Teaching Staff Directory',
        'academic',
        'FACULTY & ACADEMIC DIRECTORY',
        'Comprehensive directory of professors, associate professors, and department teaching staff across RKDF University.',
        'images/lovable/rkdf-students-quad.jpg',
        'Teaching Staff & Faculty Directory',
        $introText,
        'rkdf, university, bhopal, staff directory, teaching staff, faculty list, professors',
        'University Teaching Staff Directory - RKDF University Bhopal. Browse faculty profiles across all departments.'
    ]);
}

// 2. Clear old page_sections for 'staff'
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$staffMembers = [
    // Engineering & Technology
    [
        'dept' => 'Engineering & Technology',
        'title' => 'Dr. Arun Kumar Patel',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Computer Science & Engineering | Machine Learning & Data Systems',
        'image_path' => 'images/deanshod/Patel Sir.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],
    [
        'dept' => 'Engineering & Technology',
        'title' => 'Dr. Sunil Patil',
        'subtitle' => 'Professor & Controller of Examination',
        'text_val' => 'Mechanical Engineering | Renewable Energy & Thermodynamics',
        'image_path' => 'images/deanshod/Patil Sir.jpg',
        'badge' => 'PROFESSOR'
    ],
    [
        'dept' => 'Engineering & Technology',
        'title' => 'Dr. Virendra Kumar Chaudhary',
        'subtitle' => 'Professor & Principal RKDFCTR',
        'text_val' => 'Civil Engineering | Structural Analysis & Geotechnical Engineering',
        'image_path' => 'images/deanshod/Chaudhary Sir.jpg',
        'badge' => 'PROFESSOR'
    ],
    [
        'dept' => 'Engineering & Technology',
        'title' => 'Dr. Amitesh Paul',
        'subtitle' => 'Associate Professor',
        'text_val' => 'Electrical & Electronics Engineering | Smart Grids & Power Electronics',
        'image_path' => 'images/deanshod/amitesh.jpg',
        'badge' => 'ASSOC. PROFESSOR'
    ],

    // Pharmaceutical Sciences
    [
        'dept' => 'Pharmaceutical Sciences',
        'title' => 'Dr. Mohan Lal Kori',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Pharmaceutics | Novel Drug Delivery Systems & Pharmacokinetics',
        'image_path' => 'images/deanshod/M.L. Kori.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],
    [
        'dept' => 'Pharmaceutical Sciences',
        'title' => 'Dr. Virendra Kumar Patel',
        'subtitle' => 'Professor & Principal COP',
        'text_val' => 'Pharmacology | Molecular Therapeutics & Phytochemistry',
        'image_path' => 'images/deanshod/V.K. Patel.jpg',
        'badge' => 'PROFESSOR'
    ],
    [
        'dept' => 'Pharmaceutical Sciences',
        'title' => 'Dr. Narendra Kumar Lariya',
        'subtitle' => 'Professor & Registrar',
        'text_val' => 'Pharmaceutical Chemistry | Analytical Chemistry & Drug Standardization',
        'image_path' => 'images/deanshod/Dr SATENDRA SINGH THAKUR.jpeg',
        'badge' => 'PROFESSOR'
    ],

    // Management & Business Studies
    [
        'dept' => 'Management & Business Studies',
        'title' => 'Dr. Satendra Singh Thakur',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Financial Management | Corporate Governance & Business Strategy',
        'image_path' => 'images/deanshod/Dr SATENDRA SINGH THAKUR.jpeg',
        'badge' => 'DEAN & PROFESSOR'
    ],
    [
        'dept' => 'Management & Business Studies',
        'title' => 'Dr. B. N. Singh',
        'subtitle' => 'Professor & Director General',
        'text_val' => 'Human Resource Management | Strategic Leadership & Organizational Behavior',
        'image_path' => 'images/deanshod/dr. B.N. Singh.jpg',
        'badge' => 'PROFESSOR'
    ],
    [
        'dept' => 'Management & Business Studies',
        'title' => 'Sohaib Siddique',
        'subtitle' => 'Assistant Professor & CFAO',
        'text_val' => 'Accounting & Finance | Capital Markets & Portfolio Management',
        'image_path' => 'images/deanshod/Sohaib siddiqui.jfif',
        'badge' => 'ASST. PROFESSOR'
    ],

    // Agriculture
    [
        'dept' => 'Agriculture',
        'title' => 'Dr. Santram Lodhi',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Agronomy | Soil Science & Crop Production Technologies',
        'image_path' => 'images/deanshod/Santram Lodhi.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],
    [
        'dept' => 'Agriculture',
        'title' => 'Dr. R. B. Singh',
        'subtitle' => 'Emeritus Professor',
        'text_val' => 'Agricultural Biotechnology & Crop Breeding',
        'image_path' => 'images/deanshod/Santram Lodhi.jpg',
        'badge' => 'EMERITUS PROFESSOR'
    ],

    // Basic & Applied Science
    [
        'dept' => 'Basic & Applied Science',
        'title' => 'Dr. A. C. Nayak',
        'subtitle' => 'Professor & I/C Dean',
        'text_val' => 'Physics & Material Science | Quantum Optics & Nanotechnology',
        'image_path' => 'images/deanshod/A.C. Nayak.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],
    [
        'dept' => 'Basic & Applied Science',
        'title' => 'Dr. Ratnesh Kumar Jain',
        'subtitle' => 'Professor & DSW',
        'text_val' => 'Chemistry | Organic Synthesis & Environmental Chemistry',
        'image_path' => 'images/deanshod/Ratnesh Sir.jpg',
        'badge' => 'PROFESSOR'
    ],

    // Education
    [
        'dept' => 'Education',
        'title' => 'Dr. Mohan Singh Pawar',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Pedagogy & Educational Psychology | Curriculum Development',
        'image_path' => 'images/deanshod/Mohan Singh Pawar.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],

    // Law
    [
        'dept' => 'Law',
        'title' => 'Dr. Anshuma Upadhyay',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Constitutional Law & Jurisprudence | Intellectual Property Rights',
        'image_path' => 'images/deanshod/Anshuma Upadhyay.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],

    // Nursing & Paramedical
    [
        'dept' => 'Nursing & Paramedical',
        'title' => 'Dr. Vandana Raghuwanshi',
        'subtitle' => 'Professor & Principal Nursing',
        'text_val' => 'Medical-Surgical Nursing | Community Health & Clinical Care',
        'image_path' => 'images/deanshod/Vandana Raghuwanshi.jpg',
        'badge' => 'PRINCIPAL & PROFESSOR'
    ],
    [
        'dept' => 'Nursing & Paramedical',
        'title' => 'Dr. Ashvini Joshi',
        'subtitle' => 'Professor & Dean Paramedical',
        'text_val' => 'Medical Lab Technology & Pathology | Anatomy',
        'image_path' => 'images/deanshod/Ashvini Joshi.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ],

    // Commerce & Computer Applications
    [
        'dept' => 'Commerce & Computer Applications',
        'title' => 'Dr. N. K. Shrivastava',
        'subtitle' => 'Professor & Dean',
        'text_val' => 'Commerce & E-Commerce | Financial Accounting & Tax Laws',
        'image_path' => 'images/deanshod/N.K. Shrivastava.jpg',
        'badge' => 'DEAN & PROFESSOR'
    ]
];

$order = 1;
foreach ($staffMembers as $s) {
    $insSec->execute([
        $pageSlug,
        $s['dept'],
        $s['title'],
        $s['subtitle'],
        (string)$order,
        $s['text_val'],
        $s['image_path'],
        '',
        $s['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for staff updated with " . count($staffMembers) . " total faculty members across departments!\n";
