<?php
// ============================================================
// RKDF University — B.Sc. NEP 3rd Year (Semesters 5 & 6) Syllabus
// World-Class Premium Design + High-Res Media Assets + 100% Original NEP Course PDF Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>B.Sc. NEP 3rd Year Syllabus (Sem V &amp; VI) — RKDF University Bhopal</title>
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
                  url('images/ai_syllabus_science_3yr/rkdf_syll_sci_3_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .ss3-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .ss3-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .ss3-grid-layout { grid-template-columns: 1fr; }
    }

    .ss3-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .ss3-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .ss3-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .ss3-badge {
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

    .ss3-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .ss3-card-body {
      padding: 32px 36px;
    }

    .ss3-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .ss3-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .ss3-block-card:hover .ss3-media-img {
      transform: scale(1.04);
    }

    /* Program Dropdown Selector */
    .prog-filter-bar {
      display: flex;
      gap: 16px;
      align-items: center;
      margin-bottom: 28px;
      background: #FAF9F5;
      padding: 18px 24px;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.07);
    }
    @media (max-width: 600px) {
      .prog-filter-bar { flex-direction: column; align-items: stretch; }
    }

    .prog-select {
      flex: 1;
      padding: 12px 18px;
      border-radius: 10px;
      border: 1px solid rgba(12, 20, 36, 0.15);
      background: #ffffff;
      font-size: 14.5px;
      color: #0C1424;
      font-weight: 600;
      outline: none;
    }

    /* Download Grid */
    .ss3-download-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 14px;
      margin-bottom: 32px;
    }

    .ss3-download-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.07);
      border-radius: 12px;
      transition: all 0.25s ease;
    }
    .ss3-download-row:hover {
      background: #ffffff;
      border-color: #C5A059;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(12, 20, 36, 0.05);
    }

    .ss3-row-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0C1424;
    }

    .ss3-pdf-link {
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
    .ss3-pdf-link:hover {
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
      <span class="rk-eyebrow tone-gold">69 · FACULTY OF SCIENCE (NEP 3RD YEAR SYLLABUS)</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">B.Sc. NEP 3rd Year Syllabus (Sem V &amp; VI)</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Curriculum schemes, Major specialization syllabi, and Discipline Specific Electives (DSE-I &amp; DSE-II) for B.Sc. 3rd Year (Semesters V &amp; VI) under NEP 2020.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="ss3-main-section">
    <div class="rk-container">
      <div class="ss3-grid-layout">
        
        <!-- LEFT COLUMN: SYLLABUS DOWNLOAD & SELECTOR -->
        <div>

          <article class="ss3-block-card">
            <div class="ss3-card-header">
              <h2 class="ss3-card-title">NEP 3rd Year Major &amp; DSE Syllabi</h2>
              <span class="ss3-badge">NEP 2020 COMPLIANT</span>
            </div>
            <div class="ss3-card-body">
              
              <!-- FACULTY SELECTOR DROPDOWN -->
              <div class="prog-filter-bar">
                <label for="syllabusSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">SELECT PROGRAM:</label>
                <select id="syllabusSelect" class="prog-select" onChange="window.location.href=this.value">
                  <?php include __DIR__ . '/include/syllabus.php'; ?>
                </select>
              </div>

              <div class="ss3-media-frame">
                <img src="images/ai_syllabus_science_3yr/rkdf_syll_sci_3_card.jpg" alt="RKDF Science Faculty Advanced Research &amp; Analytical Instrumentation Center" class="ss3-media-img">
              </div>

              <!-- SECTION 1: 5TH SEMESTER DSE SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                5th Semester Discipline Specific Electives (DSE)
              </div>

              <div class="ss3-download-grid">
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Biotech) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th%20Sem%20Biotech%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Computer Science) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th%20Sem%20Computer%20Science%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Microbiology) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th%20Sem%20Microbiology%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Physics) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th%20Sem%20Physics%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Botany) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Botany%20Sem%205th%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Chemistry) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Chemistry%20DSE%205th%20Sem.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Maths) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Maths%20DSE%205th%20Sem.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Zoology) 5th Sem DSE</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Zoology%205th%20Sem%20DSE.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 2: 5TH SEMESTER MAJOR SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                5th Semester Major Specialization Syllabi
              </div>

              <div class="ss3-download-grid">
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Biotech) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th%20Sem%20BioTech%20Syallbus%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Computer Science) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th%20Sem%20Computer%20Science%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Microbiology) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th%20Sem%20Major%20Microbiology.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Physics) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Physics%20Major%205th%20Sem.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Botany) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Botany%205th%20Sem%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Chemistry) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Chemistry%205th%20Sem%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Maths) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Maths%20Major%205th%20Sem.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">B.Sc. (Zoology) 5th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Zoology%205th%20Sem%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 3: 6TH SEMESTER MAJOR SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #C5A059;">
                6th Semester Major Specialization Syllabi
              </div>

              <div class="ss3-download-grid">
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Biotechnology 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Biotechology%206TH%20SEM%20major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Botany 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Botany%20Sem%206th%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Chemistry 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Chemistry%206th%20sem%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Computer Science 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Comp%206th%20sem%20major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Mathematics 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Maths%206th%20sem%20major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Microbiology 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Microbiology%206th%20sem.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Physics 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Phy%206th%20sem%20major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">Zoology 6th Sem Major</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Zoology%20Sem%206th%20Major.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

              <!-- SECTION 4: 6TH SEMESTER DSE-I & DSE-II SYLLABI -->
              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#0C1424;margin-bottom:14px;font-weight:700;padding-bottom:8px;border-bottom:2px solid #E31B23;">
                6th Semester DSE - I &amp; DSE - II Syllabi
              </div>

              <div class="ss3-download-grid">
                <div class="ss3-download-row">
                  <span class="ss3-row-title">BOTANY 6th Sem DSE - I</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/BOTANY%206%20SEM%20DSE%201.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">CHEMISTRY 6th Sem DSE - I</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/CHEMISTRY%206th%20Sem%20DSE%201.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">MATHEMATICS 6th Sem DSE - I</span>
                  <a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/NEP%20Maths%206th%20DSE%201.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">DSE - II Evaluation Scheme</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/Scheme%20semester.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">BIOTECHNOLOGY DSE - II</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/BIOTECHNOLOGY%20dse%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">BOTANY 6th Sem DSE - II</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/BOTANY%206%20SEM%20dse%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">CHEMISTRY 6th Sem DSE - II (Paper 2)</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/CHEMISTRY%206th%20SEM%20DSE%20Paper%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">COMPUTER SCIENCE DSE - II</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/comp%20dse%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">MICROBIOLOGY DSE - II</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/miro%20dse%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">MATHEMATICS DSE - II</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/nep%20Maths6th%20dse2.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
                <div class="ss3-download-row">
                  <span class="ss3-row-title">ZOOLOGY DSE - II (Paper 2)</span>
                  <a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/Zoology%20DSE%20Paper%202.pdf" target="_blank" class="ss3-pdf-link">📄 Download PDF ↗</a>
                </div>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Science Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="syllabus_science.php" class="sidebar-link">Science Syllabus Hub <span>→</span></a></li>
              <li><a href="syllabus_science_major.php" class="sidebar-link">NEP Major 1st Year <span>→</span></a></li>
              <li><a href="syllabus_science_major3rdsem.php" class="sidebar-link">NEP Major 2nd Year <span>→</span></a></li>
              <li><a href="syllabus_science_3year.php" class="sidebar-link active">NEP 3rd Year (Sem 5 &amp; 6) <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">All Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Syllabi <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department (HOD) <span>→</span></a></li>
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
