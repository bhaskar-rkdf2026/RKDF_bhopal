<?php
// ============================================================
// RKDF University — Academic Faculties & University Departments Overview
// World-Class Premium Design + High-Res Media Assets + 100% Original Faculty Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Faculties &amp; Departments — RKDF University Bhopal</title>
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
                  url('images/ai_academic_dept/rkdf_acad_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sacad-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sacad-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sacad-grid-layout { grid-template-columns: 1fr; }
    }

    .sacad-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sacad-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sacad-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sacad-badge {
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

    .sacad-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sacad-card-body {
      padding: 32px 36px;
    }

    .sacad-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sacad-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sacad-block-card:hover .sacad-media-img {
      transform: scale(1.04);
    }

    /* Faculty Cards Grid */
    .sacad-fac-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 18px;
      margin-top: 24px;
    }

    .sacad-fac-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 22px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .sacad-fac-card:hover {
      background: #0C1424;
      border-color: #0C1424;
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
    }

    .sacad-fac-left {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .sacad-fac-icon {
      font-size: 26px;
    }

    .sacad-fac-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 16.5px;
      font-weight: 700;
      color: #0C1424;
      transition: color 0.25s ease;
    }
    .sacad-fac-card:hover .sacad-fac-name {
      color: #ffffff;
    }

    .sacad-fac-arrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 16px;
      color: #C5A059;
      transition: transform 0.25s ease;
    }
    .sacad-fac-card:hover .sacad-fac-arrow {
      transform: translateX(4px);
      color: #ffffff;
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
      <span class="rk-eyebrow tone-gold">79 · ACADEMIC DEPARTMENTS &amp; CONSTITUENT FACULTIES</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Academic Faculties &amp; Departments</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Comprehensive academic offerings across 16 constituent faculties, delivering industry-aligned diplomas, undergraduate, postgraduate, and doctoral degrees.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sacad-main-section">
    <div class="rk-container">
      <div class="sacad-grid-layout">
        
        <!-- LEFT COLUMN: FACULTIES GRID -->
        <div>

          <article class="sacad-block-card">
            <div class="sacad-card-header">
              <h2 class="sacad-card-title">Constituent University Faculties</h2>
              <span class="sacad-badge">16 ACADEMIC SCHOOLS</span>
            </div>
            <div class="sacad-card-body">

              <div class="sacad-media-frame">
                <img src="images/ai_academic_dept/rkdf_acad_card.jpg" alt="RKDF Academic Campus Buildings &amp; Research Centers" class="sacad-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Academic Discipline Hubs
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Explore RKDF University's academic faculties to view program offerings, admission eligibility, course fee structures, and departmental research centers:
              </p>

              <!-- FACULTY CARDS GRID -->
              <div class="sacad-fac-grid">

                <a href="Management.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">💼</span>
                    <span class="sacad-fac-name">Faculty of Management</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Science.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🔬</span>
                    <span class="sacad-fac-name">Faculty of Science</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Commerce.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">📈</span>
                    <span class="sacad-fac-name">Faculty of Commerce</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Engineering.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">⚙️</span>
                    <span class="sacad-fac-name">Faculty of Engineering &amp; Tech.</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="pharmacy.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">💊</span>
                    <span class="sacad-fac-name">Faculty of Pharmacy</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Computer-Application.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">💻</span>
                    <span class="sacad-fac-name">Faculty of Computer Science</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Education.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🎓</span>
                    <span class="sacad-fac-name">Faculty of Education</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Social-Science.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🌐</span>
                    <span class="sacad-fac-name">Faculty of Social Science</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Agriculture.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🌾</span>
                    <span class="sacad-fac-name">Faculty of Agriculture</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="architect.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🏛️</span>
                    <span class="sacad-fac-name">Faculty of Architecture</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Law.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">⚖️</span>
                    <span class="sacad-fac-name">Faculty of Law</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="BHMS.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🌿</span>
                    <span class="sacad-fac-name">Faculty of Homoeopathy</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="BAMS.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🌱</span>
                    <span class="sacad-fac-name">Faculty of Ayurveda (BAMS)</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="nursing.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🏥</span>
                    <span class="sacad-fac-name">Faculty of Nursing</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="paramdical.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">🩺</span>
                    <span class="sacad-fac-name">Faculty of Paramedical</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

                <a href="Library.php" class="sacad-fac-card">
                  <div class="sacad-fac-left">
                    <span class="sacad-fac-icon">📚</span>
                    <span class="sacad-fac-name">Faculty of Library Science</span>
                  </div>
                  <span class="sacad-fac-arrow">→</span>
                </a>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="academic&amp;departments.php" class="sidebar-link active">Faculties &amp; Departments <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabi Hub <span>→</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department <span>→</span></a></li>
              <li><a href="stafflist.php" class="sidebar-link">Faculty Directory <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
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
