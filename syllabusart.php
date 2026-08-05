<?php
// ============================================================
// RKDF University — Faculty of Humanities & Social Sciences Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original NEP & Program PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Social Science &amp; Humanities Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_art/rkdf_syll_art_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sart-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sart-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sart-grid-layout { grid-template-columns: 1fr; }
    }

    .sart-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sart-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sart-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sart-badge {
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

    .sart-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sart-card-body {
      padding: 32px 36px;
    }

    .sart-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sart-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sart-block-card:hover .sart-media-img {
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
    .sart-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .sart-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .sart-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .sart-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .sart-pdf-link {
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
    .sart-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">65 · FACULTY OF HUMANITIES &amp; SOCIAL SCIENCES SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Social Science &amp; Humanities Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and semester-wise course Syllabus for B.A. (Plain &amp; Honours), M.A., BSW, and MSW under National Education Policy (NEP 2020).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sart-main-section">
    <div class="rk-container">
      <div class="sart-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="sart-block-card">
            <div class="sart-card-header">
              <h2 class="sart-card-title">Humanities &amp; Social Science Syllabus</h2>
              <span class="sart-badge">NEP 2020 COMPLIANT</span>
            </div>
            <div class="sart-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="sart-media-frame">
                <img src="images/ai_syllabus_art/rkdf_syll_art_card.jpg" alt="RKDF Faculty of Humanities &amp; Behavioral Research Center" class="sart-media-img">
              </div>

              <!-- SECTION 1: NEP B.A. SEMESTER Syllabus -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                B.A. NEP Semester Syllabus (Sem 1 to 6)
              </div>

              <div class="sart-download-grid">
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 1st &amp; 2nd SEM - Psychology</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA%20in%20Psychology.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 1st Semester</span>
                  <a href="syllabus/NEP/BA.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 2nd Semester</span>
                  <a href="syllabus/NEP/BA-2nd-Sem.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 3rd Semester</span>
                  <a href="syllabus/NEP/BA-3rd-sem.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 4th Semester</span>
                  <a href="syllabus/NEP/BA-4th-sem.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 5th Semester</span>
                  <a href="syllabus/NEP/BA%205th%20Sem%20Syllabus.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. 6th Semester</span>
                  <a href="syllabus/NEP/BA%206TH%20SEMESTER%20All%20new.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Hindi Literature 1st Year</span>
                  <a href="syllabus/NEP/Hindi%20Literature.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Environmental Studies</span>
                  <a href="syllabus/NEP/BA-ENVIRONMNT%20SYLLSBUS.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: B.A. HONOURS (SEM 7 & 8 PAPERS) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                B.A. Honours (Semesters 7 &amp; 8 Papers)
              </div>

              <div class="sart-download-grid">
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Hindi (HI 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/B.A-HI-701%20&amp;702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Economics (EC 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EC-%20701&amp;%20702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. English (EN 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EN-701%20&amp;%20702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. History (HS 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BAHS-701%20&amp;%20702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Political Science (PS 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-PS-701%20&amp;%20702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Sociology (SO 701 &amp; 702)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-SO-701%20&amp;%20702.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">Research Methodology 703</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/Research%20Methodology%20703.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Hindi (HI 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/B.A-HI-801%20&amp;%20802.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Economics (EC 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EC-%20801%20&amp;%20802.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. English (EN 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EN-%20801%20&amp;%20802%20.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. History (HS 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BAHS-801%20&amp;%20802%20.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Political Science (PS 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-PS-801%20&amp;%20802.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Sociology (SO 801 &amp; 802)</span>
                  <a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-SO-801%20&amp;%20802.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 3: NEP M.A. POSTGRADUATE Syllabus -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                M.A. NEP Postgraduate Syllabus (All Semesters)
              </div>

              <div class="sart-download-grid">
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Hindi - ALL SEM</span>
                  <a href="syllabus/NEP/M.A.%20Hindi.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Economics - ALL SEM</span>
                  <a href="syllabus/NEP/MA%20ECONOMICS.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. English NEP - ALL SEM</span>
                  <a href="syllabus/NEP/MA-%20ENGLISH%20NEP%20SYLLABUS.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. History - ALL SEM</span>
                  <a href="syllabus/NEP/MA-%20HISTORY.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Political Science NEP - ALL SEM</span>
                  <a href="syllabus/NEP/MA-%20POLITICAL%20SCI.%20NEP%20SYLLABUS.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Psychology NEP - ALL SEM</span>
                  <a href="syllabus/NEP/MA%20PSYCHOLOGU%20NEP%20SYLLABUS.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Sociology - ALL SEM</span>
                  <a href="syllabus/NEP/MA%20SOCIOLOGY.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 4: COMBINED & TRADITIONAL Syllabus (B.A., M.A., BSW, MSW) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                Combined Full Program &amp; Social Work Syllabus
              </div>

              <div class="sart-download-grid">
                <div class="sart-download-row">
                  <span class="sart-row-title">B.A. Complete (1st to 6th SEM)</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/B.A.%20Syllabus.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Hindi Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A.%20Hindi.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Economics Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/MA%20Ecnomics%20%20.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. English Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A.%20(ENGLISH).pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Political Science Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A.%20Polatical%20Sc.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. History Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A.%20History.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Sanskrit Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A%20Sanskrit.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Psychology Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/MA%20Psychology.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">M.A. Sociology Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.A.%20SOCIOLOGY%20I-IVth%20Sem.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">BSW Complete (1st to 6th SEM)</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/BSW%20Syllabus.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sart-download-row">
                  <span class="sart-row-title">MSW Complete (1st to 4th SEM)</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/MSW%20Syllabus.pdf" target="_blank" class="sart-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Humanities Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Social-Science.php" class="sidebar-link">Faculty of Social Science <span>→</span></a></li>
              <li><a href="syllabusart.php" class="sidebar-link active">Humanities Syllabus <span>→</span></a></li>
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
