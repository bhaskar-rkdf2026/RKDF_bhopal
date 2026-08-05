<?php
// ============================================================
// RKDF University — Faculty of Architecture Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original Semester PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Architecture Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_arch/rkdf_syll_arch_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sarc-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sarc-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sarc-grid-layout { grid-template-columns: 1fr; }
    }

    .sarc-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sarc-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sarc-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sarc-badge {
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

    .sarc-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sarc-card-body {
      padding: 32px 36px;
    }

    .sarc-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sarc-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sarc-block-card:hover .sarc-media-img {
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

    /* Syllabus Grid */
    .sarc-download-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 16px;
    }

    .sarc-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .sarc-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sarc-row-title {
      font-size: 15px;
      font-weight: 700;
      color: #0C1424;
    }

    .sarc-pdf-link {
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
      white-space: nowrap;
    }
    .sarc-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">49 · FACULTY OF ARCHITECTURE SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Architecture Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum, architectural design studio guidelines, and semester-wise course Syllabus for B.Arch (Semesters 1 to 10) approved by Council of Architecture (COA).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sarc-main-section">
    <div class="rk-container">
      <div class="sarc-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="sarc-block-card">
            <div class="sarc-card-header">
              <h2 class="sarc-card-title">B.Arch 10-Semester Syllabus</h2>
              <span class="sarc-badge">COA APPROVED</span>
            </div>
            <div class="sarc-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="sarc-media-frame">
                <img src="images/ai_syllabus_arch/rkdf_syll_arch_card.jpg" alt="RKDF Architecture Design Studio &amp; Drafting Lab" class="sarc-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                B.Arch Semester-wise Curricular Downloads (Semesters 1 to 10)
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF copies of the Bachelor of Architecture (B.Arch) course syllabus, covering Architectural Design, Building Construction, Structure, AutoCAD, History of Architecture, and Professional Practice.
              </p>

              <!-- DOWNLOAD GRID -->
              <div class="sarc-download-list">

                <div class="sarc-download-row" style="grid-column:1 / -1;background:#0C1424;border-color:#C5A059;">
                  <span class="sarc-row-title" style="color:#ffffff;">ARCHITECTURE FRONT PAGE</span>
                  <a href="syllabus/architecture/FRONT_PAGES_OF_SYLLABUS.pdf" target="_blank" class="sarc-pdf-link" style="background:#C5A059;color:#0C1424 !important;border-color:#C5A059;">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 1ST SEM</span>
                  <a href="syllabus/architecture/semester_1.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 2ND SEM</span>
                  <a href="syllabus/architecture/semester_2.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 3RD SEM</span>
                  <a href="syllabus/architecture/semester_3.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 4TH SEM</span>
                  <a href="syllabus/architecture/semester_4.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 5TH SEM</span>
                  <a href="syllabus/architecture/SEMESTER_5.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 6TH SEM</span>
                  <a href="syllabus/architecture/SEMESTER_6.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 7TH SEM</span>
                  <a href="syllabus/architecture/semester_7.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 8TH SEM</span>
                  <a href="syllabus/architecture/SEMESTER_8.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 9TH SEM</span>
                  <a href="syllabus/architecture/SEMESTER_9.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sarc-download-row">
                  <span class="sarc-row-title">ARCHITECTURE 10TH SEM</span>
                  <a href="syllabus/architecture/semester_10.pdf" target="_blank" class="sarc-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Architecture Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="architect.php" class="sidebar-link">Faculty of Architecture <span>→</span></a></li>
              <li><a href="syllabusarchitect.php" class="sidebar-link active">Architecture Syllabus <span>→</span></a></li>
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
