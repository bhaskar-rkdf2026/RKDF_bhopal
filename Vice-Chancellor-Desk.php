<?php
// ============================================================
// RKDF University — Vice-Chancellor's Desk
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
  <title>Vice-Chancellor's Desk — RKDF University Bhopal</title>
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
                  url('images/ai_vice_chancellor/rkdf_vc_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vc-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .vc-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vc-grid-layout { grid-template-columns: 1fr; }
    }

    .vc-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .vc-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .vc-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .vc-badge {
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

    .vc-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .vc-card-body {
      padding: 36px 32px;
    }

    .vc-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .vc-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .vc-block-card:hover .vc-media-img {
      transform: scale(1.04);
    }

    .vc-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .vc-sig-box {
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

    .vc-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .vc-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .vc-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .vc-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .vc-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .vc-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .vc-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .vc-side-badge {
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

    .vc-meta-list {
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

    .pdf-download-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: #0C1424;
      color: #ffffff !important;
      padding: 14px 20px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      width: 100%;
      margin-top: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(12,20,36,0.12);
    }
    .pdf-download-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 22px rgba(227,27,35,0.25);
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
      <span class="rk-eyebrow tone-gold">05 · EXECUTIVE LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Vice-Chancellor's Desk</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        A message of academic vision, research innovation, and institutional development from Prof. Vijay K. Agrawal, Vice-Chancellor.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="vc-main-section">
    <div class="rk-container">
      <div class="vc-grid-layout">
        
        <!-- LEFT COLUMN: VICE-CHANCELLOR MESSAGE -->
        <div>

          <article class="vc-block-card">
            <div class="vc-card-header">
              <h2 class="vc-card-title">Message From The Vice-Chancellor</h2>
              <span class="vc-badge">VICE-CHANCELLOR ADDRESS</span>
            </div>
            <div class="vc-card-body">
              
              <div class="vc-media-frame">
                <img src="images/ai_vice_chancellor/rkdf_vc_campus_innovation.jpg" alt="RKDF University Global Knowledge Enterprise" class="vc-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Heartiest Greetings from RKDF University, Bhopal!!
              </div>

              <p class="vc-text-p">
                Higher education in the country is at the threshold of major institutional reforms targeted towards cutting edge R&amp;D and innovations. The major challenges before the upcoming and emerging Universities apart from quality of teaching and learning process are the need of experienced and enlightened faculty. Network of knowledge management, creative teaching and research, strong industry interface and innovative curriculum are the need of the day. Apart from this the Nation is moving forward by implementing NEP2020.
              </p>

              <p class="vc-text-p">
                RKDF University is marching towards meeting these challenges to become a <strong>‘Global Knowledge Enterprise’</strong>. The University has a seamless synergy between Humanities, Social Sciences, Science and Engineering and we are targeting towards breaking molds of traditional departmental boundaries through interdisciplinary approach in teaching and research. We are also striving for creating knowledge network and connections with the national and global professional bodies, international centers of higher learning, industries for skill development and also with the society for sharing fruits of knowledge with the masses.
              </p>

              <p class="vc-text-p">
                We, the RKDF Faculty Members and the Staff along with Our Learned Management are committed to build this University a real knowledge hub and, to work towards shaping the top class career of our students. We are moving ahead to help the villages through our extension programs. For this our resources have been mobilized for strengthening the youth &amp; women of nearby villages.
              </p>

              <p class="vc-text-p">
                We do welcome your suggestions and feedback if we can work together for further improvement, in turn, enabling us to continue imparting world class education.
              </p>

              <!-- Signature Box -->
              <div class="vc-sig-box">
                <div>
                  <div class="vc-sig-name">Prof. Vijay K. Agrawal</div>
                  <div class="vc-sig-role">Vice-Chancellor</div>
                  <div class="vc-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: VICE-CHANCELLOR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Vice-Chancellor Profile Card -->
          <div class="vc-side-card">
            <div class="vc-portrait-box">
              <img src="images/img/VC Sir Pic.jpg" alt="Prof. Vijay K. Agrawal — Vice-Chancellor" class="vc-portrait-img" onError="this.src='images/lovable/rkdf-logo.png';">
            </div>

            <h3 class="vc-side-name">Prof. Vijay K. Agrawal</h3>
            <div><span class="vc-side-badge">Vice-Chancellor</span></div>
            
            <div style="font-size:13.5px;color:#475569;line-height:1.6;margin-bottom:12px;">
              <strong>Qualifications:</strong> M.Sc., D.Phil., PGD (Chem. &amp; Chem. Engg.)<br>
              <em>Tokyo Institute of Technology, Japan</em>
            </div>

            <div class="vc-meta-list">
              <div>📍 <strong>Office:</strong> VC Office, RKDF University Bhopal</div>
              <div>✉️ <strong>Email:</strong> vc@rkdf.ac.in</div>
              <div>🌐 <strong>Vision:</strong> Global Knowledge Enterprise &amp; NEP2020</div>
            </div>

            <a href="VC Portfolio.pdf" target="_blank" class="pdf-download-btn">
              📄 Download VC Portfolio (PDF) ↗
            </a>
          </div>

          <!-- Quick Navigation -->
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link">Pro-Chancellor Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link active">Vice Chancellor's Desk <span>→</span></a></li>
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
