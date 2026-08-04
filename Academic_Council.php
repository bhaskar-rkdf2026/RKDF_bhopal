<?php
// ============================================================
// RKDF University — Academic Council
// Luxury Prestige Governance Layout + 100% Academic Council PDFs
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
    
    .ac-featured-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-left: 4px solid var(--p-gold);
      border-radius: 16px;
      padding: 32px;
      box-shadow: 0 8px 30px rgba(12,20,36,0.06);
      margin-bottom: 48px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .ac-pdf-btn {
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
    .ac-pdf-btn:hover {
      background: var(--p-gold);
      box-shadow: 0 8px 22px rgba(220,38,38,0.25);
      transform: translateY(-2px);
    }

    .ac-table-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 56px;
    }
    .ac-table-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .ac-table-card th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 18px 24px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .ac-table-card td {
      padding: 16px 24px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
      color: var(--p-navy-deep);
    }
    .ac-table-card tr:hover td {
      background: rgba(220,38,38,0.02);
    }
    .ac-table-card a {
      color: var(--p-navy-deep);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .ac-table-card a:hover {
      color: var(--p-gold);
      text-decoration: underline;
    }

    .gov-nav-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 14px;
      margin-top: 28px;
    }
    .gov-nav-pill {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 10px;
      padding: 14px 18px;
      color: var(--p-navy-deep);
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
    }
    .gov-nav-pill:hover, .gov-nav-pill.active {
      border-color: var(--p-gold);
      background: var(--p-navy-deep);
      color: #ffffff !important;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">04 · Statutory Governance</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Academic Council
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        The apex academic decision-making body responsible for curriculum standards, academic policies, examination regulations, and degree approvals.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <!-- FEATURED CARD: ACADEMIC COUNCIL MEMBERS 2024 -->
      <div class="ac-featured-card">
        <div>
          <span class="rk-eyebrow">Statutory Directory</span>
          <h2 style="font-family:var(--p-font-serif);font-size:26px;color:var(--p-navy-deep);margin-top:6px;margin-bottom:8px;">
            Academic Council Members 2024
          </h2>
          <p style="font-size:15px;color:rgba(12,20,36,0.7);max-width:580px;">
            Official statutory constitution of the Academic Council members, deans, and external experts governing academic affairs.
          </p>
        </div>
        <a href="Content/Documents/academic_council/Academic Council Members 2024.pdf" target="_blank" class="ac-pdf-btn">
          📄 View Members List (PDF) ↗
        </a>
      </div>

      <!-- ACADEMIC COUNCIL MEETINGS TABLE -->
      <span class="rk-eyebrow">Minutes of Governance</span>
      <h2 class="rk-h2" style="margin-bottom:24px;">Academic Council Meeting Minutes</h2>
      
      <div class="ac-table-card">
        <table>
          <thead>
            <tr>
              <th style="width:100px;">Meeting #</th>
              <th>Meeting Date &amp; Description</th>
              <th style="width:160px;text-align:right;">Document</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>01</strong></td>
              <td>1st Academic Council Meeting — 17.02.2012</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/1 Academic Council meeting date  17.02.2012.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>02</strong></td>
              <td>2nd Academic Council Meeting — 02.04.2012</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/2 Academic Council meeting date  02.04.2012.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>03</strong></td>
              <td>3rd Academic Council Meeting — 20.07.2012</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/3 Academic Council meeting  date 20.07.2012.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>04</strong></td>
              <td>4th Academic Council Meeting — 09.01.2013</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/4 Academic Council meeting Date 09.01.2013.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>05</strong></td>
              <td>5th Academic Council Meeting — 20.09.2013</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/5 Academic Council meeting Date 20.09.2013.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>06</strong></td>
              <td>6th Academic Council Meeting — 04.02.2014</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/6 Academic Council meeting Date 04.02.2014.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>07</strong></td>
              <td>7th Academic Council Meeting — 14.10.2014</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/7 Academic Council meeting Date 14.10.2014.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>08</strong></td>
              <td>8th Academic Council Meeting — 23.02.2015</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/8 Academic Council meeting Date 23.02.2015.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>09</strong></td>
              <td>9th Academic Council Meeting — 29.09.2015</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/9 Academic Council meeting Date 29.09.2015.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>10</strong></td>
              <td>10th Academic Council Meeting — 09.04.2016</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/10 Academic Council meeting Date 09.04.2016.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>11</strong></td>
              <td>11th Academic Council Meeting — 23.12.2016</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/11 Academic Council meeting Date 23.12.2016.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>12</strong></td>
              <td>12th Academic Council Meeting — 07.12.2017</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/12 Academic Council meeting date 07.12.2017.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>13</strong></td>
              <td>13th Academic Council Meeting — 21.11.2018</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/13 Academic Council meeting date 21.11.2018.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>14</strong></td>
              <td>14th Academic Council Meeting — 12.07.2019</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/14 Academic Council meeting date 12.07.2019.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>15</strong></td>
              <td>15th Academic Council Meeting — 09.11.2019</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/15 Academic Council meeting date 09.11.2019.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>16</strong></td>
              <td>16th Academic Council Meeting — 10.03.2020</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/16 Academic Council meeting date 10.03.2020.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>17</strong></td>
              <td>17th Academic Council Meeting — 09.06.2020</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/17 Academic Council meeting date 09.06.2020.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>18</strong></td>
              <td>18th Academic Council Meeting — 12.08.2020</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/18 Academic Council meeting date 12.08.2020.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>19</strong></td>
              <td>19th Academic Council Meeting — 24.03.2021</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/19 Academic Council meeting date 24.03.2021.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>20</strong></td>
              <td>20th Academic Council Meeting — 28.08.2021</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/20 Academic Council meeting date 28.08.2021.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>21</strong></td>
              <td>21st Academic Council Meeting — 21.12.2021</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/21 Academic Council meeting date 21.12.2021.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>22</strong></td>
              <td>22nd Academic Council Meeting — 17.05.2022</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/22 Academic Council meeting date 17.05.2022.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>23</strong></td>
              <td>23rd Academic Council Meeting — 16.07.2022</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/23 Academic Council meeting date 16.07.2022.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>24</strong></td>
              <td>24th Academic Council Meeting — 21.10.2022</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/24 Academic Council meeting date 21.10.2022.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>25</strong></td>
              <td>25th Academic Council Meeting — 31.12.2022</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/25 Academic Council meeting date 31.12.2022.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>26</strong></td>
              <td>26th Academic Council Meeting — 13.02.2023</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/26 Academic Council meeting date 13.02.2023.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>27</strong></td>
              <td>27th Academic Council Meeting — 06.05.2023</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/27 Academic Council meeting date 06.05.2023.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
            <tr>
              <td><strong>28</strong></td>
              <td>28th Academic Council Meeting — 14.08.2023</td>
              <td style="text-align:right;"><a href="naac/Academic_Council_meetings/28 Academic Council meeting date 14.08.2023.pdf" target="_blank">📄 View PDF ↗</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Quick Statutory Governance Directory -->
      <div style="margin-top:56px;padding-top:36px;border-top:1px solid var(--p-hairline);">
        <span class="rk-eyebrow tone-gold">Statutory Governance Directory</span>
        <h3 class="rk-h2" style="font-size:24px;">Explore Statutory Bodies</h3>
        
        <div class="gov-nav-grid">
          <a href="Academic_Council.php" class="gov-nav-pill active"><span>📜</span> Academic Council</a>
          <a href="BOS.php" class="gov-nav-pill"><span>📚</span> Board of Studies (BOS)</a>
          <a href="BoM.php" class="gov-nav-pill"><span>🏛️</span> Board of Management</a>
          <a href="Governingbody.php" class="gov-nav-pill"><span>⚖️</span> Governing Body</a>
          <a href="Statuary-Bodies.php" class="gov-nav-pill"><span>📋</span> Statutory Bodies</a>
        </div>
      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
