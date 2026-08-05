<?php
// ============================================================
// RKDF University — Faculty of Management (MBA / BBA) Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original CBCS, NEP & Scheme PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Management (MBA / BBA) Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_mba/rkdf_syll_mba_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .smba-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .smba-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .smba-grid-layout { grid-template-columns: 1fr; }
    }

    .smba-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .smba-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .smba-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .smba-badge {
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

    .smba-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .smba-card-body {
      padding: 32px 36px;
    }

    .smba-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .smba-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .smba-block-card:hover .smba-media-img {
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
    .smba-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .smba-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .smba-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .smba-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .smba-pdf-link {
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
    .smba-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">57 · FACULTY OF MANAGEMENT SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Management Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes and semester-wise course syllabi for BBA (NEP) and MBA (CBCS 2025-26, New &amp; Old Schemes) approved by AICTE.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="smba-main-section">
    <div class="rk-container">
      <div class="smba-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="smba-block-card">
            <div class="smba-card-header">
              <h2 class="smba-card-title">Management Syllabi (MBA &amp; BBA)</h2>
              <span class="smba-badge">CBCS 2025-26 · NEP COMPLIANT</span>
            </div>
            <div class="smba-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="smba-media-frame">
                <img src="images/ai_syllabus_mba/rkdf_syll_mba_card.jpg" alt="RKDF School of Management &amp; Corporate Strategy Center" class="smba-media-img">
              </div>

              <!-- SECTION 1: BBA NEP SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                BBA NEP Semester Syllabi (Years 1 to 4)
              </div>

              <div class="smba-download-grid">
                <div class="smba-download-row">
                  <span class="smba-row-title">BBA 1st &amp; 2nd Semester (1st Year)</span>
                  <a href="syllabus/MBA/BBA%20NEP%201st%20Year%20Syllabus.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">BBA 2nd Year Syllabus</span>
                  <a href="syllabus/NEP/BBA-2nd-Year.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">BBA Environmental Studies</span>
                  <a href="syllabus/NEP/BBA-ENVIRONMNT%20SYLLSBUS.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">BBA III Year (Semesters V &amp; VI)</span>
                  <a href="syllabus/NEP/BBA%20III%20YEAR%20SYllabus%20NEP%2015-02-24.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">BBA IV Year (Semesters VII &amp; VIII)</span>
                  <a href="syllabus/NEP/Syllabus%20BBA%20VII%20&amp;%20VIII%20SEM.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row" style="grid-column:1 / -1;background:#0C1424;border-color:#C5A059;">
                  <span class="smba-row-title" style="color:#ffffff;">BBA 1st to 6th Semester (All Semesters Combined)</span>
                  <a href="syllabus/MBA/BBA%20All%20Sem.pdf" target="_blank" class="smba-pdf-link" style="background:#C5A059;color:#0C1424 !important;border-color:#C5A059;">📄 Download Complete PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: MBA CBCS SYLLABUS 2025-26 -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                MBA CBCS Syllabus (Session 2025-26)
              </div>

              <div class="smba-download-grid">
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA I &amp; II Semester (CBCS 2025-26)</span>
                  <a href="syllabus/MBA/cbcs_2526/MBA%20I%20and%20II%20Semester%20syllabus%20(CBCS)%202025-26.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA III &amp; IV Semester (CBCS 2025-26)</span>
                  <a href="syllabus/MBA/cbcs_2526/MBA%20III%20AND%20IV%20Semester%20Syllabus%20(CBCS)%202025-26.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 3: MBA NEW & OLD SCHEME SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                MBA New &amp; Old Scheme Semester Syllabi
              </div>

              <div class="smba-download-grid">
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA 1st &amp; 2nd Semester</span>
                  <a href="syllabus/MBA/MBA%201st%20Yr%20new.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA 3rd Sem (New Scheme)</span>
                  <a href="syllabus/MBA/MBA%203rd%20sem%20new.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA 3rd Sem (Old Scheme)</span>
                  <a href="syllabus/MBA/MBA%20III%20sem.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA 4th Sem (New Scheme)</span>
                  <a href="syllabus/MBA/MBA%204th%20%20Sem%20New.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="smba-download-row">
                  <span class="smba-row-title">MBA 4th Sem (Old Scheme)</span>
                  <a href="syllabus/MBA/MBA%20IV%20sem.pdf" target="_blank" class="smba-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Management Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="syllabusMba.php" class="sidebar-link active">MBA / BBA Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabi <span>→</span></a></li>
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
