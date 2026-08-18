<?php
// ============================================================
// RKDF University — Board of Studies (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'bos';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '18 · CURRICULUM & SYLLABUS BOARD';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Board of Studies (BOS)';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Departmental Boards of Studies designing innovative CBCS and NEP-2020 course curricula across all university faculties.';

$defaultMessage = "The Board of Studies (BOS) is the statutory academic authority responsible for designing, revising, and modernizing course curricula, syllabi, schemes of examination, and textbook references across all constituent faculties at RKDF University Bhopal.\n\nWorking under the guidance of the Academic Council, the Board of Studies meets annually to align university degree programs with the National Education Policy (NEP-2020), Choice Based Credit System (CBCS), outcome-based education (OBE), and current industry requirements.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Departmental Boards of Studies (BOS) Secretariat";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Filter items by group_key
$facultyBos = [];
$socialBos  = [];

foreach ($allItems as $it) {
    if ($it['group_key'] === 'social_science_bos') {
        $socialBos[] = $it;
    } else {
        $facultyBos[] = $it;
    }
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-research.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .bos-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .bos-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .bos-grid-layout { grid-template-columns: 1fr; } }

    .bos-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #C5A059;
    }
    .bos-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .bos-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .bos-item-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 22px 28px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .bos-item-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #C5A059;
    }

    .bos-item-badge {
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

    .bos-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 19px; font-weight: 700; color: #0C1424; margin: 0 0 4px 0; }
    .bos-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .bos-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
    }
    .bos-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }

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
  <main class="bos-main-section">
    <div class="rk-container">
      <div class="bos-grid-layout">
        
        <!-- LEFT COLUMN: BOS NOTIFICATIONS & SYLLABUS DOCUMENTS -->
        <div>
          
          <div class="bos-intro-card">
            <h2 class="bos-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="bos-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- SECTION 1: FACULTY BOS CONSTITUTIONS -->
          <div style="margin-bottom:24px;">
            <span class="rk-eyebrow tone-gold">Faculty Governance &amp; Constitution</span>
            <h2 class="rk-h2" style="font-size:28px;margin-top:6px;">Faculty Board of Studies Notifications</h2>
          </div>

          <?php foreach ($facultyBos as $fItem): ?>
          <article class="bos-item-card">
            <div style="max-width: 520px;">
              <span class="bos-item-badge"><?= htmlspecialchars($fItem['badge_text'] ?: 'FACULTY BOS') ?></span>
              <h3 class="bos-item-title"><?= htmlspecialchars($fItem['title']) ?></h3>
              <p class="bos-item-desc"><?= htmlspecialchars($fItem['text_val']) ?></p>
            </div>
            <div>
              <a href="<?= htmlspecialchars(!empty($fItem['link_url']) ? $fItem['link_url'] : '#') ?>" target="_blank" class="bos-pdf-btn">
                <span>📄 View Document</span> <span>↗</span>
              </a>
            </div>
          </article>
          <?php endforeach; ?>

          <!-- SECTION 2: FACULTY OF SOCIAL SCIENCE SYLLABUS & REGULATIONS -->
          <?php if (!empty($socialBos)): ?>
          <div style="margin-top:48px;margin-bottom:24px;">
            <span class="rk-eyebrow tone-gold">Curriculum &amp; Course Regulations</span>
            <h2 class="rk-h2" style="font-size:28px;margin-top:6px;">Board of Studies — Faculty of Social Science Regulations</h2>
          </div>

          <?php foreach ($socialBos as $sItem): ?>
          <article class="bos-item-card">
            <div style="max-width: 520px;">
              <span class="bos-item-badge" style="background:rgba(227,27,35,0.1);color:#E31B23;"><?= htmlspecialchars($sItem['badge_text'] ?: 'SYLLABUS & REGULATION') ?></span>
              <h3 class="bos-item-title"><?= htmlspecialchars($sItem['title']) ?></h3>
              <p class="bos-item-desc"><?= htmlspecialchars($sItem['text_val']) ?></p>
            </div>
            <div>
              <a href="<?= htmlspecialchars(!empty($sItem['link_url']) ? $sItem['link_url'] : '#') ?>" target="_blank" class="bos-pdf-btn">
                <span>📄 Open PDF</span> <span>↗</span>
              </a>
            </div>
          </article>
          <?php endforeach; ?>
          <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Statutory Governance</h4>
            <ul class="sidebar-nav-list">
              <li><a href="BOS.php" class="sidebar-link active"><span>Board of Studies (BOS)</span> <span>↗</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link"><span>Academic Council</span> <span>↗</span></a></li>
              <li><a href="BoM.php" class="sidebar-link"><span>Board of Management (BoM)</span> <span>↗</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link"><span>Statutory Bodies</span> <span>↗</span></a></li>
              <li><a href="Chancellor.php" class="sidebar-link"><span>Chancellor's Desk</span> <span>↗</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link"><span>Vice-Chancellor's Desk</span> <span>↗</span></a></li>
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