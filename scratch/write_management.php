<?php
$content = '<?php
// ============================================================
// RKDF University - Faculty of Management Studies
// Luxury Prestige Design + 100% Exact Programs, AICTE Approvals, Seats & Eligibility Preserved
// ============================================================
require_once __DIR__ . \'/include/site_settings.php\';
require_once __DIR__ . \'/config/db.php\';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Management Studies - RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url(\'images/lovable/rkdf-why-bg.jpg\') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    
    .mgmt-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .mgmt-grid-layout { grid-template-columns: 1fr; }
    }

    .mgmt-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
      transition: all 0.3s ease;
    }
    .mgmt-card:hover {
      box-shadow: 0 12px 32px rgba(12,20,36,0.08);
    }
    .mgmt-card-header {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 18px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
    }
    .mgmt-card-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      font-weight: 700;
      color: #ffffff;
    }
    .aicte-tag {
      background: var(--p-gold);
      color: #ffffff;
      padding: 6px 14px;
      border-radius: 20px;
      font-family: var(--p-font-mono);
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-decoration: none;
    }
    .aicte-tag:hover {
      background: #b91c1c;
    }

    .mgmt-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .mgmt-card th {
      background: rgba(12,20,36,0.04);
      color: var(--p-navy-deep);
      padding: 14px 20px;
      font-family: var(--p-font-mono);
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .mgmt-card td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
      color: var(--p-navy-deep);
    }

    .side-fac-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 12px 32px rgba(12,20,36,0.06);
      position: sticky;
      top: 100px;
    }
    .side-fac-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      color: var(--p-navy-deep);
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--p-gold);
      font-weight: 700;
    }
    .side-fac-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .side-fac-link {
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
    .side-fac-link:hover, .side-fac-link.active {
      background: var(--p-navy-deep);
      color: #ffffff !important;
      border-color: var(--p-navy-deep);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . \'/include/new_navbar.php\'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">02 · Faculty of Management Studies</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Management Studies
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Developing ethical business leaders, corporate strategists, and visionary entrepreneurs through AICTE approved MBA and BBA programs.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="mgmt-grid-layout">
        
        <!-- LEFT COLUMN: MANAGEMENT PROGRAMS & CONSTITUENT INSTITUTES -->
        <div>
          
          <span class="rk-eyebrow">Undergraduate &amp; Postgraduate Degree Programs</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Constituent Management Colleges &amp; Courses</h2>

          <!-- 1. FACULTY OF MANAGEMENT BHOPAL (BBA) -->
          <div class="mgmt-card">
            <div class="mgmt-card-header">
              <div class="mgmt-card-title">Faculty of Management, Bhopal</div>
              <span class="aicte-tag" style="background:#0c1424;">UG Degree</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:90px;">Duration</th>
                  <th style="width:80px;">Seats</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Bachelor of Business Administration (BBA)</strong></td>
                  <td>6 Sem</td>
                  <td>120</td>
                  <td>Passed 10+2 or equivalent examination in any stream with recognized Board.</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 2. VEDICA INSTITUTE OF TECHNOLOGY (MBA) -->
          <div class="mgmt-card">
            <div class="mgmt-card-header">
              <div class="mgmt-card-title">Vedica Institute of Technology</div>
              <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/VIT%20EOA%20Report%202022-23.pdf" target="_blank" class="aicte-tag">
                AICTE Approved (EOA) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:90px;">Duration</th>
                  <th style="width:80px;">Seats</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Master of Business Administration (MBA)</strong></td>
                  <td>4 Sem</td>
                  <td>120</td>
                  <td>Passed Graduation in any discipline with minimum 50% marks (45% for Reserved Category).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 3. SRI SATYA SAI COLLEGE OF ENGINEERING (MBA) -->
          <div class="mgmt-card">
            <div class="mgmt-card-header">
              <div class="mgmt-card-title">Sri Satya Sai College of Engineering</div>
              <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/SSSCE%20EOA%20Report%202022-23.PDF" target="_blank" class="aicte-tag">
                AICTE Approved (EOA) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:90px;">Duration</th>
                  <th style="width:80px;">Seats</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Master of Business Administration (MBA)</strong></td>
                  <td>4 Sem</td>
                  <td>120</td>
                  <td>Passed Graduation in any discipline with minimum 50% marks (45% for Reserved Category).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 4. BHABHA COLLEGE OF ENGINEERING (MBA) -->
          <div class="mgmt-card">
            <div class="mgmt-card-header">
              <div class="mgmt-card-title">Bhabha College of Engineering</div>
              <a href="https://rkdf.ac.in/approval/AICTE_EOA_2022/BCE%20EOA%20Report%202022-23.PDF" target="_blank" class="aicte-tag">
                AICTE Approved (EOA) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:90px;">Duration</th>
                  <th style="width:80px;">Seats</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Master of Business Administration (MBA)</strong></td>
                  <td>4 Sem</td>
                  <td>60</td>
                  <td>Passed Graduation in any discipline with minimum 50% marks (45% for Reserved Category).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 5. DOCTOR OF PHILOSOPHY (Ph.D. IN MANAGEMENT) -->
          <span class="rk-eyebrow">Doctoral Research</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Ph.D. in Management</h2>
          
          <div class="mgmt-card">
            <div class="mgmt-card-header">
              <div class="mgmt-card-title">Doctor of Philosophy (Ph.D.) - Management</div>
              <span class="aicte-tag" style="background:#0c1424;">UGC Recognized</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Discipline / Course Name</th>
                  <th>Eligibility &amp; Selection Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Ph.D. in Management Studies</strong></td>
                  <td>
                    <strong>As per UGC Norms:</strong> Master\'s Degree (MBA / M.Com / PGDM) with minimum 55% marks + Performance in RKDF RERET Entrance Test &amp; Research Interview.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>

        <!-- RIGHT COLUMN: FACULTIES DIRECTORY SIDEBAR -->
        <div>
          <div class="side-fac-card">
            <div class="side-fac-title">Explore Faculties</div>
            <div class="side-fac-list">
              <a href="Engineering.php" class="side-fac-link"><span>⚙️</span> Engineering &amp; Technology</a>
              <a href="Management.php" class="side-fac-link active"><span>💼</span> Management Studies</a>
              <a href="pharmacy.php" class="side-fac-link"><span>💊</span> Pharmaceutical Sciences</a>
              <a href="Science.php" class="side-fac-link"><span>🧪</span> Basic &amp; Applied Sciences</a>
              <a href="Agriculture.php" class="side-fac-link"><span>🌾</span> Faculty of Agriculture</a>
              <a href="nursing.php" class="side-fac-link"><span>🩺</span> Nursing &amp; Paramedical</a>
              <a href="Law.php" class="side-fac-link"><span>⚖️</span> Faculty of Law</a>
              <a href="Education.php" class="side-fac-link"><span>📚</span> Faculty of Education</a>
              <a href="architect.php" class="side-fac-link"><span>🏛️</span> Architecture &amp; Design</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . \'/include/footer.php\'; ?>

</body>
</html>';
file_put_contents(__DIR__ . '/../Management.php', $content);
echo 'Management.php written successfully!';
