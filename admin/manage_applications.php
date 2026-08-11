<?php
// ============================================================
// RKDF University — Admin Panel: Online Admission Applications Manager
// View, Search, Filter & Export Submitted Student Admission Applications
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Ensure user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../config/db.php';

// Handle Export CSV FIRST BEFORE ANY HTML / HEADER OUTPUT
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    $search = trim($_GET['search'] ?? '');
    $course = trim($_GET['course'] ?? '');

    try {
        $pdo = getDbConnection();
        $where = ["1=1"];
        $params = [];

        if (!empty($search)) {
            $where[] = "(reg_id LIKE ? OR student_name LIKE ? OR father_name LIKE ? OR mobile_no LIKE ? OR email_id LIKE ?)";
            $term = "%{$search}%";
            $params = [$term, $term, $term, $term, $term];
        }

        if (!empty($course)) {
            $where[] = "course = ?";
            $params[] = $course;
        }

        $sql = "SELECT * FROM online_applications WHERE " . implode(" AND ", $where) . " ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $exportData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $exportData = [];
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=RKDF_Admission_Applications_' . date('Y-m-d_H-i') . '.csv');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    // Output BOM for Excel UTF-8 support
    fputs($output, "\xEF\xBB\xBF");
    
    // Header Row with All Columns
    fputcsv($output, [
        'S.No',
        'Database ID',
        'Registration ID',
        'Student Full Name',
        'Father Name',
        'Aadhaar Number',
        'Mobile Number',
        'Email Address',
        'Course / Discipline',
        'Branch / Specialization',
        'Gender',
        'Category (SC/ST/OBC/GEN)',
        'Domicile',
        '10th Qualification',
        '12th Qualification',
        'Diploma Qualification',
        'Graduation Qualification',
        'Post Graduation Qualification',
        'Residential Address',
        'Reference / Counselor',
        'Submitted Date & Time'
    ]);

    foreach ($exportData as $idx => $row) {
        fputcsv($output, [
            $idx + 1,
            $row['id'] ?? '',
            $row['reg_id'] ?? '',
            $row['student_name'] ?? '',
            $row['father_name'] ?? '',
            $row['aadhaar_no'] ?? '',
            $row['mobile_no'] ?? '',
            $row['email_id'] ?? '',
            $row['course'] ?? '',
            $row['branch'] ?? '',
            $row['gender'] ?? '',
            $row['category'] ?? '',
            $row['domicile'] ?? '',
            $row['qual_10th'] ?? 'N/A',
            $row['qual_12th'] ?? 'N/A',
            $row['qual_diploma'] ?? 'N/A',
            $row['qual_grad'] ?? 'N/A',
            $row['qual_pg'] ?? 'N/A',
            $row['address'] ?? '',
            $row['reference_by'] ?? '',
            $row['created_at'] ?? ''
        ]);
    }

    fclose($output);
    exit();
}

$pageTitle = 'Online Admission Applications — RKDF Admin Portal';
require_once __DIR__ . '/header.php';

$search   = trim($_GET['search'] ?? '');
$course   = trim($_GET['course'] ?? '');
$dateFrom = trim($_GET['date_from'] ?? '');

$applications = [];
$totalApps = 0;
$todayApps = 0;
$uniqueCourses = [];

try {
    $pdo = getDbConnection();

    // Ensure table exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS `online_applications` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `reg_id` VARCHAR(50) NOT NULL,
        `student_name` VARCHAR(100) NOT NULL,
        `father_name` VARCHAR(100) NOT NULL,
        `aadhaar_no` VARCHAR(20) NOT NULL,
        `mobile_no` VARCHAR(20) NOT NULL,
        `email_id` VARCHAR(100) NOT NULL,
        `course` VARCHAR(100) NOT NULL,
        `branch` VARCHAR(150) NOT NULL,
        `gender` VARCHAR(20) NOT NULL,
        `category` VARCHAR(20) NOT NULL,
        `domicile` VARCHAR(20) NOT NULL,
        `address` TEXT NOT NULL,
        `reference_by` VARCHAR(100) DEFAULT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Fetch Stats
    $stmtCount = $pdo->query("SELECT COUNT(*) FROM online_applications");
    $totalApps = $stmtCount->fetchColumn();

    $stmtToday = $pdo->query("SELECT COUNT(*) FROM online_applications WHERE DATE(created_at) = CURDATE()");
    $todayApps = $stmtToday->fetchColumn();

    $stmtCourse = $pdo->query("SELECT DISTINCT course FROM online_applications WHERE course != '' ORDER BY course ASC");
    $uniqueCourses = $stmtCourse->fetchAll(PDO::FETCH_COLUMN);

    // Build Search Query
    $where = ["1=1"];
    $params = [];

    if (!empty($search)) {
        $where[] = "(reg_id LIKE ? OR student_name LIKE ? OR father_name LIKE ? OR mobile_no LIKE ? OR email_id LIKE ?)";
        $term = "%{$search}%";
        $params[] = $term;
        $params[] = $term;
        $params[] = $term;
        $params[] = $term;
        $params[] = $term;
    }

    if (!empty($course)) {
        $where[] = "course = ?";
        $params[] = $course;
    }

    if (!empty($dateFrom)) {
        $where[] = "DATE(created_at) >= ?";
        $params[] = $dateFrom;
    }

    $sql = "SELECT * FROM online_applications WHERE " . implode(" AND ", $where) . " ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $applications = $stmt->fetchAll();

} catch (Exception $e) {
    $errorMsg = $e->getMessage();
}
?>

<style>
  .adm-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 28px;
  }

  .adm-stat-card {
    background: #ffffff;
    padding: 22px 24px;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    display: flex;
    align-items: center;
    gap: 18px;
  }

  .adm-stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(217, 35, 45, 0.1);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .adm-filter-bar {
    background: #ffffff;
    padding: 20px 24px;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    margin-bottom: 28px;
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
  }

  .adm-filter-form {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    align-items: center;
    flex: 1;
  }

  .adm-input {
    padding: 10px 14px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    background: var(--bg-light);
  }

  .adm-input:focus {
    border-color: var(--primary);
    background: #ffffff;
  }

  .btn-primary-sm {
    background: var(--primary);
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 13.5px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .btn-primary-sm:hover {
    background: var(--primary-dark);
  }

  .btn-export {
    background: #16a34a;
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 13.5px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .btn-export:hover {
    background: #15803d;
  }

  .adm-table-card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    overflow: hidden;
  }

  .adm-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }

  .adm-table th {
    background: #f1f5f9;
    color: #334155;
    padding: 14px 18px;
    text-align: left;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.04em;
    border-bottom: 1px solid var(--border-color);
  }

  .adm-table td {
    padding: 14px 18px;
    border-bottom: 1px solid var(--border-color);
    color: #1e293b;
    vertical-align: middle;
  }

  .adm-table tr:hover td {
    background: #f8fafc;
  }

  .reg-badge {
    font-family: monospace;
    font-weight: 700;
    color: var(--primary);
    background: rgba(217, 35, 45, 0.08);
    padding: 4px 10px;
    border-radius: 6px;
  }
</style>

<div style="padding: 30px 40px;">

  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
    <div>
      <h1 style="font-size:24px;font-weight:800;color:var(--secondary);">Online Admission Applications</h1>
      <p style="font-size:14px;color:var(--text-muted);margin-top:4px;">View and manage all student admission applications submitted online.</p>
    </div>
    <a href="?export=csv<?= !empty($search) ? '&search='.urlencode($search) : '' ?><?= !empty($course) ? '&course='.urlencode($course) : '' ?>" class="btn-export">
      <i class="fa-solid fa-file-excel"></i> Export Applications (CSV)
    </a>
  </div>

  <!-- Stats Grid -->
  <div class="adm-stats-grid">
    <div class="adm-stat-card">
      <div class="adm-stat-icon"><i class="fa-solid fa-users"></i></div>
      <div>
        <div style="font-size:24px;font-weight:800;color:var(--secondary);"><?= number_format($totalApps) ?></div>
        <div style="font-size:13px;color:var(--text-muted);font-weight:600;">Total Submissions</div>
      </div>
    </div>

    <div class="adm-stat-card">
      <div class="adm-stat-icon" style="background:rgba(34,197,94,0.1);color:#22c55e;"><i class="fa-solid fa-calendar-day"></i></div>
      <div>
        <div style="font-size:24px;font-weight:800;color:var(--secondary);"><?= number_format($todayApps) ?></div>
        <div style="font-size:13px;color:var(--text-muted);font-weight:600;">Submissions Today</div>
      </div>
    </div>

    <div class="adm-stat-card">
      <div class="adm-stat-icon" style="background:rgba(59,130,246,0.1);color:#3b82f6;"><i class="fa-solid fa-graduation-cap"></i></div>
      <div>
        <div style="font-size:24px;font-weight:800;color:var(--secondary);"><?= count($uniqueCourses) ?></div>
        <div style="font-size:13px;color:var(--text-muted);font-weight:600;">Active Disciplines</div>
      </div>
    </div>
  </div>

  <!-- Search & Filter Bar -->
  <div class="adm-filter-bar">
    <form method="get" class="adm-filter-form">
      <input type="text" name="search" class="adm-input" placeholder="Search Name, Reg ID, Mobile, Email..." value="<?= htmlspecialchars($search) ?>" style="min-width:260px;" />
      
      <select name="course" class="adm-input">
        <option value="">All Courses / Disciplines</option>
        <?php foreach ($uniqueCourses as $c): ?>
          <option value="<?= htmlspecialchars($c) ?>" <?= $course === $c ? 'selected' : '' ?>><?= htmlspecialchars($c) ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit" class="btn-primary-sm">
        <i class="fa-solid fa-magnifying-glass"></i> Filter
      </button>

      <?php if (!empty($search) || !empty($course)): ?>
        <a href="manage_applications.php" class="adm-input" style="text-decoration:none;color:#64748b;font-weight:600;">Reset</a>
      <?php endif; ?>
    </form>
  </div>

  <!-- Applications Table -->
  <div class="adm-table-card">
    <div style="overflow-x:auto;">
      <table class="adm-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Reg ID</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Mobile &amp; Email</th>
            <th>Course &amp; Branch</th>
            <th>Qualifications (10th / 12th / Grad)</th>
            <th>Category / Dom</th>
            <th>Submitted On</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($applications)): ?>
            <tr>
              <td colspan="9" style="text-align:center;padding:40px;color:#94a3b8;">
                <i class="fa-solid fa-folder-open" style="font-size:32px;margin-bottom:10px;display:block;"></i>
                No admission applications found.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($applications as $idx => $app): ?>
              <tr>
                <td><?= $idx + 1 ?></td>
                <td><span class="reg-badge"><?= htmlspecialchars($app['reg_id']) ?></span></td>
                <td>
                  <strong style="color:#0f172a;"><?= htmlspecialchars($app['student_name']) ?></strong>
                  <?php if (!empty($app['aadhaar_no'])): ?>
                    <div style="font-size:12px;color:#64748b;">Aadhaar: <?= htmlspecialchars($app['aadhaar_no']) ?></div>
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($app['father_name']) ?></td>
                <td>
                  <div><i class="fa-solid fa-phone" style="font-size:11px;color:var(--primary);"></i> <?= htmlspecialchars($app['mobile_no']) ?></div>
                  <div style="font-size:12px;color:#64748b;"><i class="fa-solid fa-envelope" style="font-size:11px;"></i> <?= htmlspecialchars($app['email_id']) ?></div>
                </td>
                <td>
                  <strong style="color:var(--secondary);"><?= htmlspecialchars($app['course']) ?></strong>
                  <?php if (!empty($app['branch'])): ?>
                    <div style="font-size:12px;color:#64748b;"><?= htmlspecialchars($app['branch']) ?></div>
                  <?php endif; ?>
                </td>
                <td style="font-size:12.5px;max-width:240px;">
                  <?php if (!empty($app['qual_10th']) && $app['qual_10th'] !== 'N/A'): ?>
                    <div><strong>10th:</strong> <?= htmlspecialchars($app['qual_10th']) ?></div>
                  <?php endif; ?>
                  <?php if (!empty($app['qual_12th']) && $app['qual_12th'] !== 'N/A'): ?>
                    <div><strong>12th:</strong> <?= htmlspecialchars($app['qual_12th']) ?></div>
                  <?php endif; ?>
                  <?php if (!empty($app['qual_diploma']) && $app['qual_diploma'] !== 'N/A'): ?>
                    <div><strong>Dip:</strong> <?= htmlspecialchars($app['qual_diploma']) ?></div>
                  <?php endif; ?>
                  <?php if (!empty($app['qual_grad']) && $app['qual_grad'] !== 'N/A'): ?>
                    <div><strong>Grad:</strong> <?= htmlspecialchars($app['qual_grad']) ?></div>
                  <?php endif; ?>
                  <?php if (!empty($app['qual_pg']) && $app['qual_pg'] !== 'N/A'): ?>
                    <div><strong>PG:</strong> <?= htmlspecialchars($app['qual_pg']) ?></div>
                  <?php endif; ?>
                </td>
                <td>
                  <span style="font-size:12px;font-weight:700;background:#f1f5f9;padding:2px 8px;border-radius:4px;"><?= htmlspecialchars($app['category']) ?></span>
                  <span style="font-size:12px;color:#64748b;margin-left:4px;"><?= htmlspecialchars($app['domicile']) ?></span>
                </td>
                <td style="font-size:13px;color:#64748b;">
                  <?= date('d M Y, h:i A', strtotime($app['created_at'])) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php require_once __DIR__ . '/footer.php'; ?>
