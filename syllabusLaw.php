<?php
// ============================================================
// RKDF University — Faculty of Law Syllabus
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
  <title>Faculty of Law Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_law/rkdf_syll_law_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .slaw-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .slaw-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .slaw-grid-layout { grid-template-columns: 1fr; }
    }

    .slaw-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .slaw-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .slaw-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .slaw-badge {
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

    .slaw-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .slaw-card-body {
      padding: 32px 36px;
    }

    .slaw-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .slaw-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .slaw-block-card:hover .slaw-media-img {
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
    .slaw-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .slaw-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .slaw-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .slaw-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .slaw-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .slaw-pdf-link {
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
    .slaw-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">55 · FACULTY OF LAW SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Law Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and semester-wise course syllabi for B.A. LL.B., LL.B., and LL.M. approved by Bar Council of India (BCI).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="slaw-main-section">
    <div class="rk-container">
      <div class="slaw-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="slaw-block-card">
            <div class="slaw-card-header">
              <h2 class="slaw-card-title">Legal Education Syllabi</h2>
              <span class="slaw-badge">BCI APPROVED</span>
            </div>
            <div class="slaw-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="slaw-media-frame">
                <img src="images/ai_syllabus_law/rkdf_syll_law_card.jpg" alt="RKDF Moot Court &amp; Legal Research Library" class="slaw-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                B.A. LL.B., LL.B. &amp; LL.M. Course Modules
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF course syllabi for Law programs, covering Constitutional Law, Criminal Procedure, Corporate Jurisprudence, Cyber Law, International Law, and Moot Court Advocacy.
              </p>

              <!-- DOWNLOAD ROWS -->
              <div class="slaw-download-list">

                <div class="slaw-download-row">
                  <div class="slaw-row-info">
                    <span style="font-size:22px;">⚖️</span>
                    <span class="slaw-row-title">LAW (B.A. LL.B.) 1st to 10th SEM ALL</span>
                  </div>
                  <a href="syllabus/Non%20Technical%20Syllabus/BALLB.pdf" target="_blank" class="slaw-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="slaw-download-row">
                  <div class="slaw-row-info">
                    <span style="font-size:22px;">📜</span>
                    <span class="slaw-row-title">LAW (B.A. LL.B.) - New Syllabus</span>
                  </div>
                  <a href="syllabus/Non%20Technical%20Syllabus/BALLB_New.pdf" target="_blank" class="slaw-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="slaw-download-row">
                  <div class="slaw-row-info">
                    <span style="font-size:22px;">📑</span>
                    <span class="slaw-row-title">LAW (LL.B.) - New Syllabus (1st to 6th SEM ALL)</span>
                  </div>
                  <a href="syllabus/Non%20Technical%20Syllabus/LLB_New.pdf" target="_blank" class="slaw-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="slaw-download-row">
                  <div class="slaw-row-info">
                    <span style="font-size:22px;">⚖️</span>
                    <span class="slaw-row-title">LAW (LL.B.) 1st to 6th SEM ALL</span>
                  </div>
                  <a href="syllabus/Non%20Technical%20Syllabus/LLB.pdf" target="_blank" class="slaw-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="slaw-download-row">
                  <div class="slaw-row-info">
                    <span style="font-size:22px;">🎓</span>
                    <span class="slaw-row-title">LAW (LL.M.) 1st to 2nd SEM ALL</span>
                  </div>
                  <a href="syllabus/Non%20Technical%20Syllabus/LLM%20ALL.pdf" target="_blank" class="slaw-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Law Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Law.php" class="sidebar-link">Faculty of Law <span>→</span></a></li>
              <li><a href="syllabusLaw.php" class="sidebar-link active">Law Syllabus <span>→</span></a></li>
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
