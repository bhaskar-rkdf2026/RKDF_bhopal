<?php
// ============================================================
// RKDF University — Students Scholarship & Financial Welfare
// World-Class Premium Design + High-Res Media Assets + 100% Original Content & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'scholarship';

$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ADMISSIONS · SCHOLARSHIPS';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'University Scholarships & Financial Aid';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Government post-matric scholarships (ST/SC/OBC), MP Medhavi Chhatra Yojana, and Chancellor Merit Scholarships.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-why-bg.jpg';

$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
$itemStmt->execute([$pageSlug]);
$allItems = $itemStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($mainTitle) ?> — RKDF University Bhopal</title>
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
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ssch-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ssch-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ssch-grid-layout { grid-template-columns: 1fr; }
    }

    .ssch-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ssch-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ssch-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ssch-badge {
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

    .ssch-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ssch-card-body {
      padding: 32px 36px;
    }

    .ssch-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ssch-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ssch-block-card:hover .ssch-media-img {
      transform: scale(1.04);
    }

    /* Scheme Cards */
    .sch-scheme-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 16px;
      padding: 24px 28px;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.03);
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    .sch-scheme-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-left-color: #E31B23;
    }

    .sch-scheme-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      color: #0C1424;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .sch-list {
      margin-left: 20px;
      line-height: 1.8;
      color: #334155;
      font-size: 15px;
    }
    .sch-list li {
      margin-bottom: 6px;
    }

    /* Portals Grid */
    .portal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }

    .portal-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 18px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      text-decoration: none;
      color: #0C1424;
      font-weight: 700;
      font-size: 14.5px;
      transition: all 0.25s ease;
    }
    .portal-card:hover {
      border-color: #0C1424;
      background: #0C1424;
      color: #ffffff !important;
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.1);
    }

    /* Sidebar Checklist Card */
    aside {
      position: sticky;
      top: 100px;
    }

    .docs-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 24px;
    }

    .docs-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      color: #0C1424;
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 2px solid #E31B23;
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
      color: #334155;
      font-weight: 600;
    }

    .docs-list li span {
      color: #C5A059;
      font-weight: 700;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">80 · FINANCIAL ASSISTANCE &amp; STUDENT WELFARE</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Students Scholarship Information</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Government of India and State Government scholarships supporting meritorious, SC, ST, OBC, and Minority category students at RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ssch-main-section">
    <div class="rk-container">
      <div class="ssch-grid-layout">
        
        <!-- LEFT COLUMN: SCHOLARSHIP SCHEMES -->
        <div>

          <article class="ssch-block-card">
            <div class="ssch-card-header">
              <h2 class="ssch-card-title">Government Financial Assistance</h2>
              <span class="ssch-badge">GOVT SCHOLARSHIP SCHEMES</span>
            </div>
            <div class="ssch-card-body">

              <div class="ssch-media-frame">
                <img src="images/ai_scholarship/rkdf_sch_card.jpg" alt="RKDF Students Receiving Academic Scholarships" class="ssch-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Empowering Youth Through Financial Support
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                The Govt. of India and Govt. of Madhya Pradesh provide various scholarships to students of RKDF University, supporting national initiatives such as Pradhan Mantri Kaushal Vikas Yojana (PMKVY), Digital India, Swachh Bharat, and Jan Dhan Yojana.
              </p>

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

              <!-- STATE PORTALS GRID -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin:36px 0 14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                State &amp; National Scholarship Portals
              </div>

              <p style="color:#64748B;font-size:15px;margin-bottom:18px;">
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
          </article>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR CHECKLIST & QUICK LINKS -->
        <aside>
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
        </aside>

      </div>
    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
