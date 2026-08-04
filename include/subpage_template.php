<?php
// ============================================================
// RKDF University — Shared Dynamic Subpage Template (Engine v3)
// Support for prominent PDF buttons, HTML links, and images
// ============================================================
if (!isset($pageKey)) {
    die("Page key missing.");
}

require_once __DIR__ . '/site_settings.php';
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageKey]);
$pRow = $stmt->fetch();

$pageTitle     = !empty($pRow['page_title'])    ? $pRow['page_title'] . ' — RKDF University Bhopal' : ($defaultTitle ?? 'RKDF University Bhopal');
$eyebrow       = !empty($pRow['eyebrow'])       ? $pRow['eyebrow'] : ($defaultEyebrow ?? '01 · Overview');
$mainTitle     = !empty($pRow['page_title'])    ? $pRow['page_title'] : ($defaultMainTitle ?? 'RKDF University');
$heroSubtitle  = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : ($defaultHeroSubtitle ?? '');
$introHeading  = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : ($defaultIntroHeading ?? '');
$introText     = !empty($pRow['intro_text'])    ? $pRow['intro_text'] : ($defaultIntroText ?? '');
$heroBgImg     = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-why-bg.jpg';
$metaDesc      = !empty($pRow['meta_description']) ? $pRow['meta_description'] : $heroSubtitle;

// Fetch page items
$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order, id");
$itemStmt->execute([$pageKey]);
$allItems = $itemStmt->fetchAll();

// Check if any item has a featured portrait image
$featuredImgItem = null;
foreach ($allItems as $it) {
    if (!empty($it['image_path'])) {
        $featuredImgItem = $it;
        break;
    }
}

// Group items
$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

if (empty($groupedItems) && !empty($defaultGroupedItems)) {
    $groupedItems = $defaultGroupedItems;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    /* ── Subpage Enhanced Hero ── */
    .subpage-hero {
      position: relative;
      padding: 160px 0 100px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: var(--p-paper);
      overflow: hidden;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .subpage-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 85% 30%, rgba(220,38,38,0.20) 0%, transparent 60%);
      pointer-events: none;
    }
    .subpage-hero-grid {
      display: grid;
      grid-template-columns: <?= $featuredImgItem ? '7fr 5fr' : '1fr' ?>;
      gap: 48px;
      align-items: center;
    }
    @media (max-width: 992px) {
      .subpage-hero-grid { grid-template-columns: 1fr; }
    }

    .hero-img-box {
      text-align: center;
      position: relative;
    }
    .hero-img-box img {
      max-width: 100%;
      max-height: 420px;
      object-fit: contain;
      background: rgba(12, 20, 36, 0.4);
      padding: 6px;
      border-radius: 16px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 30px rgba(220,38,38,0.25);
      border: 3px solid rgba(255,255,255,0.15);
      transition: transform 0.4s ease;
    }
    .hero-img-box img:hover { transform: scale(1.02); }

    /* ── Section Containers ── */
    .sp-sec {
      padding: 90px 0;
      background: var(--p-paper);
      position: relative;
    }

    /* ── Content Cards Grid ── */
    .pg-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 28px;
      margin-top: 36px;
    }
    .pg-card {
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 14px;
      padding: 32px;
      position: relative;
      transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 4px 16px rgba(0,0,0,0.03);
    }
    .pg-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(12,20,36,0.08);
      border-color: rgba(220,38,38,0.3);
    }
    .pg-card-img {
      width: 100%;
      height: 200px;
      object-fit: contain;
      background: #f8fafc;
      padding: 8px;
      border-radius: 10px;
      margin-bottom: 20px;
      border: 1px solid var(--p-hairline);
    }
    .pg-card-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
    }
    .pg-num {
      font-family: var(--p-font-mono);
      font-size: 14px;
      font-weight: 700;
      color: var(--p-gold);
      letter-spacing: 0.1em;
    }
    .pg-badge {
      background: rgba(220,38,38,0.08);
      color: var(--p-gold);
      padding: 4px 12px;
      border-radius: 99px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    .pg-title {
      font-family: var(--p-font-serif);
      font-size: 22px;
      line-height: 1.25;
      color: var(--p-navy-deep);
      margin-bottom: 12px;
    }
    .pg-desc {
      font-size: 14.5px;
      line-height: 1.7;
      color: rgba(12,20,36,0.72);
      flex: 1;
    }

    /* ── PDF & External Action Buttons ── */
    .pg-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-top: 16px;
      background: var(--p-navy-deep);
      color: #ffffff !important;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 13px;
      text-decoration: none;
      border: 1px solid rgba(220,38,38,0.4);
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(12,20,36,0.15);
    }
    .pg-pdf-btn:hover {
      background: var(--p-gold);
      color: #ffffff !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(220,38,38,0.3);
    }

    .pg-link-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 16px;
      background: #f1f5f9;
      color: var(--p-navy-deep) !important;
      padding: 9px 18px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 13px;
      text-decoration: none;
      border: 1px solid var(--p-hairline);
      transition: all 0.3s ease;
    }
    .pg-link-btn:hover {
      background: var(--p-gold);
      color: #ffffff !important;
      border-color: var(--p-gold);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <div class="subpage-hero-grid">
        <div>
          <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
          <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;max-width:800px;">
            <?= htmlspecialchars($mainTitle) ?>
          </h1>
          <?php if ($heroSubtitle): ?>
          <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
            <?= htmlspecialchars($heroSubtitle) ?>
          </p>
          <?php endif; ?>
        </div>

        <?php if ($featuredImgItem): ?>
        <div class="hero-img-box">
          <img src="<?= htmlspecialchars($featuredImgItem['image_path']) ?>" alt="<?= htmlspecialchars($featuredImgItem['title']) ?>">
          <div style="margin-top:12px;font-size:13px;font-family:var(--p-font-mono);color:var(--p-gold);letter-spacing:0.05em;">
            <?= htmlspecialchars($featuredImgItem['title']) ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="sp-sec">
    <div class="rk-container">
      <?php if ($introHeading || $introText): ?>
      <div style="max-width:800px;margin-bottom:60px;">
        <span class="rk-eyebrow">Overview</span>
        <?php if ($introHeading): ?>
        <h2 class="rk-h2" style="margin-bottom:20px;"><?= htmlspecialchars($introHeading) ?></h2>
        <?php endif; ?>
        <?php if ($introText): ?>
        <div style="font-size:17px;line-height:1.85;color:rgba(12,20,36,0.78);">
          <?= strip_tags($introText, '<a><br><p><ul><li><strong><b><i>') == $introText ? nl2br(htmlspecialchars($introText)) : $introText ?>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <!-- Grouped Items Render -->
      <?php if (!empty($groupedItems)): ?>
        <?php foreach ($groupedItems as $gKey => $gItems): ?>
        <div style="margin-bottom:60px;">
          <span class="rk-eyebrow tone-gold"><?= htmlspecialchars(strtoupper($gKey)) ?></span>
          <h3 class="rk-h2" style="font-size:32px;margin-bottom:24px;"><?= htmlspecialchars(ucfirst($gKey)) ?></h3>
          
          <div class="pg-grid">
            <?php foreach ($gItems as $i => $item): 
              $iNum   = !empty($item['number_val']) ? sprintf('%02d', $item['number_val']) : sprintf('%02d', $i+1);
              $iTitle = !empty($item['title']) ? $item['title'] : '';
              $iBadge = !empty($item['badge_text']) ? $item['badge_text'] : '';
              $iDesc  = !empty($item['text_val']) ? $item['text_val'] : '';
              $iLink  = !empty($item['link_url']) ? $item['link_url'] : '';
              $iImg   = !empty($item['image_path']) ? $item['image_path'] : '';
              $isPdf  = (strpos(strtolower($iLink), '.pdf') !== false || strpos(strtolower($iTitle), 'pdf') !== false);
            ?>
            <div class="pg-card">
              <div>
                <?php if ($iImg): ?>
                <img src="<?= htmlspecialchars($iImg) ?>" alt="<?= htmlspecialchars($iTitle) ?>" class="pg-card-img">
                <?php endif; ?>
                <div class="pg-card-top">
                  <span class="pg-num"><?= htmlspecialchars($iNum) ?></span>
                  <?php if ($iBadge): ?><span class="pg-badge"><?= htmlspecialchars($iBadge) ?></span><?php endif; ?>
                </div>
                <h4 class="pg-title"><?= htmlspecialchars($iTitle) ?></h4>
                <div class="pg-desc"><?= nl2br(htmlspecialchars($iDesc)) ?></div>
              </div>
              <?php if ($iLink): ?>
              <div>
                <?php if ($isPdf): ?>
                <a href="<?= htmlspecialchars($iLink) ?>" target="_blank" rel="noopener" class="pg-pdf-btn">
                  📄 Download PDF Document ↗
                </a>
                <?php else: ?>
                <a href="<?= htmlspecialchars($iLink) ?>" target="_blank" rel="noopener" class="pg-link-btn">
                  🔗 Open Link / View Details ↗
                </a>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
