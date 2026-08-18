<?php
// ============================================================
// RKDF University — Contact Us & Campus Directory (100% Dynamic CMS)
// World-Class Premium Design + Interactive Form + Live Map + Approved Header & Footer
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'contact-us';
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

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'CONNECT WITH US · RKDF CAMPUS DIRECTORY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Contact Us & Campus Directory';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Campus address, official email contacts, administrative office phone numbers, toll-free admission helplines, and location map.';

$defaultMessage = "RKDF University Bhopal welcomes inquiries from prospective students, parents, research scholars, corporate recruiters, and visitors.\n\nReach out to our campus offices, administrative deans, toll-free admission helpline, or submit your query online below.";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "Get in Touch with RKDF University";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Process Form Post (if submitted)
$formMsg = '';
$formErr = '';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['phone'])) {
    $phone   = trim($_POST['phone'] ?? '');
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $msg     = trim($_POST['message'] ?? '');
    $consent = isset($_POST['consent']) ? 1 : 0;

    if (preg_match('/^[6-9]\d{9}$/', $phone)) {
        if ($pdo) {
            try {
                $stmtInst = $pdo->prepare("INSERT INTO contact_submissions (name, email, phone, message, channel_consent, source) VALUES (?, ?, ?, ?, ?, 'Contact Us Page')");
                $stmtInst->execute([$name, $email, $phone, $msg, $consent]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "Thank you! Your phone number ({$phone}) has been registered for official RKDF updates via WhatsApp & SMS.";
    } else {
        $formErr = "Please enter a valid 10-digit Indian mobile number and agree to the consent terms.";
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-why-bg.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .cnt-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .cnt-grid-layout { display: grid; grid-template-columns: 7.5fr 4.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .cnt-grid-layout { grid-template-columns: 1fr; } }

    .cnt-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .cnt-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .cnt-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    .cnt-cards-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 36px; }
    @media (max-width: 768px) { .cnt-cards-grid { grid-template-columns: 1fr; } }

    .cnt-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 26px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .cnt-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08); border-color: #E31B23; }

    .cnt-badge {
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
      margin-bottom: 10px;
    }

    .cnt-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 8px 0; }
    .cnt-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.6; }

    .cnt-form-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
    }
    .cnt-form-title { font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: 700; color: #0C1424; margin-bottom: 18px; }

    .cnt-input-group { margin-bottom: 18px; }
    .cnt-label { display: block; font-size: 13.5px; font-weight: 700; color: #0C1424; margin-bottom: 6px; }
    .cnt-input {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid rgba(12, 20, 36, 0.15);
      border-radius: 8px;
      font-size: 15px;
      outline: none;
      transition: border-color 0.25s ease;
    }
    .cnt-input:focus { border-color: #E31B23; box-shadow: 0 0 0 3px rgba(227, 27, 35, 0.1); }

    .cnt-submit-btn {
      width: 100%;
      background: #0C1424;
      color: #ffffff;
      padding: 14px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.25s ease;
    }
    .cnt-submit-btn:hover { background: #E31B23; }

    .cnt-map-box { margin-top: 50px; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 30px rgba(12, 20, 36, 0.08); border: 1px solid rgba(12, 20, 36, 0.08); }

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
  <main class="cnt-main-section">
    <div class="rk-container">
      <div class="cnt-grid-layout">
        
        <!-- LEFT COLUMN: CONTACT DIRECTORY & FORM -->
        <div>
          
          <div class="cnt-intro-card">
            <h2 class="cnt-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="cnt-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>
          </div>

          <!-- EMERGENCY ANCHOR -->
          <div id="emergency" style="scroll-margin-top:120px;"></div>

          <!-- RENDER DYNAMIC CONTACT CARDS -->
          <div class="cnt-cards-grid">
            <?php foreach ($allItems as $item): ?>
            <article class="cnt-card">
              <span class="cnt-badge"><?= htmlspecialchars($item['badge_text'] ?: 'CONTACT') ?></span>
              <h3 class="cnt-item-title"><?= htmlspecialchars($item['title']) ?></h3>
              <p class="cnt-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
            </article>
            <?php endforeach; ?>
          </div>

          <!-- COMMUNICATION PREFERENCE FORM -->
          <div class="cnt-form-card">
            <h3 class="cnt-form-title">Subscribe to Official WhatsApp &amp; SMS Updates</h3>
            
            <?php if (!empty($formMsg)): ?>
            <div style="background:#dcfce7;color:#166534;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-weight:600;">
              <?= htmlspecialchars($formMsg) ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($formErr)): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-weight:600;">
              <?= htmlspecialchars($formErr) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="contact-us.php" onsubmit="return validateContactForm()">
              <div class="cnt-input-group">
                <label class="cnt-label" for="phone">10-Digit Mobile Number:</label>
                <input type="text" name="phone" id="phone" class="cnt-input" placeholder="e.g. 9876543210" required>
              </div>

              <div class="cnt-input-group" style="display:flex;align-items:flex-start;gap:10px;">
                <input type="checkbox" name="consent" id="consent" required style="margin-top:4px;">
                <label for="consent" style="font-size:13px;color:#475569;cursor:pointer;">
                  I agree to receive all official university admission notices, exam updates, and fee alerts via SMS, WhatsApp, RCS, and Email.
                </label>
              </div>

              <button type="submit" class="cnt-submit-btn">Register Contact Updates ↗</button>
            </form>
          </div>

          <!-- EMBEDDED GOOGLE MAP -->
          <div class="cnt-map-box" id="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3664.0905255566895!2d77.35739971403736!3d23.312474084806983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c41561449e8d7%3A0xfc546b3d8731200e!2sRKDF%20UNIVERSITY%20BHOPAL!5e0!3m2!1sen!2sin!4v1681279428496!5m2!1sen!2sin"
              width="100%" height="400" style="border:0;display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Help &amp; Quick Links</h4>
            <ul class="sidebar-nav-list">
              <li><a href="contact-us.php" class="sidebar-link active"><span>Contact Directory</span> <span>↗</span></a></li>
              <li><a href="contact-us.php#emergency" class="sidebar-link"><span>Emergency Helpline</span> <span>↗</span></a></li>
              <li><a href="admissionform.php" class="sidebar-link"><span>Apply Online 2026</span> <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link"><span>Student ERP Portal</span> <span>↗</span></a></li>
              <li><a href="scholarship.php" class="sidebar-link"><span>Scholarship Cell</span> <span>↗</span></a></li>
              <li><a href="policies.php" class="sidebar-link"><span>University Policies</span> <span>↗</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <script>
  function validateContactForm() {
      var phone = document.getElementById("phone").value;
      var consent = document.getElementById("consent").checked;
      var indianPhoneRegex = /^[6-9]\d{9}$/;

      if (!indianPhoneRegex.test(phone)) {
          alert("Please enter a valid 10-digit Indian mobile number.");
          return false;
      }
      if (!consent) {
          alert("You must agree to the consent terms.");
          return false;
      }
      return true;
  }
  </script>

  <!-- FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
