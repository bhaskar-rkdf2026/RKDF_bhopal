<?php
// ============================================================
// RKDF University — Search Admission Application & Registration Status
// World-Class Premium Design + High-Res Media Assets + 100% Exact Form Action & Logic Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Admission Application Details — RKDF University Bhopal</title>
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
                  url('images/ai_admission_search/rkdf_admsearch_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ssearch-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ssearch-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ssearch-grid-layout { grid-template-columns: 1fr; }
    }

    .ssearch-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ssearch-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ssearch-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ssearch-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .ssearch-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ssearch-card-body {
      padding: 36px 40px;
    }

    .ssearch-media-frame {
      width: 100%;
      height: 240px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ssearch-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ssearch-block-card:hover .ssearch-media-img {
      transform: scale(1.04);
    }

    .ssearch-form-group {
      margin-bottom: 24px;
    }

    .ssearch-label {
      display: block;
      font-size: 12.5px;
      font-weight: 700;
      color: #0C1424;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 8px;
    }

    .ssearch-input {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid rgba(12, 20, 36, 0.12);
      border-radius: 10px;
      font-size: 15px;
      color: #0C1424;
      background: #FAF9F5;
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
    }
    .ssearch-input:focus {
      border-color: #C5A059;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15);
    }

    .ssearch-submit-btn {
      width: 100%;
      background: #0C1424;
      color: #ffffff !important;
      border: none;
      padding: 16px 28px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.15);
    }
    .ssearch-submit-btn:hover {
      background: #E31B23;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(227, 27, 35, 0.25);
    }

    .ssearch-error-box {
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.25);
      border-radius: 10px;
      padding: 14px 18px;
      color: #E31B23;
      font-size: 14.5px;
      font-weight: 600;
      margin-top: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
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
      <span class="rk-eyebrow tone-gold">82 · ADMISSION APPLICATION LOOKUP PORTAL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Search Admission Application</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Lookup registered admission application details, payment verification status, and student enrollment records.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ssearch-main-section">
    <div class="rk-container">
      <div class="ssearch-grid-layout">
        
        <!-- LEFT COLUMN: SEARCH FORM -->
        <div>

          <article class="ssearch-block-card">
            <div class="ssearch-card-header">
              <h2 class="ssearch-card-title">Admission Details Lookup</h2>
              <span class="ssearch-badge">STUDENT PORTAL</span>
            </div>
            <div class="ssearch-card-body">

              <div class="ssearch-media-frame">
                <img src="images/ai_admission_search/rkdf_admsearch_card.jpg" alt="RKDF Central Admissions &amp; Student Registration Service Desk" class="ssearch-media-img">
              </div>

              <div style="background:rgba(197,160,89,0.08);border:1px solid rgba(197,160,89,0.25);border-radius:12px;padding:16px 20px;color:#0C1424;font-size:14.5px;font-weight:600;margin-bottom:28px;display:flex;align-items:center;gap:10px;">
                <span>ℹ️</span>
                <span>Note: Only students with successful registration fee payment can retrieve their application details.</span>
              </div>

              <form method="post" action="admission_login.php">

                <div class="ssearch-form-group">
                  <label class="ssearch-label">Registration ID *</label>
                  <input type="text" name="id" class="ssearch-input" placeholder="ENTER YOUR REGISTRATION ID" required />
                </div>

                <div style="text-align:center;font-weight:700;color:#C5A059;margin:-10px 0 14px;font-size:14px;font-family:'JetBrains Mono',monospace;">
                  &amp;
                </div>

                <div class="ssearch-form-group">
                  <label class="ssearch-label">Registered Mobile Number *</label>
                  <input type="text" name="mob" class="ssearch-input" placeholder="ENTER YOUR REGISTERED MOBILE NO." required />
                </div>

                <div style="margin-top:32px;">
                  <input type="submit" name="Submit" value="Show Your Details" class="ssearch-submit-btn" />
                </div>

                <?php if (isset($_GET["err"])): ?>
                  <div class="ssearch-error-box">
                    <span>⚠️</span>
                    <span>Your Registration ID does not match or payment status is pending. Please verify your Registration ID and Mobile Number.</span>
                  </div>
                <?php endif; ?>

              </form>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Admissions Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Admission_search.php" class="sidebar-link active">Search Application Status <span>→</span></a></li>
              <li><a href="admissionform.php" class="sidebar-link">Online Admission Form <span>→</span></a></li>
              <li><a href="scholarship.php" class="sidebar-link">Scholarships &amp; Welfare <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
              <li><a href="Result.php" class="sidebar-link">Examination Results <span>→</span></a></li>
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
