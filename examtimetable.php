<?php
// ============================================================
// RKDF University — Examination Time Table Portal (Session 2026)
// World-Class Premium Design + High-Res Media Assets + 100% Original PDF & Portal Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examination Time Table — RKDF University Bhopal</title>
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
                  url('images/ai_examtimetable/rkdf_tt_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sett-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sett-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sett-grid-layout { grid-template-columns: 1fr; }
    }

    .sett-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sett-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sett-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sett-badge {
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

    .sett-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sett-card-body {
      padding: 32px 36px;
    }

    .sett-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .sett-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .sett-block-card:hover .sett-media-img {
      transform: scale(1.04);
    }

    /* Section Headers */
    .sett-sec-heading {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #0C1424;
      margin: 28px 0 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .sett-sec-heading.red {
      border-bottom-color: #E31B23;
    }

    /* Download Grids */
    .sett-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .sett-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .sett-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .sett-row-title {
      font-size: 14px;
      font-weight: 700;
      color: #0C1424;
    }

    .sett-pdf-link {
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
    .sett-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">72 · CONTROLLER OF EXAMINATIONS (EXAM TIMETABLES)</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Examination Time Tables</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official semester date sheets, examination timetables, and supplementary exam schedules across Diploma, Under-Graduate, and Post-Graduate faculties.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sett-main-section">
    <div class="rk-container">
      <div class="sett-grid-layout">
        
        <!-- LEFT COLUMN: EXAM TIMETABLE DOWNLOADS BY SESSION -->
        <div>

          <article class="sett-block-card">
            <div class="sett-card-header">
              <h2 class="sett-card-title">Official Examination Timetables</h2>
              <span class="sett-badge">SESSION 2026 SCHEDULES</span>
            </div>
            <div class="sett-card-body">

              <div class="sett-media-frame">
                <img src="images/ai_examtimetable/rkdf_tt_card.jpg" alt="RKDF Examination Hall &amp; Controller of Examinations Center" class="sett-media-img">
              </div>

              <!-- 1. APRIL 2026 SESSION -->
              <div class="sett-sec-heading">
                <span>Examination Time Table — Session April 2026</span>
              </div>
              <div class="sett-download-grid">
                <div class="sett-download-row">
                  <span class="sett-row-title">HOMOEOPATHY M.D. PART-1 APRIL-2026</span>
                  <a href="exam/timetable_april_26/HOMOEOPATHY%20M.D%20PART-1%20TIME%20TABLE%20APRIL-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- 2. AUGUST 2026 SUPPLEMENTARY SESSION -->
              <div class="sett-sec-heading red">
                <span>Examination Time Table — Session August 2026</span>
              </div>
              <div class="sett-download-grid">
                <div class="sett-download-row">
                  <span class="sett-row-title">D.PHARM SUPPLEMENTARY AUGUST-2026</span>
                  <a href="exam/timetable_aug26/D.PHARM%20SUPPLEMENTARY%20%20EXAM%20TIME%20TABLE%20AUGUST%20-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- 3. JUNE 2026 DIPLOMA PROGRAMMES -->
              <div class="sett-sec-heading">
                <span>Diploma Programme Timetable — June 2026</span>
              </div>
              <div class="sett-download-grid">
                <div class="sett-download-row">
                  <span class="sett-row-title">D.ARCH TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/D.ARCH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">DIPLOMA ENGG TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/DIPLOMA%20ENGG%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">DIPLOMA IN X-RAY JUNE-2026</span>
                  <a href="exam/timetable_june26/DIPLOMA%20IN%20X-RAY%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">DMLT TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/DMLT%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- 4. JUNE 2026 POST-GRADUATE PROGRAMMES -->
              <div class="sett-sec-heading red">
                <span>Post-Graduate Programme Timetable — June 2026</span>
              </div>
              <div class="sett-download-grid">
                <div class="sett-download-row">
                  <span class="sett-row-title">LLM ALL BRANCH JUNE-2026</span>
                  <a href="exam/timetable_june26/LLM%20ALL%20BRANCH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.COM NEP JUNE-2026</span>
                  <a href="exam/timetable_june26/M.COM%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.COM TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.COM%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.ED TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.ED%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.PHARM TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.PHARM%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.PHARM 3RD SEM JUNE-2026</span>
                  <a href="exam/timetable_june26/M.PHARM%203RD%20SEM%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.SC AGRICULTURE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.SC%20AG%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.SC NEP JUNE-2026</span>
                  <a href="exam/timetable_june26/M.SC%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.SC TIMETABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.Sc%20TIMETABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">M.TECH TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/M.TECH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">MA ALL BRANCH JUNE-2026</span>
                  <a href="exam/timetable_june26/MA%20ALL%20BRANCH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">MA NEP TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/MA%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">MBA TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/MBA%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">MCA TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/MCA%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">MSW TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/MSW%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- 5. JUNE 2026 UNDER-GRADUATE PROGRAMMES -->
              <div class="sett-sec-heading">
                <span>Under-Graduate Programme Timetable — June 2026</span>
              </div>
              <div class="sett-download-grid">
                <div class="sett-download-row">
                  <span class="sett-row-title">BAMS 2nd Professional June-2026</span>
                  <a href="exam/timetable_june26/TIME%20TABLE%20BAMS%202nd%20%20PROFESSIONAL%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BAMS 3rd Professional Regular / Supp.</span>
                  <a href="exam/timetable_june26/TIME%20TABLE%20BAMS%203RD%20PROFESSIONAL%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BA (2021 Batch) June-2026</span>
                  <a href="exam/timetable_june26/BA%202021%20BATCH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.ARCH TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.ARCH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.COM NEP JUNE-2026</span>
                  <a href="exam/timetable_june26/B.COM%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.ED TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.ED%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.PHARM TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.PHARM%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.SC AGRICULTURE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.SC%20AGRICULTURE%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.SC OLD SCHEME JUNE-2026</span>
                  <a href="exam/timetable_june26/B.SC%20OLD%20SCHEME%20%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.SC NEP TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.SC%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.TECH AG JUNE-2026</span>
                  <a href="exam/timetable_june26/B.TECH%20AG%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">B.TECH TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/B.TECH%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BA NEP TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BA%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BALLB TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BALLB%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BBA TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BBA%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BCA NEP TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BCA%20NEP%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BMLT TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BMLT%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">LLB TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/LLB%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BPT TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BPT%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="sett-download-row">
                  <span class="sett-row-title">BSW TIME TABLE JUNE-2026</span>
                  <a href="exam/timetable_june26/BSW%20TIME%20TABLE%20JUNE-2026.pdf" target="_blank" class="sett-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Exam Alerts Menu</h3>
            <ul class="sidebar-nav-list">
              <li><a href="exam.php" class="sidebar-link">Examination Alerts <span>→</span></a></li>
              <li><a href="examtimetable.php" class="sidebar-link active">Exam Time Table <span>→</span></a></li>
              <li><a href="Result.php" class="sidebar-link">Examination Results <span>→</span></a></li>
              <li><a href="https://erplive.rkdf.ac.in/" target="_blank" class="sidebar-link">Student ERP Portal <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20Hindi.pdf" target="_blank" class="sidebar-link">Degree Form (Hindi) <span>↗</span></a></li>
              <li><a href="forms/Application%20For%20English.pdf" target="_blank" class="sidebar-link">Degree Form (English) <span>↗</span></a></li>
              <li><a href="acadmiccalander.php" class="sidebar-link">Academic Calendar <span>→</span></a></li>
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
