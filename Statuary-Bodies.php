<?php
// ============================================================
// RKDF University — National Core Advisory Group (Statutory Advisory Bodies)
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
  <title>National Core Advisory Group — RKDF University Bhopal</title>
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
                  url('images/ai_statutory/rkdf_statutory_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .stat-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .stat-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .stat-grid-layout { grid-template-columns: 1fr; }
    }

    .stat-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .stat-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .stat-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .stat-badge {
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

    .stat-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .stat-card-body {
      padding: 36px 32px;
    }

    .stat-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .stat-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .stat-block-card:hover .stat-media-img {
      transform: scale(1.04);
    }

    /* Members Grid */
    .members-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }

    .member-item-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 22px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.25s ease;
    }
    .member-item-card:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .member-num {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      color: #C5A059;
      margin-bottom: 6px;
    }

    .member-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 10px;
    }

    .member-domain-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(12, 20, 36, 0.06);
      color: #0C1424;
      width: fit-content;
    }

    /* Invitees List */
    .invitees-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 18px;
      margin-top: 24px;
    }

    .invitee-card {
      background: #ffffff;
      border: 1px solid rgba(227, 27, 35, 0.12);
      border-left: 4px solid #E31B23;
      border-radius: 12px;
      padding: 18px 20px;
    }
    .invitee-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 17.5px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .invitee-domain {
      font-size: 13.5px;
      color: #E31B23;
      font-weight: 600;
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
      <span class="rk-eyebrow tone-gold">15 · GOVERNANCE &amp; ADVISORY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">National Core Advisory Group</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Empowering institutional policy, strategic academic vision, and multidisciplinary research across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="stat-main-section">
    <div class="rk-container">
      <div class="stat-grid-layout">
        
        <!-- LEFT COLUMN: ADVISORY MEMBERS & SPECIAL INVITEES -->
        <div>

          <!-- BLOCK 1: NATIONAL CORE ADVISORY GROUP -->
          <article class="stat-block-card">
            <div class="stat-card-header">
              <h2 class="stat-card-title">National Core Advisory Group Members</h2>
              <span class="stat-badge">NATIONAL ADVISORY GROUP</span>
            </div>
            <div class="stat-card-body">
              
              <div class="stat-media-frame">
                <img src="images/ai_statutory/rkdf_statutory_board.jpg" alt="National Core Advisory Group Boardroom" class="stat-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Distinguished National Academic Leaders
              </div>

              <p style="font-size:16px;line-height:1.8;color:#334155;margin-bottom:24px;">
                The National Core Advisory Group comprises eminent academicians, scientists, industry leaders, and policy experts who formulate the overarching strategic roadmap for RKDF University Bhopal.
              </p>

              <!-- Members Cards Grid -->
              <div class="members-grid">
                
                <div class="member-item-card">
                  <div class="member-num">MEMBER 01</div>
                  <h3 class="member-name">Prof. Panjab Singh</h3>
                  <span class="member-domain-badge">Education</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 02</div>
                  <h3 class="member-name">Prof. Deepak Pental</h3>
                  <span class="member-domain-badge">Biotech</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 03</div>
                  <h3 class="member-name">Prof. R. R. Gaur</h3>
                  <span class="member-domain-badge">Engineering</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 04</div>
                  <h3 class="member-name">Dr. R. P. Singh</h3>
                  <span class="member-domain-badge">IAUA</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 05</div>
                  <h3 class="member-name">Prof. B. D. Singh</h3>
                  <span class="member-domain-badge">Management</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 06</div>
                  <h3 class="member-name">Dr. M. K. Salooja</h3>
                  <span class="member-domain-badge">Distance Education</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 07</div>
                  <h3 class="member-name">Dr. K. K. Singh</h3>
                  <span class="member-domain-badge">Medical</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 08</div>
                  <h3 class="member-name">Dr. Gautam Goswal</h3>
                  <span class="member-domain-badge">Science</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 09</div>
                  <h3 class="member-name">Dr. Kamal Singh</h3>
                  <span class="member-domain-badge">Human Resources (HR)</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 10</div>
                  <h3 class="member-name">Dr. Ashish Dongre</h3>
                  <span class="member-domain-badge">Engineering</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 11</div>
                  <h3 class="member-name">Dr. B. N. Singh</h3>
                  <span class="member-domain-badge">Administration</span>
                </div>

                <div class="member-item-card">
                  <div class="member-num">MEMBER 12</div>
                  <h3 class="member-name">Mr. Siddharth Kapoor</h3>
                  <span class="member-domain-badge">Management</span>
                </div>

              </div>

            </div>
          </article>

          <!-- BLOCK 2: SPECIAL INVITEES -->
          <article class="stat-block-card">
            <div class="stat-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="stat-card-title">Special Invitees</h2>
              <span class="stat-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DISTINGUISHED GUESTS</span>
            </div>
            <div class="stat-card-body">
              
              <div class="invitees-grid">
                
                <div class="invitee-card">
                  <div class="invitee-name">Prof. R.B. Singh</div>
                  <div class="invitee-domain">Education &amp; Research</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Prof. Pritam Singh</div>
                  <div class="invitee-domain">Management</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Dr. Arvind Kumar</div>
                  <div class="invitee-domain">Education</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Dr. Vineeta Sharma</div>
                  <div class="invitee-domain">Science</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Dr. R.K. Mittal</div>
                  <div class="invitee-domain">Education</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Dr. K.P. Singh</div>
                  <div class="invitee-domain">UGC Representative</div>
                </div>

                <div class="invitee-card">
                  <div class="invitee-name">Dr. S.N. Puri</div>
                  <div class="invitee-domain">IAUA Representative</div>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Advisory &amp; Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Statuary-Bodies.php" class="sidebar-link active">National Core Advisory Group <span>→</span></a></li>
              <li><a href="localadvisory.php" class="sidebar-link">Local Core Advisory Group <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link">Governing Body <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link">Board of Management <span>→</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link">Board of Studies <span>→</span></a></li>
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
