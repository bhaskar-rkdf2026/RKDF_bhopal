<?php
// ============================================================
// RKDF University — Video Gallery
// World-Class Premium Design + Responsive Video Grid + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Gallery — RKDF University Bhopal</title>
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
                  url('images/ai_video_gallery/rkdf_video_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .vid-main-section {
      padding: 70px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    /* Quick Filter Links Bar */
    .vid-subnav-bar {
      display: flex;
      align-items: center;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 44px;
      padding: 16px 24px;
      background: #ffffff;
      border: 1px solid rgba(12,20,36,0.08);
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(12,20,36,0.03);
    }
    .vid-subnav-title {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: #C5A059;
      margin-right: 8px;
    }
    .vid-subnav-btn {
      padding: 10px 20px;
      border-radius: 99px;
      font-size: 14px;
      font-weight: 600;
      color: #0C1424;
      text-decoration: none;
      background: #FAF9F5;
      border: 1px solid rgba(12,20,36,0.08);
      transition: all 0.25s ease;
    }
    .vid-subnav-btn:hover, .vid-subnav-btn.active {
      background: #0C1424;
      color: #ffffff !important;
      border-color: #0C1424;
    }
    .vid-subnav-btn.active {
      background: #E31B23;
      border-color: #E31B23;
    }

    /* Video Grid */
    .vid-grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
      gap: 32px;
    }
    @media (max-width: 576px) {
      .vid-grid-container { grid-template-columns: 1fr; }
    }

    .vid-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      transition: transform 0.35s ease, box-shadow 0.35s ease;
      display: flex;
      flex-direction: column;
    }
    .vid-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 42px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .vid-player-wrap {
      width: 100%;
      height: 240px;
      background: #000000;
      position: relative;
    }
    .vid-player-wrap video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .vid-info {
      padding: 24px 28px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .vid-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.1);
      color: #E31B23;
      margin-bottom: 10px;
      width: fit-content;
    }

    .vid-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.5;
      margin: 0;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">12 · CAMPUS MEDIA &amp; VIDEOS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Video Gallery</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Watch video coverage of RKDF University campus initiatives, Oxford academic awards, Viksit Bharat @2047, and NCC activities.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="vid-main-section">
    <div class="rk-container">
      
      <!-- Quick Subnav Links Bar -->
      <div class="vid-subnav-bar">
        <span class="vid-subnav-title">Media Categories:</span>
        <a href="imggallery.php" class="vid-subnav-btn">Photo Gallery</a>
        <a href="videogallery.php" class="vid-subnav-btn active">Video Gallery</a>
        <a href="Convocation-2023.php" class="vid-subnav-btn">Convocation 2023</a>
        <a href="Convocation-2024.php" class="vid-subnav-btn">Convocation 2024</a>
      </div>

      <!-- Video Grid Container -->
      <div class="vid-grid-container">

        <!-- Video 1 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/viksit_bharat.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">NATIONAL INITIATIVE</span>
              <h2 class="vid-title">विकसित भारत @2047</h2>
            </div>
          </div>
        </article>

        <!-- Video 2 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/oxford.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">GLOBAL HONORS</span>
              <h2 class="vid-title">डॉ. साधना कपूर, कुलाधिपति को ऑक्सफ़ोर्ड अकादमिक यूनियन का सम्मान</h2>
            </div>
          </div>
        </article>

        <!-- Video 3 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/Nasha Mukti.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">SOCIAL CAMPAIGN</span>
              <h2 class="vid-title">Organizes - Drug De-Addiction Bharat Campaign (Part 1)</h2>
            </div>
          </div>
        </article>

        <!-- Video 4 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/Nasha Mukti Abhiyan.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">SOCIAL CAMPAIGN</span>
              <h2 class="vid-title">Drug De-Addiction Bharat Campaign (Part 2)</h2>
            </div>
          </div>
        </article>

        <!-- Video 5 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/National Integration Day.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">UNIVERSITY EVENTS</span>
              <h2 class="vid-title">National Integration Day Programme - October 30, 2022</h2>
            </div>
          </div>
        </article>

        <!-- Video 6 -->
        <article class="vid-card">
          <div class="vid-player-wrap">
            <video controls preload="metadata">
              <source src="images/gallery/video/nadi safai.mp4" type="video/mp4">
              Your browser does not support HTML video.
            </video>
          </div>
          <div class="vid-info">
            <div>
              <span class="vid-badge">NCC OUTREACH</span>
              <h2 class="vid-title">पुनीत सागर अभियान के तहत 1 MPCTR एनसीसी कैडेट कोर ने की सफाई</h2>
            </div>
          </div>
        </article>

      </div>

    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
