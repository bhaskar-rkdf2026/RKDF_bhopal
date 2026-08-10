<?php
// ============================================================
// RKDF University — Modern University Prospectus & Guide
// 100% Dynamic CMS Integration (Connected to admin/manage_pages.php?slug=prospectus)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageSlug = 'prospectus';
$pdo = getDbConnection();

// Fetch dynamic page header content from site_pages table
$stmtPage = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmtPage->execute([$pageSlug]);
$pageData = $stmtPage->fetch();

// Default Fallbacks
$eyebrow       = $pageData['eyebrow'] ?? 'ADMISSIONS · PROSPECTUS 2026-27';
$pageTitle     = $pageData['page_title'] ?? 'University Prospectus & Information Brochure 2026-27';
$heroSubtitle  = $pageData['hero_subtitle'] ?? 'Comprehensive information brochure covering campus facilities, placement records, fee structures, and course details.';
$heroBgImage   = !empty($pageData['hero_bg_image']) ? $pageData['hero_bg_image'] : 'images/lovable/rkdf-building-enhanced.jpg';
$introHeading  = $pageData['intro_heading'] ?? 'Official RKDF University Information Prospectus';
$introText     = $pageData['intro_text'] ?? 'Explore the complete RKDF University Prospectus featuring academic programs across 16 faculties, state-of-the-art campus infrastructure, scholarship schemes, and admission guidelines.';

// Fetch dynamic section items grouped by group_key
$stmtItems = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order ASC, id ASC");
$stmtItems->execute([$pageSlug]);
$allItems = $stmtItems->fetchAll();

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$downloadItems = $groupedItems['downloads'] ?? [];
$featureItems  = $groupedItems['features'] ?? [];
$facultyItems  = $groupedItems['faculties'] ?? [];
$infraItems    = $groupedItems['infrastructure'] ?? [];
$pagesItems    = $groupedItems['pages'] ?? [];

// PDF Link Fallback
$prospectusPdf = !empty($downloadItems[0]['link_url']) ? $downloadItems[0]['link_url'] : 'Content/Documents/Prospectus  2024-25.pdf';
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
    .prospectus-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.92) 0%, rgba(21,34,56,0.88) 60%, rgba(12,20,36,0.95) 100%), 
                  url('<?= htmlspecialchars($heroBgImage) ?>') center/cover no-repeat;
      color: #ffffff;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .prospectus-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.15em;
      color: #C5A059;
      text-transform: uppercase;
      display: inline-block;
      margin-bottom: 12px;
    }
    .prospectus-hero-title {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: clamp(2.6rem, 5vw, 4.5rem);
      font-weight: 400;
      line-height: 1.1;
      color: #ffffff;
      margin-bottom: 16px;
    }
    .prospectus-hero-sub {
      font-size: 17px;
      max-width: 780px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
      margin-bottom: 24px;
    }
    .hero-btn-group {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
    }
    .hero-btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 28px;
      background: #E31B23;
      color: #ffffff !important;
      text-decoration: none !important;
      font-size: 14px;
      font-weight: 700;
      border-radius: 8px;
      transition: all 0.25s ease;
      box-shadow: 0 4px 16px rgba(227,27,35,0.4);
    }
    .hero-btn-primary:hover {
      background: #C9192A;
      transform: translateY(-2px);
    }
    .hero-btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 28px;
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.25);
      color: #ffffff !important;
      text-decoration: none !important;
      font-size: 14px;
      font-weight: 600;
      border-radius: 8px;
      backdrop-filter: blur(8px);
      transition: all 0.25s ease;
    }
    .hero-btn-secondary:hover {
      background: rgba(255,255,255,0.25);
    }

    /* ── Metrics Stats Bar ── */
    .metrics-bar {
      background: #0C1424;
      border-top: 1px solid rgba(255,255,255,0.1);
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding: 24px 0;
      color: #ffffff;
    }
    .metrics-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      text-align: center;
    }
    @media (min-width: 768px) {
      .metrics-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }
    .metric-val {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: 36px;
      color: #C5A059;
      line-height: 1;
      margin-bottom: 4px;
    }
    .metric-lbl {
      font-size: 13px;
      color: rgba(255,255,255,0.75);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* ── Main Section Layout ── */
    .prospectus-section {
      padding: 60px 0 90px;
      background: #fafafa;
      color: #1e293b;
    }
    
    /* Callout Download Card */
    .download-callout-card {
      background: linear-gradient(135deg, #0C1424 0%, #152238 100%);
      border-radius: 16px;
      padding: 32px;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 10px 30px rgba(12,20,36,0.15);
      margin-bottom: 48px;
      border: 1px solid rgba(255,255,255,0.1);
    }
    @media (min-width: 768px) {
      .download-callout-card {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }
    }
    .callout-info h2 {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: 28px;
      color: #ffffff;
      margin-bottom: 8px;
    }
    .callout-info p {
      font-size: 15px;
      color: rgba(255,255,255,0.8);
      max-width: 620px;
    }
    
    /* Section Headings */
    .section-heading {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: 32px;
      color: #0C1424;
      margin-bottom: 10px;
    }
    .section-sub {
      font-size: 15px;
      color: #64748b;
      margin-bottom: 32px;
    }

    /* ── Salient Features Cards Grid ── */
    .features-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
      margin-bottom: 56px;
    }
    @media (min-width: 640px) {
      .features-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .features-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    .feature-card {
      background: #ffffff;
      border-radius: 14px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(12,20,36,0.03);
    }
    .feature-card:hover {
      border-color: #E31B23;
      transform: translateY(-4px);
      box-shadow: 0 12px 28px rgba(12,20,36,0.08);
    }
    .feature-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10.5px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227,27,35,0.08);
      padding: 3px 10px;
      border-radius: 99px;
      display: inline-block;
      margin-bottom: 12px;
    }
    .feature-title {
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .feature-sub {
      font-size: 13px;
      font-weight: 600;
      color: #C5A059;
      margin-bottom: 10px;
    }
    .feature-text {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
    }

    /* ── Academic Faculties Accordion/Grid Cards ── */
    .faculties-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
      margin-bottom: 56px;
    }
    @media (min-width: 768px) {
      .faculties-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    .faculty-card {
      background: #ffffff;
      border-radius: 14px;
      border: 1px solid #e2e8f0;
      padding: 28px;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      transition: border-color 0.25s ease;
    }
    .faculty-card:hover {
      border-color: #0C1424;
    }
    .faculty-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 14px;
      padding-bottom: 12px;
      border-bottom: 2px solid #E31B23;
    }
    .faculty-title {
      font-size: 19px;
      font-weight: 800;
      color: #0C1424;
      line-height: 1.3;
    }
    .faculty-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      font-weight: 700;
      color: #ffffff;
      background: #0C1424;
      padding: 4px 8px;
      border-radius: 4px;
      white-space: nowrap;
    }
    .faculty-sub {
      font-size: 13px;
      font-weight: 600;
      color: #C5A059;
      margin-bottom: 12px;
    }
    .faculty-content {
      font-size: 14px;
      color: #334155;
      line-height: 1.7;
      white-space: pre-line;
    }

    /* ── Infrastructure & Campus Facilities Cards ── */
    .infra-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
      margin-bottom: 48px;
    }
    @media (min-width: 640px) {
      .infra-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .infra-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    .infra-card {
      background: #ffffff;
      border-radius: 14px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(12,20,36,0.03);
    }
    .infra-card-img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      display: block;
    }
    .infra-card-body {
      padding: 20px;
    }
    .infra-card-title {
      font-size: 17px;
      font-weight: 800;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .infra-card-sub {
      font-size: 12.5px;
      font-weight: 600;
      color: #E31B23;
      margin-bottom: 10px;
    }
    .infra-card-text {
      font-size: 13.5px;
      color: #475569;
      line-height: 1.5;
    }

    /* Original Sheets Modal / Toggle Accordion */
    .sheets-toggle-box {
      background: #ffffff;
      border-radius: 14px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      margin-top: 40px;
    }
    .sheets-toggle-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      background: none;
      border: none;
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
      cursor: pointer;
      padding: 0;
    }
    .sheets-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }
    .sheet-thumb {
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #e2e8f0;
      aspect-ratio: 3/4;
    }
    .sheet-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>
<body>

  <!-- APPROVED HEADER & NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC SUBPAGE HERO SECTION -->
  <section class="prospectus-hero">
    <div class="rk-container">
      <span class="prospectus-eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="prospectus-hero-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <p class="prospectus-hero-sub"><?= htmlspecialchars($heroSubtitle) ?></p>
      
      <div class="hero-btn-group">
        <a href="<?= htmlspecialchars($prospectusPdf) ?>" target="_blank" class="hero-btn-primary">
          <span>📥 Download Full Prospectus (PDF)</span>
          <span>↗</span>
        </a>
        <a href="#faculties-section" class="hero-btn-secondary">
          <span>🎓 Explore 16 Academic Faculties</span>
          <span>↓</span>
        </a>
      </div>
    </div>
  </section>

  <!-- KEY METRICS BAR -->
  <div class="metrics-bar">
    <div class="rk-container">
      <div class="metrics-grid">
        <div>
          <div class="metric-val">16+</div>
          <div class="metric-lbl">Academic Faculties</div>
        </div>
        <div>
          <div class="metric-val">100+</div>
          <div class="metric-lbl">Degree &amp; Diploma Courses</div>
        </div>
        <div>
          <div class="metric-val">300+</div>
          <div class="metric-lbl">Placement Corporate Recruiters</div>
        </div>
        <div>
          <div class="metric-val">60+</div>
          <div class="metric-lbl">Hi-Tech Research Labs</div>
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN CONTENT SECTION -->
  <section class="prospectus-section">
    <div class="rk-container">

      <!-- Callout Download Card -->
      <div class="download-callout-card">
        <div class="callout-info">
          <h2><?= htmlspecialchars($introHeading) ?></h2>
          <p><?= htmlspecialchars($introText) ?></p>
        </div>
        <a href="<?= htmlspecialchars($prospectusPdf) ?>" target="_blank" class="callout-action-btn">
          <span>📄 Download PDF Prospectus</span>
          <span>↗</span>
        </a>
      </div>

      <!-- SALIENT FEATURES SECTION -->
      <div>
        <h2 class="section-heading">Salient Features &amp; University Privileges</h2>
        <p class="section-sub">Why students and scholars choose RKDF University Bhopal for higher education.</p>

        <div class="features-grid">
          <?php if (!empty($featureItems)): ?>
            <?php foreach ($featureItems as $f): ?>
              <div class="feature-card">
                <span class="feature-badge"><?= htmlspecialchars($f['badge_text'] ?: 'FEATURE') ?></span>
                <h3 class="feature-title"><?= htmlspecialchars($f['title']) ?></h3>
                <?php if (!empty($f['subtitle'])): ?>
                  <div class="feature-sub"><?= htmlspecialchars($f['subtitle']) ?></div>
                <?php endif; ?>
                <p class="feature-text"><?= nl2br(htmlspecialchars($f['text_val'])) ?></p>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- ACADEMIC FACULTIES & INTAKE SECTION -->
      <div id="faculties-section" style="scroll-margin-top: 100px;">
        <h2 class="section-heading">Major Academic Faculties &amp; Seat Intake</h2>
        <p class="section-sub">Programs offered across Engineering, Technology, Pharmacy, Management, Law, Education, Sciences, Paramedical &amp; Vocational trades.</p>

        <div class="faculties-grid">
          <?php if (!empty($facultyItems)): ?>
            <?php foreach ($facultyItems as $fac): ?>
              <div class="faculty-card">
                <div class="faculty-header">
                  <h3 class="faculty-title"><?= htmlspecialchars($fac['title']) ?></h3>
                  <span class="faculty-badge"><?= htmlspecialchars($fac['badge_text'] ?: 'FACULTY') ?></span>
                </div>
                <?php if (!empty($fac['subtitle'])): ?>
                  <div class="faculty-sub"><?= htmlspecialchars($fac['subtitle']) ?></div>
                <?php endif; ?>
                <div class="faculty-content"><?= htmlspecialchars($fac['text_val']) ?></div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- CAMPUS INFRASTRUCTURE SECTION -->
      <div>
        <h2 class="section-heading">Campus Infrastructure &amp; Facilities</h2>
        <p class="section-sub">State-of-the-art learning environments, digital libraries, and living amenities.</p>

        <div class="infra-grid">
          <?php if (!empty($infraItems)): ?>
            <?php foreach ($infraItems as $inf): ?>
              <div class="infra-card">
                <?php if (!empty($inf['image_path'])): ?>
                  <img src="<?= htmlspecialchars($inf['image_path']) ?>" alt="<?= htmlspecialchars($inf['title']) ?>" class="infra-card-img" loading="lazy" onError="this.style.display='none';">
                <?php endif; ?>
                <div class="infra-card-body">
                  <h3 class="infra-card-title"><?= htmlspecialchars($inf['title']) ?></h3>
                  <?php if (!empty($inf['subtitle'])): ?>
                    <div class="infra-card-sub"><?= htmlspecialchars($inf['subtitle']) ?></div>
                  <?php endif; ?>
                  <p class="infra-card-text"><?= nl2br(htmlspecialchars($inf['text_val'])) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- ORIGINAL BROCHURE SHEETS PREVIEW TOGGLE -->
      <div class="sheets-toggle-box">
        <details>
          <summary class="sheets-toggle-btn">
            <span>🖼️ View Original Printed Prospectus Brochure Sheets</span>
            <span>▼</span>
          </summary>
          <div class="sheets-grid">
            <div class="sheet-thumb"><img src="images/06/prospectus/Front.jpg" alt="Front Cover" loading="lazy"></div>
            <div class="sheet-thumb"><img src="images/06/prospectus/2.jpg" alt="Page 2" loading="lazy"></div>
            <div class="sheet-thumb"><img src="images/06/prospectus/3.jpg" alt="Page 3" loading="lazy"></div>
            <div class="sheet-thumb"><img src="images/06/prospectus/4.jpg" alt="Page 4" loading="lazy"></div>
            <div class="sheet-thumb"><img src="images/06/prospectus/5.jpg" alt="Page 5" loading="lazy"></div>
            <div class="sheet-thumb"><img src="images/06/prospectus/6.jpg" alt="Page 6" loading="lazy"></div>
          </div>
        </details>
      </div>

    </div><!-- /rk-container -->
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
