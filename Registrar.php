<?php
// ============================================================
// RKDF University — Registrar Profile & Desk
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
  <title>Registrar Profile &amp; Desk — RKDF University Bhopal</title>
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
                  url('images/ai_registrar/rkdf_registrar_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .reg-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .reg-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .reg-grid-layout { grid-template-columns: 1fr; }
    }

    .reg-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .reg-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .reg-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .reg-badge {
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

    .reg-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .reg-card-body {
      padding: 36px 32px;
    }

    .reg-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .reg-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .reg-block-card:hover .reg-media-img {
      transform: scale(1.04);
    }

    .reg-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .reg-sig-box {
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

    .reg-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .reg-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .reg-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .reg-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .reg-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .reg-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .reg-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }

    .reg-qual {
      font-size: 14px;
      color: #C5A059;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .reg-side-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 12px;
    }

    .reg-meta-list {
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
      <span class="rk-eyebrow tone-gold">08 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Registrar Profile &amp; Desk</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Overseeing university academic administration, statutory compliance, and official records with Dr. Satendra S. Thakur, Registrar.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="reg-main-section">
    <div class="rk-container">
      <div class="reg-grid-layout">
        
        <!-- LEFT COLUMN: REGISTRAR PROFILE OVERVIEW -->
        <div>

          <article class="reg-block-card">
            <div class="reg-card-header">
              <h2 class="reg-card-title">Registrar Profile &amp; Responsibilities</h2>
              <span class="reg-badge">REGISTRAR DESK</span>
            </div>
            <div class="reg-card-body">
              
              <div class="reg-media-frame">
                <img src="images/ai_registrar/rkdf_registrar_admin.jpg" alt="RKDF Academic Governance &amp; Administration" class="reg-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Academic Administration &amp; Statutory Governance
              </div>

              <p class="reg-text-p">
                The Office of the Registrar serves as the custodian of the official seal, statutory records, academic compliance, and administrative affairs of RKDF University Bhopal. As the chief administrative officer under the statutory framework, the Registrar manages university convocations, academic council documentation, regulatory approvals, and inter-departmental coordination.
              </p>

              <p class="reg-text-p">
                Dr. Satendra S. Thakur leads the Registrar Secretariat to ensure seamless student registration, verification services, statutory compliance, and transparent academic administration across all faculties of RKDF University.
              </p>

              <!-- Signature Box -->
              <div class="reg-sig-box">
                <div>
                  <div class="reg-sig-name">Dr. Satendra S. Thakur</div>
                  <div class="reg-sig-role">Registrar (MBA, Ph.D.)</div>
                  <div class="reg-sig-univ">RKDF University, Bhopal</div>
                </div>
                <div>
                  <span style="font-size:14px;color:#475569;font-weight:600;">✉️ <a href="mailto:registrar@rkdf.ac.in" style="color:#E31B23;text-decoration:none;">registrar@rkdf.ac.in</a></span>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: REGISTRAR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Registrar Profile Card -->
          <div class="reg-side-card">
            <div class="reg-portrait-box">
              <img src="images/img/Dr SATENDRA SINGH THAKUR.jpeg" alt="Dr. Satendra S. Thakur — Registrar" class="reg-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="reg-side-name">Dr. Satendra S. Thakur</h3>
            <div class="reg-qual">MBA, Ph.D.</div>
            <div><span class="reg-side-badge">Registrar</span></div>
            
            <div class="reg-meta-list">
              <div>📜 <strong>Designation:</strong> Registrar</div>
              <div>📞 <strong>Landline:</strong> +91 755-2740395</div>
              <div>✉️ <strong>Email:</strong> <a href="mailto:registrar@rkdf.ac.in" style="color:#E31B23;font-weight:600;text-decoration:none;">registrar@rkdf.ac.in</a></div>
              <div>📍 <strong>Office:</strong> Registrar Secretariat, Bhopal</div>
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
              <li><a href="dgr.php" class="sidebar-link">DGR Profile <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link active">Registrar Profile <span>→</span></a></li>
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
