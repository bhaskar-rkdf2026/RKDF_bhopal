<?php
// ============================================================
// RKDF University — Global Site-Wide Search API
// Returns instant categorized JSON results across all university pages, courses, notices & services
// ============================================================
if (!headers_sent()) {
    header('Content-Type: application/json; charset=utf-8');
}
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/include/cms_engine.php';

$query = trim($_GET['q'] ?? '');
if (strlen($query) < 1) {
    echo json_encode(['results' => [], 'count' => 0]);
    exit;
}

// Master Search Index of RKDF University
$searchIndex = [
    // ── Faculties & Courses ──
    [
        'title'    => 'Faculty of Engineering & Technology (B.Tech, M.Tech, Diploma)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'Engineering.php',
        'keywords' => 'engineering b.tech m.tech computer science mechanical civil electrical ec mechanical it diploma cse btech mtech courses degree'
    ],
    [
        'title'    => 'Faculty of Pharmacy (B.Pharm, D.Pharm, M.Pharm, Ph.D)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'pharmacy.php',
        'keywords' => 'pharmacy b.pharm d.pharm m.pharm pharmaceutics pharmacology pci approval bpharm dpharm medicine drugs'
    ],
    [
        'title'    => 'Faculty of Management (MBA, BBA, B.Com, Ph.D)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'Management.php',
        'keywords' => 'management mba bba business administration finance marketing hr human resource commerce bcom'
    ],
    [
        'title'    => 'Faculty of Computer Applications (MCA, BCA, PGDCA)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'Computer-Application.php',
        'keywords' => 'computer applications mca bca pgdca software coding data science ai artificial intelligence it programming web development'
    ],
    [
        'title'    => 'Faculty of Agriculture (B.Sc Hons Agriculture, M.Sc)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'Agriculture.php',
        'keywords' => 'agriculture b.sc bsc ag horticulture agronomy soil science icar farming agricultural crop science'
    ],
    [
        'title'    => 'Faculty of Law (LL.B, BA LL.B, LL.M, Ph.D)',
        'category' => 'Programs & Academics',
        'badge'    => 'FACULTY',
        'url'      => 'Law.php',
        'keywords' => 'law llb ba llb ballb llm bar council bci legal studies advocate constitutional law moot court'
    ],
    [
        'title'    => 'Homeopathy Medical College & Hospital (BHMS)',
        'category' => 'Medical & AYUSH',
        'badge'    => 'MEDICAL',
        'url'      => 'BHMS.php',
        'keywords' => 'homeopathy bhms cch medical doctor hospital clinic homeopathic'
    ],
    [
        'title'    => 'Ram Krishna College of Ayurveda & Medical Sciences (BAMS)',
        'category' => 'Medical & AYUSH',
        'badge'    => 'AYUSH',
        'url'      => 'BAMS.php',
        'keywords' => 'ayurveda bams ncism ayush herbal medicine hospital panchakarma ayurvedic'
    ],
    [
        'title'    => 'Faculty of Nursing (B.Sc Nursing, GNM, Post Basic)',
        'category' => 'Medical & AYUSH',
        'badge'    => 'NURSING',
        'url'      => 'nursing.php',
        'keywords' => 'nursing b.sc nursing bsc gnm anm inc approval healthcare hospital patient care clinical'
    ],
    [
        'title'    => 'Faculty of Paramedical Science & Technologies',
        'category' => 'Medical & AYUSH',
        'badge'    => 'PARAMEDICAL',
        'url'      => 'paramdical.php',
        'keywords' => 'paramedical dmlt bmlt lab technician radiology physiotherapy medical lab technology bpt'
    ],
    [
        'title'    => 'Faculty of Science (Physics, Chemistry, Maths, Bio, Zoology, Botany)',
        'category' => 'Programs & Academics',
        'badge'    => 'SCIENCE',
        'url'      => 'Science.php',
        'keywords' => 'science physics chemistry mathematics zoology botany biotechnology microbiology b.sc m.sc'
    ],
    [
        'title'    => 'Faculty of Commerce (B.Com, M.Com, Taxation, Accounts)',
        'category' => 'Programs & Academics',
        'badge'    => 'COMMERCE',
        'url'      => 'Commerce.php',
        'keywords' => 'commerce b.com m.com accounts banking taxation finance economics'
    ],
    [
        'title'    => 'Faculty of Education (B.Ed, M.Ed, D.El.Ed)',
        'category' => 'Programs & Academics',
        'badge'    => 'EDUCATION',
        'url'      => 'Education.php',
        'keywords' => 'education b.ed bed m.ed med ncte teaching pedagogy teacher training'
    ],
    [
        'title'    => 'Faculty of Architecture & Planning (B.Arch)',
        'category' => 'Programs & Academics',
        'badge'    => 'ARCHITECTURE',
        'url'      => 'architect.php',
        'keywords' => 'architecture b.arch coa approval urban planning design building drawing'
    ],
    [
        'title'    => 'Library and Information Science (B.Lib, M.Lib)',
        'category' => 'Programs & Academics',
        'badge'    => 'LIBRARY',
        'url'      => 'Library.php',
        'keywords' => 'library science b.lib m.lib blib mlib books catalog documentation'
    ],
    [
        'title'    => 'All Academic Faculties & Departments Directory',
        'category' => 'Academic Directory',
        'badge'    => 'DIRECTORY',
        'url'      => 'academic&departments.php',
        'keywords' => 'departments faculties courses list of programs degree diploma colleges constituent'
    ],
    [
        'title'    => 'University Course Syllabus & Schemes Directory',
        'category' => 'Academic Resources',
        'badge'    => 'SYLLABUS',
        'url'      => 'Syllabus.php',
        'keywords' => 'syllabus course scheme cbcs nep 2020 examination scheme subjects curriculum course structure'
    ],

    // ── Admissions & Fees ──
    [
        'title'    => 'Online Admission Application Form (2026-27)',
        'category' => 'Admissions',
        'badge'    => 'APPLY ONLINE',
        'url'      => 'admissionform.php',
        'keywords' => 'admission form apply now online admission registration application apply 2026 2027 entry'
    ],
    [
        'title'    => 'University Fees Structure (Official PDF)',
        'category' => 'Admissions & Fees',
        'badge'    => 'FEE STRUCTURE',
        'url'      => 'University_Fees_Structure.pdf',
        'keywords' => 'fees structure tuition fee hostel fee admission fee payment cost per semester annual fees fee schedule'
    ],
    [
        'title'    => 'University Admission Prospectus & Brochure',
        'category' => 'Admissions',
        'badge'    => 'PROSPECTUS',
        'url'      => 'prospectus.php',
        'keywords' => 'prospectus admission brochure brochure download information guidelines courses seat matrix'
    ],
    [
        'title'    => 'University Scholarships & Financial Concessions',
        'category' => 'Admissions & Support',
        'badge'    => 'SCHOLARSHIPS',
        'url'      => 'scholarship.php',
        'keywords' => 'scholarship government scholarship meritorious concession financial aid sc st obc post matric'
    ],
    [
        'title'    => 'International Admissions Cell',
        'category' => 'Admissions',
        'badge'    => 'INTERNATIONAL',
        'url'      => 'foreign_stud/index.html',
        'keywords' => 'international foreign students nri admission visa global exchange'
    ],
    [
        'title'    => 'University Bank Details & Online Fee Payment Accounts',
        'category' => 'Admissions & Fees',
        'badge'    => 'PAYMENT',
        'url'      => 'Bank-And-ATM.php',
        'keywords' => 'bank account ifsc code payment paytm fee transfer account number rtgs neft pay fee online'
    ],

    // ── Examination & Results ──
    [
        'title'    => 'Declared Examination Results Portal',
        'category' => 'Examinations',
        'badge'    => 'RESULTS',
        'url'      => 'Result.php',
        'keywords' => 'results exam result declared semester marksheet scorecard pass fail marks result 2024 2025 2026 check result'
    ],
    [
        'title'    => 'Official Examination Notices & Circulars',
        'category' => 'Examinations',
        'badge'    => 'NOTICES',
        'url'      => 'Exam_Notice.php',
        'keywords' => 'exam notice timetable schedule notification postpone exam date circular examination cell'
    ],
    [
        'title'    => 'Examination Timetable & Datesheet Schedule',
        'category' => 'Examinations',
        'badge'    => 'TIMETABLE',
        'url'      => 'examtimetable.php',
        'keywords' => 'timetable datesheet exam schedule date sheet theory practical examination dates'
    ],
    [
        'title'    => 'Document & Degree Verification Application',
        'category' => 'Student Services',
        'badge'    => 'VERIFICATION',
        'url'      => 'Verification_Form.php',
        'keywords' => 'verification document verification degree certificate credential check bgv verification fee'
    ],
    [
        'title'    => 'Application Form for Duplicate / Corrected Marksheet',
        'category' => 'Student Services',
        'badge'    => 'MARKSHEET',
        'url'      => 'Marksheet_Form.php',
        'keywords' => 'duplicate marksheet correction lost marksheet damaged marksheet application grade card'
    ],
    [
        'title'    => 'Form for Name Correction in Marksheet / Degree',
        'category' => 'Student Services',
        'badge'    => 'CORRECTION',
        'url'      => 'Name_Correction_Form.php',
        'keywords' => 'name correction spelling change marksheet degree certificate correction'
    ],
    [
        'title'    => 'Degree Migration Certificate Application (Hindi)',
        'category' => 'Student Services',
        'badge'    => 'MIGRATION',
        'url'      => 'Migration_Hindi.php',
        'keywords' => 'migration hindi migration certificate degree transfer migration form'
    ],
    [
        'title'    => 'Degree Migration Certificate Application (English)',
        'category' => 'Student Services',
        'badge'    => 'MIGRATION',
        'url'      => 'Migration_English.php',
        'keywords' => 'migration certificate english transfer degree certificate clearance'
    ],
    [
        'title'    => 'Student ERP Portal & Online Gateway',
        'category' => 'Student Portal',
        'badge'    => 'ERP LOGIN',
        'url'      => 'Student_Portal.php',
        'keywords' => 'student portal erp login erplive attendance fees results exam form admit card student login'
    ],
    [
        'title'    => 'LMS E-Learning & Digital Classroom Portal',
        'category' => 'Student Portal',
        'badge'    => 'LMS',
        'url'      => 'LMS.php',
        'keywords' => 'lms e-learning moodle classroom study material lectures video classes online learning'
    ],

    // ── Research & Ph.D ──
    [
        'title'    => 'Doctor of Philosophy (Ph.D) Subjects Offered',
        'category' => 'Research & Ph.D',
        'badge'    => 'PH.D',
        'url'      => 'phdsubjects.php',
        'keywords' => 'phd subjects doctor of philosophy research doctoral engineering science pharmacy management'
    ],
    [
        'title'    => 'Ph.D Entrance Examination & Admissions 2026',
        'category' => 'Research & Ph.D',
        'badge'    => 'PH.D ENTRANCE',
        'url'      => 'phd_entrance.php',
        'keywords' => 'phd entrance exam syllabus interview research scholar application admission 2026 rdat'
    ],
    [
        'title'    => 'Ph.D Course Work Scheme & Syllabus',
        'category' => 'Research & Ph.D',
        'badge'    => 'PH.D SYLLABUS',
        'url'      => 'phdsyllabus.php',
        'keywords' => 'phd syllabus course work research methodology publication ethics'
    ],
    [
        'title'    => 'Registered Ph.D Research Scholars Directory',
        'category' => 'Research & Ph.D',
        'badge'    => 'PH.D DIRECTORY',
        'url'      => 'phdstudent.php',
        'keywords' => 'phd students research scholars enrolled candidates doctoral student directory'
    ],
    [
        'title'    => 'List of Approved Research Supervisors (Guides)',
        'category' => 'Research & Ph.D',
        'badge'    => 'SUPERVISORS',
        'url'      => 'supervisors01.php',
        'keywords' => 'supervisors guides phd guide professors research mentor faculty guide'
    ],
    [
        'title'    => 'R&D Projects & Sponsored Research Grants',
        'category' => 'Research & Innovation',
        'badge'    => 'R&D PROJECTS',
        'url'      => 'RnD_Projects.php',
        'keywords' => 'rnd research projects funding csir dst govt projects solar carbon capture incubation grants'
    ],
    [
        'title'    => 'Shodh Sangam — University Research Journals',
        'category' => 'Research & Innovation',
        'badge'    => 'JOURNALS',
        'url'      => 'journals.php',
        'keywords' => 'journals shodh sangam research papers publication articles peer reviewed shodh sangam'
    ],
    [
        'title'    => 'University Patents & Intellectual Property (IPR)',
        'category' => 'Research & Innovation',
        'badge'    => 'PATENTS',
        'url'      => 'patent.php',
        'keywords' => 'patents ipr intellectual property innovation inventions technology transfer patent list'
    ],

    // ── Governance & Leadership ──
    [
        'title'    => 'About RKDF University Bhopal (Overview & Heritage)',
        'category' => 'About Us',
        'badge'    => 'ABOUT',
        'url'      => 'about.php',
        'keywords' => 'about us university history established 2011 rkdf group campus vision profile'
    ],
    [
        'title'    => 'Honorable Chancellor Desk (Dr. Sunil Kapoor)',
        'category' => 'Leadership',
        'badge'    => 'CHANCELLOR',
        'url'      => 'Chancellor.php',
        'keywords' => 'chancellor dr sunil kapoor leadership message desk address founder rkdf group'
    ],
    [
        'title'    => 'Honorable Pro-Chancellor Desk',
        'category' => 'Leadership',
        'badge'    => 'PRO-CHANCELLOR',
        'url'      => 'ProChancellor.php',
        'keywords' => 'pro chancellor leadership desk message administration leadership'
    ],
    [
        'title'    => 'Vice Chancellor Desk',
        'category' => 'Leadership',
        'badge'    => 'VICE CHANCELLOR',
        'url'      => 'Vice-Chancellor-Desk.php',
        'keywords' => 'vice chancellor vc desk message academic executive administration'
    ],
    [
        'title'    => 'Registrar Profile & Administration',
        'category' => 'Leadership',
        'badge'    => 'REGISTRAR',
        'url'      => 'Registrar.php',
        'keywords' => 'registrar administration office contact official head'
    ],
    [
        'title'    => 'Faculty Deans Directory',
        'category' => 'Academic Leadership',
        'badge'    => 'DEANS',
        'url'      => 'dean.php',
        'keywords' => 'deans faculty deans academic leadership deans profile heads constituent'
    ],
    [
        'title'    => 'Institute Heads & Department Heads (HODs) Directory',
        'category' => 'Academic Leadership',
        'badge'    => 'HODS',
        'url'      => 'hod.php',
        'keywords' => 'hod heads of department institute heads directors principals constituent colleges'
    ],
    [
        'title'    => 'Governing Body of the University',
        'category' => 'Statutory Governance',
        'badge'    => 'GOVERNING BODY',
        'url'      => 'Governingbody.php',
        'keywords' => 'governing body apex body statute 9 members governance authority'
    ],
    [
        'title'    => 'Board of Management (BoM)',
        'category' => 'Statutory Governance',
        'badge'    => 'BOM',
        'url'      => 'BoM.php',
        'keywords' => 'board of management bom statute 10 executive committee administration members'
    ],
    [
        'title'    => 'Academic Council of the University',
        'category' => 'Statutory Governance',
        'badge'    => 'ACADEMIC COUNCIL',
        'url'      => 'Academic_Council.php',
        'keywords' => 'academic council statute 11 academic regulation curriculum standard members'
    ],
    [
        'title'    => 'Board of Studies (BOS)',
        'category' => 'Statutory Governance',
        'badge'    => 'BOS',
        'url'      => 'BOS.php',
        'keywords' => 'board of studies bos curriculum syllabus design departmental board'
    ],
    [
        'title'    => 'Public Self Disclosures & Regulatory Approvals',
        'category' => 'Compliance',
        'badge'    => 'PUBLIC DISCLOSURE',
        'url'      => 'public-disclosure.php',
        'keywords' => 'public disclosure naac ugc aicte pci bci ncte inc cch ncism approval affiliation mandatory disclosure'
    ],

    // ── Careers, Alumni & Contact ──
    [
        'title'    => 'Careers & Academic Recruitment (Walk-In Interviews)',
        'category' => 'Careers',
        'badge'    => 'JOB OPENINGS',
        'url'      => 'Careers.php',
        'keywords' => 'careers job openings vacancy recruitment faculty walk in interview apply professor hr'
    ],
    [
        'title'    => 'Training & Placement Cell (T&P)',
        'category' => 'Placements',
        'badge'    => 'T&P CELL',
        'url'      => 't&p.php',
        'keywords' => 'training and placement t&p cell recruit recruiters corporate packages placement record internships'
    ],
    [
        'title'    => 'Alumni Network & Registration',
        'category' => 'Alumni',
        'badge'    => 'ALUMNI',
        'url'      => 'alumni.php',
        'keywords' => 'alumni alumni network graduates registration connect meet association'
    ],
    [
        'title'    => 'Contact Us & Campus Directory',
        'category' => 'Contact',
        'badge'    => 'CONTACT US',
        'url'      => 'contact-us.php',
        'keywords' => 'contact us phone number email address helpline airport bypass road gandhi nagar bhopal map emergency'
    ],
    [
        'title'    => 'Convocation Portal & Medals Lists',
        'category' => 'Convocations',
        'badge'    => 'CONVOCATION',
        'url'      => 'Convocation.php',
        'keywords' => 'convocation annual convocation gold medal silver medal degree ceremony academic session'
    ],
    [
        'title'    => 'Official Announcements & Circulars Hub',
        'category' => 'Announcements',
        'badge'    => 'CIRCULARS',
        'url'      => 'Announcements.php',
        'keywords' => 'announcements circulars tenders e-tenders notice tender download'
    ]
];

// Perform smart search match scoring
$matched = [];
$qLower = strtolower($query);
$qTokens = array_filter(explode(' ', $qLower));

foreach ($searchIndex as $item) {
    $score = 0;
    $titleLower = strtolower($item['title']);
    $catLower   = strtolower($item['category']);
    $kwLower    = strtolower($item['keywords']);

    // Exact title phrase match
    if (strpos($titleLower, $qLower) !== false) {
        $score += 60;
    }
    // Category match
    if (strpos($catLower, $qLower) !== false) {
        $score += 30;
    }
    // Keyword match
    if (strpos($kwLower, $qLower) !== false) {
        $score += 25;
    }

    // Token matches
    foreach ($qTokens as $t) {
        if (strlen($t) < 2) continue;
        if (strpos($titleLower, $t) !== false) $score += 20;
        if (strpos($catLower, $t) !== false)   $score += 10;
        if (strpos($kwLower, $t) !== false)    $score += 8;
    }

    if ($score > 0) {
        $matched[] = [
            'title'    => $item['title'],
            'category' => $item['category'],
            'badge'    => $item['badge'],
            'url'      => $item['url'],
            'score'    => $score
        ];
    }
}

// Sort by match score descending
usort($matched, function($a, $b) {
    return $b['score'] <=> $a['score'];
});

// Return top 15 results
$topResults = array_slice($matched, 0, 15);

echo json_encode([
    'query'   => $query,
    'count'   => count($matched),
    'results' => $topResults
], JSON_UNESCAPED_UNICODE);
