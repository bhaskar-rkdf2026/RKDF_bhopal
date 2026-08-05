<?php
// ============================================================
// RKDF University — Convocation Ceremony 2024
// World-Class Premium Design + Responsive Gallery Grid + Lightbox + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Convocation Ceremony 2024 — RKDF University Bhopal</title>
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
                  url('images/ai_convocation2024/rkdf_convocation2024_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .gal-main-section {
      padding: 70px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    /* Quick Filter Links Bar */
    .gal-subnav-bar {
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
    .gal-subnav-title {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: #C5A059;
      margin-right: 8px;
    }
    .gal-subnav-btn {
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
    .gal-subnav-btn:hover, .gal-subnav-btn.active {
      background: #0C1424;
      color: #ffffff !important;
      border-color: #0C1424;
    }
    .gal-subnav-btn.active {
      background: #E31B23;
      border-color: #E31B23;
    }

    /* Gallery Grid */
    .gal-grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 32px;
    }

    .gal-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      cursor: pointer;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
      display: flex;
      flex-direction: column;
    }
    .gal-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 42px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .gal-img-wrap {
      width: 100%;
      height: 240px;
      position: relative;
      overflow: hidden;
      background: #0C1424;
    }
    .gal-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .gal-card:hover .gal-img {
      transform: scale(1.08);
    }

    .gal-overlay {
      position: absolute;
      inset: 0;
      background: rgba(12, 20, 36, 0.6);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .gal-card:hover .gal-overlay {
      opacity: 1;
    }

    .gal-zoom-btn {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      color: #ffffff;
      background: #E31B23;
      padding: 10px 20px;
      border-radius: 99px;
      box-shadow: 0 4px 14px rgba(227,27,35,0.4);
    }

    .gal-info {
      padding: 22px 24px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .gal-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 10.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 3px 10px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.15);
      color: #E31B23;
      margin-bottom: 8px;
      width: fit-content;
    }

    .gal-caption {
      font-size: 15px;
      line-height: 1.6;
      color: #334155;
      font-weight: 600;
      margin: 0;
    }

    /* Modal Lightbox */
    .gal-modal {
      position: fixed;
      inset: 0;
      z-index: 99999;
      background: rgba(12, 20, 36, 0.92);
      backdrop-filter: blur(12px);
      display: none;
      align-items: center;
      justify-content: center;
      padding: 30px;
    }
    .gal-modal.active {
      display: flex;
    }

    .gal-modal-box {
      max-width: 900px;
      width: 100%;
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px rgba(0,0,0,0.5);
      position: relative;
    }
    .gal-modal-img {
      width: 100%;
      max-height: 560px;
      object-fit: contain;
      background: #000000;
      display: block;
    }
    .gal-modal-caption {
      padding: 24px 30px;
      font-size: 16px;
      line-height: 1.7;
      color: #0C1424;
      font-weight: 600;
      background: #ffffff;
      border-top: 3px solid #E31B23;
    }
    .gal-modal-close {
      position: absolute;
      top: 16px;
      right: 20px;
      background: rgba(0,0,0,0.7);
      color: #ffffff;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
      z-index: 10;
    }
    .gal-modal-close:hover {
      background: #E31B23;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">14 · ACADEMIC CONVOCATIONS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Convocation Ceremony 2024</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Celebrating academic excellence, gold medal awards, and degree conferment at the Annual Convocation Ceremony held on 04th May 2024.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="gal-main-section">
    <div class="rk-container">
      
      <!-- Quick Subnav Links Bar -->
      <div class="gal-subnav-bar">
        <span class="gal-subnav-title">Media Categories:</span>
        <a href="imggallery.php" class="gal-subnav-btn">Photo Gallery</a>
        <a href="videogallery.php" class="gal-subnav-btn">Video Gallery</a>
        <a href="Convocation-2023.php" class="gal-subnav-btn">Convocation 2023</a>
        <a href="Convocation-2024.php" class="gal-subnav-btn active">Convocation 2024</a>
      </div>

      <!-- Gallery Grid Container -->
      <div class="gal-grid-container">

    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/01.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/01.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/01.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/02.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/02.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/02.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/03.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/03.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/03.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/04.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/04.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/04.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/05.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/05.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/05.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/06.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/06.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/06.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/07.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/07.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/07.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/08.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/08.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/08.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/09.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/09.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/09.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/10.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/10.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/10.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/11.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/11.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/11.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/12.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/12.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/12.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/13.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/13.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/13.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/14.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/14.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/14.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/15.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/15.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/15.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/16.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/16.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/16.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/17.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/17.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/17.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/18.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/18.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/18.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/19.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/19.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/19.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/20.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/20.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/20.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/21.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/21.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/21.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/22.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/22.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/22.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/23.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/23.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/23.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/24.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/24.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/24.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/25.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/25.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/25.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/26.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/26.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/26.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/27.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/27.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/27.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Convocation-2024/28.JPG', 'Convocation Ceremony- 04th May 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Convocation-2024/28.JPG" alt="Convocation Ceremony- 04th May 2024" class="gal-img" onError="this.src='images/gallery/Convocation-2024/28.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <span class="gal-badge">CONVOCATION 2024</span>
        <p class="gal-caption">Convocation Ceremony- 04th May 2024</p>
      </div>
    </div>
      </div>

    </div>
  </main>

  <!-- Modal Lightbox Preview -->
  <div class="gal-modal" id="galModal" onclick="closeGalleryModal(event)">
    <div class="gal-modal-box" onclick="event.stopPropagation()">
      <button class="gal-modal-close" onclick="closeGalleryModal()">✕</button>
      <img id="galModalImg" src="" alt="" class="gal-modal-img">
      <div id="galModalCap" class="gal-modal-caption"></div>
    </div>
  </div>

  <script>
    function openGalleryModal(imgSrc, caption) {
      document.getElementById('galModalImg').src = imgSrc;
      document.getElementById('galModalCap').innerText = caption;
      document.getElementById('galModal').classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeGalleryModal(e) {
      document.getElementById('galModal').classList.remove('active');
      document.body.style.overflow = '';
    }
  </script>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>