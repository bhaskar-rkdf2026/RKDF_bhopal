<?php
// ============================================================
// RKDF University — Learning Management System (LMS) (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + 100% Working Video Streams Fixed
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'lms';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '47 · E-LEARNING & VIDEO LECTURES';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Learning Management System (LMS)';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Digital e-content, video lectures, NPTEL modules, SWAYAM courses, and online study materials across all RKDF University faculties.';

$defaultMessage = "Welcome to the RKDF University Bhopal Learning Management System (LMS) & E-Lecture Portal. Access subject-wise video lectures, e-learning modules, NPTEL courses, and interactive digital study materials across all university faculties.\n\nAll video lectures are available for online streaming and direct study download for registered students and faculty scholars.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Online Video Lectures & Digital Courseware";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group video lectures by faculty / category (group_key)
$videoGroups = [];
foreach ($allItems as $it) {
    $groupName = !empty($it['group_key']) ? trim($it['group_key']) : 'General E-Lectures';
    $videoGroups[$groupName][] = $it;
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-students-quad.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .lms-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .lms-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .lms-grid-layout { grid-template-columns: 1fr; }
    }

    .lms-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .lms-block-card:hover {
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .lms-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .lms-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .lms-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .lms-card-body {
      padding: 32px 36px;
    }

    /* Video Group Container */
    .video-group {
      margin-bottom: 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 28px;
    }

    .video-group-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 18px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .video-item-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 12px;
      margin-bottom: 12px;
      gap: 16px;
      flex-wrap: wrap;
      transition: all 0.25s ease;
    }
    .video-item-row:last-child {
      margin-bottom: 0;
    }
    .video-item-row:hover {
      border-color: #E31B23;
      transform: translateX(4px);
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.06);
    }

    .video-item-meta {
      flex: 1;
      min-width: 260px;
    }

    .video-item-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin: 0 0 4px 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .video-item-sub {
      font-size: 13.5px;
      color: #64748B;
      margin: 0 0 6px 0;
    }

    .video-item-desc {
      font-size: 13px;
      color: #475569;
      margin: 0;
      line-height: 1.5;
    }

    .lms-video-link {
      font-size: 13px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #ffffff;
      background: #E31B23;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      transition: all 0.2s ease;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .lms-video-link:hover {
      background: #0C1424;
      color: #ffffff !important;
      transform: scale(1.03);
    }

    /* Sidebar Links */
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
  <main class="lms-main-section">
    <div class="rk-container">
      <div class="lms-grid-layout">
        
        <!-- LEFT COLUMN: E-LECTURES BY FACULTY -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="lms-block-card">
            <div class="lms-card-header">
              <h2 class="lms-card-title"><?= htmlspecialchars($introHeading) ?></h2>
              <span class="lms-badge">NAAC CRITERIA 3.4.7</span>
            </div>
            <div class="lms-card-body">
              
              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:32px;">
                <?= nl2br(htmlspecialchars($introText)) ?>
              </p>

              <!-- DYNAMIC VIDEO GROUPS -->
              <?php foreach ($videoGroups as $gName => $vList): ?>
              <div class="video-group">
                <div class="video-group-title">
                  <span><?= htmlspecialchars($gName) ?></span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                    <?= count($vList) ?> VIDEO LECTURES
                  </span>
                </div>

                <?php foreach ($vList as $vid): ?>
                <div class="video-item-row">
                  <div class="video-item-meta">
                    <h3 class="video-item-title">
                      <span>▶</span> <?= htmlspecialchars($vid['title']) ?>
                    </h3>
                    <div class="video-item-sub"><?= htmlspecialchars($vid['subtitle']) ?></div>
                    <?php if (!empty($vid['text_val'])): ?>
                    <p class="video-item-desc"><?= htmlspecialchars($vid['text_val']) ?></p>
                    <?php endif; ?>
                  </div>

                  <div>
                    <a href="<?= htmlspecialchars(!empty($vid['link_url']) ? $vid['link_url'] : '#') ?>" target="_blank" class="lms-video-link">
                      <span>🎬 Watch Video</span> <span>↗</span>
                    </a>
                  </div>
                </div>
                <?php endforeach; ?>

              </div>
              <?php endforeach; ?>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">E-Learning &amp; Portals</h3>
            <ul class="sidebar-nav-list">
              <li><a href="LMS.php" class="sidebar-link active"><span>LMS Portal</span> <span>↗</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link"><span>E-Resources Portal</span> <span>↗</span></a></li>
              <li><a href="eresourse_login.php" class="sidebar-link"><span>E-Resource Login</span> <span>↗</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link"><span>Course Syllabus</span> <span>↗</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link"><span>Value-Added Courses</span> <span>↗</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link"><span>Vision &amp; Mission</span> <span>↗</span></a></li>
              <li><a href="dean.php" class="sidebar-link"><span>Faculty Deans</span> <span>↗</span></a></li>
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
