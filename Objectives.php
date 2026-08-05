<?php
// ============================================================
// RKDF University — Institutional Objectives
// World-Class Premium Design + AI Media Assets + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Objectives — RKDF University Bhopal</title>
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
                  url('images/ai_objectives/rkdf_objectives_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .obj-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .obj-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .obj-grid-layout { grid-template-columns: 1fr; }
    }

    .obj-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .obj-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .obj-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .obj-badge {
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

    .obj-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .obj-card-body {
      padding: 36px 32px;
    }

    .obj-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 28px;
      position: relative;
    }
    .obj-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .obj-block-card:hover .obj-media-img {
      transform: scale(1.04);
    }

    /* Pillars Grid */
    .obj-pillars-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 22px;
    }

    .obj-pillar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #E31B23;
      border-radius: 16px;
      padding: 28px 32px;
      box-shadow: 0 4px 18px rgba(12, 20, 36, 0.03);
      transition: all 0.3s ease;
      display: flex;
      gap: 24px;
      align-items: flex-start;
    }
    .obj-pillar-card:hover {
      transform: translateX(6px);
      box-shadow: 0 14px 34px rgba(12, 20, 36, 0.08);
      border-left-color: #C5A059;
    }

    .obj-num-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 17px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227, 27, 35, 0.08);
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .obj-item-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 21px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .obj-item-desc {
      font-size: 15.5px;
      line-height: 1.8;
      color: #334155;
      margin: 0;
    }

    /* Sidebar Styling */
    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      position: sticky;
      top: 100px;
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
      <span class="rk-eyebrow tone-gold">02 · INSTITUTIONAL FRAMEWORK</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">University Objectives</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Foundational goals driving academic competence, curriculum innovation, global research partnerships, and gender equity.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="obj-main-section">
    <div class="rk-container">
      <div class="obj-grid-layout">
        
        <!-- LEFT COLUMN: OBJECTIVES CONTENT -->
        <div>

          <!-- ── OVERVIEW CARD ── -->
          <article class="obj-block-card">
            <div class="obj-card-header">
              <h2 class="obj-card-title">Strategic Institutional Goals</h2>
              <span class="obj-badge">OBJECTIVES</span>
            </div>
            <div class="obj-card-body">
              <div class="obj-media-frame">
                <img src="images/ai_objectives/rkdf_objectives_card.jpg" alt="RKDF University Objectives" class="obj-media-img">
              </div>
              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin:0;">
                RKDF University Bhopal is established with the primary commitment to fulfill key strategic objectives that foster academic excellence, cutting-edge research, industry collaborations, and inclusive societal growth.
              </p>
            </div>
          </article>

          <!-- ── OBJECTIVES PILLARS GRID ── -->
          <div class="obj-pillars-grid">

            <!-- Objective 1 -->
            <div class="obj-pillar-card">
              <div class="obj-num-badge">01</div>
              <div>
                <h3 class="obj-item-title">Human Resource Competence</h3>
                <p class="obj-item-desc">
                  To build human resource competence in teaching, research and technology / knowledge sharing.
                </p>
              </div>
            </div>

            <!-- Objective 2 -->
            <div class="obj-pillar-card">
              <div class="obj-num-badge">02</div>
              <div>
                <h3 class="obj-item-title">Curriculum &amp; Delivery Systems</h3>
                <p class="obj-item-desc">
                  To institutionalize appropriate changes in course curricula and delivery systems to accommodate concerns and aspirations of all stakeholders.
                </p>
              </div>
            </div>

            <!-- Objective 3 -->
            <div class="obj-pillar-card">
              <div class="obj-num-badge">03</div>
              <div>
                <h3 class="obj-item-title">Global &amp; National Partnerships</h3>
                <p class="obj-item-desc">
                  To strengthen partnership with national and foreign institutions especially south–south cooperation for sustainable higher education and research.
                </p>
              </div>
            </div>

            <!-- Objective 4 -->
            <div class="obj-pillar-card">
              <div class="obj-num-badge">04</div>
              <div>
                <h3 class="obj-item-title">Gender Equity &amp; Quality Education</h3>
                <p class="obj-item-desc">
                  To promote gender equity and provide quality and relevant education through institutional networks.
                </p>
              </div>
            </div>

          </div>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link active">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="dgm.php" class="sidebar-link">DGM Profile <span>→</span></a></li>
              <li><a href="dgr.php" class="sidebar-link">DGR Profile <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link">Registrar Profile <span>→</span></a></li>
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