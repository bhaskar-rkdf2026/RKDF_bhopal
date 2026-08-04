<?php
// ============================================================
// RKDF University — Chancellor's Desk
// 100% Exact Original Content Preserved + Clean Modern Design
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
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .chan-grid {
      display: grid;
      grid-template-columns: 7fr 5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .chan-grid { grid-template-columns: 1fr; }
    }
    .chan-side-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      text-align: center;
      box-shadow: 0 16px 40px rgba(12,20,36,0.08);
      position: sticky;
      top: 100px;
    }
    .chan-side-img {
      width: 100%;
      max-width: 320px;
      height: 380px;
      object-fit: cover;
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15), 0 0 20px rgba(220,38,38,0.2);
      border: 3px solid rgba(12,20,36,0.08);
      margin: 0 auto 20px;
    }
    .chan-name {
      font-family: var(--p-font-serif);
      font-size: 24px;
      color: var(--p-navy-deep);
      margin-bottom: 4px;
      font-weight: 700;
    }
    .chan-title-badge {
      display: inline-block;
      background: rgba(220,38,38,0.08);
      color: var(--p-gold);
      padding: 4px 14px;
      border-radius: 99px;
      font-weight: 700;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 12px;
    }
    .gov-nav-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 14px;
      margin-top: 28px;
    }
    .gov-nav-pill {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 10px;
      padding: 14px 18px;
      color: var(--p-navy-deep);
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
    }
    .gov-nav-pill:hover, .gov-nav-pill.active {
      border-color: var(--p-gold);
      background: var(--p-navy-deep);
      color: #ffffff !important;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">03 · Executive Leadership</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Chancellor's Desk
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        A message of vision, institutional mission, and educational empowerment from Dr. Sadhna Kapoor, Chancellor.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION WITH SIDE PORTRAIT CARD -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="chan-grid">
        
        <!-- LEFT COLUMN: MESSAGE TEXT -->
        <div>
          <span class="rk-eyebrow">Chancellor Address</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Message From The Chancellor</h2>

          <div style="font-size:16.5px;line-height:1.85;color:rgba(12,20,36,0.82);">
            <p style="margin-bottom:20px;">
              Education is the prerequisite for socio-economic development of the Nation in general and people in particular. Not enough educational facilities are available for the professional studies particularly in the area of Engineering, Health sciences, Management, Computer Science and Information Technology. This was realized by the RKDF group way back in the 1990s in developing states like Madhya Pradesh where only a few engineering and medical colleges were available to cater to the needs of millions of students desirous of pursuing higher education in professional subjects.
            </p>
            <p style="margin-bottom:20px;">
              RKDF Education Group managed by the RKDF Education Society, Bhopal (Estd. 1994) and Ayushmati Education and Social Society, Bhopal (Estd. 1999) realized these limitations and decided to make available technical education to the needy students and established their first private college in the city of Bhopal in 1995 at Mandideep in Raisen Dist. The RKDF group continued its efforts to provide quality education and established more than 100 colleges located at Bhopal, Sehore, Indore and Rewa in the State of Madhya Pradesh. This was not the end of the desired goal to serve the Nation through qualified and knowledgeable young professionals but only a humble beginning.
            </p>
            <p style="margin-bottom:20px;">
              The efforts continued and the RKDF Group established the RKDF University at Gandhi Nagar, Bhopal. The University is sponsored by the AYUSHMATI EDUCATION AND SOCIAL SOCIETY, BHOPAL and has the approval of Madhya Pradesh Legislature. The University is located on 55 acres lush green environment near Gandhi Nagar, Bhopal. The University has mission to provide quality education in most of the disciplines of Engineering, Applied Science, Management, Health sciences, Education, Law and Humanities &amp; Social Sciences up to the Post-graduate level including M.Phil and Ph.D. The University aims to produce talented professionals with higher education and skill to serve mankind. The University was formally launched on 14th February 2012.
            </p>
            <p style="margin-bottom:20px;">
              Besides academic programmes, the University offers excellent facilities for every aspect of a student's life including his/her personality development. The University also proposes to have cooperation and collaboration with other National and International academic institutions to improve the quality of education and research.
            </p>
            <p style="margin-bottom:28px;">
              As Chancellor it will be my endeavour to provide all modern educational and living facilities to the students at the campus. I also wish the well-being of all the employees of the University. I wish the best career and future of students of the University who will be studying and pursuing their Higher Education to enrich knowledge and engage in innovative activities to serve the Nation and humanity with dedication. I also wish prosperity and well-being of the employees and students of the University.
            </p>

            <div style="margin-top:36px;padding:24px 28px;background:#ffffff;border:1px solid var(--p-hairline);border-left:4px solid var(--p-gold);border-radius:12px;box-shadow:0 4px 16px rgba(12,20,36,0.04);">
              <div style="font-family:var(--p-font-serif);font-size:20px;color:var(--p-navy-deep);font-weight:700;">Dr. Sadhna Kapoor</div>
              <div style="font-size:14px;color:var(--p-gold);font-weight:700;margin-top:2px;">Chancellor</div>
              <div style="font-size:14px;color:rgba(12,20,36,0.65);margin-top:4px;">RKDF University, Bhopal</div>
            </div>
          </div>

          <!-- Quick Governance Directory -->
          <div style="margin-top:56px;padding-top:36px;border-top:1px solid var(--p-hairline);">
            <span class="rk-eyebrow tone-gold">Governance Directory</span>
            <h3 class="rk-h2" style="font-size:24px;">Explore Governance Desks</h3>
            
            <div class="gov-nav-grid">
              <a href="Vision&mission.php" class="gov-nav-pill"><span>✨</span> Vision &amp; Mission</a>
              <a href="Objectives.php" class="gov-nav-pill"><span>🎯</span> Objectives</a>
              <a href="Chancellor.php" class="gov-nav-pill active"><span>👑</span> Chancellor's Desk</a>
              <a href="ProChancellor.php" class="gov-nav-pill"><span>🏛️</span> Pro-Chancellor Desk</a>
              <a href="Vice-Chancellor-Desk.php" class="gov-nav-pill"><span>🎓</span> Vice Chancellor Desk</a>
              <a href="dgm.php" class="gov-nav-pill"><span>📋</span> DGM Profile</a>
              <a href="dgr.php" class="gov-nav-pill"><span>🔬</span> DGR Profile</a>
              <a href="Registrar.php" class="gov-nav-pill"><span>📜</span> Registrar Desk</a>
            </div>
          </div>

        </div>

        <!-- RIGHT COLUMN: CHANCELLOR SIDE PORTRAIT CARD -->
        <div>
          <div class="chan-side-card">
            <img src="images/img/vcnew.jpg" alt="Dr. Sadhna Kapoor — Chancellor" class="chan-side-img">
            
            <div class="chan-name">Dr. Sadhna Kapoor</div>
            <div><span class="chan-title-badge">Chancellor</span></div>
            <div style="font-size:14.5px;color:rgba(12,20,36,0.7);margin-top:6px;font-weight:600;">RKDF University, Bhopal</div>
            
            <div style="margin-top:20px;padding-top:16px;border-top:1px solid var(--p-hairline);text-align:left;font-size:13.5px;color:rgba(12,20,36,0.75);display:flex;flex-direction:column;gap:10px;">
              <div>📍 <strong>Campus:</strong> Gandhi Nagar, Bhopal (M.P.)</div>
              <div>🏛️ <strong>Sponsoring Society:</strong> Ayushmati Education &amp; Social Society</div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
