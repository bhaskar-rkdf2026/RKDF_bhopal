<?php
// ============================================================
// RKDF University — Students Scholarship Information
// Luxury Prestige Design + 100% Exact Content & Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Scholarship Information — RKDF University Bhopal</title>
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
    
    .sch-grid-layout {
      display: grid;
      grid-template-columns: 8fr 4fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sch-grid-layout { grid-template-columns: 1fr; }
    }

    .sch-scheme-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-left: 4px solid var(--p-gold);
      border-radius: 16px;
      padding: 28px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 24px;
      transition: all 0.3s ease;
    }
    .sch-scheme-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12,20,36,0.08);
      border-left-color: #b91c1c;
    }
    .sch-scheme-title {
      font-family: var(--p-font-serif);
      font-size: 22px;
      color: var(--p-navy-deep);
      font-weight: 700;
      margin-bottom: 12px;
    }
    .sch-list {
      margin-left: 20px;
      line-height: 1.8;
      color: rgba(12,20,36,0.8);
      font-size: 15.5px;
    }
    .sch-list li {
      margin-bottom: 6px;
    }

    .portal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }
    .portal-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 12px;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      text-decoration: none;
      color: var(--p-navy-deep);
      font-weight: 700;
      font-size: 14.5px;
      box-shadow: 0 2px 10px rgba(12,20,36,0.03);
      transition: all 0.25s ease;
    }
    .portal-card:hover {
      border-color: var(--p-gold);
      background: var(--p-navy-deep);
      color: #ffffff !important;
      transform: translateY(-2px);
    }

    .docs-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 12px 32px rgba(12,20,36,0.06);
      position: sticky;
      top: 100px;
    }
    .docs-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      color: var(--p-navy-deep);
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--p-gold);
      font-weight: 700;
    }
    .docs-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .docs-list li {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      color: rgba(12,20,36,0.85);
      font-weight: 600;
    }
    .docs-list li span {
      color: var(--p-gold);
      font-size: 16px;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">05 · Financial Assistance &amp; Welfare</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Students Scholarship Information
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Government of India and State Government scholarships supporting meritorious, SC, ST, OBC, and Minority category students at RKDF University.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="sch-grid-layout">
        
        <!-- LEFT COLUMN: SCHOLARSHIP SCHEMES -->
        <div>
          <span class="rk-eyebrow">Government Financial Assistance</span>
          <h2 class="rk-h2" style="margin-bottom:16px;">Available Scholarship Schemes</h2>
          
          <div style="background:#ffffff;border:1px solid var(--p-hairline);border-radius:16px;padding:28px;box-shadow:0 4px 20px rgba(12,20,36,0.04);margin-bottom:32px;">
            <div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
              <img src="images/img/scholership.jpg" alt="Scholarships" style="max-height:140px;border-radius:12px;object-fit:cover;" onerror="this.style.display='none';">
              <div style="flex:1;">
                <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:8px;">Empowering Youth Through Financial Support</h3>
                <p style="font-size:15.5px;color:rgba(12,20,36,0.8);line-height:1.7;">
                  The Govt. of India and Govt. of Madhya Pradesh provide various scholarships to students of RKDF University, supporting national initiatives such as Pradhan Mantri Kaushal Vikas Yojana (PMKVY), Digital India, Swachh Bharat, and Jan Dhan Yojana.
                </p>
              </div>
            </div>
          </div>

          <!-- SCHEME 1 -->
          <div class="sch-scheme-card">
            <div class="sch-scheme-title">1. Mukhyamantri Medhavi Vidyarthi Yojana (MMVY), Madhya Pradesh</div>
            <ul class="sch-list">
              <li>Applicable for students who passed 12th with 75%+ from MP State Board or 85%+ from CBSE/ICSE.</li>
              <li>Annual family income must not exceed INR 6 Lakhs.</li>
              <li>Engineering candidates: JEE Mains rank up to 50,000 or less.</li>
              <li>Medical/Dental candidates: Cleared NEET exam.</li>
              <li>Law candidates: Cleared CLAT exam and admitted into NLU.</li>
              <li>Must be a permanent domicile of Madhya Pradesh.</li>
            </ul>
          </div>

          <!-- SCHEME 2 -->
          <div class="sch-scheme-card">
            <div class="sch-scheme-title">2. Post Matric Scholarship Scheme for OBC Students, Madhya Pradesh</div>
            <ul class="sch-list">
              <li>For Other Backward Classes (OBC) students pursuing post-secondary higher education.</li>
              <li>Annual family income &lt; INR 75,000 for 100% scholarship.</li>
              <li>Annual family income up to INR 1,00,000 for 50% scholarship.</li>
            </ul>
          </div>

          <!-- SCHEME 3 -->
          <div class="sch-scheme-card">
            <div class="sch-scheme-title">3. Post Matric Scholarship Scheme (SC Students)</div>
            <ul class="sch-list">
              <li>For Scheduled Caste (SC) category students studying at post-secondary level.</li>
              <li>Financial assistance for tuition fees, maintenance allowance, and academic materials.</li>
            </ul>
          </div>

          <!-- SCHEME 4 -->
          <div class="sch-scheme-card">
            <div class="sch-scheme-title">4. Post Matric Scholarship Scheme (ST Students)</div>
            <ul class="sch-list">
              <li>For Scheduled Tribe (ST) category students studying at post-secondary level.</li>
              <li>Annual family income &lt; INR 2,50,000 for 100% scholarship.</li>
              <li>Annual family income between INR 2,50,000 and INR 6,00,000 for 50% scholarship.</li>
            </ul>
          </div>

          <!-- SCHEME 5 -->
          <div class="sch-scheme-card">
            <div class="sch-scheme-title">5. Scholarship For Minority Category Students</div>
            <ul class="sch-list">
              <li>Provided by Govt. of India and MP Govt. for meritorious minority community students.</li>
              <li>Aims to ensure financial assistance so deserving students are not deprived of higher education.</li>
            </ul>
          </div>

          <!-- OTHER STATE SCHOLARSHIP PORTALS -->
          <div style="margin-top:40px;">
            <span class="rk-eyebrow">State &amp; National Portals</span>
            <h3 class="rk-h2" style="font-size:24px;margin-bottom:12px;">Scholarship Portals for Other States</h3>
            <p style="color:rgba(12,20,36,0.7);font-size:15.5px;">
              Students from UP, Bihar, Jharkhand, Maharashtra, Uttarakhand, Chhattisgarh, etc., studying at RKDF University can apply directly via their respective state scholarship portals:
            </p>

            <div class="portal-grid">
              <a href="http://scholarshipportal.mp.nic.in/Index.aspx" target="_blank" class="portal-card">
                <span>Madhya Pradesh Portal</span> ↗
              </a>
              <a href="https://scholarship.up.gov.in/registrationnew.aspx" target="_blank" class="portal-card">
                <span>Uttar Pradesh Portal</span> ↗
              </a>
              <a href="https://pmsonline.bih.nic.in/" target="_blank" class="portal-card">
                <span>Bihar PMS Portal</span> ↗
              </a>
              <a href="https://govtschemes.in/uttarakhand-scstobc-students-scholarship-scheme#gsc.tab=0" target="_blank" class="portal-card">
                <span>Uttarakhand Portal</span> ↗
              </a>
              <a href="https://ekalyan.cgg.gov.in/" target="_blank" class="portal-card">
                <span>Jharkhand e-Kalyan</span> ↗
              </a>
              <a href="http://schoolscholarship.cg.nic.in/" target="_blank" class="portal-card">
                <span>Chhattisgarh Portal</span> ↗
              </a>
              <a href="https://mahadbt.maharashtra.gov.in/login/login" target="_blank" class="portal-card">
                <span>Maharashtra MahaDBT</span> ↗
              </a>
              <a href="https://scholarships.gov.in/" target="_blank" class="portal-card">
                <span>National Scholarship Portal</span> ↗
              </a>
            </div>
          </div>

        </div>

        <!-- RIGHT COLUMN: REQUIRED DOCUMENTS CHECKLIST -->
        <div>
          <div class="docs-card">
            <div class="docs-title">Required Documents Checklist</div>
            <ul class="docs-list">
              <li><span>✔</span> Photocopy of Caste Certificate</li>
              <li><span>✔</span> Photocopy of Domicile Certificate</li>
              <li><span>✔</span> Income Certificate of Parents</li>
              <li><span>✔</span> Attested Marksheets (Last Exam Passed)</li>
              <li><span>✔</span> Transfer Certificate (TC)</li>
              <li><span>✔</span> University Fee Receipt Copy</li>
              <li><span>✔</span> Residential / Address Proof</li>
              <li><span>✔</span> Passport Size Photographs</li>
              <li><span>✔</span> Bank Account Details / Passbook</li>
              <li><span>✔</span> Aadhaar Card / Voter ID Card</li>
              <li><span>✔</span> Samagra ID (for MP Domicile)</li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
