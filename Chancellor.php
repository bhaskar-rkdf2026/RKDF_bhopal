<?php
// ============================================================
// RKDF University — Chancellor's Desk (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'chancellor';

// Fetch page metadata from site_pages DB table
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '03 · EXECUTIVE LEADERSHIP';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : "Chancellor's Desk";
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'A message of vision, institutional mission, and educational empowerment from Dr. Sadhna Kapoor, Chancellor.';

// Fetch section cards from page_sections DB table
$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
$itemStmt->execute([$pageSlug]);
$allItems = $itemStmt->fetchAll();

$chanMessageTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : 'Message From The Chancellor';
$chanBadge        = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : 'CHANCELLOR ADDRESS';
$chanBannerImg    = !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : 'images/ai_chancellor/rkdf_chancellor_campus.jpg';

$chanProfileTitle = !empty($allItems[1]['title']) ? $allItems[1]['title'] : 'Dr. Sadhna Kapoor';
$chanProfileRole  = !empty($allItems[1]['badge_text']) ? $allItems[1]['badge_text'] : 'Chancellor';
$chanProfileImg   = !empty($allItems[1]['image_path']) ? $allItems[1]['image_path'] : 'images/lovable/rkdf-chancellor.jpg';
$chanProfileBio   = !empty($allItems[1]['text_val']) ? $allItems[1]['text_val'] : 'Pioneering technical, medical, and professional education across Madhya Pradesh.';
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/ai_chancellor/rkdf_chancellor_banner.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .chan-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .chan-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .chan-grid-layout { grid-template-columns: 1fr; }
    }

    .chan-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .chan-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .chan-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .chan-badge {
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

    .chan-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .chan-card-body {
      padding: 36px 32px;
    }

    .chan-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .chan-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .chan-block-card:hover .chan-media-img {
      transform: scale(1.04);
    }

    .chan-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .chan-sig-box {
      margin-top: 36px;
      padding: 28px 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .chan-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .chan-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #C5A059;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .chan-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Side Leadership Card & Sidebar Wrapper */
    aside {
      position: sticky;
      top: 100px;
    }

    .chan-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .chan-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .chan-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .chan-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .chan-side-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 12px;
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
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="chan-main-section">
    <div class="rk-container">
      <div class="chan-grid-layout">
        
        <!-- LEFT COLUMN: CHANCELLOR MESSAGE -->
        <div>
          <article class="chan-block-card">
            <div class="chan-card-header">
              <h2 class="chan-card-title"><?= htmlspecialchars($chanMessageTitle) ?></h2>
              <span class="chan-badge"><?= htmlspecialchars($chanBadge) ?></span>
            </div>
            <div class="chan-card-body">
              
              <div class="chan-media-frame">
                <img src="<?= htmlspecialchars($chanBannerImg) ?>" alt="RKDF University Campus" class="chan-media-img">
              </div>

              <?php
              $paragraphs = explode("\n", $pRow['intro_text'] ?? '');
              if (empty(array_filter($paragraphs))) {
                $paragraphs = [
                  "Education is the prerequisite for socio-economic development of the Nation in general and people in particular. Not enough educational facilities are available for professional studies in Engineering, Health sciences, Management, and Computer Science.",
                  "RKDF Education Group realized these limitations and established technical education institutions in Madhya Pradesh starting in 1995, growing to more than 100 colleges across Bhopal, Sehore, Indore, and Rewa.",
                  "The RKDF Group established RKDF University at Gandhi Nagar, Bhopal under MP Legislature Act, providing undergraduate, postgraduate, M.Phil, and Ph.D degrees.",
                  "As Chancellor, it is my endeavour to provide modern educational facilities, research guidance, and living comforts to empower young minds to serve the Nation with dedication."
                ];
              }
              foreach ($paragraphs as $para):
                if (!empty(trim($para))):
              ?>
              <p class="chan-text-p"><?= htmlspecialchars(trim($para)) ?></p>
              <?php
                endif;
              endforeach;
              ?>

              <!-- Signature Box -->
              <div class="chan-sig-box">
                <div>
                  <div class="chan-sig-name"><?= htmlspecialchars($chanProfileTitle) ?></div>
                  <div class="chan-sig-role"><?= htmlspecialchars($chanProfileRole) ?></div>
                  <div class="chan-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: CHANCELLOR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Chancellor Profile Card -->
          <div class="chan-side-card">
            <div class="chan-portrait-box">
              <img src="<?= htmlspecialchars($chanProfileImg) ?>" alt="<?= htmlspecialchars($chanProfileTitle) ?>" class="chan-portrait-img">
            </div>
            <h3 class="chan-side-name"><?= htmlspecialchars($chanProfileTitle) ?></h3>
            <span class="chan-side-badge"><?= htmlspecialchars($chanProfileRole) ?></span>
            <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:8px;">
              <?= htmlspecialchars($chanProfileBio) ?>
            </p>
          </div>

          <!-- Quick Navigation Links -->
          <div class="sidebar-card">
            <h4 class="sidebar-title">Leadership &amp; Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link active"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link"><span>Pro-Chancellor Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link"><span>Registrar Profile</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
              <li><a href="BoM.php" class="sidebar-link"><span>Board of Management</span> <span>↗</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
