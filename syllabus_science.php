<?php
// ============================================================
// RKDF University — Faculty of Science (B.Sc. & M.Sc.) Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original NEP & Discipline PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Science (B.Sc. &amp; M.Sc.) Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_science/rkdf_syll_sci_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ssci-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ssci-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ssci-grid-layout { grid-template-columns: 1fr; }
    }

    .ssci-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ssci-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ssci-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ssci-badge {
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

    .ssci-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ssci-card-body {
      padding: 32px 36px;
    }

    .ssci-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ssci-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ssci-block-card:hover .ssci-media-img {
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

    /* Download Rows & Grid */
    .ssci-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .ssci-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .ssci-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .ssci-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .ssci-pdf-link {
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
    .ssci-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    .ssci-nav-link {
      color: #0C1424;
      background: rgba(12, 20, 36, 0.06);
      border-color: rgba(12, 20, 36, 0.15);
    }
    .ssci-nav-link:hover {
      background: #0C1424;
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
      <span class="rk-eyebrow tone-gold">64 · FACULTY OF SCIENCE SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Science Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and semester-wise course Syllabus for B.Sc. and M.Sc. across physical, chemical, biological, and mathematical sciences under NEP 2020.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ssci-main-section">
    <div class="rk-container">
      <div class="ssci-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="ssci-block-card">
            <div class="ssci-card-header">
              <h2 class="ssci-card-title">Science Syllabus (B.Sc. &amp; M.Sc.)</h2>
              <span class="ssci-badge">NEP 2020 COMPLIANT</span>
            </div>
            <div class="ssci-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="ssci-media-frame">
                <img src="images/ai_syllabus_science/rkdf_syll_sci_card.jpg" alt="RKDF Advanced Scientific Research &amp; Analytical Lab" class="ssci-media-img">
              </div>

              <!-- SECTION 1: NEP B.SC. FRAMEWORK SUBPAGE LINKS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                B.Sc. NEP Curriculum Modules
              </div>

              <div class="ssci-download-grid">
                <div class="ssci-download-row">
                  <span class="ssci-row-title">NEP MAJOR 1st YEAR SYLLABUS</span>
                  <a href="syllabus_science_major.php" class="ssci-pdf-link ssci-nav-link">🔍 View Modules ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">NEP MAJOR 2nd YEAR SYLLABUS</span>
                  <a href="syllabus_science_major3rdsem.php" class="ssci-pdf-link ssci-nav-link">🔍 View Modules ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">NEP MINOR 2nd YEAR SYLLABUS</span>
                  <a href="syllabus_science_minor2ndyr.php" class="ssci-pdf-link ssci-nav-link">🔍 View Modules ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">NEP 3rd YEAR SYLLABUS</span>
                  <a href="syllabus_science_3year.php" class="ssci-pdf-link ssci-nav-link">🔍 View Modules ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">NEP MINOR &amp; OPTIONAL 1st SEM</span>
                  <a href="syllabus_science_minor.php" class="ssci-pdf-link ssci-nav-link">🔍 View Modules ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">B.SC ENVIRONMENTAL STUDIES</span>
                  <a href="syllabus/NEP/BSC-ENVIRONMNT%20SYLLSBUS.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row" style="grid-column:1 / -1;background:#0C1424;border-color:#C5A059;">
                  <span class="ssci-row-title" style="color:#ffffff;">B.Sc. Courses (All Combined)</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/B.Sc.%20Courses%20-%20Final.pdf" target="_blank" class="ssci-pdf-link" style="background:#C5A059;color:#0C1424 !important;border-color:#C5A059;">📄 Download Final PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: NEP M.SC. 2020 (2-YEAR PG PROGRAMS) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                NEP Master of Science (M.Sc. 2-Year PG Programs)
              </div>

              <div class="ssci-download-grid">
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Biotechnology NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Biotechnology%20NEP%202020%20-%202%20yrs.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Computer Science NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Computer%20Science%20NEP%202020%20-%202%20yrs.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Physics NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Physics%20NEP%202020%20-%202%20yrs.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Botany NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Botany%20NEP%202020%20-%202%20yrs.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Microbiology NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Microbiology%20NEP%202020%202%20yrs.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Mathematics NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Mathematics%20NEP%202020%20-%202%20Year%20PG%20programme.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Food Science &amp; Tech NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Food%20Science%20and%20Tech%20NEP%202020%20-%202%20Year%20PG%20programme.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Chemistry NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Chemistry%20NEP%202020%20-%202%20Year.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Zoology NEP 2020</span>
                  <a href="syllabus/NEP/Science/MSc%20Zoology%20NEP%202020%20-%202%20Year.pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 3: M.SC. TRADITIONAL / DISCIPLINE Syllabus -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                Master of Science (M.Sc. Discipline Syllabus)
              </div>

              <div class="ssci-download-grid">
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Physics</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC%20%20(PHYSICS).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Zoology</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC%20%20(ZOOLOGY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Chemistry</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC%20(CHEMISTRY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Geology</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC%20(GEOLOGY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Botany</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC-(BOTONY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Microbiology</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC-(MICROBIOLOGY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Mathematics</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC%20(MATHS).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Biotechnology</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC(BIOTECHNOLOGY).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Computer Science</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC(COMPUTER%20SCIENCE).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssci-download-row">
                  <span class="ssci-row-title">M.Sc. Food Science</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.SC(FOOD%20SCIENCE).pdf" target="_blank" class="ssci-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Science Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="syllabus_science.php" class="sidebar-link active">Science Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabus <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabus <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
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
