<?php
// ============================================================
// RKDF University — Other Officers of the University
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
  <title>Other Officers — RKDF University Bhopal</title>
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
                  url('images/ai_officers/rkdf_officers_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .off-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .off-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .off-grid-layout { grid-template-columns: 1fr; }
    }

    .off-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
    }

    .off-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .off-badge {
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

    .off-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .off-card-body {
      padding: 36px 32px;
    }

    /* Officers Grid Cards */
    .officers-cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 28px;
      margin-top: 10px;
    }

    .officer-item-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      transition: transform 0.35s ease, box-shadow 0.35s ease;
      text-align: center;
      padding: 28px 20px;
    }
    .officer-item-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 36px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .officer-avatar-box {
      width: 140px;
      height: 160px;
      margin: 0 auto 20px;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(12, 20, 36, 0.1);
      border: 2px solid #FAF9F5;
    }
    .officer-avatar-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .officer-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }

    .officer-qual {
      font-size: 13.5px;
      color: #C5A059;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .officer-role-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
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
      <span class="rk-eyebrow tone-gold">09 · EXECUTIVE GOVERNANCE</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Other Officers of the University</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Key administrative leaders managing examination control, student welfare, and financial administration at RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="off-main-section">
    <div class="rk-container">
      <div class="off-grid-layout">
        
        <!-- LEFT COLUMN: OFFICERS GRID -->
        <div>

          <article class="off-block-card">
            <div class="off-card-header">
              <h2 class="off-card-title">Key Administrative Officers</h2>
              <span class="off-badge">UNIVERSITY OFFICERS</span>
            </div>
            <div class="off-card-body">
              
              <div class="officers-cards-grid">
                
                <!-- Officer 1: Dr. Sunil Patil -->
                <div class="officer-item-card">
                  <div class="officer-avatar-box">
                    <img src="images/img/Patil Sir.jpg" alt="Dr. Sunil Patil — Exam Controller" class="officer-avatar-img" onError="this.src='images/lovable/rkdf-logo.png';">
                  </div>
                  <h3 class="officer-name">Dr. Sunil Patil</h3>
                  <div class="officer-qual">M.Tech, Ph.D.</div>
                  <div><span class="officer-role-badge">Exam Controller</span></div>
                </div>

                <!-- Officer 2: Dr. Ratnesh Kumar Jain -->
                <div class="officer-item-card">
                  <div class="officer-avatar-box">
                    <img src="images/img/Ratnesh Sir.jpg" alt="Dr. Ratnesh Kumar Jain — Dean Student Welfare" class="officer-avatar-img" onError="this.src='images/lovable/rkdf-logo.png';">
                  </div>
                  <h3 class="officer-name">Dr. Ratnesh Kumar Jain</h3>
                  <div class="officer-qual">M.Tech, Ph.D.</div>
                  <div><span class="officer-role-badge">Dean Student Welfare</span></div>
                </div>

                <!-- Officer 3: Sohaib Siddique -->
                <div class="officer-item-card">
                  <div class="officer-avatar-box">
                    <img src="images/img/Sohaib siddiqui.jfif" alt="Sohaib Siddique — C.F.A.O" class="officer-avatar-img" onError="this.src='images/lovable/rkdf-logo.png';">
                  </div>
                  <h3 class="officer-name">Sohaib Siddique</h3>
                  <div class="officer-qual">C.F.A.O</div>
                  <div><span class="officer-role-badge">RKDF University, Bhopal</span></div>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link">Pro-Chancellor Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="dgm.php" class="sidebar-link">DGM Profile <span>→</span></a></li>
              <li><a href="dgr.php" class="sidebar-link">DGR Profile <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link">Registrar Profile <span>→</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link active">Other Officer's <span>→</span></a></li>
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
