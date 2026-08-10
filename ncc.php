<?php
// ============================================================
// RKDF University — Modern National Cadet Corps (NCC) Page
// 100% Dynamic CMS Integration (Connected to admin/manage_pages.php?slug=ncc)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageSlug = 'ncc';
$pdo = getDbConnection();

// Fetch dynamic page header content from site_pages table
$stmtPage = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmtPage->execute([$pageSlug]);
$pageData = $stmtPage->fetch();

// Default Fallbacks
$eyebrow       = $pageData['eyebrow'] ?? 'YOUTH WING · RKDF UNIVERSITY BHOPAL';
$pageTitle     = $pageData['page_title'] ?? 'National Cadet Corps (NCC)';
$heroSubtitle  = $pageData['hero_subtitle'] ?? 'Fostering discipline, leadership, character building, and national service among university cadets.';
$heroBgImage   = !empty($pageData['hero_bg_image']) ? $pageData['hero_bg_image'] : 'images/lovable/rkdf-campus-hero.jpg';
$introHeading  = $pageData['intro_heading'] ?? 'About National Cadet Corps (NCC) Unit';
$introText     = $pageData['intro_text'] ?? 'The National Cadet Corps (NCC) is the youth wing of the Indian Armed Forces. Established in 1948, it aims to develop character, comradeship, discipline, a secular outlook, the spirit of adventure, and ideals of selfless service among young citizens.';

// Fetch dynamic section items grouped by group_key
$stmtItems = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order ASC, id ASC");
$stmtItems->execute([$pageSlug]);
$allItems = $stmtItems->fetchAll();

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$objectiveItems   = $groupedItems['objectives'] ?? [];
$certificateItems = $groupedItems['certificates'] ?? [];
$downloadItems    = $groupedItems['downloads'] ?? [];
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
    .ncc-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.92) 0%, rgba(21,34,56,0.88) 60%, rgba(12,20,36,0.95) 100%), 
                  url('<?= htmlspecialchars($heroBgImage) ?>') center/cover no-repeat;
      color: #ffffff;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .ncc-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.15em;
      color: #C5A059;
      text-transform: uppercase;
      display: inline-block;
      margin-bottom: 12px;
    }
    .ncc-hero-title {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: clamp(2.6rem, 5vw, 4.5rem);
      font-weight: 400;
      line-height: 1.1;
      color: #ffffff;
      margin-bottom: 16px;
    }
    .ncc-hero-sub {
      font-size: 17px;
      max-width: 780px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
    }

    /* ── Main Layout Container ── */
    .ncc-section {
      padding: 60px 0 90px;
      background: #fafafa;
      color: #1e293b;
    }
    .ncc-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px;
    }
    @media (min-width: 1024px) {
      .ncc-grid {
        grid-template-columns: 1fr 340px;
      }
    }

    /* ── Main Section Cards ── */
    .ncc-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
    }
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

    /* ── Image Banner & Quote ── */
    .ncc-banner-box {
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 24px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      border: 1px solid #e2e8f0;
    }
    .ncc-banner-box img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
    }

    /* ── Program Short Details Table ── */
    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      background: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid #e2e8f0;
    }
    .details-table td {
      padding: 14px 18px;
      border-bottom: 1px solid #e2e8f0;
      font-size: 14.5px;
    }
    .details-table tr:last-child td {
      border-bottom: none;
    }
    .details-table td.label-col {
      font-weight: 700;
      color: #0C1424;
      background: #f8fafc;
      width: 32%;
    }
    .details-table td.val-col {
      color: #334155;
    }

    /* ── Objectives & Certificate Cards Grid ── */
    .cards-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      margin-top: 20px;
    }
    @media (min-width: 640px) {
      .cards-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      }
    }
    .info-item-card {
      background: #ffffff;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      transition: all 0.3s ease;
    }
    .info-item-card:hover {
      border-color: #E31B23;
      transform: translateY(-3px);
      box-shadow: 0 12px 28px rgba(12,20,36,0.08);
    }
    .info-badge {
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
    .info-title {
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }
    .info-sub {
      font-size: 13px;
      font-weight: 600;
      color: #C5A059;
      margin-bottom: 10px;
    }
    .info-text {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
    }

    /* ── Symbolism & Song Box ── */
    .motto-box {
      background: linear-gradient(135deg, rgba(12,20,36,0.04) 0%, rgba(197,160,89,0.08) 100%);
      border-left: 4px solid #C5A059;
      padding: 20px 24px;
      border-radius: 0 12px 12px 0;
      margin: 20px 0;
    }
    .song-box {
      background: #0C1424;
      color: #ffffff;
      padding: 28px;
      border-radius: 14px;
      font-size: 15px;
      line-height: 1.8;
      box-shadow: 0 8px 24px rgba(12,20,36,0.12);
    }
    .song-box h4 {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: 24px;
      color: #C5A059;
      margin-bottom: 16px;
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
      font-size: 13px;
      font-weight: 600;
      transition: all 0.25s ease;
    }
    .download-link-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
      border-color: #E31B23;
      transform: translateX(3px);
    }
  </style>
</head>
<body>

  <!-- APPROVED HEADER & NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC SUBPAGE HERO SECTION -->
  <section class="ncc-hero">
    <div class="rk-container">
      <span class="ncc-eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="ncc-hero-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <p class="ncc-hero-sub"><?= htmlspecialchars($heroSubtitle) ?></p>
    </div>
  </section>

  <!-- MAIN NCC CONTENT SECTION -->
  <section class="ncc-section">
    <div class="rk-container">
      <div class="ncc-grid">

        <!-- LEFT COLUMN: MAIN CONTENT -->
        <div class="ncc-left">

          <!-- Overview & Details Card -->
          <div class="ncc-card">
            <h2 class="section-heading-sm"><?= htmlspecialchars($introHeading) ?></h2>

            <div class="ncc-banner-box">
              <img src="images/NCC.jpeg" alt="National Cadet Corps RKDF Unit" onError="this.style.display='none';">
            </div>

            <div style="font-size:15px;line-height:1.8;color:#334155;">
              <p><?= nl2br(htmlspecialchars($introText)) ?></p>
            </div>

            <!-- Short Details Table -->
            <table class="details-table" style="margin-top:24px;">
              <tr>
                <td class="label-col">Program Name</td>
                <td class="val-col">National Cadet Corps (NCC) Unit</td>
              </tr>
              <tr>
                <td class="label-col">Official Motto</td>
                <td class="val-col"><strong>Unity and Discipline (एकता और अनुशासन)</strong></td>
              </tr>
              <tr>
                <td class="label-col">Eligibility</td>
                <td class="val-col">Indian Citizens / Enrolled Regular College Students (Age 12 - 26 Yrs)</td>
              </tr>
              <tr>
                <td class="label-col">Training Duration</td>
                <td class="val-col">3 Years Senior Division / Wing Training</td>
              </tr>
              <tr>
                <td class="label-col">Career Opportunities</td>
                <td class="val-col">Direct Entry SSB Interview in Indian Army, Air Force, Navy, BSF, CISF &amp; State Police Services</td>
              </tr>
            </table>
          </div>

          <!-- Objectives & Benefits Grid -->
          <div class="ncc-card">
            <h3 class="section-heading-sm">Objectives &amp; Key Benefits for Cadets</h3>

            <div class="cards-grid">
              <?php if (!empty($objectiveItems)): ?>
                <?php foreach ($objectiveItems as $obj): ?>
                  <div class="info-item-card">
                    <span class="info-badge"><?= htmlspecialchars($obj['badge_text'] ?: 'OBJECTIVE') ?></span>
                    <h4 class="info-title"><?= htmlspecialchars($obj['title']) ?></h4>
                    <p class="info-text"><?= nl2br(htmlspecialchars($obj['text_val'])) ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="info-item-card">
                  <span class="info-badge">OBJECTIVE 01</span>
                  <h4 class="info-title">Discipline &amp; Leadership</h4>
                  <p class="info-text">Training young citizens in leadership, character development, comradeship, and secular values.</p>
                </div>
                <div class="info-item-card">
                  <span class="info-badge">OBJECTIVE 02</span>
                  <h4 class="info-title">Armed Forces Entry</h4>
                  <p class="info-text">Exemption from written entrance exams for SSB interviews in Indian Army, Air Force, and Navy.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- NCC Certificates Breakdown -->
          <div class="ncc-card">
            <h3 class="section-heading-sm">Types of NCC Certificates</h3>

            <div class="cards-grid">
              <?php if (!empty($certificateItems)): ?>
                <?php foreach ($certificateItems as $cert): ?>
                  <div class="info-item-card">
                    <span class="info-badge"><?= htmlspecialchars($cert['badge_text'] ?: 'CERTIFICATE') ?></span>
                    <h4 class="info-title"><?= htmlspecialchars($cert['title']) ?></h4>
                    <?php if (!empty($cert['subtitle'])): ?>
                      <div class="info-sub"><?= htmlspecialchars($cert['subtitle']) ?></div>
                    <?php endif; ?>
                    <p class="info-text"><?= nl2br(htmlspecialchars($cert['text_val'])) ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="info-item-card">
                  <span class="info-badge">HIGHEST LEVEL</span>
                  <h4 class="info-title">NCC 'C' Certificate</h4>
                  <div class="info-sub">Senior Division Grade A</div>
                  <p class="info-text">Highest certification granted upon 3 years active training. Grants direct Armed Forces SSB interview entry.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- NCC Flag Symbolism & Song -->
          <div class="ncc-card">
            <h3 class="section-heading-sm">NCC Flag Symbolism &amp; Official Song</h3>

            <div class="motto-box">
              <strong style="color:#0C1424;">Motto of NCC:</strong> "Unity and Discipline" (Adopted 12 Oct 1980)<br>
              <strong style="color:#0C1424;">Pledge:</strong> "We the cadets of the National Cadet Corps do solemnly pledge that we shall always uphold the unity of India."
            </div>

            <div style="margin:20px 0;">
              <img src="images/flag.jpg" alt="NCC Tricolour Flag" style="max-width:260px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.1);" onError="this.style.display='none';">
            </div>

            <div class="song-box">
              <h4>🇮🇳 Official NCC Song — Hum Sab Bharatiya Hain</h4>
              <p>
                Hum Sab Bharatiya Hain, Hum Sab Bharatiya Hain<br>
                Apni Manzil Ek Hai, Ha, Ha, Ha, Ek Hai, Ho, Ho, Ho, Ek Hai.<br>
                Hum Sab Bharatiya Hain.<br>
                Kashmir Ki Dharti Rani Hai, Sartaj Himalaya Hai,<br>
                Saadiyon Se Humne Isko Apne Khoon Se Pala Hai.<br>
                Desh Ki Raksha Ki Khatir Hum Shamshir Utha Lenge!<br>
                Bikhre Bikhre Taare Hain Hum Lekin Jhilmil Ek Hai,<br>
                Hum Sab Bharatiya Hain!
              </p>
            </div>
          </div>

        </div><!-- /ncc-left -->

        <!-- RIGHT SIDEBAR: DOWNLOADS & CIRCULARS -->
        <div class="ncc-sidebar">

          <div class="sidebar-card">
            <h3 class="sidebar-card-title">NCC Downloads &amp; Orders</h3>
            <div class="download-btn-list">
              <?php if (!empty($downloadItems)): ?>
                <?php foreach ($downloadItems as $d): ?>
                  <a href="<?= htmlspecialchars($d['link_url']) ?>" target="_blank" class="download-link-btn">
                    <span>📄 <?= htmlspecialchars($d['title']) ?></span>
                    <span>PDF ↗</span>
                  </a>
                <?php endforeach; ?>
              <?php else: ?>
                <a href="NCC/AICTE order reg NCC.pdf" target="_blank" class="download-link-btn">
                  <span>📄 AICTE Order Reg. NCC</span>
                  <span>PDF ↗</span>
                </a>
                <a href="NCC/UGC order reg NCC.pdf" target="_blank" class="download-link-btn">
                  <span>📄 UGC Order Reg. NCC</span>
                  <span>PDF ↗</span>
                </a>
                <a href="NCC/New Enrolment Form.pdf" target="_blank" class="download-link-btn">
                  <span>📝 NCC Admission Form</span>
                  <span>PDF ↗</span>
                </a>
                <a href="NCC/Benefits-of-NCC.pdf" target="_blank" class="download-link-btn">
                  <span>⭐ Benefits of NCC</span>
                  <span>PDF ↗</span>
                </a>
              <?php endif; ?>
            </div>
          </div>

        </div><!-- /ncc-sidebar -->

      </div><!-- /ncc-grid -->
    </div><!-- /rk-container -->
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
