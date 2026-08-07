<?php
// ============================================================
// RKDF University — Academic Council (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'academic-council';

// Fetch metadata from site_pages
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '17 · ACADEMIC COUNCIL';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Academic Council';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Principal academic body laying down standards of instruction, research, and examination.';
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : 'Approves syllabus updates, examination regulations, degrees, gold medals, and new department proposals.';
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-students-quad.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .ac-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .ac-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .ac-grid-layout { grid-template-columns: 1fr; } }
    .ac-block-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 36px; }
    .ac-card-header { background: #0C1424; color: #ffffff; padding: 24px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 3px solid #E31B23; }
    .ac-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 700; color: #ffffff; margin: 0; }
    .ac-card-body { padding: 36px 32px; }
    aside { position: sticky; top: 100px; }
    .sidebar-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 18px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(12,20,36,0.04); }
    .sidebar-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; padding-bottom: 14px; border-bottom: 2px solid #E31B23; margin-bottom: 20px; }
    .sidebar-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
    .sidebar-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border-radius: 8px; color: #334155; font-size: 14px; font-weight: 600; text-decoration: none; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.05); transition: all 0.25s ease; }
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
  <main class="ac-main-section">
    <div class="rk-container">
      <div class="ac-grid-layout">
        
        <!-- LEFT COLUMN -->
        <div>
          <article class="ac-block-card">
            <div class="ac-card-header">
              <h2 class="ac-card-title"><?= htmlspecialchars($mainTitle) ?> Overview</h2>
              <span style="background:rgba(227,27,35,0.18);color:#E31B23;padding:4px 12px;border-radius:99px;font-size:11px;font-weight:700;">ACADEMIC</span>
            </div>
            <div class="ac-card-body">
              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin:0;">
                <?= htmlspecialchars($introText) ?>
              </p>
            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Statutory Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Academic_Council.php" class="sidebar-link active">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link">Board of Studies (BOS) <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link">Board of Management <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link">Governing Body <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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
