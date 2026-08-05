<?php
// ============================================================
// RKDF University — Pro-Chancellor's Desk
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
  <title>Pro-Chancellor's Desk — RKDF University Bhopal</title>
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
                  url('images/ai_prochancellor/rkdf_prochancellor_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .prochan-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .prochan-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .prochan-grid-layout { grid-template-columns: 1fr; }
    }

    .prochan-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .prochan-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .prochan-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .prochan-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.18);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .prochan-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .prochan-card-body {
      padding: 36px 32px;
    }

    .prochan-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .prochan-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .prochan-block-card:hover .prochan-media-img {
      transform: scale(1.04);
    }

    .prochan-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .prochan-sig-box {
      margin-top: 36px;
      padding: 28px 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #E31B23;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .prochan-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .prochan-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #E31B23;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .prochan-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .prochan-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .prochan-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .prochan-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .prochan-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .prochan-side-badge {
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

    .prochan-meta-list {
      margin-top: 24px;
      padding-top: 20px;
      border-top: 1px solid rgba(12, 20, 36, 0.08);
      text-align: left;
      font-size: 14px;
      color: #475569;
      display: flex;
      flex-direction: column;
      gap: 12px;
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
      <span class="rk-eyebrow tone-gold">04 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Pro-Chancellor's Desk</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering scholars through academic excellence, cutting-edge research, and sustainable innovation with Dr. Siddharth Kapoor, Pro-Chancellor.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="prochan-main-section">
    <div class="rk-container">
      <div class="prochan-grid-layout">
        
        <!-- LEFT COLUMN: PRO-CHANCELLOR MESSAGE -->
        <div>

          <article class="prochan-block-card">
            <div class="prochan-card-header">
              <h2 class="prochan-card-title">Message From The Pro-Chancellor</h2>
              <span class="prochan-badge">PRO-CHANCELLOR ADDRESS</span>
            </div>
            <div class="prochan-card-body">
              
              <div class="prochan-media-frame">
                <img src="images/ai_prochancellor/rkdf_prochancellor_research.jpg" alt="RKDF Research & Innovation" class="prochan-media-img">
              </div>

              <p class="prochan-text-p">
                Education is for transition of a competent scholar to a seasoned professional equipped with expertise in the chosen field. The standard requirements are increasing with every passing year, what has been extra ordinary in the last decade is merely termed sufficient. The levels of desired excellence are increasing in this competitive era, the scholar needs to uplift their levels of knowledge and inculcate a diverse range of acquaintance to attain decisive excellence in the desired fields. In this knowledge driven era, the plethora of knowledge, student centric methods, advanced teaching methodologies have synergized learning and ensured students attract a good quantum of knowledge and expertise. The value added course, special classes and workshops and expert lectures have further positive impact on enhancing students learning and abilities.
              </p>

              <p class="prochan-text-p">
                RKDF University, Bhopal among the top educational hubs of central India has been catering the needs by empowering its students with diverse set of knowledge, expertise, through several of its duly approved programs offered under various faculties, with state of-the-art facilities, infrastructure and well qualified faculty and developing a sound professional resource for the nation. There are numerous functional MOU’s with National and International academic institutions and industries that opens new opportunities in skill and competence progression.
              </p>

              <p class="prochan-text-p">
                Exemplary success attained by students under guidance of learned faculties, while working on most advanced techniques and facility; generating intellectual property rights for themselves and University are source of energy and inspiration.
              </p>

              <p class="prochan-text-p">
                The faculties and scholars of University are involved in cutting edge research which are highlighted and appreciated at national and international platforms. The University has also extended its Carbon Capture and Sequestration plant to scientists of CSIR labs who are exploring possibilities and innovations feasible for environment mitigation and societal use.
              </p>

              <p class="prochan-text-p">
                The emphasis on inclusive development of scholars has led learning as a fun filled activity at RKDF University, Bhopal and hence is a first choice destination of students.
              </p>

              <p class="prochan-text-p" style="font-weight:600;color:#0C1424;">
                We welcome you to be part of the development and success of professionals.
              </p>

              <p class="prochan-text-p" style="font-family:'Playfair Display',serif;font-style:italic;font-size:18px;color:#E31B23;">
                Wishing the scholars - Happy Learning
              </p>

              <!-- Signature Box -->
              <div class="prochan-sig-box">
                <div>
                  <div class="prochan-sig-name">Dr. Siddharth Kapoor</div>
                  <div class="prochan-sig-role">Pro-Chancellor</div>
                  <div class="prochan-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: PRO-CHANCELLOR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Pro-Chancellor Profile Card -->
          <div class="prochan-side-card">
            <div class="prochan-portrait-box">
              <img src="images/img/Dr_Siddhart_Kapoor-N.jpeg" alt="Dr. Siddharth Kapoor — Pro-Chancellor" class="prochan-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="prochan-side-name">Dr. Siddharth Kapoor</h3>
            <div><span class="prochan-side-badge">Pro-Chancellor</span></div>
            <div style="font-size:14.5px;color:#475569;font-weight:600;">RKDF University, Bhopal</div>

            <div class="prochan-meta-list">
              <div>📍 <strong>Campus:</strong> Gandhi Nagar, Bhopal (M.P.)</div>
              <div>🌱 <strong>Key Research:</strong> Carbon Capture &amp; CSIR Projects</div>
              <div>🤝 <strong>MoUs:</strong> National &amp; International Academics</div>
            </div>
          </div>

          <!-- Quick Navigation -->
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link active">Pro-Chancellor Desk <span>→</span></a></li>
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
