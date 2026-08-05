<?php
// ============================================================
// RKDF University — Director General Management (DGM) Profile
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
  <title>Director General Management (DGM) — RKDF University Bhopal</title>
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
                  url('images/ai_dgm/rkdf_dgm_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .dgm-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .dgm-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .dgm-grid-layout { grid-template-columns: 1fr; }
    }

    .dgm-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .dgm-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .dgm-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .dgm-badge {
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

    .dgm-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .dgm-card-body {
      padding: 36px 32px;
    }

    .dgm-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .dgm-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .dgm-block-card:hover .dgm-media-img {
      transform: scale(1.04);
    }

    .dgm-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .dgm-sig-box {
      margin-top: 36px;
      padding: 28px 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .dgm-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .dgm-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .dgm-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .dgm-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .dgm-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .dgm-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .dgm-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .dgm-side-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      margin-bottom: 12px;
    }

    .dgm-meta-list {
      margin-top: 20px;
      padding-top: 16px;
      border-top: 1px solid rgba(12, 20, 36, 0.08);
      text-align: left;
      font-size: 14px;
      color: #475569;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    /* Sidebar Links */
    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-top: 0;
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
      <span class="rk-eyebrow tone-gold">06 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Director General Management</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Leading institutional management, operational quality standards, and academic administration with Dr. B. N. Singh.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="dgm-main-section">
    <div class="rk-container">
      <div class="dgm-grid-layout">
        
        <!-- LEFT COLUMN: DGM PROFILE OVERVIEW -->
        <div>

          <article class="dgm-block-card">
            <div class="dgm-card-header">
              <h2 class="dgm-card-title">Director General Management Profile</h2>
              <span class="dgm-badge">DGM DESK</span>
            </div>
            <div class="dgm-card-body">
              
              <div class="dgm-media-frame">
                <img src="images/ai_dgm/rkdf_dgm_admin.jpg" alt="RKDF Institutional Administration" class="dgm-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Executive Leadership &amp; Operational Excellence
              </div>

              <p class="dgm-text-p">
                The Office of the Director General Management (DGM) oversees the comprehensive strategic execution, administrative governance, and operational standards across RKDF University Bhopal. Working in close synergy with executive leadership, faculty deans, and department heads, the DGM ensures that institutional infrastructure, academic delivery systems, and student support services adhere to the highest national benchmarks.
              </p>

              <p class="dgm-text-p">
                Under the guidance of Dr. B. N. Singh, the management framework drives continuous quality enhancement, interdisciplinary academic growth, and seamless administrative support to empower students, research scholars, and faculty members across all university departments.
              </p>

              <!-- Signature Box -->
              <div class="dgm-sig-box">
                <div>
                  <div class="dgm-sig-name">Dr. B. N. Singh</div>
                  <div class="dgm-sig-role">Director General Management (DGM)</div>
                  <div class="dgm-sig-univ">RKDF University, Bhopal</div>
                </div>
                <div>
                  <span style="font-size:14px;color:#475569;font-weight:600;">✉️ drbnsingh@rkdf.ac.in</span>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: DGM PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- DGM Profile Card -->
          <div class="dgm-side-card">
            <div class="dgm-portrait-box">
              <img src="images/img/dr. B.N. Singh.jpg" alt="Dr. B. N. Singh — DGM" class="dgm-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="dgm-side-name">Dr. B. N. Singh</h3>
            <div><span class="dgm-side-badge">Director General Management</span></div>
            
            <div class="dgm-meta-list">
              <div>🏢 <strong>Designation:</strong> Director General Management (DGM)</div>
              <div>📍 <strong>Office:</strong> Administration Block, RKDF University Bhopal</div>
              <div>✉️ <strong>Email:</strong> <a href="mailto:drbnsingh@rkdf.ac.in" style="color:#E31B23;font-weight:600;text-decoration:none;">drbnsingh@rkdf.ac.in</a></div>
            </div>
          </div>

          <!-- Quick Navigation -->
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link">Pro-Chancellor Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="dgm.php" class="sidebar-link active">DGM Profile <span>→</span></a></li>
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
