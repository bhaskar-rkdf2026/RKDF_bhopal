<?php
// ============================================================
// RKDF University — Faculty of Paramedical Sciences Syllabus
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
  <title>Faculty of Paramedical Sciences Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_paramedical/rkdf_syll_para_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .spara-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .spara-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .spara-grid-layout { grid-template-columns: 1fr; }
    }

    .spara-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .spara-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .spara-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .spara-badge {
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

    .spara-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .spara-card-body {
      padding: 32px 36px;
    }

    .spara-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .spara-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .spara-block-card:hover .spara-media-img {
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

    /* Syllabus Download Rows */
    .spara-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .spara-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .spara-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .spara-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .spara-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .spara-pdf-link {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 8px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .spara-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">59 · FACULTY OF PARAMEDICAL SCIENCES SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Paramedical Sciences Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and degree/diploma course Syllabus for BMLT, BPT, DMLT, X-Ray Radiography, and D.Pharm (Homoeopathy) approved by MP Paramedical Council.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="spara-main-section">
    <div class="rk-container">
      <div class="spara-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="spara-block-card">
            <div class="spara-card-header">
              <h2 class="spara-card-title">Paramedical Degree &amp; Diploma Syllabus</h2>
              <span class="spara-badge">MP PARAMEDICAL COUNCIL</span>
            </div>
            <div class="spara-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="spara-media-frame">
                <img src="images/ai_syllabus_paramedical/rkdf_syll_para_card.jpg" alt="RKDF Paramedical &amp; Clinical Diagnostics Center" class="spara-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Clinical Allied Health &amp; Diagnostic Modules
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF course Syllabus for Paramedical programs including Bachelor of Medical Laboratory Technology (BMLT), Bachelor of Physiotherapy (BPT), Diploma in Medical Laboratory Technology (DMLT), X-Ray Radiography, and D.Pharm (Homoeopathy).
              </p>

              <!-- DOWNLOAD ROWS -->
              <div class="spara-download-list">

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">🔬</span>
                    <span class="spara-row-title">BMLT SESSION 2022-23 &amp; ONWARDS</span>
                  </div>
                  <a href="syllabus/BMLT%202022-23.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">🧪</span>
                    <span class="spara-row-title">BMLT OLD SCHEME</span>
                  </div>
                  <a href="syllabus/BMLT.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">🩺</span>
                    <span class="spara-row-title">BPT SESSION 2022-23 &amp; ONWARDS</span>
                  </div>
                  <a href="syllabus/BPT%202022-23.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">⚕️</span>
                    <span class="spara-row-title">BPT OLD SCHEME</span>
                  </div>
                  <a href="syllabus/BPTh.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">🧪</span>
                    <span class="spara-row-title">DMLT SESSION 2022-23 &amp; ONWARDS</span>
                  </div>
                  <a href="syllabus/DMLT%202022-23.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">🩻</span>
                    <span class="spara-row-title">X-RAY RADIOGRAPHER DIPLOMA</span>
                  </div>
                  <a href="syllabus/X-RAY.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="spara-download-row">
                  <div class="spara-row-info">
                    <span style="font-size:22px;">💊</span>
                    <span class="spara-row-title">DIPLOMA IN PHARMACY (HOMOEOPATHY) - DPH</span>
                  </div>
                  <a href="syllabus/DPH.pdf" target="_blank" class="spara-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Paramedical Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="paramdical.php" class="sidebar-link">Faculty of Paramedical Sciences <span>→</span></a></li>
              <li><a href="syllabusparamedical.php" class="sidebar-link active">Paramedical Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabus <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabus <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
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
