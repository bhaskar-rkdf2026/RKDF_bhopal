<?php
// ============================================================
// RKDF University — About Us Overview (100% Dynamic CMS)
// Authentic Content from About_Us.pdf + Original Design & Styling
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/include/cms_engine.php';

$pageSlug = 'about';
$pRow = cms_get_page($pageSlug);
$allSections = cms_get_page_sections($pageSlug);
$stats = [];
$brochure = null;

foreach ($allSections as $s) {
    if (($s['group_key'] ?? '') === 'stats') {
        $stats[] = $s;
    } else {
        $brochure = $s;
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '01 · OVERVIEW';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'About RKDF University';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Education Glorifies the Nation — Pioneer in Skill-Based, Technology-Driven Higher Education and Advanced Research.';
$defaultIntroText = "Ram Krishna Dharmarth Foundation (RKDF) University, Bhopal was established in the year 2011 by an Act of Madhya Pradesh State Legislature under the MP Niji Vishwavidyalaya Adhiniyam, 2007.\n\nThe University is sponsored by the RKDF Education Society, which has been a pioneer in higher education since 1995. Over the years, RKDF Group has grown into one of the largest educational groups in Central India, operating multiple campuses, colleges, and research institutes across engineering, management, pharmacy, medical sciences, agriculture, and humanities.\n\nRKDF University Bhopal is recognized by the University Grants Commission (UGC) under Section 2(f) of the UGC Act 1956 and is approved by respective statutory bodies including AICTE, PCI, BCI, NCTE, and INC. The University is committed to fostering academic excellence, industry alignment, multidisciplinary research, and holistic student development.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : 'About RKDF University Bhopal';
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultIntroText;
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-why-bg.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
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
    
    .ab-main-sec {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    /* Stats Grid */
    .ab-stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 24px;
      margin-bottom: 60px;
    }

    .ab-stat-card {
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    .ab-stat-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 4px; height: 100%;
      background: #C5A059;
    }
    .ab-stat-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 36px rgba(12,20,36,0.08);
    }
    .ab-stat-num {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 38px;
      font-weight: 700;
      color: #E31B23;
      line-height: 1;
      margin-bottom: 8px;
    }
    .ab-stat-title {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .ab-stat-desc {
      font-size: 13.5px;
      color: #64748B;
      line-height: 1.5;
    }

    /* Layout Grid */
    .ab-grid-layout {
      display: grid;
      grid-template-columns: 8fr 4fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ab-grid-layout { grid-template-columns: 1fr; }
    }

    .ab-card-box {
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 4px 24px rgba(12,20,36,0.04);
      margin-bottom: 36px;
    }

    .ab-text-para {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 24px;
    }
    .ab-text-para:last-child {
      margin-bottom: 0;
    }

    .ab-quote-box {
      background: #0C1424;
      color: #ffffff;
      padding: 28px 32px;
      border-radius: 16px;
      border-left: 5px solid #C5A059;
      margin: 32px 0;
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-style: italic;
      line-height: 1.6;
    }

    /* Sidebar Links */
    aside { position: sticky; top: 100px; }
    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12,20,36,0.04);
      margin-bottom: 24px;
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
      border: 1px solid rgba(12,20,36,0.05);
      transition: all 0.25s ease;
    }
    .sidebar-link:hover, .sidebar-link.active {
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
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:760px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ab-main-sec">
    <div class="rk-container">

      <!-- STATS HIGHLIGHTS GRID -->
      <div class="ab-stats-grid">
        <div class="ab-stat-card">
          <div class="ab-stat-num">15,000+</div>
          <div class="ab-stat-title">Students Enrolled</div>
          <div class="ab-stat-desc">Pursuing UG, PG &amp; Doctoral programs</div>
        </div>
        <div class="ab-stat-card">
          <div class="ab-stat-num">16</div>
          <div class="ab-stat-title">Faculties &amp; Schools</div>
          <div class="ab-stat-desc">Multidisciplinary academic units</div>
        </div>
        <div class="ab-stat-card">
          <div class="ab-stat-num">99</div>
          <div class="ab-stat-title">Degree Courses</div>
          <div class="ab-stat-desc">Approved UG, PG &amp; Diploma degrees</div>
        </div>
        <div class="ab-stat-card">
          <div class="ab-stat-num">42</div>
          <div class="ab-stat-title">Value-Added Courses</div>
          <div class="ab-stat-desc">Skill enhancement certifications</div>
        </div>
        <div class="ab-stat-card">
          <div class="ab-stat-num">2.02 Lakh+</div>
          <div class="ab-stat-title">Library Books</div>
          <div class="ab-stat-desc">1 Central + 19 Departmental Libraries</div>
        </div>
      </div>

      <!-- GRID LAYOUT -->
      <div class="ab-grid-layout">
        
        <!-- LEFT COLUMN: AUTHENTIC OVERVIEW TEXT FROM PDF -->
        <div>
          <article class="ab-card-box">
            <h2 class="rk-h2" style="margin-bottom:28px;"><?= htmlspecialchars($introHeading) ?></h2>
            
            <div class="ab-quote-box">
              “Education Glorifies the Nation”
            </div>

            <?php
            $paragraphs = explode("\n", $introText);
            foreach ($paragraphs as $para):
              $para = trim($para);
              if (!empty($para)):
            ?>
            <p class="ab-text-p"><?= htmlspecialchars($para) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- PDF Brochure Link Option -->
            <div style="margin-top:40px;padding:24px;background:#FAF9F5;border:1px solid rgba(12,20,36,0.08);border-radius:14px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
              <div>
                <h4 style="font-size:17px;font-weight:700;color:#0C1424;margin-bottom:4px;">Download Illustrated Brochure</h4>
                <p style="font-size:14px;color:#64748B;margin:0;">Download the original PDF information brochure for offline reading.</p>
              </div>
              <a href="About_Us.pdf" target="_blank" class="rk-btn rk-btn-primary" style="padding:10px 20px;font-size:14px;">
                📄 View PDF Document ↗
              </a>
            </div>

          </article>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">About RKDF</h3>
            <ul class="sidebar-nav-list">
              <li><a href="about.php" class="sidebar-link active"><span>About Us Overview</span> <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link"><span>Vision &amp; Mission</span> <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link"><span>Objectives</span> <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>→</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link"><span>Pro-Chancellor</span> <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice Chancellor's Desk</span> <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link"><span>Registrar Profile</span> <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link"><span>Board of Management</span> <span>→</span></a></li>
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
