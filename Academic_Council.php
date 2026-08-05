<?php
// ============================================================
// RKDF University — Academic Council
// World-Class Premium Design + High-Res Media Assets + 100% Original Meeting PDFs Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Council — RKDF University Bhopal</title>
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
                  url('images/ai_academic_council/rkdf_ac_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ac-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ac-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ac-grid-layout { grid-template-columns: 1fr; }
    }

    .ac-featured-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-left: 4px solid #C5A059;
      border-radius: 20px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      transition: transform 0.35s ease;
    }
    .ac-featured-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 36px rgba(12, 20, 36, 0.08);
    }

    .ac-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff !important;
      padding: 14px 24px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14.5px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(12,20,36,0.12);
    }
    .ac-pdf-btn:hover {
      background: #E31B23;
      box-shadow: 0 8px 22px rgba(227,27,35,0.3);
      transform: translateY(-2px);
    }

    .ac-table-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 48px;
    }

    .ac-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ac-badge {
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

    .ac-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ac-table-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .ac-table-card th {
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
    .ac-table-card td {
      padding: 18px 28px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 15px;
      color: #334155;
    }
    .ac-table-card tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .ac-doc-link {
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
    .ac-doc-link:hover {
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
      <span class="rk-eyebrow tone-gold">17 · STATUTORY GOVERNANCE</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Academic Council</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        The apex academic decision-making body responsible for curriculum standards, academic policies, examination regulations, and degree approvals.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ac-main-section">
    <div class="rk-container">
      <div class="ac-grid-layout">
        
        <!-- LEFT COLUMN: FEATURED CARD & MEETINGS TABLE -->
        <div>

          <!-- FEATURED CARD: ACADEMIC COUNCIL MEMBERS 2024 -->
          <div class="ac-featured-card">
            <div>
              <span class="ac-badge">STATUTORY DIRECTORY</span>
              <h2 style="font-family:'Playfair Display',serif;font-size:26px;color:#0C1424;margin-top:10px;margin-bottom:8px;">
                Academic Council Members 2024
              </h2>
              <p style="font-size:15px;color:#475569;max-width:580px;margin:0;">
                Official statutory constitution of the Academic Council members, deans, and external academic experts governing institutional affairs.
              </p>
            </div>
            <a href="Content/Documents/academic_council/Academic Council Members 2024.pdf" target="_blank" class="ac-pdf-btn">
              📄 View Members List (PDF) ↗
            </a>
          </div>

          <!-- ACADEMIC COUNCIL MEETINGS TABLE -->
          <article class="ac-table-card">
            <div class="ac-card-header">
              <h2 class="ac-card-title">Academic Council Meeting Minutes</h2>
              <span class="ac-badge">OFFICIAL MINUTES</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th style="width:100px;">Meeting #</th>
                  <th>Meeting Date &amp; Description</th>
                  <th style="width:180px;text-align:right;">Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>01</strong></td>
                  <td>1st Academic Council Meeting — 17.02.2012</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/1 Academic Council meeting date  17.02.2012.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>02</strong></td>
                  <td>2nd Academic Council Meeting — 02.04.2012</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/2 Academic Council meeting date  02.04.2012.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>03</strong></td>
                  <td>3rd Academic Council Meeting — 20.07.2012</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/3 Academic Council meeting  date 20.07.2012.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>04</strong></td>
                  <td>4th Academic Council Meeting — 09.01.2013</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/4 Academic Council meeting Date 09.01.2013.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>05</strong></td>
                  <td>5th Academic Council Meeting — 20.09.2013</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/5 Academic Council meeting Date 20.09.2013.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>06</strong></td>
                  <td>6th Academic Council Meeting — 04.02.2014</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/6 Academic Council meeting Date 04.02.2014.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>07</strong></td>
                  <td>7th Academic Council Meeting — 14.10.2014</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/7 Academic Council meeting Date 14.10.2014.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>08</strong></td>
                  <td>8th Academic Council Meeting — 23.02.2015</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/8 Academic Council meeting Date 23.02.2015.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>09</strong></td>
                  <td>9th Academic Council Meeting — 29.09.2015</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/9 Academic Council meeting Date 29.09.2015.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>10</strong></td>
                  <td>10th Academic Council Meeting — 09.04.2016</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/10 Academic Council meeting Date 09.04.2016.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>11</strong></td>
                  <td>11th Academic Council Meeting — 23.12.2016</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/11 Academic Council meeting Date 23.12.2016.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>12</strong></td>
                  <td>12th Academic Council Meeting — 07.12.2017</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/12 Academic Council meeting date 07.12.2017.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>13</strong></td>
                  <td>13th Academic Council Meeting — 21.11.2018</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/13 Academic Council meeting date 21.11.2018.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>14</strong></td>
                  <td>14th Academic Council Meeting — 12.07.2019</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/14 Academic Council meeting date 12.07.2019.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>15</strong></td>
                  <td>15th Academic Council Meeting — 09.11.2019</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/15 Academic Council meeting date 09.11.2019.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>16</strong></td>
                  <td>16th Academic Council Meeting — 10.03.2020</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/16 Academic Council meeting date 10.03.2020.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>17</strong></td>
                  <td>17th Academic Council Meeting — 09.06.2020</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/17 Academic Council meeting date 09.06.2020.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>18</strong></td>
                  <td>18th Academic Council Meeting — 12.08.2020</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/18 Academic Council meeting date 12.08.2020.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>19</strong></td>
                  <td>19th Academic Council Meeting — 24.03.2021</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/19 Academic Council meeting date 24.03.2021.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>20</strong></td>
                  <td>20th Academic Council Meeting — 28.08.2021</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/20 Academic Council meeting date 28.08.2021.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>21</strong></td>
                  <td>21st Academic Council Meeting — 21.12.2021</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/21 Academic Council meeting date 21.12.2021.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>22</strong></td>
                  <td>22nd Academic Council Meeting — 17.05.2022</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/22 Academic Council meeting date 17.05.2022.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>23</strong></td>
                  <td>23rd Academic Council Meeting — 16.07.2022</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/23 Academic Council meeting date 16.07.2022.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>24</strong></td>
                  <td>24th Academic Council Meeting — 21.10.2022</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/24 Academic Council meeting date 21.10.2022.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>25</strong></td>
                  <td>25th Academic Council Meeting — 31.12.2022</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/25 Academic Council meeting date 31.12.2022.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>26</strong></td>
                  <td>26th Academic Council Meeting — 13.02.2023</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/26 Academic Council meeting date 13.02.2023.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>27</strong></td>
                  <td>27th Academic Council Meeting — 06.05.2023</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/27 Academic Council meeting date 06.05.2023.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
                </tr>
                <tr>
                  <td><strong>28</strong></td>
                  <td>28th Academic Council Meeting — 14.08.2023</td>
                  <td style="text-align:right;"><a href="naac/Academic_Council_meetings/28 Academic Council meeting date 14.08.2023.pdf" target="_blank" class="ac-doc-link">📄 View PDF ↗</a></td>
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
              <li><a href="Academic_Council.php" class="sidebar-link active">Academic Council <span>→</span></a></li>
              <li><a href="BOS.php" class="sidebar-link">Board of Studies (BOS) <span>→</span></a></li>
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
