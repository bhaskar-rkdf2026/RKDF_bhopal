<?php
// ============================================================
// RKDF University — Governing Body
// Luxury Prestige Governance Design
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Governing Body — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .govb-grid-layout {
      display: grid;
      grid-template-columns: 8fr 4fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .govb-grid-layout { grid-template-columns: 1fr; }
    }

    .govb-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-left: 4px solid var(--p-gold);
      border-radius: 16px;
      padding: 32px;
      box-shadow: 0 8px 30px rgba(12,20,36,0.06);
      margin-bottom: 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .govb-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--p-navy-deep);
      color: #ffffff !important;
      padding: 14px 24px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(12,20,36,0.12);
    }
    .govb-pdf-btn:hover {
      background: var(--p-gold);
      box-shadow: 0 8px 22px rgba(220,38,38,0.25);
      transform: translateY(-2px);
    }

    .side-gov-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 12px 32px rgba(12,20,36,0.06);
      position: sticky;
      top: 100px;
    }
    .side-gov-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      color: var(--p-navy-deep);
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--p-gold);
      font-weight: 700;
    }
    .side-gov-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .side-gov-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 16px;
      background: rgba(12,20,36,0.02);
      border: 1px solid var(--p-hairline);
      border-radius: 10px;
      color: var(--p-navy-deep);
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .side-gov-link:hover, .side-gov-link.active {
      background: var(--p-navy-deep);
      color: #ffffff !important;
      border-color: var(--p-navy-deep);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">04 · Apex Authority</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Governing Body
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        The supreme statutory authority responsible for university vision, policy direction, and institutional governance.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="govb-grid-layout">
        
        <!-- LEFT COLUMN: GOVERNING BODY CARD -->
        <div>
          <span class="rk-eyebrow">Supreme Statutory Body</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Governing Body Directory</h2>

          <div class="govb-card">
            <div>
              <h3 style="font-family:var(--p-font-serif);font-size:24px;color:var(--p-navy-deep);margin-bottom:8px;">
                Governing Body Member Directory
              </h3>
              <p style="font-size:15px;color:rgba(12,20,36,0.7);max-width:540px;">
                Official statutory constitution and member list of the Governing Body of RKDF University Bhopal.
              </p>
            </div>
            <a href="Content/Documents/governing_body/Governing Body Member 2022.pdf" target="_blank" class="govb-pdf-btn">
              📄 View Governing Body Members (PDF) ↗
            </a>
          </div>

          <div style="background:#ffffff;border:1px solid var(--p-hairline);border-radius:16px;padding:32px;box-shadow:0 4px 20px rgba(12,20,36,0.04);">
            <h3 style="font-family:var(--p-font-serif);font-size:22px;color:var(--p-navy-deep);margin-bottom:14px;">
              Statutory Roles &amp; Responsibilities
            </h3>
            <p style="font-size:16px;line-height:1.8;color:rgba(12,20,36,0.8);">
              The Governing Body is the supreme authority of RKDF University, Bhopal. It frames statutes, approves annual budgets, sets strategic growth objectives, ensures statutory compliance with regulatory councils, and provides high-level vision for university expansion and research leadership.
            </p>
          </div>
        </div>

        <!-- RIGHT COLUMN: GOVERNANCE DIRECTORY SIDEBAR -->
        <div>
          <div class="side-gov-card">
            <div class="side-gov-title">Statutory Governance</div>
            <div class="side-gov-list">
              <a href="Academic_Council.php" class="side-gov-link"><span>📜</span> Academic Council</a>
              <a href="BOS.php" class="side-gov-link"><span>📚</span> Board of Studies (BOS)</a>
              <a href="BoM.php" class="side-gov-link"><span>🏛️</span> Board of Management</a>
              <a href="Governingbody.php" class="side-gov-link active"><span>⚖️</span> Governing Body</a>
              <a href="Statuary-Bodies.php" class="side-gov-link"><span>📋</span> Statutory Bodies</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>