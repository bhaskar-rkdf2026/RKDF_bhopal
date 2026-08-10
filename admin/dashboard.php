<?php
// admin/dashboard.php
$pageTitle = 'Dashboard Overview — RKDF Admin Portal';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/../config/db.php';

$totalSections = 17;
$activeSections = 0;
$totalItems = 0;
$sectionsList = [];

try {
    $pdo = getDbConnection();
    
    // Count active sections
    $stmtSec = $pdo->query("SELECT * FROM homepage_sections ORDER BY sort_order ASC");
    $sectionsList = $stmtSec->fetchAll();
    $totalSections = count($sectionsList);

    foreach ($sectionsList as $sec) {
        if ($sec['is_active']) $activeSections++;
    }

    // Count items
    $stmtItems = $pdo->query("SELECT COUNT(*) FROM homepage_items WHERE is_active = 1");
    $totalItems = $stmtItems->fetchColumn();

} catch (Exception $e) {
    // If DB tables not yet seeded, default values apply
}
?>

<style>
  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
  }

  .stat-card {
    background: #ffffff;
    padding: 24px;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: rgba(217, 35, 45, 0.1);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
  }

  .stat-info h3 {
    font-size: 26px;
    font-weight: 800;
    color: var(--secondary);
    line-height: 1;
  }

  .stat-info p {
    font-size: 13px;
    color: var(--text-muted);
    margin-top: 6px;
    font-weight: 600;
  }

  .section-card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
  }

  .sec-box {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    padding: 20px;
    transition: all 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .sec-box:hover {
    border-color: var(--primary);
    box-shadow: 0 8px 16px rgba(0,0,0,0.04);
    transform: translateY(-2px);
  }

  .sec-box-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
  }

  .sec-num {
    font-size: 12px;
    font-weight: 800;
    color: var(--primary);
    background: rgba(217, 35, 45, 0.1);
    padding: 4px 10px;
    border-radius: 20px;
  }

  .badge-active {
    font-size: 11px;
    font-weight: 700;
    padding: 4px 8px;
    border-radius: 4px;
    background: #dcfce7;
    color: #15803d;
  }

  .badge-inactive {
    font-size: 11px;
    font-weight: 700;
    padding: 4px 8px;
    border-radius: 4px;
    background: #fee2e2;
    color: #b91c1c;
  }

  .sec-box h4 {
    font-size: 16px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 6px;
  }

  .sec-box p {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.4;
    margin-bottom: 16px;
  }

  .sec-box-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
  }

  .btn-manage {
    font-size: 13px;
    font-weight: 700;
    color: var(--primary);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .btn-manage:hover {
    text-decoration: underline;
  }
</style>

<!-- Top Statistics Cards -->
<div class="dashboard-grid">
  <div class="stat-card">
    <div class="stat-icon">
      <i class="fa-solid fa-layer-group"></i>
    </div>
    <div class="stat-info">
      <h3><?= $totalSections ?></h3>
      <p>Homepage Sections</p>
    </div>
  </div>

  <div class="stat-card">
    <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
      <i class="fa-solid fa-circle-check"></i>
    </div>
    <div class="stat-info">
      <h3><?= $activeSections ?></h3>
      <p>Active Sections</p>
    </div>
  </div>

  <div class="stat-card">
    <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
      <i class="fa-solid fa-list-check"></i>
    </div>
    <div class="stat-info">
      <h3><?= $totalItems ?></h3>
      <p>Content Items</p>
    </div>
  </div>

  <a href="manage_settings.php" class="stat-card" style="text-decoration: none;">
    <div class="stat-icon" style="background: rgba(168, 85, 247, 0.1); color: #a855f7;">
      <i class="fa-solid fa-sliders"></i>
    </div>
    <div class="stat-info">
      <h3 style="font-size: 18px;">Global Settings</h3>
      <p>Configure Site-wide ↗</p>
    </div>
  </a>

</div>

<h2 style="font-size: 18px; font-weight: 800; color: var(--secondary); margin-bottom: 20px;">
  Homepage Sections Overview
</h2>

<!-- Sections List -->
<div class="section-card-grid">
  <?php
  // Fallback section list if DB is not populated
  if (empty($sectionsList)) {
      $sectionsList = [
          ['section_key' => 'sec_00_hero',        'tag_number' => '00', 'tag_text' => '🎬 HERO BANNER',                'title_main' => 'Where heritage meets innovation — video background, headline, CTAs', 'is_active' => 1],
          ['section_key' => 'sec_01_numbers',     'tag_number' => '01', 'tag_text' => '📊 INSTITUTE IN NUMBERS',       'title_main' => '6 animated counters: Programs, Students, Faculty, Placement, Labs, Years', 'is_active' => 1],
          ['section_key' => 'sec_02_university',  'tag_number' => '02', 'tag_text' => '🏛️ ABOUT RKDF UNIVERSITY',      'title_main' => 'Sticky split layout: About text + timeline + library image with founder quote', 'is_active' => 1],
          ['section_key' => 'sec_03_gateway',     'tag_number' => '03', 'tag_text' => '🔗 STUDENT GATEWAY',             'title_main' => '9-column icon grid: Admissions, Courses, Fee, Scholarships, Hostel, Results...', 'is_active' => 1],
          ['section_key' => 'sec_04_schools',     'tag_number' => '04', 'tag_text' => '🎓 SCHOOLS & FACULTIES RAIL',    'title_main' => 'Horizontal drag-scroll rail with 6 school cards (4:5 aspect ratio)', 'is_active' => 1],
          ['section_key' => 'sec_05_why',         'tag_number' => '05', 'tag_text' => '⭐ WHY RKDF (GLASS CARDS)',      'title_main' => 'Dark image background + 6 glassmorphism feature cards with hover ring', 'is_active' => 1],
          ['section_key' => 'sec_06_admissions',  'tag_number' => '06', 'tag_text' => '📋 ADMISSIONS STEPS',            'title_main' => '4-step process: Choose Program → Apply → Verify → Enroll', 'is_active' => 1],
          ['section_key' => 'sec_07_programs',    'tag_number' => '07', 'tag_text' => '📚 FEATURED PROGRAMS',           'title_main' => 'Magazine layout: Big B.Tech card + 3 smaller program cards (MBA, M.Pharm, LLB)', 'is_active' => 1],
          ['section_key' => 'sec_08_campus',      'tag_number' => '08', 'tag_text' => '🏟️ CAMPUS LIFE COLLAGE',         'title_main' => '12-col masonry photo grid + 4 campus stats (Sports, Clubs, Hostels, Labs)', 'is_active' => 1],
          ['section_key' => 'sec_09_research',    'tag_number' => '09', 'tag_text' => '🔬 RESEARCH & INNOVATION',       'title_main' => 'Dark charcoal section: 4 gold stat boxes + 3 specialised lab descriptions', 'is_active' => 1],
          ['section_key' => 'sec_10_placements',  'tag_number' => '10', 'tag_text' => '💼 PLACEMENTS + RECRUITERS',     'title_main' => '4 placement stats + infinite marquee scrolling recruiter names', 'is_active' => 1],
          ['section_key' => 'sec_11_voices',      'tag_number' => '11', 'tag_text' => '💬 STUDENT TESTIMONIALS',        'title_main' => '3 staggered testimonial cards with quote, name and role', 'is_active' => 1],
          ['section_key' => 'sec_12_news',        'tag_number' => '12', 'tag_text' => '📰 NEWS & EVENTS',               'title_main' => 'Featured article (7-col) + 4 stacked news items (5-col)', 'is_active' => 1],
          ['section_key' => 'sec_13_gallery',     'tag_number' => '13', 'tag_text' => '🖼️ CAMPUS GALLERY',             'title_main' => '8 masonry gallery photos with hover zoom', 'is_active' => 1],
          ['section_key' => 'sec_14_recognition', 'tag_number' => '14', 'tag_text' => '🏅 ACCREDITATION BADGES',        'title_main' => '6 accreditation badges: NAAC A+, UGC, AICTE, NBA, NIRF, ISO', 'is_active' => 1],
          ['section_key' => 'sec_15_virtual_tour','tag_number' => '15', 'tag_text' => '🎥 VIRTUAL CAMPUS TOUR CTA',     'title_main' => 'Dark video CTA with huge serif headline + two action buttons', 'is_active' => 1],
          ['section_key' => 'sec_16_final_cta',   'tag_number' => '16', 'tag_text' => '🚀 FINAL CALL TO ACTION',        'title_main' => 'Bordered block: Your next chapter starts here + Apply Today button', 'is_active' => 1],
      ];
  }

  foreach ($sectionsList as $sec):
  ?>
    <div class="sec-box">
      <div>
        <div class="sec-box-header">
          <span class="sec-num">§ <?= htmlspecialchars($sec['tag_number'] ?? '') ?></span>
          <span class="<?= ($sec['is_active'] ?? 1) ? 'badge-active' : 'badge-inactive' ?>">
            <?= ($sec['is_active'] ?? 1) ? 'Active' : 'Inactive' ?>
          </span>
        </div>
        <h4><?= htmlspecialchars($sec['tag_text'] ?? '') ?></h4>
        <p><?= htmlspecialchars($sec['title_main'] ?? '') ?></p>
      </div>

      <div class="sec-box-footer">
        <a href="manage_sections.php?sec=<?= urlencode($sec['section_key']) ?>" class="btn-manage">
          Edit Content <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
