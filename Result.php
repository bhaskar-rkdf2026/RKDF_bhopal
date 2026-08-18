<?php
// ============================================================
// RKDF University — Online Examination Results Portal (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + 100% Original Result PDF & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'result';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '73 · ONLINE RESULTS & REVALUATION PORTAL';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Examination Results';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Declared semester examination results, ERP student marksheet login, revaluation application deadlines, and official grade circulars.';

$defaultMessage = "Welcome to the Controller of Examinations Online Results Portal at RKDF University Bhopal. Below are declared semester examination results for undergraduate, postgraduate, diploma, nursing, pharmacy, BAMS, and BHMS programs.\n\nStudents can click on ERP Login to access detailed digital scorecards using their Enrollment Number.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Declared Examination Results & Scorecards";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedResults = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'General Declared Results';
    $groupedResults[$gName][] = $it;
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
    .sres-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .sres-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .sres-grid-layout { grid-template-columns: 1fr; } }

    .sres-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #C5A059;
    }
    .sres-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .sres-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .sres-alert-banner {
      background: linear-gradient(135deg, rgba(227,27,35,0.08) 0%, rgba(227,27,35,0.04) 100%);
      border: 1px solid rgba(227,27,35,0.2);
      border-radius: 14px;
      padding: 20px 24px;
      margin-bottom: 32px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .sres-alert-item { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .sres-alert-title { font-size: 14.5px; font-weight: 700; color: #E31B23; }

    .sres-group-box { margin-bottom: 36px; }
    .sres-group-title {
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

    .sres-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 16px;
    }

    .sres-download-row {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 20px 22px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      transition: all 0.25s ease;
      gap: 12px;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.03);
    }
    .sres-download-row:hover {
      border-color: #C5A059;
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(12, 20, 36, 0.08);
    }

    .sres-row-title { font-family: 'Playfair Display', Georgia, serif; font-size: 17px; font-weight: 700; color: #0C1424; line-height: 1.35; margin: 0; }
    .sres-row-sub { font-size: 13px; color: #64748B; margin-top: 4px; }
    .sres-row-footer { display: flex; align-items: center; justify-content: space-between; margin-top: 8px; }
    .sres-reval-tag { font-size: 12px; font-family: 'JetBrains Mono', monospace; color: #475569; font-weight: 600; }

    .sres-portal-btn {
      font-size: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #ffffff;
      background: #E31B23;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 6px;
      transition: all 0.2s ease;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .sres-portal-btn:hover {
      background: #0C1424;
      color: #ffffff !important;
      transform: scale(1.02);
    }

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
  <main class="sres-main-section">
    <div class="rk-container">
      <div class="sres-grid-layout">
        
        <!-- LEFT COLUMN: DECLARED RESULTS BY SESSION -->
        <div>

          <div class="sres-intro-card">
            <h2 class="sres-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="sres-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- TOP ALERT BANNER -->
          <div class="sres-alert-banner">
            <div class="sres-alert-item">
              <span class="sres-alert-title">📢 Important Notice — Examination &amp; Revaluation Guidelines</span>
              <a href="page.php?slug=exam-notice" class="sres-portal-btn">View Exam Notices ↗</a>
            </div>
            <div class="sres-alert-item">
              <span class="sres-alert-title">💳 Student ERP Login for Online Scorecard Downloads</span>
              <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
            </div>
          </div>

          <!-- RENDER GROUPED RESULTS -->
          <?php foreach ($groupedResults as $gTitle => $rList): ?>
          <div class="sres-group-box">
            <div class="sres-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($rList) ?> DECLARED RESULTS
              </span>
            </div>

            <div class="sres-download-grid">
              <?php foreach ($rList as $item): ?>
              <div class="sres-download-row">
                <div>
                  <h3 class="sres-row-title"><?= htmlspecialchars($item['title']) ?></h3>
                  <div class="sres-row-sub"><?= htmlspecialchars($item['subtitle']) ?></div>
                </div>
                <div class="sres-row-footer">
                  <span class="sres-reval-tag"><?= htmlspecialchars($item['text_val']) ?></span>
                  <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : 'https://erplive.rkdf.ac.in/') ?>" target="_blank" class="sres-portal-btn">
                    <span><?= htmlspecialchars($item['badge_text'] ?: 'ERP Login') ?></span> <span>↗</span>
                  </a>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Results Menu</h3>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=result" class="sidebar-link active"><span>Online Results</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-notice" class="sidebar-link"><span>Examination Notices</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-timetable" class="sidebar-link"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="result_2016/revel_form.pdf" target="_blank" class="sidebar-link"><span>Revaluation Form</span> <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link"><span>Student ERP Portal</span> <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20Hindi.pdf" target="_blank" class="sidebar-link"><span>Degree Form (Hindi)</span> <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20English.pdf" target="_blank" class="sidebar-link"><span>Degree Form (English)</span> <span>↗</span></a></li>
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
