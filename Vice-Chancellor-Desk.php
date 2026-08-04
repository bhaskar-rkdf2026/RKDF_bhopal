<?php
// ============================================================
// RKDF University — Vice-Chancellor's Desk
// Prestige Leadership Design
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
    .vc-grid {
      display: grid;
      grid-template-columns: 7fr 5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vc-grid { grid-template-columns: 1fr; }
    }
    .vc-side-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      text-align: center;
      box-shadow: 0 16px 40px rgba(12,20,36,0.08);
      position: sticky;
      top: 100px;
    }
    .vc-side-img {
      width: 100%;
      max-width: 320px;
      height: 380px;
      object-fit: cover;
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15), 0 0 20px rgba(220,38,38,0.2);
      border: 3px solid rgba(12,20,36,0.08);
      margin: 0 auto 20px;
    }
    .vc-name {
      font-family: var(--p-font-serif);
      font-size: 24px;
      color: var(--p-navy-deep);
      margin-bottom: 4px;
      font-weight: 700;
    }
    .vc-title-badge {
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
    .pdf-download-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: var(--p-navy-deep);
      color: #ffffff !important;
      padding: 14px 24px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      width: 100%;
      margin-top: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 6px 18px rgba(12,20,36,0.15);
    }
    .pdf-download-btn:hover {
      background: var(--p-gold);
      box-shadow: 0 10px 25px rgba(220,38,38,0.3);
      transform: translateY(-2px);
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
        Vice-Chancellor's Desk
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        A message of academic vision, research innovation, and institutional development from Prof. Vijay K. Agrawal, Vice-Chancellor.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION WITH VC SIDE CARD -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="vc-grid">
        
        <!-- LEFT COLUMN: MESSAGE TEXT -->
        <div>
          <span class="rk-eyebrow">Vice-Chancellor Address</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Message From The Vice-Chancellor</h2>

          <div style="font-size:16.5px;line-height:1.85;color:rgba(12,20,36,0.82);">
            <div style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-gold);margin-bottom:18px;font-weight:700;">
              Heartiest Greetings from RKDF University, Bhopal!!
            </div>

            <p style="margin-bottom:20px;">
              Higher education in the country is at the threshold of major institutional reforms targeted towards cutting edge R&amp;D and innovations. The major challenges before the upcoming and emerging Universities apart from quality of teaching and learning process are the need of experienced and enlightened faculty. Network of knowledge management, creative teaching and research, strong industry interface and innovative curriculum are the need of the day. Apart from this the Nation is moving forward by implementing NEP2020.
            </p>
            <p style="margin-bottom:20px;">
              RKDF University is marching towards meeting these challenges to become a <strong>‘Global Knowledge Enterprise’</strong>. The University has a seamless synergy between Humanities, Social Sciences, Science and Engineering and we are targeting towards breaking molds of traditional departmental boundaries through interdisciplinary approach in teaching and research. We are also striving for creating knowledge network and connections with the national and global professional bodies, international centers of higher learning, industries for skill development and also with the society for sharing fruits of knowledge with the masses.
            </p>
            <p style="margin-bottom:20px;">
              We, the RKDF Faculty Members and the Staff along with Our Learned Management are committed to build this University a real knowledge hub and, to work towards shaping the top class career of our students. We are moving ahead to help the villages through our extension programs. For this our resources have been mobilized for strengthening the youth &amp; women of nearby villages.
            </p>
            <p style="margin-bottom:28px;">
              We do welcome your suggestions and feedback if we can work together for further improvement, in turn, enabling us to continue imparting world class education.
            </p>

            <div style="margin-top:36px;padding:24px 28px;background:#ffffff;border:1px solid var(--p-hairline);border-left:4px solid var(--p-gold);border-radius:12px;box-shadow:0 4px 16px rgba(12,20,36,0.04);">
              <div style="font-family:var(--p-font-serif);font-size:20px;color:var(--p-navy-deep);font-weight:700;">Prof. Vijay K. Agrawal</div>
              <div style="font-size:14px;color:var(--p-gold);font-weight:700;margin-top:2px;">Vice-Chancellor</div>
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
              <a href="Chancellor.php" class="gov-nav-pill"><span>👑</span> Chancellor's Desk</a>
              <a href="Vice-Chancellor-Desk.php" class="gov-nav-pill active"><span>🎓</span> Vice Chancellor Desk</a>
              <a href="dgm.php" class="gov-nav-pill"><span>📋</span> DGM Profile</a>
              <a href="dgr.php" class="gov-nav-pill"><span>🔬</span> DGR Profile</a>
              <a href="Registrar.php" class="gov-nav-pill"><span>📜</span> Registrar Desk</a>
            </div>
          </div>

        </div>

        <!-- RIGHT COLUMN: VC SIDE PORTRAIT CARD -->
        <div>
          <div class="vc-side-card">
            <img src="images/img/VC Sir Pic.jpg" alt="Prof. Vijay K. Agrawal — Vice-Chancellor" class="vc-side-img">
            
            <div class="vc-name">Prof. Vijay K. Agrawal</div>
            <div><span class="vc-title-badge">Vice-Chancellor</span></div>
            
            <div style="font-size:13.5px;color:rgba(12,20,36,0.75);line-height:1.6;margin-bottom:12px;">
              <strong>Qualifications:</strong> M.Sc., D.Phil., PGD (Chem. &amp; Chem. Engg.)<br>
              <em>Tokyo Institute of Technology, Japan</em>
            </div>

            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--p-hairline);text-align:left;font-size:13.5px;color:rgba(12,20,36,0.75);display:flex;flex-direction:column;gap:8px;">
              <div>📍 <strong>Office:</strong> VC Office, RKDF University Bhopal</div>
              <div>✉️ <strong>Email:</strong> vc@rkdf.ac.in</div>
            </div>

            <a href="VC Portfolio.pdf" target="_blank" class="pdf-download-btn">
              📄 Download VC Portfolio (PDF) ↗
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
