<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$slugData = [
    'international-admissions' => [
        'title' => 'International & NRI Admissions Secretariat',
        'eyebrow' => 'ADMISSIONS · INTERNATIONAL STUDENTS',
        'hero' => 'Dedicated admission cell for international, NRI, and foreign scholar applications across 30+ global countries.',
        'intro_h' => 'Global Scholar Admission & Student Exchange Cell',
        'intro_t' => "RKDF University welcomes international students from Asia, Africa, Europe, and the Middle East.\n\nOur International Students Cell provides visa assistance, residential hostel booking, english language support, and credit equivalence services.",
        'items' => [
            [
                'title' => 'International Students Admission Portal & Guidelines',
                'sub' => 'International Cell',
                'badge' => 'GLOBAL PORTAL ↗',
                'link' => 'foreign_stud/index.html',
                'text' => 'Direct portal for foreign nationals, NRI scholars, and international transfer applicants.'
            ],
            [
                'title' => 'Online Admission Application Portal 2026',
                'sub' => 'Admission Secretariat',
                'badge' => 'APPLY ONLINE ↗',
                'link' => 'admissionform.php',
                'text' => 'Online registration form for international student admissions.'
            ]
        ]
    ],
    'academic-departments' => [
        'title' => 'Faculties, Schools & Academic Departments Directory',
        'eyebrow' => 'ACADEMICS · SCHOOLS & DEPARTMENTS',
        'hero' => 'Comprehensive directory of university faculties, departments, degree programs, and academic laboratories.',
        'intro_h' => 'RKDF University Academic Faculties',
        'intro_t' => "RKDF University comprises 15+ constituent faculties including Engineering & Technology, Pharmacy, Management, Agriculture, Ayurvedic Medicine (BAMS), Homeopathy (BHMS), Nursing, Law, and Architecture.\n\nExplore our degree programs and department profiles below.",
        'items' => [
            [
                'title' => 'Academic Faculties & Programs Directory Portal',
                'sub' => 'Academic Affairs',
                'badge' => 'FACULTIES DIRECTORY ↗',
                'link' => 'academic&departments.php',
                'text' => 'Browse all undergraduate, postgraduate, and diploma degree programs across constituent colleges.'
            ],
            [
                'title' => 'University Approved Fee Structure 2026-27 (PDF)',
                'sub' => 'Finance Secretariat',
                'badge' => 'FEE STRUCTURE PDF',
                'link' => 'University_Fees_Structure.pdf',
                'text' => 'Approved annual tuition fee structure across all academic departments.'
            ]
        ]
    ],
    'bank-details' => [
        'title' => 'University Official Bank Account & Payment Details',
        'eyebrow' => 'ADMISSIONS · NEFT / RTGS BANK DETAILS',
        'hero' => 'Official bank account details for fee submission via NEFT, RTGS, IMPS, and Demand Draft.',
        'intro_h' => 'Official Bank Account Transfer Information',
        'intro_t' => "Students and parents paying tuition fees via Online Net Banking, NEFT, RTGS, or Demand Draft must remit fees strictly to the official university bank account below.\n\n**Account Name**: RKDF University Bhopal\n**Bank**: Punjab National Bank (PNB)\n**Branch**: Airport Bypass Road, Bhopal\n**Account No**: 6401002100001088\n**IFSC Code**: PUNB0640100",
        'items' => [
            [
                'title' => 'Official Bank Account & Wire Transfer Details (PDF)',
                'sub' => 'Accounts Branch',
                'badge' => 'BANK DETAILS',
                'link' => 'Bank-And-ATM.php',
                'text' => 'Official PNB bank account numbers, IFSC codes, and DD payment instructions.'
            ],
            [
                'title' => 'Online Fee Payment via Paytm Portal',
                'sub' => 'Digital Fee Gateway',
                'badge' => 'PAY ONLINE ↗',
                'link' => 'page.php?slug=pay-paytm',
                'text' => 'Instant online tuition fee payment using Paytm, UPI, Credit/Debit cards, or Net Banking.'
            ]
        ]
    ],
    'fee-structure' => [
        'title' => 'University Approved Tuition & Hostel Fee Structure 2026-27',
        'eyebrow' => 'ADMISSIONS · FEE STRUCTURE 2026-27',
        'hero' => 'Approved annual tuition fee structure, hostel fees, bus transport charges, and exam fees.',
        'intro_h' => 'Fee Structure & Financial Guidelines 2026-27',
        'intro_t' => "Tuition fees at RKDF University Bhopal are fixed in accordance with MP Private University Regulatory Commission directives.\n\nDetailed course-wise fee structures and installment schedules are available in the official document below.",
        'items' => [
            [
                'title' => 'University Approved Fee Structure 2026-27 (PDF)',
                'sub' => 'Finance Secretariat',
                'badge' => 'FEE STRUCTURE PDF',
                'link' => 'University_Fees_Structure.pdf',
                'text' => 'Official approved annual tuition fee schedule for Engineering, Pharmacy, Agriculture, Nursing, Law, and Management.'
            ],
            [
                'title' => 'Paytm Instant Fee Payment Portal',
                'sub' => 'Fee Gateway',
                'badge' => 'PAY ONLINE ↗',
                'link' => 'page.php?slug=pay-paytm',
                'text' => 'Pay semester tuition fees online with instant digital receipt generation.'
            ]
        ]
    ],
    'campus-facility' => [
        'title' => 'Campus Infrastructure & Student Facilities',
        'eyebrow' => 'CAMPUS LIFE · INFRASTRUCTURE & FACILITIES',
        'hero' => 'World-class campus infrastructure featuring digital smart classrooms, central library, sports complex, hostels, and Wi-Fi campus.',
        'intro_h' => 'State-of-the-Art Campus Infrastructure',
        'intro_t' => "Spread over a lush green 55+ acre university campus, RKDF University provides modern learning facilities including high-tech engineering & pharmacy research labs, central library with DELNET, separate AC/Non-AC hostels for boys and girls, 24x7 medical clinic, fleet of campus buses, and a multi-sport arena.",
        'items' => [
            [
                'title' => 'Central Library & E-Resource Center',
                'sub' => 'Library Network',
                'badge' => 'LIBRARY PORTAL ↗',
                'link' => 'Library.php',
                'text' => 'Central library with over 50,000 volumes, e-journals, and DELNET digital access.'
            ],
            [
                'title' => 'On-Campus Bank & 24x7 ATM Facility',
                'sub' => 'Campus Amenities',
                'badge' => 'BANK & ATM ↗',
                'link' => 'Bank-And-ATM.php',
                'text' => 'On-campus Punjab National Bank branch and 24-hour ATM for student financial services.'
            ]
        ]
    ],
    'pay-paytm' => [
        'title' => 'Pay Tuition & Exam Fees Online via Paytm Gateway',
        'eyebrow' => 'STUDENT SERVICES · ONLINE FEE PAYMENT',
        'hero' => 'Instant online payment of tuition fees, hostel fees, and exam fees using Paytm, UPI, Credit Card, Debit Card, or Net Banking.',
        'intro_h' => 'Instant Digital Fee Payment Gateway',
        'intro_t' => "RKDF University provides a secure online fee payment portal powered by Paytm.\n\nStudents can pay fees anywhere using UPI apps (GPay, PhonePe, Paytm), Credit Cards, Debit Cards, or Net Banking and instantly download official payment receipts.",
        'items' => [
            [
                'title' => 'Paytm Digital Fee Payment Portal',
                'sub' => 'Accounts & Finance',
                'badge' => 'PAY VIA PAYTM ↗',
                'link' => 'https://erplive.rkdf.ac.in/',
                'text' => 'Log in to ERP student portal or pay fee directly via Paytm digital payment gateway.'
            ],
            [
                'title' => 'Official Bank Account Transfer Details',
                'sub' => 'NEFT / RTGS',
                'badge' => 'BANK DETAILS ↗',
                'link' => 'page.php?slug=bank-details',
                'text' => 'View PNB bank account details for wire transfer and NEFT payments.'
            ]
        ]
    ],
    'inhouse-scheme' => [
        'title' => 'RKDF Group Staff & Alumni In-House Concession Scheme',
        'eyebrow' => 'SCHOLARSHIPS · IN-HOUSE SCHEME',
        'hero' => 'Special tuition fee concession policy for wards of RKDF Group employees, alumni, and continuing scholars.',
        'intro_h' => 'RKDF In-House Fee Concession Policy',
        'intro_t' => "To support faculty staff families and university alumni, RKDF University provides special tuition fee concessions under the In-House Concession Scheme.\n\nReview the official eligibility policy below.",
        'items' => [
            [
                'title' => 'RKDF In-House Scheme Policy Document (PDF)',
                'sub' => 'Scholarship Welfare Board',
                'badge' => 'INHOUSE POLICY PDF',
                'link' => 'Policy/Inhouse_Scheme_Policy.pdf',
                'text' => 'Official policy document detailing fee rebate percentages for staff wards, alumni siblings, and continuing scholars.'
            ],
            [
                'title' => 'Scholarship & Welfare Cell Portal',
                'sub' => 'Student Welfare',
                'badge' => 'SCHOLARSHIPS ↗',
                'link' => 'scholarship.php',
                'text' => 'Explore all state and university scholarship schemes available for enrolled scholars.'
            ]
        ]
    ],
    'meritorious-scheme' => [
        'title' => 'RKDF Meritorious Student Scholarship Policy',
        'eyebrow' => 'SCHOLARSHIPS · MERIT SCHOLARSHIPS',
        'hero' => 'Merit-based tuition fee scholarships for top rankers in qualifying board examinations and entrance tests.',
        'intro_h' => 'Meritorious Student Scholarship Scheme',
        'intro_t' => "RKDF University awards merit scholarships to high-achieving students scoring above 80% marks in 10+2 board examinations, JEE Main, or CUET UG.\n\nReview the scholarship slab percentages and renewal criteria below.",
        'items' => [
            [
                'title' => 'RKDF Meritorious Scheme Policy Document (PDF)',
                'sub' => 'Academic Merit Board',
                'badge' => 'MERIT POLICY PDF',
                'link' => 'Policy/Meritorious_Scheme_Policy.pdf',
                'text' => 'Official policy document detailing percentage slabs, fee discount structures, and academic performance renewal rules.'
            ],
            [
                'title' => 'Online Admission Application Portal 2026',
                'sub' => 'Admissions Cell',
                'badge' => 'APPLY FOR MERIT ↗',
                'link' => 'admissionform.php',
                'text' => 'Apply online for admission and claim merit scholarship discount during seat allotment.'
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
            'Official Admission & Fee Resources',
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
