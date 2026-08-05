<?php
// ============================================================
// RKDF University — Value-Added Courses Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Value-Added Courses Syllabus — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/ai_value_added/rkdf_vac_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vac-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .vac-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vac-grid-layout { grid-template-columns: 1fr; }
    }

    .vac-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .vac-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .vac-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .vac-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .vac-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .vac-card-body {
      padding: 32px 36px;
    }

    .vac-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .vac-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .vac-block-card:hover .vac-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .vac-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .vac-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 14px 18px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .vac-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .vac-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .vac-pdf-link {
      font-size: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 5px 12px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      display: inline-block;
    }
    .vac-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    /* Sidebar Links */
    aside {
      position: sticky;
      top: 100px;
    }

    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
    }

    .sidebar-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      padding-bottom: 14px;
      border-bottom: 2px solid #E31B23;
      margin-bottom: 20px;
    }

    .sidebar-nav-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .sidebar-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      border-radius: 8px;
      color: #334155;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.05);
      transition: all 0.25s ease;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
      background: #0C1424;
      color: #ffffff !important;
      border-color: #0C1424;
      transform: translateX(4px);
    }
    .sidebar-link.active {
      background: #E31B23;
      border-color: #E31B23;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">40 · SKILL &amp; CERTIFICATION</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Value Added Courses (Approved) Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Enhancing employability, practical skill sets, software proficiency, research ethics, and personal development across all university faculties.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="vac-main-section">
    <div class="rk-container">
      <div class="vac-grid-layout">
        
        <!-- LEFT COLUMN: VALUE ADDED COURSES TABLE -->
        <div>

          <article class="vac-block-card">
            <div class="vac-card-header">
              <h2 class="vac-card-title">Approved Value-Added Certificate Syllabi</h2>
              <span class="vac-badge">38+ CERTIFICATE COURSES</span>
            </div>
            <div class="vac-card-body">
              
              <div class="vac-media-frame">
                <img src="images/ai_value_added/rkdf_vac_card.jpg" alt="RKDF Skill Development &amp; Value-Added Center" class="vac-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Interdisciplinary Skill Enhancement &amp; Certification
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Value-added courses at RKDF University Bhopal are designed to bridge academic knowledge with industry demands, fostering professional competencies, research ethics, digital literacy, and personal development.
              </p>

              <!-- COURSES TABLE -->
              <table class="vac-table">
                <thead>
                  <tr>
                    <th>Faculty / Wing</th>
                    <th>Detail of Value Added Courses</th>
                    <th>Course Coordinator</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- FACULTY OF PHARMACY -->
                  <tr>
                    <td rowspan="3" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Pharmacy</td>
                    <td>Research Tools &amp; Applications</td>
                    <td>Dr. Santram Lodhi</td>
                    <td><a href="syllabus/Value-Added-Course/RESEARCH%20TOOLS%20AND%20APPLICATIONS.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Writing &amp; Publication Ethics</td>
                    <td>Dr. Sandeep Sahu</td>
                    <td><a href="syllabus/Value-Added-Course/WRITING%20AND%20PUBLICATION%20ETHICS.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Excellent Applied Practices</td>
                    <td>Dr. Abhishek Dwivedi</td>
                    <td><a href="syllabus/Value-Added-Course/EXCELLENT%20APPLIED%20PRACTICE.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF ENGINEERING -->
                  <tr>
                    <td rowspan="7" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Engineering</td>
                    <td>Personality Development</td>
                    <td>Mr. Chirag Gupta</td>
                    <td><a href="syllabus/Value-Added-Course/Personality%20Development.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Soft Skills</td>
                    <td>Mr. Arun Rai</td>
                    <td><a href="syllabus/Value-Added-Course/Soft%20Skills.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Computer Proficiency</td>
                    <td>Mr. Anubhav Shukla</td>
                    <td><a href="syllabus/Value-Added-Course/Computer%20Proficiency.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Scientific Writing</td>
                    <td>Dr. Ravi Kumar Singh Pippal</td>
                    <td><a href="syllabus/Value-Added-Course/SCIENTIFIC%20WRITING.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Course Content 3D Printing</td>
                    <td>Dr. Ravi Kumar Singh Pippal</td>
                    <td><a href="syllabus/Value-Added-Course/course%20content%203d%20printing.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Smart Manufacturing Through Digital Manufacturing</td>
                    <td>Dr. Ravi Kumar Singh Pippal</td>
                    <td><a href="syllabus/Value-Added-Course/SMART%20MANUFACTURING.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Blockchain Technology</td>
                    <td>Dr. Ravi Kumar Singh Pippal</td>
                    <td><a href="syllabus/Value-Added-Course/Block%20Chain%20Technology.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF PARAMEDICAL SCIENCES -->
                  <tr>
                    <td rowspan="2" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Paramedical Sciences</td>
                    <td>A Basic Course on Health Care</td>
                    <td>Dr. Pawan Patidar</td>
                    <td><a href="syllabus/Value-Added-Course/Faculty%20of%20Paramedical.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>YOGA</td>
                    <td>Dr. Pawan Patidar</td>
                    <td><a href="syllabus/Value-Added-Course/YOGA.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF SCIENCE -->
                  <tr>
                    <td rowspan="2" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Science</td>
                    <td>A Basic Course on Crime Investigation &amp; Forensic Biology (VCFB)</td>
                    <td>Dr. C.B.S. Dangi</td>
                    <td><a href="syllabus/Value-Added-Course/VAC%20-%20FOSVCFB.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>A Basic Course on Diet Nutrition (VCDN)</td>
                    <td>Ms. Rimpa Manna</td>
                    <td><a href="syllabus/Value-Added-Course/VAC%20-%20FOSVCDN.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF LAW -->
                  <tr>
                    <td rowspan="3" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Law</td>
                    <td>Human Rights</td>
                    <td>Dr. Prince Gupta</td>
                    <td><a href="syllabus/Value-Added-Course/HUMAN%20RIGHTS.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Cyber Security</td>
                    <td>Ms. Anshuma Upadhyay</td>
                    <td><a href="syllabus/Value-Added-Course/Cyber%20Security.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Intellectual Property Rights, Law of Copyrights, Information Technology</td>
                    <td>Dr. Shikha Bhawani Malviya</td>
                    <td><a href="syllabus/Value-Added-Course/VAC%20-%20IPR%20LC%20IT.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF AGRICULTURE -->
                  <tr>
                    <td rowspan="4" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Agriculture</td>
                    <td>Gardening &amp; Horticulture</td>
                    <td>Mr. Vivek Gumasta</td>
                    <td><a href="syllabus/Value-Added-Course/Gardening%20and%20%20Horticulture.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Food Processing and Value Addition</td>
                    <td>Ms. Charu Bhagat</td>
                    <td><a href="syllabus/Value-Added-Course/Food%20Processing.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Advances in Food and Value Addition of Grains</td>
                    <td>Dr. Shuchi Gangwar</td>
                    <td><a href="syllabus/Value-Added-Course/Advances%20in%20food.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Vermi Compost</td>
                    <td>Dr. Shuchi Gangwar</td>
                    <td><a href="syllabus/Value-Added-Course/Vermicompost.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF AYURVEDA -->
                  <tr>
                    <td rowspan="2" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Ayurveda</td>
                    <td>Certificate Course in Yoga and Pranayama</td>
                    <td>Ms. Pooja Dangi</td>
                    <td><a href="syllabus/Value-Added-Course/VAC%20-%20Ayurveda.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Enhancing Productivity through Effective Stress Management</td>
                    <td>Ms. Pooja Dangi</td>
                    <td><a href="syllabus/Value-Added-Course/Enhancing%20Productivity.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF ARCHITECTURE -->
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">Faculty of Architecture</td>
                    <td>AutoCAD</td>
                    <td>Dr. Nemisha Rajput</td>
                    <td><a href="syllabus/Value-Added-Course/Autocad.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF HOMEOPATHY -->
                  <tr>
                    <td rowspan="4" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Homeopathy &amp; Medical Sciences</td>
                    <td>Preparation of Homeopathic Medicine</td>
                    <td>Dr. Sandeepa Sahu</td>
                    <td><a href="syllabus/Value-Added-Course/Preparation%20of%20Homoeopathic.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Knowledge of Biochemic Medicine</td>
                    <td>Dr. Alok Mittal</td>
                    <td><a href="syllabus/Value-Added-Course/Knowledge%20of%20Biochemic.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Water Purification</td>
                    <td>Dr. Mahesh Mishra</td>
                    <td><a href="syllabus/Value-Added-Course/Water%20Purification.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Medicinal Plants in India</td>
                    <td>Dr. Sandhya Sahu</td>
                    <td><a href="syllabus/Value-Added-Course/Medicinal%20Plants.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF COMPUTER APPLICATION -->
                  <tr>
                    <td rowspan="2" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Computer Application</td>
                    <td>Microsoft Excel</td>
                    <td>Dr. Sandeep Dubey</td>
                    <td><a href="syllabus/Value-Added-Course/Microsoft%20Excel.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Web Designing</td>
                    <td>Dr. Sandeep Dubey</td>
                    <td><a href="syllabus/Value-Added-Course/Web%20Designing.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF COMMERCE -->
                  <tr>
                    <td rowspan="2" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Commerce</td>
                    <td>E-Accounting and Tally with GST Accounting</td>
                    <td>Ms. Suboora</td>
                    <td><a href="syllabus/Value-Added-Course/E-Accounting%20and%20Taxation.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Accounting and Tally</td>
                    <td>Mr. Ankur Shukla</td>
                    <td><a href="syllabus/Value-Added-Course/Accounting%20and%20Tally.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF MANAGEMENT -->
                  <tr>
                    <td rowspan="5" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Management</td>
                    <td>Soft Skills</td>
                    <td>Dr. Pratyush Tripathi</td>
                    <td><a href="syllabus/Value-Added-Course/Soft%20Skills-Communication.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Direct Marketing</td>
                    <td>Dr. Pratyush Tripathi</td>
                    <td><a href="syllabus/Value-Added-Course/Direct%20Marketing.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Quantitative Aptitude for Success in Competitive Examinations</td>
                    <td>Dr. Pratyush Tripathi</td>
                    <td><a href="syllabus/Value-Added-Course/Quantitative%20Aptitude.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Capital Markets</td>
                    <td>Dr. Satendra S Thakur</td>
                    <td><a href="syllabus/Value-Added-Course/Capital%20Markets.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Basic Tools of Statistics</td>
                    <td>Dr. Satendra S Thakur</td>
                    <td><a href="syllabus/Value-Added-Course/Use%20of%20Statistics.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF EDUCATION -->
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">Faculty of Education</td>
                    <td>Creative Craft</td>
                    <td>Dr. M.S. Pawar</td>
                    <td><a href="syllabus/Value-Added-Course/Creative%20Craft.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- FACULTY OF NURSING -->
                  <tr>
                    <td rowspan="3" style="font-weight:700;color:#0C1424;vertical-align:middle;">Faculty of Nursing</td>
                    <td>Care of Diabetics</td>
                    <td>Ms. Rashmi Yadav</td>
                    <td><a href="syllabus/Value-Added-Course/CARE%20OF%20DIABETICS.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Stress Management</td>
                    <td>Ms. Annie Robin Joseph</td>
                    <td><a href="syllabus/Value-Added-Course/STRESS%20MANAGEMENT.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>
                  <tr>
                    <td>Personality Development</td>
                    <td>Ms. Priya Baine</td>
                    <td><a href="syllabus/Value-Added-Course/PERSONALITY%20DEVELOPMENT.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                  <!-- NCC ARMY WING -->
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">NCC Army Wing</td>
                    <td>Making of Agniveer (अग्निवीर)</td>
                    <td>Subedar Major Arjun Prasad</td>
                    <td><a href="syllabus/Value-Added-Course/NCC%20Army%20Wing.pdf" target="_blank" class="vac-pdf-link">📄 OPEN ↗</a></td>
                  </tr>

                </tbody>
              </table>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Quick Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link active">Value-Added Syllabi <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
