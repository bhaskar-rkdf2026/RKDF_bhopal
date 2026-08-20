<?php
// ============================================================
// RKDF University — Admin Panel: All Form Submissions & Applications Portal
// Manages: Admissions, Alumni, Verification, Marksheet, Name Correction, Migration, Contact, Feedback & Careers
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

$pdo = getDbConnection();

$type = trim($_GET['type'] ?? 'admission');
$validTypes = ['admission', 'alumni', 'verification', 'marksheet', 'name_correction', 'migration', 'contact', 'feedback', 'career'];
if (!in_array($type, $validTypes)) {
    $type = 'admission';
}

// ── Export CSV Handler ───────────────────────────────────────
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    $search = trim($_GET['search'] ?? '');
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=RKDF_' . ucfirst($type) . '_Submissions_' . date('Y-m-d_H-i') . '.csv');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fputs($output, "\xEF\xBB\xBF"); // Excel UTF-8 BOM

    if ($pdo) {
        try {
            if ($type === 'admission') {
                fputcsv($output, ['S.No', 'Reg ID', 'Student Name', 'Father Name', 'Aadhaar', 'Mobile', 'Email', 'Course', 'Branch', 'Gender', 'Category', 'Domicile', 'Submitted Date']);
                $sql = "SELECT * FROM online_applications ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['reg_id']??'', $r['student_name']??'', $r['father_name']??'', $r['aadhaar_no']??'', $r['mobile_no']??'', $r['email_id']??'', $r['course']??'', $r['branch']??'', $r['gender']??'', $r['category']??'', $r['domicile']??'', $r['created_at']??'']);
                }
            } else if ($type === 'alumni') {
                fputcsv($output, ['S.No', 'Name', 'Father Name', 'Gender', 'Mobile', 'Email', 'Enrollment', 'College', 'Course', 'Branch', 'Occupation', 'Company', 'City', 'Submitted Date']);
                $sql = "SELECT * FROM alumni ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['name']??'', $r['fname']??'', $r['gender']??'', $r['mobile']??'', $r['email']??'', $r['enrollment']??'', $r['college']??'', $r['course']??'', $r['branch']??'', $r['occupation']??'', $r['company']??'', $r['city']??'', $r['created_at']??'']);
                }
            } else if ($type === 'verification') {
                fputcsv($output, ['S.No', 'Req ID', 'Candidate Name', 'Agency/Org', 'Enrollment No', 'Roll No', 'Course', 'Passing Year', 'Mobile', 'Email', 'Status', 'Date']);
                $sql = "SELECT * FROM verification_requests ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['req_id']??'', $r['candidate_name']??'', $r['agency_or_student_name']??'', $r['enrollment_no']??'', $r['roll_no']??'', $r['course']??'', $r['passing_year']??'', $r['mobile_no']??'', $r['email_id']??'', $r['status']??'', $r['created_at']??'']);
                }
            } else if ($type === 'marksheet') {
                fputcsv($output, ['S.No', 'Req ID', 'Student Name', 'Father Name', 'Enrollment No', 'Course', 'Semester', 'Mobile', 'Email', 'Reason', 'Status', 'Date']);
                $sql = "SELECT * FROM marksheet_requests ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['req_id']??'', $r['student_name']??'', $r['father_name']??'', $r['enrollment_no']??'', $r['course']??'', $r['semester']??'', $r['mobile_no']??'', $r['email_id']??'', $r['reason']??'', $r['status']??'', $r['created_at']??'']);
                }
            } else if ($type === 'name_correction') {
                fputcsv($output, ['S.No', 'Req ID', 'Current Name', 'Corrected Name', 'Father Name', 'Enrollment No', 'Course', 'Mobile', 'Email', 'Correction Type', 'Status', 'Date']);
                $sql = "SELECT * FROM name_correction_requests ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['req_id']??'', $r['current_name']??'', $r['corrected_name']??'', $r['father_name']??'', $r['enrollment_no']??'', $r['course']??'', $r['mobile_no']??'', $r['email_id']??'', $r['correction_type']??'', $r['status']??'', $r['created_at']??'']);
                }
            } else if ($type === 'migration') {
                fputcsv($output, ['S.No', 'Req ID', 'Student Name', 'Father Name', 'Enrollment No', 'Course', 'Language', 'Mobile', 'Email', 'Dispatch Address', 'Status', 'Date']);
                $sql = "SELECT * FROM migration_requests ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['req_id']??'', $r['student_name']??'', $r['father_name']??'', $r['enrollment_no']??'', $r['course']??'', $r['language']??'', $r['mobile_no']??'', $r['email_id']??'', $r['postal_address']??'', $r['status']??'', $r['created_at']??'']);
                }
            } else if ($type === 'contact') {
                fputcsv($output, ['S.No', 'Name', 'Phone', 'Email', 'Message', 'WhatsApp Consent', 'Source', 'Date']);
                $sql = "SELECT * FROM contact_submissions ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['name']??'', $r['phone']??'', $r['email']??'', $r['message']??'', $r['channel_consent']?'YES':'NO', $r['source']??'', $r['created_at']??'']);
                }
            } else if ($type === 'feedback') {
                fputcsv($output, ['S.No', 'Name', 'Phone', 'Email', 'User Type', 'Message / Query', 'Status', 'Date']);
                $sql = "SELECT * FROM feedback_submissions ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['name']??'', $r['phone']??'', $r['email']??'', $r['user_type']??'', $r['feedback_text']??'', $r['status']??'', $r['created_at']??'']);
                }
            } else if ($type === 'career') {
                fputcsv($output, ['S.No', 'Req ID', 'Applicant Name', 'Email', 'Mobile', 'Post Applied', 'Department', 'Qualification', 'Experience', 'Status', 'Date']);
                $sql = "SELECT * FROM career_applications ORDER BY id DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $i => $r) {
                    fputcsv($output, [$i+1, $r['req_id']??'', $r['applicant_name']??'', $r['email_id']??'', $r['mobile_no']??'', $r['post_applied']??'', $r['department']??'', $r['qualification']??'', $r['experience_years']??'', $r['status']??'', $r['created_at']??'']);
                }
            }
        } catch (Throwable $eCsv) {}
    }

    fclose($output);
    exit();
}

$pageTitle = 'Master Form Submissions & Applications — RKDF Admin Portal';
require_once __DIR__ . '/header.php';

$search = trim($_GET['search'] ?? '');

// Fetch Submission Stats for all form categories
$counts = [];
$tableMap = [
    'admission'       => 'online_applications',
    'alumni'          => 'alumni',
    'verification'    => 'verification_requests',
    'marksheet'       => 'marksheet_requests',
    'name_correction' => 'name_correction_requests',
    'migration'       => 'migration_requests',
    'contact'         => 'contact_submissions',
    'feedback'        => 'feedback_submissions',
    'career'          => 'career_applications'
];

foreach ($tableMap as $tKey => $tbl) {
    $counts[$tKey] = 0;
    if ($pdo) {
        try {
            $st = $pdo->query("SELECT COUNT(*) FROM `{$tbl}`");
            $counts[$tKey] = $st ? (int)$st->fetchColumn() : 0;
        } catch (Throwable $e) {}
    }
}

// Fetch current tab records
$records = [];
$currentTable = $tableMap[$type];
if ($pdo) {
    try {
        $where = ["1=1"];
        $params = [];
        if (!empty($search)) {
            if ($type === 'admission') {
                $where[] = "(reg_id LIKE ? OR student_name LIKE ? OR mobile_no LIKE ? OR email_id LIKE ?)";
            } else if ($type === 'alumni') {
                $where[] = "(name LIKE ? OR enrollment LIKE ? OR mobile LIKE ? OR email LIKE ?)";
            } else if ($type === 'contact') {
                $where[] = "(name LIKE ? OR phone LIKE ? OR email LIKE ?)";
            } else if ($type === 'feedback') {
                $where[] = "(name LIKE ? OR phone LIKE ? OR email LIKE ?)";
            } else if ($type === 'career') {
                $where[] = "(applicant_name LIKE ? OR mobile_no LIKE ? OR post_applied LIKE ?)";
            } else {
                $where[] = "(req_id LIKE ? OR student_name LIKE ? OR enrollment_no LIKE ? OR mobile_no LIKE ?)";
            }
            $term = "%{$search}%";
            $params = [$term, $term, $term, $term];
        }
        $sql = "SELECT * FROM `{$currentTable}` WHERE " . implode(" AND ", $where) . " ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (Throwable $exRec) {
        $records = [];
    }
}
?>

<style>
  .nav-tabs-bar {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    border-bottom: 2px solid var(--border-color);
    margin-bottom: 24px;
    padding-bottom: 1px;
  }
  .tab-btn {
    padding: 10px 18px;
    border-radius: 8px 8px 0 0;
    font-size: 13.5px;
    font-weight: 700;
    color: var(--text-muted);
    text-decoration: none;
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-bottom: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
  }
  .tab-btn:hover { background: #f1f5f9; color: var(--secondary); }
  .tab-btn.active {
    background: var(--primary);
    color: #ffffff;
    border-color: var(--primary);
  }
  .tab-badge {
    background: rgba(0,0,0,0.15);
    color: #ffffff;
    padding: 2px 8px;
    border-radius: 99px;
    font-size: 11px;
  }
  .tab-btn:not(.active) .tab-badge {
    background: #e2e8f0;
    color: #334155;
  }

  .adm-filter-bar {
    background: #ffffff;
    padding: 20px 24px;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
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
    font-size: 13.5px;
  }
  .adm-table th {
    background: #f8fafc;
    color: #334155;
    padding: 14px 16px;
    text-align: left;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 11.5px;
    letter-spacing: 0.04em;
    border-bottom: 1px solid var(--border-color);
  }
  .adm-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    color: #1e293b;
    vertical-align: middle;
  }
  .adm-table tr:hover td { background: #f8fafc; }
</style>

<div style="padding: 10px 10px 40px;">

  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
    <div>
      <h1 style="font-size:22px;font-weight:800;color:var(--secondary);">Form Submissions &amp; Online Applications</h1>
      <p style="font-size:13.5px;color:var(--text-muted);margin-top:2px;">View, search, filter and export all submissions saved across website forms.</p>
    </div>
    <a href="?type=<?= $type ?>&export=csv<?= !empty($search) ? '&search='.urlencode($search) : '' ?>" style="background:#16a34a;color:#fff;padding:10px 18px;border-radius:8px;font-weight:700;font-size:13.5px;text-decoration:none;display:inline-flex;align-items:center;gap:8px;">
      <i class="fa-solid fa-file-excel"></i> Export <?= ucfirst($type) ?> CSV
    </a>
  </div>

  <!-- NAVIGATION TABS FOR ALL FORMS -->
  <div class="nav-tabs-bar">
    <a href="?type=admission" class="tab-btn <?= $type==='admission'?'active':'' ?>">
      <i class="fa-solid fa-graduation-cap"></i> Admission Apps <span class="tab-badge"><?= $counts['admission'] ?></span>
    </a>
    <a href="?type=alumni" class="tab-btn <?= $type==='alumni'?'active':'' ?>">
      <i class="fa-solid fa-user-graduate"></i> Alumni Reg <span class="tab-badge"><?= $counts['alumni'] ?></span>
    </a>
    <a href="?type=verification" class="tab-btn <?= $type==='verification'?'active':'' ?>">
      <i class="fa-solid fa-file-shield"></i> Verification <span class="tab-badge"><?= $counts['verification'] ?></span>
    </a>
    <a href="?type=marksheet" class="tab-btn <?= $type==='marksheet'?'active':'' ?>">
      <i class="fa-solid fa-file-invoice"></i> Marksheet <span class="tab-badge"><?= $counts['marksheet'] ?></span>
    </a>
    <a href="?type=name_correction" class="tab-btn <?= $type==='name_correction'?'active':'' ?>">
      <i class="fa-solid fa-pen-to-square"></i> Name Correction <span class="tab-badge"><?= $counts['name_correction'] ?></span>
    </a>
    <a href="?type=migration" class="tab-btn <?= $type==='migration'?'active':'' ?>">
      <i class="fa-solid fa-truck-ramp-box"></i> Migration <span class="tab-badge"><?= $counts['migration'] ?></span>
    </a>
    <a href="?type=contact" class="tab-btn <?= $type==='contact'?'active':'' ?>">
      <i class="fa-solid fa-comments"></i> Contact Us <span class="tab-badge"><?= $counts['contact'] ?></span>
    </a>
    <a href="?type=feedback" class="tab-btn <?= $type==='feedback'?'active':'' ?>">
      <i class="fa-solid fa-comment-dots"></i> Feedback <span class="tab-badge"><?= $counts['feedback'] ?></span>
    </a>
    <a href="?type=career" class="tab-btn <?= $type==='career'?'active':'' ?>">
      <i class="fa-solid fa-briefcase"></i> Careers <span class="tab-badge"><?= $counts['career'] ?></span>
    </a>
  </div>

  <!-- SEARCH BAR -->
  <div class="adm-filter-bar">
    <form method="get" style="display:flex;gap:12px;align-items:center;flex:1;">
      <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>" />
      <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search submissions..." style="padding:10px 14px;border:1px solid var(--border-color);border-radius:8px;font-size:14px;min-width:280px;" />
      <button type="submit" style="background:var(--primary);color:#fff;border:none;padding:10px 18px;border-radius:8px;font-weight:700;cursor:pointer;">Search</button>
      <?php if (!empty($search)): ?>
        <a href="?type=<?= $type ?>" style="color:#64748b;font-weight:600;text-decoration:none;margin-left:8px;">Reset</a>
      <?php endif; ?>
    </form>
    <div style="font-weight:700;color:var(--secondary);font-size:14px;">
      Showing <?= count($records) ?> Submission(s)
    </div>
  </div>

  <!-- DATA TABLE -->
  <div class="adm-table-card">
    <div style="overflow-x:auto;">
      <table class="adm-table">
        <thead>
          <tr>
            <th>#</th>
            <?php if ($type === 'admission'): ?>
              <th>Reg ID</th><th>Student Name</th><th>Father Name</th><th>Contact</th><th>Course &amp; Branch</th><th>Category</th><th>Date</th>
            <?php elseif ($type === 'alumni'): ?>
              <th>Name</th><th>Enrollment</th><th>College &amp; Course</th><th>Contact</th><th>Occupation</th><th>City</th><th>Date</th>
            <?php elseif ($type === 'verification'): ?>
              <th>Req ID</th><th>Candidate</th><th>Agency/Org</th><th>Enrollment</th><th>Course &amp; Year</th><th>Contact</th><th>Date</th>
            <?php elseif ($type === 'marksheet'): ?>
              <th>Req ID</th><th>Student</th><th>Enrollment</th><th>Course &amp; Sem</th><th>Contact</th><th>Reason</th><th>Date</th>
            <?php elseif ($type === 'name_correction'): ?>
              <th>Req ID</th><th>Current Name</th><th>Corrected Name</th><th>Enrollment</th><th>Contact</th><th>Course</th><th>Date</th>
            <?php elseif ($type === 'migration'): ?>
              <th>Req ID</th><th>Student</th><th>Enrollment</th><th>Course &amp; Lang</th><th>Contact</th><th>Address</th><th>Date</th>
            <?php elseif ($type === 'contact'): ?>
              <th>Name</th><th>Phone</th><th>Email</th><th>Message</th><th>WhatsApp Consent</th><th>Source</th><th>Date</th>
            <?php elseif ($type === 'feedback'): ?>
              <th>Name</th><th>Phone</th><th>Email</th><th>User Type</th><th>Message / Query</th><th>Status</th><th>Date</th>
            <?php elseif ($type === 'career'): ?>
              <th>Req ID</th><th>Applicant Name</th><th>Position Applied</th><th>Department</th><th>Contact</th><th>Qual / Exp</th><th>Date</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($records)): ?>
            <tr>
              <td colspan="8" style="text-align:center;padding:40px;color:#94a3b8;">
                <i class="fa-solid fa-folder-open" style="font-size:32px;margin-bottom:10px;display:block;"></i>
                No <?= htmlspecialchars($type) ?> submissions recorded yet.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($records as $idx => $r): ?>
              <tr>
                <td><?= $idx + 1 ?></td>

                <?php if ($type === 'admission'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['reg_id']??'') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['student_name']??'') ?></strong></td>
                  <td><?= htmlspecialchars($r['father_name']??'') ?></td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?><br/><small style="color:#64748b;"><?= htmlspecialchars($r['email_id']??'') ?></small></td>
                  <td><strong><?= htmlspecialchars($r['course']??'') ?></strong><br/><small style="color:#64748b;"><?= htmlspecialchars($r['branch']??'') ?></small></td>
                  <td><?= htmlspecialchars($r['category']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'alumni'): ?>
                  <td><strong><?= htmlspecialchars($r['name']??'') ?></strong></td>
                  <td><code style="color:var(--primary);"><?= htmlspecialchars($r['enrollment']??'') ?></code></td>
                  <td><?= htmlspecialchars($r['course']??'') ?><br/><small style="color:#64748b;"><?= htmlspecialchars($r['college']??'') ?></small></td>
                  <td><?= htmlspecialchars($r['mobile']??'') ?><br/><small style="color:#64748b;"><?= htmlspecialchars($r['email']??'') ?></small></td>
                  <td><?= htmlspecialchars($r['occupation']??'') ?><br/><small style="color:#64748b;"><?= htmlspecialchars($r['company']??'') ?></small></td>
                  <td><?= htmlspecialchars($r['city']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'verification'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['req_id']??'') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['candidate_name']??'') ?></strong></td>
                  <td><?= htmlspecialchars($r['agency_or_student_name']??'N/A') ?></td>
                  <td><code><?= htmlspecialchars($r['enrollment_no']??'') ?></code></td>
                  <td><?= htmlspecialchars($r['course']??'') ?> (<?= htmlspecialchars($r['passing_year']??'') ?>)</td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'marksheet'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['req_id']??'') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['student_name']??'') ?></strong></td>
                  <td><code><?= htmlspecialchars($r['enrollment_no']??'') ?></code></td>
                  <td><?= htmlspecialchars($r['course']??'') ?> (Sem <?= htmlspecialchars($r['semester']??'') ?>)</td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?></td>
                  <td><?= htmlspecialchars($r['reason']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'name_correction'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['req_id']??'') ?></strong></td>
                  <td><span style="color:#dc2626;"><?= htmlspecialchars($r['current_name']??'') ?></span></td>
                  <td><strong style="color:#16a34a;"><?= htmlspecialchars($r['corrected_name']??'') ?></strong></td>
                  <td><code><?= htmlspecialchars($r['enrollment_no']??'') ?></code></td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?></td>
                  <td><?= htmlspecialchars($r['course']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'migration'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['req_id']??'') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['student_name']??'') ?></strong></td>
                  <td><code><?= htmlspecialchars($r['enrollment_no']??'') ?></code></td>
                  <td><?= htmlspecialchars($r['course']??'') ?> (<?= htmlspecialchars($r['language']??'English') ?>)</td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?></td>
                  <td><?= htmlspecialchars($r['postal_address']??'') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'contact'): ?>
                  <td><strong><?= htmlspecialchars($r['name']?:'N/A') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['phone']??'') ?></strong></td>
                  <td><?= htmlspecialchars($r['email']?:'N/A') ?></td>
                  <td style="max-width:240px;"><?= htmlspecialchars($r['message']?:'WhatsApp/SMS Subscription') ?></td>
                  <td><span style="font-weight:700;color:<?= $r['channel_consent']?'#16a34a':'#dc2626' ?>;"><?= $r['channel_consent']?'YES':'NO' ?></span></td>
                  <td><?= htmlspecialchars($r['source']??'Contact Page') ?></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y, h:i A', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'feedback'): ?>
                  <td><strong><?= htmlspecialchars($r['name']??'') ?></strong></td>
                  <td><?= htmlspecialchars($r['phone']??'') ?></td>
                  <td><?= htmlspecialchars($r['email']??'') ?></td>
                  <td><span style="background:#f1f5f9;padding:2px 8px;border-radius:4px;font-size:12px;"><?= htmlspecialchars($r['user_type']??'Student') ?></span></td>
                  <td style="max-width:260px;"><?= htmlspecialchars($r['feedback_text']??'') ?></td>
                  <td><span style="background:#e0f2fe;color:#0369a1;padding:2px 8px;border-radius:4px;font-size:12px;font-weight:700;"><?= htmlspecialchars($r['status']??'NEW') ?></span></td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y, h:i A', strtotime($r['created_at'])) ?></td>

                <?php elseif ($type === 'career'): ?>
                  <td><strong style="color:var(--primary);"><?= htmlspecialchars($r['req_id']??'') ?></strong></td>
                  <td><strong><?= htmlspecialchars($r['applicant_name']??'') ?></strong></td>
                  <td><strong style="color:var(--secondary);"><?= htmlspecialchars($r['post_applied']??'') ?></strong></td>
                  <td><?= htmlspecialchars($r['department']??'') ?></td>
                  <td><?= htmlspecialchars($r['mobile_no']??'') ?><br/><small style="color:#64748b;"><?= htmlspecialchars($r['email_id']??'') ?></small></td>
                  <td><?= htmlspecialchars($r['qualification']??'') ?> (<?= htmlspecialchars($r['experience_years']??'') ?>)</td>
                  <td style="font-size:12px;color:#64748b;"><?= date('d M Y', strtotime($r['created_at'])) ?></td>

                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php require_once __DIR__ . '/footer.php'; ?>
