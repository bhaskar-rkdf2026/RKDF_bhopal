<?php
// ============================================================
// RKDF University — R&D Sponsored Research & Innovation Portal (100% Dynamic CMS)
// World-Class Premium Design + Official Research PDF Downloads + Video Demonstration
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = isset($_GET['slug']) && !empty($_GET['slug']) ? trim($_GET['slug']) : 'rnd-projects';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'RESEARCH & DEVELOPMENT · SPONSORED PROJECTS';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'R&D Sponsored Research Projects & Innovation';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Government funded research projects (DST, AICTE, ISRO, CSIR), innovation labs, patents, and technology transfer initiatives.';

$defaultMessage = "The Research & Development (R&D) Cell at RKDF University Bhopal leads groundbreaking interdisciplinary research sponsored by premier national funding agencies including DST (Department of Science & Technology), AICTE, ISRO, CSIR, and ICAR.\n\nOur research ecosystem spans advanced carbon capture technology plants, solar energy systems, pharmaceutical formulations, agricultural biotechnology, and AI-driven engineering innovations.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Ongoing & Completed Research Projects";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedRP = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'Sponsored Research Documents & Grants';
    $groupedRP[$gName][] = $it;
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
    .rp-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .rp-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .rp-grid-layout { grid-template-columns: 1fr; } }

    .rp-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .rp-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .rp-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* Funding Agency Badges */
    .rp-agency-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-top: 24px;
    }
    .rp-agency-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 12px;
      padding: 16px 20px;
      text-align: center;
    }
    .rp-agency-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #E31B23;
    }
    .rp-agency-label {
      font-size: 12.5px;
      color: #64748B;
      margin-top: 4px;
    }

    .rp-group-box { margin-bottom: 36px; }
    .rp-group-title {
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

    .rp-card-row {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 30px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .rp-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .rp-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.12);
      color: #E31B23;
      margin-bottom: 6px;
    }

    .rp-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .rp-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .rp-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
      white-space: nowrap;
    }
    .rp-pdf-btn:hover { background: #E31B23; transform: translateX(3px); color: #ffffff !important; }

    aside { position: sticky; top: 100px; }
    .sidebar-card { background: #ffffff; border: 1px solid rgba(12, 20, 36, 0.08); border-radius: 18px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04); }
    .sidebar-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; padding-bottom: 14px; border-bottom: 2px solid #E31B23; margin-bottom: 20px; }
    .sidebar-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
    .sidebar-link { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 8px; color: #334155; font-size: 13.5px; font-weight: 600; text-decoration: none; background: #FAF9F5; border: 1px solid rgba(12, 20, 36, 0.05); transition: all 0.25s ease; }
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
  <main class="rp-main-section">
    <div class="rk-container">
      <div class="rp-grid-layout">
        
        <!-- LEFT COLUMN: R&D PROJECTS & DOCUMENTS -->
        <div>
          
          <div class="rp-intro-card">
            <h2 class="rp-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="rp-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- FUNDING AGENCIES GRID -->
            <div class="rp-agency-grid">
              <div class="rp-agency-box">
                <div class="rp-agency-tag">DST FUNDED</div>
                <div class="rp-agency-label">Dept. of Science &amp; Tech</div>
              </div>
              <div class="rp-agency-box">
                <div class="rp-agency-tag">AICTE GRANTS</div>
                <div class="rp-agency-label">MODROBS &amp; RPS Scheme</div>
              </div>
              <div class="rp-agency-box">
                <div class="rp-agency-tag">ISRO &amp; CSIR</div>
                <div class="rp-agency-label">Space &amp; Industrial Labs</div>
              </div>
            </div>

          </div>

          <!-- RENDER GROUPED RESEARCH ITEMS -->
          <?php foreach ($groupedRP as $gTitle => $rList): ?>
          <div class="rp-group-box">
            <div class="rp-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($rList) ?> RESEARCH RESOURCES
              </span>
            </div>

            <?php foreach ($rList as $item): ?>
            <article class="rp-card-row">
              <div style="max-width:520px;">
                <span class="rp-badge"><?= htmlspecialchars($item['badge_text'] ?: 'RESEARCH FILE') ?></span>
                <h3 class="rp-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="rp-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : '#') ?>" target="_blank" class="rp-pdf-btn">
                  <span>📄 Access Resource</span> <span>↗</span>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: R&D SIDEBAR NAVIGATION -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">R&amp;D Navigation</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=rnd-projects" class="sidebar-link <?= $pageSlug === 'rnd-projects' ? 'active' : '' ?>"><span>R&amp;D Projects List</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=rnd-glance" class="sidebar-link <?= $pageSlug === 'rnd-glance' ? 'active' : '' ?>"><span>Projects At A Glance</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=journals" class="sidebar-link <?= $pageSlug === 'journals' ? 'active' : '' ?>"><span>Shodh Sangam Journals</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=rnd-presentation" class="sidebar-link <?= $pageSlug === 'rnd-presentation' ? 'active' : '' ?>"><span>R&amp;D Presentation</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=rnd-formats" class="sidebar-link <?= $pageSlug === 'rnd-formats' ? 'active' : '' ?>"><span>Download R&amp;D Formats</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=funding-agencies" class="sidebar-link <?= $pageSlug === 'funding-agencies' ? 'active' : '' ?>"><span>Funding Agencies</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=publications" class="sidebar-link <?= $pageSlug === 'publications' ? 'active' : '' ?>"><span>Faculty Publications</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=mou-list" class="sidebar-link <?= $pageSlug === 'mou-list' ? 'active' : '' ?>"><span>List of MoUs</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=patents" class="sidebar-link <?= $pageSlug === 'patents' ? 'active' : '' ?>"><span>University Patents</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=conferences" class="sidebar-link <?= $pageSlug === 'conferences' ? 'active' : '' ?>"><span>Industrial Visits &amp; Conf</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=rnd-videos" class="sidebar-link <?= $pageSlug === 'rnd-videos' ? 'active' : '' ?>"><span>R&amp;D Video Demos</span> <span>↗</span></a></li>
              <li><a href="r&d.php" class="sidebar-link"><span>R&amp;D Cell Home</span> <span>↗</span></a></li>
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
