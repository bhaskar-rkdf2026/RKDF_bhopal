<?php
// ============================================================
// RKDF University — Global Site-Wide Search Results Page
// World-Class Premium University Search Engine
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/include/cms_engine.php';

$query = trim($_GET['q'] ?? '');
$categoryFilter = trim($_GET['cat'] ?? 'all');

// Master Search Index of RKDF University
$searchIndex = [
    // ── Faculties & Courses ──
    [
        'title'       => 'Faculty of Engineering & Technology (B.Tech, M.Tech, Diploma)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'FACULTY',
        'url'         => 'Engineering.php',
        'description' => 'Comprehensive degree programs in Computer Science (CSE), Artificial Intelligence (AI), Mechanical, Civil, Electrical & Electronics, and Information Technology with state-of-the-art laboratories and research centers.',
        'keywords'    => 'engineering b.tech m.tech computer science mechanical civil electrical ec it diploma cse btech mtech courses degree scheme'
    ],
    [
        'title'       => 'Faculty of Pharmacy (B.Pharm, D.Pharm, M.Pharm, Ph.D)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'PHARMACY',
        'url'         => 'pharmacy.php',
        'description' => 'PCI approved pharmacy programs preparing healthcare leaders in Pharmaceutics, Pharmacology, Pharmacognosy, and Pharmaceutical Chemistry with modern pharmaceutical research labs.',
        'keywords'    => 'pharmacy b.pharm d.pharm m.pharm pharmaceutics pharmacology pci approval bpharm dpharm medicine drugs'
    ],
    [
        'title'       => 'Faculty of Management (MBA, BBA, B.Com, Ph.D)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'MANAGEMENT',
        'url'         => 'Management.php',
        'description' => 'Industry-aligned management and business education offering specializations in Marketing, Human Resources, Financial Management, Banking, and International Business.',
        'keywords'    => 'management mba bba business administration finance marketing hr human resource commerce bcom business school'
    ],
    [
        'title'       => 'Faculty of Computer Applications (MCA, BCA, PGDCA)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'COMPUTER APPS',
        'url'         => 'Computer-Application.php',
        'description' => 'Advanced computer applications education in Cloud Computing, Full-Stack Software Engineering, Data Science, AI/ML, Cyber Security, and Database Administration.',
        'keywords'    => 'computer applications mca bca pgdca software coding data science ai artificial intelligence it programming web development'
    ],
    [
        'title'       => 'Faculty of Agriculture (B.Sc Hons Agriculture, M.Sc)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'AGRICULTURE',
        'url'      => 'Agriculture.php',
        'description' => 'ICAR curriculum compliant agricultural degree programs covering Agronomy, Horticulture, Plant Pathology, Entomology, Agricultural Extension, and Organic Farming.',
        'keywords'    => 'agriculture b.sc bsc ag horticulture agronomy soil science icar farming agricultural crop science'
    ],
    [
        'title'       => 'Faculty of Law (LL.B, BA LL.B 5-Yr, LL.M, Ph.D)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'LAW',
        'url'         => 'Law.php',
        'description' => 'Bar Council of India (BCI) recognized legal programs featuring moot court training, legal aid clinics, constitutional law, corporate law, and criminal jurisprudence.',
        'keywords'    => 'law llb ba llb ballb llm bar council bci legal studies advocate constitutional law moot court'
    ],
    [
        'title'       => 'Homeopathy Medical College & Hospital (BHMS)',
        'category'    => 'programs',
        'cat_label'   => 'Medical & AYUSH',
        'badge'       => 'MEDICAL (BHMS)',
        'url'         => 'BHMS.php',
        'description' => 'Bachelor of Homeopathic Medicine and Surgery (BHMS) with 100-bed attached clinical hospital, OPD/IPD training, and homeopathic clinical research center.',
        'keywords'    => 'homeopathy bhms cch medical doctor hospital clinic homeopathic clinical'
    ],
    [
        'title'       => 'Ram Krishna College of Ayurveda & Medical Sciences (BAMS)',
        'category'    => 'programs',
        'cat_label'   => 'Medical & AYUSH',
        'badge'       => 'AYUSH (BAMS)',
        'url'         => 'BAMS.php',
        'description' => 'NCISM & AYUSH recognized Ayurvedic medical college with integrated Panchakarma treatment center, herbal gardens, and full-fledged clinical teaching hospital.',
        'keywords'    => 'ayurveda bams ncism ayush herbal medicine hospital panchakarma ayurvedic'
    ],
    [
        'title'       => 'University College of Nursing (B.Sc Nursing, GNM, Post Basic)',
        'category'    => 'programs',
        'cat_label'   => 'Medical & AYUSH',
        'badge'       => 'NURSING',
        'url'         => 'nursing.php',
        'description' => 'INC & MPNRC recognized nursing programs with multi-specialty clinical hospital rotations, ICU/CCU patient care training, and modern nursing skill simulation labs.',
        'keywords'    => 'nursing b.sc nursing bsc gnm anm inc approval healthcare hospital patient care clinical'
    ],
    [
        'title'       => 'Faculty of Paramedical Science & Technologies',
        'category'    => 'programs',
        'cat_label'   => 'Medical & AYUSH',
        'badge'       => 'PARAMEDICAL',
        'url'         => 'paramdical.php',
        'description' => 'Diagnostic and clinical technology courses including DMLT, BMLT, Medical X-Ray/Radiography, Dialysis Technology, and Physiotherapy (BPT).',
        'keywords'    => 'paramedical dmlt bmlt lab technician radiology physiotherapy medical lab technology bpt'
    ],
    [
        'title'       => 'Faculty of Science (Physics, Chemistry, Maths, Bio, Zoology, Botany)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'SCIENCE',
        'url'         => 'Science.php',
        'description' => 'Pure and applied sciences programs in Physics, Chemistry, Mathematics, Biotechnology, Microbiology, Zoology, and Botany with advanced instrumentation facilities.',
        'keywords'    => 'science physics chemistry mathematics zoology botany biotechnology microbiology b.sc m.sc'
    ],
    [
        'title'       => 'Faculty of Education (B.Ed, M.Ed, D.El.Ed)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'EDUCATION',
        'url'         => 'Education.php',
        'description' => 'NCTE recognized teacher training education preparing modern educators with pedagogical methods, inclusive education, and child development psychology.',
        'keywords'    => 'education b.ed bed m.ed med ncte teaching pedagogy teacher training'
    ],
    [
        'title'       => 'Faculty of Architecture & Planning (B.Arch)',
        'category'    => 'programs',
        'cat_label'   => 'Programs & Academics',
        'badge'       => 'ARCHITECTURE',
        'url'         => 'architect.php',
        'description' => 'Council of Architecture (COA) approved degree programs in Architectural Design, Sustainable Building, Landscape Architecture, and Urban Planning.',
        'keywords'    => 'architecture b.arch coa approval urban planning design building drawing'
    ],
    [
        'title'       => 'All Academic Faculties & Departments Directory',
        'category'    => 'programs',
        'cat_label'   => 'Academic Directory',
        'badge'       => 'DIRECTORY',
        'url'         => 'academic&departments.php',
        'description' => 'Directory of 14 faculties, 40+ constituent colleges, polytechnics, and academic institutes at RKDF University Bhopal MP.',
        'keywords'    => 'departments faculties courses list of programs degree diploma colleges constituent'
    ],
    [
        'title'       => 'University Syllabus & Course Schemes Hub',
        'category'    => 'programs',
        'cat_label'   => 'Curriculum',
        'badge'       => 'SYLLABUS',
        'url'         => 'Syllabus.php',
        'description' => 'Download official course curricula, NEP-2020 schemes, Choice Based Credit System (CBCS) credit frameworks, and course regulations.',
        'keywords'    => 'syllabus course scheme cbcs nep 2020 examination scheme subjects curriculum course structure'
    ],

    // ── Admissions & Fees ──
    [
        'title'       => 'Online Admission Application Form (2026-27)',
        'category'    => 'admissions',
        'cat_label'   => 'Admissions 2026',
        'badge'       => 'APPLY ONLINE',
        'url'         => 'admissionform.php',
        'description' => 'Apply online for undergraduate, postgraduate, diploma, and doctoral admissions for the academic session 2026-2027 with instant document upload and seat confirmation.',
        'keywords'    => 'admission form apply now online admission registration application apply 2026 2027 entry'
    ],
    [
        'title'       => 'University Official Fees Structure',
        'category'    => 'admissions',
        'cat_label'   => 'Fees & Costs',
        'badge'       => 'FEE STRUCTURE',
        'url'         => 'University_Fees_Structure.pdf',
        'description' => 'Complete semester-wise and annual fee structure document for all Engineering, Medical, Pharmacy, Law, Management, Agriculture, and Science courses.',
        'keywords'    => 'fees structure tuition fee hostel fee admission fee payment cost per semester annual fees fee schedule'
    ],
    [
        'title'       => 'University Admission Prospectus & Brochure',
        'category'    => 'admissions',
        'cat_label'   => 'Prospectus',
        'badge'       => 'PROSPECTUS',
        'url'         => 'prospectus.php',
        'description' => 'Download official university prospectus, campus guide, seat intake details, eligibility criteria, and admission regulations.',
        'keywords'    => 'prospectus admission brochure brochure download information guidelines courses seat matrix'
    ],
    [
        'title'       => 'University Scholarships & Financial Concessions',
        'category'    => 'admissions',
        'cat_label'   => 'Financial Aid',
        'badge'       => 'SCHOLARSHIP',
        'url'         => 'scholarship.php',
        'description' => 'Merit-based scholarships, Post-Matric SC/ST/OBC state scholarships, sports concessions, and tuition fee waivers for meritorious and underprivileged students.',
        'keywords'    => 'scholarship government scholarship meritorious concession financial aid sc st obc post matric'
    ],
    [
        'title'       => 'University Bank Details & Online Fee Payment Accounts',
        'category'    => 'admissions',
        'cat_label'   => 'Fee Payment',
        'badge'       => 'PAYMENT',
        'url'         => 'Bank-And-ATM.php',
        'description' => 'Official Bank Account Numbers, IFSC codes, Paytm UPI QR codes, and NEFT/RTGS transfer details for safe tuition and hostel fee payments.',
        'keywords'    => 'bank account ifsc code payment paytm fee transfer account number rtgs neft pay fee online'
    ],

    // ── Examination & Results ──
    [
        'title'       => 'Declared Examination Results Portal',
        'category'    => 'examinations',
        'cat_label'   => 'Results',
        'badge'       => 'EXAM RESULTS',
        'url'         => 'Result.php',
        'description' => 'Instant search and direct download of all declared semester exam results across B.Tech, Pharmacy, MBA, MCA, Agriculture, Law, Nursing, and Paramedical courses.',
        'keywords'    => 'results exam result declared semester marksheet scorecard pass fail marks result 2024 2025 2026 check result'
    ],
    [
        'title'       => 'Official Examination Notices & Circulars',
        'category'    => 'examinations',
        'cat_label'   => 'Exam Circulars',
        'badge'       => 'NOTICES',
        'url'         => 'Exam_Notice.php',
        'description' => 'Latest notifications regarding semester examination forms, late fee submission dates, admit card release dates, and examination guidelines.',
        'keywords'    => 'exam notice timetable schedule notification postpone exam date circular examination cell'
    ],
    [
        'title'       => 'Examination Timetable & Datesheet Schedule',
        'category'    => 'examinations',
        'cat_label'   => 'Timetables',
        'badge'       => 'TIMETABLE',
        'url'         => 'examtimetable.php',
        'description' => 'Download official examination date sheets for theory examinations, practical vivas, and backlog/re-evaluation examinations.',
        'keywords'    => 'timetable datesheet exam schedule date sheet theory practical examination dates'
    ],
    [
        'title'       => 'Document & Degree Verification Application',
        'category'    => 'examinations',
        'cat_label'   => 'Student Services',
        'badge'       => 'VERIFICATION',
        'url'         => 'Verification_Form.php',
        'description' => 'Online portal for corporate background check companies and graduates to verify original degree certificates, transcripts, and marksheets.',
        'keywords'    => 'verification document verification degree certificate credential check bgv verification fee'
    ],
    [
        'title'       => 'Application for Duplicate / Corrected Marksheet',
        'category'    => 'examinations',
        'cat_label'   => 'Student Services',
        'badge'       => 'MARKSHEET',
        'url'         => 'Marksheet_Form.php',
        'description' => 'Online application process and guidelines for obtaining duplicate or corrected grade cards / marksheets issued by RKDF University.',
        'keywords'    => 'duplicate marksheet correction lost marksheet damaged marksheet application grade card'
    ],
    [
        'title'       => 'Degree Migration Certificate Application (Hindi & English)',
        'category'    => 'examinations',
        'cat_label'   => 'Student Services',
        'badge'       => 'MIGRATION',
        'url'         => 'Migration_Hindi.php',
        'description' => 'Apply online for University Migration Certificate and Transfer Certificates for continuing higher education or overseas study.',
        'keywords'    => 'migration hindi english migration certificate degree transfer migration form clearance'
    ],
    [
        'title'       => 'Student ERP Portal (ERP Live Gateway)',
        'category'    => 'examinations',
        'cat_label'   => 'Student Portal',
        'badge'       => 'ERP PORTAL',
        'url'         => 'Student_Portal.php',
        'description' => 'Direct access to the student login dashboard for attendance, online fee receipts, admit card download, grade cards, and internal marks.',
        'keywords'    => 'student portal erp login erplive attendance fees results exam form admit card student login'
    ],

    // ── Research & Ph.D ──
    [
        'title'       => 'Ph.D Doctoral Degree Subjects Offered',
        'category'    => 'research',
        'cat_label'   => 'Research & Ph.D',
        'badge'       => 'PH.D SUBJECTS',
        'url'         => 'phdsubjects.php',
        'description' => 'Doctoral research specializations offered in Engineering, Pharmacy, Computer Science, Management, Chemistry, Physics, Mathematics, Life Sciences, and Law.',
        'keywords'    => 'phd subjects doctor of philosophy research doctoral engineering science pharmacy management'
    ],
    [
        'title'       => 'Ph.D Entrance Examination (RDAT) 2026',
        'category'    => 'research',
        'cat_label'   => 'Research & Ph.D',
        'badge'       => 'PH.D ENTRANCE',
        'url'      => 'phd_entrance.php',
        'description' => 'Entrance examination guidelines, eligibility norms, UGC-NET exemption criteria, syllabus, interview schedule, and application details for Ph.D 2026.',
        'keywords'    => 'phd entrance exam syllabus interview research scholar application admission 2026 rdat'
    ],
    [
        'title'       => 'Approved Ph.D Research Supervisors Directory',
        'category'    => 'research',
        'cat_label'   => 'Research & Ph.D',
        'badge'       => 'SUPERVISORS',
        'url'         => 'supervisors01.php',
        'description' => 'Directory of recognized and approved research guides and doctoral supervisors guiding research scholars at RKDF University.',
        'keywords'    => 'supervisors guides phd guide professors research mentor faculty guide research supervisor'
    ],
    [
        'title'       => 'R&D Projects & Sponsored Research Grants',
        'category'    => 'research',
        'cat_label'   => 'Research & Innovation',
        'badge'       => 'R&D GRANTS',
        'url'         => 'RnD_Projects.php',
        'description' => 'Major sponsored research initiatives, DST/CSIR funded projects, clean energy initiatives, and carbon capture technology patents.',
        'keywords'    => 'rnd research projects funding csir dst govt projects solar carbon capture incubation grants'
    ],
    [
        'title'       => 'Shodh Sangam — Peer-Reviewed Research Journals',
        'category'    => 'research',
        'cat_label'   => 'Research & Innovation',
        'badge'       => 'JOURNALS',
        'url'         => 'journals.php',
        'description' => 'Multidisciplinary peer-reviewed research publications published by RKDF University covering innovative discoveries in engineering, pharmacy, and management.',
        'keywords'    => 'journals shodh sangam research papers publication articles peer reviewed shodh sangam'
    ],
    [
        'title'       => 'University Patents & Intellectual Property (IPR Cell)',
        'category'    => 'research',
        'cat_label'   => 'Research & Innovation',
        'badge'       => 'PATENTS',
        'url'         => 'patent.php',
        'description' => 'Published and granted patents by RKDF University faculty and researchers fostering innovation, product commercialization, and intellectual property.',
        'keywords'    => 'patents ipr intellectual property innovation inventions technology transfer patent list'
    ],

    // ── Governance & Leadership ──
    [
        'title'       => 'Honorable Chancellor Desk (Dr. Sunil Kapoor)',
        'category'    => 'governance',
        'cat_label'   => 'University Leadership',
        'badge'       => 'CHANCELLOR',
        'url'         => 'Chancellor.php',
        'description' => 'Message from the Honorable Chancellor Dr. Sunil Kapoor on vision, excellence in education, skill development, and nation-building.',
        'keywords'    => 'chancellor dr sunil kapoor leadership message desk address founder rkdf group'
    ],
    [
        'title'       => 'Honorable Pro-Chancellor Desk',
        'category'    => 'governance',
        'cat_label'   => 'University Leadership',
        'badge'       => 'PRO-CHANCELLOR',
        'url'         => 'ProChancellor.php',
        'description' => 'Message from the Pro-Chancellor on strategic institutional growth, digital education, and holistic university leadership.',
        'keywords'    => 'pro chancellor leadership desk message administration leadership'
    ],
    [
        'title'       => 'Vice Chancellor Desk',
        'category'    => 'governance',
        'cat_label'   => 'University Leadership',
        'badge'       => 'VICE CHANCELLOR',
        'url'         => 'Vice-Chancellor-Desk.php',
        'description' => 'Academic vision, research leadership, and institutional message from the Vice-Chancellor of RKDF University Bhopal.',
        'keywords'    => 'vice chancellor vc desk message academic executive administration'
    ],
    [
        'title'       => 'Faculty Deans Directory',
        'category'    => 'governance',
        'cat_label'   => 'Academic Leadership',
        'badge'       => 'FACULTY DEANS',
        'url'         => 'dean.php',
        'description' => 'Directory of Deans leading constituent faculties of Engineering, Pharmacy, Management, Science, Law, Agriculture, and Paramedical sciences.',
        'keywords'    => 'deans faculty deans academic leadership deans profile heads constituent'
    ],
    [
        'title'       => 'Institute Heads & Department Heads (HODs) Directory',
        'category'    => 'governance',
        'cat_label'   => 'Academic Leadership',
        'badge'       => 'HODS & HEADS',
        'url'         => 'hod.php',
        'description' => 'Directory of Institute Heads and Heads of Department (HODs) heading colleges, polytechnics, and academic departments.',
        'keywords'    => 'hod heads of department institute heads directors principals constituent colleges'
    ],
    [
        'title'       => 'Governing Body of the University',
        'category'    => 'governance',
        'cat_label'   => 'Statutory Body',
        'badge'       => 'GOVERNING BODY',
        'url'         => 'Governingbody.php',
        'description' => 'The apex statutory governing body constituted under Statute 9 of RKDF University Bhopal responsible for high-level governance and policy.',
        'keywords'    => 'governing body apex body statute 9 members governance authority'
    ],
    [
        'title'       => 'Board of Management (BoM)',
        'category'    => 'governance',
        'cat_label'   => 'Statutory Body',
        'badge'       => 'BOM',
        'url'         => 'BoM.php',
        'description' => 'The chief executive statutory authority of the university managing financial administration, appointments, infrastructure, and institutional regulations.',
        'keywords'    => 'board of management bom statute 10 executive committee administration members'
    ],
    [
        'title'       => 'Academic Council of the University',
        'category'    => 'governance',
        'cat_label'   => 'Statutory Body',
        'badge'       => 'ACADEMIC COUNCIL',
        'url'         => 'Academic_Council.php',
        'description' => 'The supreme academic body responsible for curriculum standards, academic regulations, examination schemes, and awarding degrees.',
        'keywords'    => 'academic council statute 11 academic regulation curriculum standard members'
    ],
    [
        'title'       => 'Public Self Disclosures & Regulatory Approvals',
        'category'    => 'governance',
        'cat_label'   => 'Statutory Compliance',
        'badge'       => 'COMPLIANCE',
        'url'         => 'public-disclosure.php',
        'description' => 'Mandatory public disclosures, AICTE, UGC, PCI, BCI, NCTE, INC, AYUSH, and MPPURC approval letters and accreditation certificates.',
        'keywords'    => 'public disclosure naac ugc aicte pci bci ncte inc cch ncism approval affiliation mandatory disclosure'
    ],

    // ── Careers & Contact ──
    [
        'title'       => 'Careers & Academic Faculty Recruitment',
        'category'    => 'services',
        'cat_label'   => 'Careers',
        'badge'       => 'CAREERS',
        'url'         => 'Careers.php',
        'description' => 'Apply online for teaching and non-teaching positions including Professors, Associate Professors, Assistant Professors, and Lab Instructors.',
        'keywords'    => 'careers job openings vacancy recruitment faculty walk in interview apply professor hr'
    ],
    [
        'title'       => 'Training & Placement Cell (T&P)',
        'category'    => 'services',
        'cat_label'   => 'Placements',
        'badge'       => 'T&P CELL',
        'url'         => 't&p.php',
        'description' => 'Career development cell facilitating industry internships, corporate training, skill certifications, and campus recruitment drives.',
        'keywords'    => 'training and placement t&p cell recruit recruiters corporate packages placement record internships'
    ],
    [
        'title'       => 'Contact Us & Campus Helpdesk Directory',
        'category'    => 'services',
        'cat_label'   => 'Contact',
        'badge'       => 'CONTACT',
        'url'         => 'contact-us.php',
        'description' => 'Helpline telephone numbers, admission desk emails, campus map location, emergency numbers, and official university postal address.',
        'keywords'    => 'contact us phone number email address helpline airport bypass road gandhi nagar bhopal map emergency'
    ]
];

// Matching logic
$results = [];
$qLower = strtolower($query);
$qTokens = array_filter(explode(' ', $qLower));

foreach ($searchIndex as $item) {
    if ($categoryFilter !== 'all' && $item['category'] !== $categoryFilter) {
        continue;
    }

    $score = 0;
    $titleLower = strtolower($item['title']);
    $descLower  = strtolower($item['description']);
    $kwLower    = strtolower($item['keywords']);

    if (!empty($query)) {
        if (strpos($titleLower, $qLower) !== false) $score += 60;
        if (strpos($descLower, $qLower) !== false)  $score += 30;
        if (strpos($kwLower, $qLower) !== false)    $score += 20;

        foreach ($qTokens as $t) {
            if (strlen($t) < 2) continue;
            if (strpos($titleLower, $t) !== false) $score += 15;
            if (strpos($descLower, $t) !== false)  $score += 8;
            if (strpos($kwLower, $t) !== false)    $score += 5;
        }

        if ($score > 0) {
            $item['score'] = $score;
            $results[] = $item;
        }
    } else {
        // If empty query, show all items
        $results[] = $item;
    }
}

// Sort results by score descending
if (!empty($query)) {
    usort($results, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });
}

function highlightMatch($text, $query) {
    if (empty($query)) return htmlspecialchars($text);
    $tokens = array_filter(explode(' ', preg_quote($query, '/')));
    if (empty($tokens)) return htmlspecialchars($text);
    $pattern = '/(' . implode('|', $tokens) . ')/i';
    return preg_replace($pattern, '<mark style="background:#FFF3C4;color:#0C1424;font-weight:700;padding:0 2px;border-radius:3px;">$1</mark>', htmlspecialchars($text));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= !empty($query) ? htmlspecialchars($query) . ' — Search Results' : 'Search Directory' ?> — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .search-hero {
      position: relative;
      padding: 160px 0 70px;
      background: linear-gradient(135deg, rgba(12,20,36,0.96) 0%, rgba(21,34,56,0.92) 60%, rgba(12,20,36,0.98) 100%), 
                  url('images/lovable/rkdf-students-quad.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .search-container-box {
      max-width: 860px;
      margin: 0 auto;
    }

    .search-input-wrapper {
      position: relative;
      margin-top: 24px;
      display: flex;
      gap: 12px;
      background: #ffffff;
      padding: 8px 10px;
      border-radius: 16px;
      box-shadow: 0 12px 36px rgba(0,0,0,0.25);
    }
    .search-input-field {
      flex: 1;
      border: none;
      outline: none;
      padding: 14px 20px;
      font-size: 17px;
      color: #0C1424;
      background: transparent;
      font-family: inherit;
    }
    .search-submit-btn {
      background: #E31B23;
      color: #ffffff;
      border: none;
      border-radius: 12px;
      padding: 0 28px;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: background 0.25s ease, transform 0.2s ease;
    }
    .search-submit-btn:hover {
      background: #c7141b;
      transform: translateY(-1px);
    }

    .search-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 18px;
      align-items: center;
    }
    .search-tag-chip {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.18);
      color: #FAF9F5;
      padding: 5px 14px;
      border-radius: 99px;
      font-size: 12.5px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .search-tag-chip:hover {
      background: #C5A059;
      color: #0C1424;
      border-color: #C5A059;
    }

    .search-results-section {
      padding: 60px 0 100px;
      background: #FAF9F5;
    }

    .search-nav-tabs {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 12px;
      margin-bottom: 32px;
      border-bottom: 1px solid rgba(12,20,36,0.1);
    }
    .search-tab-link {
      padding: 10px 18px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 600;
      color: #475569;
      text-decoration: none;
      white-space: nowrap;
      transition: all 0.2s ease;
    }
    .search-tab-link:hover {
      background: rgba(12,20,36,0.05);
      color: #0C1424;
    }
    .search-tab-link.active {
      background: #0C1424;
      color: #ffffff;
    }

    .search-results-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .search-card-item {
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 16px;
      padding: 24px 28px;
      box-shadow: 0 2px 12px rgba(12,20,36,0.03);
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .search-card-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(12,20,36,0.08);
      border-color: #C5A059;
    }

    .search-meta-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
    }
    .search-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 3px 10px;
      border-radius: 6px;
      background: rgba(197, 160, 89, 0.15);
      color: #C5A059;
    }
    .search-cat-label {
      font-size: 12.5px;
      color: #64748B;
      font-weight: 600;
    }

    .search-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 21px;
      font-weight: 700;
      color: #0C1424;
      margin: 4px 0 10px 0;
    }
    .search-card-title a {
      color: #0C1424;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    .search-card-title a:hover {
      color: #E31B23;
    }

    .search-card-desc {
      font-size: 15px;
      line-height: 1.65;
      color: #475569;
      margin: 0 0 16px 0;
    }

    .search-action-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 13.5px;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      transition: transform 0.2s ease;
    }
    .search-action-btn:hover {
      transform: translateX(4px);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- SEARCH HERO SECTION -->
  <section class="search-hero">
    <div class="rk-container">
      <div class="search-container-box">
        <span class="rk-eyebrow tone-gold">RKDF UNIVERSITY SEARCH ENGINE</span>
        <h1 class="rk-h1" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem);margin-top:8px;">Search University Portal</h1>
        <p style="margin-top:12px;font-size:16.5px;color:rgba(250,249,245,0.85);">
          Find degree courses, admission forms, examination results, timetables, Ph.D research, syllabus, and administrative services.
        </p>

        <!-- Main Search Form -->
        <form method="GET" action="search.php" class="search-input-wrapper">
          <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" class="search-input-field" placeholder="Search programs, admissions, declared results, syllabus, research..." autofocus>
          <?php if ($categoryFilter !== 'all'): ?>
            <input type="hidden" name="cat" value="<?= htmlspecialchars($categoryFilter) ?>">
          <?php endif; ?>
          <button type="submit" class="search-submit-btn">
            <span>Search</span>
            <span>↵</span>
          </button>
        </form>

        <!-- Popular Tags -->
        <div class="search-tags">
          <span style="font-size:13px;color:rgba(255,255,255,0.7);font-weight:600;">Popular:</span>
          <a href="search.php?q=Engineering" class="search-tag-chip">Engineering</a>
          <a href="search.php?q=Pharmacy" class="search-tag-chip">Pharmacy</a>
          <a href="search.php?q=BAMS" class="search-tag-chip">BAMS & AYUSH</a>
          <a href="search.php?q=Result" class="search-tag-chip">Exam Results</a>
          <a href="search.php?q=Admission" class="search-tag-chip">Admissions 2026</a>
          <a href="search.php?q=PhD" class="search-tag-chip">Ph.D Entrance</a>
          <a href="search.php?q=Fees" class="search-tag-chip">Fee Structure</a>
          <a href="search.php?q=Syllabus" class="search-tag-chip">Syllabus</a>
          <a href="search.php?q=Placement" class="search-tag-chip">Placements</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH RESULTS MAIN -->
  <main class="search-results-section">
    <div class="rk-container">
      
      <!-- Category Tabs -->
      <div class="search-nav-tabs">
        <a href="search.php?q=<?= urlencode($query) ?>&cat=all" class="search-tab-link <?= $categoryFilter === 'all' ? 'active' : '' ?>">All Results</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=programs" class="search-tab-link <?= $categoryFilter === 'programs' ? 'active' : '' ?>">Programs &amp; Courses</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=admissions" class="search-tab-link <?= $categoryFilter === 'admissions' ? 'active' : '' ?>">Admissions &amp; Fees</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=examinations" class="search-tab-link <?= $categoryFilter === 'examinations' ? 'active' : '' ?>">Examinations &amp; Results</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=research" class="search-tab-link <?= $categoryFilter === 'research' ? 'active' : '' ?>">Research &amp; Ph.D</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=governance" class="search-tab-link <?= $categoryFilter === 'governance' ? 'active' : '' ?>">Governance &amp; Deans</a>
        <a href="search.php?q=<?= urlencode($query) ?>&cat=services" class="search-tab-link <?= $categoryFilter === 'services' ? 'active' : '' ?>">Careers &amp; Services</a>
      </div>

      <!-- Result Count Info -->
      <div style="margin-bottom:24px;display:flex;align-items:center;justify-content:space-between;">
        <p style="font-size:15.5px;color:#475569;margin:0;">
          <?php if (!empty($query)): ?>
            Showing <strong><?= count($results) ?></strong> matching results for "<span style="color:#0C1424;font-weight:700;"><?= htmlspecialchars($query) ?></span>"
          <?php else: ?>
            Showing all <strong><?= count($results) ?></strong> university pages and services
          <?php endif; ?>
        </p>
      </div>

      <!-- Results Grid / List -->
      <?php if (!empty($results)): ?>
        <div class="search-results-list">
          <?php foreach ($results as $r): ?>
          <article class="search-card-item">
            <div class="search-meta-row">
              <span class="search-badge"><?= htmlspecialchars($r['badge']) ?></span>
              <span class="search-cat-label"><?= htmlspecialchars($r['cat_label']) ?></span>
            </div>
            <h2 class="search-card-title">
              <a href="<?= htmlspecialchars($r['url']) ?>">
                <?= highlightMatch($r['title'], $query) ?>
              </a>
            </h2>
            <p class="search-card-desc">
              <?= highlightMatch($r['description'], $query) ?>
            </p>
            <a href="<?= htmlspecialchars($r['url']) ?>" class="search-action-btn">
              <span>Open Page</span>
              <span>→</span>
            </a>
          </article>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <!-- No Results Fallback -->
        <div style="background:#ffffff;border:1px solid rgba(12,20,36,0.08);border-radius:20px;padding:60px 40px;text-align:center;box-shadow:0 4px 24px rgba(12,20,36,0.04);">
          <div style="font-size:48px;margin-bottom:16px;">🔍</div>
          <h3 style="font-family:'Playfair Display',Georgia,serif;font-size:26px;color:#0C1424;margin-bottom:10px;">No exact matches found for "<?= htmlspecialchars($query) ?>"</h3>
          <p style="color:#64748B;font-size:16px;max-width:540px;margin:0 auto 24px auto;">
            Please try different keywords (e.g. Engineering, Pharmacy, Results, Admission, Syllabus, Ph.D) or browse through the quick links below.
          </p>
          <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a href="academic&departments.php" class="rk-btn rk-btn-primary"><span>Browse All Programs</span> <span>→</span></a>
            <a href="admissionform.php" class="rk-btn rk-btn-secondary"><span>Apply for Admission 2026</span> <span>↗</span></a>
            <a href="contact-us.php" class="rk-btn rk-btn-outline"><span>Contact Helpline</span> <span>📞</span></a>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
