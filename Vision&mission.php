<?php
// ============================================================
// RKDF University — Vision & Mission (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'vision-mission';
$pRow = [];
$allItems = [];

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
        $stmt->execute([$pageSlug]);
        $pRow = $stmt->fetch() ?: [];

        $itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
        $itemStmt->execute([$pageSlug]);
        $allItems = $itemStmt->fetchAll() ?: [];
    } catch (Throwable $e) {}
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '01 · INSTITUTIONAL PHILOSOPHY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Vision & Mission';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Pioneering Higher Education, Advanced Research, and Sustainable Societal Transformation at RKDF University Bhopal.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/ai_vision/rkdf_vision_banner.jpg';

// Group items by key or pick
$vCard = null;
$mCard = null;
$valItems = [];

foreach ($allItems as $it) {
  if ($it['group_key'] === 'vision') $vCard = $it;
  else if ($it['group_key'] === 'mission') $mCard = $it;
  else if ($it['group_key'] === 'values') $valItems[] = $it;
}

// Fallbacks if not found
if (!$vCard && isset($allItems[0])) $vCard = $allItems[0];
if (!$mCard && isset($allItems[1])) $mCard = $allItems[1];
if (empty($valItems)) $valItems = array_slice($allItems, 2);

$visionTitle = !empty($vCard['title']) ? $vCard['title'] : 'University Vision';
$visionBadge = !empty($vCard['badge_text']) ? $vCard['badge_text'] : 'OUR VISION';
$visionQuote = !empty($vCard['text_val']) ? $vCard['text_val'] : 'To establish a University of excellence and relevance to impart Higher Education through knowledge, pioneering Scholarship, Research and teaching...';
$visionImg   = !empty($vCard['image_path']) ? $vCard['image_path'] : 'images/ai_vision/rkdf_vision_banner.jpg';

$missionTitle = !empty($mCard['title']) ? $mCard['title'] : 'University Mission';
$missionBadge = !empty($mCard['badge_text']) ? $mCard['badge_text'] : 'OUR MISSION';
$missionText  = !empty($mCard['text_val']) ? $mCard['text_val'] : 'Harmonize higher education with excellence in science and technology...';
$missionImg   = !empty($mCard['image_path']) ? $mCard['image_path'] : 'images/ai_vision/rkdf_mission_banner.jpg';
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
      color: var(--p-paper, #FAF9F5);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vm-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .vm-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vm-grid-layout { grid-template-columns: 1fr; }
    }

    .vm-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 40px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .vm-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .vm-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .vm-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
    }
    .vm-badge-gold {
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }
    .vm-badge-red {
      background: rgba(227, 27, 35, 0.18);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .vm-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .vm-card-body {
      padding: 36px 32px;
    }

    .vm-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .vm-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .vm-block-card:hover .vm-media-img {
      transform: scale(1.04);
    }

    .vm-quote-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 12px;
      padding: 32px;
      margin-top: 10px;
    }
    .vm-quote-text {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      line-height: 1.7;
      font-style: italic;
      color: #0C1424;
      margin: 0;
    }

    .vm-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 20px;
    }

    .values-grid {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .value-item-card {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 24px;
      display: flex;
      gap: 20px;
      align-items: flex-start;
      transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .value-item-card:hover {
      transform: translateX(6px);
      border-color: #E31B23;
    }
    .val-number {
      font-family: 'JetBrains Mono', monospace;
      font-size: 24px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227, 27, 35, 0.08);
      width: 48px;
      height: 48px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .val-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .val-desc {
      font-size: 15px;
      line-height: 1.65;
      color: #475569;
      margin: 0;
    }

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
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="vm-main-section">
    <div class="rk-container">
      <div class="vm-grid-layout">
        
        <!-- LEFT COLUMN: VISION, MISSION & CORE VALUES -->
        <div>

          <!-- ── VISION CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title"><?= htmlspecialchars($visionTitle) ?></h2>
              <span class="vm-badge vm-badge-gold"><?= htmlspecialchars($visionBadge) ?></span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame">
                <img src="<?= htmlspecialchars($visionImg) ?>" alt="RKDF University Vision" class="vm-media-img">
              </div>
              <div class="vm-quote-box">
                <p class="vm-quote-text">
                  "<?= htmlspecialchars($visionQuote) ?>"
                </p>
              </div>
            </div>
          </article>

          <!-- ── MISSION CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title"><?= htmlspecialchars($missionTitle) ?></h2>
              <span class="vm-badge vm-badge-red"><?= htmlspecialchars($missionBadge) ?></span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame">
                <img src="<?= htmlspecialchars($missionImg) ?>" alt="RKDF University Mission" class="vm-media-img">
              </div>
              <?php
              $mParas = explode("\n", $missionText);
              foreach ($mParas as $mp):
                if (!empty(trim($mp))):
              ?>
              <p class="vm-text-p"><?= htmlspecialchars(trim($mp)) ?></p>
              <?php
                endif;
              endforeach;
              ?>
            </div>
          </article>

          <!-- ── CORE VALUES CARD ── -->
          <article class="vm-block-card">
            <div class="vm-card-header">
              <h2 class="vm-card-title">Core Values of the University</h2>
              <span class="vm-badge vm-badge-gold">CORE VALUES</span>
            </div>
            <div class="vm-card-body">
              <div class="vm-media-frame" style="height:240px;">
                <img src="images/ai_vision/rkdf_core_values.jpg" alt="RKDF Core Values" class="vm-media-img">
              </div>
              <p class="vm-text-p" style="margin-bottom:28px;font-weight:600;color:#0C1424;">
                The University is guided by core values in delivering its mission &amp; pursuing its vision:
              </p>

              <div class="values-grid">
                <?php
                if (empty($valItems)) {
                  $valItems = [
                    ['number_val'=>'01','title'=>'Creativity','text_val'=>'Commitment to explore new methodology to search for latest Academic Knowledge and new funding for students.'],
                    ['number_val'=>'02','title'=>'Innovation & Research','text_val'=>'Initiating an innovative & cost effective participation of students in Research.'],
                    ['number_val'=>'03','title'=>'Ethical Conduct','text_val'=>'Integration of a value system among students oriented towards imbibing fine judgement, respect, tolerance, honesty, and transparency.']
                  ];
                }
                foreach ($valItems as $idx => $vi):
                ?>
                <div class="value-item-card">
                  <div class="val-number"><?= htmlspecialchars($vi['number_val'] ?: sprintf("%02d", $idx+1)) ?></div>
                  <div>
                    <h3 class="val-title"><?= htmlspecialchars($vi['title']) ?></h3>
                    <p class="val-desc"><?= htmlspecialchars($vi['text_val'] ?: $vi['subtitle']) ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">About RKDF University</h4>
            <ul class="sidebar-nav-list">
              <li><a href="About_Us.pdf" target="_blank" class="sidebar-link"><span>About Us Overview</span> <span>↗</span></a></li>
              <li><a href="Vision&mission.php" class="sidebar-link active"><span>Vision &amp; Mission</span> <span>↗</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link"><span>Objectives</span> <span>↗</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
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
