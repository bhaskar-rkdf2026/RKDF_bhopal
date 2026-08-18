<?php
// ============================================================
// RKDF University — Library E-Resource Portal Login (100% Dynamic CMS)
// Original Custom Design & Form 100% Preserved + CMS Connected
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'eresource-login';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'CENTRAL LIBRARY · DIGITAL RESOURCES';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Library E-Resource Portal Login';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : '24/7 Portal access to national e-learning repositories, research databases, and e-journals for RKDF students.';

$defaultMessage = "RKDF University Central Library provides 24/7 access to digital e-resources, research databases, national e-learning portals, and international open-access repositories for all registered students, researchers, and faculty members.\n\nPlease enter your Enrollment Number below to verify your student identity and unlock full access to SWAYAM, Shodhganga, NDL, DELNET, NPTEL, ScienceDirect, and global university repositories.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Student Identity & E-Resource Access Portal";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;
$todayDate    = date("Y-m-d");
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
    .er-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .er-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .er-grid-layout { grid-template-columns: 1fr; } }

    .er-login-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 32px rgba(12, 20, 36, 0.06);
      margin-bottom: 36px;
    }
    .er-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #E31B23;
    }
    .er-card-title { font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 700; color: #ffffff; margin: 0; }

    .er-login-form { padding: 36px 32px; }

    .er-form-group { margin-bottom: 24px; }
    .er-form-label {
      display: block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #0C1424;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 8px;
    }
    .er-input-text {
      width: 100%;
      padding: 14px 18px;
      border: 2px solid rgba(12, 20, 36, 0.12);
      border-radius: 10px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      color: #0C1424;
      background: #FAF9F5;
      transition: border-color 0.25s ease, box-shadow 0.25s ease;
      text-transform: uppercase;
    }
    .er-input-text:focus {
      outline: none;
      border-color: #E31B23;
      box-shadow: 0 0 0 4px rgba(227, 27, 35, 0.12);
      background: #ffffff;
    }

    .er-submit-btn {
      width: 100%;
      background: #E31B23;
      color: #ffffff;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      font-weight: 700;
      padding: 16px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
      box-shadow: 0 4px 16px rgba(227, 27, 35, 0.25);
    }
    .er-submit-btn:hover {
      background: #0C1424;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.3);
    }

    .er-portal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .er-portal-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.25s ease, border-color 0.25s ease;
    }
    .er-portal-card:hover {
      transform: translateY(-4px);
      border-color: #C5A059;
    }

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
  <main class="er-main-section">
    <div class="rk-container">
      <div class="er-grid-layout">
        
        <!-- LEFT COLUMN: LOGIN FORM & FEATURED PORTALS -->
        <div>
          
          <!-- E-RESOURCE LOGIN CARD -->
          <article class="er-login-card">
            <div class="er-card-header">
              <h2 class="er-card-title"><?= htmlspecialchars($introHeading) ?></h2>
              <span style="font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;background:rgba(227,27,35,0.25);color:#ffffff;padding:4px 12px;border-radius:99px;">
                SECURE AUTH
              </span>
            </div>
            
            <div class="er-login-form">
              <p style="font-size:15.5px;line-height:1.7;color:#475569;margin-bottom:28px;">
                <?= nl2br(htmlspecialchars($introText)) ?>
              </p>

              <!-- SUBMIT TO E_RESOURCES.PHP -->
              <form method="post" action="e_resources.php">
                <div class="er-form-group">
                  <label class="er-form-label" for="rollno">Enter Enrollment No. / Student ID *</label>
                  <input type="text" id="rollno" name="rollno" class="er-input-text" placeholder="e.g. RKDF2024CS001" required oninput="this.value = this.value.toUpperCase()">
                </div>

                <div class="er-form-group">
                  <label class="er-form-label" for="date">Access Date</label>
                  <input type="text" id="date" name="date" class="er-input-text" value="<?= htmlspecialchars($todayDate) ?>" readonly style="background:#f1f5f9;color:#64748b;">
                </div>

                <button type="submit" name="Submit" class="er-submit-btn">
                  🔓 ACCESS LIBRARY E-RESOURCES PORTAL →
                </button>
              </form>
            </div>
          </article>

          <!-- FEATURED E-RESOURCE REPOSITORIES PREVIEW -->
          <?php if (!empty($allItems)): ?>
          <div style="margin-top:40px;margin-bottom:20px;">
            <span class="rk-eyebrow tone-gold">Digital Knowledge Gateway</span>
            <h2 class="rk-h2" style="font-size:26px;margin-top:4px;">Available E-Resource Repositories</h2>
          </div>

          <div class="er-portal-grid">
            <?php foreach ($allItems as $portal): ?>
            <div class="er-portal-card">
              <div>
                <span style="font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;background:rgba(197,160,89,0.18);color:#C5A059;padding:3px 10px;border-radius:99px;display:inline-block;margin-bottom:8px;">
                  <?= htmlspecialchars($portal['badge_text'] ?: 'DIGITAL RESOURCE') ?>
                </span>
                <h3 style="font-family:'Playfair Display',Georgia,serif;font-size:17px;font-weight:700;color:#0C1424;margin:4px 0;"><?= htmlspecialchars($portal['title']) ?></h3>
                <p style="font-size:13.5px;color:#64748B;margin:0 0 12px 0;line-height:1.5;"><?= htmlspecialchars($portal['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($portal['link_url']) ? $portal['link_url'] : '#') ?>" target="_blank" style="font-size:13px;font-weight:700;color:#E31B23;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">
                  <span>Direct Portal Link</span> <span>↗</span>
                </a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Central Library Services</h4>
            <ul class="sidebar-nav-list">
              <li><a href="eresourse_login.php" class="sidebar-link active"><span>E-Resource Portal Login</span> <span>↗</span></a></li>
              <li><a href="Library.php" class="sidebar-link"><span>Library &amp; Info Science</span> <span>↗</span></a></li>
              <li><a href="e_resources.php" class="sidebar-link"><span>Digital Repositories</span> <span>↗</span></a></li>
              <li><a href="research-cell.php" class="sidebar-link"><span>Research Cell</span> <span>↗</span></a></li>
              <li><a href="Academic_Council.php" class="sidebar-link"><span>Academic Council</span> <span>↗</span></a></li>
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
