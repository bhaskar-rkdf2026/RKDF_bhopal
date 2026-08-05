<?php
// ============================================================
// RKDF University — Director General Research (DGR) Profile
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
  <title>Director General Research (DGR) — RKDF University Bhopal</title>
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
                  url('images/ai_dgr/rkdf_dgr_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .dgr-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .dgr-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .dgr-grid-layout { grid-template-columns: 1fr; }
    }

    .dgr-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .dgr-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .dgr-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .dgr-badge {
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

    .dgr-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .dgr-card-body {
      padding: 36px 32px;
    }

    .dgr-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .dgr-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .dgr-block-card:hover .dgr-media-img {
      transform: scale(1.04);
    }

    .dgr-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .dgr-sig-box {
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

    .dgr-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .dgr-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .dgr-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .dgr-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .dgr-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .dgr-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .dgr-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .dgr-side-badge {
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

    .dgr-meta-list {
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
      <span class="rk-eyebrow tone-gold">07 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Director General Research</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Pioneering advanced R&amp;D innovation, carbon capture technologies, and national scientific partnerships with Dr. Vinod Kumar Sethi.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="dgr-main-section">
    <div class="rk-container">
      <div class="dgr-grid-layout">
        
        <!-- LEFT COLUMN: DGR PROFILE OVERVIEW -->
        <div>

          <article class="dgr-block-card">
            <div class="dgr-card-header">
              <h2 class="dgr-card-title">Director General Research Profile</h2>
              <span class="dgr-badge">DGR DESK</span>
            </div>
            <div class="dgr-card-body">
              
              <div class="dgr-media-frame">
                <img src="images/ai_dgr/rkdf_dgr_lab.jpg" alt="RKDF Advanced Research &amp; Innovation" class="dgr-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Scientific Research Leadership &amp; Innovation Strategy
              </div>

              <p class="dgr-text-p">
                The Office of the Director General Research (DGR) leads the strategic direction of research, scientific projects, intellectual property development, and national R&amp;D partnerships at RKDF University Bhopal. Driving cutting-edge research across engineering, renewable energy, pharmaceutical sciences, and environmental sustainability, the DGR fosters a vibrant ecosystem for faculty, Ph.D. scholars, and student innovators.
              </p>

              <p class="dgr-text-p">
                Under the leadership of Dr. Vinod Kumar Sethi, RKDF University has launched pioneering research initiatives, including the Solar Integrated Carbon Capture &amp; Sequestration plant in collaboration with CSIR laboratories, numerous patents, and active MoUs with national and international research institutions.
              </p>

              <!-- Signature Box -->
              <div class="dgr-sig-box">
                <div>
                  <div class="dgr-sig-name">Dr. Vinod Kumar Sethi</div>
                  <div class="dgr-sig-role">Director General Research (DGR)</div>
                  <div class="dgr-sig-univ">RKDF University, Bhopal</div>
                </div>
                <div>
                  <span style="font-size:14px;color:#475569;font-weight:600;">✉️ <a href="mailto:vksethi1949@gmail.com" style="color:#E31B23;text-decoration:none;">vksethi1949@gmail.com</a></span>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: DGR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- DGR Profile Card -->
          <div class="dgr-side-card">
            <div class="dgr-portrait-box">
              <img src="images/img/vk sethi sir.jpg" alt="Dr. Vinod Kumar Sethi — DGR" class="dgr-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="dgr-side-name">Dr. Vinod Kumar Sethi</h3>
            <div><span class="dgr-side-badge">Director General Research</span></div>
            
            <div class="dgr-meta-list">
              <div>🔬 <strong>Designation:</strong> Director General Research (DGR)</div>
              <div>🌱 <strong>Focus Areas:</strong> Carbon Capture &amp; Solar Energy</div>
              <div>✉️ <strong>Email:</strong> <a href="mailto:vksethi1949@gmail.com" style="color:#E31B23;font-weight:600;text-decoration:none;">vksethi1949@gmail.com</a></div>
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
              <li><a href="dgm.php" class="sidebar-link">DGM Profile <span>→</span></a></li>
              <li><a href="dgr.php" class="sidebar-link active">DGR Profile <span>→</span></a></li>
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
