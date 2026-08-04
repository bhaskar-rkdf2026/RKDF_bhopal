<?php
// ============================================================
// RKDF University — Heads of Department (HOD) & Deans Directory
// Luxury Prestige Faculty Grid Design
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heads of Department (HOD) — RKDF University Bhopal</title>
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

    .hod-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 32px;
      margin-top: 36px;
    }
    .hod-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      transition: all 0.35s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .hod-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 36px rgba(12,20,36,0.08);
      border-color: rgba(220,38,38,0.3);
    }
    .hod-img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--p-hairline);
      box-shadow: 0 8px 20px rgba(12,20,36,0.1);
      margin-bottom: 20px;
    }
    .hod-name {
      font-family: var(--p-font-serif);
      font-size: 20px;
      color: var(--p-navy-deep);
      font-weight: 700;
      margin-bottom: 4px;
    }
    .hod-desig {
      display: inline-block;
      background: rgba(220,38,38,0.08);
      color: var(--p-gold);
      padding: 3px 12px;
      border-radius: 99px;
      font-size: 12.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin-bottom: 12px;
    }
    .hod-faculty {
      font-size: 14px;
      color: rgba(12,20,36,0.7);
      line-height: 1.5;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">03 · Academic Leadership</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Heads of Department (HOD)
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Directory of Deans, Institute Heads, and Department Heads leading academic programs across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <span class="rk-eyebrow">Academic Leadership Directory</span>
      <h2 class="rk-h2" style="margin-bottom:12px;">Deans &amp; Heads of Department</h2>
      <p style="color:rgba(12,20,36,0.7);font-size:16.5px;max-width:720px;margin-bottom:36px;">
        Distinguished faculty members heading constituent institutes, schools, and departments:
      </p>

      <div class="hod-grid">
        
        <!-- HOD 1 -->
        <div class="hod-card">
          <img src="images/deanshod/Sandeep Sahu.jfif" alt="Dr. Sandeep Sahu" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Sandeep Sahu</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">Constituent Academic Institutes<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 2 -->
        <div class="hod-card">
          <img src="images/deanshod/Aarti Sahu.jfif" alt="Dr. Bharti Sahu" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Bharti Sahu</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">Department of Pharmacy<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 3 -->
        <div class="hod-card">
          <img src="images/deanshod/Pradeep Adlak.jfif" alt="Dr. Pradeep Adlak" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Pradeep Adlak</div>
          <div><span class="hod-desig">Head of Department (HOD)</span></div>
          <div class="hod-faculty">Sri Satya Sai Institute of Pharmacy<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 4 -->
        <div class="hod-card">
          <img src="images/deanshod/Abhishek Dwivedi.jfif" alt="Dr. Abhishek Dwivedi" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Abhishek Dwivedi</div>
          <div><span class="hod-desig">Head of Department (HOD)</span></div>
          <div class="hod-faculty">Dr. Satyendra Kumar Memorial College of Pharmacy<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 5 -->
        <div class="hod-card">
          <img src="images/deanshod/Devendra Bhopte.jfif" alt="Dr. Devendra Bhopte" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Devendra Bhopte</div>
          <div><span class="hod-desig">Head of Department (HOD)</span></div>
          <div class="hod-faculty">Sri Sathya Sai Institute of Pharmaceutical Sciences<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 6 -->
        <div class="hod-card">
          <img src="images/deanshod/Virendra Patil.jfif" alt="Dr. Virendra Kumar Patel" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Virendra Kumar Patel</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">College of Pharmacy<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 7 -->
        <div class="hod-card">
          <img src="images/deanshod/Neha Jain.jfif" alt="Dr. Neha Jain" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Neha Jain</div>
          <div><span class="hod-desig">Head of Department (HOD)</span></div>
          <div class="hod-faculty">School of Pharmacy<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 8 -->
        <div class="hod-card">
          <img src="images/deanshod/Ametesh Paul.jfif" alt="Dr. Amitesh Kumar Paul" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Amitesh Kumar Paul</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">Institute of Polytechnic Engineering<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 9 -->
        <div class="hod-card">
          <img src="images/deanshod/Vandana Raghuvanshi.jfif" alt="Dr. Vandana Raghuvanshi" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Vandana Raghuvanshi</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">University College of Nursing<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 10 -->
        <div class="hod-card">
          <img src="images/deanshod/Anil Kunjilal Baghel.jfif" alt="Dr. Anil Kunjilal Baghel" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Anil Kunjilal Baghel</div>
          <div><span class="hod-desig">Institute Head</span></div>
          <div class="hod-faculty">Ram Krishna College of Ayurveda &amp; Medical Sciences BAMS<br>RKDF University Bhopal</div>
        </div>

        <!-- HOD 11 -->
        <div class="hod-card">
          <img src="images/deanshod/Minni Walia.jfif" alt="Dr. Minni Walia" class="hod-img" onerror="this.src='images/bullet.png';">
          <div class="hod-name">Dr. Minni Walia</div>
          <div><span class="hod-desig">Head of Department (HOD)</span></div>
          <div class="hod-faculty">Library and Information Science<br>RKDF University Bhopal</div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
