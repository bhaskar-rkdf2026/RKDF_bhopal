<?php
// ============================================================
// RKDF University — Examination Notices & Alerts Portal
// World-Class Premium Design + High-Res Media Assets + 100% Original PDF & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'exam-notice';

$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · NOTICES';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Examination Notices & Schedule';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Latest official notifications, semester exam guidelines, admit card download links, and evaluation policies.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-building-enhanced.jpg';

$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
$itemStmt->execute([$pageSlug]);
$allItems = $itemStmt->fetchAll();
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
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sexam-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sexam-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sexam-grid-layout { grid-template-columns: 1fr; }
    }

    .sexam-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sexam-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sexam-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #E31B23;
    }

    .sexam-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.15);
      color: #E31B23;
      border: 1px solid rgba(227, 27, 35, 0.3);
    }

    .sexam-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sexam-card-body {
      padding: 32px 36px;
    }

    .sexam-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sexam-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sexam-block-card:hover .sexam-media-img {
      transform: scale(1.04);
    }

    /* Notice Rows */
    .sexam-notice-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
      margin-bottom: 36px;
    }

    .sexam-notice-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 14px;
      transition: all 0.25s ease;
    }
    .sexam-notice-row:hover {
      background: #ffffff;
      border-color: #E31B23;
      transform: translateX(4px);
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.06);
    }

    .sexam-row-left {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .sexam-new-pill {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 6px;
      background: #E31B23;
      color: #ffffff;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.6; }
      100% { opacity: 1; }
    }

    .sexam-notice-title {
      font-size: 15.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .sexam-pdf-btn {
      font-size: 12.5px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 8px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .sexam-pdf-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    /* Quick Action Portals Grid */
    .sexam-portal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
      margin-top: 24px;
    }

    .sexam-portal-card {
      background: #FAF9F5;
      padding: 22px 20px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.07);
      text-decoration: none;
      transition: all 0.25s ease;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .sexam-portal-card:hover {
      background: #0C1424;
      border-color: #0C1424;
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(12, 20, 36, 0.12);
    }

    .sexam-portal-icon {
      font-size: 26px;
    }

    .sexam-portal-name {
      font-size: 15px;
      font-weight: 700;
      color: #0C1424;
      transition: color 0.25s ease;
    }
    .sexam-portal-card:hover .sexam-portal-name {
      color: #ffffff;
    }

    .sexam-portal-sub {
      font-size: 12.5px;
      color: #64748B;
      transition: color 0.25s ease;
    }
    .sexam-portal-card:hover .sexam-portal-sub {
      color: rgba(250, 249, 245, 0.75);
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
      <span class="rk-eyebrow tone-gold">71 · CONTROLLER OF EXAMINATIONS (COE) PORTAL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Examination Notices &amp; Alerts</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official notifications, postponed examination dates, fee circulars, timetable schedules, and online ERP results from the Controller of Examinations.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sexam-main-section">
    <div class="rk-container">
      <div class="sexam-grid-layout">
        
        <!-- LEFT COLUMN: NOTICES & PORTALS -->
        <div>

          <article class="sexam-block-card">
            <div class="sexam-card-header">
              <h2 class="sexam-card-title">Latest Examination Notifications</h2>
              <span class="sexam-badge">OFFICIAL COE ALERTS</span>
            </div>
            <div class="sexam-card-body">

              <div class="sexam-media-frame">
                <img src="images/ai_exam/rkdf_exam_card.jpg" alt="RKDF Controller of Examinations Section &amp; Evaluation Center" class="sexam-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:18px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                Active Examination Notices (Session 2026)
              </div>

              <!-- NOTICES LIST -->
              <div class="sexam-notice-list">

                <div class="sexam-notice-row">
                  <div class="sexam-row-left">
                    <span class="sexam-new-pill">NEW</span>
                    <span class="sexam-notice-title">Important Notice - Exam Postpond Notice (26-Mar-2026)</span>
                  </div>
                  <a href="exam/timetable_Feb-Mar_26/Notices/Exam%20Postpond%20Notice%2026%20Mar%202026%2014-48.pdf" target="_blank" class="sexam-pdf-link">📄 Download Notice ↗</a>
                </div>

                <div class="sexam-notice-row">
                  <div class="sexam-row-left">
                    <span class="sexam-new-pill">NEW</span>
                    <span class="sexam-notice-title">Important Notice - Revised Fee Notice</span>
                  </div>
                  <a href="Content/Documents/Notices-26/revised%20fee%20notice.pdf" target="_blank" class="sexam-pdf-link">📄 Download Notice ↗</a>
                </div>

                <div class="sexam-notice-row">
                  <div class="sexam-row-left">
                    <span class="sexam-new-pill">NEW</span>
                    <span class="sexam-notice-title">Important Notice - EXAM POSTPONED FEB-2026</span>
                  </div>
                  <a href="exam/timetable_Feb-Mar_26/Notices/EXAM%20POSTPONED%20FEB-2026.pdf" target="_blank" class="sexam-pdf-link">📄 Download Notice ↗</a>
                </div>

                <div class="sexam-notice-row">
                  <div class="sexam-row-left">
                    <span class="sexam-new-pill">NEW</span>
                    <span class="sexam-notice-title">Examination &amp; Semester Fees Notice</span>
                  </div>
                  <a href="exam/timetable_Feb-Mar_26/Notices/Fees_Notice_02-04-2026_17.42.pdf" target="_blank" class="sexam-pdf-link">📄 Download Notice ↗</a>
                </div>

              </div>

              <!-- QUICK PORTALS GRID -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:18px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                Examination Quick Services
              </div>

              <div class="sexam-portal-grid">
                <a href="examtimetable.php" class="sexam-portal-card">
                  <span class="sexam-portal-icon">📅</span>
                  <span class="sexam-portal-name">Exam Time Table</span>
                  <span class="sexam-portal-sub">View semester timetable schedules</span>
                </a>

                <a href="Result.php" class="sexam-portal-card">
                  <span class="sexam-portal-icon">🎓</span>
                  <span class="sexam-portal-name">Online Results</span>
                  <span class="sexam-portal-sub">Check semester exam marksheets</span>
                </a>

                <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sexam-portal-card">
                  <span class="sexam-portal-icon">💻</span>
                  <span class="sexam-portal-name">Student ERP Login</span>
                  <span class="sexam-portal-sub">Submit exam forms &amp; fees online</span>
                </a>

                <a href="forms/Application%20For%20Hindi.pdf" target="_blank" class="sexam-portal-card">
                  <span class="sexam-portal-icon">📜</span>
                  <span class="sexam-portal-name">Degree Form (Hindi)</span>
                  <span class="sexam-portal-sub">Degree application form PDF</span>
                </a>

                <a href="forms/Application%20For%20English.pdf" target="_blank" class="sexam-portal-card">
                  <span class="sexam-portal-icon">📄</span>
                  <span class="sexam-portal-name">Degree Form (English)</span>
                  <span class="sexam-portal-sub">Degree application form PDF</span>
                </a>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Exam Alerts Menu</h3>
            <ul class="sidebar-nav-list">
              <li><a href="exam.php" class="sidebar-link active">Examination Alerts <span>→</span></a></li>
              <li><a href="examtimetable.php" class="sidebar-link">Exam Time Table <span>→</span></a></li>
              <li><a href="Result.php" class="sidebar-link">Examination Results <span>→</span></a></li>
              <li><a href="forms/Application%20For%20Hindi.pdf" target="_blank" class="sidebar-link">Degree Form (Hindi) <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20English.pdf" target="_blank" class="sidebar-link">Degree Form (English) <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link">Student ERP Portal <span>↗</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
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
