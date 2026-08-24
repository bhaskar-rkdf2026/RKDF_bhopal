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
  <?php include __DIR__ . '/include/head_meta.php'; ?>
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