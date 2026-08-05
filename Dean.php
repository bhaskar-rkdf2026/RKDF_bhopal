<?php
// ============================================================
// RKDF University — Deans Directory (Faculty Deans)
// World-Class Premium Design + All 12 Deans Preserved + AI Media Assets
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Deans Directory — RKDF University Bhopal</title>
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
                  url('images/ai_dean/rkdf_dean_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .dean-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .dean-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .dean-grid-layout { grid-template-columns: 1fr; }
    }

    /* Deans Grid Cards */
    .deans-list-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 28px;
    }

    .dean-member-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px 28px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .dean-member-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 42px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .dean-avatar-box {
      width: 140px;
      height: 150px;
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
      background: #0C1424;
    }
    .dean-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .dean-member-card:hover .dean-img {
      transform: scale(1.08);
    }

    .dean-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 21px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }

    .dean-desig-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 12px;
    }

    .dean-faculty-title {
      font-size: 14.5px;
      line-height: 1.55;
      color: #475569;
      font-weight: 600;
    }

    .dean-univ-tag {
      font-size: 12.5px;
      color: #94A3B8;
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
      <span class="rk-eyebrow tone-gold">21 · ACADEMIC LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty Deans Directory</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Leading academic faculties, curriculum development, research governance, and quality assurance across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="dean-main-section">
    <div class="rk-container">
      <div class="dean-grid-layout">
        
        <!-- LEFT COLUMN: DEANS LIST GRID -->
        <div>

          <div style="margin-bottom:36px;">
            <span class="rk-eyebrow tone-gold">Faculty Governance</span>
            <h2 class="rk-h2" style="font-size:32px;margin-top:8px;">Deans of University Faculties</h2>
            <p style="color:#475569;font-size:16px;margin-top:10px;">
              Eminent academic deans heading constituent faculties and academic divisions at RKDF University Bhopal MP:
            </p>
          </div>

          <div class="deans-list-grid">

            <!-- Dean 1: Pharmacy -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Santram Lodhi.jfif" alt="Dr. Santram Lodhi" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Santram Lodhi</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Pharmaceutical Sciences</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 2: Social Science -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Ashvini Joshi.jfif" alt="Dr. Achala Jain" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Achala Jain</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Social Science</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 3: Commerce -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/NK Shrivastava.jfif" alt="Dr. N. K. Shrivastava" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. N. K. Shrivastava</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Commerce</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 4: Engineering & Technology -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Arun Patel.jfif" alt="Dr. Amit Kumar Rout" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Amit Kumar Rout</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Engineering and Technology</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 5: Science -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/VK Pandey.jfif" alt="Dr. Vineet Kumar Pandey" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Vineet Kumar Pandey</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Science</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 6: Paramedical -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Arpit Bhargav.jfif" alt="Dr. Arpit Bhargava" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Arpit Bhargava</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Paramedical</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 7: Health Science -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Anoop J. Katyayan.jfif" alt="Dr. Anoop J. Katyayan" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Anoop J. Katyayan</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Health Science</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 8: Education -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/MS Pawar.jfif" alt="Dr. M. S. Pawar" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. M. S. Pawar</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Department of Education</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 9: Management -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Satyendra Thakur.jfif" alt="Dr. Surendra Singh Thakur" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Surendra Singh Thakur</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Management</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 10: Agriculture -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/KC Pandey.jfif" alt="Dr. Krishna Chandra Pandey" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Krishna Chandra Pandey</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Agriculture</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 11: Law -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Anshuma Upadhya.jfif" alt="Dr. Archana Upadhyay" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Archana Upadhyay</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Law</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- Dean 12: Architecture -->
            <article class="dean-member-card">
              <div class="dean-avatar-box">
                <img src="images/deanshod/Richa Pathe.jfif" alt="Dr. Roli Rai" class="dean-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="dean-name">Dr. Roli Rai</h3>
              <div><span class="dean-desig-badge">Dean</span></div>
              <div class="dean-faculty-title">Faculty of Architecture</div>
              <div class="dean-univ-tag">RKDF University Bhopal MP</div>
            </article>

          </div>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link">Registrar Profile <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link active">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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
