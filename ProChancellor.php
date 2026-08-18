<?php
// ============================================================
// RKDF University — Pro-Chancellor Desk (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'pro-chancellor';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '04 · EXECUTIVE LEADERSHIP';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Pro-Chancellor Desk';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Guiding strategic initiatives, academic quality assurance, research, and international university linkages.';

$defaultMessage = "Education is for transition of a competent scholar to a seasoned professional equipped with expertise in the chosen field. The standard requirements are increasing with every passing year, what has been extra ordinary in the last decade is merely termed sufficient. The levels of desired excellence are increasing in this competitive era, the scholar needs to uplift their levels of knowledge and inculcate a diverse range of acquaintance to attain decisive excellence in the desired fields. In this knowledge driven era, the plethora of knowledge, student centric methods, advanced teaching methodologies have synergized learning and ensured students attract a good quantum of knowledge and expertise. The value added course, special classes and workshops and expert lectures have further positive impact on enhancing students learning and abilities.\n\nRKDF University, Bhopal among the top educational hubs of central India has been catering the needs by empowering its students with diverse set of knowledge, expertise, through several of its duly approved programs offered under various faculties, with state of-the-art facilities, infrastructure and well qualified faculty and developing a sound professional resource for the nation. There are numerous functional MOU’s with National and International academic institutions and industries that opens new opportunities in skill and competence progression.\n\nExemplary success attained by students under guidance of learned faculties, while working on most advanced techniques and facility; generating intellectual property rights for themselves and University are source of energy and inspiration.\n\nThe faculties and scholars of University are involved in cutting edge research which are highlighted and appreciated at national and international platforms. The University has also extended its Carbon Capture and Sequestration plant to scientists of CSIR labs who are exploring possibilities and innovations feasible for environment mitigation and societal use.\n\nThe emphasis on inclusive development of scholars has led learning as a fun filled activity at RKDF University, Bhopal and hence is a first choice destination of students.\n\nWe welcome you to be part of the development and success of professionals.\n\nWishing the scholars - Happy Learning";

$introText = !empty($pRow['intro_text']) ? $pRow['intro_text'] : $defaultMessage;

$pcMsgTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : "Message From Pro-Chancellor";
$pcBadge    = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : "PRO-CHANCELLOR";
$pcBannerImg= !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : "images/lovable/rkdf-why-bg.jpg";

$profileItem = null;
foreach ($allItems as $item) {
    if (($item['group_key'] ?? '') === 'profile') {
        $profileItem = $item;
        break;
    }
}
if (!$profileItem && isset($allItems[1])) {
    $profileItem = $allItems[1];
}

$pcProfileTitle = !empty($profileItem['title']) ? $profileItem['title'] : 'Dr. Siddharth Kapoor';
$pcProfileRole  = !empty($profileItem['badge_text']) ? $profileItem['badge_text'] : 'Pro-Chancellor';
$pcProfileImg   = !empty($profileItem['image_path']) ? $profileItem['image_path'] : 'images/img/Dr_Siddhart_Kapoor-N.jpeg';
$pcProfileBio   = !empty($profileItem['text_val']) ? $profileItem['text_val'] : 'Guiding strategic academic initiatives, research excellence, and institutional development at RKDF University, Bhopal.';
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
    .pc-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .pc-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .pc-grid-layout { grid-template-columns: 1fr; } }
    .pc-block-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 36px; transition: transform 0.35s ease, box-shadow 0.35s ease; }
    .pc-block-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(12,20,36,0.08); }
    .pc-card-header { background: #0C1424; color: #ffffff; padding: 24px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 3px solid #C5A059; }
    .pc-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #ffffff; margin: 0; }
    .pc-badge { font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.15em; padding: 5px 14px; border-radius: 99px; background: rgba(197, 160, 89, 0.18); color: #C5A059; border: 1px solid rgba(197, 160, 89, 0.3); }
    .pc-card-body { padding: 36px 32px; }
    .pc-media-frame { width: 100%; height: 280px; border-radius: 14px; overflow: hidden; margin-bottom: 32px; position: relative; }
    .pc-media-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .pc-block-card:hover .pc-media-img { transform: scale(1.04); }
    .pc-text-p { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 22px; }
    .pc-sig-box { margin-top: 36px; padding: 28px 32px; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.08); border-left: 4px solid #C5A059; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; }
    .pc-sig-name { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #0C1424; }
    .pc-sig-role { font-size: 14px; font-weight: 700; color: #C5A059; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px; }
    .pc-sig-univ { font-size: 14px; color: #64748B; margin-top: 2px; }
    aside { position: sticky; top: 100px; }
    .pc-side-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; padding: 32px 24px; text-align: center; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 28px; }
    .pc-portrait-box { width: 100%; max-width: 280px; height: 340px; margin: 0 auto 20px; border-radius: 16px; overflow: hidden; box-shadow: 0 12px 32px rgba(12,20,36,0.12); border: 3px solid #FAF9F5; }
    .pc-portrait-img { width: 100%; height: 100%; object-fit: cover; object-position: top center; }
    .pc-side-name { font-family: 'Playfair Display', Georgia, serif; font-size: 23px; font-weight: 700; color: #0C1424; margin-bottom: 6px; }
    .pc-side-badge { display: inline-block; font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; padding: 4px 14px; border-radius: 99px; background: rgba(197, 160, 89, 0.15); color: #C5A059; margin-bottom: 12px; }
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
  <main class="pc-main-section">
    <div class="rk-container">
      <div class="pc-grid-layout">
        
        <!-- LEFT COLUMN: PRO-CHANCELLOR MESSAGE -->
        <div>
          <article class="pc-block-card">
            <div class="pc-card-header">
              <h2 class="pc-card-title"><?= htmlspecialchars($pcMsgTitle) ?></h2>
              <span class="pc-badge"><?= htmlspecialchars($pcBadge) ?></span>
            </div>
            <div class="pc-card-body">
              
              <?php if (!empty($pcBannerImg)): ?>
              <div class="pc-media-frame">
                <img src="<?= htmlspecialchars($pcBannerImg) ?>" alt="RKDF University Campus" class="pc-media-img">
              </div>
              <?php endif; ?>

              <?php
              $paragraphs = explode("\n", $introText);
              foreach ($paragraphs as $para):
                $trimmed = trim($para);
                if (!empty($trimmed)):
              ?>
              <p class="pc-text-p"><?= htmlspecialchars($trimmed) ?></p>
              <?php
                endif;
              endforeach;
              ?>

              <!-- Signature Box -->
              <div class="pc-sig-box">
                <div>
                  <div class="pc-sig-name"><?= htmlspecialchars($pcProfileTitle) ?></div>
                  <div class="pc-sig-role"><?= htmlspecialchars($pcProfileRole) ?></div>
                  <div class="pc-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: PRO-CHANCELLOR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Pro-Chancellor Profile Card -->
          <div class="pc-side-card">
            <div class="pc-portrait-box">
              <img src="<?= htmlspecialchars($pcProfileImg) ?>" alt="<?= htmlspecialchars($pcProfileTitle) ?>" class="pc-portrait-img">
            </div>
            <h3 class="pc-side-name"><?= htmlspecialchars($pcProfileTitle) ?></h3>
            <span class="pc-side-badge"><?= htmlspecialchars($pcProfileRole) ?></span>
            <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:8px;">
              <?= htmlspecialchars($pcProfileBio) ?>
            </p>
          </div>

          <!-- Quick Navigation Links -->
          <div class="sidebar-card">
            <h4 class="sidebar-title">Leadership &amp; Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link active"><span>Pro-Chancellor Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link"><span>Registrar Profile</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
              <li><a href="BoM.php" class="sidebar-link"><span>Board of Management</span> <span>↗</span></a></li>
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
