<?php
// ============================================================
// RKDF University — Doctoral Research Disciplines (Ph.D. Subjects)
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & Course Subjects Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ph.D. Research Disciplines &amp; Specializations — RKDF University Bhopal</title>
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
                  url('images/ai_phdsubjects/rkdf_phdsubj_banner.jpg') center/cover no-repeat;
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
      padding: 5px 14px;
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
      padding: 32px 36px;
    }

    .sphd-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
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

    /* Ph.D. Disciplines Grid */
    .sphd-subj-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 16px;
      margin-top: 24px;
    }

    .sphd-subj-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: all 0.25s ease;
    }
    .sphd-subj-card:hover {
      background: #0C1424;
      border-color: #0C1424;
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(12, 20, 36, 0.1);
    }

    .sphd-subj-icon {
      font-size: 24px;
    }

    .sphd-subj-name {
      font-size: 15px;
      font-weight: 700;
      color: #0C1424;
      transition: color 0.25s ease;
    }
    .sphd-subj-card:hover .sphd-subj-name {
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
      <span class="rk-eyebrow tone-gold">75 · DOCTOR OF PHILOSOPHY (PH.D) RESEARCH DISCIPLINES</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Ph.D. Subjects &amp; Research Areas</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Doctoral research academic disciplines offered under expert faculty supervisions, UGC compliant regulations, and advanced research facilities.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sphd-main-section">
    <div class="rk-container">
      <div class="sphd-grid-layout">
        
        <!-- LEFT COLUMN: RESEARCH SUBJECTS GRID -->
        <div>

          <article class="sphd-block-card">
            <div class="sphd-card-header">
              <h2 class="sphd-card-title">Approved Doctoral Research Specializations</h2>
              <span class="sphd-badge">UGC APPROVED DISCIPLINES</span>
            </div>
            <div class="sphd-card-body">

              <div class="sphd-media-frame">
                <img src="images/ai_phdsubjects/rkdf_phdsubj_card.jpg" alt="RKDF Doctoral Research Scholars &amp; Advanced Laboratories" class="sphd-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Ph.D. Academic Subjects Offered
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                RKDF University offers Doctoral of Philosophy (Ph.D.) degree programs across 20 scientific, engineering, management, pharmaceutical, humanities, and legal specializations:
              </p>

              <!-- DISCIPLINES GRID -->
              <div class="sphd-subj-grid">

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">📐</span>
                  <span class="sphd-subj-name">Ph.D. in Mathematics</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🦁</span>
                  <span class="sphd-subj-name">Ph.D. in Zoology</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🧫</span>
                  <span class="sphd-subj-name">Ph.D. in Microbiology</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🧪</span>
                  <span class="sphd-subj-name">Ph.D. in Chemistry</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🌿</span>
                  <span class="sphd-subj-name">Ph.D. in Botany</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">⚛️</span>
                  <span class="sphd-subj-name">Ph.D. in Physics</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🧬</span>
                  <span class="sphd-subj-name">Ph.D. in Biotechnology</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">📊</span>
                  <span class="sphd-subj-name">Ph.D. in Commerce</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">💼</span>
                  <span class="sphd-subj-name">Ph.D. in Management</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🎓</span>
                  <span class="sphd-subj-name">Ph.D. in Education</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">💊</span>
                  <span class="sphd-subj-name">Ph.D. in Pharmaceutical Science</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">⚡</span>
                  <span class="sphd-subj-name">Ph.D. in Electrical Engineering</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">💻</span>
                  <span class="sphd-subj-name">Ph.D. in Computer Science &amp; Engg.</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🏗️</span>
                  <span class="sphd-subj-name">Ph.D. in Civil Engineering</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">📡</span>
                  <span class="sphd-subj-name">Ph.D. in Electronics &amp; Comm. Engg.</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">⚙️</span>
                  <span class="sphd-subj-name">Ph.D. in Mechanical Engineering</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🌐</span>
                  <span class="sphd-subj-name">Ph.D. in Sociology</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">⚖️</span>
                  <span class="sphd-subj-name">Ph.D. in Law</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">📚</span>
                  <span class="sphd-subj-name">Ph.D. in English</span>
                </div>

                <div class="sphd-subj-card">
                  <span class="sphd-subj-icon">🖥️</span>
                  <span class="sphd-subj-name">Ph.D. in Computer Science &amp; App.</span>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Doctoral Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="phdsubjects.php" class="sidebar-link active">Ph.D. Subjects <span>→</span></a></li>
              <li><a href="syllabusPhD.php" class="sidebar-link">Ph.D. Coursework Syllabus <span>→</span></a></li>
              <li><a href="patent.php" class="sidebar-link">Patents &amp; Innovations <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="Annual_Report_University.php" class="sidebar-link">Annual Reports <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
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
