<?php
// ============================================================
// RKDF University — B.Sc. NEP Minor & Optional Syllabus (Semesters 1 & 2)
// World-Class Premium Design + High-Res Media Assets + 100% Original NEP Course PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>B.Sc. NEP Minor Syllabus (Sem I &amp; II) — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_science_minor/rkdf_syll_sci_min_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ssmin-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ssmin-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ssmin-grid-layout { grid-template-columns: 1fr; }
    }

    .ssmin-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ssmin-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ssmin-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ssmin-badge {
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

    .ssmin-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ssmin-card-body {
      padding: 32px 36px;
    }

    .ssmin-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ssmin-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ssmin-block-card:hover .ssmin-media-img {
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

    /* Download Grid */
    .ssmin-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .ssmin-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .ssmin-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .ssmin-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .ssmin-pdf-link {
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
    .ssmin-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">67 · FACULTY OF SCIENCE (NEP MINOR &amp; OPTIONAL SYLLABUS)</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">B.Sc. NEP Minor Syllabus (Sem I &amp; II)</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and minor elective course Syllabus for B.Sc. 1st &amp; 2nd Semesters under National Education Policy (NEP 2020).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ssmin-main-section">
    <div class="rk-container">
      <div class="ssmin-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="ssmin-block-card">
            <div class="ssmin-card-header">
              <h2 class="ssmin-card-title">NEP Minor Course Modules</h2>
              <span class="ssmin-badge">NEP 2020 COMPLIANT</span>
            </div>
            <div class="ssmin-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="ssmin-media-frame">
                <img src="images/ai_syllabus_science_minor/rkdf_syll_sci_min_card.jpg" alt="RKDF Science Faculty Innovation &amp; Multidisciplinary Labs" class="ssmin-media-img">
              </div>

              <!-- SECTION 1: NEP MINOR 1st SEM SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                NEP Minor 1st Semester Syllabus
              </div>

              <div class="ssmin-download-grid">
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (PHYSICS) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Physic.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (ZOOLOGY) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Zoology.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (CHEMISTRY) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_CHEM.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (ENVIRONMENTAL) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_EVS.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (BOTANY) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Botany.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (MICROBIOLOGY) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Micro.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (MATHEMATICS) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Mathamatic.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (BIOTECHNOLOGY) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Biotech.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (COMPUTER SCIENCE) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_CS.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (FORENSIC SCIENCE) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Forensic.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">B.SC. (ELECTRONICS) MINOR SEM-I</span>
                  <a href="syllabus/NEP/MINOR/Minor_Electronics.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: NEP MINOR 2nd SEM SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                NEP Minor 2nd Semester Syllabus
              </div>

              <div class="ssmin-download-grid">
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Biotech SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Biotech-Syllabus-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Botany SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Botany-Syllabus-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor CS SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-CS-Syllabus-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Forensic SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Forensic-Science-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Mathematics SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Mathamatic-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Chemistry SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-MChemistry-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Physics SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Physics-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ssmin-download-row">
                  <span class="ssmin-row-title">NEP B.Sc. Minor Zoology SEM-II</span>
                  <a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Zoology-SEM-2.pdf" target="_blank" class="ssmin-pdf-link">📄 Download PDF ↗</a>
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
              <li><a href="syllabus_science.php" class="sidebar-link">Science Syllabus Hub <span>→</span></a></li>
              <li><a href="syllabus_science_major.php" class="sidebar-link">NEP Major 1st Year <span>→</span></a></li>
              <li><a href="syllabus_science_minor.php" class="sidebar-link active">NEP Minor (Sem 1 &amp; 2) <span>→</span></a></li>
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
