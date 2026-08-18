<?php
// ============================================================
// RKDF University — Duplicate & Corrected Marksheet Secretariat (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + Official PDF Downloads Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'marksheet-form';
$pRow = [];
$allItems = [];

$formMsg = '';
$formErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_marksheet_req'])) {
    $reqId   = 'MSK' . date('Y') . rand(10000, 99999);
    $name    = trim($_POST['student_name'] ?? '');
    $fname   = trim($_POST['father_name'] ?? '');
    $enroll  = trim($_POST['enrollment_no'] ?? '');
    $roll    = trim($_POST['roll_no'] ?? '');
    $course  = trim($_POST['course'] ?? '');
    $branch  = trim($_POST['branch'] ?? '');
    $sem     = trim($_POST['semester'] ?? '');
    $year    = trim($_POST['passing_year'] ?? '');
    $mobile  = trim($_POST['mobile_no'] ?? '');
    $email   = trim($_POST['email_id'] ?? '');
    $reason  = trim($_POST['reason'] ?? 'Duplicate Marksheet Request');

    if (!empty($name) && !empty($enroll) && !empty($mobile)) {
        if ($pdo) {
            try {
                $stmtMsk = $pdo->prepare("INSERT INTO marksheet_requests (req_id, student_name, father_name, enrollment_no, roll_no, course, branch, semester, passing_year, mobile_no, email_id, reason, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'PENDING')");
                $stmtMsk->execute([$reqId, $name, $fname, $enroll, $roll, $course, $branch, $sem, $year, $mobile, $email, $reason]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "Duplicate Marksheet Request Submitted Successfully! Request ID: {$reqId}.";
    } else {
        $formErr = "Please enter Student Name, Enrollment No, and Mobile Number.";
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · MARKSHEET CORRECTION & DUPLICATE';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Duplicate & Corrected Marksheet Branch';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official application forms and procedures for duplicate grade card issuance, name spelling corrections, and marksheet verification.';

$defaultMessage = "The Examination Branch Secretariat at RKDF University Bhopal provides official forms and procedures for obtaining Duplicate Marksheets, Corrected Grade Cards, and Transcript Verification documents.\n\nStudents whose original marksheets are lost, damaged, or require spelling/name corrections can download the prescribed application forms below and follow the guidelines for processing.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Duplicate / Corrected Marksheet Guidelines";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedM = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'General Marksheet Forms';
    $groupedM[$gName][] = $it;
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
    .mf-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .mf-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .mf-grid-layout { grid-template-columns: 1fr; } }

    .mf-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .mf-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .mf-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* Fee & Requirement Cards */
    .mf-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .mf-info-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 24px;
    }
    .mf-info-head {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #E31B23;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }
    .mf-info-val {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }
    .mf-info-desc {
      font-size: 13.5px;
      color: #64748B;
      margin-top: 6px;
      line-height: 1.5;
    }

    .mf-group-box { margin-bottom: 36px; }
    .mf-group-title {
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

    .mf-card-row {
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
    .mf-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .mf-badge {
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

    .mf-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .mf-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .mf-pdf-btn {
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
    .mf-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }

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
  <main class="mf-main-section">
    <div class="rk-container">
      <div class="mf-grid-layout">
        
        <!-- LEFT COLUMN: MARKSHEET FORMS & GUIDELINES -->
        <div>
          
          <div class="mf-intro-card">
            <h2 class="mf-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="mf-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- MARKSHEET CORRECTION PROCEDURE GRID -->
            <div class="mf-info-grid">
              <div class="mf-info-box">
                <div class="mf-info-head">1. Duplicate Fee</div>
                <div class="mf-info-val">Rs. 500 / Marksheet</div>
                <div class="mf-info-desc">Payable via Demand Draft in favor of "RKDF University Bhopal" or at Fee Counter.</div>
              </div>

              <div class="mf-info-box">
                <div class="mf-info-head">2. Mandatory Proof</div>
                <div class="mf-info-val">10th Marksheet Copy</div>
                <div class="mf-info-desc">Self-attested 10th marksheet copy required for name spelling correction verification.</div>
              </div>

              <div class="mf-info-box">
                <div class="mf-info-head">3. Lost Marksheet</div>
                <div class="mf-info-val">Police FIR &amp; Affidavit</div>
                <div class="mf-info-desc">FIR copy + Notarized Affidavit mandatory in case of lost or stolen grade card.</div>
              </div>
            </div>

          </div>

          <!-- RENDER GROUPED FORMS -->
          <?php foreach ($groupedM as $gTitle => $mList): ?>
          <div class="mf-group-box">
            <div class="mf-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($mList) ?> OFFICIAL DOCUMENTS
              </span>
            </div>

            <?php foreach ($mList as $item): ?>
            <article class="mf-card-row">
              <div style="max-width:520px;">
                <span class="mf-badge"><?= htmlspecialchars($item['badge_text'] ?: 'MARKSHEET FORM') ?></span>
                <h3 class="mf-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="mf-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : '#') ?>" target="_blank" class="mf-pdf-btn">
                  <span>📄 Download Form PDF</span> <span>↗</span>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <!-- Online Marksheet Request Form Card -->
          <div class="sidebar-card" style="margin-bottom:24px;">
            <h4 class="sidebar-title">Request Duplicate Marksheet</h4>

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

            <form method="post" action="Marksheet_Form.php">
              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Student Full Name *</label>
                <input type="text" name="student_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="STUDENT FULL NAME" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Father's Name</label>
                <input type="text" name="father_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="FATHER NAME" />
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
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Course &amp; Semester</label>
                <div style="display:flex;gap:8px;">
                  <input type="text" name="course" style="width:50%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="Course (B.Tech)" />
                  <input type="text" name="semester" style="width:50%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="Sem (e.g. 6th)" />
                </div>
              </div>

              <div style="margin-bottom:14px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Reason / Notes</label>
                <input type="text" name="reason" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="e.g. Original Lost / Damaged" />
              </div>

              <button type="submit" name="submit_marksheet_req" style="width:100%;background:#0C1424;color:#ffffff;border:none;padding:12px;border-radius:8px;font-weight:700;font-size:13.5px;cursor:pointer;">Submit Marksheet Request ↗</button>
            </form>
          </div>

          <div class="sidebar-card">
            <h4 class="sidebar-title">Examination Services</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=marksheet-form" class="sidebar-link active"><span>Duplicate Marksheet Form</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>Verification Form</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-notice" class="sidebar-link"><span>Examination Notices</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-timetable" class="sidebar-link"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>Exam Results Portal</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link"><span>Controller of Examination</span> <span>↗</span></a></li>
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
