<?php
// ============================================================
// RKDF University — Examination Time Table Portal (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + 100% Original PDF & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'exam-timetable';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · SEMESTER DATESHEETS';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Examination Time Table & Datesheets';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official course-wise semester examination timetables and datesheets across all RKDF University faculties.';

$defaultMessage = "Welcome to the Controller of Examinations Secretariat at RKDF University Bhopal. Below are official semester-wise examination timetables, datesheets, and supplementary schedules for all Diploma, Under-Graduate, Post-Graduate, BAMS, BHMS, and Pharmacy courses.\n\nClick on any course datesheet below to view or download the official signed PDF document.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Course-wise Examination Schedules";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedTimetables = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'General Timetables';
    $groupedTimetables[$gName][] = $it;
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
    .tt-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .tt-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .tt-grid-layout { grid-template-columns: 1fr; } }

    .tt-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #C5A059;
    }
    .tt-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .tt-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .tt-group-box {
      margin-bottom: 36px;
    }
    .tt-group-title {
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

    .tt-row-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 22px 28px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .tt-row-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #C5A059;
    }

    .tt-badge {
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
      margin-bottom: 6px;
    }

    .tt-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 19px; font-weight: 700; color: #0C1424; margin: 0 0 4px 0; }
    .tt-card-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .tt-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff;
      padding: 11px 22px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
      white-space: nowrap;
    }
    .tt-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }

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
  <main class="tt-main-section">
    <div class="rk-container">
      <div class="tt-grid-layout">
        
        <!-- LEFT COLUMN: DATESHEETS BY PROGRAMME -->
        <div>
          
          <div class="tt-intro-card">
            <h2 class="tt-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="tt-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- RENDER GROUPED TIMETABLES -->
          <?php foreach ($groupedTimetables as $gTitle => $tList): ?>
          <div class="tt-group-box">
            <div class="tt-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($tList) ?> DATESHEETS
              </span>
            </div>

            <?php foreach ($tList as $item): ?>
            <article class="tt-row-card">
              <div style="max-width:520px;">
                <span class="tt-badge"><?= htmlspecialchars($item['badge_text'] ?: 'EXAM DATESHEET') ?></span>
                <h3 class="tt-card-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="tt-card-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : '#') ?>" target="_blank" class="tt-pdf-btn">
                  <span>📄 Download Datesheet PDF</span> <span>↗</span>
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
            <h4 class="sidebar-title">Examination Branch</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=exam-timetable" class="sidebar-link active"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-notice" class="sidebar-link"><span>Examination Notices</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>Exam Results Portal</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link"><span>Controller of Examination</span> <span>↗</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link"><span>Academic Regulations</span> <span>↗</span></a></li>
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
