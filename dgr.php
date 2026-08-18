<?php
// ============================================================
// RKDF University — DGR Profile (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'dgr';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '10 · RESEARCH LEADERSHIP';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Director General Research (DGR) Profile';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Spearheading R&D grants, patent filing, doctoral research oversight, and international publications under Dr. Vinod Kumar Sethi.';

$defaultMessage = "The Director General Research (DGR) Office at RKDF University, Bhopal plays a pivotal role in driving academic research excellence, innovation, sponsored R&D projects, and international academic linkages across all university departments.\n\nUnder the distinguished leadership of Dr. Vinod Kumar Sethi, Director General Research, the DGR Office promotes cutting-edge research, patent creation, scientific publications, and collaborative projects with premier national and international institutions (including CSIR, DST, AICTE, and ISRO).\n\nKey Responsibilities & Research Focus:\n• Promoting Cutting-edge R&D and Multidisciplinary Innovation Initiatives\n• Facilitating Patent Filing, Intellectual Property Rights (IPR), and Technology Commercialization\n• Overseeing Doctoral Research (Ph.D) & Post-Doctoral Fellowships\n• Coordination of National & International Conferences, Seminars, and Workshops\n• Industry-Academia MoUs, Carbon Capture & Sequestration Research, and Environmental Innovation\n\nEmail Contact: vksethi1949@gmail.com";

$introText = !empty($pRow['intro_text']) ? $pRow['intro_text'] : $defaultMessage;

$dgrMsgTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : "Director General Research (DGR) Office";
$dgrBadge    = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : "DGR OFFICE";
$dgrBannerImg= !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : "images/lovable/rkdf-research.jpg";

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

$dgrProfileTitle = !empty($profileItem['title']) ? $profileItem['title'] : 'Dr. Vinod Kumar Sethi';
$dgrProfileRole  = !empty($profileItem['badge_text']) ? $profileItem['badge_text'] : 'Director General Research';
$dgrProfileImg   = !empty($profileItem['image_path']) ? $profileItem['image_path'] : 'images/img/vk sethi sir.jpg';
$dgrProfileBio   = !empty($profileItem['text_val']) ? $profileItem['text_val'] : 'Director General Research (DGR), RKDF University, Bhopal. Leading research innovation, patent developments, and scientific projects.';
$dgrEmail        = 'vksethi1949@gmail.com';
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-research.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .dgr-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .dgr-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .dgr-grid-layout { grid-template-columns: 1fr; } }
    .dgr-block-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 36px; transition: transform 0.35s ease, box-shadow 0.35s ease; }
    .dgr-block-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(12,20,36,0.08); }
    .dgr-card-header { background: #0C1424; color: #ffffff; padding: 24px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 3px solid #C5A059; }
    .dgr-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #ffffff; margin: 0; }
    .dgr-badge { font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.15em; padding: 5px 14px; border-radius: 99px; background: rgba(197, 160, 89, 0.18); color: #C5A059; border: 1px solid rgba(197, 160, 89, 0.3); }
    .dgr-card-body { padding: 36px 32px; }
    .dgr-media-frame { width: 100%; height: 280px; border-radius: 14px; overflow: hidden; margin-bottom: 32px; position: relative; }
    .dgr-media-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .dgr-block-card:hover .dgr-media-img { transform: scale(1.04); }
    .dgr-text-p { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 22px; }
    .dgr-sig-box { margin-top: 36px; padding: 28px 32px; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.08); border-left: 4px solid #C5A059; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; }
    .dgr-sig-name { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #0C1424; }
    .dgr-sig-role { font-size: 14px; font-weight: 700; color: #C5A059; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px; }
    .dgr-sig-univ { font-size: 14px; color: #64748B; margin-top: 2px; }
    .dgr-contact-chip { display: inline-flex; align-items: center; gap: 10px; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.1); padding: 12px 20px; border-radius: 10px; font-size: 15px; font-weight: 600; color: #0C1424; margin-top: 10px; text-decoration: none; transition: all 0.25s ease; }
    .dgr-contact-chip:hover { background: #0C1424; color: #ffffff; border-color: #0C1424; }
    aside { position: sticky; top: 100px; }
    .dgr-side-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; padding: 32px 24px; text-align: center; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 28px; }
    .dgr-portrait-box { width: 100%; max-width: 280px; height: 340px; margin: 0 auto 20px; border-radius: 16px; overflow: hidden; box-shadow: 0 12px 32px rgba(12,20,36,0.12); border: 3px solid #FAF9F5; }
    .dgr-portrait-img { width: 100%; height: 100%; object-fit: cover; object-position: top center; }
    .dgr-side-name { font-family: 'Playfair Display', Georgia, serif; font-size: 23px; font-weight: 700; color: #0C1424; margin-bottom: 6px; }
    .dgr-side-badge { display: inline-block; font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; padding: 4px 14px; border-radius: 99px; background: rgba(197, 160, 89, 0.15); color: #C5A059; margin-bottom: 12px; }
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
  <main class="dgr-main-section">
    <div class="rk-container">
      <div class="dgr-grid-layout">
        
        <!-- LEFT COLUMN: DGR DESK & PROFILE -->
        <div>
          <article class="dgr-block-card">
            <div class="dgr-card-header">
              <h2 class="dgr-card-title"><?= htmlspecialchars($dgrMsgTitle) ?></h2>
              <span class="dgr-badge"><?= htmlspecialchars($dgrBadge) ?></span>
            </div>
            <div class="dgr-card-body">
              
              <?php if (!empty($dgrBannerImg)): ?>
              <div class="dgr-media-frame">
                <img src="<?= htmlspecialchars($dgrBannerImg) ?>" alt="RKDF Research Excellence" class="dgr-media-img">
              </div>
              <?php endif; ?>

              <?php
              $paragraphs = explode("\n", $introText);
              foreach ($paragraphs as $para):
                $trimmed = trim($para);
                if (!empty($trimmed)):
              ?>
              <p class="dgr-text-p"><?= htmlspecialchars($trimmed) ?></p>
              <?php
                endif;
              endforeach;
              ?>

              <a href="mailto:<?= htmlspecialchars($dgrEmail) ?>" class="dgr-contact-chip">
                <span>✉ Email DGR Office:</span>
                <span style="color:#C5A059;"><?= htmlspecialchars($dgrEmail) ?></span>
              </a>

              <!-- Signature Box -->
              <div class="dgr-sig-box">
                <div>
                  <div class="dgr-sig-name"><?= htmlspecialchars($dgrProfileTitle) ?></div>
                  <div class="dgr-sig-role"><?= htmlspecialchars($dgrProfileRole) ?></div>
                  <div class="dgr-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: DGR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- DGR Profile Card -->
          <div class="dgr-side-card">
            <div class="dgr-portrait-box">
              <img src="<?= htmlspecialchars($dgrProfileImg) ?>" alt="<?= htmlspecialchars($dgrProfileTitle) ?>" class="dgr-portrait-img">
            </div>
            <h3 class="dgr-side-name"><?= htmlspecialchars($dgrProfileTitle) ?></h3>
            <span class="dgr-side-badge"><?= htmlspecialchars($dgrProfileRole) ?></span>
            <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:8px;">
              <?= htmlspecialchars($dgrProfileBio) ?>
            </p>
            <div style="margin-top:16px;">
              <a href="mailto:<?= htmlspecialchars($dgrEmail) ?>" style="display:inline-block;background:#0C1424;color:#ffffff;padding:8px 16px;border-radius:6px;font-size:12px;font-weight:700;text-decoration:none;">
                ✉ Contact DGR Office
              </a>
            </div>
          </div>

          <!-- Quick Navigation Links -->
          <div class="sidebar-card">
            <h4 class="sidebar-title">Research Leadership</h4>
            <ul class="sidebar-nav-list">
              <li><a href="dgr.php" class="sidebar-link active"><span>DGR Profile</span> <span>↗</span></a></li>
              <li><a href="dgm.php" class="sidebar-link"><span>DGM Profile</span> <span>↗</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link"><span>Registrar Profile</span> <span>↗</span></a></li>
              <li><a href="r&d.php" class="sidebar-link"><span>R&amp;D Cell</span> <span>↗</span></a></li>
              <li><a href="patent.php" class="sidebar-link"><span>Patents &amp; IPR</span> <span>↗</span></a></li>
              <li><a href="journals.php" class="sidebar-link"><span>Shodh Sangam Journals</span> <span>↗</span></a></li>
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
