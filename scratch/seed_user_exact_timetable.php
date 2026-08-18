<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'exam-timetable';
$introText = "Welcome to the Controller of Examinations Secretariat at RKDF University Bhopal. Official semester date sheets, examination timetables, and supplementary exam schedules across Diploma, Under-Graduate, and Post-Graduate faculties.";

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
    'Examination Time Table',
    'examination',
    '72 · CONTROLLER OF EXAMINATIONS (EXAM TIMETABLES)',
    'Official semester date sheets, examination timetables, and supplementary exam schedules across Diploma, Under-Graduate, and Post-Graduate faculties.',
    'images/lovable/rkdf-building-enhanced.jpg',
    'Official Examination Timetables',
    $introText,
    'rkdf, university, bhopal, exam timetable, semester datesheet, btech timetable, mba timetable, bams timetable',
    'Official semester date sheets, examination timetables, and supplementary exam schedules across Diploma, Under-Graduate, and Post-Graduate faculties.',
    $pageSlug
]);

// 2. Clear old page_sections for exam-timetable
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$userExactItems = [
    // 1. Session April 2026
    [
        'group' => 'Examination Time Table - Session April - 2026',
        'title' => 'HOMOEOPATHY M.D. PART-1 TIME TABLE APRIL-2026',
        'subtitle' => 'Faculty of Homoeopathy',
        'badge' => 'NEW DATESHEET',
        'link' => 'exam/timetable_april_26/HOMOEOPATHY M.D PART-1 TIME TABLE APRIL-2026.pdf',
        'text' => 'Official examination timetable for M.D. Homoeopathy Part-1 April 2026.'
    ],

    // 2. Session Aug 2026
    [
        'group' => 'Examination Time Table - Session Aug - 2026',
        'title' => 'D.PHARM SUPPLEMENTARY EXAM TIME TABLE AUGUST - 2026',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'SUPPLEMENTARY',
        'link' => 'exam/timetable_aug26/D.PHARM SUPPLEMENTARY  EXAM TIME TABLE AUGUST -2026.pdf',
        'text' => 'Supplementary examination timetable for Diploma in Pharmacy August 2026.'
    ],

    // 3. Diploma Programme Timetable - June 2026
    [
        'group' => 'Diploma Programme Timetable - June 2026',
        'title' => 'D.ARCH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Architecture',
        'badge' => 'DIPLOMA',
        'link' => 'exam/timetable_june26/D.ARCH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination datesheet for Diploma in Architecture.'
    ],
    [
        'group' => 'Diploma Programme Timetable - June 2026',
        'title' => 'DIPLOMA ENGG TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Engineering (Polytechnic Wing)',
        'badge' => 'DIPLOMA',
        'link' => 'exam/timetable_june26/DIPLOMA ENGG TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Polytechnic Diploma in Engineering.'
    ],
    [
        'group' => 'Diploma Programme Timetable - June 2026',
        'title' => 'DIPLOMA IN X-RAY TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'DIPLOMA',
        'link' => 'exam/timetable_june26/DIPLOMA IN X-RAY TIME TABLE JUNE-2026.pdf',
        'text' => 'Examination timetable for Diploma in X-Ray Technology.'
    ],
    [
        'group' => 'Diploma Programme Timetable - June 2026',
        'title' => 'DMLT TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'DIPLOMA',
        'link' => 'exam/timetable_june26/DMLT TIME TABLE JUNE-2026.pdf',
        'text' => 'Examination timetable for Diploma in Medical Lab Technology.'
    ],

    // 4. Post-Graduate Programme Timetable - June 2026
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'LLM ALL BRANCH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Law',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/LLM ALL BRANCH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for LL.M all branches.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.COM NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.COM NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Com under National Education Policy.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.COM TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.COM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Com regular scheme.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.ED TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Education',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.ED TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Master of Education.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.PHARM TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.PHARM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Master of Pharmacy.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.PHARM 3RD SEM TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.PHARM 3RD SEM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Pharm 3rd Semester.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.SC AG TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.SC AG TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Sc. Agriculture.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.SC NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Science',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.SC NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Sc. NEP scheme.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.Sc TIMETABLE JUNE-2026',
        'subtitle' => 'Faculty of Science',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.Sc TIMETABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Sc. regular scheme.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'M.TECH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/M.TECH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.Tech all branches.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'MA ALL BRANCH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/MA ALL BRANCH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.A. all subjects.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'MA NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/MA NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for M.A. under NEP scheme.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'MBA TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/MBA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for MBA all specializations.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'MCA TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/MCA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Master of Computer Applications.'
    ],
    [
        'group' => 'Post-Graduate Programme Timetable - June 2026',
        'title' => 'MSW TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Social Work',
        'badge' => 'POST-GRADUATE',
        'link' => 'exam/timetable_june26/MSW TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Master of Social Work.'
    ],

    // 5. Under-Graduate Programme Timetable - Regular / Supplimentary Exam June 2026
    [
        'group' => 'Under-Graduate Programme Timetable - Regular / Supplimentary Exam June 2026',
        'title' => 'TIME TABLE BAMS 2nd PROFESSIONAL - JUNE-2026 (Ayurveda)',
        'subtitle' => 'Faculty of Ayurveda (RKDF Medical College)',
        'badge' => 'BAMS 2ND PROF',
        'link' => 'exam/timetable_june26/TIME TABLE BAMS 2nd  PROFESSIONAL JUNE-2026.pdf',
        'text' => 'Examination timetable for BAMS 2nd Professional Ayurveda.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - Regular / Supplimentary Exam June 2026',
        'title' => 'TIME TABLE BAMS 3rd PROFESSIONAL Regular / Supplimentary - JUNE-2026 (Ayurveda)',
        'subtitle' => 'Faculty of Ayurveda (RKDF Medical College)',
        'badge' => 'BAMS 3RD PROF',
        'link' => 'exam/timetable_june26/TIME TABLE BAMS 3RD PROFESSIONAL JUNE-2026.pdf',
        'text' => 'Examination timetable for BAMS 3rd Professional Regular & Supplementary.'
    ],

    // 6. Under-Graduate Programme Timetable - June 2026
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BA 2021 BATCH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Humanities',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BA 2021 BATCH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.A. 2021 Batch.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.ARCH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Architecture',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.ARCH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Architecture.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.COM NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Commerce',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.COM NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Com under NEP scheme.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.ED TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Education',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.ED TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Education.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.PHARM TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Pharmaceutical Sciences',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.PHARM TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Pharmacy.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.SC AGRICULTURE TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Agriculture',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.SC AGRICULTURE TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Sc. (Hons.) Agriculture.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.SC OLD SCHEME TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Science',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.SC OLD SCHEME  TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Sc. old scheme.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.SC NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Science',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.SC NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Sc. under NEP scheme.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.TECH AG TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Agricultural Engineering',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.TECH AG TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Tech Agricultural Engineering.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'B.TECH TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Engineering & Technology',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/B.TECH TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Tech all branches.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BA NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Social Science & Humanities',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BA NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.A. under NEP scheme.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BALLB TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Law',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BALLB TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for 5-Year B.A. LL.B integrated program.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BBA TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Management Studies',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BBA TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Business Administration.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BCA NEP TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Computer Applications',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BCA NEP TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for BCA under NEP scheme.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BMLT TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Paramedical Sciences',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BMLT TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for B.Sc. Medical Lab Technology.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'LLB TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Law',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/LLB TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for 3-Year LL.B program.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BPT TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Physiotherapy',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BPT TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Physiotherapy.'
    ],
    [
        'group' => 'Under-Graduate Programme Timetable - June 2026',
        'title' => 'BSW TIME TABLE JUNE-2026',
        'subtitle' => 'Faculty of Social Work',
        'badge' => 'UNDER-GRADUATE',
        'link' => 'exam/timetable_june26/BSW TIME TABLE JUNE-2026.pdf',
        'text' => 'Semester examination timetable for Bachelor of Social Work.'
    ]
];

$order = 1;
foreach ($userExactItems as $item) {
    $insSec->execute([
        $pageSlug,
        $item['group'],
        $item['title'],
        $item['subtitle'],
        (string)$order,
        $item['text'],
        'images/lovable/rkdf-building-enhanced.jpg',
        $item['link'],
        $item['badge'],
        $order
    ]);
    $order++;
}

echo "page_sections for exam-timetable re-seeded with " . count($userExactItems) . " exact items matching user code!\n";
