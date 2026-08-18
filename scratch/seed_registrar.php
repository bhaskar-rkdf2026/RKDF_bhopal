<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'registrar';
$introText = "The Office of the Registrar at RKDF University, Bhopal serves as the chief administrative office responsible for maintaining statutory compliance, university records, student admissions, enrollment verifications, academic secretariat, and official university communications.

Under the leadership of Dr. Satendra S. Thakur (MBA, Ph.D.), Registrar, the Office ensures smooth coordination with statutory councils (UGC, AICTE, PCI, BCI, INC, COA, CCH, CCIM, and MPPURC), legal governance, board meetings, and academic policy implementation.

Key Responsibilities & Secretariat Functions:
• Custodian of University Records, Seal, and Statutory Documentation
• Academic Secretariat for Governing Body, Board of Management, and Academic Council Meetings
• Coordination with Statutory Bodies & Regulatory Councils (UGC, MPPURC, AICTE, PCI, BCI, COA)
• Enrollment Verification, Student Registrations, Degree Certificates, and Transcripts
• Legal Compliance, Official University Notifications, and Inter-Departmental Coordination

Contact Information:
Landline: +91 755-2740395
Email Contact: registrar@rkdf.ac.in";

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
        'Registrar Profile',
        'about',
        '11 · EXECUTIVE ADMINISTRATION',
        'Custodian of university records, legal compliance, statutory reporting, admissions, and academic secretariat under Dr. Satendra S. Thakur.',
        'images/lovable/rkdf-building-enhanced.jpg',
        'Office of the Registrar',
        $introText,
        'rkdf, university, bhopal, registrar profile, dr satendra s thakur',
        'Registrar Profile - RKDF University Bhopal. Learn about Dr. Satendra S. Thakur and the Registrar Office.',
        $pageSlug
    ]);
    echo "site_pages for registrar updated successfully!\n";
} else {
    $insertStmt = $pdo->prepare("INSERT INTO site_pages 
        (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 11)");
    $insertStmt->execute([
        $pageSlug,
        'Registrar Profile',
        'about',
        '11 · EXECUTIVE ADMINISTRATION',
        'Custodian of university records, legal compliance, statutory reporting, admissions, and academic secretariat under Dr. Satendra S. Thakur.',
        'images/lovable/rkdf-building-enhanced.jpg',
        'Office of the Registrar',
        $introText,
        'rkdf, university, bhopal, registrar profile, dr satendra s thakur',
        'Registrar Profile - RKDF University Bhopal. Learn about Dr. Satendra S. Thakur and the Registrar Office.'
    ]);
    echo "site_pages for registrar inserted successfully!\n";
}

// 2. Clear old page_sections for registrar and insert clean sections
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

// Section 0: Main message/overview card
$insSec->execute([
    $pageSlug,
    'message',
    "Office of the Registrar",
    "Registrar Secretariat & Administration",
    "1",
    "Managing statutory compliance, university administration, academic secretariat, and official communications.",
    "images/lovable/rkdf-building-enhanced.jpg",
    "",
    "REGISTRAR OFFICE",
    1
]);

// Section 1: Profile card item
$insSec->execute([
    $pageSlug,
    'profile',
    "Dr. Satendra S. Thakur",
    "Registrar (MBA, Ph.D.)",
    "2",
    "Dr. Satendra S. Thakur (MBA, Ph.D.), Registrar, RKDF University, Bhopal. Leading administrative secretariat, statutory compliance, and university governance.",
    "images/img/Dr SATENDRA SINGH THAKUR.jpeg",
    "mailto:registrar@rkdf.ac.in",
    "Registrar",
    2
]);

echo "page_sections for registrar inserted successfully!\n";
