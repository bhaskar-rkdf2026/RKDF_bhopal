<?php
// ============================================================
// RKDF University — Other Officer's Directory (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'other-officers';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '12 · EXECUTIVE ADMINISTRATION';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : "Other Officer's Directory";
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Key administrative officers, exam controller, dean student welfare, and chief finance officer of RKDF University Bhopal.';

$defaultMessage = "The Executive & Administrative Officers of RKDF University, Bhopal manage key operational, academic, financial, and student support departments across the campus.\n\nWorking in synergy with the Chancellor, Vice-Chancellor, Pro-Chancellor, and Registrar offices, our executive officers ensure seamless academic administration, rigorous examination standards, financial integrity, and comprehensive student welfare services.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Executive & Administrative Officers";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Fallback officers if DB query returns empty items
if (empty($allItems)) {
    $allItems = [
        [
            'title' => 'Dr. Sunil Patil',
            'subtitle' => 'Exam Controller (M.Tech, Ph.D.)',
            'badge_text' => 'EXAM CONTROLLER',
            'image_path' => 'images/img/Patil Sir.jpg',
            'text_val' => 'Controller of Examinations, RKDF University Bhopal. Managing university examination schedules, evaluation systems, result publication, and academic evaluation compliance.'
        ],
        [
            'title' => 'Dr. Ratnesh Kumar Jain',
            'subtitle' => 'Dean Student Welfare (M.Tech, Ph.D.)',
            'badge_text' => 'DEAN STUDENT WELFARE',
            'image_path' => 'images/img/Ratnesh Sir.jpg',
            'text_val' => 'Dean Student Welfare (DSW), RKDF University Bhopal. Overseeing student extracurricular activities, grievance redressal, campus discipline, and holistic student support.'
        ],
        [
            'title' => 'Sohaib Siddique',
            'subtitle' => 'Chief Finance & Accounts Officer (C.F.A.O)',
            'badge_text' => 'CHIEF FINANCE OFFICER',
            'image_path' => 'images/img/Sohaib siddiqui.jfif',
            'text_val' => 'Chief Finance & Accounts Officer (C.F.A.O), RKDF University Bhopal. Managing university financial planning, budgeting, accounts, fee audit, and fiscal compliance.'
        ]
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-library.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .off-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .off-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .off-grid-layout { grid-template-columns: 1fr; } }
    
    .off-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #E31B23;
    }
    .off-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .off-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .off-officer-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 32px;
      display: grid;
      grid-template-columns: 240px 1fr;
      align-items: stretch;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .off-officer-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08); }
    @media (max-width: 640px) { .off-officer-card { grid-template-columns: 1fr; } }

    .off-img-frame { width: 100%; height: 100%; min-height: 240px; background: #FAF9F5; position: relative; overflow: hidden; }
    .off-img { width: 100%; height: 100%; object-fit: cover; object-position: top center; transition: transform 0.6s ease; }
    .off-officer-card:hover .off-img { transform: scale(1.05); }

    .off-card-content { padding: 32px; display: flex; flex-direction: column; justify-content: center; }
    .off-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 12px;
      align-self: flex-start;
    }
    .off-name { font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 700; color: #0C1424; margin: 0 0 4px 0; }
    .off-role { font-size: 14px; font-weight: 700; color: #C5A059; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 14px; }
    .off-desc { font-size: 15.5px; line-height: 1.75; color: #334155; margin: 0; }

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
  <main class="off-main-section">
    <div class="rk-container">
      <div class="off-grid-layout">
        
        <!-- LEFT COLUMN: OFFICERS LIST -->
        <div>
          <div class="off-intro-card">
            <h2 class="off-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="off-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <?php foreach ($allItems as $item): ?>
          <article class="off-officer-card">
            <div class="off-img-frame">
              <img src="<?= htmlspecialchars(!empty($item['image_path']) ? $item['image_path'] : 'images/lovable/rkdf-building-enhanced.jpg') ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="off-img">
            </div>
            <div class="off-card-content">
              <span class="off-badge"><?= htmlspecialchars($item['badge_text'] ?: 'EXECUTIVE OFFICER') ?></span>
              <h3 class="off-name"><?= htmlspecialchars($item['title']) ?></h3>
              <div class="off-role"><?= htmlspecialchars($item['subtitle']) ?></div>
              <p class="off-desc"><?= htmlspecialchars($item['text_val']) ?></p>
            </div>
          </article>
          <?php endforeach; ?>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Leadership &amp; Administration</h4>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link"><span>Pro-Chancellor Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link"><span>Registrar Profile</span> <span>↗</span></a></li>
              <li><a href="dgm.php" class="sidebar-link"><span>DGM Profile</span> <span>↗</span></a></li>
              <li><a href="dgr.php" class="sidebar-link"><span>DGR Profile</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link active"><span>Other Officers</span> <span>↗</span></a></li>
              <li><a href="dean.php" class="sidebar-link"><span>Deans Directory</span> <span>↗</span></a></li>
              <li><a href="hod.php" class="sidebar-link"><span>HODs Directory</span> <span>↗</span></a></li>
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
