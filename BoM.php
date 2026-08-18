<?php
// ============================================================
// RKDF University — Board of Management (100% Dynamic CMS)
// Original Custom Design & Layout 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'bom';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '16 · STATUTORY GOVERNANCE';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Board of Management (BoM)';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official Board of Management constituted under Statute 10 (Order No. 1694 /RKDF/2022) of RKDF University Bhopal.';

$defaultMessage = "As per Provision in RKDF University, Bhopal Statute 10 regarding Constitution of Board of Management & after getting nomination from Sponsoring Society of Ayushmati Education & Social Society and obtaining nomination under Statute 10 (sub-clause IV & V) by competent authority, the Board of Management of RKDF University Bhopal is constituted under Order No. 1694 /RKDF/2022.\n\nThe Board of Management is the principal executive organ responsible for administrative governance, academic appointments, financial oversight, and infrastructure development of the University.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Constitution of Board of Management";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;
$pdfMemberDoc = "Content/Documents/board_of_management/Board of Management Member.pdf";

// Separate members from other document items
$membersList = [];
$otherItems  = [];

foreach ($allItems as $it) {
    if ($it['group_key'] === 'members') {
        $membersList[] = $it;
    } else {
        $otherItems[] = $it;
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-library.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .bom-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .bom-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .bom-grid-layout { grid-template-columns: 1fr; } }

    .bom-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 4px solid #C5A059;
    }
    .bom-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 12px; }
    .bom-intro-text { font-size: 16.5px; line-height: 1.8; color: #334155; margin: 0; }

    .bom-order-meta {
      display: flex;
      gap: 24px;
      margin-top: 18px;
      padding-top: 18px;
      border-top: 1px dashed rgba(12,20,36,0.12);
      flex-wrap: wrap;
    }
    .bom-order-chip {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #0C1424;
      background: #FAF9F5;
      padding: 6px 14px;
      border-radius: 8px;
      border: 1px solid rgba(12,20,36,0.08);
    }

    .bom-featured-card {
      background: linear-gradient(135deg, #0C1424 0%, #152238 100%);
      color: #FAF9F5;
      border-radius: 20px;
      padding: 32px 36px;
      margin-bottom: 36px;
      box-shadow: 0 12px 36px rgba(12, 20, 36, 0.15);
      border-left: 5px solid #C5A059;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .bom-featured-title { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #ffffff; margin-bottom: 6px; }
    .bom-featured-desc { font-size: 14.5px; color: rgba(250,249,245,0.85); margin: 0; line-height: 1.6; max-width: 520px; }

    /* MEMBERS TABLE STYLE */
    .bom-table-container {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 48px;
    }
    .bom-table-header {
      background: #0C1424;
      color: #ffffff;
      padding: 22px 28px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #C5A059;
    }
    .bom-table-title { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #ffffff; margin: 0; }
    
    .bom-table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }
    .bom-table th {
      background: #FAF9F5;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: #0C1424;
      padding: 16px 24px;
      border-bottom: 2px solid rgba(12,20,36,0.08);
    }
    .bom-table td {
      padding: 18px 24px;
      border-bottom: 1px solid rgba(12,20,36,0.06);
      font-size: 15px;
      color: #334155;
      vertical-align: middle;
    }
    .bom-table tr:hover td { background: rgba(197, 160, 89, 0.04); }

    .bom-member-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
    }
    .bom-member-badge-chair {
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
    }

    .bom-item-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 28px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .bom-item-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #C5A059;
    }

    .bom-item-badge {
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
      margin-bottom: 8px;
    }

    .bom-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .bom-item-desc { font-size: 14.5px; color: #475569; margin: 0; line-height: 1.6; }

    .bom-pdf-btn {
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
    }
    .bom-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }
    .bom-pdf-btn-gold { background: #C5A059; color: #0C1424; }
    .bom-pdf-btn-gold:hover { background: #ffffff; color: #0C1424; }

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
  <main class="bom-main-section">
    <div class="rk-container">
      <div class="bom-grid-layout">
        
        <!-- LEFT COLUMN: BOM MEMBERS TABLE & DETAILS -->
        <div>
          
          <!-- INTRO & GAZETTE ORDER NOTICE CARD -->
          <div class="bom-intro-card">
            <h2 class="bom-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="bom-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
            
            <div class="bom-order-meta">
              <span class="bom-order-chip">📌 Order No: 1694 /RKDF/2022</span>
              <span class="bom-order-chip">📅 Order Date: 10/10/2022</span>
              <span class="bom-order-chip">📜 Statute: RKDF Statute 10</span>
            </div>
          </div>

          <!-- FEATURED OFFICIAL GAZETTE PDF DOWNLOAD CARD -->
          <div class="bom-featured-card">
            <div>
              <span style="font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;background:rgba(197,160,89,0.25);color:#C5A059;padding:4px 12px;border-radius:99px;display:inline-block;margin-bottom:10px;">
                OFFICIAL STATUTORY GAZETTE
              </span>
              <h2 class="bom-featured-title">Board of Management Member Gazette (PDF)</h2>
              <p class="bom-featured-desc">
                Official signed gazette notification of the Board of Management issued by the Chancellor under Statute 10.
              </p>
            </div>
            <div>
              <a href="<?= htmlspecialchars($pdfMemberDoc) ?>" target="_blank" class="bom-pdf-btn bom-pdf-btn-gold">
                <span>📄 View Original PDF</span> <span>↗</span>
              </a>
            </div>
          </div>

          <!-- DYNAMIC BOARD OF MANAGEMENT MEMBERS TABLE -->
          <div class="bom-table-container">
            <div class="bom-table-header">
              <h2 class="bom-table-title">Board of Management Constituted Members</h2>
              <span style="font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;background:rgba(197,160,89,0.2);color:#C5A059;padding:4px 12px;border-radius:99px;">STATUTE 10</span>
            </div>
            
            <div style="overflow-x:auto;">
              <table class="bom-table">
                <thead>
                  <tr>
                    <th style="width:70px;">S.No.</th>
                    <th>Name of Member</th>
                    <th>Designation / Nominee Capacity</th>
                    <th>Capacity / Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($membersList as $index => $m): ?>
                  <tr>
                    <td style="font-family:'JetBrains Mono',monospace;font-weight:700;color:#0C1424;">
                      <?= sprintf('%02d', $index + 1) ?>
                    </td>
                    <td>
                      <strong style="font-family:'Playfair Display',Georgia,serif;font-size:17px;color:#0C1424;"><?= htmlspecialchars($m['title']) ?></strong>
                      <?php if (!empty($m['text_val'])): ?>
                      <div style="font-size:13.5px;color:#64748B;margin-top:2px;"><?= htmlspecialchars($m['text_val']) ?></div>
                      <?php endif; ?>
                    </td>
                    <td style="font-size:14.5px;font-weight:600;color:#334155;">
                      <?= htmlspecialchars($m['subtitle']) ?>
                    </td>
                    <td>
                      <span class="bom-member-badge <?= ($m['badge_text'] === 'CHAIRMAN') ? 'bom-member-badge-chair' : '' ?>">
                        <?= htmlspecialchars($m['badge_text']) ?>
                      </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <?php if (!empty($otherItems)): ?>
          <div style="margin-bottom:24px;">
            <span class="rk-eyebrow tone-gold">Official Notifications &amp; Gazette Documents</span>
            <h2 class="rk-h2" style="font-size:28px;margin-top:6px;">BoM Documents &amp; Board of Studies</h2>
          </div>

          <?php foreach ($otherItems as $item): ?>
          <article class="bom-item-card">
            <div style="max-width: 520px;">
              <span class="bom-item-badge"><?= htmlspecialchars($item['badge_text'] ?: 'STATUTORY GAZETTE') ?></span>
              <h3 class="bom-item-title"><?= htmlspecialchars($item['title']) ?></h3>
              <p class="bom-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
            </div>
            <div>
              <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : $pdfMemberDoc) ?>" target="_blank" class="bom-pdf-btn">
                <span>📄 Open Document</span> <span>↗</span>
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
              <li><a href="Governingbody.php" class="sidebar-link"><span>Governing Body</span> <span>↗</span></a></li>
              <li><a href="BoM.php" class="sidebar-link active"><span>Board of Management (BoM)</span> <span>↗</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link"><span>Academic Council</span> <span>↗</span></a></li>
              <li><a href="BOS.php" class="sidebar-link"><span>Board of Studies (BOS)</span> <span>↗</span></a></li>
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