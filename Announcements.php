<?php
// ============================================================
// RKDF University — Document & Circular Hub (Announcements & E-Tenders)
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$activeCat = $_GET['cat'] ?? 'all';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcements, Circulars & E-Tenders — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="css/rkdf-navbar.css?v=<?= time(); ?>">
  <link rel="icon" type="image/jpg" href="images/rkdflogo.jpg">
  <style>
    .ann-hero {
      padding: 150px 0 60px;
      background: linear-gradient(135deg, #0c1424, #1a2540);
      color: #ffffff;
    }
    .ann-hub-page {
      padding: 60px 0 100px;
      background: #faf9f6;
      min-height: 70vh;
    }
    .ann-tabs-bar {
      display: flex;
      gap: 10px;
      border-bottom: 2px solid #e2e8f0;
      margin-bottom: 32px;
      flex-wrap: wrap;
    }
    .ann-tab-btn {
      padding: 12px 22px;
      font-size: 14px;
      font-weight: 700;
      color: #64748b;
      background: transparent;
      border: none;
      border-bottom: 3px solid transparent;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s;
      margin-bottom: -2px;
    }
    .ann-tab-btn:hover, .ann-tab-btn.active {
      color: #d9232d;
      border-bottom-color: #d9232d;
    }
    .ann-table-card {
      background: #ffffff;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 10px 30px rgba(0,0,0,0.03);
      overflow: hidden;
    }
    .ann-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }
    .ann-table th {
      background: #0f172a;
      color: #ffffff;
      padding: 16px 20px;
      text-align: left;
      font-weight: 700;
      font-size: 12px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    .ann-table td {
      padding: 16px 20px;
      border-bottom: 1px solid #f1f5f9;
      color: #334155;
    }
    .ann-table tr:last-child td { border-bottom: none; }
    .ann-table tr:hover td { background: #f8fafc; }
    .ann-badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 99px;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
    }
    .ann-badge.exam { background: #dbeafe; color: #1e40af; }
    .ann-badge.adm  { background: #fef3c7; color: #92400e; }
    .ann-badge.tender { background: #fee2e2; color: #991b1b; }
    .ann-badge.job  { background: #dcfce7; color: #166534; }
    .ann-badge.res  { background: #f3e8ff; color: #6b21a8; }
    .ann-btn-dl {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      background: #d9232d;
      color: #ffffff;
      border-radius: 6px;
      font-weight: 700;
      font-size: 12px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .ann-btn-dl:hover { background: #b01921; color: #ffffff; }
  </style>
</head>
<body>

  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="ann-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">RKDF UNIVERSITY BHOPAL</span>
      <h1 class="rk-h2-xl" style="color:#ffffff;margin-top:12px;">Official Announcements & E-Tenders</h1>
      <p style="color:#94a3b8;font-size:16px;margin-top:12px;max-width:640px;">
        Central repository for university examination notifications, admission guidelines, tender invitations, and career announcements.
      </p>
    </div>
  </section>

  <!-- MAIN HUB CONTENT -->
  <main class="ann-hub-page">
    <div class="rk-container">

      <!-- Category Filter Tabs -->
      <div class="ann-tabs-bar">
        <a href="Announcements.php?cat=all" class="ann-tab-btn <?= $activeCat==='all'?'active':'' ?>">All Circulars</a>
        <a href="Announcements.php?cat=exam" class="ann-tab-btn <?= $activeCat==='exam'?'active':'' ?>">Examinations</a>
        <a href="Announcements.php?cat=adm" class="ann-tab-btn <?= $activeCat==='adm'?'active':'' ?>">Admissions & Fees</a>
        <a href="Announcements.php?cat=career" class="ann-tab-btn <?= $activeCat==='career'?'active':'' ?>">Careers & Recruitment</a>
        <a href="Announcements.php?cat=tender" class="ann-tab-btn <?= $activeCat==='tender'?'active':'' ?>">⚡ E-Tenders</a>
        <a href="Announcements.php?cat=research" class="ann-tab-btn <?= $activeCat==='research'?'active':'' ?>">Research & Grants</a>
      </div>

      <!-- Document Table -->
      <div class="ann-table-card">
        <table class="ann-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Category</th>
              <th>Document / Announcement Title</th>
              <th>Download / View</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $documents = [
              ['date'=>'2026-06-15', 'cat'=>'tender', 'cat_label'=>'E-TENDER', 'title'=>'Notice Inviting Tender — Flow Meters Installation', 'url'=>'images/Notice Inviting Tender _ FLOW METERS.pdf'],
              ['date'=>'2026-06-10', 'cat'=>'exam', 'cat_label'=>'EXAMINATION', 'title'=>'B.ARCH Examination Postponed Notification — June 2026 Session', 'url'=>'Content/Documents/Notices-26/EXAM POST PONED B.ARCH  JUNE-2026.pdf'],
              ['date'=>'2026-05-22', 'cat'=>'career', 'cat_label'=>'RECRUITMENT', 'title'=>'Walk-in Interview — MPCST Project Fellow Position (Precision Farming)', 'url'=>'Content/Documents/Careers_22_May_2026/MPCST Project Position.pdf'],
              ['date'=>'2026-04-30', 'cat'=>'research', 'cat_label'=>'RESEARCH', 'title'=>'MPCST Sponsored JRF Position — AI-Based Smart Agriculture Drone', 'url'=>'Content/Documents/Careers_30April2026/AD For MPCST Project Position JRF - Design and Development of AI-Based Smart Agriculture Drone.pdf'],
              ['date'=>'2026-03-27', 'cat'=>'career', 'cat_label'=>'RECRUITMENT', 'title'=>'Faculty Positions Required across Engineering, Pharmacy & Science Depts', 'url'=>'Content/Documents/Careers_27Mar2026/Dainik Jagran Bhopal - 27 Mar 2026 - Page05.pdf'],
              ['date'=>'2026-02-15', 'cat'=>'adm', 'cat_label'=>'ADMISSIONS', 'title'=>'Ph.D Entrance Examination 2026 Guidelines & Brochure', 'url'=>'phd_entrance.php'],
              ['date'=>'2025-09-20', 'cat'=>'adm', 'cat_label'=>'ADMISSIONS', 'title'=>'Official Fee Structure Notice & Bank Account Details', 'url'=>'University_Fees_Structure.pdf'],
              ['date'=>'2025-08-10', 'cat'=>'research', 'cat_label'=>'RESEARCH', 'title'=>'NAAC Certificate of Accreditation & Statutory Approvals', 'url'=>'Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf'],
              ['date'=>'2024-11-15', 'cat'=>'adm', 'cat_label'=>'ADMISSIONS', 'title'=>'UPI Transaction Notice for Student Semester Fee Payment', 'url'=>'UPI Notice 2024.pdf'],
              ['date'=>'2024-09-01', 'cat'=>'adm', 'cat_label'=>'ADMISSIONS', 'title'=>'Job-Oriented Certificate Courses & Skill Development Programs', 'url'=>'Download/JOB_ORIENTED_PROG.pdf'],
            ];

            foreach ($documents as $doc):
              if ($activeCat !== 'all' && $doc['cat'] !== $activeCat) continue;
            ?>
            <tr>
              <td style="font-weight:600;white-space:nowrap;"><?= htmlspecialchars($doc['date']) ?></td>
              <td><span class="ann-badge <?= htmlspecialchars($doc['cat']) ?>"><?= htmlspecialchars($doc['cat_label']) ?></span></td>
              <td><strong><?= htmlspecialchars($doc['title']) ?></strong></td>
              <td>
                <a href="<?= htmlspecialchars($doc['url']) ?>" target="_blank" class="ann-btn-dl">
                  📥 Download PDF
                </a>
              </td>
            </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    </div>
  </main>

  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
