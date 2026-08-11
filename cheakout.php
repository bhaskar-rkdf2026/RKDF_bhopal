<?php
// ============================================================
// RKDF University — Online Admission Fee Checkout & Payment
// Connected to Applicant Session & Paytm Payment Gateway
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$app = $_SESSION['app_data'] ?? [];
$xid = $_SESSION['rid'] ?? ('RKDF' . date('Y') . rand(100000, 999999));
$mob = htmlspecialchars($app['mob'] ?? '');
$email = htmlspecialchars($app['email'] ?? '');
$studentName = htmlspecialchars($app['name'] ?? '');
$courseName = htmlspecialchars($app['course'] ?? '');
$branchName = htmlspecialchars($app['branch'] ?? '');
$orderId = "ORDS" . date('Ymd') . rand(10000, 99999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Registration Fee Payment — RKDF University Bhopal</title>
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
    .rkdf-pay-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 44px;
      box-shadow: 0 12px 40px rgba(12, 20, 36, 0.06);
      max-width: 820px;
      margin: 0 auto;
    }
    .pay-header-banner {
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
    .pay-order-id {
      font-family: 'JetBrains Mono', monospace;
      font-size: 15px;
      font-weight: 700;
      color: #F59E0B;
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.3);
      padding: 6px 14px;
      border-radius: 8px;
    }
    .form-row {
      margin-bottom: 24px;
    }
    .pay-label {
      display: block;
      font-size: 12.5px;
      font-weight: 700;
      color: #0C1424;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 8px;
    }
    .pay-input {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid rgba(12, 20, 36, 0.14);
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      color: #0C1424;
      background: #FAF9F5;
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
    }
    .pay-input:focus {
      border-color: #C5A059;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15);
    }
    .pay-submit-btn {
      width: 100%;
      background: linear-gradient(135deg, #E31B23 0%, #C9192A 100%);
      color: #ffffff !important;
      border: none;
      padding: 18px 36px;
      border-radius: 12px;
      font-weight: 800;
      font-size: 16.5px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 6px 20px rgba(227, 27, 35, 0.25);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      letter-spacing: 0.03em;
    }
    .pay-submit-btn:hover {
      background: linear-gradient(135deg, #FF1F29 0%, #D91A2B 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(227, 27, 35, 0.35);
    }
    .payment-badges {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 16px;
      margin-top: 24px;
      font-size: 12px;
      color: #64748B;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">81 · CENTRAL ADMISSIONS PAYMENT GATEWAY</span>
      <h1 class="rk-h1" style="font-size:clamp(2.2rem, 4.5vw, 4rem);margin-top:12px;">Online Registration Fee Payment</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="sp-main-box">
    <div class="rk-container">
      <div class="rkdf-pay-card">
        
        <form method="post" action="PaytmKit/pgRedirect.php" id="paytmPayForm">
          
          <div class="pay-header-banner">
            <div>
              <div style="font-size:12px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#94A3B8;">Transaction Order ID</div>
              <div class="pay-order-id" style="margin-top:6px;"><?= htmlspecialchars($orderId) ?></div>
            </div>
            <div>
              <div style="font-size:11px;font-weight:700;color:#94A3B8;text-transform:uppercase;margin-bottom:4px;text-align:right;">Student Reg ID</div>
              <div style="font-family:'JetBrains Mono',monospace;font-size:18px;font-weight:800;color:#22C55E;"><?= htmlspecialchars($xid) ?></div>
            </div>
          </div>

          <!-- Hidden Form Fields Required by Payment Gateway -->
          <input type="hidden" id="ORDER_ID" name="ORDER_ID" value="<?= htmlspecialchars($orderId) ?>">
          <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?= htmlspecialchars($xid) ?>">
          <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="PrivateEducation">
          <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">

          <?php if (!empty($studentName)): ?>
          <div style="background:#FAF9F5;border:1px solid #E2E8F0;border-radius:12px;padding:20px;margin-bottom:28px;">
            <div style="font-size:12px;font-weight:700;color:#C5A059;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:8px;">Applicant Information</div>
            <div style="font-size:17px;font-weight:800;color:#0C1424;"><?= $studentName ?></div>
            <?php if (!empty($courseName)): ?>
            <div style="font-size:14px;color:#475569;margin-top:4px;"><?= $courseName ?> <?= !empty($branchName) ? '('.$branchName.')' : '' ?></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>

          <div class="form-row">
            <label class="pay-label">Registration ID / Customer ID *</label>
            <input type="text" class="pay-input" value="<?= htmlspecialchars($xid) ?>" readonly style="background:#F1F5F9;cursor:not-allowed;" />
          </div>

          <div class="form-row">
            <label class="pay-label">Mobile Number *</label>
            <input title="Mobile Number" id="MSISDN" type="text" name="MSISDN" class="pay-input" value="<?= $mob ?>" placeholder="ENTER YOUR 10 DIGIT MOBILE NUMBER" required />
          </div>

          <div class="form-row">
            <label class="pay-label">Email Address *</label>
            <input title="Email Address" id="EMAIL" type="email" name="EMAIL" class="pay-input" value="<?= $email ?>" placeholder="ENTER YOUR EMAIL ADDRESS" required />
          </div>

          <div class="form-row">
            <label class="pay-label">Transaction Fee Amount (INR ₹) *</label>
            <input title="REGISTRATION AMOUNT" type="number" id="TXN_AMOUNT" name="TXN_AMOUNT" class="pay-input" value="1000" min="1000" required />
            <span style="font-size:12px;color:#64748B;font-weight:600;margin-top:6px;display:block;">* Minimum registration payment amount is ₹ 1,000/-</span>
          </div>

          <div style="margin-top:32px;">
            <button type="submit" class="pay-submit-btn">
              PROCEED TO PAY VIA PAYMENT GATEWAY ↗
            </button>
          </div>

          <div class="payment-badges">
            <span>🔒 256-Bit SSL Encryption</span>
            <span>·</span>
            <span>💳 Cards / UPI / Netbanking / Paytm</span>
          </div>

        </form>

      </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
