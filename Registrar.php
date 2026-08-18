<?php
// ============================================================
// RKDF University — Registrar Profile (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'registrar';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '11 · EXECUTIVE ADMINISTRATION';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Registrar Profile';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Custodian of university records, legal compliance, statutory reporting, admissions, and academic secretariat under Dr. Satendra S. Thakur.';

$defaultMessage = "The Office of the Registrar at RKDF University, Bhopal serves as the chief administrative office responsible for maintaining statutory compliance, university records, student admissions, enrollment verifications, academic secretariat, and official university communications.\n\nUnder the leadership of Dr. Satendra S. Thakur (MBA, Ph.D.), Registrar, the Office ensures smooth coordination with statutory councils (UGC, AICTE, PCI, BCI, INC, COA, CCH, CCIM, and MPPURC), legal governance, board meetings, and academic policy implementation.\n\nKey Responsibilities & Secretariat Functions:\n• Custodian of University Records, Seal, and Statutory Documentation\n• Academic Secretariat for Governing Body, Board of Management, and Academic Council Meetings\n• Coordination with Statutory Bodies & Regulatory Councils (UGC, MPPURC, AICTE, PCI, BCI, COA)\n• Enrollment Verification, Student Registrations, Degree Certificates, and Transcripts\n• Legal Compliance, Official University Notifications, and Inter-Departmental Coordination\n\nContact Information:\nLandline: +91 755-2740395\nEmail Contact: registrar@rkdf.ac.in";

$introText = !empty($pRow['intro_text']) ? $pRow['intro_text'] : $defaultMessage;

$regMsgTitle = !empty($allItems[0]['title']) ? $allItems[0]['title'] : "Office of the Registrar";
$regBadge    = !empty($allItems[0]['badge_text']) ? $allItems[0]['badge_text'] : "REGISTRAR OFFICE";
$regBannerImg= !empty($allItems[0]['image_path']) ? $allItems[0]['image_path'] : "images/lovable/rkdf-building-enhanced.jpg";

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

$regProfileTitle = !empty($profileItem['title']) ? $profileItem['title'] : 'Dr. Satendra S. Thakur';
$regProfileRole  = !empty($profileItem['badge_text']) ? $profileItem['badge_text'] : 'Registrar (MBA, Ph.D.)';
$regProfileImg   = !empty($profileItem['image_path']) ? $profileItem['image_path'] : 'images/img/Dr SATENDRA SINGH THAKUR.jpeg';
$regProfileBio   = !empty($profileItem['text_val']) ? $profileItem['text_val'] : 'Registrar, RKDF University, Bhopal. Leading administrative secretariat, statutory compliance, and university governance.';
$regEmail        = 'registrar@rkdf.ac.in';
$regPhone        = '+91 755-2740395';
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
    .reg-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .reg-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .reg-grid-layout { grid-template-columns: 1fr; } }
    .reg-block-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 36px; transition: transform 0.35s ease, box-shadow 0.35s ease; }
    .reg-block-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(12,20,36,0.08); }
    .reg-card-header { background: #0C1424; color: #ffffff; padding: 24px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 3px solid #E31B23; }
    .reg-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #ffffff; margin: 0; }
    .reg-badge { font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.15em; padding: 5px 14px; border-radius: 99px; background: rgba(227, 27, 35, 0.18); color: #E31B23; border: 1px solid rgba(227, 27, 35, 0.3); }
    .reg-card-body { padding: 36px 32px; }
    .reg-media-frame { width: 100%; height: 280px; border-radius: 14px; overflow: hidden; margin-bottom: 32px; position: relative; }
    .reg-media-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .reg-block-card:hover .reg-media-img { transform: scale(1.04); }
    .reg-text-p { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 22px; }
    .reg-sig-box { margin-top: 36px; padding: 28px 32px; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.08); border-left: 4px solid #E31B23; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; }
    .reg-sig-name { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #0C1424; }
    .reg-sig-role { font-size: 14px; font-weight: 700; color: #E31B23; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px; }
    .reg-sig-univ { font-size: 14px; color: #64748B; margin-top: 2px; }
    .reg-contact-chips { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 10px; }
    .reg-contact-chip { display: inline-flex; align-items: center; gap: 10px; background: #FAF9F5; border: 1px solid rgba(12,20,36,0.1); padding: 12px 20px; border-radius: 10px; font-size: 15px; font-weight: 600; color: #0C1424; text-decoration: none; transition: all 0.25s ease; }
    .reg-contact-chip:hover { background: #0C1424; color: #ffffff; border-color: #0C1424; }
    aside { position: sticky; top: 100px; }
    .reg-side-card { background: #ffffff; border: 1px solid rgba(12,20,36,0.08); border-radius: 20px; padding: 32px 24px; text-align: center; box-shadow: 0 4px 24px rgba(12,20,36,0.04); margin-bottom: 28px; }
    .reg-portrait-box { width: 100%; max-width: 280px; height: 340px; margin: 0 auto 20px; border-radius: 16px; overflow: hidden; box-shadow: 0 12px 32px rgba(12,20,36,0.12); border: 3px solid #FAF9F5; }
    .reg-portrait-img { width: 100%; height: 100%; object-fit: cover; object-position: top center; }
    .reg-side-name { font-family: 'Playfair Display', Georgia, serif; font-size: 23px; font-weight: 700; color: #0C1424; margin-bottom: 6px; }
    .reg-side-badge { display: inline-block; font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; padding: 4px 14px; border-radius: 99px; background: rgba(227, 27, 35, 0.1); color: #E31B23; margin-bottom: 12px; }
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
  <main class="reg-main-section">
    <div class="rk-container">
      <div class="reg-grid-layout">
        
        <!-- LEFT COLUMN: REGISTRAR OFFICE & PROFILE -->
        <div>
          <article class="reg-block-card">
            <div class="reg-card-header">
              <h2 class="reg-card-title"><?= htmlspecialchars($regMsgTitle) ?></h2>
              <span class="reg-badge"><?= htmlspecialchars($regBadge) ?></span>
            </div>
            <div class="reg-card-body">
              
              <?php if (!empty($regBannerImg)): ?>
              <div class="reg-media-frame">
                <img src="<?= htmlspecialchars($regBannerImg) ?>" alt="RKDF University Campus" class="reg-media-img">
              </div>
              <?php endif; ?>

              <?php
              $paragraphs = explode("\n", $introText);
              foreach ($paragraphs as $para):
                $trimmed = trim($para);
                if (!empty($trimmed)):
              ?>
              <p class="reg-text-p"><?= htmlspecialchars($trimmed) ?></p>
              <?php
                endif;
              endforeach;
              ?>

              <div class="reg-contact-chips">
                <a href="mailto:<?= htmlspecialchars($regEmail) ?>" class="reg-contact-chip">
                  <span>✉ Email:</span>
                  <span style="color:#E31B23;"><?= htmlspecialchars($regEmail) ?></span>
                </a>
                <a href="tel:+917552740395" class="reg-contact-chip">
                  <span>📞 Landline:</span>
                  <span style="color:#0C1424;"><?= htmlspecialchars($regPhone) ?></span>
                </a>
              </div>

              <!-- Signature Box -->
              <div class="reg-sig-box">
                <div>
                  <div class="reg-sig-name"><?= htmlspecialchars($regProfileTitle) ?></div>
                  <div class="reg-sig-role"><?= htmlspecialchars($regProfileRole) ?></div>
                  <div class="reg-sig-univ">RKDF University, Bhopal</div>
                </div>
              </div>

            </div>
          </article>
        </div>

        <!-- RIGHT COLUMN: REGISTRAR PROFILE CARD & SIDEBAR -->
        <aside>
          <!-- Registrar Profile Card -->
          <div class="reg-side-card">
            <div class="reg-portrait-box">
              <img src="<?= htmlspecialchars($regProfileImg) ?>" alt="<?= htmlspecialchars($regProfileTitle) ?>" class="reg-portrait-img">
            </div>
            <h3 class="reg-side-name"><?= htmlspecialchars($regProfileTitle) ?></h3>
            <span class="reg-side-badge"><?= htmlspecialchars($regProfileRole) ?></span>
            <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:8px;">
              <?= htmlspecialchars($regProfileBio) ?>
            </p>
            <div style="margin-top:16px;">
              <a href="mailto:<?= htmlspecialchars($regEmail) ?>" style="display:inline-block;background:#0C1424;color:#ffffff;padding:8px 16px;border-radius:6px;font-size:12px;font-weight:700;text-decoration:none;">
                ✉ Contact Registrar Office
              </a>
            </div>
          </div>

          <!-- Quick Navigation Links -->
          <div class="sidebar-card">
            <h4 class="sidebar-title">Leadership &amp; Administration</h4>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="ProChancellor.php" class="sidebar-link"><span>Pro-Chancellor Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link active"><span>Registrar Profile</span> <span>↗</span></a></li>
              <li><a href="dgm.php" class="sidebar-link"><span>DGM Profile</span> <span>↗</span></a></li>
              <li><a href="dgr.php" class="sidebar-link"><span>DGR Profile</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link"><span>Other Officers</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
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
