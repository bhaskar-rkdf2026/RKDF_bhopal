<?php
// ============================================================
// RKDF University — Faculty of Management
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & AICTE EOA Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'management';

$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ACADEMIC · MANAGEMENT';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Faculty of Management Studies';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Shaping future corporate leaders, entrepreneurs, and business managers through industry-aligned MBA & BBA programs.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-students-quad.jpg';

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

    .mgmt-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .mgmt-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .mgmt-grid-layout { grid-template-columns: 1fr; }
    }

    .mgmt-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .mgmt-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .mgmt-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .mgmt-badge {
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

    .mgmt-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .mgmt-card-body {
      padding: 32px 36px;
    }

    .mgmt-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .mgmt-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .mgmt-block-card:hover .mgmt-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .mgmt-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
    }
    .mgmt-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 16px 20px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .mgmt-table td {
      padding: 16px 20px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14.5px;
      color: #334155;
    }
    .mgmt-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .mgmt-pdf-link {
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
    .mgmt-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">22 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Management</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Developing global business leaders, executive managers, and entrepreneurs through AICTE approved MBA, BBA, and Ph.D. programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="mgmt-main-section">
    <div class="rk-container">
      <div class="mgmt-grid-layout">
        
        <!-- LEFT COLUMN: MANAGEMENT COURSES & INSTITUTES -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="mgmt-block-card">
            <div class="mgmt-card-header">
              <h2 class="mgmt-card-title">Management Programs &amp; Constituent Institutes</h2>
              <span class="mgmt-badge">AICTE APPROVED</span>
            </div>
            <div class="mgmt-card-body">
              
              <div class="mgmt-media-frame">
                <img src="images/ai_management/rkdf_mgmt_card.jpg" alt="RKDF Faculty of Management Boardroom" class="mgmt-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Academic Excellence in Business Leadership
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Management at RKDF University Bhopal offers comprehensive undergraduate, postgraduate, and doctoral degree programs designed to instill strategic thinking, corporate governance, financial acumen, and leadership capabilities across business sectors.
              </p>

              <!-- INSTITUTE 1: VEDICA INSTITUTE OF TECHNOLOGY -->
              <div style="margin-top:28px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:12px;">
                  <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                    Vedica Institute of Technology
                  </h3>
                  <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/VIT%20EOA%20Report%202022-23.pdf" target="_blank" class="mgmt-pdf-link">📄 AICTE EOA Report ↗</a>
                </div>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Courses</th>
                      <th>Sem / Duration</th>
                      <th>Intake Seats</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>MBA</strong></td>
                      <td>4 Sem</td>
                      <td>120</td>
                      <td>Any Passed Graduate with 50% and 45% in Case of Reserve Category.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- INSTITUTE 2: SRI SATYA SAI COLLEGE OF ENGINEERING -->
              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:12px;">
                  <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                    Sri Satya Sai College of Engineering
                  </h3>
                  <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/SSSCE%20EOA%20Report%202022-23.PDF" target="_blank" class="mgmt-pdf-link">📄 AICTE EOA Report ↗</a>
                </div>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Courses</th>
                      <th>Sem / Duration</th>
                      <th>Intake Seats</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>MBA</strong></td>
                      <td>4 Sem</td>
                      <td>120</td>
                      <td>Any Passed Graduate with 50% and 45% in Case of Reserve Category.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- INSTITUTE 3: RKDF COLLEGE OF TECHNOLOGY & RESEARCH -->
              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:12px;">
                  <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                    RKDF College of Technology &amp; Research
                  </h3>
                  <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/RKDF-CTR%20EOA%20Report%202022-23.pdf" target="_blank" class="mgmt-pdf-link">📄 AICTE EOA Report ↗</a>
                </div>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Courses</th>
                      <th>Sem / Duration</th>
                      <th>Intake Seats</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>MBA</strong></td>
                      <td>4 Sem</td>
                      <td>60</td>
                      <td>Any Passed Graduate with 50% and 45% in Case of Reserve Category.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- INSTITUTE 4: BHABHA COLLEGE OF ENGINEERING -->
              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:12px;">
                  <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                    Bhabha College of Engineering
                  </h3>
                  <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/BCE%20EOA%20Report%202022-23.PDF" target="_blank" class="mgmt-pdf-link">📄 AICTE EOA Report ↗</a>
                </div>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Courses</th>
                      <th>Sem / Duration</th>
                      <th>Intake Seats</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>MBA</strong></td>
                      <td>4 Sem</td>
                      <td>60</td>
                      <td>Any Passed Graduate with 50% and 45% in Case of Reserve Category.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- INSTITUTE 5: FACULTY OF MANAGEMENT, BHOPAL (BBA) -->
              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin-bottom:12px;">
                  Faculty of Management, Bhopal
                </h3>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Courses</th>
                      <th>Sem / Duration</th>
                      <th>Intake Seats</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>BBA</strong></td>
                      <td>6 Sem</td>
                      <td>120</td>
                      <td>Passed 10+2 or equivalent examination in any subjects.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- PROGRAM 6: DOCTOR OF PHILOSOPHY (Ph.D) -->
              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin-bottom:12px;">
                  Doctor of Philosophy (Ph.D)
                </h3>
                <table class="mgmt-table">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Eligibility Criteria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Ph.D. - Management</strong></td>
                      <td>As per UGC Norms.</td>
                    </tr>
                  </tbody>
                </table>
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
              <li><a href="Management.php" class="sidebar-link active">Faculty of Management <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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
