<?php
// ============================================================
// RKDF University — Board of Management (BoM)
// World-Class Premium Design + High-Res Media Assets + 100% Original PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Board of Management (BoM) — RKDF University Bhopal</title>
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
                  url('images/ai_bom/rkdf_bom_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .bom-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .bom-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .bom-grid-layout { grid-template-columns: 1fr; }
    }

    .bom-featured-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      transition: transform 0.35s ease;
    }
    .bom-featured-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 36px rgba(12, 20, 36, 0.08);
    }

    .bom-badge {
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

    .bom-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff !important;
      padding: 14px 24px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(12,20,36,0.12);
    }
    .bom-pdf-btn:hover {
      background: #E31B23;
      box-shadow: 0 8px 22px rgba(227,27,35,0.3);
      transform: translateY(-2px);
    }

    .bom-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
    }

    .bom-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .bom-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .bom-card-body {
      padding: 32px 36px;
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
      <span class="rk-eyebrow tone-gold">18 · EXECUTIVE AUTHORITY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Board of Management (BoM)</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        The executive governing body responsible for institutional management, administrative policies, and university governance.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="bom-main-section">
    <div class="rk-container">
      <div class="bom-grid-layout">
        
        <!-- LEFT COLUMN: FEATURED CARD & GOVERNANCE FUNCTIONS -->
        <div>

          <!-- FEATURED CARD: BOARD OF MANAGEMENT MEMBERS -->
          <div class="bom-featured-card">
            <div>
              <span class="bom-badge">EXECUTIVE DIRECTORY</span>
              <h2 style="font-family:'Playfair Display',serif;font-size:26px;color:#0C1424;margin-top:10px;margin-bottom:8px;">
                Board of Management Member Directory
              </h2>
              <p style="font-size:15px;color:#475569;max-width:560px;margin:0;">
                Official statutory constitution and member list of the Board of Management of RKDF University Bhopal.
              </p>
            </div>
            <a href="Content/Documents/board_of_management/Board of Management Member.pdf" target="_blank" class="bom-pdf-btn">
              📄 View BoM Members List (PDF) ↗
            </a>
          </div>

          <!-- GOVERNANCE FUNCTIONS CARD -->
          <article class="bom-block-card">
            <div class="bom-card-header">
              <h2 class="bom-card-title">Functions &amp; Executive Authority</h2>
              <span class="bom-badge">STATUTORY POWERS</span>
            </div>
            <div class="bom-card-body">
              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin:0;">
                The Board of Management is the principal executive authority of RKDF University Bhopal. It exercises general supervision over the management, financial planning, administrative affairs, and strategic policy implementations across all departments and faculties of the university.
              </p>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Statutory Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Academic_Council.php" class="sidebar-link">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link">Board of Studies (BOS) <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link active">Board of Management <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link">Governing Body <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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