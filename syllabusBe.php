<?php
// ============================================================
// RKDF University — Bachelor of Engineering (B.E. / B.Tech) Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original Branch Schemes & PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bachelor of Engineering (B.E.) Syllabus — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_be/rkdf_syll_be_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sbe-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sbe-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sbe-grid-layout { grid-template-columns: 1fr; }
    }

    .sbe-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sbe-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sbe-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sbe-badge {
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

    .sbe-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sbe-card-body {
      padding: 32px 36px;
    }

    .sbe-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sbe-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sbe-block-card:hover .sbe-media-img {
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

    /* Branch Scheme Table */
    .sbe-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .sbe-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 14px 18px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .sbe-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .sbe-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .sbe-pdf-btn {
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
      display: inline-block;
      margin-right: 6px;
    }
    .sbe-pdf-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    .sbe-scheme-btn {
      color: #C5A059;
      background: rgba(197, 160, 89, 0.12);
      border-color: rgba(197, 160, 89, 0.3);
    }
    .sbe-scheme-btn:hover {
      background: #C5A059;
      color: #0C1424 !important;
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
      <span class="rk-eyebrow tone-gold">51 · FACULTY OF ENGINEERING (B.E. / B.TECH) SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Bachelor of Engineering (B.E.) Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes, evaluation rules, and semester-wise course syllabi for B.E. / B.Tech across 10 specialized engineering disciplines approved by AICTE.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sbe-main-section">
    <div class="rk-container">
      <div class="sbe-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="sbe-block-card">
            <div class="sbe-card-header">
              <h2 class="sbe-card-title">B.E. / B.Tech Schemes &amp; Syllabi</h2>
              <span class="sbe-badge">AICTE COMPLIANT</span>
            </div>
            <div class="sbe-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="sbe-media-frame">
                <img src="images/ai_syllabus_be/rkdf_syll_be_card.jpg" alt="RKDF Engineering Innovation &amp; Robotics Research Center" class="sbe-media-img">
              </div>

              <!-- SECTION 1: 1ST & 2ND SEMESTER COMMON SYLLABUS -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                1st Year Common Syllabus (1st &amp; 2nd Sem All Branches)
              </div>

              <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:36px;">
                <div style="display:flex;align-items:center;justify-space-between;padding:16px 20px;background:#FAF9F5;border-radius:12px;border:1px solid rgba(12,20,36,0.07);">
                  <span style="font-weight:700;color:#0C1424;">B.E. Common to All Branches (2018 Admitted)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/BE%20I%20Year%20(All%20Branches)%20for%202018%20admitted.pdf" target="_blank" class="sbe-pdf-btn">📄 Download PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:16px 20px;background:#FAF9F5;border-radius:12px;border:1px solid rgba(12,20,36,0.07);">
                  <span style="font-weight:700;color:#0C1424;">B.E. Common to All Branches (2020 Admitted)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/BE%20I%20Year%20(All%20Branches)%20for%202020%20admitted.pdf" target="_blank" class="sbe-pdf-btn">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: NEW SCHEME & SYLLABUS 2025-26 (3RD TO 8TH SEMESTER) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                New Scheme &amp; Syllabus (Session 2025-26 · 3rd to 8th Semesters)
              </div>

              <table class="sbe-table">
                <thead>
                  <tr>
                    <th>Engineering Branch</th>
                    <th>Evaluation Scheme</th>
                    <th>Course Syllabus</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Mechanical Engineering (ME)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_ME_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech-ME-Final%20Syllabus-3rd-8th-Sem.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Civil Engineering (CE)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_Civil_Scheme_3rd_8th_Sem_2025_26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech_Civil_Syllabus_3rd_8th_Sem_1.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Computer Science &amp; Engineering (CSE)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_CSE_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech%20CSE%20Syllabus%202025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Electronics &amp; Communication (EC)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_ECE_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech_Electronic_3rd_8th_Sem_Syllabus_2025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Electrical Engineering (EE)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_EE_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech_EE-FINAL%20SYLLABUS_3rd_8th_Sem.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Electrical &amp; Electronics Engineering (EEE)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_EEE_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/B.Tech_EEE-FINAL%20SYLLABUS_3rd_8th_Sem.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Information Technology (IT)</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_IT_SCHEME_%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BTech%20IT%20Syllabus%202025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Artificial Intelligence &amp; Data Science</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_AI%20&amp;%20Data%20Science%20SCHEME%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BE_AI%20&amp;%20DS_%20Syllabus_3rd_8th_Sem_2025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. Artificial Intelligence &amp; Machine Learning</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech_AI%20&amp;%20ML%20SCHEME%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BE_AI%20&amp;%20ML_Syllabus_3rd_8th_%202025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                  <tr>
                    <td style="font-weight:700;color:#0C1424;">B.E. CSE - IoT &amp; Cyber Security</td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Scheme/BTech%20CSE-%20IoT%20&amp;%20Cyber%20Security%20SCHEME%203%20TO%208%20UPDATED_2025-26.pdf" target="_blank" class="sbe-pdf-btn sbe-scheme-btn">📊 Scheme PDF ↗</a></td>
                    <td><a href="syllabus/Technical%20syllabus/B.E/NewSyllabus/Syllabus/BE_CSE%20-%20IoT%20&amp;%20Cyber%20Security_3rd_8th_Syllabus_2025-26.pdf" target="_blank" class="sbe-pdf-btn">📄 Syllabus PDF ↗</a></td>
                  </tr>
                </tbody>
              </table>

              <!-- SECTION 3: OLD SCHEME (3RD TO 8TH SEMESTER ALL BRANCHES) -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-top:36px;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                Old Scheme Syllabi (3rd to 8th Semesters)
              </div>

              <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(260px, 1fr));gap:14px;">
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Civil Engineering (CE)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/CE%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Computer Science (CSE)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/CSE%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Electronics &amp; Comm (EC)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/EC%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Electrical Engineering (EE)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/EE%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Electrical &amp; Electronics (EX)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/EX%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Information Tech (IT)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/IT%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
                <div style="display:flex;align-items:center;justify-space-between;padding:14px 18px;background:#FAF9F5;border-radius:10px;border:1px solid rgba(12,20,36,0.06);">
                  <span style="font-weight:700;color:#0C1424;font-size:14px;">B.E. Mechanical Engineering (ME)</span>
                  <a href="syllabus/Technical%20syllabus/B.E/ME%20Syllabus.pdf" target="_blank" class="sbe-pdf-btn">📄 PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Engineering Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="syllabusBe.php" class="sidebar-link active">B.E. / B.Tech Syllabus <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabi <span>→</span></a></li>
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
