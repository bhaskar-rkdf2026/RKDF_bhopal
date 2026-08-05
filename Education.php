<?php
// ============================================================
// RKDF University — Faculty of Education
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & NCTE Approval Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Education — RKDF University Bhopal</title>
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
                  url('images/ai_education/rkdf_education_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .edu-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .edu-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .edu-grid-layout { grid-template-columns: 1fr; }
    }

    .edu-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .edu-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .edu-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .edu-badge {
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

    .edu-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .edu-card-body {
      padding: 32px 36px;
    }

    .edu-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .edu-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .edu-block-card:hover .edu-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .edu-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .edu-table th {
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
    .edu-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14px;
      color: #334155;
    }
    .edu-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .edu-pdf-link {
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
    .edu-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">28 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Education</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Shaping visionary educators, school leaders, and pedagogical researchers through NCTE approved B.Ed., M.Ed., D.Ed., and Ph.D. degree programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="edu-main-section">
    <div class="rk-container">
      <div class="edu-grid-layout">
        
        <!-- LEFT COLUMN: EDUCATION PROGRAMS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="edu-block-card">
            <div class="edu-card-header">
              <h2 class="edu-card-title">Teacher Education Programs</h2>
              <span class="edu-badge">NCTE APPROVED</span>
            </div>
            <div class="edu-card-body">
              
              <div class="edu-media-frame">
                <img src="images/ai_education/rkdf_education_card.jpg" alt="RKDF Faculty of Education Classroom" class="edu-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                NCTE Accredited Professional Education Programs
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Education at RKDF University Bhopal is dedicated to transforming teacher training and educational research through rigorous curriculum, modern instructional technologies, micro-teaching laboratories, and school internships.
              </p>

              <!-- DEPARTMENT OF EDUCATION (RKDF UNIVERSITY) -->
              <div class="inst-header-box" style="margin-top:0;padding-top:0;border-top:none;">
                <div>
                  <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                    Department of Education (RKDF University)
                  </h3>
                  <div style="font-size:13px;color:#64748B;margin-top:2px;">(formerly known as Vedica College of Education)</div>
                </div>
                <a href="https://rkdf.ac.in/approval/vedica_B.ed.pdf" target="_blank" class="edu-pdf-link">📄 NCTE Approval Letter ↗</a>
              </div>
              <table class="edu-table">
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
                    <td><strong>Bachelor of Education (B.Ed)</strong></td>
                    <td>2 Years</td>
                    <td>100</td>
                    <td>Passed with at least 50% marks (45% for reserved Category) either in Bachelor’s Degree and/or in Master’s Degree in Sciences/ Social Sciences/ Humanity/ Commerce/ BE or B. Tech with specialization in Science and Mathematics with 55 % or any other qualification equivalent thereto.</td>
                  </tr>
                  <tr>
                    <td><strong>Master of Education (M.Ed)</strong></td>
                    <td>2 Years</td>
                    <td>35</td>
                    <td>Passed with at least 50% marks or equivalent grade (45% for reserved category) in B. Ed / B.A. B.Ed./ B.Sc.B.Ed./ B.El.Ed./ D. El. Ed with an undergraduate Degree (with 50% marks in each).</td>
                  </tr>
                </tbody>
              </table>

              <!-- VEDICA COLLEGE OF EDUCATION -->
              <div class="inst-header-box">
                <h3 style="font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#0C1424;margin:0;">
                  Vedica College of Education
                </h3>
                <a href="https://rkdf.ac.in/approval/DED%20RECOGNITION%20LETTER.pdf" target="_blank" class="edu-pdf-link">📄 NCTE Approval Letter ↗</a>
              </div>
              <table class="edu-table">
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
                    <td><strong>Diploma in Education (D.Ed / D.El.Ed)</strong></td>
                    <td>2 Years</td>
                    <td>50</td>
                    <td>Passed 10+2 or equivalent examination in any subjects. Obtained at least 50% marks.</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. BLOCK -->
          <article class="edu-block-card">
            <div class="edu-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="edu-card-title">Doctor of Philosophy (Ph.D) in Education</h2>
              <span class="edu-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL RESEARCH</span>
            </div>
            <div class="edu-card-body">
              <table class="edu-table">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Eligibility Criteria</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ph.D. - Education</strong></td>
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
              <li><a href="Education.php" class="sidebar-link active">Faculty of Education <span>→</span></a></li>
              <li><a href="Computer-Application.php" class="sidebar-link">Faculty of Computer App. <span>→</span></a></li>
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
