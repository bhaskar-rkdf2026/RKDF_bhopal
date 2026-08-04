<?php
$content = '<?php
// ============================================================
// RKDF University - Faculty of Engineering & Technology
// Luxury Prestige Design + 100% Exact Programs, Seats & Eligibility Preserved
// ============================================================
require_once __DIR__ . \'/include/site_settings.php\';
require_once __DIR__ . \'/config/db.php\';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty of Engineering & Technology - RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url(\'images/lovable/rkdf-engineering.jpg\') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    
    .eng-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .eng-grid-layout { grid-template-columns: 1fr; }
    }

    .eng-table-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(12,20,36,0.04);
      margin-bottom: 48px;
    }
    .eng-table-card table {
      width: 100%;
      border-collapse: collapse;
    }
    .eng-table-card th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 16px 20px;
      font-family: var(--p-font-mono);
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .eng-table-card td {
      padding: 15px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 14.5px;
      color: var(--p-navy-deep);
    }
    .eng-table-card tr:hover td {
      background: rgba(220,38,38,0.02);
    }
    .eligibility-box {
      background: rgba(12,20,36,0.02);
      border-left: 3px solid var(--p-gold);
      padding: 12px 16px;
      font-size: 13.5px;
      line-height: 1.6;
      color: rgba(12,20,36,0.85);
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
      <span class="rk-eyebrow tone-gold">01 · Faculty of Excellence</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Engineering &amp; Technology
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Empowering innovative engineers through cutting-edge laboratories, AICTE approved degree programs, research, and high-impact placement opportunities.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <div class="eng-grid-layout">
        
        <!-- LEFT COLUMN: ENGINEERING DEGREES TABLES -->
        <div>
          
          <!-- 1. UNDERGRADUATE B.E. / B.TECH -->
          <span class="rk-eyebrow">Undergraduate Degree Programs</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Bachelor of Engineering (B.E. / B.Tech)</h2>
          
          <div class="eng-table-card">
            <table>
              <thead>
                <tr>
                  <th>Branch / Specialization</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Civil Engineering</strong></td>
                  <td>120</td>
                  <td>8 Sem</td>
                  <td rowspan="7" style="vertical-align:top;">
                    <div class="eligibility-box">
                      <strong>AICTE Norms:</strong> Passed 10+2 examination with Physics and Mathematics as compulsory subjects along with Chemistry / Biotechnology / Biology / Technical Vocational subject. Minimum <strong>45% marks</strong> (40% in case of reserved category).
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Mechanical Engineering</strong></td>
                  <td>120</td>
                  <td>8 Sem</td>
                </tr>
                <tr>
                  <td><strong>Electrical &amp; Electronics Engineering</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                </tr>
                <tr>
                  <td><strong>Electrical Engineering</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                </tr>
                <tr>
                  <td><strong>Electronics &amp; Communication Engg.</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                </tr>
                <tr>
                  <td><strong>Information Technology</strong></td>
                  <td>60</td>
                  <td>8 Sem</td>
                </tr>
                <tr>
                  <td><strong>Computer Science &amp; Engineering</strong></td>
                  <td>180</td>
                  <td>8 Sem</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 2. POSTGRADUATE M.TECH -->
          <span class="rk-eyebrow">Postgraduate Master Programs</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Master of Technology (M.Tech)</h2>
          
          <div class="eng-table-card">
            <table>
              <thead>
                <tr>
                  <th>Specialization</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>M.Tech (VLSI Design)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                  <td rowspan="8" style="vertical-align:top;">
                    <div class="eligibility-box">
                      <strong>AICTE Norms:</strong> Passed B.E. / B.Tech degree in relevant branch of Engineering with minimum <strong>50% marks</strong> (45% for reserved category). GATE qualified candidates preferred.
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Power System)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Power Electronics)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Computer Science &amp; Engg.)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Thermal Engineering)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Industrial Production)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Digital Communication)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
                <tr>
                  <td><strong>M.Tech (Electrical Power System)</strong></td>
                  <td>18</td>
                  <td>4 Sem</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 3. POLYTECHNIC DIPLOMA -->
          <span class="rk-eyebrow">Polytechnic Diploma Programs</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Diploma in Engineering</h2>
          
          <div class="eng-table-card">
            <table>
              <thead>
                <tr>
                  <th>Branch / Course Name</th>
                  <th style="width:70px;">Seats</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Diploma in Civil Engineering</strong></td>
                  <td>60</td>
                  <td>6 Sem</td>
                  <td rowspan="6" style="vertical-align:top;">
                    <div class="eligibility-box">
                      Passed 10th / Secondary Examination with Science and Mathematics with minimum <strong>35% marks</strong>.
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Diploma in Electrical Engineering</strong></td>
                  <td>60</td>
                  <td>6 Sem</td>
                </tr>
                <tr>
                  <td><strong>Diploma in Mechanical Engineering</strong></td>
                  <td>60</td>
                  <td>6 Sem</td>
                </tr>
                <tr>
                  <td><strong>Diploma in Electronics &amp; Telecom</strong></td>
                  <td>30</td>
                  <td>6 Sem</td>
                </tr>
                <tr>
                  <td><strong>Diploma in Film Technology &amp; TV</strong></td>
                  <td>30</td>
                  <td>6 Sem</td>
                </tr>
                <tr>
                  <td><strong>Diploma in Computer Science</strong></td>
                  <td>30</td>
                  <td>6 Sem</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 4. LATERAL ENTRY (BE & DIPLOMA) -->
          <span class="rk-eyebrow">Direct 2nd Year Entry</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Lateral Entry Programs</h2>
          
          <div class="eng-table-card">
            <table>
              <thead>
                <tr>
                  <th>Program Name</th>
                  <th style="width:90px;">Duration</th>
                  <th>Eligibility Criteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>B.E. / B.Tech (Lateral Entry)</strong></td>
                  <td>6 Sem</td>
                  <td>
                    <div class="eligibility-box">
                      Passed 3-year Diploma examination in appropriate branch of Engineering with at least <strong>45% marks</strong> (40% for reserved category) OR B.Sc. Degree with Mathematics.
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Diploma in Engineering (Lateral Entry)</strong></td>
                  <td>4 Sem</td>
                  <td>
                    <div class="eligibility-box">
                      Passed 10+2 with Physics &amp; Chemistry + Math/Bio OR 10+2 Technical Vocational OR 10th + 2-year ITI in appropriate trade.
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 5. DOCTOR OF PHILOSOPHY (Ph.D.) -->
          <span class="rk-eyebrow">Doctoral Research</span>
          <h2 class="rk-h2" style="margin-bottom:24px;">Ph.D. in Engineering</h2>
          
          <div class="eng-table-card">
            <table>
              <thead>
                <tr>
                  <th>Discipline / Branch</th>
                  <th>Eligibility &amp; Selection</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Ph.D. Mechanical Engineering</strong></td>
                  <td rowspan="5" style="vertical-align:top;">
                    <div class="eligibility-box">
                      <strong>As per UGC Norms:</strong> Master\'s Degree (M.E. / M.Tech) in relevant discipline with minimum 55% marks + RKDF RERET Entrance Exam &amp; Interview performance.
                    </div>
                  </td>
                </tr>
                <tr><td><strong>Ph.D. Computer Science &amp; Engineering</strong></td></tr>
                <tr><td><strong>Ph.D. Electrical Engineering</strong></td></tr>
                <tr><td><strong>Ph.D. Electronics &amp; Communication Engg.</strong></td></tr>
                <tr><td><strong>Ph.D. Civil Engineering</strong></td></tr>
              </tbody>
            </table>
          </div>

        </div>

        <!-- RIGHT COLUMN: FACULTIES DIRECTORY SIDEBAR -->
        <div>
          <div class="side-fac-card">
            <div class="side-fac-title">Explore Faculties</div>
            <div class="side-fac-list">
              <a href="Engineering.php" class="side-fac-link active"><span>⚙️</span> Engineering &amp; Technology</a>
              <a href="Management.php" class="side-fac-link"><span>💼</span> Management Studies</a>
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
file_put_contents(__DIR__ . '/../Engineering.php', $content);
echo 'Engineering.php written successfully!';
