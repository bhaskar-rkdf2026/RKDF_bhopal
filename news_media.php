<?php
// ============================================================
// RKDF University — Official News & Media Coverage Page
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pageTitle = 'News & Media Coverage — RKDF University Bhopal';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/include/head_meta.php'; ?>
  <style>
    :root {
      --nm-navy-dark: #070d18;
      --nm-navy-mid: #0f172a;
      --nm-red: #d9232d;
      --nm-red-hover: #b91c1c;
      --nm-gold: #f59e0b;
      --nm-bg-light: #f8fafc;
      --nm-border: #e2e8f0;
      --nm-text-muted: #64748b;
      --nm-text-dark: #0f172a;
    }

    body {
      background-color: var(--nm-bg-light);
      color: #334155;
      font-family: 'Outfit', sans-serif;
    }

    /* ── Hero Banner ── */
    .nm-hero-section {
      position: relative;
      padding: 160px 0 80px;
      background: linear-gradient(135deg, #070d18 0%, #0f1b33 50%, #162444 100%);
      color: #ffffff;
      overflow: hidden;
      border-bottom: 3px solid var(--nm-red);
    }
    .nm-hero-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(217,35,45,0.18) 0%, transparent 70%);
      pointer-events: none;
    }
    .nm-hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.35);
      color: #fcd34d;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      border-radius: 99px;
      margin-bottom: 18px;
    }
    .nm-hero-h1 {
      font-size: clamp(2.4rem, 4.5vw, 3.8rem);
      font-weight: 800;
      line-height: 1.15;
      color: #ffffff;
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }
    .nm-hero-h1 span {
      background: linear-gradient(90deg, #f87171, #fbbf24);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .nm-hero-sub {
      font-size: 17px;
      color: #94a3b8;
      max-width: 680px;
      line-height: 1.6;
    }

    /* ── Filter / Quick Nav Tabs ── */
    .nm-nav-tabs-bar {
      background: #ffffff;
      border-bottom: 1px solid var(--nm-border);
      position: sticky;
      top: 72px;
      z-index: 40;
      box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }
    .nm-tabs-wrap {
      display: flex;
      align-items: center;
      gap: 12px;
      overflow-x: auto;
      padding: 12px 0;
      scrollbar-width: none;
    }
    .nm-tabs-wrap::-webkit-scrollbar { display: none; }
    .nm-tab-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 18px;
      border-radius: 99px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      color: #475569;
      background: #f1f5f9;
      white-space: nowrap;
      transition: all 0.2s ease;
      border: 1px solid transparent;
    }
    .nm-tab-pill:hover, .nm-tab-pill.active {
      background: var(--nm-red);
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(217,35,45,0.25);
    }

    /* ── Main Container ── */
    .nm-main-wrap {
      padding: 50px 0 100px;
    }

    /* ── Featured Cover Story Card ── */
    .nm-featured-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid var(--nm-border);
      overflow: hidden;
      box-shadow: 0 16px 40px rgba(15,23,42,0.06);
      display: grid;
      grid-template-columns: 1.05fr 1.35fr;
      margin-bottom: 60px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .nm-featured-card:hover {
      box-shadow: 0 20px 50px rgba(15,23,42,0.1);
    }
    .nm-feat-media-box {
      background: #0b1324;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      position: relative;
    }
    .nm-feat-poster-img {
      max-width: 100%;
      height: auto;
      max-height: 480px;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.4);
      object-fit: contain;
    }
    .nm-feat-content {
      padding: 44px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .nm-pill-tag {
      display: inline-block;
      align-self: flex-start;
      padding: 4px 12px;
      background: #fef2f2;
      color: var(--nm-red);
      border-radius: 99px;
      font-size: 11.5px;
      font-weight: 800;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      margin-bottom: 14px;
      border: 1px solid rgba(217,35,45,0.2);
    }
    .nm-feat-title {
      font-size: clamp(22px, 2.5vw, 32px);
      font-weight: 800;
      color: var(--nm-navy-mid);
      line-height: 1.25;
      margin-bottom: 16px;
    }
    .nm-feat-summary {
      font-size: 16px;
      line-height: 1.7;
      color: #475569;
      margin-bottom: 22px;
    }
    .nm-stats-strip {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      padding: 16px 20px;
      background: #f8fafc;
      border: 1px solid var(--nm-border);
      border-radius: 12px;
      margin-bottom: 26px;
    }
    .nm-stat-item .num {
      font-size: 20px;
      font-weight: 800;
      color: var(--nm-red);
    }
    .nm-stat-item .lbl {
      font-size: 11.5px;
      color: #64748b;
      font-weight: 600;
      text-transform: uppercase;
      margin-top: 2px;
    }
    .nm-feat-actions {
      display: flex;
      align-items: center;
      gap: 14px;
      flex-wrap: wrap;
    }
    .nm-btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      background: var(--nm-red);
      color: #ffffff !important;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.2s ease;
      box-shadow: 0 6px 18px rgba(217,35,45,0.25);
    }
    .nm-btn-primary:hover {
      background: var(--nm-red-hover);
      transform: translateY(-2px);
      box-shadow: 0 8px 22px rgba(217,35,45,0.35);
    }
    .nm-btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 22px;
      background: #ffffff;
      color: var(--nm-navy-mid) !important;
      border: 1px solid var(--nm-border);
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .nm-btn-secondary:hover {
      background: #f1f5f9;
      border-color: #cbd5e1;
    }

    /* ── Section Header ── */
    .nm-sec-header {
      margin-bottom: 32px;
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
    }
    .nm-sec-eyebrow {
      font-size: 12px;
      font-weight: 800;
      color: var(--nm-red);
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 4px;
    }
    .nm-sec-title {
      font-size: 26px;
      font-weight: 800;
      color: var(--nm-navy-mid);
    }

    /* ── News & Press Grid ── */
    .nm-news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 26px;
      margin-bottom: 60px;
    }
    .nm-grid-card {
      background: #ffffff;
      border: 1px solid var(--nm-border);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(15,23,42,0.03);
      display: flex;
      flex-direction: column;
      transition: all 0.25s ease;
      text-decoration: none;
      color: inherit;
    }
    .nm-grid-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 14px 30px rgba(15,23,42,0.08);
      border-color: #cbd5e1;
    }
    .nm-card-img-wrap {
      width: 100%;
      height: 190px;
      background: #e2e8f0;
      position: relative;
      overflow: hidden;
    }
    .nm-card-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .nm-grid-card:hover .nm-card-img {
      transform: scale(1.05);
    }
    .nm-card-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      padding: 4px 10px;
      background: rgba(15, 23, 42, 0.85);
      backdrop-filter: blur(4px);
      color: #ffffff;
      font-size: 10.5px;
      font-weight: 700;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      border-radius: 6px;
    }
    .nm-card-body {
      padding: 22px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }
    .nm-card-date {
      font-size: 12px;
      color: var(--nm-text-muted);
      font-weight: 600;
      margin-bottom: 8px;
    }
    .nm-card-title {
      font-size: 17px;
      font-weight: 700;
      line-height: 1.4;
      color: var(--nm-navy-mid);
      margin-bottom: 10px;
    }
    .nm-card-desc {
      font-size: 14px;
      line-height: 1.6;
      color: #64748b;
      margin-bottom: 16px;
      flex: 1;
    }
    .nm-card-link-txt {
      font-size: 13px;
      font-weight: 700;
      color: var(--nm-red);
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* ── Quick Media Resources Strip ── */
    .nm-resources-card {
      background: linear-gradient(135deg, #0b1324 0%, #152238 100%);
      border-radius: 20px;
      padding: 40px;
      color: #ffffff;
      box-shadow: 0 16px 40px rgba(0,0,0,0.15);
      margin-top: 40px;
    }
    .nm-resources-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .nm-res-box {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      padding: 20px;
      border-radius: 14px;
      text-decoration: none;
      color: #ffffff;
      transition: all 0.25s ease;
    }
    .nm-res-box:hover {
      background: rgba(255,255,255,0.12);
      transform: translateY(-3px);
      border-color: rgba(245, 158, 11, 0.4);
    }
    .nm-res-icon {
      font-size: 26px;
      margin-bottom: 12px;
    }
    .nm-res-title {
      font-size: 16px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4px;
    }
    .nm-res-desc {
      font-size: 12.5px;
      color: #94a3b8;
      line-height: 1.4;
    }

    @media (max-width: 991px) {
      .nm-featured-card {
        grid-template-columns: 1fr;
      }
      .nm-feat-content {
        padding: 30px;
      }
      .nm-stats-strip {
        grid-template-columns: 1fr;
        gap: 10px;
      }
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- ── HERO BANNER ── -->
  <header class="nm-hero-section">
    <div class="rk-container">
      <div class="nm-hero-badge">
        <span>📰 Media &amp; Public Relations Cell</span>
      </div>
      <h1 class="nm-hero-h1">
        News &amp; <span>Media Coverage</span>
      </h1>
      <p class="nm-hero-sub">
        Official press releases, headline placement achievements, institutional milestones, and published media coverage from RKDF University Bhopal.
      </p>
    </div>
  </header>

  <!-- ── QUICK SECTION NAV TABS ── -->
  <nav class="nm-nav-tabs-bar" aria-label="Media Sections">
    <div class="rk-container">
      <div class="nm-tabs-wrap">
        <a href="#featured-story" class="nm-tab-pill active">⭐ Top Placement Story</a>
        <a href="#press-releases" class="nm-tab-pill">📰 Press Releases</a>
        <a href="#placement-news" class="nm-tab-pill">💼 Placement Drives</a>
        <a href="News_Letter.php" class="nm-tab-pill">📄 University Newsletters ↗</a>
        <a href="imggallery.php" class="nm-tab-pill">📸 Photo Gallery ↗</a>
        <a href="Announcements.php" class="nm-tab-pill">📢 Circulars &amp; Notices ↗</a>
      </div>
    </div>
  </nav>

  <!-- ── MAIN CONTENT ── -->
  <main class="nm-main-wrap">
    <div class="rk-container">

      <!-- ══ FEATURED MILESTONE STORY ══ -->
      <section id="featured-story" style="scroll-margin-top: 140px;">
        <div class="nm-featured-card">
          <div class="nm-feat-media-box">
            <img src="images/rkdf_milestone_poster.jpg" alt="Aman Sharma - Selected at Amazon AWS with 44.5 LPA Package" class="nm-feat-poster-img" loading="eager">
          </div>
          <div class="nm-feat-content">
            <span class="nm-pill-tag">HEADLINE PLACEMENT • AMAZON AWS</span>
            <h2 class="nm-feat-title">
              RKDF University Student Aman Sharma Bags ₹44.5 LPA Package at Amazon AWS
            </h2>
            <p class="nm-feat-summary">
              In a historic campus placement milestone, <strong>Aman Sharma</strong>, final-year B.Tech in Computer Science &amp; Engineering at RKDF University Bhopal, has secured an international selection as Software Development Engineer (SDE) at <strong>Amazon Web Services (AWS)</strong> with an unprecedented salary package of <strong>₹44.5 Lakhs Per Annum</strong>.
            </p>

            <div class="nm-stats-strip">
              <div class="nm-stat-item">
                <div class="num">₹44.5 LPA</div>
                <div class="lbl">Record CTC Package</div>
              </div>
              <div class="nm-stat-item">
                <div class="num">Amazon AWS</div>
                <div class="lbl">Global Recruiter</div>
              </div>
              <div class="nm-stat-item">
                <div class="num">B.Tech CSE</div>
                <div class="lbl">Dept of Engineering</div>
              </div>
            </div>

            <div class="nm-feat-actions">
              <a href="t&p.php" class="nm-btn-primary">
                <span>View Placement Cell &amp; Statistics</span>
                <span>→</span>
              </a>
              <a href="images/rkdf_milestone_poster.jpg" target="_blank" rel="noopener noreferrer" class="nm-btn-secondary">
                <span>Open Full Poster ↗</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- ══ PRESS RELEASES & MEDIA HEADLINES ══ -->
      <section id="press-releases" style="scroll-margin-top: 140px;">
        <div class="nm-sec-header">
          <div>
            <div class="nm-sec-eyebrow">Official Publications</div>
            <h3 class="nm-sec-title">Recent Media Highlights &amp; Press Coverage</h3>
          </div>
          <a href="Announcements.php" style="color:var(--nm-red);font-weight:700;font-size:14px;text-decoration:none;">View All Circulars ↗</a>
        </div>

        <div class="nm-news-grid">

          <!-- Card 1 -->
          <article class="nm-grid-card">
            <div class="nm-card-img-wrap">
              <img src="images/lovable/rkdf-campus-aerial.jpg" alt="14th Annual Convocation RKDF" class="nm-card-img" loading="lazy">
              <span class="nm-card-badge">CONVOCATION</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 28 August 2024 • Press Release</div>
              <h4 class="nm-card-title">14th Annual Convocation Honours 4,200 Graduates Across 11 Schools</h4>
              <p class="nm-card-desc">
                Chancellor Shri Sunil Kapoor conferred degrees, gold medals, and doctoral diplomas upon the largest graduating cohort in university history.
              </p>
              <a href="news_detail.php?id=1" class="nm-card-link-txt">Read Full Press Release →</a>
            </div>
          </article>

          <!-- Card 2 -->
          <article class="nm-grid-card">
            <div class="nm-card-img-wrap">
              <img src="images/lovable/rkdf-engineering.jpg" alt="Department of Physics DST Grant" class="nm-card-img" loading="lazy">
              <span class="nm-card-badge">RESEARCH &amp; GRANTS</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 26 August 2024 • National Coverage</div>
              <h4 class="nm-card-title">Department of Physics Wins Competitive DST Grant for Quantum Sensing</h4>
              <p class="nm-card-desc">
                Department of Science &amp; Technology (DST), Govt. of India awards major competitive research grant for advanced solid-state magnetometer development.
              </p>
              <a href="news_detail.php?id=2" class="nm-card-link-txt">Read Full Coverage →</a>
            </div>
          </article>

          <!-- Card 3 -->
          <article class="nm-grid-card" id="placement-news">
            <div class="nm-card-img-wrap">
              <img src="images/11/TNP_Placed Stud.jpg" alt="Campus Placement Drive" class="nm-card-img" loading="lazy" onError="this.src='images/lovable/rkdf-library.jpg';">
              <span class="nm-card-badge">CAMPUS PLACEMENT</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 22 August 2024 • Corporate Relations</div>
              <h4 class="nm-card-title">Annual Recruitment Drive: Deloitte, Cognizant, HDFC Bank On Campus</h4>
              <p class="nm-card-desc">
                Over 300+ recruiting partners initiate recruitment schedules across Engineering, Pharmacy, Management, and Computer Applications.
              </p>
              <a href="news_detail.php?id=3" class="nm-card-link-txt">Read Recruitment Details →</a>
            </div>
          </article>

          <!-- Card 4 -->
          <article class="nm-grid-card">
            <div class="nm-card-img-wrap">
              <img src="images/lovable/rkdf-architecture.jpg" alt="International Collaboration" class="nm-card-img" loading="lazy">
              <span class="nm-card-badge">GLOBAL TIE-UP</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 18 August 2024 • Academic Exchange</div>
              <h4 class="nm-card-title">International Summer School with Politecnico di Milano Concludes</h4>
              <p class="nm-card-desc">
                Joint architecture studio and sustainable urban design workshop completed with international faculty exchange and research papers.
              </p>
              <a href="news_detail.php?id=4" class="nm-card-link-txt">Read Partnership Report →</a>
            </div>
          </article>

          <!-- Card 5 -->
          <article class="nm-grid-card">
            <div class="nm-card-img-wrap">
              <img src="images/lovable/rkdf-campus-1.jpg" alt="Rang Bharat Cultural Society" class="nm-card-img" loading="lazy">
              <span class="nm-card-badge">CAMPUS CULTURE</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 14 August 2024 • Cultural Wing</div>
              <h4 class="nm-card-title">Independence Day: RKDF Cultural Society Stages "Rang Bharat"</h4>
              <p class="nm-card-desc">
                Spectacular national integration performance, multi-state folk art, and student symphony celebrated before thousands of attendees.
              </p>
              <a href="news_detail.php?id=5" class="nm-card-link-txt">Read Event Coverage →</a>
            </div>
          </article>

          <!-- Card 6 -->
          <article class="nm-grid-card">
            <div class="nm-card-img-wrap">
              <img src="images/lovable/rkdf-why-bg.jpg" alt="University Newsletters" class="nm-card-img" loading="lazy">
              <span class="nm-card-badge">NEWSLETTERS</span>
            </div>
            <div class="nm-card-body">
              <div class="nm-card-date">📅 Bi-Annual Editions • Archive</div>
              <h4 class="nm-card-title">Official University Newsletters — "Education Glorifies Nation"</h4>
              <p class="nm-card-desc">
                Browse official digital PDF editions documenting research milestones, patent publications, faculty achievements, and campus developments.
              </p>
              <a href="News_Letter.php" class="nm-card-link-txt">Browse Newsletter Archive →</a>
            </div>
          </article>

        </div>
      </section>

      <!-- ══ QUICK MEDIA & PUBLIC RESOURCES STRIP ══ -->
      <section class="nm-resources-card">
        <div style="max-width: 600px;">
          <span style="color:#fbbf24;font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;">Media Relations &amp; Archives</span>
          <h3 style="font-size:24px;font-weight:800;margin:6px 0 10px;color:#ffffff;">Quick Access for Press, Students &amp; Public</h3>
          <p style="color:#94a3b8;font-size:14px;line-height:1.6;">
            Access official university publications, high-resolution media galleries, circulars, and departmental resources directly.
          </p>
        </div>

        <div class="nm-resources-grid">
          <a href="News_Letter.php" class="nm-res-box">
            <div class="nm-res-icon">📰</div>
            <div class="nm-res-title">University Newsletters</div>
            <div class="nm-res-desc">Bi-annual PDF releases of university activities and research.</div>
          </a>

          <a href="imggallery.php" class="nm-res-box">
            <div class="nm-res-icon">📸</div>
            <div class="nm-res-title">Photo Gallery</div>
            <div class="nm-res-desc">High-resolution campus albums, labs, convocation and fests.</div>
          </a>

          <a href="Announcements.php" class="nm-res-box">
            <div class="nm-res-icon">📢</div>
            <div class="nm-res-title">Announcements Hub</div>
            <div class="nm-res-desc">Official notifications, exam schedules, and e-tenders.</div>
          </a>

          <a href="contact-us.php" class="nm-res-box">
            <div class="nm-res-icon">📞</div>
            <div class="nm-res-title">Press &amp; Media Desk</div>
            <div class="nm-res-desc">Media queries: info@rkdf.ac.in / 0755-6185300.</div>
          </a>
        </div>
      </section>

    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
