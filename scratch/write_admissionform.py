import os

content = """<?php
// ============================================================
// RKDF University - Online Application & Admission Form 2026-27
// Luxury Prestige Design + 100% Exact Form Fields & JS Cascading Branch Logic Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Admission Application Form 2026-27 - RKDF University Bhopal</title>
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
    
    .adm-form-card {
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 18px;
      padding: 40px;
      box-shadow: 0 12px 40px rgba(12,20,36,0.06);
      max-width: 960px;
      margin: 0 auto;
    }
    
    .adm-section-title {
      font-family: var(--p-font-serif);
      font-size: 22px;
      color: var(--p-navy-deep);
      border-bottom: 2px solid var(--p-gold);
      padding-bottom: 8px;
      margin-bottom: 24px;
      margin-top: 32px;
      font-weight: 700;
    }

    .form-grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    @media (max-width: 768px) {
      .form-grid-2 { grid-template-columns: 1fr; }
    }
    .form-group-full {
      grid-column: 1 / -1;
    }

    .adm-label {
      display: block;
      font-size: 13px;
      font-weight: 700;
      color: var(--p-navy-deep);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 8px;
    }
    .adm-input, .adm-select, .adm-textarea {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid var(--p-hairline);
      border-radius: 8px;
      font-size: 15px;
      color: var(--p-navy-deep);
      background: rgba(12,20,36,0.01);
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
    }
    .adm-input:focus, .adm-select:focus, .adm-textarea:focus {
      border-color: var(--p-gold);
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(220,38,38,0.1);
    }

    .qual-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 12px;
    }
    .qual-table th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 12px 14px;
      font-family: var(--p-font-mono);
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }
    .qual-table td {
      padding: 10px 14px;
      border-bottom: 1px solid var(--p-hairline);
    }
    .qual-table input {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid var(--p-hairline);
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .adm-submit-btn {
      background: var(--p-navy-deep);
      color: #ffffff !important;
      border: none;
      padding: 16px 36px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(12,20,36,0.15);
    }
    .adm-submit-btn:hover {
      background: var(--p-gold);
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(220,38,38,0.25);
    }
    .adm-reset-btn {
      background: rgba(12,20,36,0.06);
      color: var(--p-navy-deep);
      border: 1px solid var(--p-hairline);
      padding: 15px 28px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .adm-reset-btn:hover {
      background: rgba(12,20,36,0.12);
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">Admissions Academic Session 2026-27</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">
        Online Admission Application
      </h1>
      <p style="margin-top:20px;font-size:18px;line-height:1.7;color:rgba(250,249,246,0.85);max-width:640px;">
        Register your application online for Undergraduate, Postgraduate, Diploma, and Doctoral degree programs at RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section style="padding:80px 0;background:var(--p-paper);">
    <div class="rk-container">
      
      <!-- TOP STATUS BAR -->
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;max-width:960px;margin:0 auto 28px;">
        <span style="font-size:15px;font-weight:700;color:var(--p-gold);">
          ADMISSION OPEN FOR SESSION 2026-27
        </span>
        <a href="Admission_search.php" style="display:inline-flex;align-items:center;gap:8px;background:#ffffff;border:1px solid var(--p-hairline);padding:10px 18px;border-radius:8px;color:var(--p-navy-deep);font-weight:700;font-size:14px;text-decoration:none;box-shadow:0 2px 10px rgba(0,0,0,0.04);">
          Already Registered? Check Details
        </a>
      </div>

      <!-- ADMISSION FORM CARD -->
      <div class="adm-form-card">
        
        <form method="post" action="admission.php" id="demoForm" class="demoForm">
          
          <!-- 1. PERSONAL INFORMATION -->
          <div class="adm-section-title" style="margin-top:0;">1. Personal Information</div>
          <div class="form-grid-2">
            <div>
              <label class="adm-label">Student Full Name *</label>
              <input type="text" name="nm" class="adm-input" style="text-transform: uppercase;" minlength="2" maxlength="30" placeholder="STUDENT FULL NAME" required />
            </div>
            <div>
              <label class="adm-label">Father's Name *</label>
              <input type="text" name="fnm" class="adm-input" style="text-transform: uppercase;" minlength="2" maxlength="30" placeholder="FATHER'S NAME" required />
            </div>
            <div>
              <label class="adm-label">Aadhaar ID Number (12 Digits) *</label>
              <input type="number" name="adhar" class="adm-input" minlength="12" maxlength="12" placeholder="AADHAAR NUMBER" required />
            </div>
            <div>
              <label class="adm-label">Mobile Number *</label>
              <input type="number" name="mob" class="adm-input" minlength="10" maxlength="11" placeholder="YOUR MOBILE NUMBER" required />
            </div>
            <div>
              <label class="adm-label">Email Address *</label>
              <input type="email" name="eid" class="adm-input" placeholder="EMAIL ADDRESS" required />
            </div>
            <div>
              <label class="adm-label">Gender *</label>
              <div style="display:flex;gap:20px;padding-top:10px;font-weight:700;color:var(--p-navy-deep);">
                <label style="cursor:pointer;"><input type="radio" name="gen" value="MALE" required /> MALE</label>
                <label style="cursor:pointer;"><input type="radio" name="gen" value="FEMALE" required /> FEMALE</label>
              </div>
            </div>
            <div>
              <label class="adm-label">Domicile *</label>
              <select name="dom" class="adm-select" required>
                <option value="MP">Madhya Pradesh (MP)</option>
                <option value="AI">All India (AI)</option>
              </select>
            </div>
            <div>
              <label class="adm-label">Category *</label>
              <select name="cat" class="adm-select" required>
                <option value="">-- SELECT CATEGORY --</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
                <option value="OBC">OBC</option>
                <option value="GEN">GEN</option>
                <option value="OTHER">OTHER</option>
              </select>
            </div>
            <div class="form-group-full">
              <label class="adm-label">Permanent Postal Address *</label>
              <textarea name="address" rows="3" class="adm-textarea" style="text-transform: uppercase;" placeholder="YOUR COMPLETE ADDRESS" required></textarea>
            </div>
          </div>

          <!-- 2. COURSE & BRANCH SELECTION -->
          <div class="adm-section-title">2. Course &amp; Branch Choice</div>
          <div class="form-grid-2">
            <div>
              <label class="adm-label">Select Course / Discipline *</label>
              <select name="category" class="adm-select" required>
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
              <label class="adm-label">Select Specialization / Branch *</label>
              <select name="choices" id="choices" class="adm-select" required>
                <!-- Populated automatically via JavaScript -->
              </select>
            </div>
          </div>

          <!-- 3. ACADEMIC QUALIFICATIONS -->
          <div class="adm-section-title">3. Academic Qualifications</div>
          <div style="overflow-x:auto;">
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
                  <td><input type="text" name="nob1" style="text-transform: uppercase;" placeholder="Board Name" required></td>
                  <td><input type="text" name="yop1" placeholder="Year" required></td>
                  <td><input type="text" name="tm1" placeholder="Max" required></td>
                  <td><input type="text" name="mo1" placeholder="Obt" required></td>
                  <td><input type="text" name="per1" placeholder="%" required></td>
                </tr>
                <tr>
                  <td><strong>12th Standard</strong></td>
                  <td><input type="text" name="nob2" style="text-transform: uppercase;" placeholder="Board Name"></td>
                  <td><input type="text" name="yop2" placeholder="Year"></td>
                  <td><input type="text" name="tm2" placeholder="Max"></td>
                  <td><input type="text" name="mo2" placeholder="Obt"></td>
                  <td><input type="text" name="per2" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Diploma</strong></td>
                  <td><input type="text" name="nob3" style="text-transform: uppercase;" placeholder="Polytechnic Board"></td>
                  <td><input type="text" name="yop3" placeholder="Year"></td>
                  <td><input type="text" name="tm3" placeholder="Max"></td>
                  <td><input type="text" name="mo3" placeholder="Obt"></td>
                  <td><input type="text" name="per3" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Graduation</strong></td>
                  <td><input type="text" name="nob4" style="text-transform: uppercase;" placeholder="University"></td>
                  <td><input type="text" name="yop4" placeholder="Year"></td>
                  <td><input type="text" name="tm4" placeholder="Max"></td>
                  <td><input type="text" name="mo4" placeholder="Obt"></td>
                  <td><input type="text" name="per4" placeholder="%"></td>
                </tr>
                <tr>
                  <td><strong>Post Graduation</strong></td>
                  <td><input type="text" name="nob5" style="text-transform: uppercase;" placeholder="University"></td>
                  <td><input type="text" name="yop5" placeholder="Year"></td>
                  <td><input type="text" name="tm5" placeholder="Max"></td>
                  <td><input type="text" name="mo5" placeholder="Obt"></td>
                  <td><input type="text" name="per5" placeholder="%"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- 4. REFERENCE & DECLARATION -->
          <div class="adm-section-title">4. Reference &amp; Undertaking</div>
          <div class="form-grid-2">
            <div class="form-group-full">
              <label class="adm-label">Reference By / Counselor Name *</label>
              <input type="text" name="ref" class="adm-input" style="text-transform: uppercase;" placeholder="NAME OF REFERENCE / COUNSELOR" required />
            </div>
            <div class="form-group-full" style="background:rgba(12,20,36,0.02);border:1px solid var(--p-hairline);border-radius:12px;padding:20px;font-size:14px;line-height:1.7;color:rgba(12,20,36,0.85);">
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
            <input type="reset" value="Reset Form" class="adm-reset-btn">
            <input type="submit" name="Submit" value="SUBMIT ADMISSION APPLICATION" class="adm-submit-btn">
          </div>

        </form>

      </div>

    </div>
  </section>

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
    var sel = form.elements['category'];
    sel.selectedIndex = 0;
    var relName = 'choices';
    var rel = form.elements[ relName ];
    var data = Select_List_Data[ relName ][ sel.value ];
    appendDataToSelect(rel, data);
}());
</script>

</body>
</html>
"""

with open("admissionform.php", "w", encoding="utf-8") as f:
    f.write(content)

print("Saved admissionform.php successfully!")
