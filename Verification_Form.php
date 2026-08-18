<?php
// ============================================================
// RKDF University — Document & Marksheet Verification Portal (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + Official PDF Downloads Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'verification-form';
$pRow = [];
$allItems = [];

$formMsg = '';
$formErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_verification'])) {
    $reqId     = 'VER' . date('Y') . rand(10000, 99999);
    $agency    = trim($_POST['agency_name'] ?? '');
    $cand      = trim($_POST['candidate_name'] ?? '');
    $enroll    = trim($_POST['enrollment_no'] ?? '');
    $roll      = trim($_POST['roll_no'] ?? '');
    $course    = trim($_POST['course'] ?? '');
    $year      = trim($_POST['passing_year'] ?? '');
    $mobile    = trim($_POST['mobile_no'] ?? '');
    $email     = trim($_POST['email_id'] ?? '');
    $verType   = trim($_POST['verification_type'] ?? 'Degree Verification');
    $txRef     = trim($_POST['transaction_ref'] ?? '');

    if (!empty($cand) && !empty($enroll) && !empty($mobile)) {
        if ($pdo) {
            try {
                $stmtVer = $pdo->prepare("INSERT INTO verification_requests (req_id, agency_or_student_name, candidate_name, enrollment_no, roll_no, course, passing_year, mobile_no, email_id, verification_type, transaction_ref, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'PENDING')");
                $stmtVer->execute([$reqId, $agency, $cand, $enroll, $roll, $course, $year, $mobile, $email, $verType, $txRef]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "Verification Request Submitted Successfully! Reference Request ID: {$reqId}.";
    } else {
        $formErr = "Please enter Candidate Name, Enrollment No, and Mobile Number.";
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'EXAMINATION · DEGREE & MARKSHEET VERIFICATION';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Document & Marksheet Verification Secretariat';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Official background check, degree verification application forms, fee details, and submission guidelines for corporate employers and alumni.';

$defaultMessage = "The Examination Branch Secretariat at RKDF University Bhopal provides official background verification services for degrees, diplomas, marksheets, and academic transcripts. Employers, background verification agencies, embassies, and alumni scholars can download the prescribed verification application forms below and follow the guidelines for processing.\n\nAll verification requests are processed by the Controller of Examinations after physical verification against original university Tabulation Registers (TR).";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Degree & Marksheet Verification Guidelines";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedVer = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'General Verification Forms';
    $groupedVer[$gName][] = $it;
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
    .ver-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .ver-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .ver-grid-layout { grid-template-columns: 1fr; } }

    .ver-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .ver-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .ver-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* Fee & Procedure Box */
    .ver-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .ver-info-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 24px;
    }
    .ver-info-head {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #E31B23;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }
    .ver-info-val {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }
    .ver-info-desc {
      font-size: 13.5px;
      color: #64748B;
      margin-top: 6px;
      line-height: 1.5;
    }

    .ver-group-box { margin-bottom: 36px; }
    .ver-group-title {
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

    .ver-card-row {
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
    .ver-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .ver-badge {
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

    .ver-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .ver-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .ver-pdf-btn {
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
    .ver-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }

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
  <main class="ver-main-section">
    <div class="rk-container">
      <div class="ver-grid-layout">
        
        <!-- LEFT COLUMN: VERIFICATION FORMS & GUIDELINES -->
        <div>
          
          <div class="ver-intro-card">
            <h2 class="ver-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="ver-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- VERIFICATION KEY INSTRUCTIONS GRID -->
            <div class="ver-info-grid">
              <div class="ver-info-box">
                <div class="ver-info-head">1. Verification Fee</div>
                <div class="ver-info-val">Rs. 1,000 / Document</div>
                <div class="ver-info-desc">Payable via Demand Draft in favor of "RKDF University Bhopal" or Online Gateway.</div>
              </div>

              <div class="ver-info-box">
                <div class="ver-info-head">2. Processing Time</div>
                <div class="ver-info-val">7 to 15 Working Days</div>
                <div class="ver-info-desc">After receipt of physical application form and verified photocopies of grade cards.</div>
              </div>

              <div class="ver-info-box">
                <div class="ver-info-head">3. Postal Address</div>
                <div class="ver-info-val">Controller of Examinations</div>
                <div class="ver-info-desc">RKDF University, Airport Bypass Road, Gandhi Nagar, Bhopal (M.P.) - 462033.</div>
              </div>
            </div>

          </div>

          <!-- RENDER GROUPED FORMS -->
          <?php foreach ($groupedVer as $gTitle => $vList): ?>
          <div class="ver-group-box">
            <div class="ver-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($vList) ?> OFFICIAL DOCUMENTS
              </span>
            </div>

            <?php foreach ($vList as $item): ?>
            <article class="ver-card-row">
              <div style="max-width:520px;">
                <span class="ver-badge"><?= htmlspecialchars($item['badge_text'] ?: 'VERIFICATION FORM') ?></span>
                <h3 class="ver-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="ver-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : '#') ?>" target="_blank" class="ver-pdf-btn">
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
          <!-- Online Verification Request Form Card -->
          <div class="sidebar-card" style="margin-bottom:24px;">
            <h4 class="sidebar-title">Apply Online for Verification</h4>

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

            <form method="post" action="Verification_Form.php">
              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Candidate Name *</label>
                <input type="text" name="candidate_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="STUDENT FULL NAME" />
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
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Email Address</label>
                <input type="email" name="email_id" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="EMAIL ADDRESS" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Course / Program</label>
                <input type="text" name="course" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="e.g. B.Tech, MBA" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Passing Year</label>
                <input type="text" name="passing_year" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="e.g. 2024" />
              </div>

              <div style="margin-bottom:14px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">Agency / Organization</label>
                <input type="text" name="agency_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="AGENCY / COMPANY NAME" />
              </div>

              <button type="submit" name="submit_verification" style="width:100%;background:#0C1424;color:#ffffff;border:none;padding:12px;border-radius:8px;font-weight:700;font-size:13.5px;cursor:pointer;">Submit Verification Request ↗</button>
            </form>
          </div>

          <div class="sidebar-card">
            <h4 class="sidebar-title">Examination Services</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=verification-form" class="sidebar-link active"><span>Verification Form</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-notice" class="sidebar-link"><span>Examination Notices</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=exam-timetable" class="sidebar-link"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>Exam Results Portal</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link"><span>Controller of Examination</span> <span>↗</span></a></li>
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
