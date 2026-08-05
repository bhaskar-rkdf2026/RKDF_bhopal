<?php
// ============================================================
// RKDF University — Digital Library & E-Resources Portal
// World-Class Premium Design + High-Res Media Assets + 100% Original Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Library &amp; E-Resources — RKDF University Bhopal</title>
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
                  url('images/ai_e_resource/rkdf_eres_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .eres-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .eres-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .eres-grid-layout { grid-template-columns: 1fr; }
    }

    .eres-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .eres-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .eres-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .eres-badge {
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

    .eres-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .eres-card-body {
      padding: 32px 36px;
    }

    .eres-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .eres-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .eres-block-card:hover .eres-media-img {
      transform: scale(1.04);
    }

    /* E-Resource Logo Grid */
    .eres-logo-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 24px;
      margin-top: 24px;
    }

    .eres-portal-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(12, 20, 36, 0.03);
    }
    .eres-portal-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 14px 30px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .eres-portal-logo {
      max-width: 150px;
      max-height: 80px;
      object-fit: contain;
      margin-bottom: 12px;
      filter: grayscale(10%);
      transition: filter 0.3s ease;
    }
    .eres-portal-card:hover .eres-portal-logo {
      filter: grayscale(0%);
    }

    .eres-portal-title {
      font-size: 13.5px;
      font-weight: 700;
      color: #0C1424;
      margin-top: 6px;
    }
    .eres-portal-sub {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11.5px;
      color: #E31B23;
      margin-top: 4px;
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
      <span class="rk-eyebrow tone-gold">39 · DIGITAL LIBRARY &amp; E-RESOURCES</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Digital Library &amp; E-Resources</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering students and researchers with 24/7 access to national digital libraries, NPTEL video lectures, DELNET e-journals, Shodhganga theses, and global e-book repositories.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="eres-main-section">
    <div class="rk-container">
      <div class="eres-grid-layout">
        
        <!-- LEFT COLUMN: E-RESOURCES PORTAL GRID -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="eres-block-card">
            <div class="eres-card-header">
              <h2 class="eres-card-title">National &amp; International Academic E-Portals</h2>
              <span class="eres-badge">24/7 DIGITAL ACCESS</span>
            </div>
            <div class="eres-card-body">
              
              <div class="eres-media-frame">
                <img src="images/ai_e_resource/rkdf_eres_card.jpg" alt="RKDF Central Library E-Resource Digital Terminal" class="eres-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Online Learning, E-Journals &amp; Doctoral Dissertations
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                RKDF University Bhopal provides students, faculty, and research scholars seamless single-sign-on access to premier digital learning platforms and international e-journal databases. Click on any portal below to access.
              </p>

              <!-- E-RESOURCE PORTAL GRID (All original links to eresourse_login.php & images preserved) -->
              <div class="eres-logo-grid">

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/swayam.png" alt="SWAYAM NPTEL MOOCs" class="eres-portal-logo">
                  <div class="eres-portal-title">SWAYAM Online Courses</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/shodh-ganga.gif" alt="Shodhganga Doctoral Dissertations" class="eres-portal-logo">
                  <div class="eres-portal-title">Shodhganga Repository</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/iit.png" alt="IIT Virtual Labs" class="eres-portal-logo">
                  <div class="eres-portal-title">IIT Virtual Labs</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/ndl.png" alt="National Digital Library of India (NDLI)" class="eres-portal-logo">
                  <div class="eres-portal-title">National Digital Library</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/Delnet.jpg" alt="DELNET Library Network" class="eres-portal-logo">
                  <div class="eres-portal-title">DELNET Network</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/nptel.jpg" alt="NPTEL Video Lectures" class="eres-portal-logo">
                  <div class="eres-portal-title">NPTEL Video Portal</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/epg.png" alt="e-PG Pathshala" class="eres-portal-logo">
                  <div class="eres-portal-title">e-PG Pathshala</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/iitbbslogo.jpg" alt="IIT Bhubaneswar E-Resource" class="eres-portal-logo">
                  <div class="eres-portal-title">IIT BBS Digital Suite</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/rgpv%20elib.jpg" alt="RGPV e-Library" class="eres-portal-logo">
                  <div class="eres-portal-title">RGPV e-Library</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/du-logo.png" alt="Delhi University Library" class="eres-portal-logo">
                  <div class="eres-portal-title">Delhi Univ. Library</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/OKR.jpg" alt="Open Knowledge Repository (OKR)" class="eres-portal-logo">
                  <div class="eres-portal-title">Open Knowledge Repository</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/pglib.png" alt="PG Library Resource" class="eres-portal-logo">
                  <div class="eres-portal-title">PG Library Portal</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/nih.png" alt="National Institutes of Health (NIH)" class="eres-portal-logo">
                  <div class="eres-portal-title">NIH Medical Database</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/highwire.jpg" alt="HighWire Press Stanford" class="eres-portal-logo">
                  <div class="eres-portal-title">HighWire Press</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/science.png" alt="ScienceDirect Journal Database" class="eres-portal-logo">
                  <div class="eres-portal-title">Science Direct Portal</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

                <a href="eresourse_login.php" class="eres-portal-card">
                  <img src="images/img/abhilekh-patel.jpg" alt="Abhilekh Patal National Archives" class="eres-portal-logo">
                  <div class="eres-portal-title">Abhilekh Patal Archives</div>
                  <div class="eres-portal-sub">Access Portal ↗</div>
                </a>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Digital Library Services</h3>
            <ul class="sidebar-nav-list">
              <li><a href="E_Resource.php" class="sidebar-link active">E-Resources Portal <span>→</span></a></li>
              <li><a href="eresourse_login.php" class="sidebar-link">E-Resource Login <span>→</span></a></li>
              <li><a href="Library.php" class="sidebar-link">Faculty of Library Science <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabus <span>→</span></a></li>
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
