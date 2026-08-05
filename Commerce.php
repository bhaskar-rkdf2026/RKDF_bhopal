<?php
// ============================================================
// RKDF University — Faculty of Commerce
// World-Class Premium Design + High-Res Media Assets + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Commerce — RKDF University Bhopal</title>
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
                  url('images/ai_commerce/rkdf_commerce_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .com-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .com-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .com-grid-layout { grid-template-columns: 1fr; }
    }

    .com-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .com-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .com-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .com-badge {
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

    .com-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .com-card-body {
      padding: 32px 36px;
    }

    .com-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .com-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .com-block-card:hover .com-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .com-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
    }
    .com-table th {
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
    .com-table td {
      padding: 16px 20px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14.5px;
      color: #334155;
    }
    .com-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
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
      <span class="rk-eyebrow tone-gold">24 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Commerce</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering future financial experts, chartered accountants, taxation specialists, and corporate analysts with career-ready commerce education.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="com-main-section">
    <div class="rk-container">
      <div class="com-grid-layout">
        
        <!-- LEFT COLUMN: COMMERCE COURSES -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="com-block-card">
            <div class="com-card-header">
              <h2 class="com-card-title">Commerce Degree Programs</h2>
              <span class="com-badge">UGC RECOGNIZED</span>
            </div>
            <div class="com-card-body">
              
              <div class="com-media-frame">
                <img src="images/ai_commerce/rkdf_commerce_card.jpg" alt="RKDF Faculty of Commerce Lecture Hall" class="com-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Undergraduate &amp; Postgraduate Programs
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Commerce at RKDF University Bhopal prepares students for leadership in global trade, banking, financial management, corporate auditing, e-commerce, and business taxation through accredited B.Com. and M.Com. programs.
              </p>

              <!-- DEGREE PROGRAMS TABLE -->
              <table class="com-table">
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
                    <td><strong>B.COM.</strong></td>
                    <td>6 Sem</td>
                    <td>120</td>
                    <td rowspan="3" style="vertical-align:middle;">Passed 10+2 or equivalent examination in science or commerce subjects</td>
                  </tr>
                  <tr>
                    <td><strong>B.COM (CS)</strong></td>
                    <td>6 Sem</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td><strong>B.COM (Hons.)</strong></td>
                    <td>6 Sem</td>
                    <td>60</td>
                  </tr>
                  <tr>
                    <td><strong>M.COM.</strong></td>
                    <td>4 Sem</td>
                    <td>20</td>
                    <td>Passed Bachelor Degree with commerce of 3yrs minimum or equivalent in relevant subjects from recognized University by UGC/ AIU.</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. BLOCK -->
          <article class="com-block-card">
            <div class="com-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="com-card-title">Doctor of Philosophy (Ph.D)</h2>
              <span class="com-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="com-card-body">
              
              <table class="com-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ph.D. - Commerce</strong></td>
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
              <li><a href="Commerce.php" class="sidebar-link active">Faculty of Commerce <span>→</span></a></li>
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
