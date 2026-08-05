<?php
// ============================================================
// RKDF University — Institute Heads & HODs Directory
// World-Class Premium Design + All 15 Institute Heads & HODs Preserved + AI Media Assets
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Institute Heads &amp; HODs — RKDF University Bhopal</title>
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
                  url('images/ai_hod/rkdf_hod_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .hod-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .hod-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .hod-grid-layout { grid-template-columns: 1fr; }
    }

    .hod-list-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 28px;
    }

    .hod-member-card {
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
    .hod-member-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 42px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .hod-avatar-box {
      width: 140px;
      height: 150px;
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
      background: #0C1424;
    }
    .hod-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .hod-member-card:hover .hod-img {
      transform: scale(1.08);
    }

    .hod-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 21px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }

    .hod-desig-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      margin-bottom: 12px;
    }

    .hod-faculty-title {
      font-size: 14.5px;
      line-height: 1.55;
      color: #475569;
      font-weight: 600;
    }

    .hod-univ-tag {
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
      <span class="rk-eyebrow tone-gold">20 · ACADEMIC LEADERSHIP</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Institute Heads &amp; HODs Directory</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Directory of Institute Heads and Heads of Department leading constituent engineering, pharmacy, nursing, ayurveda, and Polytechnic colleges across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="hod-main-section">
    <div class="rk-container">
      <div class="hod-grid-layout">
        
        <!-- LEFT COLUMN: HODs LIST GRID -->
        <div>

          <div style="margin-bottom:36px;">
            <span class="rk-eyebrow tone-gold">Academic Leadership</span>
            <h2 class="rk-h2" style="font-size:32px;margin-top:8px;">Institute Heads &amp; Department Heads</h2>
            <p style="color:#475569;font-size:16px;margin-top:10px;">
              Eminent academic leaders heading constituent colleges, polytechnics, and specialized departments at RKDF University Bhopal MP:
            </p>
          </div>

          <div class="hod-list-grid">

            <!-- HOD 1: Sri Satya Sai College of Engineering (SSSCE) -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/AC Nayak.jfif" alt="Dr. A. C. Nayak" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. A. C. Nayak</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Sri Satya Sai College of Engineering (SSSCE)</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 2: RKDF College of Technology & Research (RKDFCTR) -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Virendra Choudhary.jfif" alt="Dr. Virendra Singh Chaudhary" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Virendra Singh Chaudhary</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">RKDF College of Technology &amp; Research (RKDFCTR)</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 3: Bhabha College of Engineering (BCE) -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/SanjaySingh.jfif" alt="Dr. Sanjay Jain" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Sanjay Jain</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Bhabha College of Engineering (BCE)</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 4: Agnos College of Technology -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Sohail Bux.jfif" alt="Dr. Sohail Bux" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Sohail Bux</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">Agnos College of Technology</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 5: Vedica College of Pharmacy Polytechnic -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Sandeep Sahu.jfif" alt="Dr. Sandeep Sahu" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Sandeep Sahu</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Vedica College of Pharmacy Polytechnic</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 6: Department of Pharmacy -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Aarti Sahu.jfif" alt="Dr. Bharti Sahu" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Bharti Sahu</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Department of Pharmacy</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 7: Sri Satya Sai Institute of Pharmacy -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Pradeep Adlak.jfif" alt="Dr. Pradeep Adlak" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Pradeep Adlak</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">Sri Satya Sai Institute of Pharmacy</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 8: Dr. Satyendra Kumar Memorial College of Pharmacy -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Abhishek Dwivedi.jfif" alt="Dr. Abhishek Dwivedi" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Abhishek Dwivedi</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">Dr. Satyendra Kumar Memorial College of Pharmacy</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 9: Sri Sathya Sai Institute of Pharmaceutical Sciences -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Devendra Bhopte.jfif" alt="Dr. Devendra Bhopte" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Devendra Bhopte</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">Sri Sathya Sai Institute of Pharmaceutical Sciences</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 10: College of Pharmacy -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Virendra Patil.jfif" alt="Dr. Virendra Kumar Patel" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Virendra Kumar Patel</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">College of Pharmacy</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 11: School of Pharmacy -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Neha Jain.jfif" alt="Dr. Neha Jain" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Neha Jain</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">School of Pharmacy</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 12: Institute of Polytechnic Engineering -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Ametesh Paul.jfif" alt="Dr. Amitesh Kumar Paul" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Amitesh Kumar Paul</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Institute of Polytechnic Engineering</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 13: University College of Nursing -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Vandana Raghuvanshi.jfif" alt="Dr. Vandana Raghuvanshi" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Vandana Raghuvanshi</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">University College of Nursing</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 14: Ram Krishna College of Ayurveda & Medical Sciences BAMS -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Anil Kunjilal Baghel.jfif" alt="Dr. Anil Kunjilal Baghel" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Anil Kunjilal Baghel</h3>
              <div><span class="hod-desig-badge">Institute Head</span></div>
              <div class="hod-faculty-title">Ram Krishna College of Ayurveda &amp; Medical Sciences BAMS</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
            </article>

            <!-- HOD 15: Library and Information Science -->
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="images/deanshod/Minni Walia.jfif" alt="Dr. Minni Walia" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name">Dr. Minni Walia</h3>
              <div><span class="hod-desig-badge">Head of Department (HOD)</span></div>
              <div class="hod-faculty-title">Library and Information Science</div>
              <div class="hod-univ-tag">RKDF University Bhopal MP</div>
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
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link active">Heads of Department (HOD) <span>→</span></a></li>
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
