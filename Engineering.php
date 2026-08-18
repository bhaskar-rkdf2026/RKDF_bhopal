<?php
// ============================================================
// RKDF University — Faculty of Engineering & Technology
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & AICTE EOA Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'engineering';
$pRow = [];
$allItems = [];

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
        $stmt->execute([$pageSlug]);
        $pRow = $stmt->fetch() ?: [];

        $itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
        $itemStmt->execute([$pageSlug]);
        $allItems = $itemStmt->fetchAll() ?: [];
    } catch (Throwable $e) {}
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ACADEMIC · ENGINEERING';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Faculty of Engineering & Technology';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'AICTE approved B.Tech & M.Tech programs in Computer Science, Artificial Intelligence, Robotics, Civil, Mechanical & Electrical Engineering.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-engineering.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($mainTitle) ?> — RKDF University Bhopal</title>
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
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .eng-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .eng-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .eng-grid-layout { grid-template-columns: 1fr; }
    }

    .eng-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .eng-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .eng-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .eng-badge {
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

    .eng-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .eng-card-body {
      padding: 32px 36px;
    }

    .eng-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .eng-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .eng-block-card:hover .eng-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .eng-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .eng-table th {
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
    .eng-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .eng-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .eng-pdf-link {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 4px 10px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      margin-left: 8px;
    }
    .eng-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    .inst-header-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 28px;
      padding-top: 24px;
      border-top: 1px solid rgba(12, 20, 36, 0.08);
    }

    .phd-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 16px;
      margin-top: 18px;
    }
    .phd-card-item {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 12px;
      padding: 16px 18px;
    }
    .phd-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }
    .phd-card-rule {
      font-size: 12.5px;
      color: #E31B23;
      font-weight: 600;
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
      <span class="rk-eyebrow tone-gold">25 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Engineering &amp; Technology</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering next-generation engineers, tech innovators, and researchers through AICTE approved B.E., B.E. (Lateral), M.Tech, Polytechnic Diploma, and Ph.D. programs across 5 constituent engineering colleges.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="eng-main-section">
    <div class="rk-container">
      <div class="eng-grid-layout">
        
        <!-- LEFT COLUMN: ENGINEERING INSTITUTES & COURSES -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="eng-block-card">
            <div class="eng-card-header">
              <h2 class="eng-card-title">Constituent Engineering Institutes</h2>
              <span class="eng-badge">AICTE APPROVED</span>
            </div>
            <div class="eng-card-body">
              
              <div class="eng-media-frame">
                <img src="images/ai_engineering/rkdf_engineering_lab.jpg" alt="RKDF Engineering Campus &amp; Labs" class="eng-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Engineering Programs across Constituent Colleges
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                RKDF University Bhopal operates 5 premier AICTE approved constituent engineering institutes providing industry-aligned technical education in Civil, Mechanical, Electrical, Electronics, Computer Science, and Information Technology engineering.
              </p>

              <!-- INSTITUTE 1: VEDICA INSTITUTE OF TECHNOLOGY -->
              <div class="inst-header-box" style="margin-top:0;padding-top:0;border-top:none;">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Vedica Institute of Technology
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/VIT%20EOA%20Report%202022-23.pdf" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <h4 style="font-size:15px;color:#E31B23;margin-top:10px;margin-bottom:8px;font-weight:700;">Bachelor of Engineering (B.E.)</h4>
              <table class="eng-table">
                <thead>
                  <tr>
                    <th>Department / Specialization</th>
                    <th>Seats</th>
                    <th>Duration</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td>Civil Engineering</td><td>120</td><td>8 Sem</td><td rowspan="6" style="vertical-align:middle;">Passed 10+2 examination with Physics and Mathematics as compulsory subjects along with Chemistry/ Biology/ Biotechnology/ IT/ CS/ Agriculture. Minimum 45% marks (40% for reserved category). OR Passed Diploma (in Engineering) examination with at least 45% marks (40% reserved).</td></tr>
                  <tr><td>Mechanical Engineering (ME)</td><td>120</td><td>8 Sem</td></tr>
                  <tr><td>Electrical &amp; Electronics (EEE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Electronics &amp; Comm. (ECE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Information Technology (IT)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg (CSE)</td><td>60</td><td>8 Sem</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 2: SRI SATYA SAI COLLEGE OF ENGINEERING -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Sri Satya Sai College of Engineering
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/SSSCE%20EOA%20Report%202022-23.PDF" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <h4 style="font-size:15px;color:#E31B23;margin-top:10px;margin-bottom:8px;font-weight:700;">Bachelor of Engineering (B.E.)</h4>
              <table class="eng-table">
                <thead>
                  <tr><th>Department / Specialization</th><th>Seats</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td>Civil Engineering</td><td>90</td><td>8 Sem</td><td rowspan="7" style="vertical-align:middle;">Passed 10+2 examination with Physics &amp; Mathematics (Min 45%, 40% reserved). OR Passed Diploma Engineering (Min 45%, 40% reserved).</td></tr>
                  <tr><td>Electrical &amp; Electronics (EEE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Electrical Engineering (EE)</td><td>60</td><td>8 Sem</td></tr>
                  <tr><td>Information Technology (IT)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Mechanical Engineering (ME)</td><td>90</td><td>8 Sem</td></tr>
                  <tr><td>Electronics &amp; Comm. (ECE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg (CSE)</td><td>60</td><td>8 Sem</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 3: RKDF COLLEGE OF TECHNOLOGY & RESEARCH -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  RKDF College of Technology &amp; Research
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/RKDF-CTR%20EOA%20Report%202022-23.pdf" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <h4 style="font-size:15px;color:#E31B23;margin-top:10px;margin-bottom:8px;font-weight:700;">Bachelor of Engineering (B.E.)</h4>
              <table class="eng-table">
                <thead>
                  <tr><th>Department / Specialization</th><th>Seats</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td>Civil Engineering</td><td>60</td><td>8 Sem</td><td rowspan="5" style="vertical-align:middle;">Passed 10+2 with Physics &amp; Math (45% Gen / 40% Reserved) or Diploma.</td></tr>
                  <tr><td>Mechanical Engineering (ME)</td><td>90</td><td>8 Sem</td></tr>
                  <tr><td>Electronics &amp; Comm. (ECE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg (CSE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Information Technology (IT)</td><td>30</td><td>8 Sem</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 4: BHABHA COLLEGE OF ENGINEERING -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Bhabha College of Engineering
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/BCE%20EOA%20Report%202022-23.PDF" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <h4 style="font-size:15px;color:#E31B23;margin-top:10px;margin-bottom:8px;font-weight:700;">Bachelor of Engineering (B.E.)</h4>
              <table class="eng-table">
                <thead>
                  <tr><th>Department / Specialization</th><th>Seats</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td>Civil Engineering</td><td>60</td><td>8 Sem</td><td rowspan="6" style="vertical-align:middle;">Passed 10+2 with Physics &amp; Math (45% Gen / 40% Reserved) or Diploma.</td></tr>
                  <tr><td>Mechanical Engineering (ME)</td><td>120</td><td>8 Sem</td></tr>
                  <tr><td>Electronics &amp; Comm. (ECE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg (CSE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Information Technology (IT)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Electrical Engineering (EE)</td><td>90</td><td>8 Sem</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 5: AGNOS COLLEGE OF TECHNOLOGY -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Agnos College of Technology
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/Agnos%20EOA%20Report%202022-23.pdf" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <h4 style="font-size:15px;color:#E31B23;margin-top:10px;margin-bottom:8px;font-weight:700;">Bachelor of Engineering (B.E.)</h4>
              <table class="eng-table">
                <thead>
                  <tr><th>Department / Specialization</th><th>Seats</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td>Civil Engineering</td><td>90</td><td>8 Sem</td><td rowspan="4" style="vertical-align:middle;">Passed 10+2 with Physics &amp; Math (45% Gen / 40% Reserved) or Diploma.</td></tr>
                  <tr><td>Mechanical Engineering (ME)</td><td>90</td><td>8 Sem</td></tr>
                  <tr><td>Electronics &amp; Comm. (ECE)</td><td>30</td><td>8 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg (CSE)</td><td>30</td><td>8 Sem</td></tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- POSTGRADUATE M.TECH BLOCK -->
          <article class="eng-block-card">
            <div class="eng-card-header" style="background:#0C1424;">
              <h2 class="eng-card-title">Master of Technology (M.Tech) Programs</h2>
              <span class="eng-badge">POSTGRADUATE</span>
            </div>
            <div class="eng-card-body">
              <p style="font-size:15.5px;color:#334155;margin-bottom:20px;">
                Advanced 2-Year (4 Semesters) M.Tech degree specializations across constituent engineering colleges:
              </p>

              <table class="eng-table">
                <thead>
                  <tr>
                    <th>Institute Name</th>
                    <th>M.Tech Specialization</th>
                    <th>Seats</th>
                    <th>Duration</th>
                    <th>Eligibility</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td rowspan="3"><strong>Vedica Institute of Tech.</strong></td><td>Digital Communication</td><td>12</td><td>4 Sem</td><td rowspan="12" style="vertical-align:middle;">Passed Bachelor’s Degree (B.E./B.Tech) or equivalent in relevant field with at least 50% marks (45% reserved category).</td></tr>
                  <tr><td>Computer Science &amp; Engg</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Power Electronics</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td rowspan="4"><strong>Sri Satya Sai College of Engg.</strong></td><td>Computer Science &amp; Engg</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Electrical Power Systems</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Production &amp; Industrial Engg</td><td>18</td><td>4 Sem</td></tr>
                  <tr><td>VLSI Design</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td rowspan="4"><strong>Bhabha College of Engg.</strong></td><td>Digital Communication</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Power Systems</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Computer Science &amp; Engg</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>VLSI Design</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td rowspan="2"><strong>Agnos College of Tech.</strong></td><td>Computer Science &amp; Engg</td><td>12</td><td>4 Sem</td></tr>
                  <tr><td>Thermal Engineering</td><td>18</td><td>4 Sem</td></tr>
                </tbody>
              </table>
            </div>
          </article>

          <!-- POLYTECHNIC DIPLOMA BLOCK -->
          <article class="eng-block-card">
            <div class="eng-card-header" style="background:#0C1424;">
              <h2 class="eng-card-title">Polytechnic Diploma Programs</h2>
              <span class="eng-badge" style="color:#C5A059;border-color:rgba(197,160,89,0.3);">DIPLOMA &amp; LATERAL</span>
            </div>
            <div class="eng-card-body">
              <div class="inst-header-box" style="margin-top:0;padding-top:0;border-top:none;">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Institute of Polytechnic Engineering
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/IPE%20EOA%20Report%202022-23.pdf" target="_blank" class="eng-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <table class="eng-table">
                <thead>
                  <tr><th>Course Level</th><th>Specialization</th><th>Seats</th><th>Duration</th><th>Eligibility</th></tr>
                </thead>
                <tbody>
                  <tr><td rowspan="5"><strong>Diploma Engineering</strong></td><td>Civil Engineering</td><td>90</td><td>6 Sem</td><td rowspan="5" style="vertical-align:middle;">Passed 10th Std/SSC examination with at least 35% marks.</td></tr>
                  <tr><td>Mechanical Engineering</td><td>90</td><td>6 Sem</td></tr>
                  <tr><td>Electrical Engineering</td><td>60</td><td>6 Sem</td></tr>
                  <tr><td>Electronics &amp; Telecomm.</td><td>30</td><td>6 Sem</td></tr>
                  <tr><td>Film Tech &amp; TV Production</td><td>30</td><td>6 Sem</td></tr>
                  <tr><td rowspan="5"><strong>Diploma (Lateral)</strong></td><td>Civil Engineering</td><td>09</td><td>4 Sem</td><td rowspan="5" style="vertical-align:middle;">Passed 10+2 with Physics &amp; Chemistry + Math/Bio OR 10+2 ITI 2yrs.</td></tr>
                  <tr><td>Mechanical Engineering</td><td>09</td><td>4 Sem</td></tr>
                  <tr><td>Electrical Engineering</td><td>06</td><td>4 Sem</td></tr>
                  <tr><td>Electronics &amp; Telecomm.</td><td>03</td><td>4 Sem</td></tr>
                  <tr><td>Film Tech &amp; TV Production</td><td>03</td><td>4 Sem</td></tr>
                </tbody>
              </table>
            </div>
          </article>

          <!-- Ph.D. BLOCK -->
          <article class="eng-block-card">
            <div class="eng-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="eng-card-title">Doctor of Philosophy (Ph.D.) in Engineering</h2>
              <span class="eng-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="eng-card-body">
              <p style="font-size:15px;color:#475569;margin-bottom:20px;font-weight:600;">
                Doctoral research specializations offered as per UGC Norms:
              </p>
              <div class="phd-grid">
                <div class="phd-card-item"><div class="phd-card-title">Ph.D. - Mechanical Engg</div><div class="phd-card-rule">As per UGC Norms</div></div>
                <div class="phd-card-item"><div class="phd-card-title">Ph.D. - Computer Science Engg</div><div class="phd-card-rule">As per UGC Norms</div></div>
                <div class="phd-card-item"><div class="phd-card-title">Ph.D. - Electrical Engg</div><div class="phd-card-rule">As per UGC Norms</div></div>
                <div class="phd-card-item"><div class="phd-card-title">Ph.D. - Electronics &amp; Comm</div><div class="phd-card-rule">As per UGC Norms</div></div>
                <div class="phd-card-item"><div class="phd-card-title">Ph.D. - Civil Engg</div><div class="phd-card-rule">As per UGC Norms</div></div>
              </div>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Faculties</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link active">Faculty of Engineering <span>→</span></a></li>
              <li><a href="Commerce.php" class="sidebar-link">Faculty of Commerce <span>→</span></a></li>
              <li><a href="Science.php" class="sidebar-link">Faculty of Science <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
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
