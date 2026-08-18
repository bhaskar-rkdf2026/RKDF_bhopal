<?php
// ============================================================
// RKDF University — Modern Careers & Recruitment Page
// 100% Dynamic CMS Integration (Connected to admin/manage_pages.php?slug=careers)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageSlug = 'careers';
$pdo = getDbConnection();

// Fetch dynamic page header content from site_pages table
$stmtPage = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmtPage->execute([$pageSlug]);
$pageData = $stmtPage->fetch();

// Default Fallbacks
$eyebrow       = $pageData['eyebrow'] ?? 'CAREERS · RKDF UNIVERSITY BHOPAL';
$pageTitle     = $pageData['page_title'] ?? 'Careers & Academic Recruitment';
$heroSubtitle  = $pageData['hero_subtitle'] ?? 'Join the academic and research faculty at RKDF University Bhopal. Explore current walk-in interviews, research project fellowships, and faculty openings.';
$heroBgImage   = !empty($pageData['hero_bg_image']) ? $pageData['hero_bg_image'] : 'images/lovable/rkdf-campus-hero.jpg';
$introHeading  = $pageData['intro_heading'] ?? 'Current Openings & Walk-In Interviews';
$introText     = $pageData['intro_text'] ?? 'RKDF University invites applications from dynamic, qualified scholars and faculty for teaching and research positions across diverse faculties including Agriculture, Engineering, Science, Law, Management, Ayurveda, and Homeopathy.';

// Fetch dynamic section items grouped by group_key
$stmtItems = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order ASC, id ASC");
$stmtItems->execute([$pageSlug]);
$allItems = $stmtItems->fetchAll();

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$openingItems = $groupedItems['openings'] ?? [];

$formMsg = '';
$formErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_career'])) {
    $reqId        = 'CAR' . date('Y') . rand(10000, 99999);
    $name         = trim($_POST['applicant_name'] ?? '');
    $email        = trim($_POST['email_id'] ?? '');
    $mobile       = trim($_POST['mobile_no'] ?? '');
    $postApplied  = trim($_POST['post_applied'] ?? '');
    $department   = trim($_POST['department'] ?? '');
    $qual         = trim($_POST['qualification'] ?? '');
    $exp          = trim($_POST['experience_years'] ?? '');

    if (!empty($name) && !empty($mobile) && !empty($postApplied)) {
        if ($pdo) {
            try {
                $stmtCar = $pdo->prepare("INSERT INTO career_applications (req_id, applicant_name, email_id, mobile_no, post_applied, department, qualification, experience_years, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'RECEIVED')");
                $stmtCar->execute([$reqId, $name, $email, $mobile, $postApplied, $department, $qual, $exp]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "Application Submitted Successfully! Your Reference ID is {$reqId}.";
    } else {
        $formErr = "Please enter your name, mobile number, and position applied for.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> — RKDF University Bhopal</title>
  <meta name="description" content="<?= htmlspecialchars(strip_tags($heroSubtitle)) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css?v=<?= time() ?>">
  <link rel="stylesheet" href="css/rkdf-navbar.css?v=<?= time() ?>">
  
  <style>
    /* ── Subpage Hero Section ── */
    .careers-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.92) 0%, rgba(21,34,56,0.88) 60%, rgba(12,20,36,0.95) 100%), 
                  url('<?= htmlspecialchars($heroBgImage) ?>') center/cover no-repeat;
      color: #ffffff;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .careers-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.15em;
      color: #C5A059;
      text-transform: uppercase;
      display: inline-block;
      margin-bottom: 12px;
    }
    .careers-hero-title {
      font-family: 'Instrument Serif', Georgia, serif;
      font-size: clamp(2.6rem, 5vw, 4.5rem);
      font-weight: 400;
      line-height: 1.1;
      color: #ffffff;
      margin-bottom: 16px;
    }
    .careers-hero-sub {
      font-size: 17px;
      max-width: 780px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
    }

    /* ── Main Layout Container ── */
    .careers-section {
      padding: 60px 0 90px;
      background: #fafafa;
      color: #1e293b;
    }
    .careers-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px;
    }
    @media (min-width: 1024px) {
      .careers-grid {
        grid-template-columns: 1fr 340px;
      }
    }

    /* ── Main Section Cards ── */
    .careers-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
    }
    .section-heading-sm {
      font-size: 22px;
      font-weight: 800;
      color: #0C1424;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .section-heading-sm::before {
      content: '';
      display: inline-block;
      width: 4px;
      height: 20px;
      background: #E31B23;
      border-radius: 2px;
    }

    /* ── Job Openings Notification List ── */
    .jobs-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .job-item-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 20px 24px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      transition: all 0.25s ease;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    @media (min-width: 640px) {
      .job-item-card {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }
    }
    .job-item-card:hover {
      border-color: #E31B23;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(12,20,36,0.08);
    }
    .job-info-col {
      flex: 1;
    }
    .job-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10.5px;
      font-weight: 700;
      color: #E31B23;
      background: rgba(227,27,35,0.08);
      padding: 3px 10px;
      border-radius: 99px;
      display: inline-block;
      margin-bottom: 8px;
    }
    .job-title-text {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
      margin-bottom: 4px;
    }
    .job-sub-text {
      font-size: 13px;
      color: #64748b;
    }
    .job-action-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 9px 18px;
      background: #0C1424;
      color: #ffffff !important;
      text-decoration: none !important;
      font-size: 13px;
      font-weight: 700;
      border-radius: 6px;
      transition: background 0.25s ease;
      white-space: nowrap;
    }
    .job-action-btn:hover {
      background: #E31B23;
    }

    /* How to Apply Card */
    .apply-instructions-box {
      background: linear-gradient(135deg, rgba(227,27,35,0.04) 0%, rgba(12,20,36,0.04) 100%);
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 24px;
      margin-top: 24px;
    }
    .apply-instructions-box h4 {
      font-size: 17px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 8px;
    }

    /* Sidebar Cards */
    .sidebar-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 24px;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      margin-bottom: 24px;
    }
    .sidebar-card-title {
      font-size: 17px;
      font-weight: 800;
      color: #0C1424;
      padding-bottom: 12px;
      border-bottom: 2px solid #E31B23;
      margin-bottom: 18px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .sidebar-link-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      color: #0C1424;
      text-decoration: none !important;
      font-size: 13.5px;
      font-weight: 600;
      margin-bottom: 10px;
      transition: all 0.25s ease;
    }
    .sidebar-link-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
      border-color: #E31B23;
      transform: translateX(3px);
    }
  </style>
</head>
<body>

  <!-- APPROVED HEADER & NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC SUBPAGE HERO SECTION -->
  <section class="careers-hero">
    <div class="rk-container">
      <span class="careers-eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="careers-hero-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <p class="careers-hero-sub"><?= htmlspecialchars($heroSubtitle) ?></p>
    </div>
  </section>

  <!-- MAIN CAREERS CONTENT SECTION -->
  <section class="careers-section">
    <div class="rk-container">
      <div class="careers-grid">

        <!-- LEFT COLUMN: JOB NOTIFICATIONS LIST -->
        <div class="careers-left">

          <!-- Overview & Job Notifications Card -->
          <div class="careers-card">
            <h2 class="section-heading-sm"><?= htmlspecialchars($introHeading) ?></h2>
            <p style="font-size:15px;line-height:1.7;color:#334155;margin-bottom:24px;"><?= nl2br(htmlspecialchars($introText)) ?></p>

            <div class="jobs-list">
              <?php if (!empty($openingItems)): ?>
                <?php foreach ($openingItems as $job): ?>
                  <div class="job-item-card">
                    <div class="job-info-col">
                      <span class="job-badge"><?= htmlspecialchars($job['badge_text'] ?: 'RECRUITMENT') ?></span>
                      <div class="job-title-text"><?= htmlspecialchars($job['title']) ?></div>
                      <?php if (!empty($job['subtitle'])): ?>
                        <div class="job-sub-text"><?= htmlspecialchars($job['subtitle']) ?></div>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($job['link_url'])): ?>
                      <a href="<?= htmlspecialchars($job['link_url']) ?>" target="_blank" class="job-action-btn">
                        <span>Apply / View PDF</span>
                        <span>↗</span>
                      </a>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <!-- Default Baseline Job Notifications -->
                <div class="job-item-card">
                  <div class="job-info-col">
                    <span class="job-badge">WALK-IN · 04 MAY 2026</span>
                    <div class="job-title-text">Project Fellow – Precision Farming &amp; Sustainable Agriculture</div>
                    <div class="job-sub-text">Walk-in Interview @ RKDF University, Bhopal</div>
                  </div>
                  <a href="Content/Documents/Careers_22_May_2026/MPCST Project Position.pdf" target="_blank" class="job-action-btn">
                    <span>Apply / View PDF</span>
                    <span>↗</span>
                  </a>
                </div>
                <div class="job-item-card">
                  <div class="job-info-col">
                    <span class="job-badge">PROJECT FELLOW</span>
                    <div class="job-title-text">Walk-in Interview for MPCST Sponsored Project Positions</div>
                    <div class="job-sub-text">JRF Position 30-April-2026 @ RKDF University, Bhopal</div>
                  </div>
                  <a href="Content/Documents/Careers_30April2026/JRF MPCST Project Position.pdf" target="_blank" class="job-action-btn">
                    <span>Apply / View PDF</span>
                    <span>↗</span>
                  </a>
                </div>
                <div class="job-item-card">
                  <div class="job-info-col">
                    <span class="job-badge">FACULTY POSITIONS</span>
                    <div class="job-title-text">Various Faculty Positions in Agriculture, Science, Law, Management &amp; Ayurveda</div>
                    <div class="job-sub-text">Professor, Associate Professor &amp; Assistant Professor Requirements</div>
                  </div>
                  <a href="circular/Faculity Requirement by 26-May-2025.pdf" target="_blank" class="job-action-btn">
                    <span>Apply / View PDF</span>
                    <span>↗</span>
                  </a>
                </div>
              <?php endif; ?>
            </div>

            <!-- Application Instructions Box -->
            <div class="apply-instructions-box">
              <h4>📧 How to Apply for Faculty &amp; Staff Positions</h4>
              <p style="font-size:14px;color:#475569;line-height:1.6;margin-top:6px;">
                Interested candidates may submit their updated CV along with copies of academic testimonials, research publications, and passport-size photographs to <strong>career@rkdf.ac.in</strong> or <strong>info@rkdf.ac.in</strong> mentioning the post applied for in the subject line.
              </p>
            </div>
          </div>

        </div><!-- /careers-left -->

          <!-- Online Job Application Form Card -->
          <div class="sidebar-card" style="margin-bottom:24px;">
            <h3 class="sidebar-card-title">Apply Online for Job</h3>
            
            <?php if (!empty($formMsg)): ?>
            <div style="background:#dcfce7;color:#166534;padding:12px 14px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:16px;">
              <?= htmlspecialchars($formMsg) ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($formErr)): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:12px 14px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:16px;">
              <?= htmlspecialchars($formErr) ?>
            </div>
            <?php endif; ?>

            <form method="post" action="Careers.php">
              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Full Name *</label>
                <input type="text" name="applicant_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" required placeholder="YOUR FULL NAME" />
              </div>

              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Email Address</label>
                <input type="email" name="email_id" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" placeholder="YOUR EMAIL ADDRESS" />
              </div>

              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Mobile Number *</label>
                <input type="text" name="mobile_no" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" required placeholder="10-DIGIT MOBILE NUMBER" />
              </div>

              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Position Applied For *</label>
                <input type="text" name="post_applied" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" required placeholder="e.g. Assistant Professor, JRF" />
              </div>

              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Department / Discipline</label>
                <input type="text" name="department" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" placeholder="e.g. Agriculture, Computer Science" />
              </div>

              <div style="margin-bottom:12px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Highest Qualification</label>
                <input type="text" name="qualification" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" placeholder="e.g. Ph.D, M.Tech, M.Sc" />
              </div>

              <div style="margin-bottom:16px;">
                <label style="display:block;font-size:12.5px;font-weight:700;color:#0C1424;margin-bottom:4px;">Experience (Years)</label>
                <input type="text" name="experience_years" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13.5px;box-sizing:border-box;" placeholder="e.g. 3 Years" />
              </div>

              <button type="submit" name="apply_career" style="width:100%;background:#0C1424;color:#ffffff;border:none;padding:12px;border-radius:8px;font-weight:700;font-size:14px;cursor:pointer;">Submit Application ↗</button>
            </form>
          </div>

          <div class="sidebar-card">
            <h3 class="sidebar-card-title">Quick Links</h3>
            <a href="index.php" class="sidebar-link-btn">
              <span>🏠 Live Site Home</span>
              <span>→</span>
            </a>
            <a href="contact-us.php" class="sidebar-link-btn">
              <span>📞 Contact HR Desk</span>
              <span>→</span>
            </a>
            <a href="images/Alumni-form.pdf" target="_blank" class="sidebar-link-btn">
              <span>📝 Alumni Registration Form</span>
              <span>PDF ↗</span>
            </a>
          </div>

          <div class="sidebar-card">
            <h3 class="sidebar-card-title">HR Contact</h3>
            <div style="font-size:14px;color:#334155;line-height:1.6;">
              <p><strong>HR &amp; Recruitment Cell</strong></p>
              <p>RKDF University, Airport Bypass Road, Gandhi Nagar, Bhopal (MP) 462033</p>
              <p style="margin-top:8px;"><strong>Email:</strong> career@rkdf.ac.in</p>
              <p><strong>Phone:</strong> +91-755-2740395</p>
            </div>
          </div>

        </div><!-- /careers-sidebar -->

      </div><!-- /careers-grid -->
    </div><!-- /rk-container -->
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
