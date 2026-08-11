<?php
// ============================================================
// RKDF University — Applicant Status & Payment Details
// Connected to Applicant Session & CMS PDO Database
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$app = $_SESSION['app_data'] ?? [];
$id          = htmlspecialchars($_SESSION['rid'] ?? 'RKDF2026');
$name        = htmlspecialchars($app['name'] ?? 'N/A');
$fname       = htmlspecialchars($app['fname'] ?? 'N/A');
$course      = htmlspecialchars($app['course'] ?? 'N/A');
$branch      = htmlspecialchars($app['branch'] ?? 'N/A');
$mob         = htmlspecialchars($app['mob'] ?? 'N/A');
$email       = htmlspecialchars($app['email'] ?? 'N/A');
$ref         = htmlspecialchars($app['ref'] ?? 'N/A');
$qual10th    = htmlspecialchars($app['qual_10th'] ?? 'N/A');
$qual12th    = htmlspecialchars($app['qual_12th'] ?? 'N/A');
$qualDiploma = htmlspecialchars($app['qual_diploma'] ?? 'N/A');
$qualGrad    = htmlspecialchars($app['qual_grad'] ?? 'N/A');
$qualPg      = htmlspecialchars($app['qual_pg'] ?? 'N/A');
$ORDER_ID    = htmlspecialchars($_SESSION['order_id'] ?? ('ORDS' . date('Ymd') . rand(1000,9999)));
$TXN_ID      = htmlspecialchars($_SESSION['txn_id'] ?? 'PROVISIONAL_PENDING');
$TXN_AMOUNT  = htmlspecialchars($_SESSION['txn_amount'] ?? '1000');
$TXNDATE     = htmlspecialchars($_SESSION['txn_date'] ?? date('Y-m-d H:i:s'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applicant Status &amp; Payment Details — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.95) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }
    .rkdf-detail-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 44px;
      box-shadow: 0 12px 40px rgba(12, 20, 36, 0.06);
      max-width: 920px;
      margin: 0 auto;
    }
    .detail-header-banner {
      background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
      color: #ffffff;
      padding: 24px 32px;
      border-radius: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 32px;
    }
    .detail-reg-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 20px;
      font-weight: 800;
      color: #F59E0B;
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.3);
      padding: 6px 16px;
      border-radius: 8px;
      letter-spacing: 0.05em;
    }
    .detail-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 32px;
    }
    @media (max-width: 768px) {
      .detail-grid { grid-template-columns: 1fr; }
    }
    .detail-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 12px;
      padding: 18px 22px;
    }
    .detail-box-label {
      font-size: 11.5px;
      font-weight: 700;
      color: #64748B;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 6px;
    }
    .detail-box-val {
      font-size: 16px;
      font-weight: 700;
      color: #0C1424;
    }
    .detail-box-val.mono {
      font-family: 'JetBrains Mono', monospace;
      color: #E31B23;
    }
    .btn-action-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      margin-top: 36px;
      padding-top: 24px;
      border-top: 1px solid #E2E8F0;
    }
    .btn-print {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff !important;
      border: none;
      padding: 14px 28px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14.5px;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 4px 14px rgba(12, 20, 36, 0.12);
    }
    .btn-print:hover {
      background: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(197, 160, 89, 0.25);
    }
    .btn-pay {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #E31B23 0%, #C9192A 100%);
      color: #ffffff !important;
      text-decoration: none !important;
      padding: 14px 28px;
      border-radius: 10px;
      font-weight: 800;
      font-size: 14.5px;
      transition: all 0.25s ease;
      box-shadow: 0 4px 14px rgba(227, 27, 35, 0.2);
    }
    .btn-pay:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 22px rgba(227, 27, 35, 0.3);
    }

    /* Print Styles */
    @media print {
      body * { visibility: hidden; }
      .rkdf-detail-card, .rkdf-detail-card * { visibility: visible; }
      .rkdf-detail-card {
        position: absolute;
        left: 0; top: 0; width: 100%;
        box-shadow: none; border: 1px solid #000;
      }
      .btn-action-row, .rkdf-navbar-wrap, .rk-footer { display: none !important; }
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">81 · CENTRAL ADMISSIONS PORTAL 2026-27</span>
      <h1 class="rk-h1" style="font-size:clamp(2.2rem, 4.5vw, 4rem);margin-top:12px;">Application Details &amp; Payment Status</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="sp-main-box">
    <div class="rk-container">
      <div class="rkdf-detail-card">
        
        <div class="detail-header-banner">
          <div>
            <div style="font-size:12px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#94A3B8;">Application Status</div>
            <div style="font-size:18px;font-weight:800;color:#22C55E;margin-top:4px;">PROVISIONAL ADMISSION REGISTERED</div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:#94A3B8;text-transform:uppercase;margin-bottom:4px;text-align:right;">Registration ID</div>
            <div class="detail-reg-badge"><?= $id ?></div>
          </div>
        </div>

        <h3 style="font-family:'Playfair Display',Georgia,serif;font-size:20px;font-weight:700;color:#0C1424;margin-bottom:20px;">Applicant Summary &amp; Fee Details</h3>

        <div class="detail-grid">
          <div class="detail-box">
            <div class="detail-box-label">Registration ID</div>
            <div class="detail-box-val mono"><?= $id ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Student Full Name</div>
            <div class="detail-box-val"><?= $name ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Father's Name</div>
            <div class="detail-box-val"><?= $fname ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Course / Discipline</div>
            <div class="detail-box-val"><?= $course ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Specialization / Branch</div>
            <div class="detail-box-val"><?= $branch ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Mobile Number</div>
            <div class="detail-box-val"><?= $mob ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Email Address</div>
            <div class="detail-box-val"><?= $email ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Reference / Counselor</div>
            <div class="detail-box-val"><?= $ref ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">10th Qualification</div>
            <div class="detail-box-val"><?= $qual10th ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">12th Qualification</div>
            <div class="detail-box-val"><?= $qual12th ?></div>
          </div>

          <?php if ($qualDiploma !== 'N/A'): ?>
          <div class="detail-box">
            <div class="detail-box-label">Diploma Qualification</div>
            <div class="detail-box-val"><?= $qualDiploma ?></div>
          </div>
          <?php endif; ?>

          <?php if ($qualGrad !== 'N/A'): ?>
          <div class="detail-box">
            <div class="detail-box-label">Graduation Qualification</div>
            <div class="detail-box-val"><?= $qualGrad ?></div>
          </div>
          <?php endif; ?>

          <?php if ($qualPg !== 'N/A'): ?>
          <div class="detail-box">
            <div class="detail-box-label">Post Graduation</div>
            <div class="detail-box-val"><?= $qualPg ?></div>
          </div>
          <?php endif; ?>

          <div class="detail-box">
            <div class="detail-box-label">Transaction Order ID</div>
            <div class="detail-box-val mono"><?= $ORDER_ID ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Payment Transaction ID</div>
            <div class="detail-box-val" style="color:#0284C7;"><?= $TXN_ID ?></div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Fee Amount</div>
            <div class="detail-box-val" style="color:#16A34A;">₹ <?= $TXN_AMOUNT ?> /-</div>
          </div>

          <div class="detail-box">
            <div class="detail-box-label">Date &amp; Time</div>
            <div class="detail-box-val" style="font-size:14px;"><?= $TXNDATE ?></div>
          </div>
        </div>

        <div class="btn-action-row">
          <button type="button" class="btn-print" onclick="window.print();">
            🖨️ Print / Save Receipt PDF
          </button>
          <a href="cheakout.php" class="btn-pay">
            💳 Pay Registration Fee Online ↗
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
