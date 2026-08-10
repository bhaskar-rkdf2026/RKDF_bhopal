<?php
// ============================================================
// RKDF University — Modern Alumni Network & Association Page
// 100% Dynamic CMS Integration (Connected to admin/manage_pages.php?slug=alumni)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageSlug = 'alumni';
$pdo = getDbConnection();

// Fetch dynamic page header content from site_pages table
$stmtPage = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmtPage->execute([$pageSlug]);
$pageData = $stmtPage->fetch();

// Default Fallbacks
$eyebrow       = $pageData['eyebrow'] ?? 'ALUMNI NETWORK · RKDF UNIVERSITY BHOPAL';
$pageTitle     = $pageData['page_title'] ?? 'Alumni Network & Global Association';
$heroSubtitle  = $pageData['hero_subtitle'] ?? 'Connecting graduates across the globe — building strong professional networks, career opportunities, and lifelong university bonds.';
$heroBgImage   = !empty($pageData['hero_bg_image']) ? $pageData['hero_bg_image'] : 'images/lovable/rkdf-why-bg.jpg';
$introHeading  = $pageData['intro_heading'] ?? 'Welcome to RKDF University Alumni Association';
$introText     = $pageData['intro_text'] ?? 'Any institution\'s Alumni are key to its growth. Once you graduate from RKDF University, you are forever an integral part of our global alumni network. Stay connected with fellow graduates, explore career opportunities, attend exclusive reunions, and enjoy lifelong membership benefits.';

// Fetch dynamic section items grouped by group_key
$stmtItems = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order ASC, id ASC");
$stmtItems->execute([$pageSlug]);
$allItems = $stmtItems->fetchAll();

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$benefitItems   = $groupedItems['benefits'] ?? [];
$galleryItems   = $groupedItems['gallery'] ?? [];
$coordinatorArr = $groupedItems['coordinator'] ?? [];
$downloadItems  = $groupedItems['downloads'] ?? [];

// Coordinator fallback if empty
$coordItem = $coordinatorArr[0] ?? [
    'title' => 'Dr. Puneet Dwivedi',
    'subtitle' => 'Alumni Coordinator',
    'text_val' => 'Department of Alumni Relations & Placement Cell',
    'image_path' => 'images/puneet_sir.jpeg',
    'badge_text' => '+91 9131267657',
    'link_url' => 'tel:+919131267657'
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
    .alumni-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.92) 0%, rgba(21,34,56,0.88) 60%, rgba(12,20,36,0.95) 100%), 
                  url('<?= htmlspecialchars($heroBgImage) ?>') center/cover no-repeat;
      color: #ffffff;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .alumni-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.15em;
      color: #C5A059;
      text-transform: uppercase;
      display: inline-block;
      margin-bottom: 12px;
    }
    .alumni-hero-title {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: clamp(2.6rem, 5vw, 4.5rem);
      font-weight: 400;
      line-height: 1.1;
      color: #ffffff;
      margin-bottom: 16px;
    }
    .alumni-hero-sub {
      font-size: 17px;
      max-width: 780px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
    }

    /* ── Main Layout Container ── */
    .alumni-section {
      padding: 60px 0 90px;
      background: #fafafa;
      color: #1e293b;
    }
    .alumni-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px;
    }
    @media (min-width: 1024px) {
      .alumni-grid {
        grid-template-columns: 1fr 340px;
      }
    }

    /* ── Featured Banner & Quote Card ── */
    .alumni-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
    }
    .alumni-banner-box {
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 24px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      border: 1px solid #e2e8f0;
    }
    .alumni-banner-box img {
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
      font-size: 24px;
      font-style: italic;
      color: #0C1424;
      line-height: 1.4;
    }

    /* ── Benefit Cards Grid ── */
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
    .benefits-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      margin-bottom: 40px;
    }
    @media (min-width: 640px) {
      .benefits-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      }
    }
    .benefit-card {
      background: #ffffff;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      transition: all 0.3s ease;
      position: relative;
    }
    .benefit-card:hover {
      border-color: #E31B23;
      transform: translateY(-3px);
      box-shadow: 0 12px 28px rgba(12,20,36,0.08);
    }
    .benefit-badge {
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
    .benefit-title {
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .benefit-sub {
      font-size: 13px;
      font-weight: 600;
      color: #C5A059;
      margin-bottom: 10px;
    }
    .benefit-text {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
    }

    /* ── Gallery Photo Grid ── */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }
    .gallery-item {
      position: relative;
      border-radius: 12px;
      overflow: hidden;
      background: #000;
      aspect-ratio: 4 / 3;
      box-shadow: 0 4px 14px rgba(0,0,0,0.1);
      border: 1px solid #e2e8f0;
    }
    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease, opacity 0.4s ease;
      display: block;
    }
    .gallery-item:hover img {
      transform: scale(1.08);
      opacity: 0.88;
    }
    .gallery-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 10px 12px;
      background: linear-gradient(to top, rgba(12,20,36,0.9), transparent);
      color: #ffffff;
      font-size: 12px;
      font-weight: 600;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .gallery-item:hover .gallery-caption {
      opacity: 1;
    }

    /* ── Sidebar Widgets ── */
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
    .download-link-btn span {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    /* Coordinator Contact Profile Widget */
    .coordinator-widget {
      text-align: center;
      padding: 8px 0;
    }
    .coordinator-img-wrap {
      width: 130px;
      height: 140px;
      margin: 0 auto 16px;
      border-radius: 12px;
      overflow: hidden;
      border: 3px solid #C5A059;
      box-shadow: 0 6px 18px rgba(0,0,0,0.12);
    }
    .coordinator-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .coordinator-name {
      font-size: 18px;
      font-weight: 800;
      color: #0C1424;
      margin-bottom: 4px;
    }
    .coordinator-role {
      font-size: 13px;
      font-weight: 600;
      color: #E31B23;
      margin-bottom: 8px;
    }
    .coordinator-dept {
      font-size: 12.5px;
      color: #64748b;
      line-height: 1.4;
      margin-bottom: 14px;
    }
    .coordinator-phone-btn {
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
    .coordinator-phone-btn:hover {
      background: #E31B23;
    }

    /* Poster Banner Widget */
    .poster-widget img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      display: block;
    }
  </style>
</head>
<body>

  <!-- APPROVED HEADER & NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC SUBPAGE HERO SECTION -->
  <section class="alumni-hero">
    <div class="rk-container">
      <span class="alumni-eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="alumni-hero-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <p class="alumni-hero-sub"><?= htmlspecialchars($heroSubtitle) ?></p>
    </div>
  </section>

  <!-- MAIN ALUMNI CONTENT SECTION -->
  <section class="alumni-section">
    <div class="rk-container">
      <div class="alumni-grid">

        <!-- LEFT COLUMN: MAIN CONTENT & GALLERY -->
        <div class="alumni-left">

          <!-- Welcome Banner & Main Overview Card -->
          <div class="alumni-card">
            <h2 class="section-heading-sm"><?= htmlspecialchars($introHeading) ?></h2>

            <div class="alumni-banner-box">
              <img src="images/img/RKDF_Tnp.png" alt="RKDF University Placement & Alumni Network" onError="this.style.display='none';">
            </div>

            <div class="quote-box">
              <div class="quote-text">"Any institution's Alumni are key to its growth."</div>
            </div>

            <div style="font-size:15px;line-height:1.8;color:#334155;">
              <p><?= nl2br(htmlspecialchars($introText)) ?></p>
            </div>
          </div>

          <!-- Alumni Key Benefits Grid Cards -->
          <div class="alumni-card">
            <h3 class="section-heading-sm">Why Stay Connected With RKDF Alumni Network?</h3>

            <div class="benefits-grid">
              <?php if (!empty($benefitItems)): ?>
                <?php foreach ($benefitItems as $b): ?>
                  <div class="benefit-card">
                    <span class="benefit-badge"><?= htmlspecialchars($b['badge_text'] ?: 'BENEFIT') ?></span>
                    <h4 class="benefit-title"><?= htmlspecialchars($b['title']) ?></h4>
                    <?php if (!empty($b['subtitle'])): ?>
                      <div class="benefit-sub"><?= htmlspecialchars($b['subtitle']) ?></div>
                    <?php endif; ?>
                    <p class="benefit-text"><?= nl2br(htmlspecialchars($b['text_val'])) ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <!-- Default Baseline Benefits Fallback -->
                <div class="benefit-card">
                  <span class="benefit-badge">01 · CAREER</span>
                  <h4 class="benefit-title">Professional Networking &amp; Career Opportunities</h4>
                  <div class="benefit-sub">Global Network &amp; Mentorship</div>
                  <p class="benefit-text">Connect with fellow graduates from CEOs to coordinators across industries. Access job boards, resume clinics, start-up workshops, and mentorship programs.</p>
                </div>
                <div class="benefit-card">
                  <span class="benefit-badge">02 · COMMUNITY</span>
                  <h4 class="benefit-title">Community &amp; Annual Reunions</h4>
                  <div class="benefit-sub">Alumni Meet &amp; Social Mixers</div>
                  <p class="benefit-text">Receive exclusive invitations to city-wide alumni happy hours, networking lunches, volunteering initiatives, and campus homecoming events.</p>
                </div>
                <div class="benefit-card">
                  <span class="benefit-badge">03 · PERKS</span>
                  <h4 class="benefit-title">Exclusive Discounts &amp; Member Perks</h4>
                  <div class="benefit-sub">Lifelong University Privileges</div>
                  <p class="benefit-text">Enjoy member-only offerings including lifelong learning courses, library access, fee-free banking options, and partner institution discounts.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Alumni Meet Photo Gallery Grid -->
          <div class="alumni-card">
            <h3 class="section-heading-sm">Alumni Meet Photo Gallery</h3>
            <p style="font-size:14px;color:#64748b;margin-bottom:16px;">Highlights &amp; memories from annual RKDF University alumni meets and reunions.</p>

            <div class="gallery-grid">
              <?php if (!empty($galleryItems)): ?>
                <?php foreach ($galleryItems as $gal): ?>
                  <div class="gallery-item">
                    <img src="<?= htmlspecialchars($gal['image_path']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" loading="lazy" onError="this.src='images/Alumni/a1.JPG';">
                    <div class="gallery-caption"><?= htmlspecialchars($gal['title']) ?></div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <!-- Default Baseline 10 Photo Gallery Grid -->
                <?php for ($i = 1; $i <= 10; $i++): ?>
                  <div class="gallery-item">
                    <img src="images/Alumni/a<?= $i ?>.JPG" alt="Alumni Meet Moment #<?= $i ?>" loading="lazy">
                    <div class="gallery-caption">Alumni Meet #<?= $i ?></div>
                  </div>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>

        </div><!-- /alumni-left -->

        <!-- RIGHT SIDEBAR: DOWNLOADS & COORDINATOR -->
        <div class="alumni-sidebar">

          <!-- Alumni Downloads & Quick Links Card -->
          <div class="sidebar-card">
            <h3 class="sidebar-card-title">Alumni Resources</h3>
            <div class="download-btn-list">
              <?php if (!empty($downloadItems)): ?>
                <?php foreach ($downloadItems as $d): ?>
                  <a href="<?= htmlspecialchars($d['link_url']) ?>" target="_blank" class="download-link-btn">
                    <span>📄 <?= htmlspecialchars($d['title']) ?></span>
                    <span>→</span>
                  </a>
                <?php endforeach; ?>
              <?php else: ?>
                <a href="Download/Alumini_Association_RKDFU.pdf" target="_blank" class="download-link-btn">
                  <span>📄 Alumni Association Rules</span>
                  <span>PDF ↗</span>
                </a>
                <a href="images/Alumni-form.pdf" target="_blank" class="download-link-btn">
                  <span>📝 Alumni Registration Form</span>
                  <span>PDF ↗</span>
                </a>
                <a href="imggallery.php" class="download-link-btn">
                  <span>🖼️ Full Photo Gallery</span>
                  <span>View ↗</span>
                </a>
              <?php endif; ?>
            </div>
          </div>

          <!-- Alumni Coordinator Card -->
          <div class="sidebar-card">
            <h3 class="sidebar-card-title">Alumni Cell Desk</h3>
            <div class="coordinator-widget">
              <div class="coordinator-img-wrap">
                <img src="<?= htmlspecialchars($coordItem['image_path']) ?>" alt="<?= htmlspecialchars($coordItem['title']) ?>" onError="this.src='images/puneet_sir.jpeg';">
              </div>
              <div class="coordinator-name"><?= htmlspecialchars($coordItem['title']) ?></div>
              <div class="coordinator-role"><?= htmlspecialchars($coordItem['subtitle']) ?></div>
              <div class="coordinator-dept"><?= htmlspecialchars($coordItem['text_val']) ?></div>
              <a href="<?= htmlspecialchars($coordItem['link_url'] ?: 'tel:+919131267657') ?>" class="coordinator-phone-btn">
                <span>📞 Call: <?= htmlspecialchars($coordItem['badge_text'] ?: '+91 9131267657') ?></span>
              </a>
            </div>
          </div>

          <!-- Event Poster Sidebar Banner -->
          <div class="sidebar-card poster-widget">
            <h3 class="sidebar-card-title">Annual Meet Poster</h3>
            <img src="images/Alumni/alumni_rkdf.jpg" alt="RKDF Alumni Event Banner" onError="this.style.display='none';">
          </div>

        </div><!-- /alumni-sidebar -->

      </div><!-- /alumni-grid -->
    </div><!-- /rk-container -->
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
