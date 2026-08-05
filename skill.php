<?php
// ============================================================
// RKDF University — Skill Enhancement Activities
// World-Class Premium Design + High-Res Media Assets + 100% Original Activity PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Enhancement Activities — RKDF University Bhopal</title>
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
                  url('images/ai_skill/rkdf_skill_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sk-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sk-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sk-grid-layout { grid-template-columns: 1fr; }
    }

    .sk-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sk-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sk-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sk-badge {
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

    .sk-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sk-card-body {
      padding: 32px 36px;
    }

    .sk-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sk-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sk-block-card:hover .sk-media-img {
      transform: scale(1.04);
    }

    /* Activity Download Row */
    .sk-download-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .sk-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .sk-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sk-row-info {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .sk-row-icon {
      font-size: 22px;
    }
    .sk-row-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }

    .sk-pdf-link {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 8px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .sk-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">44 · SKILL ENHANCEMENT &amp; VOCATIONAL TRAINING</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Skill Enhancement Activities</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering students through technical workshops, vocational certifications, soft skills training, and annual skill enhancement reports.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sk-main-section">
    <div class="rk-container">
      <div class="sk-grid-layout">
        
        <!-- LEFT COLUMN: SKILL ACTIVITIES REPORTS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="sk-block-card">
            <div class="sk-card-header">
              <h2 class="sk-card-title">Annual Skill Activity Reports</h2>
              <span class="sk-badge">ANNUAL REPORTS</span>
            </div>
            <div class="sk-card-body">
              
              <div class="sk-media-frame">
                <img src="images/ai_skill/rkdf_skill_card.jpg" alt="RKDF Student Skill Development Workshop" class="sk-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Vocational Training &amp; Practical Skill Workshops
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                RKDF University Bhopal conducts year-round skill enhancement programs including hands-on technical labs, industrial bootcamps, communication workshops, and certification drives across all departments. Access official annual activity reports below.
              </p>

              <!-- DOWNLOAD ROWS -->
              <div class="sk-download-list">

                <div class="sk-download-row">
                  <div class="sk-row-info">
                    <span class="sk-row-icon">🛠️</span>
                    <span class="sk-row-title">Skill Enhancement Activities 2021-22</span>
                  </div>
                  <a href="Activities/2021-22.pdf" target="_blank" class="sk-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sk-download-row">
                  <div class="sk-row-info">
                    <span class="sk-row-icon">⚙️</span>
                    <span class="sk-row-title">Skill Enhancement Activities 2020-21</span>
                  </div>
                  <a href="Activities/2020-21.pdf" target="_blank" class="sk-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sk-download-row">
                  <div class="sk-row-info">
                    <span class="sk-row-icon">💻</span>
                    <span class="sk-row-title">Skill Enhancement Activities 2019-20</span>
                  </div>
                  <a href="Activities/2019-20.pdf" target="_blank" class="sk-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sk-download-row">
                  <div class="sk-row-info">
                    <span class="sk-row-icon">📊</span>
                    <span class="sk-row-title">Skill Enhancement Activities 2018-19</span>
                  </div>
                  <a href="Activities/2018-19.pdf" target="_blank" class="sk-pdf-link">📄 Download PDF ↗</a>
                </div>

                <div class="sk-download-row">
                  <div class="sk-row-info">
                    <span class="sk-row-icon">🚀</span>
                    <span class="sk-row-title">Skill Enhancement Activities 2017-18</span>
                  </div>
                  <a href="Activities/2017-18.pdf" target="_blank" class="sk-pdf-link">📄 Download PDF ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Skill &amp; Academics</h3>
            <ul class="sidebar-nav-list">
              <li><a href="skill.php" class="sidebar-link active">Skill Enhancement <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Courses <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabus <span>→</span></a></li>
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
