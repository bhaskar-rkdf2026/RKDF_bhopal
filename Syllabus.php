<?php
// ============================================================
// RKDF University — Academic Syllabus Portal
// World-Class Premium Design + High-Res Media Assets + 100% Original Dropdown & Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Syllabus Portal — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus/rkdf_syllabus_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .syl-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .syl-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .syl-grid-layout { grid-template-columns: 1fr; }
    }

    .syl-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .syl-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .syl-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .syl-badge {
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

    .syl-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .syl-card-body {
      padding: 32px 36px;
    }

    .syl-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .syl-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .syl-block-card:hover .syl-media-img {
      transform: scale(1.04);
    }

    /* Program Dropdown Select Box */
    .syl-select-container {
      background: #FAF9F5;
      border: 2px solid #C5A059;
      border-radius: 14px;
      padding: 28px 32px;
      margin-bottom: 36px;
      box-shadow: 0 4px 20px rgba(197, 160, 89, 0.1);
    }
    .syl-select-label {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 12px;
      display: block;
    }
    .syl-custom-select {
      width: 100%;
      padding: 16px 20px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      color: #0C1424;
      background: #ffffff url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C5A059' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e") right 20px center / 20px no-repeat;
      border: 1px solid rgba(12, 20, 36, 0.15);
      border-radius: 10px;
      cursor: pointer;
      appearance: none;
      -webkit-appearance: none;
      transition: all 0.25s ease;
    }
    .syl-custom-select:hover,
    .syl-custom-select:focus {
      border-color: #E31B23;
      outline: none;
      box-shadow: 0 0 0 4px rgba(227, 27, 35, 0.1);
    }

    /* Program Grid Buttons */
    .syl-program-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 16px;
      margin-top: 24px;
    }
    .syl-prog-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 12px;
      color: #0C1424;
      font-weight: 600;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 2px 8px rgba(12, 20, 36, 0.03);
    }
    .syl-prog-btn:hover {
      background: #0C1424;
      color: #C5A059 !important;
      border-color: #0C1424;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(12, 20, 36, 0.1);
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
      <span class="rk-eyebrow tone-gold">38 · ACADEMICS &amp; SYLLABUS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">View Academic Syllabus</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Access course curricula, semester-wise syllabi, credit distribution, and subject outlines across all undergraduate, postgraduate, diploma, and doctoral programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="syl-main-section">
    <div class="rk-container">
      <div class="syl-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS PROGRAM SELECTOR & QUICK LINKS -->
        <div>

          <!-- SELECT PROGRAM DROPDOWN CARD -->
          <div class="syl-select-container">
            <label for="syllabusSelect" class="syl-select-label">SELECT ACADEMIC PROGRAM / FACULTY</label>
            <select id="syllabusSelect" class="syl-custom-select" onChange="window.location.href=this.value">
              <?php include __DIR__ . '/include/syllabus.php'; ?>
            </select>
          </div>

          <!-- OVERVIEW BLOCK -->
          <article class="syl-block-card">
            <div class="syl-card-header">
              <h2 class="syl-card-title">Academic Curricula &amp; Syllabi Repository</h2>
              <span class="syl-badge">UGC &amp; COUNCIL ALIGNED</span>
            </div>
            <div class="syl-card-body">
              
              <div class="syl-media-frame">
                <img src="images/ai_syllabus/rkdf_syllabus_card.jpg" alt="RKDF Academic Syllabus &amp; Library Resource Suite" class="syl-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Comprehensive Course Structure &amp; Scheme of Examination
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Select your academic discipline below to download or view the official syllabus, credit schemes, core subject requirements, elective pathways, and practical laboratory guidelines approved by the Academic Council.
              </p>

              <!-- QUICK ACCESS FACULTY SYLLABUS LINKS -->
              <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin-bottom:16px;">
                Direct Faculty Syllabus Access
              </h3>

              <div class="syl-program-grid">
                <a href="syllabusag.php" class="syl-prog-btn">Agriculture <span>→</span></a>
                <a href="syllabusarchitect.php" class="syl-prog-btn">Architecture <span>→</span></a>
                <a href="syllabusBAMS.php" class="syl-prog-btn">Ayurveda (BAMS) <span>→</span></a>
                <a href="syllabusBe.php" class="syl-prog-btn">B.E. Engineering <span>→</span></a>
                <a href="syllabuscommerce.php" class="syl-prog-btn">Commerce <span>→</span></a>
                <a href="syllabusMca.php" class="syl-prog-btn">Computer Application <span>→</span></a>
                <a href="syllabusedu.php" class="syl-prog-btn">Education (B.Ed/M.Ed) <span>→</span></a>
                <a href="syllabusLaw.php" class="syl-prog-btn">Law <span>→</span></a>
                <a href="syllabuslib.php" class="syl-prog-btn">Library Science <span>→</span></a>
                <a href="syllabusMba.php" class="syl-prog-btn">Management (MBA) <span>→</span></a>
                <a href="syllabusMtech.php" class="syl-prog-btn">M.Tech. Engineering <span>→</span></a>
                <a href="syllabusparamedical.php" class="syl-prog-btn">Paramedical Sciences <span>→</span></a>
                <a href="syllabusnursing.php" class="syl-prog-btn">Nursing <span>→</span></a>
                <a href="syllabuspharmacy.php" class="syl-prog-btn">Pharmacy <span>→</span></a>
                <a href="syllabusPhD.php" class="syl-prog-btn">Ph.D. Course Work <span>→</span></a>
                <a href="syllabusPoly.php" class="syl-prog-btn">Polytechnic Diploma <span>→</span></a>
                <a href="syllabus_science.php" class="syl-prog-btn">Science <span>→</span></a>
                <a href="syllabusart.php" class="syl-prog-btn">Social Science <span>→</span></a>
                <a href="syllabus_Value-added.php" class="syl-prog-btn">Value Added Courses <span>→</span></a>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Quick Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link active">Course Syllabi <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="pharmacy.php" class="sidebar-link">Faculty of Pharmacy <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
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
