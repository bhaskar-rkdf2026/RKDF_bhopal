<?php
// ============================================================
// RKDF University — University Academic Calendar
// World-Class Premium Design + High-Res Media Assets + 100% Original Calendar PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Academic Calendar — RKDF University Bhopal</title>
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
                  url('images/ai_academic_calendar/rkdf_acad_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .acad-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .acad-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .acad-grid-layout { grid-template-columns: 1fr; }
    }

    .acad-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .acad-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .acad-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .acad-badge {
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

    .acad-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .acad-card-body {
      padding: 32px 36px;
    }

    .acad-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .acad-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .acad-block-card:hover .acad-media-img {
      transform: scale(1.04);
    }

    /* Session List Cards */
    .session-group {
      margin-bottom: 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.06);
      border-radius: 14px;
      padding: 24px 28px;
    }

    .session-title {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .pdf-download-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 18px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 10px;
      margin-bottom: 10px;
      transition: all 0.25s ease;
    }
    .pdf-download-item:last-child {
      margin-bottom: 0;
    }
    .pdf-download-item:hover {
      border-color: #E31B23;
      transform: translateX(4px);
      box-shadow: 0 4px 14px rgba(12, 20, 36, 0.05);
    }

    .pdf-item-text {
      font-size: 15px;
      font-weight: 600;
      color: #0C1424;
    }

    .acad-pdf-link {
      font-size: 12.5px;
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
    .acad-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">41 · ACADEMIC SCHEDULES</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">University Academic Calendar</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official session schedules, registration deadlines, mid-term and semester examination timelines, and holiday schedules across all academic years.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="acad-main-section">
    <div class="rk-container">
      <div class="acad-grid-layout">
        
        <!-- LEFT COLUMN: ACADEMIC CALENDARS BY SESSION -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="acad-block-card">
            <div class="acad-card-header">
              <h2 class="acad-card-title">Session-wise Academic Calendars</h2>
              <span class="acad-badge">OFFICIAL NOTIFICATIONS</span>
            </div>
            <div class="acad-card-body">
              
              <div class="acad-media-frame">
                <img src="images/ai_academic_calendar/rkdf_acad_card.jpg" alt="RKDF Academic Session Planning &amp; Campus Life" class="acad-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Academic Session Notifications &amp; Semester Schedules
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Download official PDF copies of the university academic calendars and semester schedules approved by the Academic Council for current and previous academic sessions.
              </p>

              <!-- SESSION 2025-26 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2025-26</span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">LATEST SESSION</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Academic Calendar for 2025-26</span>
                  <a href="circular/academic%20calender%202025-26.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2024-25 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2024-25</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Academic Calendar for 2024-25</span>
                  <a href="circular/academic%20calender%202024-25.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2023-24 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2023-24</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2023-24 (1st Year Only)</span>
                  <a href="circular/Academic_Calendar,July-Dec_2023.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2023-24 (2nd Year Onwards)</span>
                  <a href="circular/Academic_Calender-2nd_year.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2023-24</span>
                  <a href="circular/Academic_Calender-jan_jun23.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2022-23 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2022-23</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2022-23</span>
                  <a href="circular/Academic%20Calendar,%20Jul%20-%20Dec%202022.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2022-23</span>
                  <a href="circular/Academic%20Calendar%20-%20Jan-Jun%202022.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2021-22 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2021-22</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2021-22 Revised</span>
                  <a href="circular/Academic%20Calendar%20Jan-Jun%202022.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2021-22 Revised</span>
                  <a href="circular/Academic%20Calendar%20July%20to%20Dec%202021-22.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2021-22</span>
                  <a href="circular/Academic%20Calendar%20-%20Jan-Jun%202022.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2021-22</span>
                  <a href="circular/Academic%20Calendar%20July%20to%20Dec%202021.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2020-21 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2020-21</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2020-21</span>
                  <a href="circular/Academic%20Calendar,%20Jan-Jun%202020.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2020-21</span>
                  <a href="circular/Academic%20Calendar,%20July%20to%20Dec%202020.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SESSION 2019-20 -->
              <div class="session-group">
                <div class="session-title">
                  <span>Academic Session 2019-20</span>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jan-Jun, 2019-20</span>
                  <a href="circular/Academic%20Calendar%20Jan-Jun%202019.pdf" target="_blank" class="acad-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="pdf-download-item">
                  <span class="pdf-item-text">Semester Schedule for Jul-Dec, 2019-20</span>
                  <a href="#" class="acad-pdf-link">📄 View Circular ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Quick Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="acadmiccalander.php" class="sidebar-link active">Academic Calendar <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabus <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabus <span>→</span></a></li>
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
