<?php
// ============================================================
// RKDF University — Faculty of Ayurveda (BAMS) Syllabus
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
  <title>Ayurveda (B.A.M.S.) Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_bams/rkdf_syll_bams_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sbams-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sbams-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sbams-grid-layout { grid-template-columns: 1fr; }
    }

    .sbams-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sbams-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sbams-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sbams-badge {
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

    .sbams-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sbams-card-body {
      padding: 32px 36px;
    }

    .sbams-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sbams-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sbams-block-card:hover .sbams-media-img {
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
    .sbams-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .sbams-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .sbams-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sbams-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .sbams-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .sbams-pdf-link {
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
    .sbams-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">50 · AYURVEDA (BAMS) SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Ayurveda (B.A.M.S.) Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Professional year course syllabi for B.A.M.S. approved by National Commission for Indian System of Medicine (NCISM) &amp; CCH.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sbams-main-section">
    <div class="rk-container">
      <div class="sbams-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="sbams-block-card">
            <div class="sbams-card-header">
              <h2 class="sbams-card-title">B.A.M.S. Professional Syllabi</h2>
              <span class="sbams-badge">NCISM APPROVED</span>
            </div>
            <div class="sbams-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="sbams-media-frame">
                <img src="images/ai_syllabus_bams/rkdf_syll_bams_card.jpg" alt="RKDF Ayurvedic Hospital &amp; Herbal Medicine Research Facility" class="sbams-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Ayurvedacharya (B.A.M.S.) Professional Year Modules
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF course syllabi for B.A.M.S., covering Samhita Adhyayan, Kriya Sharir (Physiology), Padartha Vijnanam (Fundamental Principles), Rachana Sharira (Anatomy), and Samskritam Evam Ayurved Itihas.
              </p>

              <!-- DOWNLOAD ROWS -->
              <div class="sbams-download-list">

                <div class="sbams-download-row">
                  <div class="sbams-row-info">
                    <span style="font-size:22px;">📜</span>
                    <span class="sbams-row-title">SAMHITA ADHYAYAN - 1</span>
                  </div>
                  <a href="syllabus/Ayurveda/Ay%20UG-Samhita.pdf" target="_blank" class="sbams-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sbams-download-row">
                  <div class="sbams-row-info">
                    <span style="font-size:22px;">🩺</span>
                    <span class="sbams-row-title">KRIYA SHARIR</span>
                  </div>
                  <a href="syllabus/Ayurveda/Kriya%20Sharir.pdf" target="_blank" class="sbams-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sbams-download-row">
                  <div class="sbams-row-info">
                    <span style="font-size:22px;">🌱</span>
                    <span class="sbams-row-title">PADARTHA VIJNANAM</span>
                  </div>
                  <a href="syllabus/Ayurveda/Padarth%20Vijnanam.pdf" target="_blank" class="sbams-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sbams-download-row">
                  <div class="sbams-row-info">
                    <span style="font-size:22px;">🩻</span>
                    <span class="sbams-row-title">RACHANA SHARIRA</span>
                  </div>
                  <a href="syllabus/Ayurveda/DMLT.pdf" target="_blank" class="sbams-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sbams-download-row">
                  <div class="sbams-row-info">
                    <span style="font-size:22px;">🏛️</span>
                    <span class="sbams-row-title">SAMSKRITAM EVAM AYURVED ITIHAS</span>
                  </div>
                  <a href="syllabus/Ayurveda/Sanskrit%20&amp;%20Ayurved%20Itihas.pdf" target="_blank" class="sbams-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Ayurveda Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="BAMS.php" class="sidebar-link">Faculty of Ayurveda (BAMS) <span>→</span></a></li>
              <li><a href="syllabusBAMS.php" class="sidebar-link active">BAMS Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabi <span>→</span></a></li>
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
