<?php
// ============================================================
// RKDF University — University Staff Directory (100% Dynamic CMS)
// World-Class Premium Design + High-Res Media Assets + 100% Dynamic DB Logic
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

if (!defined('ITEMS_PER_PAGE')) {
    define('ITEMS_PER_PAGE', 10);
}

$pdo = getDbConnection();
$pageSlug = 'staff';
$pRow = [];
$allItems = [];

$selectedDepartment = isset($_GET['department_id']) ? trim($_GET['department_id']) : (isset($_GET['dept']) ? trim($_GET['dept']) : '');
$currentPage        = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
if ($currentPage === false || $currentPage === null || $currentPage <= 0) {
    $currentPage = 1;
}

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? AND is_active = 1");
        $stmt->execute([$pageSlug]);
        $pRow = $stmt->fetch() ?: [];

        $itemStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
        $itemStmt->execute([$pageSlug]);
        $allItems = $itemStmt->fetchAll() ?: [];
    } catch (Throwable $e) {
        $pRow = [];
        $allItems = [];
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'FACULTY & ACADEMIC DIRECTORY';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'University Teaching Staff Directory';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'Comprehensive directory of professors, associate professors, and department teaching staff across RKDF University Bhopal.';

// Extract unique departments for dropdown filter
$departmentsMap = [];
foreach ($allItems as $it) {
    $deptGroup = !empty($it['group_key']) ? trim($it['group_key']) : 'General Faculty';
    if (!isset($departmentsMap[$deptGroup])) {
        $departmentsMap[$deptGroup] = $deptGroup;
    }
}
ksort($departmentsMap);

// Filter staff Data by selected department if provided
$filteredStaff = [];
if (!empty($selectedDepartment) && strtolower($selectedDepartment) !== 'all') {
    foreach ($allItems as $it) {
        if (strcasecmp($it['group_key'], $selectedDepartment) === 0 || strcasecmp($it['subtitle'], $selectedDepartment) === 0) {
            $filteredStaff[] = $it;
        }
    }
} else {
    $filteredStaff = $allItems;
}

// Calculate Pagination
$totalStaff  = count($filteredStaff);
$totalPages  = ceil($totalStaff / ITEMS_PER_PAGE);
if ($currentPage > $totalPages && $totalPages > 0) {
    $currentPage = $totalPages;
}
$offset     = ($currentPage - 1) * ITEMS_PER_PAGE;
$pageStaff  = array_slice($filteredStaff, $offset, ITEMS_PER_PAGE);

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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-students-quad.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .stf-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .stf-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .stf-grid-layout { grid-template-columns: 1fr; }
    }

    .stf-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .stf-block-card:hover {
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .stf-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .stf-badge {
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

    .stf-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .stf-card-body {
      padding: 32px 36px;
    }

    /* Filter Bar */
    .filter-bar {
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
      .filter-bar { flex-direction: column; align-items: stretch; }
    }

    .filter-select {
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
    .filter-btn {
      padding: 12px 26px;
      background: #0C1424;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.25s ease;
    }
    .filter-btn:hover {
      background: #E31B23;
    }

    /* Staff Table */
    .stf-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      margin-bottom: 24px;
    }
    .stf-table th {
      background: #FAF9F5;
      color: #0C1424;
      padding: 14px 18px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      text-align: left;
      border-bottom: 2px solid rgba(12, 20, 36, 0.08);
    }
    .stf-table td {
      padding: 16px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14.5px;
      color: #334155;
      vertical-align: middle;
    }
    .stf-table tr:hover td {
      background: rgba(227, 27, 35, 0.02);
    }

    .staff-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #C5A059;
      box-shadow: 0 2px 8px rgba(12,20,36,0.1);
    }

    /* Pagination */
    .pagination-box {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 18px;
      margin-top: 28px;
    }
    .pg-btn {
      padding: 10px 22px;
      border-radius: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .pg-btn.active-btn {
      background: #0C1424;
      color: #ffffff;
    }
    .pg-btn.active-btn:hover {
      background: #E31B23;
    }
    .pg-btn.disabled-btn {
      background: #E2E8F0;
      color: #94A3B8;
      cursor: not-allowed;
      pointer-events: none;
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
  <main class="stf-main-section">
    <div class="rk-container">
      <div class="stf-grid-layout">
        
        <!-- LEFT COLUMN: DEPARTMENT FILTER & STAFF TABLE -->
        <div>

          <article class="stf-block-card">
            <div class="stf-card-header">
              <h2 class="stf-card-title">Teaching Staff Directory</h2>
              <span class="stf-badge">FACULTY &amp; ACADEMICS</span>
            </div>
            <div class="stf-card-body">

              <!-- DEPARTMENT SELECTOR FORM -->
              <form action="staffLnew.php" method="GET" class="filter-bar">
                <label for="departmentSelect" style="font-weight:700;color:#0C1424;white-space:nowrap;">Faculty / Department:</label>
                <select id="departmentSelect" name="department_id" class="filter-select">
                  <option value="all">-- All University Faculties --</option>
                  <?php foreach ($departmentsMap as $dKey => $dVal): ?>
                    <option value="<?php echo htmlspecialchars($dKey); ?>" <?php echo (strcasecmp($selectedDepartment, $dKey) === 0) ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($dVal); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="filter-btn">Filter Staff</button>
              </form>

              <!-- STAFF TABLE -->
              <div style="overflow-x:auto;">
                <table class="stf-table">
                  <thead>
                    <tr>
                      <th style="width:60px;">S.No.</th>
                      <th style="width:70px;">Photo</th>
                      <th>Faculty Member Name</th>
                      <th>Designation &amp; Role</th>
                      <th>Faculty Department &amp; Specialization</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($pageStaff)): ?>
                      <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:#64748B;font-weight:600;">
                          No teaching staff members found for the selected department.
                        </td>
                      </tr>
                    <?php else: ?>
                      <?php foreach ($pageStaff as $index => $member): ?>
                        <tr>
                          <td style="font-family:'JetBrains Mono',monospace;font-weight:700;color:#C5A059;">
                            <?php echo sprintf('%02d', $offset + $index + 1); ?>
                          </td>
                          <td>
                            <?php 
                              $photo = !empty($member['image_path']) ? htmlspecialchars($member['image_path']) : 'images/lovable/rkdf-student-2.jpg';
                            ?>
                            <img src="<?php echo $photo; ?>" alt="Photo of <?php echo htmlspecialchars($member['title']); ?>" class="staff-avatar" onerror="this.onerror=null;this.src='images/lovable/rkdf-student-2.jpg';">
                          </td>
                          <td>
                            <strong style="font-family:'Playfair Display',Georgia,serif;font-size:16.5px;color:#0C1424;"><?php echo htmlspecialchars($member['title']); ?></strong>
                            <?php if (!empty($member['badge_text'])): ?>
                              <div style="font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;color:#C5A059;text-transform:uppercase;margin-top:2px;">
                                <?php echo htmlspecialchars($member['badge_text']); ?>
                              </div>
                            <?php endif; ?>
                          </td>
                          <td style="color:#334155;font-weight:600;">
                            <?php echo htmlspecialchars($member['subtitle']); ?>
                          </td>
                          <td>
                            <span style="font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:700;color:#E31B23;background:rgba(227,27,35,0.08);padding:3px 8px;border-radius:6px;display:inline-block;margin-bottom:4px;">
                              <?php echo htmlspecialchars($member['group_key']); ?>
                            </span>
                            <div style="font-size:13.5px;color:#64748B;line-height:1.4;"><?php echo htmlspecialchars($member['text_val']); ?></div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- PAGINATION -->
              <?php if ($totalPages > 1): ?>
                <div class="pagination-box">
                  <?php if ($currentPage > 1): ?>
                    <a href="staffLnew.php?department_id=<?php echo urlencode($selectedDepartment); ?>&amp;page=<?php echo ($currentPage - 1); ?>" class="pg-btn active-btn">← Previous</a>
                  <?php else: ?>
                    <span class="pg-btn disabled-btn">← Previous</span>
                  <?php endif; ?>

                  <span style="font-family:'JetBrains Mono',monospace;font-size:13.5px;font-weight:600;color:#0C1424;">
                    Page <?php echo htmlspecialchars($currentPage); ?> of <?php echo htmlspecialchars($totalPages); ?>
                  </span>

                  <?php if ($currentPage < $totalPages): ?>
                    <a href="staffLnew.php?department_id=<?php echo urlencode($selectedDepartment); ?>&amp;page=<?php echo ($currentPage + 1); ?>" class="pg-btn active-btn">Next →</a>
                  <?php else: ?>
                    <span class="pg-btn disabled-btn">Next →</span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">Faculty &amp; Staff Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="staffLnew.php" class="sidebar-link active"><span>Staff Directory</span> <span>↗</span></a></li>
              <li><a href="dean.php" class="sidebar-link"><span>Faculty Deans</span> <span>↗</span></a></li>
              <li><a href="hod.php" class="sidebar-link"><span>Heads of Department (HOD)</span> <span>↗</span></a></li>
              <li><a href="other-officers.php" class="sidebar-link"><span>Other Officers</span> <span>↗</span></a></li>
              <li><a href="Syllabus.php" class="sidebar-link"><span>Course Syllabus</span> <span>↗</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link"><span>Vision &amp; Mission</span> <span>↗</span></a></li>
              <li><a href="Feedback_Analysis.php" class="sidebar-link"><span>Feedback &amp; Analysis</span> <span>↗</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <script>
    document.getElementById('departmentSelect').addEventListener('change', function() {
      this.form.submit();
    });
  </script>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
