<?php
// ============================================================
// RKDF University — Local Core Advisory Group (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'local-advisory';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '20 · LOCAL ADVISORY & EXECUTION';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Local Core Advisory Group';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Executive advisory body comprising college Directors, Principals, and Emeritus Faculty executing national recommendations across RKDF University.';

$defaultMessage = "A Local Core Group comprised of selected Directors, Principals, and Emeritus Faculty from RKDF University constituent colleges has been formed to pursue and execute the strategic recommendations of the National Core Advisory Group.\n\nLearning at RKDF University must be consummate — transcending traditional classroom boundaries to create an immersive academic environment where education seamlessly integrates with experiential learning, industry interaction, and all-round student development.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Local Core Advisory Group (LCAG)";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Separate items by group_key
$composition = [];
$mandates    = [];

foreach ($allItems as $it) {
    if ($it['group_key'] === 'mandates') {
        $mandates[] = $it;
    } else {
        $composition[] = $it;
    }
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-building-enhanced.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .la-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .la-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .la-grid-layout { grid-template-columns: 1fr; } }

    .la-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #C5A059;
    }
    .la-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .la-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .la-cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 24px;
      margin-bottom: 48px;
    }

    .la-item-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 26px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .la-item-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 14px 36px rgba(12, 20, 36, 0.08);
      border-color: #C5A059;
    }

    .la-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      margin-bottom: 10px;
      align-self: flex-start;
    }
    .la-badge-mandate {
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
    }

    .la-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .la-card-subtitle { font-size: 13.5px; font-weight: 700; color: #C5A059; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 10px; }
    .la-card-desc { font-size: 14.5px; line-height: 1.6; color: #475569; margin: 0; }

    aside { position: sticky; top: 100px; }
    .sidebar-card { background: #ffffff; border: 1px solid rgba(12, 20, 36, 0.08); border-radius: 18px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04); }
    .sidebar-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; padding-bottom: 14px; border-bottom: 2px solid #E31B23; margin-bottom: 20px; }
    .sidebar-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
    .sidebar-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border-radius: 8px; color: #334155; font-size: 14px; font-weight: 600; text-decoration: none; background: #FAF9F5; border: 1px solid rgba(12, 20, 36, 0.05); transition: all 0.25s ease; }
    .sidebar-link:hover, .sidebar-link.active { background: #0C1424; color: #ffffff !important; border-color: #0C1424; transform: translateX(4px); }
    .sidebar-link.active { background: #E31B23; border-color: #E31B23; }
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
  <main class="la-main-section">
    <div class="rk-container">
      <div class="la-grid-layout">
        
        <!-- LEFT COLUMN: LOCAL ADVISORY COMPOSITION & MANDATES -->
        <div>
          
          <div class="la-intro-card">
            <h2 class="la-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="la-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- SECTION 1: ADVISORY COMPOSITION -->
          <div style="margin-bottom:24px;">
            <span class="rk-eyebrow tone-gold">Academic &amp; Institutional Leadership</span>
            <h2 class="rk-h2" style="font-size:28px;margin-top:6px;">Local Advisory Body Composition</h2>
          </div>

          <div class="la-cards-grid">
            <?php foreach ($composition as $comp): ?>
            <article class="la-item-card">
              <span class="la-badge"><?= htmlspecialchars($comp['badge_text'] ?: 'LOCAL ADVISOR') ?></span>
              <h3 class="la-card-title"><?= htmlspecialchars($comp['title']) ?></h3>
              <div class="la-card-subtitle"><?= htmlspecialchars($comp['subtitle']) ?></div>
              <p class="la-card-desc"><?= htmlspecialchars($comp['text_val']) ?></p>
            </article>
            <?php endforeach; ?>
          </div>

          <!-- SECTION 2: STRATEGIC MANDATES & OBJECTIVES -->
          <?php if (!empty($mandates)): ?>
          <div style="margin-bottom:24px;">
            <span class="rk-eyebrow tone-gold">Strategic Implementation</span>
            <h2 class="rk-h2" style="font-size:28px;margin-top:6px;">Core Responsibilities &amp; Vision</h2>
          </div>

          <div class="la-cards-grid">
            <?php foreach ($mandates as $mandate): ?>
            <article class="la-item-card">
              <span class="la-badge la-badge-mandate"><?= htmlspecialchars($mandate['badge_text'] ?: 'STRATEGIC MANDATE') ?></span>
              <h3 class="la-card-title"><?= htmlspecialchars($mandate['title']) ?></h3>
              <div class="la-card-subtitle" style="color:#E31B23;"><?= htmlspecialchars($mandate['subtitle']) ?></div>
              <p class="la-card-desc"><?= htmlspecialchars($mandate['text_val']) ?></p>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Statutory Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="localadvisory.php" class="sidebar-link active"><span>Local Advisory Group</span> <span>↗</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link"><span>Statutory Bodies &amp; National Advisory</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
              <li><a href="BoM.php" class="sidebar-link"><span>Board of Management (BoM)</span> <span>↗</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link"><span>Academic Council</span> <span>↗</span></a></li>
              <li><a href="BOS.php" class="sidebar-link"><span>Board of Studies (BOS)</span> <span>↗</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
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
