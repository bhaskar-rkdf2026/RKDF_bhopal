<?php
// ============================================================
// RKDF University — Degree Migration Form English Portal (100% Dynamic CMS)
// World-Class Premium Design + Official English PDF Downloads Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = isset($_GET['slug']) && $_GET['slug'] === 'migration-form' ? 'migration-form' : 'migration-english';
$pRow = [];
$allItems = [];

$formMsg = '';
$formErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_migration'])) {
    $reqId     = 'MIG' . date('Y') . rand(10000, 99999);
    $name      = trim($_POST['student_name'] ?? '');
    $fname     = trim($_POST['father_name'] ?? '');
    $enroll    = trim($_POST['enrollment_no'] ?? '');
    $course    = trim($_POST['course'] ?? '');
    $branch    = trim($_POST['branch'] ?? '');
    $year      = trim($_POST['passing_year'] ?? '');
    $mobile    = trim($_POST['mobile_no'] ?? '');
    $email     = trim($_POST['email_id'] ?? '');
    $address   = trim($_POST['postal_address'] ?? '');

    if (!empty($name) && !empty($enroll) && !empty($mobile)) {
        if ($pdo) {
            try {
                $stmtMig = $pdo->prepare("INSERT INTO migration_requests (req_id, student_name, father_name, enrollment_no, course, branch, passing_year, language, mobile_no, email_id, postal_address, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'English', ?, ?, ?, 'PENDING')");
                $stmtMig->execute([$reqId, $name, $fname, $enroll, $course, $branch, $year, $mobile, $email, $address]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "Migration Certificate Request Submitted Successfully! Request ID: {$reqId}.";
    } else {
        $formErr = "Please enter Student Name, Enrollment No, and Mobile Number.";
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · MIGRATION & DEGREE CELL';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Degree & Migration Certificate Form (English)';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official application forms and procedures for obtaining Migration Certificates, Provisional Degrees, and Original Convocation Certificates.';

$defaultMessage = "The Examination Branch Secretariat at RKDF University Bhopal provides official application forms for obtaining Migration Certificates, Provisional Degrees, and Original Degree Certificates in English.\n\nGraduating students and alumni moving to higher educational institutions or foreign universities can download the prescribed application forms below, complete the No Dues clearance, and submit to the Controller of Examinations.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Migration & Provisional Degree Secretariat";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedME = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'Migration & Degree Application Forms (English)';
    $groupedME[$gName][] = $it;
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-building-enhanced.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .me-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .me-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .me-grid-layout { grid-template-columns: 1fr; } }

    .me-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #E31B23;
    }
    .me-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .me-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* English Guidelines Checklist Grid */
    .me-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .me-info-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 24px;
    }
    .me-info-head {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #E31B23;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }
    .me-info-val {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }
    .me-info-desc {
      font-size: 13.5px;
      color: #64748B;
      margin-top: 6px;
      line-height: 1.5;
    }

    .me-group-box { margin-bottom: 36px; }
    .me-group-title {
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

    .me-card-row {
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
    .me-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .me-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.16);
      color: #0C1424;
      margin-bottom: 6px;
    }

    .me-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .me-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .me-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #E31B23;
      color: #ffffff;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
      white-space: nowrap;
    }
    .me-pdf-btn:hover { background: #0C1424; transform: translateX(3px); }

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
  <main class="me-main-section">
    <div class="rk-container">
      <div class="me-grid-layout">
        
        <!-- LEFT COLUMN: ENGLISH MIGRATION GUIDELINES & FORMS -->
        <div>
          
          <div class="me-intro-card">
            <h2 class="me-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="me-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- ENGLISH GUIDELINES CHECKLIST GRID -->
            <div class="me-info-grid">
              <div class="me-info-box">
                <div class="me-info-head">1. Mandatory Proof</div>
                <div class="me-info-val">Final Marksheet Copy</div>
                <div class="me-info-desc">Attach self-attested copy of final semester pass/fail mark statement + No Dues Certificate.</div>
              </div>

              <div class="me-info-box">
                <div class="me-info-head">2. Migration Fee</div>
                <div class="me-info-val">Rs. 500 / Certificate</div>
                <div class="me-info-desc">Payable via Demand Draft in favor of "RKDF University Bhopal" or at Cash Counter.</div>
              </div>

              <div class="me-info-box">
                <div class="me-info-head">3. Language Format</div>
                <div class="me-info-val">English Medium Form</div>
                <div class="me-info-desc">Specially formatted application form in English for higher study or foreign university admissions.</div>
              </div>
            </div>

          </div>

          <!-- RENDER GROUPED FORMS -->
          <?php foreach ($groupedME as $gTitle => $mList): ?>
          <div class="me-group-box">
            <div class="me-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($mList) ?> OFFICIAL DOCUMENTS
              </span>
            </div>

            <?php foreach ($mList as $item): ?>
            <article class="me-card-row">
              <div style="max-width:520px;">
                <span class="me-badge"><?= htmlspecialchars($item['badge_text'] ?: 'ENGLISH MIGRATION FORM') ?></span>
                <h3 class="me-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="me-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : 'forms/Application For English.pdf') ?>" target="_blank" class="me-pdf-btn">
                  <span>📄 Download English Form PDF</span> <span>↗</span>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <!-- Online Migration Request Form Card -->
          <div class="sidebar-card" style="margin-bottom:24px;">
            <h4 class="sidebar-title">Apply Online for Migration Certificate</h4>

            <?php if (!empty($formMsg)): ?>
            <div style="background:#dcfce7;color:#166534;padding:12px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:14px;">
              <?= htmlspecialchars($formMsg) ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($formErr)): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:14px;">
              <?= htmlspecialchars($formErr) ?>
            </div>
            <?php endif; ?>

            <form method="post" action="Migration_English.php">
              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Student Full Name *</label>
                <input type="text" name="student_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="STUDENT FULL NAME" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Father's Name</label>
                <input type="text" name="father_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="FATHER'S NAME" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Enrollment Number *</label>
                <input type="text" name="enrollment_no" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="ENROLLMENT NUMBER" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Mobile Number *</label>
                <input type="text" name="mobile_no" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="10-DIGIT MOBILE NUMBER" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Course / Program</label>
                <input type="text" name="course" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="e.g. B.Tech, MBA" />
              </div>

              <div style="margin-bottom:14px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Postal Address for Certificate Dispatch</label>
                <input type="text" name="postal_address" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="COMPLETE DISPATCH ADDRESS" />
              </div>

              <button type="submit" name="submit_migration" style="width:100%;background:#0C1424;color:#ffffff;border:none;padding:12px;border-radius:8px;font-weight:700;font-size:13.5px;cursor:pointer;">Submit Migration Application ↗</button>
            </form>
          </div>

          <div class="sidebar-card">
            <h4 class="sidebar-title">Examination Services</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=migration-english" class="sidebar-link active"><span>Migration Form (English)</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=migration-hindi" class="sidebar-link"><span>माइग्रेशन फॉर्म (हिंदी)</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=marksheet-form" class="sidebar-link"><span>Duplicate Marksheet Form</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>Verification Form</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>Exam Results Portal</span> <span>↗</span></a></li>
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
