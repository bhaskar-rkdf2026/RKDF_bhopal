<?php
// ============================================================
// RKDF University — Faculty of Science
// World-Class Premium Design + High-Res Media Assets + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Science — RKDF University Bhopal</title>
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
                  url('images/ai_science/rkdf_science_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sci-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sci-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sci-grid-layout { grid-template-columns: 1fr; }
    }

    .sci-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sci-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sci-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sci-badge {
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

    .sci-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sci-card-body {
      padding: 32px 36px;
    }

    .sci-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sci-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sci-block-card:hover .sci-media-img {
      transform: scale(1.04);
    }

    /* Program Table */
    .sci-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
    }
    .sci-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 16px 20px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .sci-table td {
      padding: 16px 20px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14.5px;
      color: #334155;
    }
    .sci-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .phd-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 16px;
      margin-top: 18px;
    }
    .phd-card-item {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 12px;
      padding: 16px 18px;
    }
    .phd-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }
    .phd-card-rule {
      font-size: 12.5px;
      color: #E31B23;
      font-weight: 600;
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
      <span class="rk-eyebrow tone-gold">23 · ACADEMIC FACULTY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty of Science</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Pioneering scientific research, biotechnology, physical sciences, chemical innovation, and doctoral studies across pure and applied sciences.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sci-main-section">
    <div class="rk-container">
      <div class="sci-grid-layout">
        
        <!-- LEFT COLUMN: SCIENCE PROGRAMS & RESEARCH -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="sci-block-card">
            <div class="sci-card-header">
              <h2 class="sci-card-title">Science Degree Programs</h2>
              <span class="sci-badge">UGC RECOGNIZED</span>
            </div>
            <div class="sci-card-body">
              
              <div class="sci-media-frame">
                <img src="images/ai_science/rkdf_science_lab.jpg" alt="RKDF Faculty of Science Laboratory" class="sci-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Undergraduate &amp; Postgraduate Degree Programs
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Faculty of Science at RKDF University Bhopal offers high-caliber undergraduate (B.Sc.), postgraduate (M.Sc.), and doctoral (Ph.D.) degree programs across physical, chemical, biological, mathematical, and computer sciences.
              </p>

              <!-- DEGREE PROGRAMS TABLE -->
              <table class="sci-table">
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
                    <td><strong>B.Sc.</strong></td>
                    <td>6 Sem</td>
                    <td>180</td>
                    <td>Passed 10+2 or equivalent examination in science or relevant subjects.</td>
                  </tr>
                  <tr>
                    <td>
                      <strong>M.Sc.</strong><br>
                      <span style="font-size:13px;color:#64748B;">(Biotechnology / Chemistry / Physics / Microbiology / Botany / Zoology / Computer Science)</span>
                    </td>
                    <td>4 Sem</td>
                    <td>130</td>
                    <td>Passed Bachelor Degree of 3yrs minimum or equivalent in relevant subjects from recognized University by UGC/ AIU.</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </article>

          <!-- Ph.D. SPECIALIZATIONS BLOCK -->
          <article class="sci-block-card">
            <div class="sci-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="sci-card-title">Doctor of Philosophy (Ph.D.) Programs</h2>
              <span class="sci-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DOCTORAL STUDIES</span>
            </div>
            <div class="sci-card-body">
              <p style="font-size:15px;color:#475569;margin-bottom:20px;font-weight:600;">
                Doctoral research programs offered as per UGC Norms across 7 scientific disciplines:
              </p>

              <div class="phd-grid">
                
                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Biotechnology</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Microbiology</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Botany</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Zoology</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Physics</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Chemistry</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

                <div class="phd-card-item">
                  <div class="phd-card-title">Ph.D. - Mathematics</div>
                  <div class="phd-card-rule">As per UGC Norms</div>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Faculties</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Science.php" class="sidebar-link active">Faculty of Science <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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
