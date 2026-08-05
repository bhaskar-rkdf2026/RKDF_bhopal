<?php
// ============================================================
// RKDF University — Faculty of Commerce Syllabus
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
  <title>Faculty of Commerce Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_commerce/rkdf_syll_com_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .scom-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .scom-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .scom-grid-layout { grid-template-columns: 1fr; }
    }

    .scom-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .scom-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .scom-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .scom-badge {
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

    .scom-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .scom-card-body {
      padding: 32px 36px;
    }

    .scom-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .scom-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .scom-block-card:hover .scom-media-img {
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
    .scom-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .scom-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .scom-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .scom-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .scom-pdf-link {
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
    .scom-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">52 · FACULTY OF COMMERCE SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Commerce Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Semester-wise course syllabi for B.Com (Plain), B.Com (Computer Applications), B.Com (Honours), and M.Com following National Education Policy (NEP) guidelines.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="scom-main-section">
    <div class="rk-container">
      <div class="scom-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="scom-block-card">
            <div class="scom-card-header">
              <h2 class="scom-card-title">Commerce NEP &amp; Postgraduate Syllabi</h2>
              <span class="scom-badge">NEP 2020 COMPLIANT</span>
            </div>
            <div class="scom-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="scom-media-frame">
                <img src="images/ai_syllabus_commerce/rkdf_syll_com_card.jpg" alt="RKDF Faculty of Commerce &amp; Financial Analytics Lab" class="scom-media-img">
              </div>

              <!-- SECTION 1: NEP B.COM (PLAIN) SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                B.Com (Plain) NEP Semester Syllabi
              </div>

              <div class="scom-download-grid">
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 1st SEM</span>
                  <a href="syllabus/NEP/B.Com.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 2nd SEM</span>
                  <a href="syllabus/NEP/B.COM%20PLAIN.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 3rd SEM</span>
                  <a href="syllabus/NEP/B.Com_Plain-3rd-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 4th SEM</span>
                  <a href="syllabus/NEP/B.Com_Plain-4th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 5th SEM</span>
                  <a href="syllabus/NEP/B.Com_Plain-5th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) 6th SEM</span>
                  <a href="syllabus/NEP/B.Com_Plain-6th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: NEP B.COM (COMPUTER) SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                B.Com (Computer Applications) NEP Semester Syllabi
              </div>

              <div class="scom-download-grid">
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 1st SEM</span>
                  <a href="syllabus/NEP/B.COM%20COMPUTER.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 2nd SEM</span>
                  <a href="syllabus/NEP/B.COM%20COMPUTER2nd%20sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 3rd SEM</span>
                  <a href="syllabus/NEP/B.Com_Computer-3rd-sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 4th SEM</span>
                  <a href="syllabus/NEP/B.Com_Computer-4th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 5th SEM</span>
                  <a href="syllabus/NEP/B.Com_Computer-5th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) 6th SEM</span>
                  <a href="syllabus/NEP/B.Com_Computer-6th-Sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 3: B.COM HONOURS & ENVIRONMENTAL STUDIES -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                B.Com Honours (7th &amp; 8th Sem) &amp; Environmental Studies
              </div>

              <div class="scom-download-grid">
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM - 7th SEM - Honours</span>
                  <a href="syllabus/NEP/B.COM%20-%207%20Sem..pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM - 8th SEM - Honours</span>
                  <a href="syllabus/NEP/B.COM%20-%208%20Sem..pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row" style="grid-column:1 / -1;">
                  <span class="scom-row-title">B.COM ENVIRONMENTAL STUDIES SYLLABUS</span>
                  <a href="syllabus/NEP/B.COM-ENVIRONMNT%20SYLLSBUS.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 4: M.COM NEP SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                M.Com NEP Semester Syllabi
              </div>

              <div class="scom-download-grid">
                <div class="scom-download-row">
                  <span class="scom-row-title">M.COM - 1st Sem</span>
                  <a href="syllabus/NEP/M.Com%20-%201%20sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">M.COM - 2nd Sem</span>
                  <a href="syllabus/NEP/M.Com-%202%20sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">M.COM - 3rd Sem</span>
                  <a href="syllabus/NEP/M.Com-%203%20sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">M.COM - 4th Sem</span>
                  <a href="syllabus/NEP/M.Com-%204%20sem.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 5: FULL PROGRAM COMBINED SYLLABI (NON-TECHNICAL) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                Combined Full Program Syllabi (1st to 6th Sem All)
              </div>

              <div class="scom-download-grid">
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (PLAIN) Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/B.Com%20(Plain).pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (COMPUTER) Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/B.Com.%20(Computer).pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">B.COM (HONS.) Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/b.com(hons).pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="scom-download-row">
                  <span class="scom-row-title">M.COM (New Scheme) Complete</span>
                  <a href="syllabus/Non%20Technical%20Syllabus/M.Com.pdf" target="_blank" class="scom-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Commerce Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="syllabuscommerce.php" class="sidebar-link active">Commerce Syllabus <span>→</span></a></li>
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
