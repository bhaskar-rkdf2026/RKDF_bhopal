<?php
// ============================================================
// RKDF University — Master of Technology (M.Tech) Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original Course PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master of Technology (M.Tech) Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_mtech/rkdf_syll_mtech_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .smt-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .smt-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .smt-grid-layout { grid-template-columns: 1fr; }
    }

    .smt-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .smt-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .smt-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .smt-badge {
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

    .smt-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .smt-card-body {
      padding: 32px 36px;
    }

    .smt-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .smt-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .smt-block-card:hover .smt-media-img {
      transform: scale(1.04);
    }

    /* Program Dropdown Selector */
    .prog-filter-bar {
      display: flex;
      gap: 16px;
      align-items: center;
      margin-bottom: 28px;
      background: #FAF9F5;
      padding: 18px 24px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.07);
    }
    @media (max-width: 600px) {
      .prog-filter-bar { flex-direction: column; align-items: stretch; }
    }

    .prog-select {
      flex: 1;
      padding: 12px 18px;
      border-radius: 10px;
      border: 1px solid rgba(12, 20, 36, 0.15);
      background: #ffffff;
      font-size: 14.5px;
      color: #0C1424;
      font-weight: 600;
      outline: none;
    }

    /* Download Rows & Table */
    .smt-download-list {
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-bottom: 32px;
    }

    .smt-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 22px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .smt-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .smt-row-title {
      font-size: 15px;
      font-weight: 700;
      color: #0C1424;
    }

    .smt-pdf-btn {
      font-size: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      display: inline-block;
      white-space: nowrap;
    }
    .smt-pdf-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    .smt-scheme-btn {
      color: #C5A059;
      background: rgba(197, 160, 89, 0.12);
      border-color: rgba(197, 160, 89, 0.3);
      margin-right: 8px;
    }
    .smt-scheme-btn:hover {
      background: #C5A059;
      color: #0C1424 !important;
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
      <span class="rk-eyebrow tone-gold">58 · FACULTY OF ENGINEERING (M.TECH) SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Master of Technology (M.Tech) Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and 2-year postgraduate course syllabi (Semesters 1 to 4) for M.Tech across 9 specialized engineering disciplines approved by AICTE.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="smt-main-section">
    <div class="rk-container">
      <div class="smt-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="smt-block-card">
            <div class="smt-card-header">
              <h2 class="smt-card-title">M.Tech Specialization Syllabi</h2>
              <span class="smt-badge">AICTE COMPLIANT</span>
            </div>
            <div class="smt-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="smt-media-frame">
                <img src="images/ai_syllabus_mtech/rkdf_syll_mtech_card.jpg" alt="RKDF Postgraduate Engineering Research &amp; Prototyping Laboratory" class="smt-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                M.Tech 1st to 2nd Year (Semesters 1 to 4 All)
              </div>

              <!-- DOWNLOAD ROWS LIST -->
              <div class="smt-download-list">

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Computer Science &amp; Engineering)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech.%20Computer%20Science%20&amp;%20Engg.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Digital Communication)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech.%20Digital%20Communication.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Power Electronics)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech.%20Power%20Electronics.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Power System)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech.%20Power%20System.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (VLSI Design)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech.%20VLSI.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Thermal Engineering)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech%20Thremal.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">M.Tech (Production &amp; Industrial Engineering - PI)</span>
                  <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech_PI.pdf" target="_blank" class="smt-pdf-btn">📄 Download PDF ↗</a>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">Construction Technology &amp; Management (CTM)</span>
                  <div>
                    <a href="syllabus/Technical%20syllabus/M.Tech/M.Tech_PI.pdf" target="_blank" class="smt-pdf-btn smt-scheme-btn">📊 Scheme ↗</a>
                    <a href="syllabus/Technical%20syllabus/M.Tech/ctm/M%20TECH%20-CTM_Syllabus%20_1sem.pdf" target="_blank" class="smt-pdf-btn">📄 Syllabus ↗</a>
                  </div>
                </div>

                <div class="smt-download-row">
                  <span class="smt-row-title">Structural Engineering (SE)</span>
                  <div>
                    <a href="syllabus/Technical%20syllabus/M.Tech/structure/MT_Structure_engg_Scheme.pdf" target="_blank" class="smt-pdf-btn smt-scheme-btn">📊 Scheme ↗</a>
                    <a href="syllabus/Technical%20syllabus/M.Tech/structure/M%20TECH%20-%20Structure%20Engineering%20Syllabus.pdf" target="_blank" class="smt-pdf-btn">📄 Syllabus ↗</a>
                  </div>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Engineering Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="syllabusBe.php" class="sidebar-link">B.E. / B.Tech Syllabus <span>→</span></a></li>
              <li><a href="syllabusMtech.php" class="sidebar-link active">M.Tech Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabi <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
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
