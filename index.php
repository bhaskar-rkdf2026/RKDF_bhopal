<?php
// ============================================================
// RKDF University — World-Class Homepage (Connected to CMS Admin Panel)
// Dynamic CMS Database Integration + 100% Admin Editable Sections & Settings
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(get_site_setting('site_title', 'RKDF University Bhopal — Education Glorifies Nation')); ?></title>
  <meta name="description" content="RKDF University Bhopal — Premier Private State University in Madhya Pradesh offering UG, PG, Diploma, and Ph.D. degree programs.">
  <meta name="keywords" content="RKDF, RKDF University Bhopal, Best University in MP, B.Tech, MBA, Pharmacy, Ph.D, Admissions 2026-27">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="css/rkdf-home.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/rkdf-navbar.css?v=<?php echo time(); ?>">
  <link rel="icon" type="image/jpg" href="images/rkdflogo.jpg">
</head>
<body>

  <!-- APPROVED NAVBAR (Dynamic Ticker & Menu Links from Admin) -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- DYNAMIC CMS HOMEPAGE SECTIONS ENGINE (Sections §01 to §14 Powered by Admin DB) -->
  <?php include __DIR__ . '/include/home_sections.php'; ?>

  <!-- APPROVED FOOTER (Dynamic Footer Links & Contacts from Admin) -->
  <?php include __DIR__ . '/include/footer.php'; ?>

  <!-- IMPORTANT NOTICE POPUP MODAL DIALOG -->
  <?php include __DIR__ . '/include/notice_modal.php'; ?>

  <!-- FLOATING QUICK ACTION TOOLBAR (Right edge) -->
  <?php include __DIR__ . '/include/floating_widgets.php'; ?>

</body>
</html>