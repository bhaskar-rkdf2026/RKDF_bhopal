<?php
// ============================================================
// RKDF University — Online Application & Admission Form 2026-27
// World-Class Premium Design + High-Res Media Assets + 100% Exact Form Fields & JS Cascading Branch Logic Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'admission-apply';

$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
$stmt->execute([$pageSlug]);
$pRow = $stmt->fetch();

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'ADMISSIONS · APPLY ONLINE';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Online Admission Application Form 2026-27';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Apply online for B.Tech, MBA, B.Pharm, B.Sc, B.A. LL.B, B.Arch & Diploma courses for session 2026-27.';
$heroBgImg    = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/lovable/rkdf-students-quad.jpg';

$itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
$itemStmt->execute([$pageSlug]);
$allItems = $itemStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($mainTitle) ?> — RKDF University Bhopal</title>
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
                  url('<?= htmlspecialchars($heroBgImg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sadm-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sadm-status-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      max-width: 980px;
      margin: 0 auto 28px;
    }

    .sadm-status-pill {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #C5A059;
      background: rgba(197, 160, 89, 0.15);
      border: 1px solid rgba(197, 160, 89, 0.3);
      padding: 8px 18px;
      border-radius: 99px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .sadm-check-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.1);
      padding: 10px 20px;
      border-radius: 10px;
      color: #0C1424;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.04);
      transition: all 0.25s ease;
    }
    .sadm-check-link:hover {
      background: #0C1424;
      color: #ffffff;
      border-color: #0C1424;
      transform: translateY(-2px);
    }

    .sadm-form-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 44px;
      box-shadow: 0 12px 40px rgba(12, 20, 36, 0.06);
      max-width: 980px;
      margin: 0 auto;
    }

    .sadm-section-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      color: #0C1424;
      border-bottom: 2px solid #E31B23;
      padding-bottom: 8px;
      margin-bottom: 24px;
      margin-top: 36px;
      font-weight: 700;
    }

    .form-grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }
    @media (max-width: 768px) {
      .form-grid-2 { grid-template-columns: 1fr; }
    }

    .form-group-full {
      grid-column: 1 / -1;
    }

    .sadm-label {
      display: block;
      font-size: 12.5px;
      font-weight: 700;
      color: #0C1424;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 8px;
    }

    .sadm-input, .sadm-select, .sadm-textarea {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid rgba(12, 20, 36, 0.12);
      border-radius: 10px;
      font-size: 15px;
      color: #0C1424;
      background: #FAF9F5;
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
    }
    .sadm-input:focus, .sadm-select:focus, .sadm-textarea:focus {
      border-color: #C5A059;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15);
    }

    .qual-table-wrapper {
      width: 100%;
      overflow-x: auto;
      border-radius: 12px;
      border: 1px solid rgba(12, 20, 36, 0.08);
      margin-top: 12px;
    }

    .qual-table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      text-align: left;
    }

    .qual-table th {
      background: #0C1424;
      color: #ffffff;
      padding: 14px 16px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .qual-table td {
      padding: 12px 16px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
    }

    .qual-table input {
      width: 100%;
      padding: 8px 12px;
      border: 1px solid rgba(12, 20, 36, 0.12);
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .sadm-submit-btn {
      background: #0C1424;
      color: #ffffff !important;
      border: none;
      padding: 16px 36px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(12, 20, 36, 0.15);
    }
    .sadm-submit-btn:hover {
      background: #E31B23;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(227, 27, 35, 0.25);
    }

    .sadm-reset-btn {
      background: #FAF9F5;
      color: #0C1424;
      border: 1px solid rgba(12, 20, 36, 0.12);
      padding: 15px 28px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .sadm-reset-btn:hover {
      background: rgba(12, 20, 36, 0.08);
    }

    /* Validation Feedback Styles */
    .sadm-input.is-invalid, .sadm-select.is-invalid, .sadm-textarea.is-invalid, .qual-table input.is-invalid {
      border-color: #E31B23 !important;
      background-color: #FFF5F5 !important;
      box-shadow: 0 0 0 3px rgba(227, 27, 35, 0.15) !important;
    }
    .sadm-input.is-valid, .sadm-select.is-valid, .sadm-textarea.is-valid, .qual-table input.is-valid {
      border-color: #16A34A !important;
      box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12) !important;
    }
    .sadm-error-alert {
      background: #FEF2F2;
      border: 1px solid #FCA5A5;
      color: #991B1B;
      padding: 16px 20px;
      border-radius: 12px;
      margin-bottom: 24px;
      font-size: 14px;
      font-weight: 600;
      display: none;
      box-shadow: 0 4px 16px rgba(227, 27, 35, 0.08);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">81 · CENTRAL ADMISSIONS PORTAL 2026-27</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Online Admission Application</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Register your application online for Undergraduate, Postgraduate, Diploma, and Doctoral degree programs at RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sadm-main-section">
    <div class="rk-container">
      
      <!-- TOP STATUS BAR -->
      <div class="sadm-status-bar">
        <span class="sadm-status-pill">ADMISSIONS OPEN FOR ACADEMIC SESSION 2026-27</span>
        <a href="Admission_search.php" class="sadm-check-link">
          Already Registered? Check Application Details ↗
        </a>
      </div>

      <!-- ADMISSION FORM CARD -->
      <div class="sadm-form-card">
        
        <!-- Error Alert Container -->
        <div id="sadmErrorAlert" class="sadm-error-alert"></div>

        <form method="post" action="admission.php" id="demoForm" class="demoForm" novalidate>
          
          <!-- 1. PERSONAL INFORMATION -->
          <div class="sadm-section-title" style="margin-top:0;">1. Personal Information</div>
          <div class="form-grid-2">
            <div>
              <label class="sadm-label">Student Full Name *</label>
              <input type="text" name="nm" class="sadm-input text-only" style="text-transform: uppercase;" minlength="2" maxlength="50" placeholder="STUDENT FULL NAME" required />
            </div>
            <div>
              <label class="sadm-label">Father's Name *</label>
              <input type="text" name="fnm" class="sadm-input text-only" style="text-transform: uppercase;" minlength="2" maxlength="50" placeholder="FATHER'S NAME" required />
            </div>
            <div>
              <label class="sadm-label">Aadhaar ID Number (12 Digits) *</label>
              <input type="text" inputmode="numeric" name="adhar" class="sadm-input num-only" minlength="12" maxlength="12" placeholder="AADHAAR NUMBER" required />
            </div>
            <div>
              <label class="sadm-label">Mobile Number *</label>
              <input type="text" inputmode="numeric" name="mob" class="sadm-input num-only" minlength="10" maxlength="10" placeholder="YOUR MOBILE NUMBER" required />
            </div>
            <div>
              <label class="sadm-label">Email Address *</label>
              <input type="email" name="eid" class="sadm-input" placeholder="EMAIL ADDRESS" required />
            </div>
            <div>
              <label class="sadm-label">Gender *</label>
              <div style="display:flex;gap:20px;padding-top:10px;font-weight:700;color:#0C1424;">
                <label style="cursor:pointer;"><input type="radio" name="gen" value="MALE" required /> MALE</label>
                <label style="cursor:pointer;"><input type="radio" name="gen" value="FEMALE" required /> FEMALE</label>
              </div>
            </div>
            <div>
              <label class="sadm-label">Domicile *</label>
              <select name="dom" class="sadm-select" required>
                <option value="MP">Madhya Pradesh (MP)</option>
                <option value="AI">All India (AI)</option>
              </select>
            </div>
            <div>
              <label class="sadm-label">Category *</label>
              <select name="cat" class="sadm-select" required>
                <option value="">-- SELECT CATEGORY --</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
                <option value="OBC">OBC</option>
                <option value="GEN">GEN</option>
                <option value="OTHER">OTHER</option>
              </select>
            </div>
            <div class="form-group-full">
              <label class="sadm-label">Permanent Postal Address *</label>
              <textarea name="address" rows="3" class="sadm-textarea" style="text-transform: uppercase;" placeholder="YOUR COMPLETE ADDRESS" required></textarea>
            </div>
          </div>

          <!-- 2. COURSE & BRANCH SELECTION -->
          <div class="sadm-section-title">2. Course &amp; Branch Choice</div>
          <div class="form-grid-2">
            <div>
              <label class="sadm-label">Select Course / Discipline *</label>
              <select name="category" class="sadm-select" required>
                <option value="BE">BACHELOR OF ENGINEERING (BE)</option>
                <option value="BE_LATERAL">BE LATERAL (BE-LATERAL)</option>
                <option value="BE_PT">BACHELOR OF ENGINEERING (Part Time)</option>
                <option value="MTECH">MASTER OF TECHNOLOGY (M.TECH)</option>
                <option value="DIPLOMA">DIPLOMA IN ENGINEERING</option>
                <option value="DIPLOMA_LATERAL">DIPLOMA LATERAL (DIPLOMA-LATERAL)</option>
                <option value="DIPLOMA_PT">DIPLOMA IN ENGINEERING (Part Time)</option>
                <option value="PHARMACY">PHARMACY</option>
                <option value="AGRICULTURE">AGRICULTURE</option>
                <option value="MANAGEMENT">MANAGEMENT</option>
                <option value="LAW">LAW</option>
                <option value="ARCHITECTURE">ARCHITECTURE</option>
                <option value="COMPUTER_APPLICATION">COMPUTER APPLICATION</option>
                <option value="SCIENCE">SCIENCE</option>
                <option value="COMMERCE">COMMERCE</option>
                <option value="ARTS">ARTS / HUMANITIES</option>
                <option value="EDUCATION">EDUCATION</option>
                <option value="LIBRARY_SC">LIBRARY &amp; INFORMATION SCIENCES</option>
                <option value="HOMOEOPATHY">HOMOEOPATHY</option>
                <option value="NURSING">NURSING</option>
                <option value="PARAMEDICAL">PARAMEDICAL</option>
              </select>
            </div>
            <div>
              <label class="sadm-label">Select Specialization / Branch *</label>
              <select name="choices" id="choices" class="sadm-select" required>
                <!-- Populated automatically via JavaScript -->
              </select>
            </div>
          </div>

          <!-- 3. ACADEMIC QUALIFICATIONS -->
          <div class="sadm-section-title">3. Academic Qualifications</div>
          <div class="qual-table-wrapper">
            <table class="qual-table">
              <thead>
                <tr>
                  <th>Exam Passed</th>
                  <th>Board / University</th>
                  <th>Passing Year</th>
                  <th>Total Marks</th>
                  <th>Marks Obtained</th>
                  <th>% of Marks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>10th Standard *</strong></td>
                  <td><input type="text" name="nob1" class="text-only" style="text-transform: uppercase;" placeholder="Board Name" required></td>
                  <td><input type="text" inputmode="numeric" name="yop1" class="num-only" maxlength="4" placeholder="Year" required></td>
                  <td><input type="text" inputmode="numeric" name="tm1" class="num-only" maxlength="5" placeholder="Max" required></td>
                  <td><input type="text" inputmode="numeric" name="mo1" class="num-only" maxlength="5" placeholder="Obt" required></td>
                  <td><input type="text" inputmode="decimal" name="per1" class="dec-only" maxlength="6" placeholder="%" required></td>
                </tr>
                <tr>
                  <td><strong>12th Standard</strong></td>
                  <td><input type="text" name="nob2" class="text-only" style="text-transform: uppercase;" placeholder="Board Name"></td>
                  <td><input type="text" inputmode="numeric" name="yop2" class="num-only" maxlength="4" placeholder="Year"></td>
                  <td><input type="text" inputmode="numeric" name="tm2" class="num-only" maxlength="5" placeholder="Max"></td>
                  <td><input type="text" inputmode="numeric" name="mo2" class="num-only" maxlength="5" placeholder="Obt"></td>
                  <td><input type="text" inputmode="decimal" name="per2" class="dec-only" maxlength="6" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Diploma</strong></td>
                  <td><input type="text" name="nob3" class="text-only" style="text-transform: uppercase;" placeholder="Polytechnic Board"></td>
                  <td><input type="text" inputmode="numeric" name="yop3" class="num-only" maxlength="4" placeholder="Year"></td>
                  <td><input type="text" inputmode="numeric" name="tm3" class="num-only" maxlength="5" placeholder="Max"></td>
                  <td><input type="text" inputmode="numeric" name="mo3" class="num-only" maxlength="5" placeholder="Obt"></td>
                  <td><input type="text" inputmode="decimal" name="per3" class="dec-only" maxlength="6" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Graduation</strong></td>
                  <td><input type="text" name="nob4" class="text-only" style="text-transform: uppercase;" placeholder="University"></td>
                  <td><input type="text" inputmode="numeric" name="yop4" class="num-only" maxlength="4" placeholder="Year"></td>
                  <td><input type="text" inputmode="numeric" name="tm4" class="num-only" maxlength="5" placeholder="Max"></td>
                  <td><input type="text" inputmode="numeric" name="mo4" class="num-only" maxlength="5" placeholder="Obt"></td>
                  <td><input type="text" inputmode="decimal" name="per4" class="dec-only" maxlength="6" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Post Graduation</strong></td>
                  <td><input type="text" name="nob5" class="text-only" style="text-transform: uppercase;" placeholder="University"></td>
                  <td><input type="text" inputmode="numeric" name="yop5" class="num-only" maxlength="4" placeholder="Year"></td>
                  <td><input type="text" inputmode="numeric" name="tm5" class="num-only" maxlength="5" placeholder="Max"></td>
                  <td><input type="text" inputmode="numeric" name="mo5" class="num-only" maxlength="5" placeholder="Obt"></td>
                  <td><input type="text" inputmode="decimal" name="per5" class="dec-only" maxlength="6" placeholder="%"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 4. REFERENCE & DECLARATION -->
          <div class="sadm-section-title">4. Reference &amp; Undertaking</div>
          <div class="form-grid-2">
            <div class="form-group-full">
              <label class="sadm-label">Reference By / Counselor Name *</label>
              <input type="text" name="ref" class="sadm-input text-only" style="text-transform: uppercase;" placeholder="NAME OF REFERENCE / COUNSELOR" required />
            </div>
            <div class="form-group-full" style="background:#FAF9F5;border:1px solid rgba(12,20,36,0.08);border-radius:12px;padding:20px;font-size:14px;line-height:1.7;color:#334155;">
              <label style="display:flex;align-items:flex-start;gap:12px;cursor:pointer;font-weight:600;">
                <input type="checkbox" name="checkbox" value="checkbox" style="width:20px;height:20px;margin-top:2px;" required />
                <div>
                  I hereby declare that all the information given by me in this Admission Application Form is true to the best of my knowledge. I promise to abide by the rules and regulations of RKDF University Bhopal. I understand that admission initially granted is provisional subject to verification of original certificates.
                </div>
              </label>
            </div>
          </div>

          <!-- SUBMIT & RESET BUTTONS -->
          <div style="margin-top:36px;display:flex;gap:16px;justify-content:flex-end;flex-wrap:wrap;">
            <input type="reset" value="Reset Form" class="sadm-reset-btn">
            <input type="submit" name="Submit" value="SUBMIT ADMISSION APPLICATION" class="sadm-submit-btn">
          </div>

        </form>

      </div>

    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

<!-- JAVASCRIPT FOR DYNAMIC CASCADING BRANCH SELECTION -->
<script type="text/javascript">
function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len-1; i>=0; i--) {
            sel.removeChild(groups[i]);
        }
    }

    len = sel.options.length;
    for (var i=len-1; i>=0; i--) {
        par = sel.options[i].parentNode;
        par.removeChild(sel.options[i]);
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;

        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            f.appendChild(o);
        }
        return f;
    }

    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for (var prop in obj) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }

        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            opts = addOptions(obj[ labels[i] ]);
            group.appendChild(opts);
            f.appendChild(group);
        }
    }
    sel.appendChild(f);
}

document.forms['demoForm'].elements['category'].onchange = function() {
    var relName = 'choices';
    var relList = this.form.elements[ relName ];
    var obj = Select_List_Data[ relName ][ this.value ];
    removeAllOptions(relList, true);
    appendDataToSelect(relList, obj);
};

var Select_List_Data = {
    'choices': {
		BE: {
           text: ['BE (Civil Engg.)', 'BE (Mechanical Engg.)', 'BE (Electrical & Electronics Engg.)','BE (Electrical Engg.)', 'BE (Electronics Comm. Engg.)','BE (Information Tech. Engg.)', 'BE (Computer Science Engg.)'],
           value: ['BE (Civil Engg.)', 'BE (Mechanical Engg.)', 'BE (Electrical & Electronics Engg.)','BE (Electrical Engg.)', 'BE (Electronics Comm. Engg.)','BE (Information Tech. Engg.)', 'BE (Computer Science Engg.)']
        },
		BE_LATERAL: {
           text: ['BE LAT(Civil Engg.)', 'BE LAT(Mechanical Engg.)', 'BE LAT(Electrical & Electronics Engg.)','BE LAT(Electrical Engg.)', 'BE LAT(Electronics Comm. Engg.)','BE LAT(Information Tech. Engg.)', 'BE LAT(Computer Science Engg.)'],
           value: ['BE LAT(Civil Engg.)', 'BE LAT(Mechanical Engg.)', 'BE LAT(Electrical & Electronics Engg.)','BE LAT(Electrical Engg.)', 'BE LAT(Electronics Comm. Engg.)','BE LAT(Information Tech. Engg.)', 'BE LAT(Computer Science Engg.)']
        },
		BE_PT: {
            text: ['BE(Part Time) Electrical Engineering', 'BE(Part Time) Mechanical Engineering'],
            value: ['BE(Part Time) Electrical Engineering', 'BE(Part Time) Mechanical Engineering']
        },
        MTECH: {
            text: ['M.Tech (VLSI Design)', 'M.Tech (Power System)','M.Tech (Power Electronics)','M.Tech (Computer Science)', 'M.Tech (Thermal Engg)','M.Tech (Industrial Production)','M.Tech (Digital Comm)','M.Tech (Electrical Power System)'],
            value: ['M.Tech (VLSI Design)', 'M.Tech (Power System)','M.Tech (Power Electronics)','M.Tech (Computer Science)', 'M.Tech (Thermal Engg)','M.Tech (Industrial Production)','M.Tech (Digital Comm)','M.Tech (Electrical Power System)' ]
        },
		DIPLOMA: {
            text: ['Diploma (Civil)','Diploma (Electrical)','Diploma (Mechanical)','Diploma (Electronics & Telecommunication)','Diploma (Film Technology & TV)','Diploma (Computer Science)'],
            value: ['Diploma (Civil)','Diploma (Electrical)','Diploma (Mechanical)','Diploma (Electronics & Telecommunication)','Diploma (Film Technology & TV)','Diploma (Computer Science)']
        },
		DIPLOMA_LATERAL: {
            text: ['Diploma LAT(Civil)','Diploma LAT(Electrical)','Diploma LAT(Mechanical)','Diploma LAT(Electronics & Telecommunication)','Diploma LAT(Film Technology & TV)','Diploma LAT(Computer Science)'],
            value: ['Diploma LAT(Civil)','Diploma LAT(Electrical)','Diploma LAT(Mechanical)','Diploma LAT(Electronics & Telecommunication)','Diploma LAT(Film Technology & TV)','Diploma LAT(Computer Science)']
        },
		DIPLOMA_PT: {
            text: ['Diploma (Civil) Part Time', 'Diploma (Mechanical) Part Time'],
            value: ['Diploma (Civil) Part Time', 'Diploma (Mechanical) Part Time']
        },
		PHARMACY: {
            'PHARMACY': {
                text: ['D.Pharm', 'B.Pharm','B.Pharm(Lateral)', 'B.Pharm (Practice)'],
                value: ['D.Pharm', 'B.Pharm','B.Pharm(Lateral)', 'B.Pharm(Practice)']
            },
            'M.PHARM': {
                text: ['M.Phram (Pharmaceutics)', 'M.Phram (Pharmacology)', 'M.Phram (Pharmacognosy)', 'M.Phram (DRA)'],
                value: ['M.Phram (Pharmaceutics)', 'M.Phram (Pharmacology)', 'M.Phram (Pharmacognosy)', 'M.Phram (DRA)']
            }
        },
        AGRICULTURE: {
            text: ['Diploma (Agriculture)', 'B.Sc Agriculture (Hons.)', 'B.Tech (Agriculture)', 'M.Sc(Agriculture)' ],
            value: ['Diploma (Agriculture)', 'B.Sc Agriculture (Hons.)', 'B.Tech (Agriculture)', 'M.Sc(Agriculture)' ]
        },
		MANAGEMENT: {
            text: ['BBA','BBA(Logistics)','BMS(Storage & Supply Chain)','MBA' ],
            value: ['BBA','BBA LOGOSTICS','BMS', 'MBA']
        },
		LAW: {
            text: ['LLB', 'BALLB','LLM' ],
            value: ['LLB', 'BALLB','LLM']
        },
		ARCHITECTURE: {
            text: ['B.Arch', 'M.Arch' ],
            value: ['B.Arch', 'M.Arch']
        },
		COMPUTER_APPLICATION: {
            text: ['BCA', 'MCA','DCA', 'PGDCA' ],
            value: ['BCA', 'MCA','DCA', 'PGDCA']
        },
		SCIENCE: {
            text: ['B.Sc(CBZ)', 'B.Sc(PCM)', 'B.Sc(BioTech)', 'B.Sc(Micro Biology)', 'B.Sc(Computer)','B.Sc( Food Science & Technology)','M.Sc (Chemistry)', 'M.Sc (Computer)', 'M.Sc( Food Science & Technology)', 'M.Sc (Mathematics)', 'M.Sc (Microbiology)', 'M.Sc (Physics)', 'M.Sc (Zoology)', 'M.Sc (Botany)' ],
            value: ['B.Sc(CBZ)', 'B.Sc(PCM)', 'B.Sc(BioTech)', 'B.Sc(Micro Biology)', 'B.Sc(Computer)','B.Sc( Food Science & Technology)','M.Sc (Chemistry)', 'M.Sc (Computer)', 'M.Sc( Food Science & Technology)', 'M.Sc (Mathematics)', 'M.Sc (Microbiology)', 'M.Sc (Physics)', 'M.Sc (Zoology)', 'M.Sc (Botany)']
        },
		COMMERCE: {
            text: ['B.Com', 'B.Com(Computer)', 'B.Com (Hons.)', 'M.Com' ],
            value: ['B.Com', 'B.Com(Computer)', 'B.Com (Hons.)', 'M.Com']
        },
		ARTS: {
            text: ['BA', 'M. A(Economics)', 'M. A(Education)', 'M. A(Hindi)', 'M. A(English)', 'M. A(History)', 'M. A(Mathematics)', 'M. A(Political Science)', 'M. A(Sociology)', 'BSW', 'MSW' ],
            value: ['BA', 'M. A(Economics)', 'M. A(Education)', 'M. A(Hindi)', 'M. A(English)', 'M. A(History)', 'M. A(Mathematics)', 'M. A(Political Science)', 'M. A(Sociology)', 'BSW', 'MSW' ]
        },
		EDUCATION: {
            text: ['D.Ed', 'B.Ed', 'M.Ed' ],
            value: ['D.Ed', 'B.Ed', 'M.Ed']
        },
		LIBRARY_SC: {
            text: ['B.LIB & I.Sc. ', 'M.LIB & I.Sc.' ],
            value: ['B.LIB', 'M.LIB']
        },
		HOMOEOPATHY: {
            text: ['B.H.M.S' ],
            value: ['B.H.M.S']
        },
		NURSING: {
            text: ['GNM', 'B.Sc (Nursing)', 'Post Basic .BSc (Nursing)' ],
            value: ['GNM', 'B.Sc (Nursing)', 'POST B.Sc (Nursing)']
        },
		PARAMEDICAL: {
            text: ['B.M.L.T', 'B.P.T.', 'DMLT', 'D.PHARMA(AYURVED)', 'DIPLOMA IN X RAY TECHNICIAN','CIRTIFICATE OF OT TECHNICIAN' ],
            value: ['B.M.L.T', 'B.P.T', 'DMLT', 'D.PHARMA(AYURVED)', 'DIPLOMA IN X RAY TECHNICIAN', 'CIRTIFICATE OF OT TECHNICIAN']
        }
    }
};

(function() {
    var form = document.forms['demoForm'];
    if (!form) return;
    var sel = form.elements['category'];
    if (sel) {
      sel.selectedIndex = 0;
      var relName = 'choices';
      var rel = form.elements[ relName ];
      var data = Select_List_Data[ relName ][ sel.value ];
      appendDataToSelect(rel, data);
    }
}());
</script>

<!-- REAL-TIME INPUT VALIDATION & FORM SUBMISSION ENGINE -->
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('demoForm');
  if (!form) return;

  // Real-Time Text-Only Enforcement (Only Alphabets, Spaces, Dots allowed)
  var textInputs = form.querySelectorAll('.text-only, input[name="nm"], input[name="fnm"], input[name="ref"], input[name^="nob"]');
  textInputs.forEach(function(inp) {
    inp.addEventListener('input', function() {
      var clean = this.value.replace(/[^a-zA-Z\s.]/g, '');
      if (this.value !== clean) {
        this.value = clean;
      }
    });
  });

  // Real-Time Numeric-Only Enforcement (Only Digits 0-9 allowed)
  var numInputs = form.querySelectorAll('.num-only, input[name="adhar"], input[name="mob"], input[name^="yop"], input[name^="tm"], input[name^="mo"]');
  numInputs.forEach(function(inp) {
    inp.addEventListener('input', function() {
      var clean = this.value.replace(/[^0-9]/g, '');
      if (this.name === 'adhar' && clean.length > 12) clean = clean.slice(0, 12);
      if (this.name === 'mob' && clean.length > 10) clean = clean.slice(0, 10);
      if (this.name.startsWith('yop') && clean.length > 4) clean = clean.slice(0, 4);
      if (this.value !== clean) {
        this.value = clean;
      }
      calcRowPercentage(this);
    });
  });

  // Real-Time Decimal/Percentage Enforcement
  var decInputs = form.querySelectorAll('.dec-only, input[name^="per"]');
  decInputs.forEach(function(inp) {
    inp.addEventListener('input', function() {
      var clean = this.value.replace(/[^0-9.]/g, '');
      var parts = clean.split('.');
      if (parts.length > 2) {
        clean = parts[0] + '.' + parts.slice(1).join('');
      }
      if (this.value !== clean) {
        this.value = clean;
      }
    });
  });

  // Auto-Calculate Percentage when Total Marks & Obtained Marks are typed
  function calcRowPercentage(inputEl) {
    var name = inputEl.name;
    var rowIdx = name.replace(/[^0-9]/g, '');
    if (!rowIdx) return;
    
    var tmEl = form.elements['tm' + rowIdx];
    var moEl = form.elements['mo' + rowIdx];
    var perEl = form.elements['per' + rowIdx];

    if (tmEl && moEl && perEl) {
      var tm = parseFloat(tmEl.value);
      var mo = parseFloat(moEl.value);
      if (!isNaN(tm) && !isNaN(mo) && tm > 0 && mo <= tm) {
        var pct = ((mo / tm) * 100).toFixed(2);
        perEl.value = pct;
        moEl.classList.remove('is-invalid');
      } else if (!isNaN(tm) && !isNaN(mo) && mo > tm) {
        moEl.classList.add('is-invalid');
      }
    }
  }

  // Form Submission Validation
  form.addEventListener('submit', function(e) {
    var errors = [];
    var firstInvalid = null;

    // Reset previous invalid states
    form.querySelectorAll('.is-invalid').forEach(function(el) {
      el.classList.remove('is-invalid');
    });

    var alertBox = document.getElementById('sadmErrorAlert');
    if (alertBox) alertBox.style.display = 'none';

    function markInvalid(el, msg) {
      if (el) {
        el.classList.add('is-invalid');
        if (!firstInvalid) firstInvalid = el;
      }
      errors.push(msg);
    }

    // 1. Student Name (Letters only, min 2 chars)
    var nm = form.elements['nm'];
    if (!nm || !/^[a-zA-Z\s.]{2,50}$/.test(nm.value.trim())) {
      markInvalid(nm, "Student Full Name must contain only alphabets and spaces (min 2 characters).");
    }

    // 2. Father's Name (Letters only, min 2 chars)
    var fnm = form.elements['fnm'];
    if (!fnm || !/^[a-zA-Z\s.]{2,50}$/.test(fnm.value.trim())) {
      markInvalid(fnm, "Father's Name must contain only alphabets and spaces (min 2 characters).");
    }

    // 3. Aadhaar Number (Exactly 12 digits)
    var adhar = form.elements['adhar'];
    if (!adhar || !/^\d{12}$/.test(adhar.value.trim())) {
      markInvalid(adhar, "Aadhaar Number must be exactly 12 numeric digits.");
    }

    // 4. Mobile Number (Exactly 10 digits)
    var mob = form.elements['mob'];
    if (!mob || !/^[6-9]\d{9}$/.test(mob.value.trim()) && !/^\d{10}$/.test(mob.value.trim())) {
      markInvalid(mob, "Mobile Number must be a valid 10-digit numeric number.");
    }

    // 5. Email Address
    var eid = form.elements['eid'];
    if (!eid || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(eid.value.trim())) {
      markInvalid(eid, "Please enter a valid email address.");
    }

    // 6. Category Selection
    var cat = form.elements['cat'];
    if (!cat || !cat.value) {
      markInvalid(cat, "Please select your category.");
    }

    // 7. Address
    var address = form.elements['address'];
    if (!address || address.value.trim().length < 5) {
      markInvalid(address, "Permanent Postal Address must be at least 5 characters long.");
    }

    // 8. 10th Qualification Row (Mandatory)
    var nob1 = form.elements['nob1'];
    var yop1 = form.elements['yop1'];
    var tm1 = form.elements['tm1'];
    var mo1 = form.elements['mo1'];
    var per1 = form.elements['per1'];

    if (!nob1 || nob1.value.trim().length < 2) {
      markInvalid(nob1, "10th Board Name is required.");
    }
    var currentYear = new Date().getFullYear();
    var y1 = parseInt(yop1 ? yop1.value : 0, 10);
    if (isNaN(y1) || y1 < 1970 || y1 > currentYear) {
      markInvalid(yop1, "10th Passing Year must be a valid 4-digit year (1970 - " + currentYear + ").");
    }
    var t1Val = parseFloat(tm1 ? tm1.value : 0);
    var m1Val = parseFloat(mo1 ? mo1.value : 0);
    if (isNaN(t1Val) || t1Val <= 0) {
      markInvalid(tm1, "10th Total Marks must be greater than 0.");
    }
    if (isNaN(m1Val) || m1Val < 0 || m1Val > t1Val) {
      markInvalid(mo1, "10th Marks Obtained must be between 0 and Total Marks.");
    }

    // 9. Optional Qualification Rows (12th, Diploma, Graduation, Post Grad)
    for (var i = 2; i <= 5; i++) {
      var nob = form.elements['nob' + i];
      var yop = form.elements['yop' + i];
      var tm = form.elements['tm' + i];
      var mo = form.elements['mo' + i];

      var hasAny = (nob && nob.value.trim()) || (yop && yop.value.trim()) || (tm && tm.value.trim()) || (mo && mo.value.trim());
      if (hasAny) {
        if (!nob || nob.value.trim().length < 2) {
          markInvalid(nob, "Board/University Name required for Row " + i + ".");
        }
        var yVal = parseInt(yop ? yop.value : 0, 10);
        if (isNaN(yVal) || yVal < 1970 || yVal > currentYear) {
          markInvalid(yop, "Passing Year required for Row " + i + " (1970 - " + currentYear + ").");
        }
        var tVal = parseFloat(tm ? tm.value : 0);
        var mVal = parseFloat(mo ? mo.value : 0);
        if (isNaN(tVal) || tVal <= 0) {
          markInvalid(tm, "Total Marks required for Row " + i + ".");
        }
        if (isNaN(mVal) || mVal < 0 || mVal > tVal) {
          markInvalid(mo, "Marks Obtained cannot exceed Total Marks in Row " + i + ".");
        }
      }
    }

    // 10. Reference Name (Letters only)
    var ref = form.elements['ref'];
    if (!ref || !/^[a-zA-Z\s.]{2,50}$/.test(ref.value.trim())) {
      markInvalid(ref, "Counselor/Reference Name must contain only alphabets and spaces.");
    }

    // If validation fails, block submit & display error summary
    if (errors.length > 0) {
      e.preventDefault();
      if (alertBox) {
        alertBox.innerHTML = "<strong>Please correct the following fields before submitting:</strong><ul style='margin:8px 0 0 18px;padding:0;'>" +
                             errors.map(function(err) { return "<li>" + err + "</li>"; }).join('') +
                             "</ul>";
        alertBox.style.display = 'block';
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
      if (firstInvalid) {
        firstInvalid.focus();
      }
    }
  });
});
</script>

</body>
</html>