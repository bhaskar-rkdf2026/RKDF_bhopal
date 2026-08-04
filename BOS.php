<?php
// ============================================================
// RKDF University — Board of Studies (BOS)
// Luxury Prestige Design + 100% Exact BOS PDF Links Preserved
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
    
    .bos-grid-layout {
      display: grid;
      grid-template-columns: 8fr 4fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .bos-grid-layout { grid-template-columns: 1fr; }
    }

    .bos-table-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 48px;
    }
    .bos-table-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .bos-table-card th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 18px 24px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .bos-table-card td {
      padding: 16px 24px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
      color: var(--p-navy-deep);
    }
    .bos-table-card tr:hover td {
      background: rgba(220,38,38,0.02);
    }
    .bos-table-card a {
      color: var(--p-navy-deep);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .bos-table-card a:hover {
      color: var(--p-gold);
      text-decoration: underline;
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
      <span class="rk-eyebrow tone-gold">04 · Academic Governance</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Board of Studies (BOS)
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Official curriculum approvals, faculty course structures, and Board of Studies statutory notifications.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="bos-grid-layout">
        
        <!-- LEFT COLUMN: TABLES -->
        <div>
          
          <!-- TABLE 1: FACULTY BOARD OF STUDIES -->
          <span class="rk-eyebrow">Faculty Directory</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Board of Studies — Faculty Notifications</h2>
          
          <div class="bos-table-card">
            <table>
              <thead>
                <tr>
                  <th style="width:70px;">#</th>
                  <th>Faculty Board of Studies</th>
                  <th style="width:160px;text-align:right;">Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>01</strong></td>
                  <td>Board of Studies — Faculty of Agriculture</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Agriculture.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>02</strong></td>
                  <td>Board of Studies — Faculty of Architecture</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Architecture.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>03</strong></td>
                  <td>Board of Studies — Faculty of Commerce</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Commerce.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>04</strong></td>
                  <td>Board of Studies — Faculty of Engineering and Technology (2024)</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Engineering and Technology 2024.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>05</strong></td>
                  <td>Board of Studies — Faculty of Management</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Management.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>06</strong></td>
                  <td>Board of Studies — Faculty of Paramedical</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Paramedical.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>07</strong></td>
                  <td>Board of Studies — Faculty of Pharmaceutical Sciences</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Pharmaceutical Sciences.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>08</strong></td>
                  <td>Board of Studies — Faculty of Social Science</td>
                  <td style="text-align:right;"><a href="Content/Documents/board_of_management/Board of Studies Faculty of Social Science.pdf" target="_blank">📄 View PDF ↗</a></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- TABLE 2: FACULTY OF SOCIAL SCIENCE COURSE SYLLABUS PDFs -->
          <span class="rk-eyebrow">Departmental Syllabi</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">BOS — Faculty of Social Science (Nov-2025)</h2>
          
          <div class="bos-table-card">
            <table>
              <thead>
                <tr>
                  <th style="width:70px;">#</th>
                  <th>Course / Subject Code</th>
                  <th style="width:160px;text-align:right;">Syllabus PDF</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>01</strong></td>
                  <td>B.A-HI-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-701 &702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>02</strong></td>
                  <td>BA-EC-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EC- 701& 702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>03</strong></td>
                  <td>BA-SO-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-701 & 702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>04</strong></td>
                  <td>BA-EN-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EN-701 & 702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>05</strong></td>
                  <td>BA-PS-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-701 & 702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>06</strong></td>
                  <td>BAHS-701 &amp; 702</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BAHS-701 & 702.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>07</strong></td>
                  <td>B.A-HI-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/B.A-HI-801 & 802.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>08</strong></td>
                  <td>BA-EN-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-EN- 801 & 802.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>09</strong></td>
                  <td>BA-PS-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-PS-801 & 802.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>10</strong></td>
                  <td>BA-SO-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BA-SO-801 & 802.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>11</strong></td>
                  <td>BAHS-801 &amp; 802</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/BAHS-801 & 802.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>12</strong></td>
                  <td>Research Methodology 703</td>
                  <td style="text-align:right;"><a href="Content/Documents/BOS_Social_Science_Nov-2025/Research Methodology 703.pdf" target="_blank">📄 Download PDF ↗</a></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>

        <!-- RIGHT COLUMN: GOVERNANCE DIRECTORY SIDEBAR -->
        <div>
          <div class="side-gov-card">
            <div class="side-gov-title">Statutory Governance</div>
            <div class="side-gov-list">
              <a href="Academic_Council.php" class="side-gov-link"><span>📜</span> Academic Council</a>
              <a href="BOS.php" class="side-gov-link active"><span>📚</span> Board of Studies (BOS)</a>
              <a href="BoM.php" class="side-gov-link"><span>🏛️</span> Board of Management</a>
              <a href="Governingbody.php" class="side-gov-link"><span>⚖️</span> Governing Body</a>
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