<?php
// ============================================================
// RKDF University — Online Examination Results Portal
// World-Class Premium Design + High-Res Media Assets + 100% Original Result PDF & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examination Results — RKDF University Bhopal</title>
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
                  url('images/ai_result/rkdf_res_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sres-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sres-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sres-grid-layout { grid-template-columns: 1fr; }
    }

    .sres-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sres-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sres-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sres-badge {
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

    .sres-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sres-card-body {
      padding: 32px 36px;
    }

    .sres-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sres-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sres-block-card:hover .sres-media-img {
      transform: scale(1.04);
    }

    /* Important Alert Pill */
    .sres-alert-banner {
      background: linear-gradient(135deg, rgba(227,27,35,0.08) 0%, rgba(227,27,35,0.04) 100%);
      border: 1px solid rgba(227,27,35,0.2);
      border-radius: 14px;
      padding: 20px 24px;
      margin-bottom: 32px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .sres-alert-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }
    .sres-alert-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #E31B23;
    }

    /* Section Headers */
    .sres-sec-heading {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
      margin: 28px 0 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
    }
    .sres-sec-heading.red {
      border-bottom-color: #E31B23;
    }

    /* Result Download Grid */
    .sres-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .sres-download-row {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 18px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
      gap: 10px;
    }
    .sres-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .sres-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }

    .sres-row-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 4px;
    }

    .sres-reval-tag {
      font-size: 11px;
      font-family: 'JetBrains Mono', monospace;
      color: #64748B;
      font-weight: 600;
    }

    .sres-portal-btn {
      font-size: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .sres-portal-btn:hover {
      background: #E31B23;
      color: #ffffff !important;
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
      <span class="rk-eyebrow tone-gold">73 · ONLINE RESULTS &amp; REVALUATION PORTAL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Examination Results</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Declared semester examination results, ERP student marksheet login, revaluation application deadlines, and official grade circulars.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sres-main-section">
    <div class="rk-container">
      <div class="sres-grid-layout">
        
        <!-- LEFT COLUMN: DECLARED RESULTS BY SESSION -->
        <div>

          <article class="sres-block-card">
            <div class="sres-card-header">
              <h2 class="sres-card-title">Declared Examination Results</h2>
              <span class="sres-badge">LIVE ERP RESULTS</span>
            </div>
            <div class="sres-card-body">

              <div class="sres-media-frame">
                <img src="images/ai_result/rkdf_res_card.jpg" alt="RKDF Examination Results &amp; Marks Evaluation Center" class="sres-media-img">
              </div>

              <!-- TOP NOTICE BANNER -->
              <div class="sres-alert-banner">
                <div class="sres-alert-item">
                  <span class="sres-alert-title">📢 Important Notice — EXAM POSTPONED FEB-2026</span>
                  <a href="https://www.rkdf.ac.in/exam.php" class="sres-portal-btn">View Notice ↗</a>
                </div>
                <div class="sres-alert-item">
                  <span class="sres-alert-title">💳 Tuition Fees &amp; Examination Circular</span>
                  <a href="https://www.rkdf.ac.in/exam.php" class="sres-portal-btn">View Notice ↗</a>
                </div>
              </div>

              <!-- 1. RESULTS SESSION FEB-2026 -->
              <div class="sres-sec-heading">
                <span>Results Session Feb-2026</span>
              </div>
              <div class="sres-download-grid">
                
                <div class="sres-download-row">
                  <span class="sres-row-title">BAMS — 1st Sem (Regular / Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BHMS — 4th Sem (Regular / Reappear)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BHMS — 3rd Sem (Regular / Reappear)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.SC NURSING — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.SC NURSING (New Scheme) — 7th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.SC NURSING (New Scheme) — 6th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.SC NURSING (New Scheme) — 1st Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

              </div>

              <!-- 2. RESULTS SESSION JUNE-2026 -->
              <div class="sres-sec-heading red">
                <span>Results Session June-2026</span>
              </div>
              <div class="sres-download-grid">

                <div class="sres-download-row">
                  <span class="sres-row-title">B.ARCH — 10th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MBA — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MBA — 3rd Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MCA — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">Diploma Engg (ME/CE/EE/ET/CSE) — 5th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 24/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">Diploma Engg (CE/CS/EE/ME/ET) — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 21/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">Diploma Engg Lateral — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 21/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.PHARMA — 8th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 20/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.PHARMA (Lateral) — 8th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 20/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.PHARMA — 7th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 20/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.PHARMA (Lateral) — 7th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 20/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.Sc (NEP) — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: 20/07/2026</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BE All Branches (Reg + Lat) — 8th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BE All Branches (Reg + Lat) — 7th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BCA — 5th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.Sc (Ag) — 7th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BALLB — 10th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BALLB — 9th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">LLB — 6th Sem (Regular / Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">LLB — 5th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">LLM — 2nd Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">LLM — 1st Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.Sc (Biotech) — 4th Sem (Regular / Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.Sc All Disciplines — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.Sc (Biotech / Maths / Physics) — 3rd Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BCA (NEP) — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.ED — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.ED — 3rd Sem (Reappear)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.ED — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.ED — 3rd Sem (Reappear)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BA — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BA — 5th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MA All Disciplines — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MA All Disciplines — 3rd Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">MSW — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.COM (NEP) — 6 / 5 Sem (Regular / Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.COM COMPUTER (NEP) — 6 / 5 Sem (Reg / Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">M.COM — 4th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.SC (Ag) — 8th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">B.TECH (Ag) — 8th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">Diploma Agriculture — June 2026</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Official Result</span>
                    <a href="https://rkdf.ac.in/Result_2026/diplomaAG_result.php" target="_blank" class="sres-portal-btn">View Result ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BBA — 6th Sem (Regular)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

                <div class="sres-download-row">
                  <span class="sres-row-title">BBA — 5th Sem (Ex)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>

              </div>

              <!-- 3. RESULTS SESSION DEC-2025 -->
              <div class="sres-sec-heading">
                <span>Results Session Dec-2025</span>
              </div>
              <div class="sres-download-grid">
                <div class="sres-download-row">
                  <span class="sres-row-title">BAMS — 2nd Sem (Regular / Reappear)</span>
                  <div class="sres-row-footer">
                    <span class="sres-reval-tag">Reval: Next 10 days</span>
                    <a href="https://erplive.rkdf.ac.in/" target="_blank" class="sres-portal-btn">ERP Login ↗</a>
                  </div>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Results Menu</h3>
            <ul class="sidebar-nav-list">
              <li><a href="exam.php" class="sidebar-link">Examination Alerts <span>→</span></a></li>
              <li><a href="examtimetable.php" class="sidebar-link">Exam Time Table <span>→</span></a></li>
              <li><a href="Result.php" class="sidebar-link active">Online Results <span>→</span></a></li>
              <li><a href="result/revel_form.pdf" target="_blank" class="sidebar-link">Revaluation Form <span>↗</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link">Student ERP Portal <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20Hindi.pdf" target="_blank" class="sidebar-link">Degree Form (Hindi) <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20English.pdf" target="_blank" class="sidebar-link">Degree Form (English) <span>↗</span></a></li>
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
