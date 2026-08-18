<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

// 1. Seed migration-hindi
$pageSlugHindi = 'migration-hindi';
$introTextHindi = "आरकेडीएफ विश्वविद्यालय भोपाल के परीक्षा एवं अकादमिक पंजीयन विभाग द्वारा प्रव्रजन प्रमाणपत्र (Migration Certificate), प्रोविजनल डिग्री, एवं मूल उपाधि पत्र प्राप्त करने हेतु हिंदी आवेदन पत्र की सुविधा उपलब्ध कराई गई है।\n\nउच्च अध्ययन अथवा अन्य विश्वविद्यालय में प्रवेश हेतु प्रस्थान करने वाले छात्र/छात्राएं निर्धारित शुल्क एवं अनापत्ति प्रमाणपत्र (No Dues Certificate) के साथ हिंदी में आवेदन पत्र डाउनलोड करके प्रस्तुत कर सकते हैं।";

$updateStmtH = $pdo->prepare("UPDATE site_pages SET 
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
$updateStmtH->execute([
    'प्रव्रजन प्रमाणपत्र आवेदन पत्र (हिंदी)',
    'examination',
    'परीक्षा शाखा · माइग्रेशन एवं उपाधि पत्र (हिंदी)',
    'आरकेडीएफ विश्वविद्यालय भोपाल से माइग्रेशन प्रमाणपत्र, प्रोविजनल डिग्री, एवं मूल उपाधि प्राप्त करने हेतु हिंदी आवेदन पत्र एवं दिशानिर्देश।',
    'images/lovable/rkdf-building-enhanced.jpg',
    'माइग्रेशन एवं प्रोविजनल प्रमाणपत्र शाखा (हिंदी)',
    $introTextHindi,
    'rkdf, university, bhopal, degree migration form hindi, migration certificate',
    'Degree Migration Form (Hindi) - RKDF University Bhopal. Download official migration application forms in Hindi.',
    $pageSlugHindi
]);

$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlugHindi]);
$insSecH = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$hindiItems = [
    [
        'group' => 'माइग्रेशन एवं उपाधि आवेदन पत्र (हिंदी)',
        'title' => 'माइग्रेशन एवं मूल उपाधि पत्र आवेदन फॉर्म (हिंदी)',
        'subtitle' => 'परीक्षा नियंत्रक कार्यालय',
        'badge' => 'HINDI FORM PDF',
        'link' => 'forms/Application For Hindi.pdf',
        'text' => 'माइग्रेशन प्रमाणपत्र एवं मूल उपाधि प्राप्त करने हेतु अधिकृत हिंदी आवेदन फॉर्म।'
    ],
    [
        'group' => 'माइग्रेशन एवं उपाधि आवेदन पत्र (हिंदी)',
        'title' => 'संशोधित माइग्रेशन एवं उपाधि आवेदन पत्र (सत्र 2025-26)',
        'subtitle' => 'अकादमिक पंजीयन शाखा',
        'badge' => 'REVISED HINDI PDF',
        'link' => 'forms/Application For Hindi - 29-June-2025.pdf',
        'text' => 'सत्र 2025-26 हेतु अद्यतन शुल्क एवं दिशानिर्देशों सहित हिंदी माइग्रेशन फॉर्म।'
    ]
];

$order = 1;
foreach ($hindiItems as $hi) {
    $insSecH->execute([
        $pageSlugHindi,
        $hi['group'],
        $hi['title'],
        $hi['subtitle'],
        (string)$order,
        $hi['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $hi['link'],
        $hi['badge'],
        $order
    ]);
    $order++;
}

// 2. Seed migration-english & migration-form
foreach (['migration-english', 'migration-form'] as $pageSlugEng) {
    $introTextEng = "The Examination Branch Secretariat at RKDF University Bhopal provides official application forms for obtaining Migration Certificates, Provisional Degrees, and Original Degree Certificates in English.\n\nGraduating students and alumni moving to higher educational institutions or foreign universities can download the prescribed application forms below, complete the No Dues clearance, and submit to the Controller of Examinations.";

    $updateStmtE = $pdo->prepare("UPDATE site_pages SET 
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
    $updateStmtE->execute([
        'Degree & Migration Certificate Form (English)',
        'examination',
        'EXAMINATION · MIGRATION & DEGREE CELL',
        'Official application forms and procedures for obtaining Migration Certificates, Provisional Degrees, and Original Convocation Certificates.',
        'images/lovable/rkdf-building-enhanced.jpg',
        'Migration & Provisional Degree Secretariat',
        $introTextEng,
        'rkdf, university, bhopal, degree migration form english, migration certificate form',
        'Degree Migration Form (English) - RKDF University Bhopal. Download official migration forms.',
        $pageSlugEng
    ]);

    $pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlugEng]);
    $insSecE = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

    $engItems = [
        [
            'group' => 'Migration & Degree Application Forms (English)',
            'title' => 'Official Migration & Degree Certificate Application Form',
            'subtitle' => 'Controller of Examinations Secretariat',
            'badge' => 'ENGLISH FORM PDF',
            'link' => 'forms/Application For English.pdf',
            'text' => 'Prescribed application form for issuing Migration Certificate, Degree Certificate, and Transfer Certificate in English.'
        ],
        [
            'group' => 'Migration & Degree Application Forms (English)',
            'title' => 'Revised Migration & Degree Application Form (Session 2025-26)',
            'subtitle' => 'Academic Affairs Branch',
            'badge' => 'REVISED ENGLISH PDF',
            'link' => 'forms/Application For English - 29-June-2025.pdf',
            'text' => 'Updated application form detailing revised fee structure and clearance requirements for Session 2025-26.'
        ]
    ];

    $orderE = 1;
    foreach ($engItems as $ei) {
        $insSecE->execute([
            $pageSlugEng,
            $ei['group'],
            $ei['title'],
            $ei['subtitle'],
            (string)$orderE,
            $ei['text'],
            'images/lovable/rkdf-building-enhanced.jpg',
            $ei['link'],
            $ei['badge'],
            $orderE
        ]);
        $orderE++;
    }
}

echo "DB Seeded successfully for migration-hindi, migration-english, and migration-form!\n";
