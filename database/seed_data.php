<?php
// database/seed_data.php
// Seeding script to initialize tables and populate baseline content for all 14 Homepage Sections

require_once __DIR__ . '/../config/db.php';

header('Content-Type: text/html; charset=utf-8');

echo "<div style='font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 24px; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);'>";
echo "<h2 style='color: #D9232D; margin-top: 0;'>RKDF Bhopal — CMS Database Seeder</h2>";

try {
    $pdo = getDbConnection();
    echo "<p style='color: green;'>✔ Database Connection Successful!</p>";

    // 1. Run Schema Setup
    $schemaSql = file_get_contents(__DIR__ . '/schema.sql');
    $pdo->exec($schemaSql);
    echo "<p style='color: green;'>✔ Database Schema Verified & Created!</p>";

    // 2. Ensure Admin User
    $stmt = $pdo->prepare("SELECT id FROM admin_users WHERE username = ?");
    $stmt->execute(['admin']);
    if (!$stmt->fetch()) {
        $passHash = password_hash('admin123', PASSWORD_DEFAULT);
        $insertAdmin = $pdo->prepare("INSERT INTO admin_users (username, password_hash, full_name, email, role) VALUES (?, ?, ?, ?, ?)");
        $insertAdmin->execute(['admin', $passHash, 'RKDF Administrator', 'admin@rkdf.ac.in', 'admin']);
        echo "<p style='color: green;'>✔ Default Admin Account Created (Username: <b>admin</b> | Password: <b>admin123</b>)</p>";
    } else {
        echo "<p style='color: #555;'>ℹ Admin Account already exists.</p>";
    }

    // Force re-seed option
    $force = isset($_GET['force']) || (isset($argv[1]) && $argv[1] === 'force');
    if ($force) {
        $pdo->exec("SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE homepage_items; TRUNCATE TABLE homepage_sections; TRUNCATE TABLE site_settings; TRUNCATE TABLE site_pages; TRUNCATE TABLE page_sections; SET FOREIGN_KEY_CHECKS = 1;");
        echo "<p style='color: orange;'>⚡ Tables truncated for fresh seed.</p>";
    }

    // 3. Define Exact Baseline Sections from Original Homepage
    $sectionsData = [
        [
            'key' => 'sec_00_hero',
            'tag_num' => '00',
            'tag_text' => 'EST. 2011 · BHOPAL, MP',
            'title_main' => 'Where heritage',
            'title_accent' => 'meets innovation.',
            'subtitle' => 'RKDF University Bhopal — Premier Private State University in Madhya Pradesh offering UG, PG, Diploma, and Ph.D. degree programs.',
            'video_path' => 'images/lovable/rkdf-drone.mp4',
            'image_path' => 'images/lovable/rkdf-building-enhanced.jpg',
            'extra_text_1' => 'Scroll',
            'extra_text_2' => 'EXPLORE CAMPUS',
            'sort' => 0,
            'items' => [
                ['type' => 'cta', 'title' => 'Apply Now — Admissions 2026-27', 'link_url' => 'admissionform.php', 'badge_text' => 'PRIMARY'],
                ['type' => 'cta', 'title' => 'Explore Campus Virtual Tour', 'link_url' => 'videogallery.php', 'badge_text' => 'SECONDARY']
            ]
        ],
        [
            'key' => 'sec_01_numbers',
            'tag_num' => '01',
            'tag_text' => 'THE INSTITUTE IN NUMBERS',
            'title_main' => 'The Institute',
            'title_accent' => 'in Numbers',
            'subtitle' => 'Key milestones and stats of RKDF University',
            'sort' => 1,
            'items' => [
                ['type' => 'stat', 'title' => 'Academic Programs', 'number_val' => '100+', 'subtitle' => 'Academic Programs'],
                ['type' => 'stat', 'title' => 'Enrolled Students', 'number_val' => '25k+', 'subtitle' => 'Enrolled Students'],
                ['type' => 'stat', 'title' => 'Expert Faculty', 'number_val' => '1.5k+', 'subtitle' => 'Expert Faculty'],
                ['type' => 'stat', 'title' => 'Placement Rate', 'number_val' => '95%', 'subtitle' => 'Placement Rate'],
                ['type' => 'stat', 'title' => 'Research Labs', 'number_val' => '50+', 'subtitle' => 'Research Labs'],
                ['type' => 'stat', 'title' => 'Years of Legacy', 'number_val' => '40+', 'subtitle' => 'Years of Legacy']
            ]
        ],
        [
            'key' => 'sec_02_university',
            'tag_num' => '02',
            'tag_text' => '02 · THE UNIVERSITY',
            'title_main' => 'A four-decade legacy,',
            'title_accent' => 'reimagined',
            'subtitle' => 'RKDF University brings together eleven professional schools, thirty-five departments and a cross-disciplinary research culture — under a single unwavering commitment to intellectual rigour and public good.',
            'image_path' => 'images/lovable/rkdf-library.jpg',
            'extra_text_1' => '"An education worth having is one that makes you useful — to yourself, and to a world in motion."',
            'extra_text_2' => '— Shri Sunil Kapoor, Chancellor',
            'sort' => 2,
            'items' => [
                ['type' => 'timeline', 'title' => 'Founding vision', 'number_val' => '1995', 'subtitle' => 'RKDF Group commits to accessible, quality higher education in central India.'],
                ['type' => 'timeline', 'title' => 'University status', 'number_val' => '2011', 'subtitle' => 'Established as a private state university under the MP Act.'],
                ['type' => 'timeline', 'title' => 'Research charter', 'number_val' => '2017', 'subtitle' => 'Expanded doctoral & interdisciplinary research programs across faculties.'],
                ['type' => 'timeline', 'title' => 'Global outlook', 'number_val' => '2024', 'subtitle' => 'NAAC accreditation & World Education Leadership Award recognition.']
            ]
        ],
        [
            'key' => 'sec_03_gateway',
            'tag_num' => '03',
            'tag_text' => 'STUDENT GATEWAY',
            'title_main' => 'Everything you need,',
            'title_accent' => 'one click away.',
            'subtitle' => 'Quick links to the tools, portals and resources students, parents and applicants reach for most.',
            'sort' => 3,
            'items' => [
                ['type' => 'link', 'title' => 'Admissions', 'subtitle' => 'Admissions Policy', 'link_url' => 'ADMISSION POLICY 2026-27.pdf'],
                ['type' => 'link', 'title' => 'Courses', 'subtitle' => 'Academic Courses', 'link_url' => 'academic&departments.php'],
                ['type' => 'link', 'title' => 'Fee Structure', 'subtitle' => 'University Fees Structure', 'link_url' => 'University_Fees_Structure.pdf'],
                ['type' => 'link', 'title' => 'Scholarships', 'subtitle' => 'Scholarship Schemes', 'link_url' => 'scholarship.php'],
                ['type' => 'link', 'title' => 'Hostel', 'subtitle' => 'Hostel Accommodation', 'link_url' => 'hostel.php'],
                ['type' => 'link', 'title' => 'Examinations', 'subtitle' => 'Exam Timetable & Portal', 'link_url' => 'exam.php'],
                ['type' => 'link', 'title' => 'Results', 'subtitle' => 'Student Results Portal', 'link_url' => 'Result.php'],
                ['type' => 'link', 'title' => 'Downloads', 'subtitle' => 'Forms & Downloads', 'link_url' => 'forms.php'],
                ['type' => 'link', 'title' => 'Virtual Tour', 'subtitle' => 'Campus Virtual Tour', 'link_url' => 'forms.php']
            ]
        ],
        [
            'key' => 'sec_04_schools',
            'tag_num' => '04',
            'tag_text' => 'SCHOOLS & FACULTIES',
            'title_main' => 'Eleven schools.',
            'title_accent' => 'One purpose.',
            'subtitle' => 'Explore our specialized schools and faculties',
            'sort' => 4,
            'items' => [
                ['type' => 'school', 'title' => 'Engineering & Technology', 'subtitle' => 'Robotics · AI · Civil · Mech · CS', 'badge_text' => '12 PROGRAMS', 'image_path' => 'images/11/sat3.JPG', 'link_url' => 'Engineering.php'],
                ['type' => 'school', 'title' => 'Management Studies', 'subtitle' => 'MBA · BBA · Analytics · Finance', 'badge_text' => '9 PROGRAMS', 'image_path' => 'images/11/sat1.JPG', 'link_url' => 'Management.php'],
                ['type' => 'school', 'title' => 'Pharmaceutical Sciences', 'subtitle' => 'B.Pharm · M.Pharm · D.Pharm', 'badge_text' => '7 PROGRAMS', 'image_path' => 'images/11/sat4.JPG', 'link_url' => 'pharmacy.php'],
                ['type' => 'school', 'title' => 'Legal Studies', 'subtitle' => 'BA-LLB · LLM · Corporate', 'badge_text' => '5 PROGRAMS', 'image_path' => 'images/11/sat2.JPG', 'link_url' => 'Law.php']
            ]
        ],
        [
            'key' => 'sec_05_admissions',
            'tag_num' => '05',
            'tag_text' => 'ADMISSIONS 2026-27',
            'title_main' => 'A simple path',
            'title_accent' => 'to joining us.',
            'subtitle' => 'Four transparent steps. A dedicated counsellor at every stage. Applications for the 2026–27 intake are open until 31 August.',
            'sort' => 5,
            'items' => [
                ['type' => 'step', 'title' => 'Choose Program', 'text_val' => 'Browse 100+ undergraduate, postgraduate and doctoral offerings.'],
                ['type' => 'step', 'title' => 'Apply Online', 'text_val' => 'Submit your application and academic records through the portal.'],
                ['type' => 'step', 'title' => 'Verification', 'text_val' => 'Our admissions team reviews documents and eligibility.'],
                ['type' => 'step', 'title' => 'Confirm & Enroll', 'text_val' => 'Pay your fee, receive your ID and join orientation week.']
            ]
        ],
        [
            'key' => 'sec_06_programs',
            'tag_num' => '06',
            'tag_text' => 'FEATURED PROGRAMS',
            'title_main' => 'Featured Academic',
            'title_accent' => 'Programs',
            'subtitle' => 'Discover our flagship career-focused degree programs',
            'sort' => 6,
            'items' => [
                ['type' => 'program', 'title' => 'B.Tech in Computer Science & AI', 'subtitle' => '4 Years · 240 Seats · 10+2 (PCM)', 'badge_text' => 'FLAGSHIP · ENGINEERING', 'image_path' => 'images/lovable/rkdf-engineering.jpg', 'link_url' => 'Engineering.php'],
                ['type' => 'program', 'title' => 'MBA in Business Analytics', 'subtitle' => '2 Years · 120 Seats', 'badge_text' => 'MANAGEMENT', 'image_path' => 'images/lovable/rkdf-management.jpg', 'link_url' => 'Management.php'],
                ['type' => 'program', 'title' => 'M.Pharm Clinical Research', 'subtitle' => '2 Years · 60 Seats', 'badge_text' => 'PHARMACY', 'image_path' => 'images/lovable/rkdf-pharmacy.jpg', 'link_url' => 'pharmacy.php'],
                ['type' => 'program', 'title' => 'BA-LLB (Hons.) Integrated', 'subtitle' => '5 Years · 180 Seats', 'badge_text' => 'LAW', 'image_path' => 'images/lovable/rkdf-law.jpg', 'link_url' => 'Law.php']
            ]
        ],
        [
            'key' => 'sec_07_campus',
            'tag_num' => '07',
            'tag_text' => 'CAMPUS LIFE',
            'title_main' => 'A campus that',
            'title_accent' => 'breathes.',
            'subtitle' => 'Beyond the classroom — 42 clubs, seven residential blocks, indoor and outdoor sports arenas, a two-story library, and a maker-space open around the clock.',
            'sort' => 7,
            'items' => [
                ['type' => 'stat', 'title' => 'Sports Arenas', 'number_val' => '18', 'subtitle' => 'Indoor and outdoor courts'],
                ['type' => 'stat', 'title' => 'Student Clubs', 'number_val' => '42', 'subtitle' => 'Cultural and tech societies'],
                ['type' => 'stat', 'title' => 'Residential Blocks', 'number_val' => '7', 'subtitle' => 'Hostels and residences'],
                ['type' => 'stat', 'title' => 'Innovation Labs', 'number_val' => '12', 'subtitle' => 'Research & incubation']
            ]
        ],
        [
            'key' => 'sec_08_research',
            'tag_num' => '08',
            'tag_text' => 'RESEARCH & INNOVATION',
            'title_main' => 'Advancing the frontiers',
            'title_accent' => 'of human knowledge.',
            'subtitle' => 'Fifty specialised laboratories. Nine funded research centres. A doctoral cohort working across artificial intelligence, clean energy, biosciences and public policy.',
            'sort' => 8,
            'items' => [
                ['type' => 'lab', 'title' => 'Sustainable Energy Lab', 'subtitle' => 'Grid-scale battery chemistry and rural microgrid deployment.'],
                ['type' => 'lab', 'title' => 'AI & Cognitive Systems', 'subtitle' => 'Multi-modal reasoning, low-resource NLP, applied computer vision.'],
                ['type' => 'lab', 'title' => 'Materials & Nanoscience', 'subtitle' => 'Additive manufacturing, functional polymers, bio-composites.']
            ]
        ],
        [
            'key' => 'sec_09_placements',
            'tag_num' => '09',
            'tag_text' => 'PLACEMENTS',
            'title_main' => 'Careers that',
            'title_accent' => 'go somewhere.',
            'subtitle' => 'Our placement cell partners with 300+ recruiters across India and abroad, running mock interviews, CV clinics and a full-year internship track.',
            'sort' => 9,
            'items' => [
                ['type' => 'stat', 'title' => 'PLACEMENT RATE', 'number_val' => '95%', 'subtitle' => 'Placement Rate'],
                ['type' => 'stat', 'title' => 'HIGHEST PACKAGE', 'number_val' => '42 LPA', 'subtitle' => 'Highest Package'],
                ['type' => 'stat', 'title' => 'AVERAGE PACKAGE', 'number_val' => '8 LPA', 'subtitle' => 'Average Package'],
                ['type' => 'stat', 'title' => 'RECRUITERS', 'number_val' => '300+', 'subtitle' => 'Recruiters']
            ]
        ],
        [
            'key' => 'sec_10_voices',
            'tag_num' => '10',
            'tag_text' => 'VOICES',
            'title_main' => 'What our graduates',
            'title_accent' => 'carry with them.',
            'subtitle' => 'Testimonials and success stories from RKDF alumni',
            'sort' => 10,
            'items' => [
                ['type' => 'testimonial', 'title' => 'Priya Sharma', 'subtitle' => 'M.Sc. Data Science, 2024', 'text_val' => 'The research culture here doesn\'t wait for permission. I published two papers before graduation and joined a team at Amazon straight after.', 'image_path' => 'images/11/TNP_Placed Stud.jpg'],
                ['type' => 'testimonial', 'title' => 'Arjun Verma', 'subtitle' => 'B.Tech CSE, 2023', 'text_val' => 'Faculty who actually build things, labs open past midnight, and a placement cell that treated every one of my 12 offers as if it mattered.', 'image_path' => 'images/11/sat3.JPG'],
                ['type' => 'testimonial', 'title' => 'Meera Iyer', 'subtitle' => 'BA-LLB, 2024', 'text_val' => 'The moot court program at RKDF is genuinely national-tier. I argued in six states before I even sat for the bar.', 'image_path' => 'images/11/sat2.JPG']
            ]
        ],
        [
            'key' => 'sec_11_news',
            'tag_num' => '11',
            'tag_text' => 'NEWS & EVENTS',
            'title_main' => 'This week at',
            'title_accent' => 'RKDF.',
            'subtitle' => 'Latest news and announcements from around the campus',
            'sort' => 11,
            'items' => [
                ['type' => 'news', 'title' => '14th Annual Convocation honours 4,200 graduates across 11 schools', 'subtitle' => 'Chancellor Sunil Kapoor conferred degrees on the largest graduating cohort in RKDF\'s history.', 'badge_text' => 'FEATURED · 28 AUG 2024', 'link_url' => 'news_detail.php?id=1'],
                ['type' => 'news', 'title' => 'Physics dept. wins DST grant for quantum sensing research', 'subtitle' => 'Research grant awarded by Department of Science and Technology.', 'badge_text' => 'RESEARCH · 26 AUG 2024', 'link_url' => 'r&d.php'],
                ['type' => 'news', 'title' => 'Placements open: Deloitte, Cognizant, HDFC on campus next week', 'subtitle' => 'Annual campus recruitment drive commences for final year students.', 'badge_text' => 'PLACEMENTS · 22 AUG 2024', 'link_url' => 't&p.php'],
                ['type' => 'news', 'title' => 'International summer school with Politecnico di Milano concludes', 'subtitle' => 'Collaborative workshop on sustainable urban design.', 'badge_text' => 'GLOBAL · 18 AUG 2024', 'link_url' => 'international-relation.php'],
                ['type' => 'news', 'title' => 'Independence Day: RKDF Cultural Society stages \'Rang Bharat\'', 'subtitle' => 'Cultural performances and patriotic tribute on campus.', 'badge_text' => 'CULTURE · 14 AUG 2024', 'link_url' => 'imggallery.php']
            ]
        ],
        [
            'key' => 'sec_12_experience',
            'tag_num' => '12',
            'tag_text' => 'CAMPUS EXPERIENCE',
            'title_main' => 'A university built',
            'title_accent' => 'around the student.',
            'subtitle' => 'Everything from our teaching philosophy to our campus design is calibrated for one outcome — graduates who leave here more prepared, more curious, and more useful than when they arrived.',
            'sort' => 12,
            'items' => [
                ['type' => 'facility', 'title' => 'Industry Collaboration', 'subtitle' => 'Live projects with 200+ industry partners, from TCS to Tata Motors.'],
                ['type' => 'facility', 'title' => 'Experienced Faculty', 'subtitle' => '1,500+ scholars, 62% with doctoral degrees and international exposure.'],
                ['type' => 'facility', 'title' => 'Modern Campus', 'subtitle' => '150-acre campus with 24/7 study spaces, sports arena and innovation labs.'],
                ['type' => 'facility', 'title' => 'Research Culture', 'subtitle' => '50+ funded labs across AI, biotech, renewable energy and materials science.'],
                ['type' => 'facility', 'title' => 'International Exposure', 'subtitle' => 'Exchange partnerships across 12 countries, three continents.'],
                ['type' => 'facility', 'title' => 'Placement Support', 'subtitle' => 'Dedicated placement cell with a 95% success rate across five years.']
            ]
        ],
        [
            'key' => 'sec_13_recognition',
            'tag_num' => '13',
            'tag_text' => 'RECOGNITION & IMPACT',
            'title_main' => 'It\'s not just a campus.',
            'title_accent' => 'It\'s a springboard.',
            'subtitle' => 'Every program at RKDF University combines rigorous academic foundations with real-world industry application.',
            'sort' => 13,
            'items' => [
                ['type' => 'approval', 'title' => 'Award-Winning University', 'subtitle' => 'World Education Leadership Award 2023, Oxford \'Grand Star Success Award\' — recognized for educational innovation.'],
                ['type' => 'approval', 'title' => 'Strategic Corporate Partnerships', 'subtitle' => '200+ active MoUs with CSIR, MPCST, and industry leaders for research, internships, and placement pathways.'],
                ['type' => 'approval', 'title' => 'Ph.D & Interdisciplinary Research', 'subtitle' => 'Active research projects, Shodhsangam research journal, and state-of-the-art laboratory infrastructure.']
            ]
        ],
        [
            'key' => 'sec_14_career',
            'tag_num' => '14',
            'tag_text' => 'CAREER DESTINATIONS',
            'title_main' => 'Placed at',
            'title_accent' => 'top global leaders.',
            'subtitle' => 'Our dedicated Training & Placement cell connects RKDF graduates with top MNCs, tech powerhouses, healthcare networks, and research organizations worldwide.',
            'sort' => 14,
            'items' => [
                ['type' => 'recruiter', 'title' => 'TCS', 'subtitle' => 'Tata Consultancy Services'],
                ['type' => 'recruiter', 'title' => 'Infosys', 'subtitle' => 'Global IT Leader'],
                ['type' => 'recruiter', 'title' => 'Wipro', 'subtitle' => 'Wipro Technologies'],
                ['type' => 'recruiter', 'title' => 'Accenture', 'subtitle' => 'Accenture Global'],
                ['type' => 'recruiter', 'title' => 'IBM', 'subtitle' => 'IBM India'],
                ['type' => 'recruiter', 'title' => 'Cognizant', 'subtitle' => 'Cognizant Technology'],
                ['type' => 'recruiter', 'title' => 'Tech Mahindra', 'subtitle' => 'Tech Mahindra']
            ]
        ]
    ];

    $checkSec = $pdo->prepare("SELECT COUNT(*) FROM homepage_sections");
    $checkSec->execute();
    $secCount = $checkSec->fetchColumn();

    if ($secCount == 0 || $force) {
        $stmtSec = $pdo->prepare("INSERT INTO homepage_sections (section_key, tag_number, tag_text, title_main, title_accent, subtitle, image_path, video_path, extra_text_1, extra_text_2, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtItem = $pdo->prepare("INSERT INTO homepage_items (section_key, item_type, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        foreach ($sectionsData as $sec) {
            $stmtSec->execute([
                $sec['key'],
                $sec['tag_num'],
                $sec['tag_text'],
                $sec['title_main'],
                $sec['title_accent'],
                $sec['subtitle'],
                $sec['image_path'] ?? '',
                $sec['video_path'] ?? '',
                $sec['extra_text_1'] ?? '',
                $sec['extra_text_2'] ?? '',
                $sec['sort']
            ]);

            $iSort = 1;
            foreach ($sec['items'] as $item) {
                $stmtItem->execute([
                    $sec['key'],
                    $item['type'] ?? 'general',
                    $item['title'] ?? '',
                    $item['subtitle'] ?? '',
                    $item['number_val'] ?? '',
                    $item['text_val'] ?? '',
                    $item['image_path'] ?? '',
                    $item['link_url'] ?? '',
                    $item['badge_text'] ?? '',
                    $iSort++
                ]);
            }
        }
        echo "<p style='color: green;'>✔ Baseline data for 14 Homepage Sections (with exact original content) Populated!</p>";
    } else {
        echo "<p style='color: #555;'>ℹ Homepage Sections already populated.</p>";
    }

    // 4. Baseline Site Settings
    $settingsData = [
        ['setting_key' => 'general_phone', 'setting_value' => '0755-4075800', 'setting_group' => 'contact'],
        ['setting_key' => 'general_email', 'setting_value' => 'info@rkdf.ac.in', 'setting_group' => 'contact'],
        ['setting_key' => 'university_address', 'setting_value' => 'Airport Bypass Road, Gandhi Nagar, Bhopal, Madhya Pradesh 462033', 'setting_group' => 'contact'],
        ['setting_key' => 'admission_year', 'setting_value' => '2026–27', 'setting_group' => 'admissions'],
        ['setting_key' => 'admission_status', 'setting_value' => 'Open', 'setting_group' => 'admissions'],
        ['setting_key' => 'policy_pdf_link', 'setting_value' => 'ADMISSION POLICY 2026-27.pdf', 'setting_group' => 'admissions'],
        ['setting_key' => 'fee_pdf_link', 'setting_value' => 'University_Fees_Structure.pdf', 'setting_group' => 'admissions'],
        ['setting_key' => 'prospectus_pdf_link', 'setting_value' => 'Download/JOB_ORIENTED_PROG.pdf', 'setting_group' => 'admissions'],
        ['setting_key' => 'ticker_text', 'setting_value' => 'Admissions Open for Academic Session 2026–27 | Apply Online for Engineering, Pharmacy, Management & Paramedical Programs | UGC Recognized Private State University', 'setting_group' => 'homepage'],
        ['setting_key' => 'footer_copyright', 'setting_value' => 'RKDF University, Bhopal. All rights reserved.', 'setting_group' => 'footer']
    ];

    $checkSet = $pdo->prepare("SELECT COUNT(*) FROM site_settings");
    $checkSet->execute();
    $setCount = $checkSet->fetchColumn();

    if ($setCount == 0 || $force) {
        $stmtSet = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value, setting_group) VALUES (?, ?, ?)");
        foreach ($settingsData as $set) {
            $stmtSet->execute([$set['setting_key'], $set['setting_value'], $set['setting_group']]);
        }
        echo "<p style='color: green;'>✔ Baseline Site Settings Populated!</p>";
    } else {
        echo "<p style='color: #555;'>ℹ Site Settings already populated.</p>";
    }

    // 5. Baseline Site Pages
    $pagesData = [
        ['page_slug' => 'scholarship', 'page_title' => 'Financial Aid & Scholarship Schemes', 'category' => 'Admissions', 'eyebrow' => '08 · SCHOLARSHIP SCHEMES', 'hero_subtitle' => 'Empowering deserving scholars through government and merit-based financial aid.', 'intro_heading' => 'Government & Merit Scholarships', 'intro_text' => 'RKDF University facilitates financial aid under state & central government welfare portals.'],
        ['page_slug' => 'patent', 'page_title' => 'Research Patents & Innovation', 'category' => 'Research', 'eyebrow' => '34 · INTELLECTUAL PROPERTY', 'hero_subtitle' => 'Granted and published research patents by RKDF faculty & scholars.', 'intro_heading' => 'University Patent Portfolio', 'intro_text' => 'Highlighting key patents in engineering, clean energy, and healthcare technology.'],
        ['page_slug' => 'phdsubjects', 'page_title' => 'Ph.D Doctoral Research Subjects', 'category' => 'Research', 'eyebrow' => '12 · DOCTORAL DISCIPLINES', 'hero_subtitle' => '20 Research Disciplines approved for Doctoral Research (Ph.D) intake 2026.', 'intro_heading' => 'Doctoral Research Faculties', 'intro_text' => 'Comprehensive Ph.D disciplines offered across engineering, sciences, law, management and humanities.'],
        ['page_slug' => 'phd_entrance', 'page_title' => 'Ph.D Entrance Examination 2026', 'category' => 'Admissions', 'eyebrow' => '15 · DOCTORAL ENTRANCE TEST', 'hero_subtitle' => 'Official notification, brochure and entrance application form for Ph.D 2026.', 'intro_heading' => 'Doctoral Entrance 2026', 'intro_text' => 'Complete guidelines and forms for candidates seeking admission into doctoral degree programs.'],
        ['page_slug' => 'phdstudent', 'page_title' => 'Awarded Ph.D Scholars List', 'category' => 'Research', 'eyebrow' => '22 · DOCTORAL GRADUATES', 'hero_subtitle' => 'Registry of awarded Ph.D research scholars across years (2016 - 2025).', 'intro_heading' => 'Ph.D Scholars Directory', 'intro_text' => 'Official records of doctoral degrees awarded by RKDF University.'],
        ['page_slug' => 'stafflist', 'page_title' => 'Approved Ph.D Research Supervisors', 'category' => 'Research', 'eyebrow' => '19 · RESEARCH SUPERVISORS', 'hero_subtitle' => 'Complete 70 research supervisors dataset with designation and specialisation.', 'intro_heading' => 'Faculty Research Supervisors', 'intro_text' => 'Guide profiles and specialisation details for doctoral scholars.'],
        ['page_slug' => 'academic&departments', 'page_title' => 'Faculties & Academic Departments', 'category' => 'Academics', 'eyebrow' => '04 · SCHOOLS & DEPARTMENTS', 'hero_subtitle' => 'Explore 16 constituent colleges and faculties at RKDF University.', 'intro_heading' => 'Academic Directory', 'intro_text' => 'Professional schools offering UG, PG, Diploma, and Ph.D programs.'],
        ['page_slug' => 'admissionform', 'page_title' => 'Online Admission Application Form', 'category' => 'Admissions', 'eyebrow' => '01 · ONLINE APPLICATION', 'hero_subtitle' => '4-Step registration form for academic session 2026-27.', 'intro_heading' => 'Student Enrollment Form', 'intro_text' => 'Apply online for technical, non-technical, and professional courses.'],
        ['page_slug' => 'Admission_search', 'page_title' => 'Admission Application Lookup', 'category' => 'Admissions', 'eyebrow' => '02 · REGISTRATION SEARCH', 'hero_subtitle' => 'Track your submitted admission application status using Registration ID.', 'intro_heading' => 'Application Tracker', 'intro_text' => 'Fast status lookup for submitted admission forms.']
    ];

    $checkPages = $pdo->prepare("SELECT COUNT(*) FROM site_pages");
    $checkPages->execute();
    if ($checkPages->fetchColumn() == 0 || $force) {
        $stmtPage = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, intro_heading, intro_text) VALUES (?, ?, ?, ?, ?, ?, ?)");
        foreach ($pagesData as $p) {
            $stmtPage->execute([$p['page_slug'], $p['page_title'], $p['category'], $p['eyebrow'], $p['hero_subtitle'], $p['intro_heading'], $p['intro_text']]);
        }
        echo "<p style='color: green;'>✔ Baseline Site Pages Populated!</p>";
    }

    echo "<h3 style='color: #2e7d32;'>🎉 Database Setup & Baseline Seeding Complete!</h3>";
    echo "<p><a href='../admin/login.php' style='display: inline-block; padding: 10px 20px; background: #D9232D; color: white; text-decoration: none; border-radius: 4px;'>Proceed to Admin Login →</a></p>";

} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Database Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
echo "</div>";
