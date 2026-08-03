<?php
// admin/dashboard.php
$pageTitle = 'Dashboard Overview — RKDF CMS';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/../config/db.php';

$totalSections = 14;
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
          ['section_key' => 'sec_01_numbers', 'tag_number' => '01', 'tag_text' => 'INSTITUTE IN NUMBERS', 'title_main' => 'Numbers that reflect our impact', 'is_active' => 1],
          ['section_key' => 'sec_02_university', 'tag_number' => '02', 'tag_text' => 'ABOUT RKDF UNIVERSITY', 'title_main' => 'Empowering minds, shaping tomorrow', 'is_active' => 1],
          ['section_key' => 'sec_03_gateway', 'tag_number' => '03', 'tag_text' => 'STUDENT GATEWAY', 'title_main' => 'Quick Access Portals', 'is_active' => 1],
          ['section_key' => 'sec_04_schools', 'tag_number' => '04', 'tag_text' => 'FACULTIES & COLLEGES', 'title_main' => 'Schools & Faculties', 'is_active' => 1],
          ['section_key' => 'sec_05_admissions', 'tag_number' => '05', 'tag_text' => 'ADMISSIONS 2026-27', 'title_main' => 'Start your journey', 'is_active' => 1],
          ['section_key' => 'sec_06_programs', 'tag_number' => '06', 'tag_text' => 'FLAGSHIP PROGRAMS', 'title_main' => 'Featured Degrees', 'is_active' => 1],
          ['section_key' => 'sec_07_campus', 'tag_number' => '07', 'tag_text' => 'CAMPUS LIFE', 'title_main' => 'Vibrant environment', 'is_active' => 1],
          ['section_key' => 'sec_08_research', 'tag_number' => '08', 'tag_text' => 'RESEARCH & INNOVATION', 'title_main' => 'Patents & Innovation', 'is_active' => 1],
          ['section_key' => 'sec_09_placements', 'tag_number' => '09', 'tag_text' => 'PLACEMENT HIGHLIGHTS', 'title_main' => 'Placements & MNCs', 'is_active' => 1],
          ['section_key' => 'sec_10_voices', 'tag_number' => '10', 'tag_text' => 'STUDENT TESTIMONIALS', 'title_main' => 'Voices & Stories', 'is_active' => 1],
          ['section_key' => 'sec_11_news', 'tag_number' => '11', 'tag_text' => 'NEWS & ANNOUNCEMENTS', 'title_main' => 'Latest Updates', 'is_active' => 1],
          ['section_key' => 'sec_12_experience', 'tag_number' => '12', 'tag_text' => 'CAMPUS EXPERIENCE', 'title_main' => 'Facilities & Ecosystem', 'is_active' => 1],
          ['section_key' => 'sec_13_recognition', 'tag_number' => '13', 'tag_text' => 'RECOGNITIONS', 'title_main' => 'UGC & AICTE Approvals', 'is_active' => 1],
          ['section_key' => 'sec_14_career', 'tag_number' => '14', 'tag_text' => 'GLOBAL ALUMNI', 'title_main' => 'Recruiters & Destinations', 'is_active' => 1]
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
