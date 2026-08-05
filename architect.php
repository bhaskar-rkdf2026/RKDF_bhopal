<?php
// ============================================================
// RKDF University — Faculty of Architecture
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & COA Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Architecture — RKDF University Bhopal</title>
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
                  url('images/ai_architecture/rkdf_arch_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .arch-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .arch-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .arch-grid-layout { grid-template-columns: 1fr; }
    }

    .arch-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .arch-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .arch-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .arch-badge {
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

    .arch-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .arch-card-body {
      padding: 32px 36px;
    }

    .arch-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .arch-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .arch-block-card:hover .arch-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .arch-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .arch-table th {
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
    .arch-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .arch-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .arch-pdf-link {
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
    .arch-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">31 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Architecture</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Inspiring creative architects, urban designers, and sustainable spatial planners through Council of Architecture (COA) approved B.Arch. and M.Arch. programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="arch-main-section">
    <div class="rk-container">
      <div class="arch-grid-layout">
        
        <!-- LEFT COLUMN: ARCHITECTURE PROGRAMS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="arch-block-card">
            <div class="arch-card-header">
              <h2 class="arch-card-title">Architectural Degree Programs</h2>
              <span class="arch-badge">COA &amp; NATA APPROVED</span>
            </div>
            <div class="arch-card-body">
              
              <div class="arch-media-frame">
                <img src="images/ai_architecture/rkdf_arch_card.jpg" alt="RKDF Architecture Studio &amp; Design Lab" class="arch-media-img">
              </div>

              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:14px;">
                <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;font-weight:700;">
                  Council of Architecture (COA) Approved School
                </div>
                <a href="https://rkdf.ac.in/approval/COA_2022-23.pdf" target="_blank" class="arch-pdf-link">📄 COA &amp; NATA Approval Letter ↗</a>
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Architecture at RKDF University Bhopal is an official COA and NATA Test Center offering professional B.Arch. and M.Arch. degrees that integrate sustainable building design, architectural drafting, structural engineering, urban planning, and smart city modeling.
              </p>

              <!-- DEGREE PROGRAMS TABLE -->
              <table class="arch-table">
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
                    <td><strong>Bachelor of Architecture (B.Arch)</strong></td>
                    <td>10 Sem</td>
                    <td>30</td>
                    <td>
                      Qualified through recognized aptitude test in NATA or JEE and obtained at least 50% (45% for reserved category) in 10+2.<br>
                      <strong style="color:#E31B23;">OR</strong><br>
                      Equivalent examination &amp; 50% aggregate in PCM also.<br>
                      <strong style="color:#E31B23;">OR</strong><br>
                      Passed 10+3 Diploma examination with Mathematics subject with at least 50% (45% for reserved category).
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Master of Architecture (M.Arch)</strong></td>
                    <td>2 Years</td>
                    <td>20</td>
                    <td>Passed B.Arch at least 50% for UR category and 45% for Reserved category.</td>
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
              <li><a href="architect.php" class="sidebar-link active">Faculty of Architecture <span>→</span></a></li>
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
