<?php
// ============================================================
// RKDF University — Faculty of Paramedical Sciences
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & MP Paramedical Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Paramedical Sciences — RKDF University Bhopal</title>
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
                  url('images/ai_paramedical/rkdf_paramed_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .paramed-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .paramed-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .paramed-grid-layout { grid-template-columns: 1fr; }
    }

    .paramed-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .paramed-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .paramed-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .paramed-badge {
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

    .paramed-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .paramed-card-body {
      padding: 32px 36px;
    }

    .paramed-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .paramed-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .paramed-block-card:hover .paramed-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .paramed-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .paramed-table th {
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
    .paramed-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .paramed-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .paramed-pdf-link {
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
    .paramed-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">36 · MEDICAL FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Paramedical Sciences</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Training skilled physiotherapists, medical laboratory technicians, radiographers, and clinical diagnostic experts through MP Paramedical Council approved degree &amp; diploma programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="paramed-main-section">
    <div class="rk-container">
      <div class="paramed-grid-layout">
        
        <!-- LEFT COLUMN: PARAMEDICAL PROGRAMS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="paramed-block-card">
            <div class="paramed-card-header">
              <h2 class="paramed-card-title">Paramedical Degree &amp; Diploma Programs</h2>
              <span class="paramed-badge">MP PARAMEDICAL APPROVED</span>
            </div>
            <div class="paramed-card-body">
              
              <div class="paramed-media-frame">
                <img src="images/ai_paramedical/rkdf_paramed_card.jpg" alt="Faculty of Paramedical Sciences Clinical Laboratory" class="paramed-media-img">
              </div>

              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:16px;">
                <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;font-weight:700;margin:0;">
                  Madhya Pradesh Paramedical Council Approved Programs
                </h3>
                <a href="https://rkdf.ac.in/approval/paramedical%202022-23.pdf" target="_blank" class="paramed-pdf-link">📄 MP Paramedical Approval Letter ↗</a>
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Paramedical Sciences at RKDF University Bhopal offers industry-aligned clinical diagnostic, physiotherapy, radiography, and lab technology courses backed by modern hospital rotations and practical training labs.
              </p>

              <!-- DEGREE & DIPLOMA PROGRAM TABLE -->
              <table class="paramed-table">
                <thead>
                  <tr>
                    <th>Courses</th>
                    <th>Duration</th>
                    <th>Intake Seats</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Bachelor of Physiotherapy (BPT)</strong></td>
                    <td>4.5 Years</td>
                    <td>50</td>
                    <td rowspan="5" style="vertical-align:middle;">Passed 10+2 in Science (PCB) with minimum 50% marks for unreserved category &amp; 40% for reserved category candidates.</td>
                  </tr>
                  <tr>
                    <td><strong>Bachelor of Medical Lab Technician (BMLT)</strong></td>
                    <td>3 Years</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td><strong>Diploma in Medical Lab Technician (DMLT)</strong></td>
                    <td>2 Years</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td><strong>Diploma in X-Ray Radiographer Technician</strong></td>
                    <td>2 Years</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td><strong>Diploma in Pharmacy (Homoeopathy)</strong></td>
                    <td>2 Years</td>
                    <td>50</td>
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
              <li><a href="paramdical.php" class="sidebar-link active">Paramedical Sciences <span>→</span></a></li>
              <li><a href="nursing.php" class="sidebar-link">Nursing (B.Sc / GNM) <span>→</span></a></li>
              <li><a href="BHMS.php" class="sidebar-link">Homoeopathy (BHMS) <span>→</span></a></li>
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
