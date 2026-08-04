<?php
$content = '<?php
// ============================================================
// RKDF University - Faculty of Pharmaceutical Sciences
// Luxury Prestige Design + 100% Exact Programs, PCI Approvals, Seats & Eligibility Preserved
// ============================================================
require_once __DIR__ . \'/include/site_settings.php\';
require_once __DIR__ . \'/config/db.php\';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Pharmaceutical Sciences - RKDF University Bhopal</title>
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
    
    .pharm-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .pharm-grid-layout { grid-template-columns: 1fr; }
    }

    .pharm-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 32px;
      transition: all 0.3s ease;
    }
    .pharm-card:hover {
      box-shadow: 0 12px 32px rgba(12,20,36,0.08);
    }
    .pharm-card-header {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 18px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
    }
    .pharm-card-title {
      font-family: var(--p-font-serif);
      font-size: 20px;
      font-weight: 700;
      color: #ffffff;
    }
    .pci-tag {
      background: #008080;
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
    .pci-tag:hover {
      background: #005959;
    }

    .pharm-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .pharm-card th {
      background: rgba(12,20,36,0.04);
      color: var(--p-navy-deep);
      padding: 14px 20px;
      font-family: var(--p-font-mono);
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .pharm-card td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 14.5px;
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
      <span class="rk-eyebrow tone-gold">03 · Faculty of Pharmaceutical Sciences</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Pharmaceutical Sciences
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Leading education in Pharmacy, Drug Discovery, Clinical Pharmacology, and Healthcare Innovation under PCI (Pharmacy Council of India) approval.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="pharm-grid-layout">
        
        <!-- LEFT COLUMN: PHARMACY INSTITUTES & COURSES -->
        <div>
          
          <span class="rk-eyebrow">Diploma, UG &amp; PG Pharmacy Programs</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Constituent Pharmacy Institutes &amp; Courses</h2>

          <!-- 1. FACULTY OF PHARMACY (FOP) -->
          <div class="pharm-card">
            <div class="pharm-card-header">
              <div class="pharm-card-title">Faculty of Pharmacy</div>
              <a href="approval/PCI/2022/FOP%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pci-tag">
                PCI Approved (Decision Letter) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>D.Pharma (Diploma in Pharmacy)</strong></td>
                  <td>60</td>
                  <td>2 Year</td>
                  <td>Passed 10+2 with Physics and Chemistry as compulsory subjects along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma (Bachelor of Pharmacy)</strong></td>
                  <td>100</td>
                  <td>8 Sem</td>
                  <td>Passed 10+2 with Physics and Chemistry as compulsory subjects along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma (Lateral Entry)</strong></td>
                  <td>10</td>
                  <td>6 Sem</td>
                  <td>Passed Diploma in Pharmacy (D.Pharm) with min 45% marks (40% for Reserved Category).</td>
                </tr>
                <tr>
                  <td><strong>B.Pharm (Practice)</strong></td>
                  <td>40</td>
                  <td>2 Year</td>
                  <td>D.Pharm with registered pharmacist status and minimum 4 years clinical experience.</td>
                </tr>
                <tr>
                  <td><strong>M.Pharm (Pharmaceutics)</strong></td>
                  <td>15</td>
                  <td>4 Sem</td>
                  <td rowspan="4" style="vertical-align:top;">Passed B.Pharm degree with min 55% marks (50% reserved). GPAT qualified preferred.</td>
                </tr>
                <tr>
                  <td><strong>M.Pharm (Pharmacology)</strong></td>
                  <td>15</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Pharm (Pharmacognosy)</strong></td>
                  <td>15</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Pharm (Regulatory Affairs / DRA)</strong></td>
                  <td>15</td>
                  <td>4 Sem</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 2. SRI SATYA SAI INSTITUTE OF PHARMACEUTICAL SCIENCES -->
          <div class="pharm-card">
            <div class="pharm-card-header">
              <div class="pharm-card-title">Sri Satya Sai Institute of Pharmaceutical Sciences</div>
              <a href="approval/PCI/2022/SSSIPS%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pci-tag">
                PCI Approved (Decision Letter) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>D.Pharma</strong></td>
                  <td>60</td>
                  <td>2 Year</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma (Lateral)</strong></td>
                  <td>06</td>
                  <td>6 Sem</td>
                  <td>Passed D.Pharm with min 45% marks (40% reserved).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 3. BHABHA PHARMACY COLLEGE -->
          <div class="pharm-card">
            <div class="pharm-card-header">
              <div class="pharm-card-title">Bhabha Pharmacy College</div>
              <a href="approval/PCI/2022/BPC%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pci-tag">
                PCI Approved (Decision Letter) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>D.Pharma</strong></td>
                  <td>60</td>
                  <td>2 Year</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma (Lateral)</strong></td>
                  <td>06</td>
                  <td>6 Sem</td>
                  <td>Passed D.Pharm with min 45% marks (40% reserved).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 4. DEPARTMENT OF PHARMACY -->
          <div class="pharm-card">
            <div class="pharm-card-header">
              <div class="pharm-card-title">Department of Pharmacy</div>
              <a href="approval/PCI/2022/DOP%20PCI%20Decision%20Letter%202022-23.pdf" target="_blank" class="pci-tag">
                PCI Approved (Decision Letter) ↗
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>D.Pharma</strong></td>
                  <td>60</td>
                  <td>2 Year</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                  <td>Passed 10+2 with Physics and Chemistry along with Math / Bio.</td>
                </tr>
                <tr>
                  <td><strong>B.Pharma (Lateral)</strong></td>
                  <td>06</td>
                  <td>6 Sem</td>
                  <td>Passed D.Pharm with min 45% marks (40% reserved).</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 5. DOCTOR OF PHILOSOPHY (Ph.D. IN PHARMACEUTICAL SCIENCES) -->
          <span class="rk-eyebrow">Doctoral Research</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Ph.D. in Pharmaceutical Sciences</h2>
          
          <div class="pharm-card">
            <div class="pharm-card-header">
              <div class="pharm-card-title">Doctor of Philosophy (Ph.D.) - Pharmaceutical Sciences</div>
              <span class="pci-tag" style="background:#0c1424;">UGC Recognized</span>
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
                  <td><strong>Ph.D. in Pharmaceutical Sciences</strong></td>
                  <td>
                    <strong>As per UGC Norms:</strong> Master\'s Degree (M.Pharm) in relevant branch of Pharmacy with minimum 55% marks + Performance in RKDF RERET Entrance Test &amp; Interview.
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
              <a href="Management.php" class="side-fac-link"><span>💼</span> Management Studies</a>
              <a href="pharmacy.php" class="side-fac-link active"><span>💊</span> Pharmaceutical Sciences</a>
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
file_put_contents(__DIR__ . '/../pharmacy.php', $content);
echo 'pharmacy.php written successfully!';
