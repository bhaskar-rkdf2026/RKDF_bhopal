<?php
// ============================================================
// RKDF University — Global Alumni Association & Registration Portal (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + Official PDF Downloads Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'alumni-form';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'RKDF GLOBAL ALUMNI NETWORK · REGISTRATION & FEEDBACK';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Alumni Registration & Feedback Portal';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official registration form, feedback submission, alumni association membership guidelines, and network directory for RKDF University graduates.';

$defaultMessage = "Welcome to the RKDF University Global Alumni Association Membership & Registration Portal. We invite all graduates and alumni scholars across engineering, medical, management, science, agriculture, and humanities disciplines to register, update their contact profiles, submit feedback, and join our global professional network.\n\nAlumni can fill out the online registration form or download printable PDF application forms below.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Alumni Association Secretariat";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedAF = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'Prescribed Alumni Forms & Registration';
    $groupedAF[$gName][] = $it;
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
    .af-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .af-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .af-grid-layout { grid-template-columns: 1fr; } }

    .af-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .af-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .af-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* Coordinator Highlight Box */
    .af-coordinator-card {
      background: linear-gradient(135deg, rgba(12,20,36,0.96) 0%, rgba(21,34,56,0.92) 100%);
      color: #ffffff;
      border-radius: 16px;
      padding: 24px 30px;
      margin-bottom: 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
      border-left: 4px solid #E31B23;
    }

    .af-group-box { margin-bottom: 36px; }
    .af-group-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 18px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .af-card-row {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 30px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .af-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .af-badge {
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
      margin-bottom: 6px;
    }

    .af-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .af-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .af-action-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
      white-space: nowrap;
    }
    .af-action-btn:hover { background: #E31B23; transform: translateX(3px); color: #ffffff !important; }

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
  <main class="af-main-section">
    <div class="rk-container">
      <div class="af-grid-layout">
        
        <!-- LEFT COLUMN: ALUMNI FORMS & REGISTRATION -->
        <div>
          
          <div class="af-intro-card">
            <h2 class="af-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="af-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- ALUMNI COORDINATOR CARD -->
          <div class="af-coordinator-card">
            <div>
              <div style="font-family:'JetBrains Mono',monospace;font-size:11px;color:#C5A059;text-transform:uppercase;letter-spacing:0.12em;margin-bottom:4px;">
                ALUMNI RELATIONS CELL
              </div>
              <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;margin:0 0 4px 0;color:#ffffff;">
                Dr. Puneet Dwivedi
              </h3>
              <p style="font-size:14px;color:rgba(250,249,246,0.75);margin:0;">
                Alumni Coordinator · Department of Placement &amp; Alumni Network
              </p>
            </div>
            <div>
              <a href="tel:+919131267657" class="af-action-btn" style="background:#E31B23;">
                <span>📞 Call +91 9131267657</span>
              </a>
            </div>
          </div>

          <!-- RENDER GROUPED FORMS -->
          <?php foreach ($groupedAF as $gTitle => $aList): ?>
          <div class="af-group-box">
            <div class="af-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($aList) ?> RESOURCES
              </span>
            </div>

            <?php foreach ($aList as $item): ?>
            <article class="af-card-row">
              <div style="max-width:520px;">
                <span class="af-badge"><?= htmlspecialchars($item['badge_text'] ?: 'ALUMNI FORM') ?></span>
                <h3 class="af-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="af-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : 'alumni_reg.php') ?>" target="_blank" class="af-action-btn">
                  <span>📄 Access Form / Portal</span> <span>↗</span>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Alumni Corner</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=alumni-form" class="sidebar-link active"><span>Alumni Registration Form</span> <span>↗</span></a></li>
              <li><a href="alumni.php" class="sidebar-link"><span>Alumni Association Home</span> <span>↗</span></a></li>
              <li><a href="alumni_reg.php" class="sidebar-link"><span>Online Alumni Register</span> <span>↗</span></a></li>
              <li><a href="imggallery.php" class="sidebar-link"><span>Alumni Meet Gallery</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>Degree Verification</span> <span>↗</span></a></li>
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
