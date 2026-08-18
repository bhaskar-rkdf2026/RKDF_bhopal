<?php
// ============================================================
// RKDF University — Student ERP & Digital Services Gateway (100% Dynamic CMS)
// World-Class Premium Design + Direct ERP Login Links + High-Res Media Assets
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'student-portal';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · STUDENT ERP & E-SERVICES PORTAL';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'RKDF Student ERP & Digital Services Portal';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Unified digital gateway for student marksheet login, semester admit cards, exam timetables, fee payment, LMS video lectures, and online document verification.';

$defaultMessage = "Welcome to the RKDF University Official Student ERP & Digital Services Portal. This unified gateway provides instant access to student marksheet login, semester examination results, LMS e-learning video lectures, digital library e-resources, admit card downloads, and academic document verification services.\n\nStudents can log in to the live ERP portal using their Enrollment Number and password.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "RKDF Student ERP & E-Services Gateway";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedSP = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'Core Digital Services & ERP Gateways';
    $groupedSP[$gName][] = $it;
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
    .sp-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .sp-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .sp-grid-layout { grid-template-columns: 1fr; } }

    .sp-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .sp-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .sp-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* ERP Live Banner Card */
    .sp-erp-banner {
      background: linear-gradient(135deg, rgba(227,27,35,0.96) 0%, rgba(12,20,36,0.98) 100%);
      color: #ffffff;
      border-radius: 18px;
      padding: 32px 36px;
      box-shadow: 0 10px 30px rgba(227, 27, 35, 0.2);
      margin-bottom: 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .sp-erp-title { font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 700; color: #ffffff; margin: 0 0 6px 0; }
    .sp-erp-desc { font-size: 15px; color: rgba(250, 249, 245, 0.85); margin: 0; line-height: 1.6; }

    .sp-erp-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #C5A059;
      color: #0C1424;
      font-size: 15px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 8px;
      transition: all 0.25s ease;
      white-space: nowrap;
      box-shadow: 0 4px 16px rgba(197, 160, 89, 0.3);
    }
    .sp-erp-btn:hover { background: #ffffff; color: #0C1424 !important; transform: scale(1.03); }

    .sp-group-box { margin-bottom: 36px; }
    .sp-group-title {
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

    .sp-services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 20px;
    }

    .sp-service-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 26px 28px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.03);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .sp-service-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .sp-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 6px;
    }

    .sp-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; line-height: 1.35; }
    .sp-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.55; }

    .sp-card-btn {
      display: inline-flex;
      align-items: center;
      justify-content: space-between;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.1);
      color: #0C1424;
      padding: 10px 18px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .sp-card-btn:hover { background: #0C1424; color: #ffffff !important; border-color: #0C1424; }

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
  <main class="sp-main-section">
    <div class="rk-container">
      <div class="sp-grid-layout">
        
        <!-- LEFT COLUMN: STUDENT PORTAL SERVICES -->
        <div>
          
          <div class="sp-intro-card">
            <h2 class="sp-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="sp-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- LIVE ERP BANNER CARD -->
          <div class="sp-erp-banner">
            <div style="max-width:540px;">
              <h3 class="sp-erp-title">Student ERP Live Portal Access</h3>
              <p class="sp-erp-desc">Log in with your University Enrollment Number to access digital marksheets, fee receipts, class timetables, and semester exam admit cards.</p>
            </div>
            <div>
              <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sp-erp-btn">
                <span>ERP LOGIN PORTAL</span> <span>↗</span>
              </a>
            </div>
          </div>

          <!-- RENDER GROUPED SERVICES -->
          <?php foreach ($groupedSP as $gTitle => $sList): ?>
          <div class="sp-group-box">
            <div class="sp-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($sList) ?> E-SERVICES
              </span>
            </div>

            <div class="sp-services-grid">
              <?php foreach ($sList as $item): ?>
              <div class="sp-service-card">
                <div>
                  <span class="sp-badge"><?= htmlspecialchars($item['badge_text'] ?: 'STUDENT SERVICE') ?></span>
                  <h3 class="sp-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                  <p class="sp-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
                </div>
                <div>
                  <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : 'https://erplive.rkdf.ac.in/') ?>" target="_blank" class="sp-card-btn">
                    <span>Access Service</span> <span>↗</span>
                  </a>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Student Services</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=student-portal" class="sidebar-link active"><span>Student Portal</span> <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link"><span>Student ERP Login</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>Declared Results</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=lms" class="sidebar-link"><span>LMS E-Learning</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-timetable" class="sidebar-link"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>Degree Verification</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=alumni-form" class="sidebar-link"><span>Alumni Registration</span> <span>↗</span></a></li>
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
