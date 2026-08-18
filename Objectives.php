<?php
// ============================================================
// RKDF University — Institutional Objectives (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'objectives';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '02 · INSTITUTIONAL STRATEGY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Institutional Objectives';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Strategic goals driving academic quality, infrastructure growth, and student success.';
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : 'RKDF University Bhopal is established with the primary commitment to fulfill key strategic objectives that foster academic excellence, cutting-edge research, industry collaborations, and inclusive societal growth.';

$objHeaderTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : 'Strategic Institutional Goals';
$objBadge       = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : 'OBJECTIVES';
$objCardImg     = !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : 'images/ai_objectives/rkdf_objectives_card.jpg';

$pillarItems = array_slice($allItems, 1);
if (empty($pillarItems)) {
  $pillarItems = [
    ['number_val'=>'01','title'=>'Human Resource Competence','text_val'=>'To build human resource competence in teaching, research and technology / knowledge sharing.'],
    ['number_val'=>'02','title'=>'Curriculum & Delivery Systems','text_val'=>'To institutionalize appropriate changes in course curricula and delivery systems to accommodate concerns and aspirations of all stakeholders.'],
    ['number_val'=>'03','title'=>'Global & National Partnerships','text_val'=>'To strengthen partnership with national and foreign institutions especially south-south cooperation for sustainable higher education and research.'],
    ['number_val'=>'04','title'=>'Gender Equity & Quality Education','text_val'=>'To promote gender equity and provide quality and relevant education through institutional networks.']
  ];
}
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/ai_objectives/rkdf_objectives_banner.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .obj-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .obj-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .obj-grid-layout { grid-template-columns: 1fr; }
    }

    .obj-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .obj-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .obj-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .obj-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.18);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .obj-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .obj-card-body {
      padding: 36px 32px;
    }

    .obj-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 28px;
      position: relative;
    }
    .obj-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .obj-block-card:hover .obj-media-img {
      transform: scale(1.04);
    }

    .obj-pillars-grid {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .obj-pillar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 28px;
      display: flex;
      gap: 24px;
      align-items: flex-start;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.03);
      transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .obj-pillar-card:hover {
      transform: translateX(6px);
      border-color: #E31B23;
    }
    .obj-num-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 22px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227, 27, 35, 0.08);
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .obj-item-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }
    .obj-item-desc {
      font-size: 15.5px;
      line-height: 1.7;
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
  <main class="obj-main-section">
    <div class="rk-container">
      <div class="obj-grid-layout">
        
        <!-- LEFT COLUMN: OBJECTIVES CARDS -->
        <div>
          <article class="obj-block-card">
            <div class="obj-card-header">
              <h2 class="obj-card-title"><?= htmlspecialchars($objHeaderTitle) ?></h2>
              <span class="obj-badge"><?= htmlspecialchars($objBadge) ?></span>
            </div>
            <div class="obj-card-body">
              <div class="obj-media-frame">
                <img src="<?= htmlspecialchars($objCardImg) ?>" alt="RKDF University Objectives" class="obj-media-img">
              </div>
              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin:0;">
                <?= htmlspecialchars($introText) ?>
              </p>
            </div>
          </article>

          <!-- OBJECTIVES PILLARS GRID -->
          <div class="obj-pillars-grid">
            <?php foreach ($pillarItems as $idx => $item): ?>
            <div class="obj-pillar-card">
              <div class="obj-num-badge"><?= htmlspecialchars($item['number_val'] ?: sprintf("%02d", $idx+1)) ?></div>
              <div>
                <h3 class="obj-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="obj-item-desc">
                  <?= htmlspecialchars($item['text_val'] ?: $item['subtitle']) ?>
                </p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Quick Navigation</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="Objectives.php" class="sidebar-link active">University Objectives <span>→</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link">Registrar Profile <span>→</span></a></li>
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