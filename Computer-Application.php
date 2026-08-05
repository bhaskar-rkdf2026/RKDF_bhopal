<?php
// ============================================================
// RKDF University — Faculty of Computer Science & Application
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & AICTE EOA Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Computer Science &amp; Application — RKDF University Bhopal</title>
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
                  url('images/ai_computer_application/rkdf_ca_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ca-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ca-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ca-grid-layout { grid-template-columns: 1fr; }
    }

    .ca-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ca-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ca-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ca-badge {
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

    .ca-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ca-card-body {
      padding: 32px 36px;
    }

    .ca-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ca-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ca-block-card:hover .ca-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .ca-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .ca-table th {
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
    .ca-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .ca-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .ca-pdf-link {
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
    .ca-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    .inst-header-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 28px;
      padding-top: 24px;
      border-top: 1px solid rgba(12, 20, 36, 0.08);
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
      <span class="rk-eyebrow tone-gold">27 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Computer Science &amp; Application</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Fostering digital transformation, software development, cloud computing, and AI research through AICTE approved MCA, BCA, PGDCA, DCA, and Ph.D. degree programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ca-main-section">
    <div class="rk-container">
      <div class="ca-grid-layout">
        
        <!-- LEFT COLUMN: COMPUTER APPLICATION PROGRAMS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="ca-block-card">
            <div class="ca-card-header">
              <h2 class="ca-card-title">Computer Science &amp; Application Programs</h2>
              <span class="ca-badge">AICTE APPROVED</span>
            </div>
            <div class="ca-card-body">
              
              <div class="ca-media-frame">
                <img src="images/ai_computer_application/rkdf_ca_lab.jpg" alt="RKDF Computer Science Lab" class="ca-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Industry-Driven IT &amp; Software Development Education
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Computer Science &amp; Application at RKDF University Bhopal prepares students for careers in software engineering, full-stack development, database administration, and artificial intelligence through industry-aligned degree and diploma programs.
              </p>

              <!-- CONSTITUENT INSTITUTE: SRI SATYA SAI COLLEGE OF ENGINEERING -->
              <div class="inst-header-box" style="margin-top:0;padding-top:0;border-top:none;">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Sri Satya Sai College of Engineering
                </h3>
                <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/SSSCE%20EOA%20Report%202022-23.PDF" target="_blank" class="ca-pdf-link">📄 AICTE EOA Report ↗</a>
              </div>
              <table class="ca-table">
                <thead>
                  <tr>
                    <th>Courses</th>
                    <th>Sem / Duration</th>
                    <th>Intake Seats</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Master of Computer Applications (MCA)</strong></td>
                    <td>4 Sem</td>
                    <td>60</td>
                    <td>Passed BCA/ Bachelor Degree in Computer Science Engineering or equivalent Degree. OR Passed B.Sc./ B.Com./ B.A. with Mathematics at 10+2 Level or at Graduation Level (with additional bridge Courses as per the norms of the concerned University). Obtained at least 50% marks (45% marks in case of candidates belonging to reserved category) in the qualifying Examination.</td>
                  </tr>
                </tbody>
              </table>

              <!-- DEPARTMENT OF RKDF UNIVERSITY, BHOPAL -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Department of RKDF University, Bhopal
                </h3>
              </div>
              <table class="ca-table">
                <thead>
                  <tr>
                    <th>Courses</th>
                    <th>Sem / Duration</th>
                    <th>Intake Seats</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Bachelor of Computer Applications (BCA)</strong></td>
                    <td>6 Sem</td>
                    <td>60</td>
                    <td>Passed 10+2 or equivalent examination in science or commerce subjects.</td>
                  </tr>
                  <tr>
                    <td><strong>Post Graduate Diploma in Computer Applications (PGDCA)</strong></td>
                    <td>1 Year</td>
                    <td>240</td>
                    <td>Graduate with minimum 50% marks or equivalent grade points.</td>
                  </tr>
                  <tr>
                    <td><strong>Diploma in Computer Applications (DCA)</strong></td>
                    <td>1 Year</td>
                    <td>240</td>
                    <td>Passed 10+2 or equivalent examination in any subjects.</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. BLOCK -->
          <article class="ca-block-card">
            <div class="ca-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="ca-card-title">Doctor of Philosophy (Ph.D) in Computer Science</h2>
              <span class="ca-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="ca-card-body">
              <table class="ca-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ph.D. - Computer Science</strong></td>
                    <td>As per UGC Norms.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Faculties</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Computer-Application.php" class="sidebar-link active">Faculty of Computer App. <span>→</span></a></li>
              <li><a href="pharmacy.php" class="sidebar-link">Faculty of Pharmacy <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="Commerce.php" class="sidebar-link">Faculty of Commerce <span>→</span></a></li>
              <li><a href="Science.php" class="sidebar-link">Faculty of Science <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
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
