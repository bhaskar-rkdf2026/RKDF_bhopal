<?php
// admin/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$pageTitle = $pageTitle ?? 'Admin Dashboard — RKDF Bhopal';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- Google Fonts & FontAwesome Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary: #D9232D;
      --primary-dark: #b01921;
      --secondary: #0f172a;
      --sidebar-width: 260px;
      --bg-light: #f8fafc;
      --card-bg: #ffffff;
      --border-color: #e2e8f0;
      --text-main: #1e293b;
      --text-muted: #64748b;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    body {
      background-color: var(--bg-light);
      color: var(--text-main);
      display: flex;
      min-height: 100vh;
    }
    
    /* Sidebar */
    .admin-sidebar {
      width: var(--sidebar-width);
      background: var(--secondary);
      color: #fff;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      display: flex;
      flex-direction: column;
    }
    
    .sidebar-brand {
      padding: 24px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .sidebar-brand img {
      height: 36px;
      width: auto;
    }
    
    .sidebar-brand span {
      font-weight: 800;
      font-size: 18px;
      letter-spacing: -0.5px;
      color: #fff;
    }

    .sidebar-brand span em {
      color: var(--primary);
      font-style: normal;
    }

    .sidebar-menu {
      padding: 20px 12px;
      flex: 1;
      overflow-y: auto;
    }

    .menu-category {
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #64748b;
      padding: 12px 12px 6px;
      font-weight: 700;
    }

    .menu-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 16px;
      color: #94a3b8;
      text-decoration: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 4px;
      transition: all 0.2s ease;
    }

    .menu-item:hover, .menu-item.active {
      background: rgba(217, 35, 45, 0.15);
      color: #ffffff;
    }

    .menu-item.active i {
      color: var(--primary);
    }

    .sidebar-footer {
      padding: 16px 20px;
      border-top: 1px solid rgba(255,255,255,0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--primary);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 14px;
    }

    .user-details h4 {
      font-size: 13px;
      font-weight: 700;
      color: #fff;
    }

    .user-details p {
      font-size: 11px;
      color: #94a3b8;
    }

    .logout-btn {
      color: #ef4444;
      text-decoration: none;
      font-size: 16px;
      padding: 8px;
      border-radius: 6px;
      transition: background 0.2s;
    }

    .logout-btn:hover {
      background: rgba(239, 68, 68, 0.15);
    }

    /* Main Area */
    .admin-main {
      margin-left: var(--sidebar-width);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    .top-header {
      background: #ffffff;
      height: 64px;
      border-bottom: 1px solid var(--border-color);
      padding: 0 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 90;
    }

    .page-title {
      font-size: 18px;
      font-weight: 700;
      color: var(--secondary);
    }

    .header-actions {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .btn-view-site {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 16px;
      background: var(--bg-light);
      border: 1px solid var(--border-color);
      border-radius: 6px;
      color: var(--text-main);
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      transition: all 0.2s;
    }

    .btn-view-site:hover {
      background: #e2e8f0;
    }

    .content-container {
      padding: 32px;
      flex: 1;
    }

    @media (max-width: 900px) {
      body { flex-direction: column; }
      .admin-sidebar { position: relative; width: 100%; height: auto; }
      .admin-main { margin-left: 0; width: 100%; }
      .content-container { padding: 16px; }
      .top-header { padding: 16px; }
    }
  </style>

</head>
<body>

  <!-- Admin Sidebar -->
  <aside class="admin-sidebar">
    <div class="sidebar-brand">
      <i class="fa-solid fa-graduation-cap" style="color: var(--primary); font-size: 24px;"></i>
      <span>RKDF <em>CMS</em></span>
    </div>

    <nav class="sidebar-menu">
      <div class="menu-category">Overview</div>
      <a href="dashboard.php" class="menu-item <?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-pie"></i>
        <span>Dashboard</span>
      </a>

      <div class="menu-category">CMS Content</div>
      <a href="manage_pages.php" class="menu-item <?= (basename($_SERVER['PHP_SELF']) == 'manage_pages.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-file-lines"></i>
        <span>Page Content Editor</span>
      </a>
      <a href="manage_sections.php" class="menu-item <?= (basename($_SERVER['PHP_SELF']) == 'manage_sections.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-layer-group"></i>
        <span>Homepage Sections</span>
      </a>
      <a href="manage_appearance.php" class="menu-item <?= (basename($_SERVER['PHP_SELF']) == 'manage_appearance.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-palette"></i>
        <span>Header &amp; Footer Layout</span>
      </a>
      <a href="manage_settings.php" class="menu-item <?= (basename($_SERVER['PHP_SELF']) == 'manage_settings.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-sliders"></i>
        <span>Global Site Settings</span>
      </a>

      <div class="menu-category">System</div>
      <a href="../database/seed_data.php" target="_blank" class="menu-item">
        <i class="fa-solid fa-database"></i>
        <span>Re-Seed Database</span>
      </a>
      <a href="../index.php" target="_blank" class="menu-item">
        <i class="fa-solid fa-globe"></i>
        <span>View Live Site ↗</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <div class="user-info">
        <div class="user-avatar">A</div>
        <div class="user-details">
          <h4><?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?></h4>
          <p>Administrator</p>
        </div>
      </div>
      <a href="logout.php" class="logout-btn" title="Logout">
        <i class="fa-solid fa-right-from-bracket"></i>
      </a>
    </div>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="admin-main">
    <header class="top-header">
      <h1 class="page-title"><?= htmlspecialchars($pageTitle) ?></h1>
      <div class="header-actions">
        <a href="../index.php" target="_blank" class="btn-view-site">
          <i class="fa-solid fa-external-link"></i> Live Website
        </a>
      </div>
    </header>
    <div class="content-container">
