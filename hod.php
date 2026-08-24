<?php
// ============================================================
// RKDF University — Institute Heads & HODs Directory (100% Dynamic CMS)
// World-Class Premium Design + All 15 Institute Heads & HODs + Live Admin Sync
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'hod';
$pRow = [];
$allItems = [];

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
        $stmt->execute([$pageSlug]);
        $pRow = $stmt->fetch() ?: [];

        $itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
        $itemStmt->execute([$pageSlug]);
        $allItems = $itemStmt->fetchAll() ?: [];
    } catch (Throwable $e) {}
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : '20 · ACADEMIC LEADERSHIP';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'Institute Heads & HODs Directory';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Directory of Institute Heads and Heads of Department leading constituent engineering, pharmacy, nursing, ayurveda, and Polytechnic colleges across RKDF University Bhopal.';
$heroBg       = !empty($pRow['hero_bg_image']) ? $pRow['hero_bg_image'] : 'images/ai_hod/rkdf_hod_banner.jpg';

// Baseline fallback list if DB items are not yet populated
$defaultHods = [
    [
        'title'      => 'Dr. A. C. Nayak',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Sri Satya Sai College of Engineering (SSSCE)',
        'image_path' => 'images/deanshod/AC Nayak.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Virendra Singh Chaudhary',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'RKDF College of Technology & Research (RKDFCTR)',
        'image_path' => 'images/deanshod/Virendra Choudhary.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Sanjay Jain',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Bhabha College of Engineering (BCE)',
        'image_path' => 'images/deanshod/SanjaySingh.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Sohail Bux',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'Agnos College of Technology',
        'image_path' => 'images/deanshod/Sohail Bux.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Sandeep Sahu',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Vedica College of Pharmacy Polytechnic',
        'image_path' => 'images/deanshod/Sandeep Sahu.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Bharti Sahu',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Department of Pharmacy',
        'image_path' => 'images/deanshod/Aarti Sahu.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Pradeep Adlak',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'Sri Satya Sai Institute of Pharmacy',
        'image_path' => 'images/deanshod/Pradeep Adlak.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Abhishek Dwivedi',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'Dr. Satyendra Kumar Memorial College of Pharmacy',
        'image_path' => 'images/deanshod/Abhishek Dwivedi.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Devendra Bhopte',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'Sri Sathya Sai Institute of Pharmaceutical Sciences',
        'image_path' => 'images/deanshod/Devendra Bhopte.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Virendra Kumar Patel',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'College of Pharmacy',
        'image_path' => 'images/deanshod/Virendra Patil.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Neha Jain',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'School of Pharmacy',
        'image_path' => 'images/deanshod/Neha Jain.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Amitesh Kumar Paul',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Institute of Polytechnic Engineering',
        'image_path' => 'images/deanshod/Ametesh Paul.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Vandana Raghuvanshi',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'University College of Nursing',
        'image_path' => 'images/deanshod/Vandana Raghuvanshi.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Anil Kunjilal Baghel',
        'badge_text' => 'Institute Head',
        'subtitle'   => 'Ram Krishna College of Ayurveda & Medical Sciences BAMS',
        'image_path' => 'images/deanshod/Anil Kunjilal Baghel.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ],
    [
        'title'      => 'Dr. Minni Walia',
        'badge_text' => 'Head of Department (HOD)',
        'subtitle'   => 'Library and Information Science',
        'image_path' => 'images/deanshod/Minni Walia.jfif',
        'text_val'   => 'RKDF University Bhopal MP'
    ]
];

$displayHods = !empty($allItems) ? $allItems : $defaultHods;
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
                  url('<?= htmlspecialchars($heroBg) ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .hod-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .hod-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .hod-grid-layout { grid-template-columns: 1fr; }
    }

    .hod-list-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 28px;
    }

    .hod-member-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 32px 24px 28px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .hod-member-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 42px rgba(12, 20, 36, 0.1);
      border-color: #C5A059;
    }

    .hod-avatar-box {
      width: 140px;
      height: 150px;
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 8px 24px rgba(12, 20, 36, 0.12);
      border: 3px solid #FAF9F5;
      background: #0C1424;
    }
    .hod-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .hod-member-card:hover .hod-img {
      transform: scale(1.08);
    }

    .hod-name {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 21px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 4px;
    }

    .hod-desig-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      margin-bottom: 12px;
      max-width: 100%;
      word-break: break-word;
    }

    .hod-faculty-title {
      font-size: 14.5px;
      line-height: 1.55;
      color: #475569;
      font-weight: 600;
    }

    .hod-univ-tag {
      font-size: 12.5px;
      color: #94A3B8;
      margin-top: 4px;
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
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="hod-main-section">
    <div class="rk-container">
      <div class="hod-grid-layout">
        
        <!-- LEFT COLUMN: HODs LIST GRID -->
        <div>

          <div style="margin-bottom:36px;">
            <span class="rk-eyebrow tone-gold">Academic Leadership</span>
            <h2 class="rk-h2" style="font-size:32px;margin-top:8px;">Institute Heads &amp; Department Heads</h2>
            <p style="color:#475569;font-size:16px;margin-top:10px;">
              Eminent academic leaders heading constituent colleges, polytechnics, and specialized departments at RKDF University Bhopal MP:
            </p>

            <!-- Instant Search Bar -->
            <div style="margin-top:20px;background:#ffffff;border:1px solid rgba(12,20,36,0.08);border-radius:14px;padding:16px 20px;box-shadow:0 4px 16px rgba(12,20,36,0.04);">
              <input type="text" id="hodLiveSearch" placeholder="🔍 Search Institute Heads, HODs, or Colleges (e.g. Engineering, Pharmacy, Ayurveda)..." style="width:100%;padding:12px 16px;border-radius:8px;border:1px solid rgba(12,20,36,0.15);font-size:14px;outline:none;">
            </div>
          </div>

          <div class="hod-list-grid" id="hodGrid">

            <?php foreach ($displayHods as $h): ?>
            <article class="hod-member-card">
              <div class="hod-avatar-box">
                <img src="<?= htmlspecialchars(!empty($h['image_path']) ? $h['image_path'] : 'images/lovable/rkdf-logo.png') ?>" alt="<?= htmlspecialchars($h['title']) ?>" class="hod-img" onerror="this.src='images/lovable/rkdf-logo.png';">
              </div>
              <h3 class="hod-name"><?= htmlspecialchars($h['title']) ?></h3>
              <div><span class="hod-desig-badge"><?= htmlspecialchars($h['badge_text'] ?: 'HEAD OF DEPARTMENT') ?></span></div>
              <div class="hod-faculty-title"><?= htmlspecialchars($h['subtitle']) ?></div>
              <div class="hod-univ-tag"><?= htmlspecialchars(!empty($h['text_val']) ? $h['text_val'] : 'RKDF University Bhopal MP') ?></div>
            </article>
            <?php endforeach; ?>

          </div>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Academic Governance</h3>
            <ul class="sidebar-nav-list">
              <li><a href="Chancellor.php" class="sidebar-link">Chancellor's Desk <span>→</span></a></li>
              <li><a href="Vice-Chancellor-Desk.php" class="sidebar-link">Vice Chancellor's Desk <span>→</span></a></li>
              <li><a href="Registrar.php" class="sidebar-link">Registrar Profile <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link active">Heads of Department (HOD) <span>→</span></a></li>
              <li><a href="Statuary-Bodies.php" class="sidebar-link">Statutory Bodies <span>→</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('hodLiveSearch');
    var cards = document.querySelectorAll('.hod-member-card');
    if (!searchInput) return;

    searchInput.addEventListener('input', function() {
      var q = this.value.toLowerCase().trim();
      cards.forEach(function(card) {
        var text = card.textContent.toLowerCase();
        if (!q || text.indexOf(q) !== -1) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
  </script>

</body>
</html>
