<?php
// ============================================================
// RKDF University — Ram Krishna College of Homoeopathy & Medical Sciences (BHMS)
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & CCH Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ram Krishna College of Homoeopathy &amp; Medical Sciences (BHMS) — RKDF University Bhopal</title>
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
                  url('images/ai_bhms/rkdf_bhms_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .bhms-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .bhms-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .bhms-grid-layout { grid-template-columns: 1fr; }
    }

    .bhms-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .bhms-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .bhms-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .bhms-badge {
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

    .bhms-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .bhms-card-body {
      padding: 32px 36px;
    }

    .bhms-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .bhms-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .bhms-block-card:hover .bhms-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .bhms-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .bhms-table th {
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
    .bhms-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .bhms-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .bhms-pdf-link {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 4px 10px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      margin-left: 8px;
    }
    .bhms-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">33 · MEDICAL FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.2rem, 5vw, 4.8rem);margin-top:12px;">Ram Krishna College of Homoeopathy &amp; Medical Sciences</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering future homoeopathic physicians, clinical researchers, and holistic healthcare specialists through CCH approved BHMS degree program.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="bhms-main-section">
    <div class="rk-container">
      <div class="bhms-grid-layout">
        
        <!-- LEFT COLUMN: BHMS COLLEGE & PROGRAM -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="bhms-block-card">
            <div class="bhms-card-header">
              <h2 class="bhms-card-title">BHMS Medical Degree Program</h2>
              <span class="bhms-badge">CCH APPROVED</span>
            </div>
            <div class="bhms-card-body">
              
              <div class="bhms-media-frame">
                <img src="images/ai_bhms/rkdf_bhms_card.jpg" alt="Ram Krishna College of Homoeopathy Hospital &amp; Campus" class="bhms-media-img">
              </div>

              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:16px;">
                <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;font-weight:700;margin:0;">
                  <a href="https://rkdf.ac.in/homoeopathy/" target="_blank" style="color:#0C1424;text-decoration:none;">
                    Ram Krishna College of Homoeopathy &amp; Medical Sciences ↗
                  </a>
                </h3>
                <a href="https://rkdf.ac.in/approval/BHMS_2022.pdf" target="_blank" class="bhms-pdf-link">📄 CCH Approval Letter ↗</a>
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Ram Krishna College of Homoeopathy &amp; Medical Sciences, RKDF University Bhopal is a premier institution recognized by the Central Council of Homoeopathy (CCH) / National Commission for Homoeopathy (NCH), Ministry of AYUSH, Govt. of India.
              </p>

              <!-- DEGREE PROGRAM TABLE -->
              <table class="bhms-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Intake Seats</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>B.H.M.S. (Bachelor of Homoeopathic Medicine and Surgery)</strong></td>
                    <td>4.5 Years <br><span style="font-size:12.5px;color:#64748B;">(+ 1 Year Internship)</span></td>
                    <td>100</td>
                    <td>Passed in 10+2 or equivalent examination in science with PCB (Physics, Chemistry, Biology) and English as compulsory subjects with at least 50% marks and must have minimum age of 17 years.</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Medical &amp; Health Faculties</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="BHMS.php" class="sidebar-link active">Homoeopathy (BHMS) <span>→</span></a></li>
              <li><a href="BAMS.php" class="sidebar-link">Ayurveda (BAMS) <span>→</span></a></li>
              <li><a href="pharmacy.php" class="sidebar-link">Faculty of Pharmacy <span>→</span></a></li>
              <li><a href="Science.php" class="sidebar-link">Faculty of Science <span>→</span></a></li>
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
