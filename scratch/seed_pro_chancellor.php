<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'pro-chancellor';
$introText = "Education is for transition of a competent scholar to a seasoned professional equipped with expertise in the chosen field. The standard requirements are increasing with every passing year, what has been extra ordinary in the last decade is merely termed sufficient. The levels of desired excellence are increasing in this competitive era, the scholar needs to uplift their levels of knowledge and inculcate a diverse range of acquaintance to attain decisive excellence in the desired fields. In this knowledge driven era, the plethora of knowledge, student centric methods, advanced teaching methodologies have synergized learning and ensured students attract a good quantum of knowledge and expertise. The value added course, special classes and workshops and expert lectures have further positive impact on enhancing students learning and abilities.

RKDF University, Bhopal among the top educational hubs of central India has been catering the needs by empowering its students with diverse set of knowledge, expertise, through several of its duly approved programs offered under various faculties, with state of-the-art facilities, infrastructure and well qualified faculty and developing a sound professional resource for the nation. There are numerous functional MOU’s with National and International academic institutions and industries that opens new opportunities in skill and competence progression.

Exemplary success attained by students under guidance of learned faculties, while working on most advanced techniques and facility; generating intellectual property rights for themselves and University are source of energy and inspiration.

The faculties and scholars of University are involved in cutting edge research which are highlighted and appreciated at national and international platforms. The University has also extended its Carbon Capture and Sequestration plant to scientists of CSIR labs who are exploring possibilities and innovations feasible for environment mitigation and societal use.

The emphasis on inclusive development of scholars has led learning as a fun filled activity at RKDF University, Bhopal and hence is a first choice destination of students.

We welcome you to be part of the development and success of professionals.

Wishing the scholars - Happy Learning";

// 1. Update or insert site_pages
$stmt = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmt->execute([$pageSlug]);
$exists = $stmt->fetch();

if ($exists) {
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
        'Pro-Chancellor Desk',
        'about',
        '04 · EXECUTIVE LEADERSHIP',
        'Guiding strategic initiatives, academic quality assurance, research, and international university linkages.',
        'images/lovable/rkdf-why-bg.jpg',
        'Message From Pro-Chancellor',
        $introText,
        'rkdf, university, bhopal, pro-chancellor desk, dr siddharth kapoor',
        'Pro-Chancellor Desk - RKDF University Bhopal. Read the message from Dr. Siddharth Kapoor, Pro-Chancellor.',
        $pageSlug
    ]);
    echo "site_pages updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 7)");
    $insertStmt->execute([
        $pageSlug,
        'Pro-Chancellor Desk',
        'about',
        '04 · EXECUTIVE LEADERSHIP',
        'Guiding strategic initiatives, academic quality assurance, research, and international university linkages.',
        'images/lovable/rkdf-why-bg.jpg',
        'Message From Pro-Chancellor',
        $introText,
        'rkdf, university, bhopal, pro-chancellor desk, dr siddharth kapoor',
        'Pro-Chancellor Desk - RKDF University Bhopal. Read the message from Dr. Siddharth Kapoor, Pro-Chancellor.'
    ]);
    echo "site_pages inserted successfully!\n";
}

// 2. Clear old page_sections for pro-chancellor and insert clean sections
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

// Section 0: Message card header info
$insSec->execute([
    $pageSlug,
    'message',
    "Message From Pro-Chancellor",
    "Pro-Chancellor Address",
    "1",
    "Empowering students through hands-on experiential learning, research excellence, and multidisciplinary courses.",
    "images/lovable/rkdf-why-bg.jpg",
    "",
    "PRO-CHANCELLOR",
    1
]);

// Section 1: Profile card info
$insSec->execute([
    $pageSlug,
    'profile',
    "Dr. Siddharth Kapoor",
    "Pro-Chancellor",
    "2",
    "Guiding strategic initiatives, academic quality assurance, and international university linkages at RKDF University, Bhopal.",
    "images/img/Dr_Siddhart_Kapoor-N.jpeg",
    "",
    "Pro-Chancellor",
    2
]);

echo "page_sections inserted successfully!\n";
