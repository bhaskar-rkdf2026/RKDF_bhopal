<?php
// ============================================================
// RKDF University — Modern Training & Placement (T&P) Cell Page
// 100% Dynamic CMS Integration (Connected to admin/manage_pages.php?slug=t%26p)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageSlug = 't&p';
$pdo = getDbConnection();

// Fetch dynamic page header content from site_pages table
$stmtPage = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmtPage->execute([$pageSlug]);
$pageData = $stmtPage->fetch();

// Default Fallbacks
$eyebrow       = $pageData['eyebrow'] ?? 'CAREER DEVELOPMENT · RKDF UNIVERSITY BHOPAL';
$pageTitle     = $pageData['page_title'] ?? 'Training & Placement Cell';
$heroSubtitle  = $pageData['hero_subtitle'] ?? 'Assisting students in achieving top placement offers, internships, pre-placement training, and industry-academia interactions.';
$heroBgImage   = !empty($pageData['hero_bg_image']) ? $pageData['hero_bg_image'] : 'images/lovable/rkdf-why-bg.jpg';
$introHeading  = $pageData['intro_heading'] ?? 'Welcome to RKDF University Training & Placement Cell';
$introText     = $pageData['intro_text'] ?? 'The Training and Placement (T&P) Cell plays a major role for any organization. Training and Placement Cell helps in finding the right Job Opportunities for the students passing out from the Institute by collaborating with leading corporate organizations.';

// Fetch dynamic section items grouped by group_key
$stmtItems = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order ASC, id ASC");
$stmtItems->execute([$pageSlug]);
$allItems = $stmtItems->fetchAll();

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$programItems   = $groupedItems['programs'] ?? [];
$headContactArr = $groupedItems['head_contact'] ?? [];
$downloadItems  = $groupedItems['downloads'] ?? [];

// T&P Head contact fallback
$headItem = $headContactArr[0] ?? [
    'title' => 'Mr. Waseem Zaidi',
    'subtitle' => 'T & P Head',
    'text_val' => 'Department of Training & Placements, RKDF University Bhopal. Email: tnprkdf01@gmail.com, tnp@rkdf.ac.in',
    'image_path' => 'images/img/arun sir.jpeg',
    'badge_text' => '+91-9179416903',
    'link_url' => 'tel:+919179416903'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> — RKDF University Bhopal</title>
  <meta name="description" content="<?= htmlspecialchars(strip_tags($heroSubtitle)) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css?v=<?= time() ?>">
  <link rel="stylesheet" href="css/rkdf-navbar.css?v=<?= time() ?>">
  
  <style>
    /* ── Subpage Hero Section ── */
    .tp-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.92) 0%, rgba(21,34,56,0.88) 60%, rgba(12,20,36,0.95) 100%), 
                  url('<?= htmlspecialchars($heroBgImage) ?>') center/cover no-repeat;
      color: #ffffff;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .tp-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.15em;
      color: #C5A059;
      text-transform: uppercase;
      display: inline-block;
      margin-bottom: 12px;
    }
    .tp-hero-title {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: clamp(2.6rem, 5vw, 4.5rem);
      font-weight: 400;
      line-height: 1.1;
      color: #ffffff;
      margin-bottom: 16px;
    }
    .tp-hero-sub {
      font-size: 17px;
      max-width: 780px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
    }

    /* ── Main Layout Container ── */
    .tp-section {
      padding: 60px 0 90px;
      background: #fafafa;
      color: #1e293b;
    }
    .tp-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px;
    }
    @media (min-width: 1024px) {
      .tp-grid {
        grid-template-columns: 1fr 340px;
      }
    }

    /* ── Main Cards ── */
    .tp-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
    }
    .tp-banner-box {
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 24px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      border: 1px solid #e2e8f0;
    }
    .tp-banner-box img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
    }
    .quote-box {
      background: linear-gradient(135deg, rgba(227,27,35,0.04) 0%, rgba(197,160,89,0.08) 100%);
      border-left: 4px solid #E31B23;
      padding: 20px 24px;
      border-radius: 0 12px 12px 0;
      margin: 20px 0 28px;
    }
    .quote-text {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: 22px;
      font-style: italic;
      color: #0C1424;
      line-height: 1.4;
    }

    /* ── Program Cards Grid ── */
    .section-heading-sm {
      font-size: 22px;
      font-weight: 800;
      color: #0C1424;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .section-heading-sm::before {
      content: '';
      display: inline-block;
      width: 4px;
      height: 20px;
      background: #E31B23;
      border-radius: 2px;
    }
    .programs-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }
    @media (min-width: 640px) {
      .programs-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      }
    }
    .program-card {
      background: #ffffff;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      transition: all 0.3s ease;
    }
    .program-card:hover {
      border-color: #E31B23;
      transform: translateY(-3px);
      box-shadow: 0 12px 28px rgba(12,20,36,0.08);
    }
    .program-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227,27,35,0.08);
      padding: 4px 10px;
      border-radius: 99px;
      display: inline-block;
      margin-bottom: 12px;
    }
    .program-title {
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .program-sub {
      font-size: 13px;
      font-weight: 600;
      color: #C5A059;
      margin-bottom: 10px;
    }
    .program-text {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
    }

    /* ── Recruiter Gallery Showcase ── */
    .recruiter-img-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }
    .recruiter-img-card {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid #e2e8f0;
      box-shadow: 0 4px 12px rgba(0,0,0,0.04);
      background: #ffffff;
    }
    .recruiter-img-card img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
    }

    /* ── Sidebar Cards ── */
    .sidebar-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      margin-bottom: 24px;
    }
    .sidebar-card-title {
      font-size: 17px;
      font-weight: 800;
      color: #0C1424;
      padding-bottom: 12px;
      border-bottom: 2px solid #E31B23;
      margin-bottom: 18px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .download-btn-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .download-link-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      color: #0C1424;
      text-decoration: none !important;
      font-size: 13.5px;
      font-weight: 600;
      transition: all 0.25s ease;
    }
    .download-link-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
      border-color: #E31B23;
      transform: translateX(3px);
    }

    /* T&P Head Profile Widget */
    .head-widget {
      text-align: center;
      padding: 8px 0;
    }
    .head-img-wrap {
      width: 120px;
      height: 130px;
      margin: 0 auto 16px;
      border-radius: 12px;
      overflow: hidden;
      border: 3px solid #C5A059;
      box-shadow: 0 6px 18px rgba(0,0,0,0.12);
      background: #f1f5f9;
    }
    .head-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .head-name {
      font-size: 18px;
      font-weight: 800;
      color: #0C1424;
      margin-bottom: 4px;
    }
    .head-role {
      font-size: 13px;
      font-weight: 600;
      color: #E31B23;
      margin-bottom: 8px;
    }
    .head-dept {
      font-size: 12.5px;
      color: #64748b;
      line-height: 1.4;
      margin-bottom: 14px;
    }
    .head-phone-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      background: #0C1424;
      color: #ffffff !important;
      text-decoration: none !important;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 700;
      transition: background 0.25s ease;
    }
    .head-phone-btn:hover {
      background: #E31B23;
    }

    /* Poster Widget */
    .poster-widget img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      display: block;
      margin-bottom: 12px;
    }
  </style>
</head>
<body>

  <!-- APPROVED HEADER & NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC SUBPAGE HERO SECTION -->
  <section class="tp-hero">
    <div class="rk-container">
      <span class="tp-eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="tp-hero-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <p class="tp-hero-sub"><?= htmlspecialchars($heroSubtitle) ?></p>
    </div>
  </section>

  <!-- MAIN T&P CONTENT SECTION -->
  <section class="tp-section">
    <div class="rk-container">
      <div class="tp-grid">

        <!-- LEFT COLUMN: MAIN CONTENT & RECRUITERS -->
        <div class="tp-left">

          <!-- Welcome Banner & Overview Card -->
          <div class="tp-card">
            <h2 class="section-heading-sm"><?= htmlspecialchars($introHeading) ?></h2>

            <div class="tp-banner-box">
              <img src="images/img/tnp02.png" alt="RKDF Training and Placement Cell" onError="this.style.display='none';">
            </div>

            <div class="quote-box">
              <div class="quote-text">"If you are able to deliver in all different stages, you can easily get a job through campus placement before graduation."</div>
            </div>

            <div style="font-size:15px;line-height:1.8;color:#334155;">
              <p><?= nl2br(htmlspecialchars($introText)) ?></p>
            </div>
          </div>

          <!-- Career Development Programs Grid -->
          <div class="tp-card">
            <h3 class="section-heading-sm">Career Development &amp; Awareness Programs</h3>

            <div class="programs-grid">
              <?php if (!empty($programItems)): ?>
                <?php foreach ($programItems as $p): ?>
                  <div class="program-card">
                    <span class="program-badge"><?= htmlspecialchars($p['badge_text'] ?: 'PROGRAM') ?></span>
                    <h4 class="program-title"><?= htmlspecialchars($p['title']) ?></h4>
                    <?php if (!empty($p['subtitle'])): ?>
                      <div class="program-sub"><?= htmlspecialchars($p['subtitle']) ?></div>
                    <?php endif; ?>
                    <p class="program-text"><?= nl2br(htmlspecialchars($p['text_val'])) ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <!-- Default Baseline Programs -->
                <div class="program-card">
                  <span class="program-badge">PROGRAM 01</span>
                  <h4 class="program-title">Capability &amp; Confidence Enhancement</h4>
                  <div class="program-sub">Skill Building &amp; GD Sessions</div>
                  <p class="program-text">High Performance Computing Facility, Group Discussion practice, personality development programs, and entrepreneurship molding.</p>
                </div>
                <div class="program-card">
                  <span class="program-badge">PROGRAM 02</span>
                  <h4 class="program-title">Awareness &amp; Competitive Exam Training</h4>
                  <div class="program-sub">Government &amp; Defense</div>
                  <p class="program-text">Specialized training for Defense Services, Public Sector competitive exams, and higher education opportunities in India and abroad.</p>
                </div>
                <div class="program-card">
                  <span class="program-badge">PROGRAM 03</span>
                  <h4 class="program-title">Industry Internships &amp; Startups</h4>
                  <div class="program-sub">Corporate Readiness</div>
                  <p class="program-text">Industry internship tracks, live project mentorship, corporate workshops, and incubator support to nurture future leaders.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Recruiter Showcase -->
          <div class="tp-card">
            <h3 class="section-heading-sm">Placement Drives &amp; Corporate Campus Recruiters</h3>
            <p style="font-size:14px;color:#64748b;margin-bottom:16px;">Leading corporate organizations and recruitment drives at RKDF University Bhopal.</p>

            <div class="recruiter-img-grid">
              <div class="recruiter-img-card"><img src="t&p/tp23.jpg" alt="Recruitment Drive" loading="lazy" onError="this.style.display='none';"></div>
              <div class="recruiter-img-card"><img src="t&p/t&p15.jpeg" alt="Campus Placement" loading="lazy" onError="this.style.display='none';"></div>
              <div class="recruiter-img-card"><img src="t&p/t&p18.jpeg" alt="Student Placement" loading="lazy" onError="this.style.display='none';"></div>
              <div class="recruiter-img-card"><img src="t&p/t&p14.jpeg" alt="Corporate Partner" loading="lazy" onError="this.style.display='none';"></div>
              <div class="recruiter-img-card"><img src="t&p/t&p12.jpeg" alt="Industry Meet" loading="lazy" onError="this.style.display='none';"></div>
            </div>

            <div style="margin-top:24px;text-align:center;">
              <img src="t&p/logov.jpg" alt="RKDF Recruiters Logos" style="max-width:100%;height:auto;border-radius:12px;" onError="this.style.display='none';">
            </div>
          </div>

        </div><!-- /tp-left -->

        <!-- RIGHT SIDEBAR: DOWNLOADS & T&P HEAD -->
        <div class="tp-sidebar">

          <!-- Quick Downloads Card -->
          <div class="sidebar-card">
            <h3 class="sidebar-card-title">Placement Downloads</h3>
            <div class="download-btn-list">
              <?php if (!empty($downloadItems)): ?>
                <?php foreach ($downloadItems as $d): ?>
                  <a href="<?= htmlspecialchars($d['link_url']) ?>" target="_blank" class="download-link-btn">
                    <span>📄 <?= htmlspecialchars($d['title']) ?></span>
                    <span>→</span>
                  </a>
                <?php endforeach; ?>
              <?php else: ?>
                <a href="Download/Placed_List.pdf" target="_blank" class="download-link-btn">
                  <span>📄 Placed List Last 5 Years</span>
                  <span>PDF ↗</span>
                </a>
                <a href="Download/Placement Registration form.pdf" target="_blank" class="download-link-btn">
                  <span>📝 Placement Registration Form</span>
                  <span>PDF ↗</span>
                </a>
                <a href="imggallery.php" class="download-link-btn">
                  <span>🖼️ Placement Image Gallery</span>
                  <span>View ↗</span>
                </a>
              <?php endif; ?>
            </div>
          </div>

          <!-- T&P Head Contact Widget -->
          <div class="sidebar-card">
            <h3 class="sidebar-card-title">T &amp; P Head Desk</h3>
            <div class="head-widget">
              <div class="head-img-wrap">
                <img src="<?= htmlspecialchars($headItem['image_path']) ?>" alt="<?= htmlspecialchars($headItem['title']) ?>" onError="this.src='images/img/arun sir.jpeg';">
              </div>
              <div class="head-name"><?= htmlspecialchars($headItem['title']) ?></div>
              <div class="head-role"><?= htmlspecialchars($headItem['subtitle']) ?></div>
              <div class="head-dept"><?= htmlspecialchars($headItem['text_val']) ?></div>
              <a href="<?= htmlspecialchars($headItem['link_url'] ?: 'tel:+919179416903') ?>" class="head-phone-btn">
                <span>📞 Call: <?= htmlspecialchars($headItem['badge_text'] ?: '+91-9179416903') ?></span>
              </a>
            </div>
          </div>

          <!-- Placement Activities Posters -->
          <div class="sidebar-card poster-widget">
            <h3 class="sidebar-card-title">Placement Drives</h3>
            <img src="t&p/tp21.jpeg" alt="Placement Poster" onError="this.style.display='none';">
            <img src="t&p/tp22.jpeg" alt="Placement Drive Banner" onError="this.style.display='none';">
          </div>

        </div><!-- /tp-sidebar -->

      </div><!-- /tp-grid -->
    </div><!-- /rk-container -->
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
