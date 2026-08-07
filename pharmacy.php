<?php
// ============================================================
// RKDF University — Faculty of Pharmacy
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & PCI Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'pharmacy';

$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ACADEMIC · PHARMACY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Faculty of Pharmaceutical Sciences';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'PCI approved B.Pharm, M.Pharm & Pharm.D programs driving pharmaceutical research and healthcare delivery.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-research.jpg';

$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
$itemStmt->execute([$pageSlug]);
$allItems = $itemStmt->fetchAll();
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

    .pharm-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .pharm-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .pharm-grid-layout { grid-template-columns: 1fr; }
    }

    .pharm-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .pharm-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .pharm-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .pharm-badge {
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

    .pharm-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .pharm-card-body {
      padding: 32px 36px;
    }

    .pharm-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .pharm-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .pharm-block-card:hover .pharm-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .pharm-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .pharm-table th {
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
    .pharm-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .pharm-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .pharm-pdf-link {
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
    .pharm-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">26 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Pharmacy</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Excellence in pharmaceutical research, clinical pharmacy, drug discovery, and healthcare across 6 PCI approved constituent pharmacy colleges.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="pharm-main-section">
    <div class="rk-container">
      <div class="pharm-grid-layout">
        
        <!-- LEFT COLUMN: PHARMACY INSTITUTES & COURSES -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="pharm-block-card">
            <div class="pharm-card-header">
              <h2 class="pharm-card-title">Constituent Pharmacy Colleges</h2>
              <span class="pharm-badge">PCI APPROVED</span>
            </div>
            <div class="pharm-card-body">
              
              <div class="pharm-media-frame">
                <img src="images/ai_pharmacy/rkdf_pharmacy_lab.jpg" alt="RKDF Faculty of Pharmacy Research Lab" class="pharm-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Pharmaceutical Sciences &amp; Clinical Research
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Pharmacy at RKDF University Bhopal comprises 6 PCI-approved colleges offering D.Pharm, B.Pharm, B.Pharm (Lateral), B.Pharm (Practice), M.Pharm, and Ph.D. degree programs backed by advanced research laboratories and formulation units.
              </p>

              <!-- INSTITUTE 1: VEDICA COLLEGE OF B.PHARMACY -->
              <div class="inst-header-box" style="margin-top:0;padding-top:0;border-top:none;">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Vedica College of B.Pharmacy
                </h3>
                <a href="approval/PCI/2022/VCP%20PCI%20Decision%20Letter%202023-24.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr>
                    <th>Courses</th>
                    <th>Seats / Intake</th>
                    <th>Duration</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td><strong>Bachelor of Pharmacy (B.Pharm)</strong></td><td>60</td><td>8 Sem</td><td>Passed 10+2 examination with Physics &amp; Chemistry as compulsory subjects along with Mathematics/Biology.</td></tr>
                  <tr><td><strong>B.Pharm (Lateral)</strong></td><td>06</td><td>6 Sem</td><td>Passed Diploma (D.Pharm) examination with at least 45% marks (40% for reserved category).</td></tr>
                  <tr><td><strong>M.Pharm - Regulatory Affairs</strong></td><td>09</td><td>4 Sem</td><td rowspan="4" style="vertical-align:middle;">Passed Bachelor Degree in Pharmacy (B.Pharm). Obtained at least 55% marks (50% for reserved category).</td></tr>
                  <tr><td><strong>M.Pharm - Pharmaceutics</strong></td><td>15</td><td>4 Sem</td></tr>
                  <tr><td><strong>M.Pharm - Pharmacology</strong></td><td>15</td><td>4 Sem</td></tr>
                  <tr><td><strong>M.Pharm - Pharmacognosy</strong></td><td>15</td><td>4 Sem</td></tr>
                  <tr><td><strong>B.Pharm (Practice)</strong></td><td>40</td><td>2 Years</td><td>Passed D.Pharm from PCI recognized Institution + Employer certificate &amp; NOC practicing for at least 4 yrs.</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 2: SRI SATYA SAI INSTITUTE OF PHARMACY POLYTECHNIC -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Sri Satya Sai Institute of Pharmacy Polytechnic
                </h3>
                <a href="approval/PCI/2022/SSSIP%20PCI.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr><th>Courses</th><th>Seats / Intake</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Diploma in Pharmacy (D.Pharm)</strong></td><td>60</td><td>2 Years</td><td>Passed 10+2 examination with Physics and Chemistry as compulsory subjects along with Mathematics/Biology.</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 3: VEDICA COLLEGE OF PHARMACY (POLYTECHNIC) -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Vedica College of Pharmacy (Polytechnic)
                </h3>
                <a href="approval/PCI/2022/VCPP%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr><th>Courses</th><th>Seats / Intake</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Diploma in Pharmacy (D.Pharm)</strong></td><td>60</td><td>2 Years</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>Bachelor of Pharmacy (B.Pharm)</strong></td><td>60</td><td>8 Sem</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>B.Pharm (Lateral)</strong></td><td>06</td><td>6 Sem</td><td>Passed D.Pharm with min 45% marks (40% reserved).</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 4: SRI SATHYA SAI INSTITUTE OF PHARMACEUTICAL SCIENCES -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Sri Sathya Sai Institute of Pharmaceutical Sciences
                </h3>
                <a href="approval/PCI/2022/SSSIPS%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr><th>Courses</th><th>Seats / Intake</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Diploma in Pharmacy (D.Pharm)</strong></td><td>60</td><td>2 Years</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>Bachelor of Pharmacy (B.Pharm)</strong></td><td>60</td><td>8 Sem</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>B.Pharm (Lateral)</strong></td><td>06</td><td>6 Sem</td><td>Passed D.Pharm with min 45% marks (40% reserved).</td></tr>
                  <tr><td><strong>M.Pharm - Pharmaceutics</strong></td><td>15</td><td>4 Sem</td><td rowspan="2">Passed B.Pharm with at least 55% marks (50% reserved).</td></tr>
                  <tr><td><strong>M.Pharm - Pharmacology</strong></td><td>15</td><td>4 Sem</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 5: DR. SATYENDRA KUMAR MEMORIAL COLLEGE OF PHARMACY -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Dr. Satyendra Kumar Memorial College of Pharmacy
                </h3>
                <a href="approval/PCI/2022/DSKMCOP%20Decision%20Letter%202022-23.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr><th>Courses</th><th>Seats / Intake</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Bachelor of Pharmacy (B.Pharm)</strong></td><td>60</td><td>8 Sem</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>B.Pharm (Lateral)</strong></td><td>06</td><td>6 Sem</td><td>Passed D.Pharm with min 45% marks (40% reserved).</td></tr>
                </tbody>
              </table>

              <!-- INSTITUTE 6: DEPARTMENT OF PHARMACY -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Department of Pharmacy
                </h3>
                <a href="approval/PCI/2022/DOP%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pharm-pdf-link">📄 PCI Approval Letter ↗</a>
              </div>
              <table class="pharm-table">
                <thead>
                  <tr><th>Courses</th><th>Seats / Intake</th><th>Duration</th><th>Eligibility Criteria</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Diploma in Pharmacy (D.Pharm)</strong></td><td>60</td><td>2 Years</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>Bachelor of Pharmacy (B.Pharm)</strong></td><td>60</td><td>8 Sem</td><td>Passed 10+2 with Physics &amp; Chemistry + Math/Biology.</td></tr>
                  <tr><td><strong>B.Pharm (Lateral)</strong></td><td>06</td><td>6 Sem</td><td>Passed D.Pharm with min 45% marks (40% reserved).</td></tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. PHARMACY BLOCK -->
          <article class="pharm-block-card">
            <div class="pharm-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="pharm-card-title">Doctor of Philosophy (Ph.D) in Pharmacy</h2>
              <span class="pharm-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="pharm-card-body">
              <table class="pharm-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ph.D. - Pharmaceutical Sciences</strong></td>
                    <td>As per UGC Norms.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Faculties</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="pharmacy.php" class="sidebar-link active">Faculty of Pharmacy <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
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
