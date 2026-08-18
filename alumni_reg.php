<?php
// ============================================================
// RKDF University — Online Alumni Membership Registration Portal
// World-Class Premium Design + PDO Database Connection + Official Header & Footer
// ============================================================
session_start();
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$successMsg = '';
$errorMsg = '';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['Submit'])) {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO alumni (
                name, fname, gender, marital, mobile, email, `add`, enrollment, college, course, branch, occupation, company, job, city, course_study, college_study, univ, contribute
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                trim($_POST['name'] ?? ''),
                trim($_POST['fname'] ?? ''),
                trim($_POST['gender'] ?? ''),
                trim($_POST['marital'] ?? ''),
                trim($_POST['mobile'] ?? ''),
                trim($_POST['email'] ?? ''),
                trim($_POST['add'] ?? ''),
                trim($_POST['enrollment'] ?? ''),
                trim($_POST['college'] ?? ''),
                trim($_POST['course'] ?? ''),
                trim($_POST['branch'] ?? ''),
                trim($_POST['occupation'] ?? ''),
                trim($_POST['company'] ?? ''),
                trim($_POST['job'] ?? ''),
                trim($_POST['city'] ?? ''),
                trim($_POST['course_study'] ?? ''),
                trim($_POST['college_study'] ?? ''),
                trim($_POST['univ'] ?? ''),
                trim($_POST['contribute'] ?? '')
            ]);

            $successMsg = "Congratulations! Your Alumni Registration has been submitted successfully. Welcome to the RKDF Global Alumni Network.";
        } catch (Exception $e) {
            $errorMsg = "An error occurred while saving your registration. Please check your inputs and try again.";
        }
    } else {
        $errorMsg = "Database connection error. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Alumni Registration Portal — RKDF University Bhopal</title>
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
                  url('images/lovable/rkdf-building-enhanced.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .areg-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .areg-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .areg-grid-layout { grid-template-columns: 1fr; } }

    .areg-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 30px rgba(12, 20, 36, 0.06);
    }

    .areg-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 28px 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .areg-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .areg-card-body { padding: 40px; }

    .areg-form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      margin-bottom: 24px;
    }

    .areg-field {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .areg-label {
      font-size: 14px;
      font-weight: 700;
      color: #0C1424;
    }

    .areg-input, .areg-select, .areg-textarea {
      width: 100%;
      padding: 13px 16px;
      font-family: 'Inter', sans-serif;
      font-size: 14.5px;
      color: #0C1424;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.14);
      border-radius: 8px;
      outline: none;
      transition: all 0.25s ease;
    }

    .areg-input:focus, .areg-select:focus, .areg-textarea:focus {
      border-color: #E31B23;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(227, 27, 35, 0.1);
    }

    .areg-submit-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 16px 28px;
      background: #E31B23;
      color: #ffffff;
      font-size: 16px;
      font-weight: 700;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 6px 20px rgba(227, 27, 35, 0.25);
      margin-top: 16px;
    }
    .areg-submit-btn:hover {
      background: #0C1424;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(12, 20, 36, 0.2);
    }

    .areg-alert-success {
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid rgba(16, 185, 129, 0.3);
      color: #047857;
      padding: 16px 20px;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      margin-bottom: 24px;
    }

    .areg-alert-error {
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.25);
      color: #E31B23;
      padding: 16px 20px;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      margin-bottom: 24px;
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
      <span class="rk-eyebrow tone-gold">RKDF GLOBAL ALUMNI NETWORK · DIGITAL REGISTRY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Alumni Registration Portal</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Register your profile to join the RKDF University Global Alumni Network, connect with fellow alumni, and contribute to campus mentorship.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="areg-main-section">
    <div class="rk-container">
      <div class="areg-grid-layout">
        
        <!-- LEFT COLUMN: REGISTRATION FORM CARD -->
        <div>
          <div class="areg-card">
            <div class="areg-card-header">
              <h2 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;margin:0;color:#ffffff;">
                ALUMNI MEMBERSHIP REGISTRATION FORM
              </h2>
              <span class="areg-badge">ONLINE ENTRY</span>
            </div>

            <div class="areg-card-body">

              <?php if (!empty($successMsg)): ?>
              <div class="areg-alert-success">
                ✅ <?= htmlspecialchars($successMsg) ?>
              </div>
              <?php endif; ?>

              <?php if (!empty($errorMsg)): ?>
              <div class="areg-alert-error">
                ⚠️ <?= htmlspecialchars($errorMsg) ?>
              </div>
              <?php endif; ?>

              <form method="post" action="alumni_reg.php">
                
                <!-- PERSONAL INFORMATION -->
                <div style="font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:#0C1424;margin-bottom:16px;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                  1. Personal Details
                </div>

                <div class="areg-form-grid">
                  <div class="areg-field">
                    <label class="areg-label" for="name">Full Name *</label>
                    <input type="text" id="name" name="name" class="areg-input" placeholder="Full Name" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="fname">Father's Name *</label>
                    <input type="text" id="fname" name="fname" class="areg-input" placeholder="Father's Name" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="gender">Gender *</label>
                    <select id="gender" name="gender" class="areg-select" required>
                      <option value="">-- Select Gender --</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Transgender">Transgender</option>
                    </select>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="marital">Marital Status *</label>
                    <select id="marital" name="marital" class="areg-select" required>
                      <option value="">-- Select Status --</option>
                      <option value="Married">Married</option>
                      <option value="Unmarried">Unmarried</option>
                    </select>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="mobile">Mobile Number *</label>
                    <input type="tel" id="mobile" name="mobile" class="areg-input" placeholder="10-digit Mobile No." pattern="[0-9]{10}" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="email">Personal Email ID *</label>
                    <input type="email" id="email" name="email" class="areg-input" placeholder="email@domain.com" required>
                  </div>
                </div>

                <div class="areg-field" style="margin-bottom:24px;">
                  <label class="areg-label" for="add">Permanent Communication Address</label>
                  <textarea id="add" name="add" rows="3" class="areg-textarea" placeholder="Full Postal Address with PIN code"></textarea>
                </div>

                <!-- ACADEMIC INFORMATION -->
                <div style="font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:#0C1424;margin-bottom:16px;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                  2. Academic & University Details
                </div>

                <div class="areg-form-grid">
                  <div class="areg-field">
                    <label class="areg-label" for="enrollment">University Enrollment Number *</label>
                    <input type="text" id="enrollment" name="enrollment" class="areg-input" placeholder="Enrollment No." required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="college">College / School Name *</label>
                    <input type="text" id="college" name="college" class="areg-input" placeholder="e.g. SSSIST / Faculty of Engg" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="course">Course Completed *</label>
                    <input type="text" id="course" name="course" class="areg-input" placeholder="e.g. BE / MBA / B.Pharm / B.Sc" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="branch">Branch / Specialization *</label>
                    <input type="text" id="branch" name="branch" class="areg-input" placeholder="e.g. CSE / Mechanical / Finance" required>
                  </div>
                </div>

                <!-- PROFESSIONAL OCCUPATION -->
                <div style="font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:#0C1424;margin-bottom:16px;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                  3. Current Professional Status
                </div>

                <div class="areg-form-grid">
                  <div class="areg-field">
                    <label class="areg-label" for="occupation">Occupation Type *</label>
                    <select id="occupation" name="occupation" class="areg-select" required>
                      <option value="">-- Select Occupation --</option>
                      <option value="Private">Private Sector Job</option>
                      <option value="Goverment">Government / Public Sector</option>
                      <option value="Self">Self Employed / Entrepreneur</option>
                    </select>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="company">Company / Organization Name *</label>
                    <input type="text" id="company" name="company" class="areg-input" placeholder="Company Name" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="job">Designation / Job Title *</label>
                    <input type="text" id="job" name="job" class="areg-input" placeholder="e.g. Senior Software Engineer" required>
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="city">Current City *</label>
                    <input type="text" id="city" name="city" class="areg-input" placeholder="e.g. Bhopal / Bengaluru / Delhi" required>
                  </div>
                </div>

                <!-- HIGHER STUDIES & CONTRIBUTION -->
                <div style="font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:#0C1424;margin-bottom:16px;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                  4. Higher Studies &amp; University Contribution
                </div>

                <div class="areg-form-grid">
                  <div class="areg-field">
                    <label class="areg-label" for="course_study">Higher Study Course (If Any)</label>
                    <input type="text" id="course_study" name="course_study" class="areg-input" placeholder="e.g. M.Tech / Ph.D / MS">
                  </div>

                  <div class="areg-field">
                    <label class="areg-label" for="univ">University / Institute Name</label>
                    <input type="text" id="univ" name="univ" class="areg-input" placeholder="Higher Study University">
                  </div>
                </div>

                <div class="areg-field" style="margin-bottom:24px;">
                  <label class="areg-label" for="contribute">How Would You Like to Contribute to RKDF University? *</label>
                  <select id="contribute" name="contribute" class="areg-select" required>
                    <option value="">-- Select Contribution Area --</option>
                    <option value="Guest Lecture">For Delivering Guest Lectures</option>
                    <option value="Mentor">As a Student Mentor</option>
                    <option value="Donor">As a Financial Donor / Sponsor</option>
                    <option value="BOS Member">As a Board of Studies (BOS) Member</option>
                    <option value="R&D">Support in R&amp;D and Research Activities</option>
                    <option value="Resource Person">As a Resource Person for Conferences &amp; Workshops</option>
                  </select>
                </div>

                <button type="submit" name="Submit" class="areg-submit-btn">
                  <span>🎓 Submit Alumni Registration</span> <span>↗</span>
                </button>

              </form>

            </div>
          </div>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h4 class="sidebar-title">Alumni Corner</h4>
            <ul class="sidebar-nav-list">
              <li><a href="alumni_reg.php" class="sidebar-link active"><span>Online Alumni Register</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=alumni-form" class="sidebar-link"><span>Alumni Registration Form</span> <span>↗</span></a></li>
              <li><a href="alumni.php" class="sidebar-link"><span>Alumni Association Home</span> <span>↗</span></a></li>
              <li><a href="imggallery.php" class="sidebar-link"><span>Alumni Meet Gallery</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>Degree Verification</span> <span>↗</span></a></li>
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
