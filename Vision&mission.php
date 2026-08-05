<?php
// ============================================================
// RKDF University — Vision & Mission
// World-Class Premium Design + AI Vision Media + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vision & Mission — RKDF University Bhopal</title>
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
                  url('images/ai_vision/rkdf_vision_banner.jpg') center/cover no-repeat;
      color: var(--p-paper, #FAF9F5);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vm-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .vm-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vm-grid-layout { grid-template-columns: 1fr; }
    }

    /* Vision & Mission Cards */
    .vm-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 40px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .vm-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .vm-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .vm-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
    }
    .vm-badge-gold {
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }
    .vm-badge-red {
      background: rgba(227, 27, 35, 0.18);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .vm-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .vm-card-body {
      padding: 36px 32px;
    }

    .vm-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 28px;
      position: relative;
    }
    .vm-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .vm-block-card:hover .vm-media-img {
      transform: scale(1.04);
    }

    .vm-quote-box {
      position: relative;
      padding: 24px 28px 24px 36px;
      background: rgba(250, 249, 245, 0.7);
      border-left: 4px solid #C5A059;
      border-radius: 0 12px 12px 0;
      margin-top: 20px;
    }
    .vm-quote-text {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 19px;
      line-height: 1.7;
      font-style: italic;
      color: #0C1424;
      margin: 0;
    }

    .vm-text-p {
      font-size: 16px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 20px;
    }
    .vm-text-p:last-child {
      margin-bottom: 0;
    }

    /* Core Values Section */
    .values-section-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 32px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .values-section-sub {
      font-size: 15px;
      color: #64748B;
      margin-bottom: 32px;
    }

    .values-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .value-item-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #E31B23;
      border-radius: 14px;
      padding: 24px 28px;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.03);
      transition: all 0.3s ease;
      display: flex;
      gap: 20px;
      align-items: flex-start;
    }
    .value-item-card:hover {
      transform: translateX(6px);
      box-shadow: 0 12px 30px rgba(12, 20, 36, 0.07);
      border-left-color: #C5A059;
    }

    .val-number {
      font-family: 'JetBrains Mono', monospace;
      font-size: 16px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227, 27, 35, 0.08);
      width: 42px;
      height: 42px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .val-title {
      font-family: 'Inter', system-ui, sans-serif;
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .val-desc {
      font-size: 14.5px;
      line-height: 1.7;
      color: #475569;
      margin: 0;
    }

    /* Sidebar Styling */
    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      position: sticky;
      top: 100px;
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
      <span class="rk-eyebrow tone-gold">01 · INSTITUTIONAL PHILOSOPHY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Vision &amp; Mission</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Pioneering Higher Education, Advanced Research, and Sustainable Societal Transformation at RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="vm-main-section">
    <div class="rk-container">
      <div class="vm-grid-layout">
        
        <!-- LEFT COLUMN: VISION, MISSION & CORE VALUES -->
        <div>

          <!-- ── VISION CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title">University Vision</h2>
              <span class="vm-badge vm-badge-gold">OUR VISION</span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame">
                <img src="images/ai_vision/rkdf_vision_banner.jpg" alt="RKDF University Vision" class="vm-media-img">
              </div>
              <div class="vm-quote-box">
                <p class="vm-quote-text">
                  "To establish a University of excellence and relevance to impart Higher Education through knowledge, pioneering Scholarship, Research and teaching and to improve the lives of many students through growth, prosperity and sustainable physical environment through education in the country."
                </p>
              </div>
            </div>
          </article>

          <!-- ── MISSION CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title">University Mission</h2>
              <span class="vm-badge vm-badge-red">OUR MISSION</span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame">
                <img src="images/ai_vision/rkdf_mission_banner.jpg" alt="RKDF University Mission" class="vm-media-img">
              </div>
              <p class="vm-text-p">
                Harmonize higher education with excellence in science and technology, output and contributing to livelihood security and sustainable societal development and to be recognized as a premium National University providing dedicated services for the social and economic growth development of the nation.
              </p>
              <p class="vm-text-p">
                The University offers a congenial Academic &amp; Research environment to enable its students, Research scholars, faculty &amp; staff to achieve professional Excellence and personality development to promise an Exceptional future for all its stakeholders.
              </p>
            </div>
          </article>

          <!-- ── CORE VALUES CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title">Core Values of the University</h2>
              <span class="vm-badge vm-badge-gold">CORE VALUES</span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame" style="height:240px;">
                <img src="images/ai_vision/rkdf_core_values.jpg" alt="RKDF Core Values" class="vm-media-img">
              </div>
              <p class="vm-text-p" style="margin-bottom:28px;font-weight:600;color:#0C1424;">
                The University is guided by core values in delivering its mission &amp; pursuing its vision:
              </p>

              <div class="values-grid">
                
                <!-- Pillar 1 -->
                <div class="value-item-card">
                  <div class="val-number">01</div>
                  <div>
                    <h3 class="val-title">Creativity</h3>
                    <p class="val-desc">
                      Commitment to explore new methodology to search for latest Academic Knowledge and new funding for students.
                    </p>
                  </div>
                </div>

                <!-- Pillar 2 -->
                <div class="value-item-card">
                  <div class="val-number">02</div>
                  <div>
                    <h3 class="val-title">Innovation &amp; Research</h3>
                    <p class="val-desc">
                      Initiating an innovative &amp; cost effective participation of students in Research. Encouraging faculty members for submission of Research projects to the University.
                    </p>
                  </div>
                </div>

                <!-- Pillar 3 -->
                <div class="value-item-card">
                  <div class="val-number">03</div>
                  <div>
                    <h3 class="val-title">Ethical Conduct</h3>
                    <p class="val-desc">
                      Integration of a value system among students oriented towards imbibing fine judgement, respect, tolerance, honesty, trustworthiness, strong character, transparency, accountability, integrity of thought and responsibility towards themselves and society.
                    </p>
                  </div>
                </div>

                <!-- Pillar 4 -->
                <div class="value-item-card">
                  <div class="val-number">04</div>
                  <div>
                    <h3 class="val-title">Social Responsibility</h3>
                    <p class="val-desc">
                      Dedication towards serving individuals, society and the nation through outreach and community engagement activities in an attempt to contribute to national development coupled with commitment to create environmental awareness and action.
                    </p>
                  </div>
                </div>

                <!-- Pillar 5 -->
                <div class="value-item-card">
                  <div class="val-number">05</div>
                  <div>
                    <h3 class="val-title">Collaborative &amp; Experimental Learning</h3>
                    <p class="val-desc">
                      Commitment to collaborative and interdisciplinary study along with pursuing opportunities for sharing knowledge.
                    </p>
                  </div>
                </div>

                <!-- Pillar 6 -->
                <div class="value-item-card">
                  <div class="val-number">06</div>
                  <div>
                    <h3 class="val-title">Academic Excellence</h3>
                    <p class="val-desc">
                      Fostering values of excellence and high quality in all activities and belief in setting the highest academic and professional standards.
                    </p>
                  </div>
                </div>

                <!-- Pillar 7 -->
                <div class="value-item-card">
                  <div class="val-number">07</div>
                  <div>
                    <h3 class="val-title">Environment Consciousness</h3>
                    <p class="val-desc">
                      Promoting research and care for environment and associated issues.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link active">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
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
