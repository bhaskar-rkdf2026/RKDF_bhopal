<?php
// ============================================================
// RKDF University — Ph.D. Admission Notification & Entrance Exam 2026
// World-Class Premium Design + High-Res Media Assets + 100% Original Document & PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ph.D. Admission Notification &amp; Entrance Exam 2026 — RKDF University Bhopal</title>
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
                  url('images/ai_phd_entrance/rkdf_phdent_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sphdent-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sphdent-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sphdent-grid-layout { grid-template-columns: 1fr; }
    }

    .sphdent-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sphdent-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sphdent-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .sphdent-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.15);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .sphdent-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sphdent-card-body {
      padding: 32px 36px;
    }

    .sphdent-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sphdent-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sphdent-block-card:hover .sphdent-media-img {
      transform: scale(1.04);
    }

    /* Notification Download Rows */
    .sphdent-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
      margin-top: 24px;
    }

    .sphdent-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      transition: all 0.25s ease;
    }
    .sphdent-download-row:hover {
      background: #ffffff;
      border-color: #E31B23;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sphdent-row-left {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .sphdent-new-pill {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 6px;
      background: #E31B23;
      color: #ffffff;
    }

    .sphdent-row-title {
      font-size: 15.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .sphdent-pdf-btn {
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
    .sphdent-pdf-btn:hover {
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
      <span class="rk-eyebrow tone-gold">76 · DOCTOR OF PHILOSOPHY (PH.D) ADMISSION CELL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Ph.D. Admissions &amp; Entrance 2026</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official admission notifications, research information brochure, entrance examination registration forms, and eligibility guidelines.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sphdent-main-section">
    <div class="rk-container">
      <div class="sphdent-grid-layout">
        
        <!-- LEFT COLUMN: ADMISSION NOTICES & DOWNLOADS -->
        <div>

          <article class="sphdent-block-card">
            <div class="sphdent-card-header">
              <h2 class="sphdent-card-title">Ph.D. Admission Notification — 2026 Session</h2>
              <span class="sphdent-badge">OFFICIAL ADMISSION CELL</span>
            </div>
            <div class="sphdent-card-body">

              <div class="sphdent-media-frame">
                <img src="images/ai_phd_entrance/rkdf_phdent_card.jpg" alt="RKDF Research Scholars &amp; Central Library Examination Center" class="sphdent-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Doctoral Entrance Examination Documents &amp; Registration
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download the official Ph.D. Admission Notification (Revised), Research Information Brochure 2026, and Entrance Examination Application Form below:
              </p>

              <!-- DOWNLOAD LIST -->
              <div class="sphdent-download-list">

                <div class="sphdent-download-row">
                  <div class="sphdent-row-left">
                    <span class="sphdent-new-pill">NEW</span>
                    <span class="sphdent-row-title">Ph.D. Admission Notification — 2026 (Revised)</span>
                  </div>
                  <a href="Ph.D/PhD_Ent_2026/Notification%20Ph%20D%202026.jpg" target="_blank" class="sphdent-pdf-link">📄 Download Notice ↗</a>
                </div>

                <div class="sphdent-download-row">
                  <div class="sphdent-row-left">
                    <span class="sphdent-new-pill">NEW</span>
                    <span class="sphdent-row-title">Ph.D. Information Brochure — 2026</span>
                  </div>
                  <a href="Ph.D/PhD_Ent_2026/Information%20Brochure_2026.pdf" target="_blank" class="sphdent-pdf-link">📄 Download Brochure ↗</a>
                </div>

                <div class="sphdent-download-row">
                  <div class="sphdent-row-left">
                    <span class="sphdent-new-pill">NEW</span>
                    <span class="sphdent-row-title">Ph.D. Entrance Application Form — 2026</span>
                  </div>
                  <a href="Ph.D/PhD_Ent_2026/Ph.D%20Entrance%20Application%20Form%202026.pdf" target="_blank" class="sphdent-pdf-link">📄 Download Form ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Doctoral Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="phd_entrance.php" class="sidebar-link active">Ph.D. Admissions 2026 <span>→</span></a></li>
              <li><a href="phdsubjects.php" class="sidebar-link">Ph.D. Research Subjects <span>→</span></a></li>
              <li><a href="syllabusPhD.php" class="sidebar-link">Ph.D. Coursework Syllabus <span>→</span></a></li>
              <li><a href="patent.php" class="sidebar-link">Patents &amp; Innovations <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="Annual_Report_University.php" class="sidebar-link">Annual Reports <span>→</span></a></li>
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
