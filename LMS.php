<?php
// ============================================================
// RKDF University — Learning Management System (LMS)
// World-Class Premium Design + High-Res Media Assets + 100% Original E-Lectures & Video Links Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System (LMS) — RKDF University Bhopal</title>
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
                  url('images/ai_lms/rkdf_lms_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .lms-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .lms-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .lms-grid-layout { grid-template-columns: 1fr; }
    }

    .lms-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .lms-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .lms-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .lms-badge {
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

    .lms-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .lms-card-body {
      padding: 32px 36px;
    }

    .lms-media-frame {
      width: 100%;
      height: 260px;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 32px;
      position: relative;
    }
    .lms-media-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .lms-block-card:hover .lms-media-img {
      transform: scale(1.04);
    }

    /* Video Item Rows */
    .video-group {
      margin-bottom: 32px;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.06);
      border-radius: 14px;
      padding: 24px 28px;
    }

    .video-group-title {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .video-item-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 18px;
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 10px;
      margin-bottom: 10px;
      transition: all 0.25s ease;
    }
    .video-item-row:last-child {
      margin-bottom: 0;
    }
    .video-item-row:hover {
      border-color: #E31B23;
      transform: translateX(4px);
      box-shadow: 0 4px 14px rgba(12, 20, 36, 0.05);
    }

    .video-item-name {
      font-size: 14.5px;
      font-weight: 600;
      color: #0C1424;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .lms-video-link {
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
    .lms-video-link:hover {
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
      <span class="rk-eyebrow tone-gold">47 · E-LEARNING &amp; LECTURES</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Learning Management System (LMS)</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Digital e-content, video lectures, NPTEL modules, SWAYAM courses, and online study materials across Engineering, Science, Homeopathy, and Military Science.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="lms-main-section">
    <div class="rk-container">
      <div class="lms-grid-layout">
        
        <!-- LEFT COLUMN: E-LECTURES BY FACULTY -->
        <div>

          <!-- OVERVIEW BLOCK -->
          <article class="lms-block-card">
            <div class="lms-card-header">
              <h2 class="lms-card-title">Digital E-Content &amp; Video Lectures</h2>
              <span class="lms-badge">NAAC CRITERIA 3.4.7</span>
            </div>
            <div class="lms-card-body">
              
              <div class="lms-media-frame">
                <img src="images/ai_lms/rkdf_lms_card.jpg" alt="RKDF Digital Learning Terminal &amp; E-Classroom" class="lms-media-img">
              </div>

              <div style="font-family:'Playfair Display',serif;font-size:22px;color:#C5A059;margin-bottom:14px;font-weight:700;">
                Online Video Lectures &amp; Digital Courseware
              </div>

              <p style="font-size:16.5px;line-height:1.85;color:#334155;margin-bottom:28px;">
                Access subject-wise e-lectures, video demonstrations, and digital learning content created by RKDF University faculty and national e-learning portals (SWAYAM, NPTEL, e-PGPathshala).
              </p>

              <!-- ENGINEERING E-LECTURES -->
              <div class="video-group">
                <div class="video-group-title">
                  <span>Faculty of Engineering</span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">28 E-LECTURES</span>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ BEEE Average Value</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/beee_average_value.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ BEEE Faradays Law</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/beee_faradays_law.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Bernaullis Equation</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/bernaullis_equation.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Boundryn Layer Flow</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/boundry_layer_flow.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Convulation Theorem</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/convulation_theorem.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ CPM Power Shovel</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/cpm_power_shovel.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ DHS 1</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_1.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ DHS 2</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_2.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ DHS 3</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_3.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Economic Operation</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/econimic_operation.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Engg. Maths 1</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/em_1.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Engg. Maths 2</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/em_2.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ EMT Faradays</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/emt_faradays.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Induction Type Energy Meter</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/induction_type_energy_meter.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Linear Particle Accelerator</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Linear_Particle_Acclerator.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Load Commutation</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/load_commutation.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Locomotive</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/locomotive.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Losses In Pipe</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/losses_in_%20pipe_2.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Mechanism of Train Movement</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/mechanism_of_Train_Movement.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Number System 1</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/number_system.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Number System 2</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/number_system_2.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Phase Full Converter Drive</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/1_phase_full_converter_drive.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Scaler Magnetic Potential</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/scaler_magnetic_potential.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Tariff</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Tariff.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Thermal Hydro Power Plant</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Thermal_hydro_%20power_plant.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Carrier Phase (NPTEL)</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Carrier%20Phase%20NPTEL.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Channel Capacity (SWAYAM)</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Channel%20Capacity%20SWAYAM.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Optimal Decision (E-PGPATHSHALA)</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Optimal%20Decision%20E-PGPATHSHALA.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

              </div>

              <!-- SCIENCE E-LECTURES -->
              <div class="video-group">
                <div class="video-group-title">
                  <span>Faculty of Science</span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">9 E-LECTURES</span>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Thalassemia &amp; Sickle Cell Anaemia Mission-2030</span>
                  <a href="images/gallery/video/sickle_cell.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Bioinformatics</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/bioinformatics.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ BIOTECH 1</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/BIOTECH_1.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ BIOTECH 2</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/BIOTECH_2.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Blood Transfusion</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/blood_transfusion.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ BMM</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/bmm_1.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Diabetes</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/diabetes.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Ecology</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Ecology.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Operating System</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/operating_system.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

              </div>

              <!-- HOMEOPATHY E-LECTURES -->
              <div class="video-group">
                <div class="video-group-title">
                  <span>Faculty of Homeopathy</span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">2 E-LECTURES</span>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Case Taking</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/CASE_TAKING.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Indication of Nosodes</span>
                  <a href="https://rkdf.ac.in/naac/criteria3/3.4.7/Indication_of_Nosodes.mp4" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

              </div>

              <!-- NCC E-LECTURES -->
              <div class="video-group">
                <div class="video-group-title">
                  <span>NCC Army Wing</span>
                  <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">1 E-LECTURE</span>
                </div>

                <div class="video-item-row">
                  <span class="video-item-name">▶ Field Craft &amp; Battle Craft</span>
                  <a href="https://youtu.be/vS1vrEWOn-E?si=Z2vfxTI9TjTTTkab" target="_blank" class="lms-video-link">🎬 Watch Video ↗</a>
                </div>

              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">E-Learning &amp; Portals</h3>
            <ul class="sidebar-nav-list">
              <li><a href="LMS.php" class="sidebar-link active">LMS Portal <span>→</span></a></li>
              <li><a href="E_Resource.php" class="sidebar-link">E-Resources Portal <span>→</span></a></li>
              <li><a href="eresourse_login.php" class="sidebar-link">E-Resource Login <span>→</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link">Course Syllabi <span>→</span></a></li>
              <li><a href="syllabus_Value-added.php" class="sidebar-link">Value-Added Courses <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
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
