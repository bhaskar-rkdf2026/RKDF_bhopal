<?php
// ============================================================
// RKDF University — University Annual Reports
// World-Class Premium Design + High-Res Media Assets + 100% Original Report PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Annual Reports — RKDF University Bhopal</title>
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
                  url('images/ai_annual_report/rkdf_ar_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ar-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ar-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ar-grid-layout { grid-template-columns: 1fr; }
    }

    .ar-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ar-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ar-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ar-badge {
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

    .ar-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ar-card-body {
      padding: 32px 36px;
    }

    .ar-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ar-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ar-block-card:hover .ar-media-img {
      transform: scale(1.04);
    }

    /* Download Rows */
    .ar-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .ar-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .ar-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .ar-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .ar-row-icon {
      font-size: 22px;
    }
    .ar-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .ar-pdf-link {
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
    .ar-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">45 · GOVERNANCE &amp; REPORTS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">University Annual Reports</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Comprehensive institutional reports detailing academic growth, financial governance, research publications, infrastructural expansion, and university achievements.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ar-main-section">
    <div class="rk-container">
      <div class="ar-grid-layout">
        
        <!-- LEFT COLUMN: ANNUAL REPORTS DOWNLOAD LIST -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="ar-block-card">
            <div class="ar-card-header">
              <h2 class="ar-card-title">Official Annual Reports Repository</h2>
              <span class="ar-badge">GOVERNMENT &amp; UGC SUBMISSIONS</span>
            </div>
            <div class="ar-card-body">
              
              <div class="ar-media-frame">
                <img src="images/ai_annual_report/rkdf_ar_card.jpg" alt="RKDF University Campus &amp; Administrative Governance Building" class="ar-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Annual Academic &amp; Financial Governance Documentation
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Access official PDF copies of RKDF University Bhopal's annual reports presented to the Governing Body, UGC, and M.P. Private University Regulatory Commission (MPPURC).
              </p>

              <!-- DOWNLOAD ROWS -->
              <div class="ar-download-list">

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2022-23</span>
                  </div>
                  <a href="Download/ANNUAL%20REPORT_2022-23.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2021-22</span>
                  </div>
                  <a href="Download/ANNUAL_REPORT_2021-22.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2020-21</span>
                  </div>
                  <a href="Download/ANNUAL_REPORT_2020-21.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2019-20</span>
                  </div>
                  <a href="Download/ANNUAL_REPORT_2019-20.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2018-19</span>
                  </div>
                  <a href="Download/ANNUAL_REPORT_2018-19.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="ar-download-row">
                  <div class="ar-row-info">
                    <span class="ar-row-icon">📘</span>
                    <span class="ar-row-title">Annual Report 2017-18</span>
                  </div>
                  <a href="Download/ANNUAL_REPORT_2017-18.pdf" target="_blank" class="ar-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Governance &amp; Reports</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Annual_Report_University.php" class="sidebar-link active">Annual Reports <span>→</span></a></li>
              <li><a href="Feedback_Analysis.php" class="sidebar-link">Feedback Analysis <span>→</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabus <span>→</span></a></li>
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
