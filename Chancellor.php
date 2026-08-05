<?php
// ============================================================
// RKDF University — Chancellor's Desk
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
  <title>Chancellor's Desk — RKDF University Bhopal</title>
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
                  url('images/ai_chancellor/rkdf_chancellor_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .chan-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .chan-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .chan-grid-layout { grid-template-columns: 1fr; }
    }

    .chan-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .chan-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .chan-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .chan-badge {
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

    .chan-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .chan-card-body {
      padding: 36px 32px;
    }

    .chan-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .chan-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .chan-block-card:hover .chan-media-img {
      transform: scale(1.04);
    }

    .chan-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .chan-sig-box {
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

    .chan-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .chan-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .chan-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .chan-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .chan-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .chan-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .chan-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .chan-side-badge {
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

    .chan-meta-list {
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
      <span class="rk-eyebrow tone-gold">03 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Chancellor's Desk</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        A message of vision, institutional mission, and educational empowerment from Dr. Sadhna Kapoor, Chancellor.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="chan-main-section">
    <div class="rk-container">
      <div class="chan-grid-layout">
        
        <!-- LEFT COLUMN: CHANCELLOR MESSAGE -->
        <div>

          <article class="chan-block-card">
            <div class="chan-card-header">
              <h2 class="chan-card-title">Message From The Chancellor</h2>
              <span class="chan-badge">CHANCELLOR ADDRESS</span>
            </div>
            <div class="chan-card-body">
              
              <div class="chan-media-frame">
                <img src="images/ai_chancellor/rkdf_chancellor_campus.jpg" alt="RKDF University Gandhi Nagar Campus" class="chan-media-img">
              </div>

              <p class="chan-text-p">
                Education is the prerequisite for socio-economic development of the Nation in general and people in particular. Not enough educational facilities are available for the professional studies particularly in the area of Engineering, Health sciences, Management, Computer Science and Information Technology. This was realized by the RKDF group way back in the 1990s in developing states like Madhya Pradesh where only a few engineering and medical colleges were available to cater to the needs of millions of students desirous of pursuing higher education in professional subjects.
              </p>

              <p class="chan-text-p">
                RKDF Education Group managed by the RKDF Education Society, Bhopal (Estd. 1994) and Ayushmati Education and Social Society, Bhopal (Estd. 1999) realized these limitations and decided to make available technical education to the needy students and established their first private college in the city of Bhopal in 1995 at Mandideep in Raisen Dist. The RKDF group continued its efforts to provide quality education and established more than 100 colleges located at Bhopal, Sehore, Indore and Rewa in the State of Madhya Pradesh. This was not the end of the desired goal to serve the Nation through qualified and knowledgeable young professionals but only a humble beginning.
              </p>

              <p class="chan-text-p">
                The efforts continued and the RKDF Group established the RKDF University at Gandhi Nagar, Bhopal. The University is sponsored by the AYUSHMATI EDUCATION AND SOCIAL SOCIETY, BHOPAL and has the approval of Madhya Pradesh Legislature. The University is located on 55 acres lush green environment near Gandhi Nagar, Bhopal. The University has mission to provide quality education in most of the disciplines of Engineering, Applied Science, Management, Health sciences, Education, Law and Humanities &amp; Social Sciences up to the Post-graduate level including M.Phil and Ph.D. The University aims to produce talented professionals with higher education and skill to serve mankind. The University was formally launched on 14th February 2012.
              </p>

              <p class="chan-text-p">
                Besides academic programmes, the University offers excellent facilities for every aspect of a student's life including his/her personality development. The University also proposes to have cooperation and collaboration with other National and International academic institutions to improve the quality of education and research.
              </p>

              <p class="chan-text-p">
                As Chancellor it will be my endeavour to provide all modern educational and living facilities to the students at the campus. I also wish the well-being of all the employees of the University. I wish the best career and future of students of the University who will be studying and pursuing their Higher Education to enrich knowledge and engage in innovative activities to serve the Nation and humanity with dedication. I also wish prosperity and well-being of the employees and students of the University.
              </p>

              <!-- Signature Box -->
              <div class="chan-sig-box">
                <div>
                  <div class="chan-sig-name">Dr. Sadhna Kapoor</div>
                  <div class="chan-sig-role">Chancellor</div>
                  <div class="chan-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: CHANCELLOR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Chancellor Profile Card -->
          <div class="chan-side-card">
            <div class="chan-portrait-box">
              <img src="images/img/vcnew.jpg" alt="Dr. Sadhna Kapoor — Chancellor" class="chan-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="chan-side-name">Dr. Sadhna Kapoor</h3>
            <div><span class="chan-side-badge">Chancellor</span></div>
            <div style="font-size:14.5px;color:#475569;font-weight:600;">RKDF University, Bhopal</div>

            <div class="chan-meta-list">
              <div>📍 <strong>Campus:</strong> Gandhi Nagar, Bhopal (M.P.)</div>
              <div>🏛️ <strong>Sponsoring Society:</strong> Ayushmati Education &amp; Social Society</div>
              <div>🎓 <strong>Established:</strong> M.P. State Legislature Approval</div>
            </div>
          </div>

          <!-- Quick Navigation -->
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link active">Chancellor's Desk <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link">Pro-Chancellor Desk <span>→</span></a></li>
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
