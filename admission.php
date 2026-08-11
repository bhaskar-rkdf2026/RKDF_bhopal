<?php
// ============================================================
// RKDF University — Online Admission Confirmation & Summary
// Process Application Submission & Save Record to CMS DB / Session
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

// Capture POST values or fallback to SESSION values
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['rid_saved'] = false; // Ensure fresh POST request creates a new DB record

    // Raw qualification fields
    $nob1 = trim($_POST['nob1'] ?? '');
    $yop1 = trim($_POST['yop1'] ?? '');
    $tm1  = trim($_POST['tm1'] ?? '');
    $mo1  = trim($_POST['mo1'] ?? '');
    $per1 = trim($_POST['per1'] ?? '');
    $q10  = !empty($nob1) ? "$nob1 ($yop1) — $mo1/$tm1 ($per1%)" : 'N/A';

    $nob2 = trim($_POST['nob2'] ?? '');
    $yop2 = trim($_POST['yop2'] ?? '');
    $tm2  = trim($_POST['tm2'] ?? '');
    $mo2  = trim($_POST['mo2'] ?? '');
    $per2 = trim($_POST['per2'] ?? '');
    $q12  = !empty($nob2) ? "$nob2 ($yop2) — $mo2/$tm2 ($per2%)" : 'N/A';

    $nob3 = trim($_POST['nob3'] ?? '');
    $yop3 = trim($_POST['yop3'] ?? '');
    $tm3  = trim($_POST['tm3'] ?? '');
    $mo3  = trim($_POST['mo3'] ?? '');
    $per3 = trim($_POST['per3'] ?? '');
    $qDip = !empty($nob3) ? "$nob3 ($yop3) — $mo3/$tm3 ($per3%)" : 'N/A';

    $nob4 = trim($_POST['nob4'] ?? '');
    $yop4 = trim($_POST['yop4'] ?? '');
    $tm4  = trim($_POST['tm4'] ?? '');
    $mo4  = trim($_POST['mo4'] ?? '');
    $per4 = trim($_POST['per4'] ?? '');
    $qGrad = !empty($nob4) ? "$nob4 ($yop4) — $mo4/$tm4 ($per4%)" : 'N/A';

    $nob5 = trim($_POST['nob5'] ?? '');
    $yop5 = trim($_POST['yop5'] ?? '');
    $tm5  = trim($_POST['tm5'] ?? '');
    $mo5  = trim($_POST['mo5'] ?? '');
    $per5 = trim($_POST['per5'] ?? '');
    $qPg   = !empty($nob5) ? "$nob5 ($yop5) — $mo5/$tm5 ($per5%)" : 'N/A';

    $_SESSION['app_data'] = [
        'name'         => $_POST['nm'] ?? '',
        'fname'        => $_POST['fnm'] ?? '',
        'adhar'        => $_POST['adhar'] ?? '',
        'mob'          => $_POST['mob'] ?? '',
        'email'        => $_POST['eid'] ?? '',
        'course'       => $_POST['category'] ?? '',
        'branch'       => $_POST['choices'] ?? '',
        'gen'          => $_POST['gen'] ?? '',
        'cat'          => $_POST['cat'] ?? '',
        'dom'          => $_POST['dom'] ?? '',
        'add1'         => $_POST['address'] ?? '',
        'ref'          => $_POST['ref'] ?? '',
        'nob1' => $nob1, 'yop1' => $yop1, 'tm1' => $tm1, 'mo1' => $mo1, 'per1' => $per1,
        'nob2' => $nob2, 'yop2' => $yop2, 'tm2' => $tm2, 'mo2' => $mo2, 'per2' => $per2,
        'nob3' => $nob3, 'yop3' => $yop3, 'tm3' => $tm3, 'mo3' => $mo3, 'per3' => $per3,
        'nob4' => $nob4, 'yop4' => $yop4, 'tm4' => $tm4, 'mo4' => $mo4, 'per4' => $per4,
        'nob5' => $nob5, 'yop5' => $yop5, 'tm5' => $tm5, 'mo5' => $mo5, 'per5' => $per5,
        'qual_10th'    => $q10,
        'qual_12th'    => $q12,
        'qual_diploma' => $qDip,
        'qual_grad'    => $qGrad,
        'qual_pg'      => $qPg,
        'sub_at'       => date('Y-m-d H:i:s')
    ];
}

$app = $_SESSION['app_data'] ?? [];
$name        = htmlspecialchars($app['name'] ?? 'N/A');
$fname       = htmlspecialchars($app['fname'] ?? 'N/A');
$adhar       = htmlspecialchars($app['adhar'] ?? 'N/A');
$mob         = htmlspecialchars($app['mob'] ?? 'N/A');
$email       = htmlspecialchars($app['email'] ?? 'N/A');
$course      = htmlspecialchars($app['course'] ?? 'N/A');
$branch      = htmlspecialchars($app['branch'] ?? 'N/A');
$gen         = htmlspecialchars($app['gen'] ?? 'N/A');
$cat         = htmlspecialchars($app['cat'] ?? 'N/A');
$dom         = htmlspecialchars($app['dom'] ?? 'N/A');
$add1        = htmlspecialchars($app['add1'] ?? 'N/A');
$ref         = htmlspecialchars($app['ref'] ?? 'N/A');
$qual10th    = htmlspecialchars($app['qual_10th'] ?? 'N/A');
$qual12th    = htmlspecialchars($app['qual_12th'] ?? 'N/A');
$qualDiploma = htmlspecialchars($app['qual_diploma'] ?? 'N/A');
$qualGrad    = htmlspecialchars($app['qual_grad'] ?? 'N/A');
$qualPg      = htmlspecialchars($app['qual_pg'] ?? 'N/A');

// Save Application Record to Database (Using PDO)
$regId = $_SESSION['rid'] ?? null;
try {
    $pdo = getDbConnection();

    // Ensure online_applications table exists
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
        `qual_10th` TEXT NULL,
        `qual_12th` TEXT NULL,
        `qual_diploma` TEXT NULL,
        `qual_grad` TEXT NULL,
        `qual_pg` TEXT NULL,
        `nob1` VARCHAR(100) NULL, `yop1` VARCHAR(10) NULL, `tm1` VARCHAR(10) NULL, `mo1` VARCHAR(10) NULL, `per1` VARCHAR(10) NULL,
        `nob2` VARCHAR(100) NULL, `yop2` VARCHAR(10) NULL, `tm2` VARCHAR(10) NULL, `mo2` VARCHAR(10) NULL, `per2` VARCHAR(10) NULL,
        `nob3` VARCHAR(100) NULL, `yop3` VARCHAR(10) NULL, `tm3` VARCHAR(10) NULL, `mo3` VARCHAR(10) NULL, `per3` VARCHAR(10) NULL,
        `nob4` VARCHAR(100) NULL, `yop4` VARCHAR(10) NULL, `tm4` VARCHAR(10) NULL, `mo4` VARCHAR(10) NULL, `per4` VARCHAR(10) NULL,
        `nob5` VARCHAR(100) NULL, `yop5` VARCHAR(10) NULL, `tm5` VARCHAR(10) NULL, `mo5` VARCHAR(10) NULL, `per5` VARCHAR(10) NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Add missing columns dynamically if table exists from previous schema
    $qualCols = [
        'qual_10th', 'qual_12th', 'qual_diploma', 'qual_grad', 'qual_pg',
        'nob1', 'yop1', 'tm1', 'mo1', 'per1',
        'nob2', 'yop2', 'tm2', 'mo2', 'per2',
        'nob3', 'yop3', 'tm3', 'mo3', 'per3',
        'nob4', 'yop4', 'tm4', 'mo4', 'per4',
        'nob5', 'yop5', 'tm5', 'mo5', 'per5'
    ];
    foreach ($qualCols as $col) {
        try {
            $pdo->exec("ALTER TABLE `online_applications` ADD COLUMN `$col` TEXT NULL;");
        } catch (Exception $exCol) {}
    }

    if (!empty($app['name']) && empty($_SESSION['rid_saved'])) {
        $genRegId = 'RKDF' . date('Y') . rand(100000, 999999);
        $stmt = $pdo->prepare("INSERT INTO online_applications 
            (reg_id, student_name, father_name, aadhaar_no, mobile_no, email_id, course, branch, gender, category, domicile, address, reference_by, qual_10th, qual_12th, qual_diploma, qual_grad, qual_pg, nob1, yop1, tm1, mo1, per1, nob2, yop2, tm2, mo2, per2, nob3, yop3, tm3, mo3, per3, nob4, yop4, tm4, mo4, per4, nob5, yop5, tm5, mo5, per5)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $genRegId,
            $app['name'],
            $app['fname'],
            $app['adhar'],
            $app['mob'],
            $app['email'],
            $app['course'],
            $app['branch'],
            $app['gen'],
            $app['cat'],
            $app['dom'],
            $app['add1'],
            $app['ref'],
            $app['qual_10th'] ?? '',
            $app['qual_12th'] ?? '',
            $app['qual_diploma'] ?? '',
            $app['qual_grad'] ?? '',
            $app['qual_pg'] ?? '',
            $app['nob1'] ?? '', $app['yop1'] ?? '', $app['tm1'] ?? '', $app['mo1'] ?? '', $app['per1'] ?? '',
            $app['nob2'] ?? '', $app['yop2'] ?? '', $app['tm2'] ?? '', $app['mo2'] ?? '', $app['per2'] ?? '',
            $app['nob3'] ?? '', $app['yop3'] ?? '', $app['tm3'] ?? '', $app['mo3'] ?? '', $app['per3'] ?? '',
            $app['nob4'] ?? '', $app['yop4'] ?? '', $app['tm4'] ?? '', $app['mo4'] ?? '', $app['per4'] ?? '',
            $app['nob5'] ?? '', $app['yop5'] ?? '', $app['tm5'] ?? '', $app['mo5'] ?? '', $app['per5'] ?? ''
        ]);
        $regId = $genRegId;
        $_SESSION['rid'] = $regId;
        $_SESSION['rid_saved'] = true;
    }
} catch (Exception $e) {
    if (!$regId) {
        $regId = 'RKDF' . date('Y') . rand(100000, 999999);
        $_SESSION['rid'] = $regId;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Submitted — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 140px 0 80px;
      background: linear-gradient(135deg, rgba(12,20,36,0.95) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }
    .sadm-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 12px 40px rgba(12, 20, 36, 0.06);
      max-width: 900px;
      margin: 0 auto;
    }
    .sadm-success-banner {
      background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
      color: #ffffff;
      padding: 24px 32px;
      border-radius: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 32px;
    }
    .sadm-reg-id {
      font-family: 'JetBrains Mono', monospace;
      font-size: 20px;
      font-weight: 800;
      color: #F59E0B;
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.3);
      padding: 6px 16px;
      border-radius: 8px;
      letter-spacing: 0.05em;
    }
    .sadm-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 16px;
    }
    .sadm-table td {
      padding: 14px 18px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 15px;
    }
    .sadm-table tr:last-child td { border-bottom: none; }
    .sadm-table td.label-col {
      width: 32%;
      font-weight: 700;
      color: #475569;
      text-transform: uppercase;
      font-size: 12.5px;
      letter-spacing: 0.04em;
    }
    .sadm-table td.val-col {
      font-weight: 600;
      color: #0C1424;
    }
    .sadm-pay-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #E31B23 0%, #C9192A 100%);
      color: #ffffff !important;
      padding: 16px 36px;
      border-radius: 12px;
      font-weight: 800;
      font-size: 16px;
      text-decoration: none !important;
      box-shadow: 0 6px 20px rgba(227, 27, 35, 0.25);
      transition: all 0.25s ease;
    }
    .sadm-pay-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(227, 27, 35, 0.35);
      background: linear-gradient(135deg, #FF1F29 0%, #D91A2B 100%);
    }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">APPLICATION SUBMITTED SUCCESSFUL</span>
      <h1 class="rk-h1" style="font-size:clamp(2.2rem, 4.5vw, 4rem);margin-top:12px;">Application Details Summary</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="sp-main-box">
    <div class="rk-container">
      <div class="sadm-card">
        
        <div class="sadm-success-banner">
          <div>
            <div style="font-size:12px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#94A3B8;">Application Status</div>
            <div style="font-size:18px;font-weight:800;color:#22C55E;margin-top:4px;">PROVISIONAL APPLICATION REGISTERED</div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:#94A3B8;text-transform:uppercase;margin-bottom:4px;text-align:right;">Registration ID</div>
            <div class="sadm-reg-id"><?= htmlspecialchars($regId ?: 'RKDF2026') ?></div>
          </div>
        </div>

        <h3 style="font-family:'Playfair Display',Georgia,serif;font-size:20px;font-weight:700;color:#0C1424;margin-bottom:16px;">Applicant Summary</h3>

        <table class="sadm-table">
          <tr>
            <td class="label-col">Registration ID</td>
            <td class="val-col"><span style="font-family:'JetBrains Mono',monospace;font-weight:700;color:#E31B23;"><?= htmlspecialchars($regId) ?></span></td>
          </tr>
          <tr>
            <td class="label-col">Student Full Name</td>
            <td class="val-col"><?= $name ?></td>
          </tr>
          <tr>
            <td class="label-col">Father's Name</td>
            <td class="val-col"><?= $fname ?></td>
          </tr>
          <tr>
            <td class="label-col">Course / Discipline</td>
            <td class="val-col"><?= $course ?></td>
          </tr>
          <tr>
            <td class="label-col">Specialization / Branch</td>
            <td class="val-col"><?= $branch ?></td>
          </tr>
          <tr>
            <td class="label-col">Aadhaar Number</td>
            <td class="val-col"><?= $adhar ?></td>
          </tr>
          <tr>
            <td class="label-col">Mobile Number</td>
            <td class="val-col"><?= $mob ?></td>
          </tr>
          <tr>
            <td class="label-col">Email Address</td>
            <td class="val-col"><?= $email ?></td>
          </tr>
          <tr>
            <td class="label-col">Gender</td>
            <td class="val-col"><?= $gen ?></td>
          </tr>
          <tr>
            <td class="label-col">Category</td>
            <td class="val-col"><?= $cat ?></td>
          </tr>
          <tr>
            <td class="label-col">Domicile</td>
            <td class="val-col"><?= $dom ?></td>
          </tr>
          <tr>
            <td class="label-col">Postal Address</td>
            <td class="val-col"><?= $add1 ?></td>
          </tr>
          <tr>
            <td class="label-col">Reference / Counselor</td>
            <td class="val-col"><?= $ref ?></td>
          </tr>
          <tr>
            <td class="label-col">10th Qualification</td>
            <td class="val-col"><?= $qual10th ?></td>
          </tr>
          <tr>
            <td class="label-col">12th Qualification</td>
            <td class="val-col"><?= $qual12th ?></td>
          </tr>
          <?php if ($qualDiploma !== 'N/A'): ?>
          <tr>
            <td class="label-col">Diploma Qualification</td>
            <td class="val-col"><?= $qualDiploma ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($qualGrad !== 'N/A'): ?>
          <tr>
            <td class="label-col">Graduation Qualification</td>
            <td class="val-col"><?= $qualGrad ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($qualPg !== 'N/A'): ?>
          <tr>
            <td class="label-col">Post Graduation</td>
            <td class="val-col"><?= $qualPg ?></td>
          </tr>
          <?php endif; ?>
        </table>

        <div style="margin-top:36px;padding-top:24px;border-top:1px solid #E2E8F0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
          <div style="font-size:13.5px;color:#64748B;">
            ⚠️ Please note your <strong>Registration ID (<?= htmlspecialchars($regId) ?>)</strong> for future reference.
          </div>
          <a href="cheakout.php" class="sadm-pay-btn">
            PROCEED TO PAY NOW ↗
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
