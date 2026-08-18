<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$slugData = [
    'phd-subjects' => [
        'title' => 'Ph.D Subjects Offered & Research Specializations',
        'eyebrow' => 'DOCTORAL STUDIES · SUBJECTS OFFERED',
        'hero' => 'Comprehensive list of academic disciplines and research specializations offered for Ph.D admission.',
        'intro_h' => 'Ph.D Academic Specializations Directory',
        'intro_t' => "RKDF University offers Doctoral (Ph.D) research programs across Engineering, Pharmacy, Management, Science, Agriculture, Law, Humanities, and Commerce.\n\nCandidates can review the approved research subjects and intake capacity below.",
        'items' => [
            ['title' => 'Approved Ph.D Subjects & Disciplines List (PDF)', 'sub' => 'Doctoral Research Cell', 'badge' => 'SUBJECTS PDF', 'link' => 'research/Subjects Offered for PhD.pdf', 'text' => 'Download official list of approved Ph.D research subjects, department faculties, and specializations.'],
            ['title' => 'Ph.D Entrance Test Syllabus & Pattern', 'sub' => 'Examination Branch', 'badge' => 'ENTRANCE SYLLABUS', 'link' => 'phd_ent_exam_syllabus.php', 'text' => 'Research methodology and subject-specific entrance test syllabus details.'],
        ]
    ],
    'phd-admission' => [
        'title' => 'Ph.D Admission Guidelines & Entrance Test',
        'eyebrow' => 'DOCTORAL STUDIES · ADMISSION PORTAL',
        'hero' => 'Official guidelines, eligibility criteria, entrance test dates, and online application for Ph.D programs.',
        'intro_h' => 'Ph.D Admission & Entrance Test Secretariat',
        'intro_t' => "Admissions to Ph.D programs at RKDF University are conducted in accordance with UGC (Minimum Standards and Procedure for Award of Ph.D. Degree) Regulations.\n\nSelection is based on the All India Ph.D Entrance Examination followed by a Doctoral Interview & Synopsis Presentation.",
        'items' => [
            ['title' => 'Online Ph.D Entrance Application & Portal', 'sub' => 'Directorate of Research', 'badge' => 'APPLY ONLINE ↗', 'link' => 'phd_entrance.php', 'text' => 'Online application portal for Ph.D Entrance Examination registration and admit card download.'],
            ['title' => 'Ph.D Admission Guidelines & Ordinance (PDF)', 'sub' => 'Academic Council', 'badge' => 'GUIDELINES PDF', 'link' => 'research/Admissions In Ph.D Programme.pdf', 'text' => 'Official ordinance detailing eligibility, minimum marks, fee structure, and entrance exemption rules.'],
            ['title' => 'Download Ph.D Entrance Exam Admit Card', 'sub' => 'Examination Cell', 'badge' => 'ADMIT CARD ↗', 'link' => 'phd_ent_admitcard.php', 'text' => 'Instant download portal for Ph.D entrance examination admit cards using application roll number.'],
        ]
    ],
    'phd-syllabus' => [
        'title' => 'Ph.D Coursework Scheme & Syllabus Portal',
        'eyebrow' => 'DOCTORAL STUDIES · COURSEWORK SYLLABUS',
        'hero' => 'Pre-Ph.D coursework scheme, research methodology syllabus, and subject-specific modules.',
        'intro_h' => 'Pre-Ph.D Coursework & Examination Syllabus',
        'intro_t' => "All enrolled Ph.D scholars must successfully complete mandatory Pre-Ph.D Coursework comprising Research Methodology, Quantitative Techniques, Research Ethics, and Advanced Subject Electives.\n\nSyllabus documents for all research disciplines can be accessed below.",
        'items' => [
            ['title' => 'Pre-Ph.D Coursework Scheme & Regulations (PDF)', 'sub' => 'Research Advisory Board', 'badge' => 'COURSEWORK SCHEME PDF', 'link' => 'syllabus/Ph_D_Course_work__Scheme_and_Syllabus.pdf', 'text' => 'Official scheme of examination and credit requirements for Pre-Ph.D coursework.'],
            ['title' => 'Ph.D Subject-wise Syllabus Directory Portal', 'sub' => 'Academic Affairs', 'badge' => 'SYLLABUS PORTAL ↗', 'link' => 'syllabusPhD.php', 'text' => 'Access subject-specific Pre-Ph.D coursework syllabus for Engineering, Science, Management, Pharmacy, and Arts.'],
        ]
    ],
    'phd-students' => [
        'title' => 'Registered Ph.D Research Scholars Directory',
        'eyebrow' => 'DOCTORAL STUDIES · SCHOLARS DIRECTORY',
        'hero' => 'Comprehensive directory of enrolled and awarded Ph.D research scholars, topic titles, and supervisors.',
        'intro_h' => 'Ph.D Scholars & Awardees Directory',
        'intro_t' => "RKDF University takes pride in its community of research scholars engaged in high-impact scientific and social research.\n\nThe complete registry of registered doctoral candidates, synopsis titles, and awarded Ph.D scholars is maintained below.",
        'items' => [
            ['title' => 'Official Ph.D Research Scholars Directory (PDF)', 'sub' => 'Directorate of Research', 'badge' => 'SCHOLARS DATA PDF', 'link' => 'research/Research_Student_data.pdf', 'text' => 'Detailed list of registered Ph.D scholars, registration years, research titles, and assigned supervisors.'],
            ['title' => 'Awarded Ph.D Scholars Registry Portal', 'sub' => 'Academic Records', 'badge' => 'AWARDEES DIRECTORY ↗', 'link' => 'phdstudent.php', 'text' => 'Digital portal listing awarded doctoral scholars across faculty departments from 2016 to 2026.'],
        ]
    ],
    'phd-admissions-2026' => [
        'title' => 'Ph.D Admissions 2026 Notification & Prospectus',
        'eyebrow' => 'DOCTORAL STUDIES · ADMISSIONS 2026',
        'hero' => 'Notification for Ph.D Entrance Examination 2026, important dates, key research areas, and application form.',
        'intro_h' => 'Ph.D Entrance Examination 2026 Call for Applications',
        'intro_t' => "Applications are invited from eligible candidates for admission to Ph.D programs for the academic session 2026-27.\n\nFellowships and research assistantships are available for outstanding GATE / NET qualified scholars.",
        'items' => [
            ['title' => 'Ph.D Entrance Examination 2026 Application Portal', 'sub' => 'Admission Cell', 'badge' => 'APPLY 2026 ↗', 'link' => 'phd_entrance.php', 'text' => 'Submit online application for Ph.D Entrance Exam 2026 and download registration confirmation.'],
            ['title' => 'Ph.D Admission Information Prospectus (PDF)', 'sub' => 'Research Directorate', 'badge' => 'PROSPECTUS PDF', 'link' => 'research/Admissions In Ph.D Programme.pdf', 'text' => 'Information brochure detailing entrance exam pattern, interview criteria, and department research centers.'],
        ]
    ],
    'supervisors' => [
        'title' => 'Approved Ph.D Guides & Research Supervisors',
        'eyebrow' => 'DOCTORAL STUDIES · RESEARCH SUPERVISORS',
        'hero' => 'Directory of approved Ph.D research supervisors, faculty designations, and vacancy positions.',
        'intro_h' => 'Approved Ph.D Research Guides Directory',
        'intro_t' => "All doctoral research at RKDF University is guided by experienced Senior Professors, Associate Professors, and recognized research scientists.\n\nScholars can consult the approved guide list to select research supervisors according to domain specialization.",
        'items' => [
            ['title' => 'Approved Ph.D Guides & Supervisors Directory (PDF)', 'sub' => 'Doctoral Committee', 'badge' => 'SUPERVISORS LIST PDF', 'link' => 'research/Supervisors.pdf', 'text' => 'Official registry of approved Ph.D guides, university departments, research specializations, and scholar quotas.'],
        ]
    ],
    'research-policy' => [
        'title' => 'University Research Policy & Ethics Guidelines',
        'eyebrow' => 'RESEARCH & DEVELOPMENT · RESEARCH POLICY',
        'hero' => 'Official research policy governing ethical research conduct, seed grants, publications, and patents.',
        'intro_h' => 'RKDF University Research Governance Framework',
        'intro_t' => "The University Research Policy aims to foster a strong research culture, maintain high standards of academic integrity, support interdisciplinary innovation, and provide financial incentives for high-impact journal publications.\n\nThe complete policy document approved by the Governing Body is available below.",
        'items' => [
            ['title' => 'RKDF University Official Research Policy (PDF)', 'sub' => 'Research Advisory Board', 'badge' => 'RESEARCH POLICY PDF', 'link' => 'research/Research_Policy_RKDF_University.pdf', 'text' => 'Official policy document detailing intramural research funding, ethical guidelines, anti-plagiarism rules, and publication incentives.'],
        ]
    ],
    'consultancy-policy' => [
        'title' => 'Institutional Consultancy & Testing Policy',
        'eyebrow' => 'RESEARCH & DEVELOPMENT · CONSULTANCY POLICY',
        'hero' => 'Policy guidelines governing industrial consultancy projects, material testing services, and revenue sharing.',
        'intro_h' => 'Industrial Consultancy & Material Testing Services',
        'intro_t' => "RKDF University actively encourages faculty members and department laboratories to undertake industrial consultancy, technical testing, and advisory projects for government and corporate organizations.\n\nThe Consultancy Policy defines transparent revenue sharing norms between faculty consultants and the university.",
        'items' => [
            ['title' => 'University Consultancy & Testing Policy (PDF)', 'sub' => 'Consultancy Cell', 'badge' => 'CONSULTANCY POLICY PDF', 'link' => 'research/consultancy_policy.pdf', 'text' => 'Official consultancy rules, project overhead distribution, testing fee rates, and client MOU guidelines.'],
        ]
    ],
    'institutional-distinctiveness' => [
        'title' => 'Institutional Distinctiveness Performance Report',
        'eyebrow' => 'QUALITY ASSURANCE · INSTITUTIONAL DISTINCTIVENESS',
        'hero' => 'Report on university distinctiveness in clean energy, solar carbon capture technology, and rural societal outreach.',
        'intro_h' => 'Pioneering Clean Energy & Technological Innovation',
        'intro_t' => "RKDF University's institutional distinctiveness lies in its pioneering research in Solar-Integrated Carbon Capture Technology, renewable energy microgrids, and extensive community healthcare outreach.\n\nOur carbon capture pilot plant represents a benchmark in academic-driven climate mitigation.",
        'items' => [
            ['title' => 'Institutional Distinctiveness Performance Report (PDF)', 'sub' => 'IQAC Secretariat', 'badge' => 'DISTINCTIVENESS PDF', 'link' => 'research/Institutional_Distinctiveness.pdf', 'text' => 'Official report detailing core areas of institutional distinctiveness, carbon capture research, and societal impact.'],
        ]
    ],
    'govt-projects' => [
        'title' => 'Govt of India Sponsored Research Projects',
        'eyebrow' => 'SPONSORED RESEARCH · GOVT PROJECTS',
        'hero' => 'Major research projects sanctioned by Ministries and agencies of the Government of India (DST, ISRO, AICTE, DBT).',
        'intro_h' => 'Government Funded Research Grants Directory',
        'intro_t' => "RKDF University has received research grants from premier Central Government agencies including Department of Science & Technology (DST), ISRO, CSIR, AICTE, and Ministry of New & Renewable Energy (MNRE).\n\nThese projects address national priorities in clean energy, health, and advanced materials.",
        'items' => [
            ['title' => 'Govt of India Sponsored Projects Directory (PDF)', 'sub' => 'R&D Directorate', 'badge' => 'GOVT PROJECTS PDF', 'link' => 'research/Projects of Govt of India.pdf', 'text' => 'Comprehensive catalogue of Government sanctioned research projects, principal investigators, and funding allocations.'],
        ]
    ],
    'csir-projects' => [
        'title' => 'CSIR Sponsored Research Projects at RKDF',
        'eyebrow' => 'SPONSORED RESEARCH · CSIR PROJECTS',
        'hero' => 'Presentation and progress reports on Council of Scientific & Industrial Research (CSIR) funded projects.',
        'intro_h' => 'CSIR Funded Chemical & Engineering Research',
        'intro_t' => "Research projects funded by CSIR at RKDF University focus on organic synthesis, chemical catalysis, and environmental remediation.\n\nThe research team actively collaborates with CSIR laboratories across India.",
        'items' => [
            ['title' => 'CSIR Sponsored Projects Presentation (PDF)', 'sub' => 'Department of Chemistry & R&D', 'badge' => 'CSIR PRESENTATION PDF', 'link' => 'research/Projects at RKDF  PPT- CSIR  Online 13 Sept-R1.pdf', 'text' => 'Executive presentation report detailing methodology, experimental setups, and outcomes of CSIR funded research.'],
        ]
    ],
    'solar-carbon-report' => [
        'title' => 'Solar Integrated Carbon Capture Plant Technical Report',
        'eyebrow' => 'CLEAN TECH RESEARCH · CARBON CAPTURE',
        'hero' => 'Technical report on the University\'s flagship Solar-Integrated Carbon Capture Research Plant.',
        'intro_h' => 'Flagship Carbon Sequestration Research Facility',
        'intro_t' => "The Solar Integrated Carbon Capture Research Plant at RKDF University is an innovative research facility designed to capture industrial CO2 emissions using solar thermal energy.\n\nThe complete technical report and index of operational data are available below.",
        'items' => [
            ['title' => 'Solar Carbon Capture Plant Technical Report Index (PDF)', 'sub' => 'Clean Energy Cell', 'badge' => 'TECHNICAL REPORT PDF', 'link' => 'research/Solar Integrated Carbon Capture Plant INDEX of Technical Report.pdf', 'text' => 'Comprehensive technical report index, operational schematics, carbon absorption efficiencies, and pilot test data.'],
        ]
    ],
    'incubation' => [
        'title' => 'RKDF Startup & Innovation Incubation Centre',
        'eyebrow' => 'ENTREPRENEURSHIP · INCUBATION CELL',
        'hero' => 'Startup incubator providing seed funding, prototyping lab space, patent support, and corporate mentorship.',
        'intro_h' => 'Empowering Student & Faculty Entrepreneurs',
        'intro_t' => "The RKDF Incubation & Innovation Centre nurtures aspiring student entrepreneurs, technology innovators, and startup founders.\n\nIncubatees receive state-of-the-art office space, rapid prototyping labs, IP filing support, and access to angel investor networks.",
        'items' => [
            ['title' => 'Incubation Centre & Innovation Brochure (PDF)', 'sub' => 'Innovation Cell', 'badge' => 'INCUBATION PDF', 'link' => 'research/Innovations.pdf', 'text' => 'Official brochure detailing incubation schemes, startup eligibility, lab equipment, and successful spin-off companies.'],
        ]
    ]
];

$upPage = $pdo->prepare("UPDATE site_pages SET page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
$delSec  = $pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?");
$insSec  = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

foreach ($slugData as $s => $data) {
    $upPage->execute([
        $data['title'],
        'rnd',
        $data['eyebrow'],
        $data['hero'],
        'images/lovable/rkdf-research.jpg',
        $data['intro_h'],
        $data['intro_t'],
        $s
    ]);

    $delSec->execute([$s]);

    $order = 1;
    foreach ($data['items'] as $item) {
        $insSec->execute([
            $s,
            'Prescribed Research & Academic Resources',
            $item['title'],
            $item['sub'],
            (string)$order,
            $item['text'],
            'images/lovable/rkdf-research.jpg',
            $item['link'],
            $item['badge'],
            $order
        ]);
        $order++;
    }
    echo "Updated {$s} in CMS DB with " . count($data['items']) . " items!\n";
}
