<?php
// ============================================================
// RKDF University — Institutional Privacy Policy (100% Dynamic CMS)
// World-Class Premium Design + Personal Data Security Standards + Approved Header & Footer
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'privacy';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'DATA PROTECTION · PRIVACY POLICY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Institutional Privacy Policy';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official privacy policy governing personal data protection, confidentiality agreements, and student record security.';

$defaultMessage = "RKDF University Bhopal is committed to protecting the privacy, confidentiality, and security of personal information collected from students, graduates, faculty, and institutional partners.\n\nThis Privacy Policy outlines the standards governing personal data protection, employee confidentiality agreements, and authorized disclosures under university regulations.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Personal Data Protection & Security Framework";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedPrivacy = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'Statutory Privacy Standards';
    $groupedPrivacy[$gName][] = $it;
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-why-bg.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .priv-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .priv-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .priv-grid-layout { grid-template-columns: 1fr; } }

    .priv-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .priv-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .priv-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    .priv-group-box { margin-bottom: 40px; }
    .priv-group-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .priv-card-row {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 30px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .priv-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .priv-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.12);
      color: #E31B23;
      margin-bottom: 8px;
    }

    .priv-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 8px 0; }
    .priv-item-desc { font-size: 15px; color: #475569; margin: 0; line-height: 1.7; }

    aside { position: sticky; top: 100px; }
    .sidebar-card { background: #ffffff; border: 1px solid rgba(12, 20, 36, 0.08); border-radius: 18px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04); }
    .sidebar-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; padding-bottom: 14px; border-bottom: 2px solid #E31B23; margin-bottom: 20px; }
    .sidebar-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
    .sidebar-link { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 8px; color: #334155; font-size: 13.5px; font-weight: 600; text-decoration: none; background: #FAF9F5; border: 1px solid rgba(12, 20, 36, 0.05); transition: all 0.25s ease; }
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
  <main class="priv-main-section">
    <div class="rk-container">
      <div class="priv-grid-layout">
        
        <!-- LEFT COLUMN: PRIVACY STANDARDS -->
        <div>
          
          <div class="priv-intro-card">
            <h2 class="priv-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="priv-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- RENDER GROUPED PRIVACY STANDARDS -->
          <?php foreach ($groupedPrivacy as $gTitle => $pList): ?>
          <div class="priv-group-box">
            <div class="priv-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($pList) ?> PRIVACY STANDARDS
              </span>
            </div>

            <?php foreach ($pList as $item): ?>
            <article class="priv-card-row">
              <span class="priv-badge"><?= htmlspecialchars($item['badge_text'] ?: 'PRIVACY') ?></span>
              <h3 class="priv-item-title"><?= htmlspecialchars($item['title']) ?></h3>
              <p class="priv-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Legal &amp; Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="privacy.php" class="sidebar-link active"><span>Privacy Policy</span> <span>↗</span></a></li>
              <li><a href="terms&condition.php" class="sidebar-link"><span>Terms &amp; Conditions</span> <span>↗</span></a></li>
              <li><a href="policies.php#accessibility" class="sidebar-link"><span>Accessibility Policy</span> <span>↗</span></a></li>
              <li><a href="policies.php" class="sidebar-link"><span>University Policies</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=research-policy" class="sidebar-link"><span>Research Policy</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=consultancy-policy" class="sidebar-link"><span>Consultancy Policy</span> <span>↗</span></a></li>
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
