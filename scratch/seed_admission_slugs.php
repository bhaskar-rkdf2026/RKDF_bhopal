<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$slugData = [
    'admission-notice' => [
        'title' => 'Admission Notice, Courses & Important Dates 2026-27',
        'eyebrow' => 'ADMISSIONS · OFFICIAL NOTICES',
        'hero' => 'Official notification regarding course eligibility, application schedules, entrance exam dates, and last date for submission of forms.',
        'intro_h' => 'Admission Notification & Important Dates 2026-27',
        'intro_t' => "Applications are invited for Undergraduate, Postgraduate, Diploma, and Ph.D programs for Academic Session 2026-27 across all constituent colleges of RKDF University Bhopal.\n\nCandidates can apply online through the official admission portal or visit the campus admission cell.",
        'items' => [
            [
                'title' => 'Official Admission Policy & Notification 2026-27 (PDF)',
                'sub' => 'Central Admission Secretariat',
                'badge' => 'OFFICIAL NOTICE PDF',
                'link' => 'ADMISSION POLICY 2026-27.pdf',
                'text' => 'Official notification detailing online application schedules, course intakes, eligibility criteria, and fee structures for session 2026-27.'
            ],
            [
                'title' => 'Online Admission Application Portal 2026',
                'sub' => 'Digital Admission Cell',
                'badge' => 'APPLY ONLINE ↗',
                'link' => 'admissionform.php',
                'text' => 'Direct portal to submit online admission applications for B.Tech, MBA, B.Pharm, BAMS, BHMS, Law, Agriculture, and B.Sc.'
            ],
            [
                'title' => 'University Approved Fee Structure 2026-27 (PDF)',
                'sub' => 'Finance & Accounts Branch',
                'badge' => 'FEE STRUCTURE PDF',
                'link' => 'University_Fees_Structure.pdf',
                'text' => 'Approved tuition fee structure, hostel fees, and payment schedule across all faculties.'
            ]
        ]
    ],
    'admission-rules' => [
        'title' => 'Admission Rules, Regulations & Eligibility 2026-27',
        'eyebrow' => 'ADMISSIONS · RULES & ORDINANCES',
        'hero' => 'Statutory admission ordinances, reservation criteria, domicile regulations, and document verification guidelines.',
        'intro_h' => 'Regulatory Admission Ordinances & Rules',
        'intro_t' => "Admissions at RKDF University Bhopal are governed by MP Private University Regulatory Commission norms, UGC guidelines, and statutory councils including AICTE, PCI, BCI, COA, and INC.\n\nSelection is merit-based through qualifying examinations and national/state entrance tests.",
        'items' => [
            [
                'title' => 'Statutory Admission Rules & Ordinance 2026-27 (PDF)',
                'sub' => 'Academic Council',
                'badge' => 'ADMISSION RULES PDF',
                'link' => 'Admission_Rules_2025-26.pdf',
                'text' => 'Official rules governing domicile quota, category reservations (SC/ST/OBC/EWS), lateral entry, and document submission.'
            ],
            [
                'title' => 'Official Admission Policy Framework (PDF)',
                'sub' => 'Directorate of Admissions',
                'badge' => 'ADMISSION POLICY PDF',
                'link' => 'ADMISSION POLICY 2026-27.pdf',
                'text' => 'Comprehensive policy guidelines for merit list preparation, counseling rounds, and seat cancellation rules.'
            ],
            [
                'title' => 'Government Scholarship & Reservation Guidelines',
                'sub' => 'Scholarship & Social Welfare Cell',
                'badge' => 'SCHOLARSHIP RULES ↗',
                'link' => 'scholarship.php',
                'text' => 'Guidelines for MP Post Matric Scholarship, Chief Minister Medhavi Vidyarthi Yojana (MMVY), and National Scholarship Portal.'
            ]
        ]
    ],
    'cuet-mapping' => [
        'title' => 'CUET (UG) Course Mapping & Eligibility Matrix 2026',
        'eyebrow' => 'ADMISSIONS · CUET UG 2026 MAPPING',
        'hero' => 'Common University Entrance Test (CUET UG) course mapping, domain subject combinations, and merit eligibility.',
        'intro_h' => 'CUET (UG) Subject Combination Mapping Matrix',
        'intro_t' => "Candidates appearing for CUET UG conducted by NTA can map their domain subjects for direct merit admission into RKDF University undergraduate degree programs.\n\nReview the course-wise domain paper requirements below.",
        'items' => [
            [
                'title' => 'CUET (UG) Degree & Subject Mapping Matrix (PDF)',
                'sub' => 'NTA Entrance Cell',
                'badge' => 'CUET MATRIX PDF',
                'link' => 'images/06/Mapping list for CUET(UG)- 2023.pdf',
                'text' => 'Official mapping table listing required Section I languages, Section II domain subjects, and Section III general test requirements for all UG programs.'
            ],
            [
                'title' => 'CUET Merit Online Admission Application Portal',
                'sub' => 'Admission Secretariat',
                'badge' => 'APPLY WITH CUET ↗',
                'link' => 'admissionform.php',
                'text' => 'Direct application form for CUET candidates to enter scorecards and reserve seats.'
            ],
            [
                'title' => 'Undergraduate Academic Programs Directory',
                'sub' => 'Faculties & Departments',
                'badge' => 'PROGRAMS DIRECTORY ↗',
                'link' => 'academic&departments.php',
                'text' => 'Explore all undergraduate programs in Engineering, Agriculture, Pharmacy, Management, and Science.'
            ]
        ]
    ]
];

$upPage = $pdo->prepare("UPDATE site_pages SET page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
$delSec  = $pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?");
$insSec  = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

foreach ($slugData as $s => $data) {
    $upPage->execute([
        $data['title'],
        'admissions',
        $data['eyebrow'],
        $data['hero'],
        'images/lovable/rkdf-students-quad.jpg',
        $data['intro_h'],
        $data['intro_t'],
        $s
    ]);

    $delSec->execute([$s]);

    $order = 1;
    foreach ($data['items'] as $item) {
        $insSec->execute([
            $s,
            'Official Admission Resources',
            $item['title'],
            $item['sub'],
            (string)$order,
            $item['text'],
            'images/lovable/rkdf-students-quad.jpg',
            $item['link'],
            $item['badge'],
            $order
        ]);
        $order++;
    }
    echo "Updated {$s} in CMS DB with " . count($data['items']) . " items!\n";
}
