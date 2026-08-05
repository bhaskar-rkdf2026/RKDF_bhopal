<?php
// ============================================================
// RKDF University — National & International Collaborations
// World-Class Premium Design + High-Res Media Assets + 100% Original Text & Partnerships Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>National &amp; International Collaboration — RKDF University Bhopal</title>
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
                  url('images/ai_international_relation/rkdf_intl_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .intl-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .intl-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .intl-grid-layout { grid-template-columns: 1fr; }
    }

    .intl-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .intl-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .intl-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .intl-badge {
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

    .intl-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .intl-card-body {
      padding: 32px 36px;
    }

    .intl-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .intl-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .intl-block-card:hover .intl-media-img {
      transform: scale(1.04);
    }

    /* Dual Gallery Box */
    .intl-gallery-box {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 32px;
    }
    @media (max-width: 600px) {
      .intl-gallery-box { grid-template-columns: 1fr; }
    }
    .intl-gallery-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 12px;
      border: 1px solid rgba(12, 20, 36, 0.1);
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.05);
    }

    /* Collaboration List Item */
    .collab-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .collab-item {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.06);
      border-radius: 12px;
      font-size: 15px;
      font-weight: 600;
      color: #0C1424;
      transition: all 0.25s ease;
    }
    .collab-item:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateX(4px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .collab-num {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227, 27, 35, 0.08);
      padding: 4px 10px;
      border-radius: 6px;
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
      <span class="rk-eyebrow tone-gold">42 · GLOBAL PARTNERSHIPS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">National &amp; International Collaboration</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Fostering international student exchanges, joint research projects, visiting professorships, and bilateral MoUs with premier universities worldwide.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="intl-main-section">
    <div class="rk-container">
      <div class="intl-grid-layout">
        
        <!-- LEFT COLUMN: COLLABORATION DETAILS -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="intl-block-card">
            <div class="intl-card-header">
              <h2 class="intl-card-title">International Centre Overview</h2>
              <span class="intl-badge">ESTD 2012</span>
            </div>
            <div class="intl-card-body">
              
              <!-- DUAL GALLERY IMAGE BOX -->
              <div class="intl-gallery-box">
                <img src="images/img/inter2.jpg" alt="International Relations Delegation at RKDF" class="intl-gallery-img">
                <img src="images/img/inter.jpg" alt="Global Academic MoU Signing Ceremony" class="intl-gallery-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Global Academic Exchange &amp; International Affairs
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The International Centre of RKDF University was established in 2012 with an objective to deal with all matters related to Foreign Nationals viz. Collaboration with Foreign Universities/Institutions, Foreign scholars visiting India as Visiting Lecturers/Professors, Alumni Association of Foreign Students, and Admission of Foreign Students.
              </p>

              <p style="font-size:15.5px;line-height:1.8;color:#475569;background:#FAF9F5;padding:18px 24px;border-left:4px solid #C5A059;border-radius:0 12px 12px 0;margin-bottom:36px;">
                <strong>Governance &amp; Leadership:</strong> The International Centre is headed by the Chairman of the International Centre, assisted by the Coordinator, International Student's Affairs, and Coordinator, International Collaboration.
              </p>

              <!-- NATIONAL COLLABORATION -->
              <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:#0C1424;margin-bottom:18px;display:flex;align-items:center;gap:12px;">
                <span>National Collaborations</span>
                <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;background:rgba(197,160,89,0.12);padding:4px 12px;border-radius:99px;border:1px solid rgba(197,160,89,0.25);">INDIA</span>
              </h3>

              <ul class="collab-list" style="margin-bottom:44px;">
                <li class="collab-item"><span class="collab-num">01</span> <span>Central Institute of Agricultural Engineering (CIAE)</span></li>
                <li class="collab-item"><span class="collab-num">02</span> <span>Indian Institute of Soil Sciences (IISS), Bhopal</span></li>
                <li class="collab-item"><span class="collab-num">03</span> <span>MoU for Faculty Development with National Institute of Technical Teachers Training and Research (NITTTR)</span></li>
                <li class="collab-item"><span class="collab-num">04</span> <span>MoU with J.C. Fuels Pvt. Ltd. (Alternate Energy Systems), Hyderabad</span></li>
                <li class="collab-item"><span class="collab-num">05</span> <span>MoU with Bergen Solar Power &amp; Energy Ltd., Gurgaon</span></li>
                <li class="collab-item"><span class="collab-num">06</span> <span>MoU for Industrial Training with JBM Ltd., New Delhi</span></li>
                <li class="collab-item"><span class="collab-num">07</span> <span>Membership in National HRD Network, Gurgaon</span></li>
                <li class="collab-item"><span class="collab-num">08</span> <span>Indian Institute of Soil Sciences (IISS), Bhopal</span></li>
                <li class="collab-item"><span class="collab-num">09</span> <span>MoU with Council of Scientific &amp; Industrial Research (CSIR), New Delhi</span></li>
              </ul>

              <!-- INTERNATIONAL COLLABORATION -->
              <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:#0C1424;margin-bottom:18px;display:flex;align-items:center;gap:12px;">
                <span>International Collaborations</span>
                <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#E31B23;background:rgba(227,27,35,0.08);padding:4px 12px;border-radius:99px;border:1px solid rgba(227,27,35,0.2);">GLOBAL</span>
              </h3>

              <ul class="collab-list">
                <li class="collab-item"><span class="collab-num">01</span> <span>Rensselaer Polytechnic Institute, Troy, New York (USA)</span></li>
                <li class="collab-item"><span class="collab-num">02</span> <span>American Society for Quality (USA)</span></li>
                <li class="collab-item"><span class="collab-num">03</span> <span>MoU with Harrow and Dudley College (UK)</span></li>
                <li class="collab-item"><span class="collab-num">04</span> <span>MoU with Shawnee State University (USA)</span></li>
                <li class="collab-item"><span class="collab-num">05</span> <span>MoU Signed with Sias International University (China)</span></li>
                <li class="collab-item"><span class="collab-num">06</span> <span>MoU with Sierra Bio Life Pvt. Ltd. (Australia)</span></li>
                <li class="collab-item"><span class="collab-num">07</span> <span>MoU with Association of Universities of Asia and the Pacific (AUAP)</span></li>
              </ul>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Global Relations</h3>
            <ul class="sidebar-nav-list">
              <li><a href="international-relation.php" class="sidebar-link active">International Collaborations <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Engineering.php" class="sidebar-link">Faculty of Engineering <span>→</span></a></li>
              <li><a href="Management.php" class="sidebar-link">Faculty of Management <span>→</span></a></li>
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
