<?php
// ============================================================
// RKDF University — Image Gallery
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
  <title>Photo Gallery — RKDF University Bhopal</title>
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
                  url('images/ai_gallery/rkdf_gallery_banner.jpg') center/cover no-repeat;
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
    .gal-caption {
      font-size: 15px;
      line-height: 1.6;
      color: #334155;
      font-weight: 500;
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
      <span class="rk-eyebrow tone-gold">10 · CAMPUS MEDIA &amp; EVENTS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Photo Gallery</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        A visual journey through academic achievements, NAAC A+ accreditation, convocation ceremonies, global awards, and vibrant campus life.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="gal-main-section">
    <div class="rk-container">
      
      <!-- Quick Subnav Links Bar -->
      <div class="gal-subnav-bar">
        <span class="gal-subnav-title">Media Categories:</span>
        <a href="imggallery.php" class="gal-subnav-btn active">Photo Gallery</a>
        <a href="videogallery.php" class="gal-subnav-btn">Video Gallery</a>
        <a href="Convocation-2023.php" class="gal-subnav-btn">Convocation 2023</a>
        <a href="Convocation-2024.php" class="gal-subnav-btn">Convocation 2024</a>
      </div>

      <!-- Gallery Grid Container -->
      <div class="gal-grid-container">

    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/15.jpg', 'RKDF University is awarded NAAC A+ by National Assessment and Accreditation Council (NAAC)')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/15.jpg" alt="RKDF University is awarded NAAC A+ by National Assessment and Accreditation Council (NAAC)" class="gal-img" onError="this.src='images/gallery/NAAC/15_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is awarded NAAC A+ by National Assessment and Accreditation Council (NAAC)</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/16.jpg', 'RKDF University is awarded NAAC A+ by National
											Assessment and Accreditation Council (NAAC)')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/16.jpg" alt="RKDF University is awarded NAAC A+ by National
											Assessment and Accreditation Council (NAAC)" class="gal-img" onError="this.src='images/gallery/NAAC/16_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is awarded NAAC A+ by National
											Assessment and Accreditation Council (NAAC)</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/womensday.jpeg', 'Celebration of International Women&#039;s Day on 8th March 2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/womensday.jpeg" alt="Celebration of International Women&#039;s Day on 8th March 2024" class="gal-img" onError="this.src='images/gallery/womensday_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Celebration of International Women&#039;s Day on 8th March 2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/MCU_VC.jpeg', 'Hon. Vice-chancellor MCUJMC, Bhopal Prof. K. G. Suresh
											visited our campus. He appreciated the research activities being conducted
											in the university. - 3rd Jan,2024')">
      <div class="gal-img-wrap">
        <img src="images/gallery/MCU_VC.jpeg" alt="Hon. Vice-chancellor MCUJMC, Bhopal Prof. K. G. Suresh
											visited our campus. He appreciated the research activities being conducted
											in the university. - 3rd Jan,2024" class="gal-img" onError="this.src='images/gallery/MCU_VC_S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Hon. Vice-chancellor MCUJMC, Bhopal Prof. K. G. Suresh
											visited our campus. He appreciated the research activities being conducted
											in the university. - 3rd Jan,2024</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/1.JPG', 'Heartly Welcome to NAAC Peer Team - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/1.JPG" alt="Heartly Welcome to NAAC Peer Team - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/1_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Heartly Welcome to NAAC Peer Team - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/2.JPG', 'Heartly Welcome to NAAC Peer Team - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/2.JPG" alt="Heartly Welcome to NAAC Peer Team - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/2_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Heartly Welcome to NAAC Peer Team - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/3.JPG', 'Heartly Welcome to NAAC Peer Team - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/3.JPG" alt="Heartly Welcome to NAAC Peer Team - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/3_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Heartly Welcome to NAAC Peer Team - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/4.JPG', 'NAAC Peer Team Pharmacy Department Visit - 20th
											Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/4.JPG" alt="NAAC Peer Team Pharmacy Department Visit - 20th
											Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/4_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Pharmacy Department Visit - 20th
											Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/5.JPG', 'NAAC Peer Team Civil Department Visit- 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/5.JPG" alt="NAAC Peer Team Civil Department Visit- 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/5_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Civil Department Visit- 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/6.JPG', 'NAAC Peer Team Audio Visual Research Centre Visit -
											20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/6.JPG" alt="NAAC Peer Team Audio Visual Research Centre Visit -
											20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/6_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Audio Visual Research Centre Visit -
											20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/7.JPG', 'NAAC Peer Team Computer Lab Visit - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/7.JPG" alt="NAAC Peer Team Computer Lab Visit - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/7_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Computer Lab Visit - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/8.JPG', 'NAAC Peer Team College of Ayurveda Visit - 20th
											Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/8.JPG" alt="NAAC Peer Team College of Ayurveda Visit - 20th
											Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/8_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team College of Ayurveda Visit - 20th
											Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/9.JPG', 'NAAC Peer Team Education Department Visit - 20th
											Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/9.JPG" alt="NAAC Peer Team Education Department Visit - 20th
											Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/9_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Education Department Visit - 20th
											Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/10.JPG', 'NAAC Peer Team Girls Hostel Visit - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/10.JPG" alt="NAAC Peer Team Girls Hostel Visit - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/10_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Girls Hostel Visit - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/11.JPG', 'NAAC Peer Team Canteen Visit- 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/11.JPG" alt="NAAC Peer Team Canteen Visit- 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/11_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">NAAC Peer Team Canteen Visit- 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/12.JPG', 'नैक पीयर टीम द्वारा संरक्षणोपन - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/12.JPG" alt="नैक पीयर टीम द्वारा संरक्षणोपन - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/12_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">नैक पीयर टीम द्वारा संरक्षणोपन - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/13.JPG', 'Cultural Events - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/13.JPG" alt="Cultural Events - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/13_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Cultural Events - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NAAC/14.JPG', 'Cultural Events - 20th Dec,2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NAAC/14.JPG" alt="Cultural Events - 20th Dec,2023" class="gal-img" onError="this.src='images/gallery/NAAC/14_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Cultural Events - 20th Dec,2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/oxford.jpeg', 'डॉ.साधना कपूर, कुलाधिपति को ऑक्सफ़ोर्ड अकादमिक यूनियन
											का सम्मान|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/oxford.jpeg" alt="डॉ.साधना कपूर, कुलाधिपति को ऑक्सफ़ोर्ड अकादमिक यूनियन
											का सम्मान|" class="gal-img" onError="this.src='images/gallery/oxford_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">डॉ.साधना कपूर, कुलाधिपति को ऑक्सफ़ोर्ड अकादमिक यूनियन
											का सम्मान|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/oxford2.jpeg', 'आरकेडीएफ विश्वविद्यालय की कुलाधिपति डॉ. साधना कपूर को
											अकादमिक यूनियन ऑक्सफोर्ड द्वारा विश्वविद्यालय के सामाजिक कार्य, अकादमिक
											उन्नयन एवं अनुसंधान के क्षेत्र में श्रेष्ठ प्रदर्शन के लिए ‘ग्रैंड स्टार
											सक्सेस अवार्ड’ से सम्मानित किया गया |')">
      <div class="gal-img-wrap">
        <img src="images/gallery/oxford2.jpeg" alt="आरकेडीएफ विश्वविद्यालय की कुलाधिपति डॉ. साधना कपूर को
											अकादमिक यूनियन ऑक्सफोर्ड द्वारा विश्वविद्यालय के सामाजिक कार्य, अकादमिक
											उन्नयन एवं अनुसंधान के क्षेत्र में श्रेष्ठ प्रदर्शन के लिए ‘ग्रैंड स्टार
											सक्सेस अवार्ड’ से सम्मानित किया गया |" class="gal-img" onError="this.src='images/gallery/oxford2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">आरकेडीएफ विश्वविद्यालय की कुलाधिपति डॉ. साधना कपूर को
											अकादमिक यूनियन ऑक्सफोर्ड द्वारा विश्वविद्यालय के सामाजिक कार्य, अकादमिक
											उन्नयन एवं अनुसंधान के क्षेत्र में श्रेष्ठ प्रदर्शन के लिए ‘ग्रैंड स्टार
											सक्सेस अवार्ड’ से सम्मानित किया गया |</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Allumini 2023.png', 'Alumni Meet- 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Allumini 2023.png" alt="Alumni Meet- 2023." class="gal-img" onError="this.src='images/gallery/Allumini 2023_s.png';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Alumni Meet- 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Allumini 20232.png', 'Alumni Meet- 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Allumini 20232.png" alt="Alumni Meet- 2023." class="gal-img" onError="this.src='images/gallery/Allumini 20232_s.png';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Alumni Meet- 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Allumini 20234.png', 'Alumni Meet- 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Allumini 20234.png" alt="Alumni Meet- 2023." class="gal-img" onError="this.src='images/gallery/Allumini 20234_s.png';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Alumni Meet- 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Allumini 20233.png', 'Alumni Meet- 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Allumini 20233.png" alt="Alumni Meet- 2023." class="gal-img" onError="this.src='images/gallery/Allumini 20233_s.png';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Alumni Meet- 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NCC-prog2.jpeg', 'Ad. Director General NCC(MP &amp; CG) Major General Ajay K
											Mahajan appreciates &amp; honored me for my work contribution in NCC &amp;
											performance during my PRCN Course.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NCC-prog2.jpeg" alt="Ad. Director General NCC(MP &amp; CG) Major General Ajay K
											Mahajan appreciates &amp; honored me for my work contribution in NCC &amp;
											performance during my PRCN Course." class="gal-img" onError="this.src='images/gallery/NCC-prog2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Ad. Director General NCC(MP &amp; CG) Major General Ajay K
											Mahajan appreciates &amp; honored me for my work contribution in NCC &amp;
											performance during my PRCN Course.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/vigyan_mela.jpeg', '10वां भोपाल विज्ञान मेला: RKDF यूनिवर्सिटी को मिला
											सम्मान।')">
      <div class="gal-img-wrap">
        <img src="images/gallery/vigyan_mela.jpeg" alt="10वां भोपाल विज्ञान मेला: RKDF यूनिवर्सिटी को मिला
											सम्मान।" class="gal-img" onError="this.src='images/gallery/vigyan_mela_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">10वां भोपाल विज्ञान मेला: RKDF यूनिवर्सिटी को मिला
											सम्मान।</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/vigyan_mela10.jpeg', 'शैक्षणिक संस्थानों में आरकेडीएफ विश्वविद्यालय को
											द्वितीय पुरस्कार से सम्मानित किया गया।')">
      <div class="gal-img-wrap">
        <img src="images/gallery/vigyan_mela10.jpeg" alt="शैक्षणिक संस्थानों में आरकेडीएफ विश्वविद्यालय को
											द्वितीय पुरस्कार से सम्मानित किया गया।" class="gal-img" onError="this.src='images/gallery/vigyan_mela10_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">शैक्षणिक संस्थानों में आरकेडीएफ विश्वविद्यालय को
											द्वितीय पुरस्कार से सम्मानित किया गया।</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/award2.JPG', 'World Education Leadership Award 2023 for Best Private
											University')">
      <div class="gal-img-wrap">
        <img src="images/gallery/award2.JPG" alt="World Education Leadership Award 2023 for Best Private
											University" class="gal-img" onError="this.src='images/gallery/award2_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">World Education Leadership Award 2023 for Best Private
											University</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/awards3.JPG', 'World Education Leadership Award 2023 for Best Private
											University')">
      <div class="gal-img-wrap">
        <img src="images/gallery/awards3.JPG" alt="World Education Leadership Award 2023 for Best Private
											University" class="gal-img" onError="this.src='images/gallery/awards3_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">World Education Leadership Award 2023 for Best Private
											University</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Mou1.jpeg', 'MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Mou1.jpeg" alt="MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023" class="gal-img" onError="this.src='images/gallery/Mou1_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/MoU2.jpeg', 'MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/MoU2.jpeg" alt="MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023" class="gal-img" onError="this.src='images/gallery/MoU2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">MoU signed between CSIR, New Delhi and RKDF University,
											Bhopal at IIT Bombay on 4th Aug, 2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Seminar4.JPG', 'One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Seminar4.JPG" alt="One Day National Seminar on Gender Discrimination on
											India. 17th March 2023." class="gal-img" onError="this.src='images/gallery/Seminar4_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Seminar3.JPG', 'One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Seminar3.JPG" alt="One Day National Seminar on Gender Discrimination on
											India. 17th March 2023." class="gal-img" onError="this.src='images/gallery/Seminar3_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Seminar2.JPG', 'One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Seminar2.JPG" alt="One Day National Seminar on Gender Discrimination on
											India. 17th March 2023." class="gal-img" onError="this.src='images/gallery/Seminar2_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Seminar1.JPG', 'One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Seminar1.JPG" alt="One Day National Seminar on Gender Discrimination on
											India. 17th March 2023." class="gal-img" onError="this.src='images/gallery/Seminar1_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">One Day National Seminar on Gender Discrimination on
											India. 17th March 2023.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/skill development.jpeg', 'Sri B.B. Gupta President, Strategy and Business
											planning JBM visited our University on 16th Mar 2023. We discussed about
											Industry Academia interaction and other issues related to skill development.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/skill development.jpeg" alt="Sri B.B. Gupta President, Strategy and Business
											planning JBM visited our University on 16th Mar 2023. We discussed about
											Industry Academia interaction and other issues related to skill development." class="gal-img" onError="this.src='images/gallery/skill development_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Sri B.B. Gupta President, Strategy and Business
											planning JBM visited our University on 16th Mar 2023. We discussed about
											Industry Academia interaction and other issues related to skill development.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/mahakoshal.jpeg', 'जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/mahakoshal.jpeg" alt="जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|" class="gal-img" onError="this.src='images/gallery/mahakoshal_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/mahakoshal2.jpeg', 'जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/mahakoshal2.jpeg" alt="जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|" class="gal-img" onError="this.src='images/gallery/mahakoshal2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/mahakoshal3.jpeg', 'जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/mahakoshal3.jpeg" alt="जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|" class="gal-img" onError="this.src='images/gallery/mahakoshal3_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">जनजाति कल्याण केंद्र, महाकौशल से पधारे मुख्य अतिथि एवं
											बच्चे|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Happyness2.jpeg', 'माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Happyness2.jpeg" alt="माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|" class="gal-img" onError="this.src='images/gallery/Happyness2_S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Happyness.jpeg', 'माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Happyness.jpeg" alt="माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|" class="gal-img" onError="this.src='images/gallery/Happyness_S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">माइंड ट्रेनर ने आरकेडीएफ के छात्रों को दिया स्ट्रेसलेस
											और हैप्पीनेस का गुरु मंत्र|</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Anoop Jalota Ji.jpeg', 'आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Anoop Jalota Ji.jpeg" alt="आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन" class="gal-img" onError="this.src='images/gallery/Anoop Jalota Ji_S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Anoop Jalota Ji2.jpeg', 'आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Anoop Jalota Ji2.jpeg" alt="आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन" class="gal-img" onError="this.src='images/gallery/Anoop Jalota Ji2_S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">आरकेडीएफ विश्वविद्यालय में गूंजे पद्मश्री अनूप जलोटा जी
											के भजन</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/1.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/1.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/1S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/2.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/2.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/2S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/3.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/3.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/3S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/4.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/4.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/4S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/6.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/6.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/6S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/7.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/7.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/7S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/8.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/8.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/8S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/9.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/9.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/9S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/10.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/10.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/10S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/11.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/11.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/11S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/12.jpg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/12.jpg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/12S.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/13.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/13.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/13S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/14.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/14.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/14S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/15.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/15.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/15S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/16.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/16.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/16S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/17.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/17.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/17S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Foundation Day/18.jpeg', 'RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Foundation Day/18.jpeg" alt="RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023" class="gal-img" onError="this.src='images/gallery/Foundation Day/18S.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 29th Foundation Day
											14th Feb-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/26th jan2.jpeg', 'RKDF University is celebrating its 74th Republic Day
											26th jan-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/26th jan2.jpeg" alt="RKDF University is celebrating its 74th Republic Day
											26th jan-2023" class="gal-img" onError="this.src='images/gallery/26th jan2_2.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 74th Republic Day
											26th jan-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/26th jan.jpeg', 'RKDF University is celebrating its 74th Republic Day
											26th jan-2023')">
      <div class="gal-img-wrap">
        <img src="images/gallery/26th jan.jpeg" alt="RKDF University is celebrating its 74th Republic Day
											26th jan-2023" class="gal-img" onError="this.src='images/gallery/26th jan_2.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University is celebrating its 74th Republic Day
											26th jan-2023</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/SCBose Jayanti.JFIF', 'Parakram Diwas 2023, Subhash Chandra Bose Jayanti')">
      <div class="gal-img-wrap">
        <img src="images/gallery/SCBose Jayanti.JFIF" alt="Parakram Diwas 2023, Subhash Chandra Bose Jayanti" class="gal-img" onError="this.src='images/gallery/SCBose Jayanti2.JFIF';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Parakram Diwas 2023, Subhash Chandra Bose Jayanti</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Vedic.jpeg', 'Special Session/ Lecture and Crime Scene experiences')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Vedic.jpeg" alt="Special Session/ Lecture and Crime Scene experiences" class="gal-img" onError="this.src='images/gallery/Vedic_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Special Session/ Lecture and Crime Scene experiences</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Crime Scene2.JPG', 'Special Session/ Lecture and Crime Scene experiences')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Crime Scene2.JPG" alt="Special Session/ Lecture and Crime Scene experiences" class="gal-img" onError="this.src='images/gallery/Crime Scene2_S.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Special Session/ Lecture and Crime Scene experiences</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Crime Scene.JPG', 'Special Session/ Lecture and Crime Scene experiences')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Crime Scene.JPG" alt="Special Session/ Lecture and Crime Scene experiences" class="gal-img" onError="this.src='images/gallery/Crime Scene _S.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Special Session/ Lecture and Crime Scene experiences</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_8.jfif', 'RKDF UTSAV 2022 Race~Girls')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_8.jfif" alt="RKDF UTSAV 2022 Race~Girls" class="gal-img" onError="this.src='images/gallery/rkdf utsav_8s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Race~Girls</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_7.jfif', 'RKDF UTSAV 2022 Carrom')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_7.jfif" alt="RKDF UTSAV 2022 Carrom" class="gal-img" onError="this.src='images/gallery/rkdf utsav_7s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Carrom</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_6.jfif', 'RKDF UTSAV 2022 Volleyball')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_6.jfif" alt="RKDF UTSAV 2022 Volleyball" class="gal-img" onError="this.src='images/gallery/rkdf utsav_6s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Volleyball</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_5.jfif', 'RKDF UTSAV 2022 kabaddi')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_5.jfif" alt="RKDF UTSAV 2022 kabaddi" class="gal-img" onError="this.src='images/gallery/rkdf utsav_5s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 kabaddi</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_4.jfif', 'RKDF UTSAV 2022 Girl&#039;s Cricket')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_4.jfif" alt="RKDF UTSAV 2022 Girl&#039;s Cricket" class="gal-img" onError="this.src='images/gallery/rkdf utsav_4s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Girl&#039;s Cricket</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav sp.jpeg', 'RKDF UTSAV 2022 Sports')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav sp.jpeg" alt="RKDF UTSAV 2022 Sports" class="gal-img" onError="this.src='images/gallery/rkdf utsav sp_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Sports</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_3.jpg', 'RKDF UTSAV 2022 Sports')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_3.jpg" alt="RKDF UTSAV 2022 Sports" class="gal-img" onError="this.src='images/gallery/rkdf utsav_3s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UTSAV 2022 Sports</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav_2.jfif', 'Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav_2.jfif" alt="Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses." class="gal-img" onError="this.src='images/gallery/rkdf utsav_2s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf utsav.jpeg', 'Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf utsav.jpeg" alt="Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses." class="gal-img" onError="this.src='images/gallery/rkdf utsav_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Inaugural ceremony of RKDF University Sports Function
											held on 14 November2022. Few glimpses.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/6th nov.jpg', 'Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/6th nov.jpg" alt="Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain." class="gal-img" onError="this.src='images/gallery/6th nov_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/6th nov2.jpg', 'Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/6th nov2.jpg" alt="Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain." class="gal-img" onError="this.src='images/gallery/6th nov2_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/6yh nov3.jpg', 'Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/6yh nov3.jpg" alt="Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain." class="gal-img" onError="this.src='images/gallery/6yh nov3_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Rastriya ekta diwas (National Unity Day) was Celebrated
											by RKDF University, Bhopal on 31st Oct. 2022 in Collaboration with Bhopal
											Police Commissionerate. Chief Guest on this occasion was ACP Richa Jain.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/law.jpeg', 'The Law Department was visited on 05/11/22 by District
											Judge Mr. Mohan Tiwari, in which he visited the Moot Court and Legal Clinic
											office and gave his views.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/law.jpeg" alt="The Law Department was visited on 05/11/22 by District
											Judge Mr. Mohan Tiwari, in which he visited the Moot Court and Legal Clinic
											office and gave his views." class="gal-img" onError="this.src='images/gallery/law_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">The Law Department was visited on 05/11/22 by District
											Judge Mr. Mohan Tiwari, in which he visited the Moot Court and Legal Clinic
											office and gave his views.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkchms camp.jpeg', 'Free Homoeopathic Medical camp at Deep Shikha School,
											by RKCHMS.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkchms camp.jpeg" alt="Free Homoeopathic Medical camp at Deep Shikha School,
											by RKCHMS." class="gal-img" onError="this.src='images/gallery/rkchms_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Free Homoeopathic Medical camp at Deep Shikha School,
											by RKCHMS.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/sw1.jpeg', 'Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/sw1.jpeg" alt="Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital." class="gal-img" onError="this.src='images/gallery/sw1_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/sw2.jpeg', 'Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital.')">
      <div class="gal-img-wrap">
        <img src="images/gallery/sw2.jpeg" alt="Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital." class="gal-img" onError="this.src='images/gallery/sw2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Swarna prashana camp for school children at Govt.
											Highschool, Gondermau by RKCAMS hospital.</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/MBBS-01.jpeg', 'MBBS Hindi Book Distribution Event - 2022
											Central Home Minister - Amit Shah @ MP Police, Lal Parade Ground')">
      <div class="gal-img-wrap">
        <img src="images/gallery/MBBS-01.jpeg" alt="MBBS Hindi Book Distribution Event - 2022
											Central Home Minister - Amit Shah @ MP Police, Lal Parade Ground" class="gal-img" onError="this.src='images/gallery/MBBS-01_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">MBBS Hindi Book Distribution Event - 2022
											Central Home Minister - Amit Shah @ MP Police, Lal Parade Ground</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/MBBS-02.jfif', 'MBBS Hindi Book Distribution Event - 2022
											Amit Shah launches MP Govt&#039;s Hindi-Medium Medical Education Book in Bhopal,
											Madhya Pradesh')">
      <div class="gal-img-wrap">
        <img src="images/gallery/MBBS-02.jfif" alt="MBBS Hindi Book Distribution Event - 2022
											Amit Shah launches MP Govt&#039;s Hindi-Medium Medical Education Book in Bhopal,
											Madhya Pradesh" class="gal-img" onError="this.src='images/gallery/MBBS-02_s.jfif';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">MBBS Hindi Book Distribution Event - 2022
											Amit Shah launches MP Govt&#039;s Hindi-Medium Medical Education Book in Bhopal,
											Madhya Pradesh</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/NCC Group Photo.jpeg', 'GROUP PHOTO OF 1 MPCTR NCC RKDF University, BHOPAL 2022')">
      <div class="gal-img-wrap">
        <img src="images/gallery/NCC Group Photo.jpeg" alt="GROUP PHOTO OF 1 MPCTR NCC RKDF University, BHOPAL 2022" class="gal-img" onError="this.src='images/gallery/NCC Group Photo_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">GROUP PHOTO OF 1 MPCTR NCC RKDF University, BHOPAL 2022</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/ncc.jpeg', 'Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation')">
      <div class="gal-img-wrap">
        <img src="images/gallery/ncc.jpeg" alt="Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation" class="gal-img" onError="this.src='images/gallery/ncc_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/ncc2.jpeg', 'Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation')">
      <div class="gal-img-wrap">
        <img src="images/gallery/ncc2.jpeg" alt="Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation" class="gal-img" onError="this.src='images/gallery/ncc2_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Routine Physical
											Examineation of MP CTR NCC RKDF Cadets Including BP &amp; Blood Investigation</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/2nd oct 2.jpeg', 'Nasha Mukti Abhiyaan')">
      <div class="gal-img-wrap">
        <img src="images/gallery/2nd oct 2.jpeg" alt="Nasha Mukti Abhiyaan" class="gal-img" onError="this.src='images/gallery/2nd oct 2 75.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Nasha Mukti Abhiyaan</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/2nd oct.jpeg', 'Gandhi Jayathi Celebrations')">
      <div class="gal-img-wrap">
        <img src="images/gallery/2nd oct.jpeg" alt="Gandhi Jayathi Celebrations" class="gal-img" onError="this.src='images/gallery/2nd oct 75.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Gandhi Jayathi Celebrations</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/Chancellor&#039;s mam bdy.jpeg', 'Free Medical Camp')">
      <div class="gal-img-wrap">
        <img src="images/gallery/Chancellor&#039;s mam bdy.jpeg" alt="Free Medical Camp" class="gal-img" onError="this.src='images/gallery/Chancellor&#039;s mam bdy_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Free Medical Camp</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/chancellor&#039;s mam birthday.jpeg', 'Free Medical Camp')">
      <div class="gal-img-wrap">
        <img src="images/gallery/chancellor&#039;s mam birthday.jpeg" alt="Free Medical Camp" class="gal-img" onError="this.src='images/gallery/chancellor&#039;s mam birthday_s.jpeg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Free Medical Camp</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/33.jpg', 'MADHURI DIXIT AT RKDF UNIV')">
      <div class="gal-img-wrap">
        <img src="images/gallery/33.jpg" alt="MADHURI DIXIT AT RKDF UNIV" class="gal-img" onError="this.src='images/gallery/science_innovation/33.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">MADHURI DIXIT AT RKDF UNIV</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/jadeja2.JPG', 'SPOTRTS SANGRAM')">
      <div class="gal-img-wrap">
        <img src="images/gallery/jadeja2.JPG" alt="SPOTRTS SANGRAM" class="gal-img" onError="this.src='images/gallery/jadeja2_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">SPOTRTS SANGRAM</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/jadeja1.JPG', 'SPOTRTS SANGRAM  Ajay Jadeja')">
      <div class="gal-img-wrap">
        <img src="images/gallery/jadeja1.JPG" alt="SPOTRTS SANGRAM  Ajay Jadeja" class="gal-img" onError="this.src='images/gallery/jadeja1_s.JPG';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">SPOTRTS SANGRAM  Ajay Jadeja</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/21.jpg', 'WOMENS DAY')">
      <div class="gal-img-wrap">
        <img src="images/gallery/21.jpg" alt="WOMENS DAY" class="gal-img" onError="this.src='images/gallery/science_innovation/21.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">WOMENS DAY</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/22.jpg', 'WOMENS DAY-')">
      <div class="gal-img-wrap">
        <img src="images/gallery/22.jpg" alt="WOMENS DAY-" class="gal-img" onError="this.src='images/gallery/science_innovation/22.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">WOMENS DAY-</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/DSCN0945.jpg', 'Campus Placement
								By HCL')">
      <div class="gal-img-wrap">
        <img src="images/gallery/DSCN0945.jpg" alt="Campus Placement
								By HCL" class="gal-img" onError="this.src='images/gallery/DSCN0945_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Campus Placement
								By HCL</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/DSCN0866.jpg', 'Campus Placement
								By Wipro')">
      <div class="gal-img-wrap">
        <img src="images/gallery/DSCN0866.jpg" alt="Campus Placement
								By Wipro" class="gal-img" onError="this.src='images/gallery/DSCN0866_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">Campus Placement
								By Wipro</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/8.jpg', 'RKDF
								At Campus')">
      <div class="gal-img-wrap">
        <img src="images/gallery/8.jpg" alt="RKDF
								At Campus" class="gal-img" onError="this.src='images/gallery/s8.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF
								At Campus</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/7.jpg', 'RKDF University
								Achivement')">
      <div class="gal-img-wrap">
        <img src="images/gallery/7.jpg" alt="RKDF University
								Achivement" class="gal-img" onError="this.src='images/gallery/s7.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF University
								Achivement</p>
      </div>
    </div>
    <div class="gal-card" onclick="openGalleryModal('images/gallery/rkdf_3.jpg', 'RKDF UNIV')">
      <div class="gal-img-wrap">
        <img src="images/gallery/rkdf_3.jpg" alt="RKDF UNIV" class="gal-img" onError="this.src='images/gallery/rkdf_3_s.jpg';">
        <div class="gal-overlay">
          <span class="gal-zoom-btn">🔍 View Photo</span>
        </div>
      </div>
      <div class="gal-info">
        <p class="gal-caption">RKDF UNIV</p>
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