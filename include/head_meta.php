<?php
// ============================================================
// RKDF University — Global Centralized SEO & Head Metadata Engine
// Automatic Resolution of Meta Titles, Descriptions, Keywords, Canonical URLs & OpenGraph Tags
// ============================================================

// Detect current page file or slug
$currentScript = basename($_SERVER['PHP_SELF'] ?? '');
$currentSlug   = $pageSlug ?? ($pageKey ?? '');

// Master SEO Catalog for all University Pages
$seoCatalog = [
    'index.php' => [
        'title' => 'RKDF University Bhopal — Premier Private State University in MP | Admissions 2026-27',
        'desc'  => 'RKDF University Bhopal (Est. 2011) — Top-ranked multidisciplinary state university in MP offering AICTE, UGC, PCI, BCI, INC & NCISM approved UG, PG, Diploma & Ph.D degree programs.',
        'keys'  => 'RKDF University Bhopal, Best University in MP, Admissions 2026, B.Tech, MBA, Pharmacy, Agriculture, Law, BAMS, BHMS, Ph.D'
    ],
    'about.php' => [
        'title' => 'About RKDF University Bhopal — Heritage, Vision & UGC Recognition',
        'desc'  => 'Learn about RKDF University Bhopal established in 2011 by Madhya Pradesh State Legislature, managed by Ayushmati Education and Social Society under visionary leadership.',
        'keys'  => 'about rkdf university, rkdf group bhopal, ugc recognized university mp, university heritage, campus profile'
    ],
    'admissionform.php' => [
        'title' => 'Online Admission Application Form 2026-27 — Apply Online — RKDF University',
        'desc'  => 'Apply online for RKDF University Bhopal admissions 2026-27. Direct admissions in B.Tech, MBA, Pharmacy, B.Sc Agriculture, Law, Nursing, AYUSH & Diploma courses.',
        'keys'  => 'rkdf admission form 2026, apply online rkdf, rkdf admission registration, online admission form bhopal'
    ],
    'search.php' => [
        'title' => 'Search University Courses, Admissions & Results — RKDF University Bhopal',
        'desc'  => 'Search across all academic degree programs, declared examination results, admission guidelines, course schemes, Ph.D research, and campus helpdesk services.',
        'keys'  => 'rkdf search, search courses, check rkdf results, find syllabus, admission search'
    ],
    'Result.php' => [
        'title' => 'Declared Examination Results Portal 2026 — RKDF University Bhopal',
        'desc'  => 'Check and download declared semester examination results for Engineering, Pharmacy, Management, Agriculture, Law, Nursing, and Paramedical courses.',
        'keys'  => 'rkdf results 2026, rkdf exam result, check semester result, rkdf marksheet scorecard'
    ],
    'Exam_Notice.php' => [
        'title' => 'Examination Notices, Circulars & Notifications — RKDF University Bhopal',
        'desc'  => 'Official notifications regarding semester examination forms, late fee dates, practical exam schedules, and admit card release circulars.',
        'keys'  => 'rkdf exam notice, examination circular, exam form date, admit card release'
    ],
    'examtimetable.php' => [
        'title' => 'Examination Timetable & Datesheet Schedule — RKDF University Bhopal',
        'desc'  => 'Download official semester examination timetables and date sheets for theory and practical exams across all constituent colleges.',
        'keys'  => 'rkdf exam timetable, examination date sheet, rkdf semester timetable 2026'
    ],
    'Engineering.php' => [
        'title' => 'Faculty of Engineering & Technology (B.Tech, M.Tech) — RKDF University Bhopal',
        'desc'  => 'Pursue industry-driven B.Tech & M.Tech programs in Computer Science (CSE), AI & Data Science, Mechanical, Civil, and Electrical Engineering with modern labs.',
        'keys'  => 'btech in bhopal, engineering college rkdf, mtech computer science, cse engineering admissions 2026'
    ],
    'pharmacy.php' => [
        'title' => 'Faculty of Pharmacy (B.Pharm, D.Pharm, M.Pharm, PCI Approved) — RKDF University',
        'desc'  => 'Pharmacy Council of India (PCI) approved pharmaceutical education in Pharmaceutics, Pharmacology, Pharmacognosy, and Pharmaceutical Chemistry.',
        'keys'  => 'b.pharm in bhopal, d.pharm admission, m.pharm college mp, pci approved pharmacy college'
    ],
    'Management.php' => [
        'title' => 'Faculty of Management (MBA, BBA, B.Com, Ph.D) — RKDF University Bhopal',
        'desc'  => 'Master of Business Administration (MBA) with specializations in Finance, Marketing, HR, Business Analytics, and Banking with high placement packages.',
        'keys'  => 'mba in bhopal, best mba college mp, bba admission 2026, management programs rkdf'
    ],
    'Agriculture.php' => [
        'title' => 'Faculty of Agriculture (B.Sc Hons Agriculture, ICAR Compliant) — RKDF University',
        'desc'  => 'B.Sc. (Hons.) Agriculture degree program with hands-on agronomy research fields, horticulture polyhouses, soil testing labs, and rural agricultural work experience (RAWE).',
        'keys'  => 'bsc agriculture bhopal, agriculture college mp, bsc ag admissions 2026, icar syllabus agriculture'
    ],
    'Law.php' => [
        'title' => 'Faculty of Law (LL.B, BA LL.B 5-Yr, LL.M, BCI Approved) — RKDF University Bhopal',
        'desc'  => 'Bar Council of India (BCI) recognized law faculty offering 5-year integrated BA LL.B, 3-year LL.B, and LL.M programs with active Moot Court training.',
        'keys'  => 'llb in bhopal, ba llb 5 year course, llm admission, bci approved law college mp'
    ],
    'BAMS.php' => [
        'title' => 'Ram Krishna College of Ayurveda & Medical Sciences (BAMS) — RKDF University',
        'desc'  => 'NCISM & AYUSH approved Bachelor of Ayurvedic Medicine and Surgery (BAMS) with 100-bed attached clinical teaching hospital and Panchakarma treatment facility.',
        'keys'  => 'bams in bhopal, ayurvedic medical college mp, bams admission 2026, ayurveda hospital bhopal'
    ],
    'BHMS.php' => [
        'title' => 'Homeopathy Medical College & Hospital (BHMS) — RKDF University Bhopal',
        'desc'  => 'Bachelor of Homeopathic Medicine and Surgery (BHMS) approved by NCH/CCH with attached multi-specialty homeopathic clinical hospital and OPD facility.',
        'keys'  => 'bhms in bhopal, homeopathy college mp, bhms admission 2026, homeopathic hospital'
    ],
    'nursing.php' => [
        'title' => 'University College of Nursing (B.Sc Nursing, GNM, INC Approved) — RKDF University',
        'desc'  => 'Indian Nursing Council (INC) & MPNRC approved B.Sc Nursing and GNM degree courses with multi-specialty hospital clinical rotations and skills training.',
        'keys'  => 'bsc nursing bhopal, gnm nursing admission, inc approved nursing college mp'
    ],
    'Computer-Application.php' => [
        'title' => 'Faculty of Computer Applications (MCA, BCA, Data Science, AI) — RKDF University',
        'desc'  => 'Master of Computer Applications (MCA) & BCA programs specializing in Cloud Computing, Full-Stack Web Development, AI/Machine Learning, and Cyber Security.',
        'keys'  => 'mca in bhopal, bca admission 2026, computer application courses, software coding degree'
    ],
    'Science.php' => [
        'title' => 'Faculty of Science (Physics, Chemistry, Maths, Biotechnology) — RKDF University',
        'desc'  => 'Undergraduate and postgraduate degrees in Physics, Chemistry, Mathematics, Biotechnology, Microbiology, Botany, and Zoology with modern research labs.',
        'keys'  => 'bsc college bhopal, msc physics chemistry biotechnology, science faculty rkdf'
    ],
    'Chancellor.php' => [
        'title' => 'Honorable Chancellor Desk (Dr. Sunil Kapoor) — RKDF University Bhopal',
        'desc'  => 'Leadership address from the Honorable Chancellor Dr. Sunil Kapoor on excellence in higher education, skill development, innovation, and nation building.',
        'keys'  => 'chancellor rkdf university, dr sunil kapoor, rkdf leadership message, founder rkdf'
    ],
    'Vice-Chancellor-Desk.php' => [
        'title' => 'Vice Chancellor Desk & Academic Vision — RKDF University Bhopal',
        'desc'  => 'Academic vision, research excellence, and institutional guidance from the Vice-Chancellor of RKDF University Bhopal.',
        'keys'  => 'vice chancellor rkdf, vc desk message, rkdf university administration'
    ],
    'Dean.php' => [
        'title' => 'Faculty Deans Directory & Academic Leadership — RKDF University Bhopal',
        'desc'  => 'Directory of Faculty Deans leading constituent academic faculties of Engineering, Pharmacy, Management, Science, Law, Agriculture, and Paramedical sciences.',
        'keys'  => 'deans rkdf university, faculty deans bhopal, academic leadership directory'
    ],
    'hod.php' => [
        'title' => 'Institute Heads & Heads of Department (HODs) — RKDF University Bhopal',
        'desc'  => 'Directory of Institute Heads and Heads of Department (HODs) heading constituent engineering, pharmacy, nursing, polytechnic, and ayurveda colleges.',
        'keys'  => 'hod rkdf university, heads of department, college directors principals rkdf'
    ],
    'Governingbody.php' => [
        'title' => 'Governing Body of the University (Statute 9) — RKDF University Bhopal',
        'desc'  => 'The apex statutory governing body of RKDF University Bhopal constituted under Statute 9 responsible for institutional policy and governance.',
        'keys'  => 'governing body rkdf, statute 9 members, university apex authority'
    ],
    'BoM.php' => [
        'title' => 'Board of Management (BoM Statute 10) — RKDF University Bhopal',
        'desc'  => 'Executive statutory authority of the university managing administration, financial governance, faculty appointments, and regulatory execution.',
        'keys'  => 'board of management rkdf, bom members, statute 10 university administration'
    ],
    'Academic_Council.php' => [
        'title' => 'Academic Council of the University (Statute 11) — RKDF University Bhopal',
        'desc'  => 'The supreme academic body responsible for curriculum standards, academic regulations, examination schemes, and award of degrees.',
        'keys'  => 'academic council rkdf, statute 11, curriculum standards, academic regulations'
    ],
    'BOS.php' => [
        'title' => 'Board of Studies (BOS Curriculum & Syllabus) — RKDF University Bhopal',
        'desc'  => 'Departmental Boards of Studies designing innovative CBCS and NEP-2020 curricula, examination schemes, and course syllabi across all faculties.',
        'keys'  => 'board of studies rkdf, bos syllabus design, cbcs nep 2020 curriculum'
    ],
    'Statuary-Bodies.php' => [
        'title' => 'Statutory & National Core Advisory Bodies — RKDF University Bhopal',
        'desc'  => 'National Core Advisory Group and statutory advisors guiding university growth, accreditation frameworks (NAAC), and research policies.',
        'keys'  => 'statutory bodies rkdf, national advisory group, university advisory council'
    ],
    'phdsubjects.php' => [
        'title' => 'Ph.D Doctoral Programs & Research Subjects — RKDF University Bhopal',
        'desc'  => 'Doctor of Philosophy (Ph.D) research specializations offered in Engineering, Pharmacy, Computer Science, Management, Chemistry, Physics, and Law.',
        'keys'  => 'phd in bhopal, phd subjects rkdf, doctoral degree admission, phd programs mp'
    ],
    'phd_entrance.php' => [
        'title' => 'Ph.D Entrance Examination (RDAT 2026) Guidelines & Syllabus — RKDF University',
        'desc'  => 'Doctoral entrance exam eligibility norms, UGC-NET exemption criteria, research methodology syllabus, and online application details for Ph.D 2026.',
        'keys'  => 'phd entrance exam 2026, rkdf rdat exam, phd admission guidelines bhopal'
    ],
    'supervisors01.php' => [
        'title' => 'Approved Ph.D Research Supervisors & Guides — RKDF University Bhopal',
        'desc'  => 'Directory of recognized and approved doctoral research supervisors and research guides guiding Ph.D candidates at RKDF University.',
        'keys'  => 'phd supervisors rkdf, research guides directory, approved phd guides mp'
    ],
    'patent.php' => [
        'title' => 'University Patents & Intellectual Property (IPR Cell) — RKDF University',
        'desc'  => 'Published and granted patents by RKDF University faculty and researchers fostering innovation, product commercialization, and IP rights.',
        'keys'  => 'rkdf patents, intellectual property cell, university inventions patents'
    ],
    'journals.php' => [
        'title' => 'Shodh Sangam — Peer-Reviewed University Research Journals — RKDF University',
        'desc'  => 'Multidisciplinary peer-reviewed research journals published by RKDF University covering innovative discoveries in engineering, pharmacy, and science.',
        'keys'  => 'shodh sangam journal, rkdf research papers, university publication'
    ],
    'RnD_Projects.php' => [
        'title' => 'R&D Projects & Sponsored Research Grants — RKDF University Bhopal',
        'desc'  => 'Major sponsored research initiatives, DST/CSIR funded projects, clean energy initiatives, and carbon capture technology projects.',
        'keys'  => 'rnd projects rkdf, sponsored research grants, dst csir projects bhopal'
    ],
    't&p.php' => [
        'title' => 'Training & Placement Cell (T&P) Campus Placements — RKDF University Bhopal',
        'desc'  => 'Dedicated Career Development & Placement Cell facilitating industry internships, corporate training, aptitude development, and top campus recruitment drives.',
        'keys'  => 'rkdf placements, training and placement cell, campus recruitment bhopal, highest placement packages'
    ],
    'Careers.php' => [
        'title' => 'Careers & Faculty Recruitment (Walk-In Interviews) — RKDF University Bhopal',
        'desc'  => 'Apply online for teaching and non-teaching positions including Professors, Associate Professors, Assistant Professors, and Lab Instructors.',
        'keys'  => 'rkdf university jobs, faculty recruitment 2026, professor vacancy bhopal, walk in interview rkdf'
    ],
    'alumni.php' => [
        'title' => 'Alumni Association Network & Registration — RKDF University Bhopal',
        'desc'  => 'Connect with the global RKDF University Alumni Association. Register online, network with fellow alumni, and participate in annual alumni meets.',
        'keys'  => 'rkdf alumni network, alumni registration form, rkdf graduates association'
    ],
    'contact-us.php' => [
        'title' => 'Contact Us, Campus Address & Helpline Numbers — RKDF University Bhopal',
        'desc'  => 'Get in touch with RKDF University Bhopal. Campus location at Airport Bypass Road, Gandhi Nagar, Bhopal. Helpline: +91-755-2740395 / 1800 200 2233.',
        'keys'  => 'rkdf contact number, rkdf university address, admission helpline bhopal, email contact rkdf'
    ],
    'scholarship.php' => [
        'title' => 'Scholarship Schemes & Financial Concessions — RKDF University Bhopal',
        'desc'  => 'Information on state Post-Matric SC/ST/OBC scholarships, merit concessions, sports fee waivers, and financial aid for deserving students.',
        'keys'  => 'rkdf scholarship, post matric scholarship mp, financial aid university bhopal'
    ],
    'public-disclosure.php' => [
        'title' => 'Public Self Disclosures & Regulatory Approvals — RKDF University Bhopal',
        'desc'  => 'Mandatory regulatory disclosures, AICTE, UGC, PCI, BCI, NCTE, INC, AYUSH, and MPPURC approval letters and accreditation certificates.',
        'keys'  => 'public disclosure rkdf, aicte approval letter, ugc 2f recognition, mandatory disclosure'
    ],
    'Marksheet_Form.php' => [
        'title' => 'Application for Duplicate / Corrected Marksheet — RKDF University Bhopal',
        'desc'  => 'Online application form and guidelines for obtaining duplicate or corrected grade cards / marksheets issued by RKDF University.',
        'keys'  => 'duplicate marksheet form, marksheet correction rkdf, grade card request'
    ],
    'Name_Correction_Form.php' => [
        'title' => 'Application for Name Correction in Degree — RKDF University Bhopal',
        'desc'  => 'Apply online for spelling or name correction in official marksheets, degree certificates, and university records.',
        'keys'  => 'name correction degree, spelling correction marksheet, student name change form'
    ],
    'Verification_Form.php' => [
        'title' => 'Degree & Marksheet Verification Portal — RKDF University Bhopal',
        'desc'  => 'Online document verification portal for corporate background check companies, employers, and alumni verifying authentic degree certificates.',
        'keys'  => 'document verification rkdf, degree verification portal, background check verification'
    ],
    'Migration_Hindi.php' => [
        'title' => 'Degree Migration Certificate Application (Hindi) — RKDF University Bhopal',
        'desc'  => 'विश्वविद्यालय माइग्रेशन सर्टिफिकेट (Migration Certificate) ऑनलाइन आवेदन पत्र एवं निर्देश।',
        'keys'  => 'migration certificate hindi, rkdf migration form, degree transfer certificate'
    ],
    'Migration_English.php' => [
        'title' => 'Degree Migration Certificate Application (English) — RKDF University Bhopal',
        'desc'  => 'Apply online for University Migration Certificate and Transfer Certificates for continuing higher education or overseas study.',
        'keys'  => 'migration certificate english, university transfer certificate, rkdf migration application'
    ],
    'Student_Portal.php' => [
        'title' => 'Student ERP Portal & Online Gateway — RKDF University Bhopal',
        'desc'  => 'Direct student login gateway for attendance tracking, exam fee payment, admit card download, semester grades, and internal assessment marks.',
        'keys'  => 'student portal rkdf, erplive rkdf login, student dashboard bhopal'
    ],
    'LMS.php' => [
        'title' => 'LMS E-Learning & Digital Classroom Portal — RKDF University Bhopal',
        'desc'  => 'Interactive Learning Management System (LMS) accessing digital video lectures, course PPTs, e-notes, and online assignments.',
        'keys'  => 'lms e-learning, rkdf online classes, digital classroom portal, moodle rkdf'
    ],
    'Syllabus.php' => [
        'title' => 'University Course Syllabus & NEP-2020 Schemes — RKDF University Bhopal',
        'desc'  => 'Download official course curricula, NEP-2020 schemes, Choice Based Credit System (CBCS) credit frameworks, and course regulations.',
        'keys'  => 'rkdf syllabus download, btech syllabus, mba syllabus, pharmacy scheme'
    ],
    'privacy.php' => [
        'title' => 'Privacy Policy & Data Protection — RKDF University Bhopal',
        'desc'  => 'Official privacy policy outlining user data collection, security compliance, cookie policy, and student information confidentiality.',
        'keys'  => 'privacy policy rkdf, data protection policy, user terms'
    ],
    'terms&condition.php' => [
        'title' => 'Terms & Conditions of Service — RKDF University Bhopal',
        'desc'  => 'Official university website terms, online fee payment policies, intellectual property usage, and academic regulations.',
        'keys'  => 'terms and conditions, website terms rkdf, payment refund rules'
    ]
];

// 1. Resolve Best Matching SEO Meta
$matchedSeo = null;
if (!empty($currentScript) && isset($seoCatalog[$currentScript])) {
    $matchedSeo = $seoCatalog[$currentScript];
}

// 2. Dynamic Override from caller variables or database
$resolvedTitle = !empty($pageTitle) 
    ? $pageTitle 
    : (!empty($matchedSeo['title']) 
        ? $matchedSeo['title'] 
        : (!empty($mainTitle) ? $mainTitle . ' — RKDF University Bhopal' : 'RKDF University Bhopal — Education Glorifies Nation'));

$resolvedDesc = !empty($metaDesc) 
    ? $metaDesc 
    : (!empty($matchedSeo['desc']) 
        ? $matchedSeo['desc'] 
        : (!empty($heroSubtitle) ? $heroSubtitle : 'RKDF University Bhopal — Premier Private State University in Madhya Pradesh offering UG, PG, Diploma, and Ph.D. degree programs.'));

$resolvedKeywords = !empty($metaKeywords) 
    ? $metaKeywords 
    : (!empty($matchedSeo['keys']) 
        ? $matchedSeo['keys'] 
        : 'RKDF University, Bhopal, MP University, Admissions 2026, Engineering, Pharmacy, MBA, BAMS, Law, Ph.D');

// Resolve canonical URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$uri = strtok($_SERVER['REQUEST_URI'] ?? $currentScript, '?');
$canonicalUrl = $protocol . $host . $uri;

// Resolve OpenGraph image
$ogImage = !empty($heroBgImg) 
    ? $heroBgImg 
    : 'images/lovable/rkdf-students-quad.jpg';
if (!str_starts_with($ogImage, 'http')) {
    $ogImage = $protocol . $host . '/' . ltrim($ogImage, '/');
}
?>
  <!-- Standard Meta & Viewport -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Staging / Dev Mode: Robots set to noindex, nofollow (Change to 'index, follow' for Production Go-Live) -->
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  
  <!-- Primary SEO Meta Tags -->
  <title><?= htmlspecialchars($resolvedTitle) ?></title>
  <meta name="title" content="<?= htmlspecialchars($resolvedTitle) ?>">
  <meta name="description" content="<?= htmlspecialchars($resolvedDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($resolvedKeywords) ?>">
  <meta name="author" content="RKDF University Bhopal">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

  <!-- Open Graph / Facebook / WhatsApp Preview -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:site_name" content="RKDF University Bhopal">
  <meta property="og:title" content="<?= htmlspecialchars($resolvedTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($resolvedDesc) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta name="twitter:title" content="<?= htmlspecialchars($resolvedTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($resolvedDesc) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>">

  <!-- Universal Favicons & Touch Icons -->
  <link rel="icon" type="image/png" href="images/fav.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/fav.png">

  <!-- Core Google Typography Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

  <!-- Core Global Stylesheets -->
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
