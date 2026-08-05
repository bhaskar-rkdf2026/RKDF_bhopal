<?php
// ============================================================
// RKDF University — Doctor of Philosophy (Ph.D.) Coursework Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original Coursework PDF Link Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ph.D. Course Work Syllabus — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.95) 0%, rgba(21,34,56,0.92) 60%, rgba(12,20,36,0.97) 100%), 
                  url('images/ai_syllabus_phd/rkdf_syll_phd_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sphd-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sphd-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sphd-grid-layout { grid-template-columns: 1fr; }
    }

    .sphd-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sphd-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sphd-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sphd-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 6px 16px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .sphd-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sphd-card-body {
      padding: 36px 40px;
    }

    .sphd-media-frame {
      width: 100%;
      height: 300px;
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sphd-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sphd-block-card:hover .sphd-media-img {
      transform: scale(1.04);
    }

    /* Program Dropdown Selector */
    .prog-filter-bar {
      display: flex;
      gap: 16px;
      align-items: center;
      margin-bottom: 32px;
      background: #FAF9F5;
      padding: 20px 28px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.08);
      box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
    }
    @media (max-width: 600px) {
      .prog-filter-bar { flex-direction: column; align-items: stretch; }
    }

    .prog-select {
      flex: 1;
      padding: 14px 20px;
      border-radius: 10px;
      border: 1px solid rgba(12, 20, 36, 0.15);
      background: #ffffff;
      font-size: 15px;
      color: #0C1424;
      font-weight: 600;
      outline: none;
      cursor: pointer;
    }
    .prog-select:focus {
      border-color: #C5A059;
      box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15);
    }

    /* Feature Grid Boxes */
    .sphd-feat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin: 32px 0;
    }

    .sphd-feat-box {
      background: #FAF9F5;
      padding: 24px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.07);
      transition: all 0.25s ease;
    }
    .sphd-feat-box:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.05);
    }

    .sphd-feat-icon {
      font-size: 28px;
      margin-bottom: 12px;
      display: inline-block;
    }

    .sphd-feat-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }

    .sphd-feat-desc {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
    }

    /* Syllabus Download Container */
    .sphd-download-hero-card {
      background: linear-gradient(135deg, #0C1424 0%, #152238 100%);
      color: #ffffff;
      border-radius: 16px;
      padding: 32px 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      border: 1px solid rgba(197, 160, 89, 0.3);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.15);
      margin-top: 10px;
    }
    @media (max-width: 768px) {
      .sphd-download-hero-card { flex-direction: column; text-align: center; }
    }

    .sphd-dl-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 6px;
    }

    .sphd-dl-sub {
      font-size: 14px;
      color: rgba(250, 249, 245, 0.75);
    }

    .sphd-main-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 14px;
      font-weight: 700;
      color: #0C1424;
      background: linear-gradient(135deg, #C5A059 0%, #D4AF37 100%);
      padding: 14px 28px;
      border-radius: 10px;
      text-decoration: none;
      box-shadow: 0 4px 16px rgba(197, 160, 89, 0.3);
      transition: all 0.3s ease;
      white-space: nowrap;
    }
    .sphd-main-pdf-btn:hover {
      background: #ffffff;
      color: #0C1424 !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(255, 255, 255, 0.2);
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
      <span class="rk-eyebrow tone-gold">62 · DOCTOR OF PHILOSOPHY (PH.D.) COURSEWORK SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Ph.D. Course Work Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Comprehensive evaluation scheme and 1st Semester doctoral coursework syllabus for Ph.D. research scholars across all University faculties as per UGC Regulations.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sphd-main-section">
    <div class="rk-container">
      <div class="sphd-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="sphd-block-card">
            <div class="sphd-card-header">
              <h2 class="sphd-card-title">Doctoral Research &amp; Coursework Curriculum</h2>
              <span class="sphd-badge">UGC REGULATION COMPLIANT</span>
            </div>
            <div class="sphd-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="sphd-media-frame">
                <img src="images/ai_syllabus_phd/rkdf_syll_phd_card.jpg" alt="RKDF Doctoral Research &amp; Scholarly Innovation Center" class="sphd-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:24px;color:#0C1424;margin-bottom:14px;font-weight:700;">
                Doctoral Coursework Framework (All Faculties)
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Ph.D. Coursework at RKDF University Bhopal is designed in full compliance with UGC Minimum Standards and Procedure for Award of Ph.D. Degree Regulations. The 1st Semester coursework provides rigorous training in research methodology, quantitative analysis, data handling, and publication ethics.
              </p>

              <!-- FOUR COURSEWORK MODULE CARDS -->
              <div class="sphd-feat-grid">

                <div class="sphd-feat-box">
                  <span class="sphd-feat-icon">📊</span>
                  <h3 class="sphd-feat-title">Research Methodology</h3>
                  <p class="sphd-feat-desc">Formulation of research problems, hypothesis design, literature review techniques, and research design strategies.</p>
                </div>

                <div class="sphd-feat-box">
                  <span class="sphd-feat-icon">💻</span>
                  <h3 class="sphd-feat-title">Computer Applications &amp; Statistics</h3>
                  <p class="sphd-feat-desc">Statistical packages (SPSS, R, MATLAB), data analytics, computational modelling, and digital tools for data presentation.</p>
                </div>

                <div class="sphd-feat-box">
                  <span class="sphd-feat-icon">⚖️</span>
                  <h3 class="sphd-feat-title">Research &amp; Publication Ethics</h3>
                  <p class="sphd-feat-desc">Intellectual property rights (IPR), plagiarism prevention (Turnitin / Urkund), ethical guidelines, and peer-reviewed journals.</p>
                </div>

                <div class="sphd-feat-box">
                  <span class="sphd-feat-icon">🔬</span>
                  <h3 class="sphd-feat-title">Advanced Discipline Electives</h3>
                  <p class="sphd-feat-desc">Specialized domain coursework tailored to individual departments (Engineering, Science, Pharmacy, Management, Humanities).</p>
                </div>

              </div>

              <!-- MAIN SYLLABUS DOWNLOAD HERO CARD -->
              <div class="sphd-download-hero-card">
                <div>
                  <h3 class="sphd-dl-title">Ph.D. 1st Sem Course Work - Scheme &amp; Syllabus</h3>
                  <p class="sphd-dl-sub">Official 1st Semester Coursework Regulations, Exam Scheme &amp; Unit-wise Syllabi for All Branches</p>
                </div>
                <a href="syllabus/Ph_D_Course_work__Scheme_and_Syllabus.pdf" target="_blank" class="sphd-main-pdf-btn">
                  <span>📄 Download PDF</span>
                  <span>↗</span>
                </a>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Research Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="syllabusPhD.php" class="sidebar-link active">Ph.D. Coursework Syllabus <span>→</span></a></li>
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
