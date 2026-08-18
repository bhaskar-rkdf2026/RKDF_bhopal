<?php
// ============================================================
// RKDF University — Vice Chancellor's Desk (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'vc-desk';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '05 · EXECUTIVE LEADERSHIP';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : "Vice-Chancellor's Desk";
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'A message of academic vision, research innovation, and institutional development from Prof. Vijay K. Agrawal, Vice-Chancellor.';
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : 'RKDF University is marching towards meeting these challenges to become a Global Knowledge Enterprise...';

$vcMsgTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : 'Message From The Vice-Chancellor';
$vcBadge    = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : 'VICE-CHANCELLOR ADDRESS';
$vcBannerImg= !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : 'images/ai_vice_chancellor/rkdf_vc_campus_innovation.jpg';

$vcProfileTitle = !empty($allItems[1]['title']) ? $allItems[1]['title'] : 'Prof. Vijay K. Agrawal';
$vcProfileRole  = !empty($allItems[1]['badge_text']) ? $allItems[1]['badge_text'] : 'Vice-Chancellor';
$vcProfileImg   = !empty($allItems[1]['image_path']) ? $allItems[1]['image_path'] : 'images/lovable/rkdf-chancellor.jpg';
$vcProfileBio   = !empty($allItems[1]['text_val']) ? $allItems[1]['text_val'] : 'Distinguished academician with decades of research and administrative leadership in higher education.';
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/ai_vice_chancellor/rkdf_vc_banner.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vc-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .vc-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .vc-grid-layout { grid-template-columns: 1fr; }
    }

    .vc-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .vc-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .vc-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .vc-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.18);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .vc-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .vc-card-body {
      padding: 36px 32px;
    }

    .vc-media-frame {
      width: 100%;
      height: 280px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .vc-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .vc-block-card:hover .vc-media-img {
      transform: scale(1.04);
    }

    .vc-text-p {
      font-size: 16.5px;
      line-height: 1.85;
      color: #334155;
      margin-bottom: 22px;
    }

    .vc-sig-box {
      margin-top: 36px;
      padding: 28px 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #E31B23;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .vc-sig-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
    }
    .vc-sig-role {
      font-size: 14px;
      font-weight: 700;
      color: #E31B23;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 2px;
    }
    .vc-sig-univ {
      font-size: 14px;
      color: #64748B;
      margin-top: 2px;
    }

    aside {
      position: sticky;
      top: 100px;
    }

    .vc-side-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px;
      text-align: center;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 28px;
    }

    .vc-portrait-box {
      width: 100%;
      max-width: 280px;
      height: 340px;
      margin: 0 auto 20px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
    }

    .vc-portrait-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .vc-side-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 23px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 6px;
    }

    .vc-side-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 12px;
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
  <main class="vc-main-section">
    <div class="rk-container">
      <div class="vc-grid-layout">
        
        <!-- LEFT COLUMN: VICE-CHANCELLOR MESSAGE -->
        <div>
          <article class="vc-block-card">
            <div class="vc-card-header">
              <h2 class="vc-card-title"><?= htmlspecialchars($vcMsgTitle) ?></h2>
              <span class="vc-badge"><?= htmlspecialchars($vcBadge) ?></span>
            </div>
            <div class="vc-card-body">
              
              <div class="vc-media-frame">
                <img src="<?= htmlspecialchars($vcBannerImg) ?>" alt="RKDF University Innovation Hub" class="vc-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:20px;font-weight:700;">
                Heartiest Greetings from RKDF University, Bhopal!!
              </div>

              <?php
              $vcParas = explode("\n", $introText);
              if (empty(array_filter($vcParas))) {
                $vcParas = [
                  "Higher education in the country is at the threshold of major institutional reforms targeted towards cutting edge R&D and innovations.",
                  "RKDF University is marching towards meeting these challenges to become a 'Global Knowledge Enterprise'.",
                  "We, the RKDF Faculty Members and Staff along with Our Management are committed to build this University a real knowledge hub.",
                  "We welcome your suggestions and feedback if we can work together for further improvement."
                ];
              }
              foreach ($vcParas as $para):
                if (!empty(trim($para))):
              ?>
              <p class="vc-text-p"><?= htmlspecialchars(trim($para)) ?></p>
              <?php
                endif;
              endforeach;
              ?>

              <!-- Signature Box -->
              <div class="vc-sig-box">
                <div>
                  <div class="vc-sig-name"><?= htmlspecialchars($vcProfileTitle) ?></div>
                  <div class="vc-sig-role"><?= htmlspecialchars($vcProfileRole) ?></div>
                  <div class="vc-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: PROFILE CARD & SIDEBAR -->
        <aside>
          <div class="vc-side-card">
            <div class="vc-portrait-box">
              <img src="<?= htmlspecialchars($vcProfileImg) ?>" alt="<?= htmlspecialchars($vcProfileTitle) ?>" class="vc-portrait-img">
            </div>
            <h3 class="vc-side-name"><?= htmlspecialchars($vcProfileTitle) ?></h3>
            <span class="vc-side-badge"><?= htmlspecialchars($vcProfileRole) ?></span>
            <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:8px;">
              <?= htmlspecialchars($vcProfileBio) ?>
            </p>
          </div>

          <div class="sidebar-card">
            <h4 class="sidebar-title">Leadership &amp; Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link"><span>Pro-Chancellor Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link active"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
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
