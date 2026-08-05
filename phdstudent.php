<?php
// ============================================================
// RKDF University — Ph.D. Awarded Research Scholars Directory
// World-Class Premium Design + High-Res Media Assets + 100% Original Awarded Student PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Awarded Ph.D. Research Scholars — RKDF University Bhopal</title>
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
                  url('images/ai_phdstudent/rkdf_phdstud_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sphdstud-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sphdstud-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sphdstud-grid-layout { grid-template-columns: 1fr; }
    }

    .sphdstud-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sphdstud-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sphdstud-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sphdstud-badge {
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

    .sphdstud-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sphdstud-card-body {
      padding: 32px 36px;
    }

    .sphdstud-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sphdstud-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sphdstud-block-card:hover .sphdstud-media-img {
      transform: scale(1.04);
    }

    /* Awarded Scholars Grid */
    .sphdstud-year-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 16px;
      margin-top: 24px;
    }

    .sphdstud-year-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 22px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      transition: all 0.25s ease;
    }
    .sphdstud-year-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sphdstud-year-title {
      font-size: 15px;
      font-weight: 700;
      color: #0C1424;
    }

    .sphdstud-pdf-btn {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 7px 16px;
      border-radius: 8px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .sphdstud-pdf-btn:hover {
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
      <span class="rk-eyebrow tone-gold">77 · DOCTOR OF PHILOSOPHY (PH.D) RESEARCH SCHOLARS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Awarded Ph.D. Scholars</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official directory of doctoral research scholars awarded Ph.D. degrees by RKDF University Bhopal across academic sessions 2016 through 2025.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sphdstud-main-section">
    <div class="rk-container">
      <div class="sphdstud-grid-layout">
        
        <!-- LEFT COLUMN: AWARDED SCHOLARS LIST -->
        <div>

          <article class="sphdstud-block-card">
            <div class="sphdstud-card-header">
              <h2 class="sphdstud-card-title">Year-wise Awarded Ph.D. Scholars List</h2>
              <span class="sphdstud-badge">DOCTORAL CONVOCATION</span>
            </div>
            <div class="sphdstud-card-body">

              <div class="sphdstud-media-frame">
                <img src="images/ai_phdstudent/rkdf_phdstud_card.jpg" alt="RKDF Ph.D. Doctoral Convocation &amp; Research Award Ceremony" class="sphdstud-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Awarded Doctoral Degrees (2016 – 2025)
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF records of Ph.D. degrees awarded by RKDF University, categorized by graduation year:
              </p>

              <!-- YEAR-WISE LIST GRID -->
              <div class="sphdstud-year-grid">

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2025</span>
                  <a href="Ph.D/awarded%20students/2025.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2024</span>
                  <a href="Ph.D/awarded%20students/2024.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2023</span>
                  <a href="Ph.D/awarded%20students/2023.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2022</span>
                  <a href="Ph.D/awarded%20students/2022.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2021</span>
                  <a href="Ph.D/awarded%20students/2021.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2020</span>
                  <a href="Ph.D/awarded%20students/2020.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2019</span>
                  <a href="Ph.D/awarded%20students/2019.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2018</span>
                  <a href="Ph.D/awarded%20students/2018.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2017</span>
                  <a href="Ph.D/awarded%20students/2017.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sphdstud-year-row">
                  <span class="sphdstud-year-title">Ph.D. Scholars Awarded in 2016</span>
                  <a href="Ph.D/awarded%20students/2016.pdf" target="_blank" class="sphdstud-pdf-link">📄 Download PDF ↗</a>
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
              <li><a href="phdstudent.php" class="sidebar-link active">Awarded Ph.D. Scholars <span>→</span></a></li>
              <li><a href="phd_entrance.php" class="sidebar-link">Ph.D. Admissions 2026 <span>→</span></a></li>
              <li><a href="phdsubjects.php" class="sidebar-link">Ph.D. Research Subjects <span>→</span></a></li>
              <li><a href="syllabusPhD.php" class="sidebar-link">Ph.D. Coursework Syllabus <span>→</span></a></li>
              <li><a href="patent.php" class="sidebar-link">Patents &amp; Innovations <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="Annual_Report_University.php" class="sidebar-link">Annual Reports <span>→</span></a></li>
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
