<?php
// ============================================================
// RKDF University — Institutional Objectives
// Luxury Prestige Design + 100% Exact Original Text Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Objectives — RKDF University Bhopal</title>
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
    
    .obj-grid-layout {
      display: grid;
      grid-template-columns: 8fr 4fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .obj-grid-layout { grid-template-columns: 1fr; }
    }

    .obj-cards-container {
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
      margin-top: 28px;
    }
    .obj-pillar-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-left: 4px solid var(--p-gold);
      border-radius: 16px;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      transition: all 0.3s ease;
      display: flex;
      gap: 24px;
      align-items: flex-start;
    }
    .obj-pillar-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 36px rgba(12,20,36,0.08);
      border-left-color: #b91c1c;
    }
    .obj-number {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: rgba(220,38,38,0.08);
      color: var(--p-gold);
      font-family: var(--p-font-mono);
      font-weight: 700;
      font-size: 18px;
      flex-shrink: 0;
    }

    .side-gov-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 12px 32px rgba(12,20,36,0.06);
      position: sticky;
      top: 100px;
    }
    .side-gov-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      color: var(--p-navy-deep);
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--p-gold);
      font-weight: 700;
    }
    .side-gov-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .side-gov-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 16px;
      background: rgba(12,20,36,0.02);
      border: 1px solid var(--p-hairline);
      border-radius: 10px;
      color: var(--p-navy-deep);
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .side-gov-link:hover, .side-gov-link.active {
      background: var(--p-navy-deep);
      color: #ffffff !important;
      border-color: var(--p-navy-deep);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">02 · Institutional Framework</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        University Objectives
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Foundational goals driving academic competence, curriculum innovation, global research partnerships, and gender equity.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="obj-grid-layout">
        
        <!-- LEFT COLUMN: OBJECTIVES CARDS -->
        <div>
          <span class="rk-eyebrow">Institutional Pillars</span>
          <h2 class="rk-h2" style="margin-bottom:12px;">Core Objectives of RKDF University</h2>
          <p style="color:rgba(12,20,36,0.7);font-size:16.5px;margin-bottom:28px;">
            RKDF University Bhopal is established with the primary commitment to fulfill the following strategic objectives:
          </p>

          <div class="obj-cards-container">
            
            <!-- Objective 1 -->
            <div class="obj-pillar-card">
              <div class="obj-number">01</div>
              <div>
                <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:10px;">Human Resource Competence</h3>
                <p style="color:rgba(12,20,36,0.8);font-size:16px;line-height:1.8;">
                  To build human resource competence in teaching, research and technology / knowledge sharing.
                </p>
              </div>
            </div>

            <!-- Objective 2 -->
            <div class="obj-pillar-card">
              <div class="obj-number">02</div>
              <div>
                <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:10px;">Curriculum &amp; Delivery Systems</h3>
                <p style="color:rgba(12,20,36,0.8);font-size:16px;line-height:1.8;">
                  To institutionalize appropriate changes in course curricula and delivery systems to accommodate concerns and aspirations of all stakeholders.
                </p>
              </div>
            </div>

            <!-- Objective 3 -->
            <div class="obj-pillar-card">
              <div class="obj-number">03</div>
              <div>
                <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:10px;">Global &amp; National Partnerships</h3>
                <p style="color:rgba(12,20,36,0.8);font-size:16px;line-height:1.8;">
                  To strengthen partnership with national and foreign institutions especially south–south cooperation for sustainable higher education and research.
                </p>
              </div>
            </div>

            <!-- Objective 4 -->
            <div class="obj-pillar-card">
              <div class="obj-number">04</div>
              <div>
                <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:10px;">Gender Equity &amp; Quality Education</h3>
                <p style="color:rgba(12,20,36,0.8);font-size:16px;line-height:1.8;">
                  To promote gender equity and provide quality and relevant education through institutional networks.
                </p>
              </div>
            </div>

          </div>

        </div>

        <!-- RIGHT COLUMN: GOVERNANCE DIRECTORY SIDEBAR -->
        <div>
          <div class="side-gov-card">
            <div class="side-gov-title">Governance Directory</div>
            <div class="side-gov-list">
              <a href="Vision&mission.php" class="side-gov-link"><span>✨</span> Vision &amp; Mission</a>
              <a href="Objectives.php" class="side-gov-link active"><span>🎯</span> Objectives</a>
              <a href="Chancellor.php" class="side-gov-link"><span>👑</span> Chancellor's Desk</a>
              <a href="Vice-Chancellor-Desk.php" class="side-gov-link"><span>🎓</span> Vice Chancellor's Desk</a>
              <a href="dgm.php" class="side-gov-link"><span>📋</span> DGM Profile</a>
              <a href="dgr.php" class="side-gov-link"><span>🔬</span> DGR Profile</a>
              <a href="Registrar.php" class="side-gov-link"><span>📜</span> Registrar Desk</a>
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