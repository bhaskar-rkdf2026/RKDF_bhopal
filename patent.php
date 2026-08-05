<?php
// ============================================================
// RKDF University — Research Patents & Intellectual Property Rights
// World-Class Premium Design + High-Res Media Assets + 100% Original Patent PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Research Patents &amp; Intellectual Property Rights — RKDF University Bhopal</title>
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
                  url('images/ai_patent/rkdf_patent_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .spatent-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .spatent-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .spatent-grid-layout { grid-template-columns: 1fr; }
    }

    .spatent-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .spatent-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .spatent-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .spatent-badge {
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

    .spatent-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .spatent-card-body {
      padding: 32px 36px;
    }

    .spatent-media-frame {
      width: 100%;
      height: 320px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .spatent-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .spatent-block-card:hover .spatent-media-img {
      transform: scale(1.04);
    }

    /* Patent Cards Grid */
    .spatent-item-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }

    .spatent-item-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 16px;
      transition: all 0.3s ease;
    }
    .spatent-item-card:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
    }

    .spatent-item-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.1em;
    }

    .spatent-item-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }

    .spatent-pdf-btn {
      font-size: 13px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }
    .spatent-pdf-btn:hover {
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
      <span class="rk-eyebrow tone-gold">74 · RESEARCH &amp; INTELLECTUAL PROPERTY CELL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Patents &amp; Innovations</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering university researchers, faculty, and scholars in patent filings, technological inventions, and commercial intellectual property rights.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="spatent-main-section">
    <div class="rk-container">
      <div class="spatent-grid-layout">
        
        <!-- LEFT COLUMN: PATENTS OVERVIEW & DOCUMENTS -->
        <div>

          <article class="spatent-block-card">
            <div class="spatent-card-header">
              <h2 class="spatent-card-title">Patents Granted &amp; Published</h2>
              <span class="spatent-badge">IPR CELL RKDF</span>
            </div>
            <div class="spatent-card-body">

              <div class="spatent-media-frame">
                <img src="images/ai_patent/rkdf_patent_card.jpg" alt="RKDF Research Patents &amp; Intellectual Property Cell" class="spatent-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                University Patents Portfolio
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                RKDF University actively fosters interdisciplinary innovation across engineering, environmental sciences, biotechnology, and medical technology. Explore official patent specifications and granted invention documents below.
              </p>

              <!-- PATENTS CARDS GRID -->
              <div class="spatent-item-grid">

                <div class="spatent-item-card">
                  <div>
                    <span class="spatent-item-tag">Official Directory</span>
                    <h3 class="spatent-item-title">Master List of University Patents</h3>
                  </div>
                  <a href="research/List%20of%20Patents.pdf" target="_blank" class="spatent-pdf-link">📄 Download Patent List ↗</a>
                </div>

                <div class="spatent-item-card">
                  <div>
                    <span class="spatent-item-tag">Granted Patent</span>
                    <h3 class="spatent-item-title">Heating Assembly (Bukhari Innovation)</h3>
                  </div>
                  <a href="research/Patent%20Bukhari.pdf" target="_blank" class="spatent-pdf-link">📄 Download Specification ↗</a>
                </div>

                <div class="spatent-item-card">
                  <div>
                    <span class="spatent-item-tag">Environmental Patent</span>
                    <h3 class="spatent-item-title">Reactor for Carbon Capture Plant</h3>
                  </div>
                  <a href="research/Patent%20Carbon%20Capture%20Plant.pdf" target="_blank" class="spatent-pdf-link">📄 Download Specification ↗</a>
                </div>

                <div class="spatent-item-card">
                  <div>
                    <span class="spatent-item-tag">Medical Tech Patent</span>
                    <h3 class="spatent-item-title">Medical Examiner &amp; Detector Instrument</h3>
                  </div>
                  <a href="research/Patent%20Medical%20Examiner.pdf" target="_blank" class="spatent-pdf-link">📄 Download Specification ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Research Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="patent.php" class="sidebar-link active">Patents &amp; Innovations <span>→</span></a></li>
              <li><a href="syllabusPhD.php" class="sidebar-link">Ph.D. Coursework <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="Annual_Report_University.php" class="sidebar-link">Annual Reports <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department <span>→</span></a></li>
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
