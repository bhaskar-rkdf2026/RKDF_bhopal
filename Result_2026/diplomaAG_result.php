<?php
// ============================================================
// RKDF University — Diploma Agriculture Examination Result Portal (Session June 2026)
// World-Class Premium Design + Official Site Navbar & Footer
// ============================================================
session_start();
require_once __DIR__ . '/../include/site_settings.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diploma Agriculture Result June 2026 — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/rkdf-home.css">
  <link rel="stylesheet" href="../css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('../images/lovable/rkdf-building-enhanced.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .dag-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .dag-grid-layout { display: grid; grid-template-columns: 8fr 4fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .dag-grid-layout { grid-template-columns: 1fr; } }

    .dag-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 30px rgba(12, 20, 36, 0.06);
    }

    .dag-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 26px 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .dag-badge {
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

    .dag-card-body { padding: 40px; }

    .dag-form-group {
      margin-bottom: 24px;
    }

    .dag-label {
      display: block;
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 10px;
    }

    .dag-input {
      width: 100%;
      padding: 16px 20px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 18px;
      font-weight: 600;
      color: #0C1424;
      background: #FAF9F5;
      border: 2px solid rgba(12, 20, 36, 0.12);
      border-radius: 10px;
      outline: none;
      transition: all 0.25s ease;
      text-transform: uppercase;
    }
    .dag-input:focus {
      border-color: #E31B23;
      background: #ffffff;
      box-shadow: 0 0 0 4px rgba(227, 27, 35, 0.1);
    }

    .dag-submit-btn {
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
    }
    .dag-submit-btn:hover {
      background: #0C1424;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(12, 20, 36, 0.2);
    }

    .dag-error-box {
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.25);
      color: #E31B23;
      padding: 14px 20px;
      border-radius: 10px;
      font-size: 14.5px;
      font-weight: 600;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
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
  <?php include __DIR__ . '/../include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">EXAMINATION BRANCH · DIPLOMA RESULTS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Diploma Agriculture Result</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official examination result scorecard portal for Diploma in Agriculture (Session June 2026).
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="dag-main-section">
    <div class="rk-container">
      <div class="dag-grid-layout">
        
        <!-- LEFT COLUMN: SEARCH RESULT FORM -->
        <div>
          <div class="dag-card">
            <div class="dag-card-header">
              <h2 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;margin:0;color:#ffffff;">
                RESULT : DIPLOMA AG. JUN - 2026
              </h2>
              <span class="dag-badge">OFFICIAL GAZETTE</span>
            </div>

            <div class="dag-card-body">

              <?php if (isset($_GET["err"])): ?>
              <div class="dag-error-box">
                <span>⚠️</span>
                <span>This Roll Number does not exist in the Diploma Agriculture June 2026 result database. Please check and re-enter your valid Roll Number.</span>
              </div>
              <?php endif; ?>

              <form method="post" action="diploma_login.php">
                <div class="dag-form-group">
                  <label for="rno" class="dag-label">Enter University Roll Number / Enrollment No.</label>
                  <input type="text" id="rno" name="rno" class="dag-input" placeholder="e.g. 26DAG1001" required autofocus autocomplete="off">
                </div>

                <button type="submit" name="Submit" class="dag-submit-btn">
                  <span>🎓 Show Digital Scorecard</span> <span>↗</span>
                </button>
              </form>

              <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(12,20,36,0.08);font-size:14px;color:#64748B;line-height:1.6;">
                <strong>Note:</strong> For any discrepancies in marks or revaluation applications, please submit the official Revaluation Form to the Controller of Examinations within 10 days of result declaration.
              </div>

            </div>
          </div>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Results Menu</h3>
            <ul class="sidebar-nav-list">
              <li><a href="../Result.php" class="sidebar-link active"><span>Online Results</span> <span>↗</span></a></li>
              <li><a href="../page.php?slug=exam-notice" class="sidebar-link"><span>Examination Notices</span> <span>↗</span></a></li>
              <li><a href="../page.php?slug=exam-timetable" class="sidebar-link"><span>Exam Time Table</span> <span>↗</span></a></li>
              <li><a href="../result_2016/revel_form.pdf" target="_blank" class="sidebar-link"><span>Revaluation Form</span> <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link"><span>Student ERP Portal</span> <span>↗</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include __DIR__ . '/../include/footer.php'; ?>

</body>
</html>