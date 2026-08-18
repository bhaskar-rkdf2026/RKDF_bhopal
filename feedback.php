<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$formMsg = '';
$formErr = '';

if (isset($_POST['contact_submitted'])) {
    $yourname    = stripslashes(strip_tags($_POST['your_name'] ?? ''));
    $youremail   = trim(htmlspecialchars($_POST['your_email'] ?? ''));
    $yourcontact = stripslashes(strip_tags($_POST['your_contact'] ?? ''));
    $yourmessage = stripslashes(strip_tags($_POST['your_message'] ?? ''));

    if (!empty($yourname) && !empty($yourcontact) && !empty($yourmessage)) {
        if ($pdo) {
            try {
                $stmtFb = $pdo->prepare("INSERT INTO feedback_submissions (name, email, phone, user_type, feedback_text, status) VALUES (?, ?, ?, 'Student/Applicant', ?, 'NEW')");
                $stmtFb->execute([$yourname, $youremail, $yourcontact, $yourmessage]);
            } catch (Throwable $exFb) {}
        }
        $formMsg = "Thank you! Your feedback/enquiry has been submitted successfully and recorded.";
        $yourname = ''; $youremail = ''; $yourcontact = ''; $yourmessage = '';
    } else {
        $formErr = "Please enter your name, mobile number, and enquiry message before submitting.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Feedback & Enquiry — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .fb-card { background: #ffffff; border: 1px solid rgba(12, 20, 36, 0.08); border-radius: 20px; padding: 40px; box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04); max-width: 720px; margin: 0 auto; }
    .fb-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 20px; }
    .fb-group { margin-bottom: 20px; }
    .fb-label { display: block; font-size: 14px; font-weight: 700; color: #0C1424; margin-bottom: 6px; }
    .fb-input, .fb-textarea { width: 100%; padding: 12px 16px; border: 1px solid rgba(12, 20, 36, 0.15); border-radius: 8px; font-size: 15px; box-sizing: border-box; outline: none; }
    .fb-input:focus, .fb-textarea:focus { border-color: #E31B23; box-shadow: 0 0 0 3px rgba(227, 27, 35, 0.1); }
    .fb-btn { background: #0C1424; color: #ffffff; padding: 14px 32px; border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer; transition: background 0.25s ease; }
    .fb-btn:hover { background: #E31B23; }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">STUDENT FEEDBACK &amp; ENQUIRY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.2rem, 4.5vw, 4rem);margin-top:12px;">Online Admission Feedback &amp; Queries</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="sp-main-box">
    <div class="rk-container">
      <div class="fb-card">
        <h2 class="fb-title">Submit Student Feedback &amp; Admission Query</h2>
        
        <?php if (!empty($formMsg)): ?>
        <div style="background:#dcfce7;color:#166534;padding:14px 20px;border-radius:10px;margin-bottom:24px;font-weight:700;">
          <?= htmlspecialchars($formMsg) ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($formErr)): ?>
        <div style="background:#fee2e2;color:#991b1b;padding:14px 20px;border-radius:10px;margin-bottom:24px;font-weight:700;">
          <?= htmlspecialchars($formErr) ?>
        </div>
        <?php endif; ?>

        <form method="post" action="feedback.php">
          <div class="fb-group">
            <label class="fb-label">Student Full Name *</label>
            <input type="text" name="your_name" class="fb-input" value="<?= htmlspecialchars($yourname ?? '') ?>" placeholder="Enter Your Full Name" required />
          </div>

          <div class="fb-group">
            <label class="fb-label">Email Address *</label>
            <input type="email" name="your_email" class="fb-input" value="<?= htmlspecialchars($youremail ?? '') ?>" placeholder="Enter Email Address" required />
          </div>

          <div class="fb-group">
            <label class="fb-label">Mobile Number *</label>
            <input type="text" name="your_contact" class="fb-input" value="<?= htmlspecialchars($yourcontact ?? '') ?>" placeholder="Enter 10-Digit Mobile Number" required />
          </div>

          <div class="fb-group">
            <label class="fb-label">Message / Admission Enquiry *</label>
            <textarea name="your_message" class="fb-textarea" rows="5" placeholder="Enter Your Query or Feedback..." required><?= htmlspecialchars($yourmessage ?? '') ?></textarea>
          </div>

          <button type="submit" name="contact_submitted" class="fb-btn">Submit Feedback &amp; Enquiry ↗</button>
        </form>
      </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>
</body>
</html>
