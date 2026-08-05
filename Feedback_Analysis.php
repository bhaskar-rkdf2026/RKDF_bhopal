<?php
// ============================================================
// RKDF University — Feedback Forms & Analysis Reports (IQAC)
// World-Class Premium Design + High-Res Media Assets + 100% Original Feedback PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Forms &amp; Analysis Reports — RKDF University Bhopal</title>
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
                  url('images/ai_feedback_analysis/rkdf_fb_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .fb-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .fb-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .fb-grid-layout { grid-template-columns: 1fr; }
    }

    .fb-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .fb-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .fb-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .fb-badge {
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

    .fb-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .fb-card-body {
      padding: 32px 36px;
    }

    .fb-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .fb-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .fb-block-card:hover .fb-media-img {
      transform: scale(1.04);
    }

    /* Feedback Item Download Row */
    .fb-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .fb-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .fb-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .fb-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .fb-row-icon {
      font-size: 22px;
    }
    .fb-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .fb-pdf-link {
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
    .fb-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">43 · STAKEHOLDER FEEDBACK &amp; IQAC</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Feedback Forms &amp; Analysis Reports</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Continuous academic quality enhancement through structured stakeholder feedback collection and analytical reporting under Internal Quality Assurance Cell (IQAC).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="fb-main-section">
    <div class="rk-container">
      <div class="fb-grid-layout">
        
        <!-- LEFT COLUMN: FEEDBACK FORMS & REPORTS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="fb-block-card">
            <div class="fb-card-header">
              <h2 class="fb-card-title">IQAC Stakeholder Feedback System</h2>
              <span class="fb-badge">NAAC CRITERIA 1.4</span>
            </div>
            <div class="fb-card-body">
              
              <div class="fb-media-frame">
                <img src="images/ai_feedback_analysis/rkdf_fb_card.jpg" alt="RKDF IQAC Academic Quality Committee &amp; Student Feedback" class="fb-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Curriculum Design &amp; Academic Atmosphere Feedback
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Internal Quality Assurance Cell (IQAC) of RKDF University Bhopal collects structured feedback from all major stakeholders including Students, Teachers, Employers, Alumni, and Parents. The analysis reports drive continuous curriculum enrichment and campus facility upgrades.
              </p>

              <!-- FEEDBACK DOWNLOAD ROWS -->
              <div class="fb-download-list">
                
                <div class="fb-download-row">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">👨‍👩‍👧</span>
                    <span class="fb-row-title">Parent's Feedback Form</span>
                  </div>
                  <a href="forms/Parent’s_Feedback_Form.pdf" target="_blank" class="fb-pdf-link">📄 Download Form ↗</a>
                </div>

                <div class="fb-download-row">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">🎓</span>
                    <span class="fb-row-title">Student Feedback Form</span>
                  </div>
                  <a href="forms/Student’s_Feedback_Form.pdf" target="_blank" class="fb-pdf-link">📄 Download Form ↗</a>
                </div>

                <div class="fb-download-row">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">🧑‍🏫</span>
                    <span class="fb-row-title">Teacher's Feedback Form</span>
                  </div>
                  <a href="forms/Teacher's_Feedback_form.pdf" target="_blank" class="fb-pdf-link">📄 Download Form ↗</a>
                </div>

                <div class="fb-download-row">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">🎖️</span>
                    <span class="fb-row-title">Alumni's Feedback Form</span>
                  </div>
                  <a href="forms/Alumni's_Feedback_Form.pdf" target="_blank" class="fb-pdf-link">📄 Download Form ↗</a>
                </div>

                <div class="fb-download-row">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">💼</span>
                    <span class="fb-row-title">Employer's Feedback Form</span>
                  </div>
                  <a href="forms/Employer's_Feedback_Form.pdf" target="_blank" class="fb-pdf-link">📄 Download Form ↗</a>
                </div>

                <div class="fb-download-row" style="background:#0C1424;border-color:#C5A059;">
                  <div class="fb-row-info">
                    <span class="fb-row-icon">📊</span>
                    <span class="fb-row-title" style="color:#ffffff;">Feedback Analysis Report (NAAC 1.4.1)</span>
                  </div>
                  <a href="https://rkdf.ac.in/naac/criteria1/1.4/1.4.1/final%20feedback%20analysis%20report.pdf" target="_blank" class="fb-pdf-link" style="background:#C5A059;color:#0C1424 !important;border-color:#C5A059;">📄 View Full Report ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quality Assurance Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Feedback_Analysis.php" class="sidebar-link active">Feedback &amp; Analysis <span>→</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabi <span>→</span></a></li>
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
