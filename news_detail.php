<?php
// ============================================================
// RKDF University — News & Announcement Detail Page
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$newsId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$article = null;

try {
    $pdo = getDbConnection();
    if ($pdo && $newsId > 0) {
        $stmt = $pdo->prepare("SELECT * FROM homepage_items WHERE id = ? AND section_key IN ('sec_11_news', 'sec_12_news') LIMIT 1");
        $stmt->execute([$newsId]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (Throwable $e) { /* fallback */ }

// Baseline fallback articles if not found by ID
if (!$article) {
    $fallbackArticles = [
        1 => [
            'title' => '14th Annual Convocation Honours 4,200 Graduates Across 11 Schools',
            'subtitle' => 'Chancellor Shri Sunil Kapoor conferred degrees on the largest graduating cohort in RKDF University history.',
            'text_val' => 'RKDF University celebrated its 14th Annual Convocation Ceremony with high dignity and academic splendour at the University Auditorium. Degrees, gold medals, and doctoral diplomas were conferred upon over 4,200 graduating students across undergraduate, postgraduate, and Ph.D. programs from 11 constituent schools. Chief Guest and eminent scholars praised RKDF\'s continuous thrust towards research, innovation, and industry alignment.',
            'badge_text' => 'FEATURED · CONVOCATION',
            'number_val' => '28 August 2024',
            'image_path' => 'images/lovable/rkdf-campus-aerial.jpg'
        ],
        2 => [
            'title' => 'Department of Physics Wins Prestigious DST Grant for Quantum Sensing Research',
            'subtitle' => 'Research grant awarded by Department of Science & Technology, Govt. of India for advanced materials research.',
            'text_val' => 'The Department of Physics at RKDF University has been awarded a competitive research project grant by the Department of Science and Technology (DST). The research project focuses on solid-state quantum sensing materials and high-precision magnetometer applications. Head of Department commended the doctoral scholars working in the Nanotechnology & Quantum Systems Laboratory.',
            'badge_text' => 'RESEARCH',
            'number_val' => '26 August 2024',
            'image_path' => 'images/lovable/rkdf-engineering.jpg'
        ],
        3 => [
            'title' => 'Annual Campus Recruitment Drive 2024–25 Commences Next Week',
            'subtitle' => 'Deloitte, Cognizant, HDFC Bank, and Wipro visiting campus for multi-stream placement interviews.',
            'text_val' => 'The Training & Placement Cell at RKDF University announced the opening of the 2024–25 Campus Recruitment Drive. Leading national and international corporations including Deloitte, Cognizant, HDFC Bank, and Wipro will conduct on-campus interviews for final year engineering, management, pharmacy, and computer application graduates.',
            'badge_text' => 'PLACEMENTS',
            'number_val' => '22 August 2024',
            'image_path' => 'images/11/TNP_Placed Stud.jpg'
        ],
        4 => [
            'title' => 'International Summer School with Politecnico di Milano Concludes Successfully',
            'subtitle' => 'Collaborative multi-week workshop on sustainable urban design and smart infrastructure.',
            'text_val' => 'RKDF University School of Architecture and Civil Engineering completed a multi-week international summer program in partnership with Politecnico di Milano, Italy. Participating scholars engaged in joint design studios, solar architecture modeling, and urban resilience studies.',
            'badge_text' => 'GLOBAL',
            'number_val' => '18 August 2024',
            'image_path' => 'images/lovable/rkdf-architecture.jpg'
        ],
        5 => [
            'title' => 'Independence Day Celebrations: Cultural Society Stages "Rang Bharat"',
            'subtitle' => 'Patriotic tribute, musical performances, and student art display mark 78th Independence Day.',
            'text_val' => 'The RKDF Student Cultural Society organized a grand cultural evening "Rang Bharat" on the occasion of Independence Day. Students showcased patriotic plays, classical dance, and musical tributes celebrating national heritage and unity.',
            'badge_text' => 'CULTURE',
            'number_val' => '14 August 2024',
            'image_path' => 'images/lovable/rkdf-campus-1.jpg'
        ]
    ];

    $articleKey = ($newsId > 0 && isset($fallbackArticles[$newsId])) ? $newsId : 1;
    $article = $fallbackArticles[$articleKey];
}

$pageTitle = htmlspecialchars($article['title']) . ' — RKDF University';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="css/rkdf-navbar.css?v=<?= time(); ?>">
  <link rel="icon" type="image/jpg" href="images/rkdflogo.jpg">
  <style>
    .news-detail-page {
      padding: 140px 0 80px;
      background: #faf9f6;
      min-height: 80vh;
    }
    .news-detail-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.04);
      max-width: 900px;
      margin: 0 auto;
    }
    .news-hero-img {
      width: 100%;
      height: 380px;
      object-fit: cover;
    }
    .news-body-content {
      padding: 40px;
    }
    .news-meta-badge {
      display: inline-block;
      padding: 4px 12px;
      background: #fef2f2;
      color: #d9232d;
      font-size: 12px;
      font-weight: 700;
      border-radius: 99px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      margin-bottom: 16px;
    }
    .news-meta-date {
      color: #64748b;
      font-size: 13px;
      font-weight: 500;
      margin-left: 12px;
    }
    .news-detail-title {
      font-size: 28px;
      font-weight: 800;
      color: #0f172a;
      line-height: 1.3;
      margin-bottom: 16px;
    }
    .news-detail-sub {
      font-size: 17px;
      font-weight: 600;
      color: #475569;
      line-height: 1.5;
      margin-bottom: 24px;
      padding-bottom: 24px;
      border-bottom: 1px solid #f1f5f9;
    }
    .news-detail-text {
      font-size: 16px;
      line-height: 1.8;
      color: #334155;
    }
    .news-back-bar {
      margin-top: 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .btn-back-home {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      background: #0f172a;
      color: #ffffff;
      border-radius: 8px;
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-back-home:hover {
      background: #d9232d;
    }
  </style>
</head>
<body>

  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <main class="news-detail-page">
    <div class="rk-container">
      <article class="news-detail-card">
        <?php if (!empty($article['image_path'])): 
          $imgSrc = (strpos($article['image_path'], '/') !== false) ? $article['image_path'] : 'images/lovable/' . $article['image_path'];
        ?>
        <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="news-hero-img">
        <?php endif; ?>

        <div class="news-body-content">
          <div>
            <span class="news-meta-badge"><?= htmlspecialchars($article['badge_text'] ?: 'NEWS') ?></span>
            <span class="news-meta-date">📅 <?= htmlspecialchars($article['number_val'] ?: '2026') ?></span>
          </div>

          <h1 class="news-detail-title"><?= htmlspecialchars($article['title']) ?></h1>

          <?php if (!empty($article['subtitle'])): ?>
          <p class="news-detail-sub"><?= htmlspecialchars($article['subtitle']) ?></p>
          <?php endif; ?>

          <div class="news-detail-text">
            <p><?= nl2br(htmlspecialchars($article['text_val'] ?: ($article['subtitle'] ?? ''))) ?></p>
          </div>

          <div class="news-back-bar">
            <a href="index.php#news" class="btn-back-home">← Back to All News & Events</a>
            <a href="Announcements.php" style="color: #64748b; font-size: 14px; text-decoration: underline;">View All Announcements & Circulars</a>
          </div>
        </div>
      </article>
    </div>
  </main>

  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
