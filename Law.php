<?php
// ============================================================
// RKDF University — Faculty of Law
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & BCI Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Law — RKDF University Bhopal</title>
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
                  url('images/ai_law/rkdf_law_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .law-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .law-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .law-grid-layout { grid-template-columns: 1fr; }
    }

    .law-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .law-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .law-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .law-badge {
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

    .law-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .law-card-body {
      padding: 32px 36px;
    }

    .law-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .law-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .law-block-card:hover .law-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .law-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .law-table th {
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
    .law-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .law-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .law-pdf-link {
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
    .law-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">32 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Law</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Nurturing ethical advocates, judicial scholars, and corporate legal strategists through Bar Council of India (BCI) approved BA LL.B., LL.B., LL.M., and Ph.D. programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="law-main-section">
    <div class="rk-container">
      <div class="law-grid-layout">
        
        <!-- LEFT COLUMN: LAW PROGRAMS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="law-block-card">
            <div class="law-card-header">
              <h2 class="law-card-title">Legal Studies &amp; Degree Programs</h2>
              <span class="law-badge">BCI APPROVED</span>
            </div>
            <div class="law-card-body">
              
              <div class="law-media-frame">
                <img src="images/ai_law/rkdf_law_card.jpg" alt="RKDF Faculty of Law Moot Court Room" class="law-media-img">
              </div>

              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:14px;">
                <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;font-weight:700;">
                  Bar Council of India (BCI) Approved Programs
                </div>
                <a href="https://rkdf.ac.in/approval/BCI_2022-23.pdf" target="_blank" class="law-pdf-link">📄 BCI Approval Letter ↗</a>
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Law at RKDF University Bhopal provides comprehensive legal education, moot court competitions, legal aid clinics, and internships under the guidelines of the Bar Council of India (BCI).
              </p>

              <!-- DEGREE PROGRAMS TABLE -->
              <table class="law-table">
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
                    <td><strong>BA LL.B. (Integrated)</strong></td>
                    <td>10 Sem</td>
                    <td>60</td>
                    <td>Passed in 10+2 or equivalent examination in any subjects with at least 45% (42% for OBC category and 40% for SC/ST). Maximum age limit 20 yr for General and 22 yrs for reserved Category).</td>
                  </tr>
                  <tr>
                    <td><strong>LL.B. (3-Year Degree)</strong></td>
                    <td>6 Sem</td>
                    <td>120</td>
                    <td>Passed in any Bachelor’s degree or an equivalent degree from a recognized University by UGC/AIU with at least 45% (42% for OBC category and 40% for SC/ST category).</td>
                  </tr>
                  <tr>
                    <td><strong>LL.M. (Master of Laws)</strong></td>
                    <td>2 Sem</td>
                    <td>60</td>
                    <td>Passed in Bachelor’s degree in Law from a recognized university by UGC/AIU with at least 50% for General and OBC Category (45% for SC/ST Category).</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. LAW BLOCK -->
          <article class="law-block-card">
            <div class="law-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="law-card-title">Doctor of Philosophy (Ph.D) in Law</h2>
              <span class="law-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="law-card-body">
              <table class="law-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ph.D. - Law</strong></td>
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
              <li><a href="Law.php" class="sidebar-link active">Faculty of Law <span>→</span></a></li>
              <li><a href="architect.php" class="sidebar-link">Faculty of Architecture <span>→</span></a></li>
              <li><a href="Agriculture.php" class="sidebar-link">Faculty of Agriculture <span>→</span></a></li>
              <li><a href="Social-Science.php" class="sidebar-link">Faculty of Social Science <span>→</span></a></li>
              <li><a href="Education.php" class="sidebar-link">Faculty of Education <span>→</span></a></li>
              <li><a href="Computer-Application.php" class="sidebar-link">Faculty of Computer App. <span>→</span></a></li>
              <li><a href="pharmacy.php" class="sidebar-link">Faculty of Pharmacy <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="Commerce.php" class="sidebar-link">Faculty of Commerce <span>→</span></a></li>
              <li><a href="Science.php" class="sidebar-link">Faculty of Science <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
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
