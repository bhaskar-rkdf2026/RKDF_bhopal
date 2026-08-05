<?php
// ============================================================
// RKDF University — Local Core Advisory Group
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
  <title>Local Core Advisory Group — RKDF University Bhopal</title>
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
                  url('images/ai_advisory/rkdf_advisory_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .adv-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .adv-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .adv-grid-layout { grid-template-columns: 1fr; }
    }

    .adv-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .adv-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .adv-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .adv-badge {
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

    .adv-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .adv-card-body {
      padding: 36px 32px;
    }

    .adv-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .adv-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .adv-block-card:hover .adv-media-img {
      transform: scale(1.04);
    }

    .adv-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    /* Pillars */
    .adv-pillars-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 20px;
      margin-top: 28px;
    }
    .adv-pillar-item {
      background: #FAF9F5;
      border: 1px solid rgba(12,20,36,0.08);
      border-left: 4px solid #E31B23;
      border-radius: 14px;
      padding: 24px;
    }
    .adv-pillar-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .adv-pillar-desc {
      font-size: 14px;
      line-height: 1.65;
      color: #475569;
      margin: 0;
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
      <span class="rk-eyebrow tone-gold">11 · GOVERNANCE &amp; ADVISORY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Local Core Advisory Group</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Executing national core group recommendations, academic innovation, and institutional excellence across RKDF constituent colleges.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="adv-main-section">
    <div class="rk-container">
      <div class="adv-grid-layout">
        
        <!-- LEFT COLUMN: ADVISORY GROUP OVERVIEW -->
        <div>

          <article class="adv-block-card">
            <div class="adv-card-header">
              <h2 class="adv-card-title">Local Core Advisory Group</h2>
              <span class="adv-badge">ADVISORY BODIES</span>
            </div>
            <div class="adv-card-body">
              
              <div class="adv-media-frame">
                <img src="images/ai_advisory/rkdf_advisory_group.jpg" alt="RKDF Advisory Group Leadership" class="adv-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Strategic Execution &amp; Academic Leadership
              </div>

              <p class="adv-text-p">
                Likewise a Local Core Group comprised of selected Directors, Principals and Emeritus Faculty from the RKDF University colleges has been formed to pursue and execute the recommendations of the National Core Groups. Learning we believe has to be consummate and to be so it has to transcend the classroom. Our aim is to create an environment where academics does not impose, but eases its way seamlessly into all round student life.
              </p>

              <!-- Advisory Pillars -->
              <div class="adv-pillars-grid">
                <div class="adv-pillar-item">
                  <h3 class="adv-pillar-title">Directorate Leadership</h3>
                  <p class="adv-pillar-desc">Comprised of senior Directors and Principals driving constituent college excellence.</p>
                </div>
                <div class="adv-pillar-item">
                  <h3 class="adv-pillar-title">National Recommendations</h3>
                  <p class="adv-pillar-desc">Executing core recommendations from National Advisory Groups seamlessly into curricula.</p>
                </div>
                <div class="adv-pillar-item">
                  <h3 class="adv-pillar-title">Holistic Learning Environment</h3>
                  <p class="adv-pillar-desc">Creating seamless academic integration that transcends traditional classroom boundaries.</p>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Advisory &amp; Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Statuary-Bodies.php" class="sidebar-link">National Core Advisory Group <span>→</span></a></li>
              <li><a href="localadvisory.php" class="sidebar-link active">Local Core Advisory Group <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link">Governing Body <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link">Board of Management <span>→</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link">Board of Studies <span>→</span></a></li>
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
