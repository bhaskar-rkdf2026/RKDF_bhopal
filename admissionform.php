<?php
// ============================================================
// RKDF University — Online Admission Enquiry & Application Form 2026-27
// Clean, Compact Single-Screen Form (Exactly matching requested fields)
// Retaining RKDF University Official Theme & Design System
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/include/cms_engine.php';

$pdo = getDbConnection();
$pageSlug = 'admission-apply';
$pRow = [];

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
        $stmt->execute([$pageSlug]);
        $pRow = $stmt->fetch() ?: [];
    } catch (Throwable $e) {
        $pRow = cms_get_page($pageSlug);
    }
} else {
    $pRow = cms_get_page($pageSlug);
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ADMISSIONS 2026-27 · ONLINE APPLICATION';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Admission Application Form 2026-27';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Register your admission enquiry online for Engineering, Pharmacy, Management, Agriculture, Law, Medical & Diploma programs.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-students-quad.jpg';

// Colleges List for Dropdown
$colleges = [
    'School of Engineering & Technology (RKDF-IST / VITS)',
    'Faculty of Pharmacy (RKDF College of Pharmacy)',
    'Faculty of Agriculture (RKDF College of Agriculture)',
    'Faculty of Management (RKDF Institute of Management)',
    'Faculty of Computer Applications & IT',
    'Faculty of Law',
    'Faculty of Commerce & Humanities',
    'Faculty of Ayurvedic & Homeopathic Medical Sciences (BAMS / BHMS)',
    'Faculty of Nursing',
    'Faculty of Paramedical Sciences',
    'Faculty of Architecture & Planning',
    'Faculty of Education & Physical Education',
    'Faculty of Science & Biotechnology'
];

// Courses List for Dropdown
$courses = [
    'B.Tech / B.E. (Computer Science & Engg)',
    'B.Tech / B.E. (AI & Machine Learning)',
    'B.Tech / B.E. (Civil / Mechanical / Electrical / EC)',
    'M.Tech (Engineering)',
    'Polytechnic Diploma in Engineering',
    'B.Sc. (Hons.) Agriculture [ICAR Accredited]',
    'M.Sc. (Agriculture)',
    'B.Pharm (Bachelor of Pharmacy)',
    'D.Pharm (Diploma in Pharmacy)',
    'M.Pharm (Pharmaceutics / Pharmacology)',
    'MBA (Dual Specialization)',
    'BBA (Bachelor of Business Administration)',
    'MCA (Master of Computer Applications)',
    'BCA (Bachelor of Computer Applications)',
    'B.Sc. Computer Science / Data Science',
    'B.A. LL.B. (Hons.) [5 Years Integrated]',
    'LL.B. [3 Years]',
    'LL.M. (Master of Laws)',
    'BAMS (Bachelor of Ayurvedic Medicine & Surgery)',
    'BHMS (Bachelor of Homeopathic Medicine & Surgery)',
    'B.Sc. Nursing / GNM',
    'BMLT / DMLT (Paramedical)',
    'B.Arch (Bachelor of Architecture)',
    'B.Sc / M.Sc (Biotechnology / Microbiology / Chemistry / Physics)',
    'B.Com / M.Com (Commerce & Taxation)',
    'B.Ed / D.El.Ed (Education)',
    'Ph.D (Doctoral Research Programs)'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/include/head_meta.php'; ?>
  <style>
    .subpage-hero {
      position: relative;
      padding: 150px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.95) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sadm-main-section {
      padding: 60px 0 90px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sadm-form-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 40px 48px;
      box-shadow: 0 12px 40px rgba(12, 20, 36, 0.06);
      max-width: 820px;
      margin: 0 auto;
    }
    @media (max-width: 768px) {
      .sadm-form-card {
        padding: 24px 20px;
        border-radius: 16px;
      }
    }

    .sadm-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      color: #166534;
      background: #dcfce7;
      border: 1px solid #bbf7d0;
      padding: 6px 14px;
      border-radius: 99px;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 24px;
    }
    .sadm-badge-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #16a34a;
      box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
    }

    .sadm-form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px 24px;
    }
    @media (max-width: 640px) {
      .sadm-form-grid {
        grid-template-columns: 1fr;
        gap: 16px;
      }
    }

    .sadm-field-group {
      display: flex;
      flex-direction: column;
    }
    .sadm-field-full {
      grid-column: 1 / -1;
    }

    .sadm-label {
      font-size: 13.5px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 7px;
      display: flex;
      align-items: center;
      gap: 4px;
    }
    .sadm-label .req {
      color: #E31B23;
      font-weight: 800;
    }

    .sadm-input-wrap {
      position: relative;
      display: flex;
      align-items: center;
    }
    .sadm-input-icon {
      position: absolute;
      left: 14px;
      color: #64748b;
      font-size: 16px;
      pointer-events: none;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .sadm-input, .sadm-select {
      width: 100%;
      height: 48px;
      padding: 0 16px 0 44px;
      border: 1px solid rgba(12, 20, 36, 0.14);
      border-radius: 10px;
      font-size: 14.5px;
      color: #0C1424;
      background: #FAF9F5;
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
      font-family: inherit;
    }
    .sadm-input:focus, .sadm-select:focus {
      border-color: #0C1424;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(12, 20, 36, 0.08);
    }

    /* Mobile Number with +91 Prefix */
    .sadm-phone-wrap {
      display: flex;
      border: 1px solid rgba(12, 20, 36, 0.14);
      border-radius: 10px;
      background: #FAF9F5;
      overflow: hidden;
      transition: all 0.25s ease;
    }
    .sadm-phone-wrap:focus-within {
      border-color: #0C1424;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(12, 20, 36, 0.08);
    }
    .sadm-phone-prefix {
      display: flex;
      align-items: center;
      padding: 0 14px;
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
      background: rgba(12, 20, 36, 0.04);
      border-right: 1px solid rgba(12, 20, 36, 0.1);
      user-select: none;
    }
    .sadm-phone-input {
      border: none !important;
      background: transparent !important;
      height: 48px;
      padding: 0 14px;
      box-shadow: none !important;
      outline: none;
      width: 100%;
      font-size: 14.5px;
      color: #0C1424;
    }

    /* Submit Button */
    .sadm-submit-btn {
      width: 100%;
      height: 52px;
      margin-top: 26px;
      background: linear-gradient(135deg, #0C1424 0%, #152238 100%);
      color: #ffffff;
      border: 1px solid #C5A059;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.15);
      transition: all 0.3s ease;
    }
    .sadm-submit-btn:hover {
      background: linear-gradient(135deg, #E31B23 0%, #B91C1C 100%);
      border-color: #E31B23;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(227, 27, 35, 0.25);
    }

    /* Trust Footer */
    .sadm-trust-bar {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
      padding-top: 18px;
      border-top: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 12.5px;
      font-weight: 600;
      color: #475569;
    }
    .sadm-trust-item {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.4rem, 5vw, 4.8rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:16px;font-size:17.5px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:680px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sadm-main-section">
    <div class="rk-container">

      <!-- ADMISSION FORM CARD -->
      <div class="sadm-form-card">
        
        <!-- Live Status Pill -->
        <div class="sadm-badge-pill">
          <span class="sadm-badge-dot"></span>
          <span>ADMISSIONS OPEN 2026-27</span>
        </div>

        <form method="POST" action="admission.php" id="admissionEnquiryForm" novalidate onsubmit="return validateEnquiryForm();">
          
          <div class="sadm-form-grid">

            <!-- Field 1: Full Name -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="nm">Your Full Name <span class="req">*</span></label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">👤</span>
                <input type="text" id="nm" name="nm" class="sadm-input" placeholder="Enter your full name" required autocomplete="name">
              </div>
            </div>

            <!-- Field 2: Father's Name -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="fnm">Father's Name</label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">👨</span>
                <input type="text" id="fnm" name="fnm" class="sadm-input" placeholder="Enter father's name" autocomplete="off">
              </div>
            </div>

            <!-- Field 3: Select College -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="college">Select College <span class="req">*</span></label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">🏛</span>
                <select id="college" name="college" class="sadm-select" required>
                  <option value="">Select College</option>
                  <?php foreach ($colleges as $c): ?>
                  <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Field 4: Course -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="category">Course <span class="req">*</span></label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">🎓</span>
                <select id="category" name="category" class="sadm-select" required>
                  <option value="">Select Course</option>
                  <?php foreach ($courses as $crs): ?>
                  <option value="<?= htmlspecialchars($crs) ?>"><?= htmlspecialchars($crs) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Field 5: Email Address -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="eid">Email Address <span class="req">*</span></label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">✉</span>
                <input type="email" id="eid" name="eid" class="sadm-input" placeholder="e.g. yourname@gmail.com" required autocomplete="email">
              </div>
            </div>

            <!-- Field 6: Mobile Number -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="mob">Mobile Number <span class="req">*</span></label>
              <div class="sadm-phone-wrap">
                <span class="sadm-phone-prefix">+91</span>
                <input type="tel" id="mob" name="mob" class="sadm-phone-input" placeholder="10-digit mobile number" maxlength="10" required autocomplete="tel">
              </div>
            </div>

            <!-- Field 7: City / District -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="city">City / District</label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">📍</span>
                <input type="text" id="city" name="city" class="sadm-input" placeholder="Enter your city (e.g. Bhopal)">
              </div>
            </div>

            <!-- Field 8: State -->
            <div class="sadm-field-group">
              <label class="sadm-label" for="state">State</label>
              <div class="sadm-input-wrap">
                <span class="sadm-input-icon">🌐</span>
                <input type="text" id="state" name="state" class="sadm-input" placeholder="Enter your state (e.g. Madhya Pradesh)">
              </div>
            </div>

          </div>

          <!-- Submit Button -->
          <button type="submit" class="sadm-submit-btn">
            <span>Submit Admission Enquiry</span>
            <span>→</span>
          </button>

          <!-- Trust Badges -->
          <div class="sadm-trust-bar">
            <span class="sadm-trust-item" style="color:#166534;">🛡 Official University Portal</span>
            <span class="sadm-trust-item" style="color:#d97706;">⚡ Call-back within 24 Hours</span>
            <span class="sadm-trust-item" style="color:#2563eb;">🔒 100% Privacy Protected</span>
          </div>

        </form>

      </div>

    </div>
  </main>

  <script>
  function validateEnquiryForm() {
    const name = document.getElementById('nm').value.trim();
    const college = document.getElementById('college').value;
    const course = document.getElementById('category').value;
    const email = document.getElementById('eid').value.trim();
    const mob = document.getElementById('mob').value.trim();

    if (!name) {
      alert('Please enter your full name.');
      document.getElementById('nm').focus();
      return false;
    }
    if (!college) {
      alert('Please select a college.');
      document.getElementById('college').focus();
      return false;
    }
    if (!course) {
      alert('Please select a course.');
      document.getElementById('category').focus();
      return false;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      alert('Please enter a valid email address.');
      document.getElementById('eid').focus();
      return false;
    }
    if (!mob || !/^[6-9]\d{9}$/.test(mob)) {
      alert('Please enter a valid 10-digit mobile number.');
      document.getElementById('mob').focus();
      return false;
    }
    return true;
  }
  </script>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>