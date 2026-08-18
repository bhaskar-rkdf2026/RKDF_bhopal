<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'lms';
$introText = "Welcome to the RKDF University Bhopal Learning Management System (LMS) & E-Lecture Portal. Access subject-wise video lectures, e-learning modules, NPTEL courses, and interactive digital study materials across all university faculties.\n\nAll video lectures are available for online streaming and direct study download for registered students and faculty scholars.";

// 1. Update or Insert site_pages for 'lms'
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
        'Learning Management System (LMS)',
        '47 · E-LEARNING & VIDEO LECTURES',
        'Digital e-content, video lectures, NPTEL modules, SWAYAM courses, and online study materials across all faculties.',
        'images/lovable/rkdf-students-quad.jpg',
        'Online Video Lectures & Digital Courseware',
        $introText,
        $pageSlug
    ]);
} else {
    $ins = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, meta_keywords, meta_description, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 47)");
    $ins->execute([
        $pageSlug,
        'Learning Management System (LMS)',
        'academic',
        '47 · E-LEARNING & VIDEO LECTURES',
        'Digital e-content, video lectures, NPTEL modules, SWAYAM courses, and online study materials across all faculties.',
        'images/lovable/rkdf-students-quad.jpg',
        'Online Video Lectures & Digital Courseware',
        $introText,
        'rkdf, university, bhopal, lms, learning management system, video lectures, nptel, swayam',
        'Learning Management System (LMS) - RKDF University Bhopal. Stream video lectures and e-learning content.'
    ]);
}

// 2. Clear old page_sections for 'lms'
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$lmsVideos = [
    // Electronics & Satellite Communication (Engineering)
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Basics of Satellite Communication',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Basic_of_satellite_Communication_By_Sachin_Bandewar.mp4',
        'text' => 'Introduction to satellite communication orbits, frequency bands, and transponder architecture.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Introduction to Satellite Communication',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Introduction_To_Satellite_Communication_By_Sachin_Bandewar.mp4',
        'text' => 'Comprehensive overview of satellite link design, look angles, and orbital parameters.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Keplers Laws of Planetary Motion',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Keplers_Law_By_Sachin_Bandewar.mp4',
        'text' => 'Keplers 1st, 2nd, and 3rd laws applied to GEO, MEO, and LEO satellite orbits.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Satellite Applications & Services',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Satellite_Applications_By_Sachin_Bandewar.mp4',
        'text' => 'Applications in remote sensing, weather forecasting, GPS navigation, and broadcasting.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Satellite Mobile Services',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Satellite_Mobile_Services_By_Sachin_Bandewar.mp4',
        'text' => 'Mobile satellite systems, Inmarsat architecture, and handoff mechanisms.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Satellite Multiple Access Techniques (FDMA/TDMA/CDMA)',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Satellite_Multiple_Access_Technique_By_sachin_Bandewar.mp4',
        'text' => 'Frequency Division, Time Division, and Code Division Multiple Access in satellite communications.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Satellite Telemetry, Tracking & Control Subsystems',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Satellite_Telemetry_Tracking_Control_Subsystems_Sachin_Bandewar.mp4',
        'text' => 'TT&C subsystem operations, ground stations, and orbital telemetry monitoring.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Spacecraft Command System Architecture',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Spacecraft_Command_System_By_Sachin_Bandewar.mp4',
        'text' => 'Command decoders, security verification, and payload control systems.'
    ],
    [
        'group' => 'Faculty of Engineering',
        'title' => 'Telemetry & Command System Block Diagram',
        'subtitle' => 'Prof. Sachin Bandewar (Electronics Engg)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Telemetry _and_Command_System_Block_Diagram_By_Sachin_Bandewar.mp4',
        'text' => 'Detailed functional block diagram of spacecraft command systems and uplink/downlink RF modules.'
    ],

    // Management & Corporate Leadership
    [
        'group' => 'Faculty of Management',
        'title' => 'Human Resource Management Principles',
        'subtitle' => 'Prof. Sachin Bandewar (Management Studies)',
        'badge' => 'E-LECTURE MP4',
        'link' => 'Content/Documents/video_lectures/sachinb/Human_Resources_Managment_By_Sachin_Bandewar.mp4',
        'text' => 'Core concepts of HR planning, recruitment strategies, performance appraisal, and employee motivation.'
    ],

    // Science & Health Sciences
    [
        'group' => 'Faculty of Science & Health',
        'title' => 'Thalassemia & Sickle Cell Anaemia Mission-2030',
        'subtitle' => 'Faculty of Science',
        'badge' => 'CLINICAL VIDEO',
        'link' => 'images/gallery/video/sickle_cell.mp4',
        'text' => 'Medical demonstration and awareness video on Thalassemia & Sickle Cell Anaemia eradication.'
    ],
    [
        'group' => 'Faculty of Science & Health',
        'title' => 'Solar Carbon Capture Plant Demonstration - Part 1',
        'subtitle' => 'RKDF R&D Centre',
        'badge' => 'RESEARCH VIDEO',
        'link' => 'Content/Videos/5. Carbon capture plants-Part1.mp4',
        'text' => 'Demonstration video of the Solar Carbon Capture pilot plant operating at RKDF University.'
    ],
    [
        'group' => 'Faculty of Science & Health',
        'title' => 'RKDF Carbon Capture Technology Overview',
        'subtitle' => 'RKDF R&D Centre',
        'badge' => 'RESEARCH VIDEO',
        'link' => 'images/gallery/video/RKDF Univ_CarbonCap.mp4',
        'text' => 'Technical overview of zero-carbon emissions initiative and carbon sequestration technology.'
    ],

    // Campus & General Education
    [
        'group' => 'Campus E-Content & National Initiatives',
        'title' => 'Viksit Bharat @2047 Student Initiative',
        'subtitle' => 'RKDF University Bhopal',
        'badge' => 'NATIONAL VIDEO',
        'link' => 'images/gallery/video/viksit_bharat.mp4',
        'text' => 'Youth participation and innovation video under Viksit Bharat @2047 national mission.'
    ],
    [
        'group' => 'Campus E-Content & National Initiatives',
        'title' => 'Field Craft & Battle Craft (NCC Army Wing)',
        'subtitle' => 'NCC Cadets Training',
        'badge' => 'YOUTUBE LECTURE',
        'link' => 'https://www.youtube.com/watch?v=vS1vrEWOn-E',
        'text' => 'Official video lecture on Military Field Craft, camouflage, and tactical maneuvers.'
    ]
];

$order = 1;
foreach ($lmsVideos as $vid) {
    $insSec->execute([
        $pageSlug,
        $vid['group'],
        $vid['title'],
        $vid['subtitle'],
        (string)$order,
        $vid['text'],
        'images/lovable/rkdf-students-quad.jpg',
        $vid['link'],
        $vid['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for lms updated with " . count($lmsVideos) . " valid working video lectures!\n";
