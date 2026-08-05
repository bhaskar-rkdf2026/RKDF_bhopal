<?php
// ============================================================
// RKDF University — Board of Studies (BOS)
// World-Class Premium Design + High-Res Media Assets + 100% Original PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Board of Studies (BOS) — RKDF University Bhopal</title>
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
                  url('images/ai_bos/rkdf_bos_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .bos-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .bos-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .bos-grid-layout { grid-template-columns: 1fr; }
    }

    .bos-table-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 48px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .bos-table-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .bos-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .bos-badge {
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

    .bos-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .bos-table-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .bos-table-card th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 18px 28px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .bos-table-card td {
      padding: 18px 28px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 15px;
      color: #334155;
    }
    .bos-table-card tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .bos-pdf-link {
      color: #E31B23;
      font-weight: 700;
      text-decoration: none;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.06);
      border: 1px solid rgba(227, 27, 35, 0.15);
      transition: all 0.25s ease;
    }
    .bos-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
      border-color: #E31B23;
      transform: translateX(3px);
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
      <span class="rk-eyebrow tone-gold">16 · ACADEMIC GOVERNANCE</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Board of Studies (BOS)</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official curriculum approvals, faculty course structures, and Board of Studies statutory notifications.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="bos-main-section">
    <div class="rk-container">
      <div class="bos-grid-layout">
        
        <!-- LEFT COLUMN: TABLES -->
        <div>

          <!-- TABLE 1: FACULTY BOARD OF STUDIES -->
          <article class="bos-table-card">
            <div class="bos-card-header">
              <h2 class="bos-card-title">Faculty Board of Studies — Official Notifications</h2>
              <span class="bos-badge">FACULTY DIRECTORY</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th style="width:70px;">#</th>
                  <th>Faculty Board of Studies Notification</th>
                  <th style="width:180px;text-align:right;">Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>01</strong></td>
                  <td>Board of Studies — Faculty of Agriculture</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Agriculture.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>02</strong></td>
                  <td>Board of Studies — Faculty of Architecture</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Architecture.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>03</strong></td>
                  <td>Board of Studies — Faculty of Commerce</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Commerce.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>04</strong></td>
                  <td>Board of Studies — Faculty of Engineering and Technology (2024)</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Engineering and Technology 2024.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>05</strong></td>
                  <td>Board of Studies — Faculty of Management</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Management.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>06</strong></td>
                  <td>Board of Studies — Faculty of Paramedical</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Paramedical.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>07</strong></td>
                  <td>Board of Studies — Faculty of Pharmaceutical Sciences</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Pharmaceutical Sciences.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>08</strong></td>
                  <td>Board of Studies — Faculty of Social Science</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Social Science.pdf" target="_blank" class="bos-pdf-link">📄 View PDF ↗</a></td>
                </tr>
              </tbody>
            </table>
          </article>

          <!-- TABLE 2: FACULTY OF SOCIAL SCIENCE COURSE SYLLABUS PDFs -->
          <article class="bos-table-card">
            <div class="bos-card-header" style="background:#0C1424;border-bottom-color:#E31B23;">
              <h2 class="bos-card-title">BOS — Faculty of Social Science (Nov-2025)</h2>
              <span class="bos-badge" style="color:#E31B23;border-color:rgba(227,27,35,0.3);background:rgba(227,27,35,0.1);">DEPARTMENTAL Syllabus</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th style="width:70px;">#</th>
                  <th>Course / Subject Code</th>
                  <th style="width:180px;text-align:right;">Syllabus PDF</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>01</strong></td>
                  <td>B.A-HI-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-701 &amp;702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>02</strong></td>
                  <td>BA-EC-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EC- 701&amp; 702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>03</strong></td>
                  <td>BA-SO-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-701 &amp; 702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>04</strong></td>
                  <td>BA-EN-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EN-701 &amp; 702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>05</strong></td>
                  <td>BA-PS-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-701 &amp; 702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>06</strong></td>
                  <td>BAHS-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BAHS-701 &amp; 702.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>07</strong></td>
                  <td>B.A-HI-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-801 &amp; 802.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>08</strong></td>
                  <td>BA-EN-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EN- 801 &amp; 802.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>09</strong></td>
                  <td>BA-PS-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-801 &amp; 802.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>10</strong></td>
                  <td>BA-SO-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-801 &amp; 802.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>11</strong></td>
                  <td>BAHS-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BAHS-801 &amp; 802.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>12</strong></td>
                  <td>Research Methodology 703</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/Research Methodology 703.pdf" target="_blank" class="bos-pdf-link">📄 Download PDF ↗</a></td>
                </tr>
              </tbody>
            </table>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Statutory Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Academic_Council.php" class="sidebar-link">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link active">Board of Studies (BOS) <span>→</span></a></li>
              <li><a href="BoM.php" class="sidebar-link">Board of Management <span>→</span></a></li>
              <li><a href="Governingbody.php" class="sidebar-link">Governing Body <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
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