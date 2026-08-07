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
$activeSlug = $_GET['slug'] ?? '';
$currentPage = basename($_SERVER['PHP_SELF']);
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
      --sidebar-width: 280px;
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
      padding: 14px 12px 6px;
      font-weight: 800;
    }

    .menu-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 16px;
      color: #94a3b8;
      text-decoration: none;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 600;
      margin-bottom: 4px;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .menu-item:hover, .menu-item.active {
      background: rgba(217, 35, 45, 0.15);
      color: #ffffff;
    }

    .menu-item.active i {
      color: var(--primary);
    }

    /* Accordion / Dropdown Styling */
    .menu-dropdown-toggle {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .menu-dropdown-toggle i.chev {
      font-size: 10px;
      transition: transform 0.2s ease;
      opacity: 0.7;
    }
    .menu-dropdown-toggle.open i.chev {
      transform: rotate(180deg);
    }
    .menu-submenu {
      display: none;
      flex-direction: column;
      padding-left: 12px;
      margin-top: 2px;
      margin-bottom: 6px;
      border-left: 2px solid rgba(255, 255, 255, 0.08);
      margin-left: 22px;
    }
    .menu-submenu.open {
      display: flex;
    }
    .submenu-item {
      padding: 7px 12px;
      color: #94a3b8;
      text-decoration: none;
      font-size: 12.5px;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.15s ease;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      display: block;
    }
    .submenu-item:hover, .submenu-item.active {
      color: #ffffff;
      background: rgba(255, 255, 255, 0.08);
    }
    .submenu-item.active {
      color: var(--primary);
      font-weight: 700;
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

  <script>
    function toggleSubmenu(id) {
      var btn = document.getElementById('btn-' + id);
      var sub = document.getElementById('sub-' + id);
      if (btn && sub) {
        btn.classList.toggle('open');
        sub.classList.toggle('open');
      }
    }
  </script>
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
      <a href="dashboard.php" class="menu-item <?= ($currentPage == 'dashboard.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-pie"></i>
        <span>Dashboard</span>
      </a>

      <div class="menu-category">CMS Content</div>

      <!-- 1. Header & Footer Layout -->
      <a href="manage_appearance.php" class="menu-item <?= ($currentPage == 'manage_appearance.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-palette"></i>
        <span>Header &amp; Footer Layout</span>
      </a>

      <!-- 2. Homepage Sections -->
      <a href="manage_sections.php" class="menu-item <?= ($currentPage == 'manage_sections.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-layer-group"></i>
        <span>Homepage Sections</span>
      </a>

      <!-- 3. ABOUT US (Dropdown) -->
      <?php
      $aboutSlugs = ['about','vision-mission','objectives','idp','org-structure','chancellor','pro-chancellor','vc-desk','dgm','dgr','registrar','other-officers','dean','hod','governing-body','bom','academic-council','bos','national-advisory','local-advisory','public-disclosure','imggallery'];
      $isAboutActive = in_array($activeSlug, $aboutSlugs);
      ?>
      <div id="btn-about" class="menu-item menu-dropdown-toggle <?= $isAboutActive ? 'active open' : '' ?>" onclick="toggleSubmenu('about')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-circle-info"></i>
          <span>About Us</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-about" class="menu-submenu <?= $isAboutActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=about" class="submenu-item <?= ($activeSlug == 'about') ? 'active' : '' ?>">About Us Overview</a>
        <a href="manage_pages.php?slug=vision-mission" class="submenu-item <?= ($activeSlug == 'vision-mission') ? 'active' : '' ?>">Vision &amp; Mission</a>
        <a href="manage_pages.php?slug=objectives" class="submenu-item <?= ($activeSlug == 'objectives') ? 'active' : '' ?>">Objectives</a>
        <a href="manage_pages.php?slug=idp" class="submenu-item <?= ($activeSlug == 'idp') ? 'active' : '' ?>">Institutional Development Plan</a>
        <a href="manage_pages.php?slug=org-structure" class="submenu-item <?= ($activeSlug == 'org-structure') ? 'active' : '' ?>">Organizational Structure</a>
        <a href="manage_pages.php?slug=chancellor" class="submenu-item <?= ($activeSlug == 'chancellor') ? 'active' : '' ?>">Chancellor's Desk</a>
        <a href="manage_pages.php?slug=pro-chancellor" class="submenu-item <?= ($activeSlug == 'pro-chancellor') ? 'active' : '' ?>">Pro-Chancellor</a>
        <a href="manage_pages.php?slug=vc-desk" class="submenu-item <?= ($activeSlug == 'vc-desk') ? 'active' : '' ?>">Vice Chancellor's Desk</a>
        <a href="manage_pages.php?slug=dgm" class="submenu-item <?= ($activeSlug == 'dgm') ? 'active' : '' ?>">DGM Profile</a>
        <a href="manage_pages.php?slug=dgr" class="submenu-item <?= ($activeSlug == 'dgr') ? 'active' : '' ?>">DGR Profile</a>
        <a href="manage_pages.php?slug=registrar" class="submenu-item <?= ($activeSlug == 'registrar') ? 'active' : '' ?>">Registrar Profile</a>
        <a href="manage_pages.php?slug=other-officers" class="submenu-item <?= ($activeSlug == 'other-officers') ? 'active' : '' ?>">Other Officer's</a>
        <a href="manage_pages.php?slug=dean" class="submenu-item <?= ($activeSlug == 'dean') ? 'active' : '' ?>">Dean's Profile</a>
        <a href="manage_pages.php?slug=hod" class="submenu-item <?= ($activeSlug == 'hod') ? 'active' : '' ?>">Institute Head / HOD's</a>
        <a href="manage_pages.php?slug=governing-body" class="submenu-item <?= ($activeSlug == 'governing-body') ? 'active' : '' ?>">Governing Body</a>
        <a href="manage_pages.php?slug=bom" class="submenu-item <?= ($activeSlug == 'bom') ? 'active' : '' ?>">Board of Management</a>
        <a href="manage_pages.php?slug=academic-council" class="submenu-item <?= ($activeSlug == 'academic-council') ? 'active' : '' ?>">Academic Council</a>
        <a href="manage_pages.php?slug=bos" class="submenu-item <?= ($activeSlug == 'bos') ? 'active' : '' ?>">Board of Studies</a>
        <a href="manage_pages.php?slug=national-advisory" class="submenu-item <?= ($activeSlug == 'national-advisory') ? 'active' : '' ?>">National Core Advisory Group</a>
        <a href="manage_pages.php?slug=local-advisory" class="submenu-item <?= ($activeSlug == 'local-advisory') ? 'active' : '' ?>">Local Core Advisory Group</a>
        <a href="manage_pages.php?slug=public-disclosure" class="submenu-item <?= ($activeSlug == 'public-disclosure') ? 'active' : '' ?>">Public Self Disclosure</a>
        <a href="manage_pages.php?slug=imggallery" class="submenu-item <?= ($activeSlug == 'imggallery') ? 'active' : '' ?>">Photo Gallery</a>
      </div>

      <!-- 4. ACADEMIC (Dropdown) -->
      <?php
      $academicSlugs = ['management','science','commerce','engineering','pharmacy','computer-application','education','social-science','agriculture','architect','law','bhms','bams','nursing','paramedical','library','constituent-units','fee-structure','fee-submission-notice','syllabus','e-resources','value-added-courses','calendar','collaborations','feedback','skills-enhancement','annual-report','staff','lms','convocation-2023-24','convocation-2024-25'];
      $isAcadActive = in_array($activeSlug, $academicSlugs);
      ?>
      <div id="btn-academic" class="menu-item menu-dropdown-toggle <?= $isAcadActive ? 'active open' : '' ?>" onclick="toggleSubmenu('academic')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-graduation-cap"></i>
          <span>Academic</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-academic" class="menu-submenu <?= $isAcadActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=management" class="submenu-item <?= ($activeSlug == 'management') ? 'active' : '' ?>">Management</a>
        <a href="manage_pages.php?slug=science" class="submenu-item <?= ($activeSlug == 'science') ? 'active' : '' ?>">Science</a>
        <a href="manage_pages.php?slug=commerce" class="submenu-item <?= ($activeSlug == 'commerce') ? 'active' : '' ?>">Commerce</a>
        <a href="manage_pages.php?slug=engineering" class="submenu-item <?= ($activeSlug == 'engineering') ? 'active' : '' ?>">Engineering &amp; Tech</a>
        <a href="manage_pages.php?slug=pharmacy" class="submenu-item <?= ($activeSlug == 'pharmacy') ? 'active' : '' ?>">Pharmacy</a>
        <a href="manage_pages.php?slug=computer-application" class="submenu-item <?= ($activeSlug == 'computer-application') ? 'active' : '' ?>">Computer Application</a>
        <a href="manage_pages.php?slug=education" class="submenu-item <?= ($activeSlug == 'education') ? 'active' : '' ?>">Education</a>
        <a href="manage_pages.php?slug=social-science" class="submenu-item <?= ($activeSlug == 'social-science') ? 'active' : '' ?>">Social Science</a>
        <a href="manage_pages.php?slug=agriculture" class="submenu-item <?= ($activeSlug == 'agriculture') ? 'active' : '' ?>">Agriculture</a>
        <a href="manage_pages.php?slug=architect" class="submenu-item <?= ($activeSlug == 'architect') ? 'active' : '' ?>">Architecture</a>
        <a href="manage_pages.php?slug=law" class="submenu-item <?= ($activeSlug == 'law') ? 'active' : '' ?>">Law</a>
        <a href="manage_pages.php?slug=bhms" class="submenu-item <?= ($activeSlug == 'bhms') ? 'active' : '' ?>">Homeopathy (BHMS)</a>
        <a href="manage_pages.php?slug=bams" class="submenu-item <?= ($activeSlug == 'bams') ? 'active' : '' ?>">Ayurveda (BAMS)</a>
        <a href="manage_pages.php?slug=nursing" class="submenu-item <?= ($activeSlug == 'nursing') ? 'active' : '' ?>">Nursing</a>
        <a href="manage_pages.php?slug=paramedical" class="submenu-item <?= ($activeSlug == 'paramedical') ? 'active' : '' ?>">Paramedical</a>
        <a href="manage_pages.php?slug=library" class="submenu-item <?= ($activeSlug == 'library') ? 'active' : '' ?>">Library &amp; Info Sciences</a>
        <a href="manage_pages.php?slug=constituent-units" class="submenu-item <?= ($activeSlug == 'constituent-units') ? 'active' : '' ?>">Constituent Units</a>
        <a href="manage_pages.php?slug=fee-structure" class="submenu-item <?= ($activeSlug == 'fee-structure') ? 'active' : '' ?>">Fees Structure</a>
        <a href="manage_pages.php?slug=fee-submission-notice" class="submenu-item <?= ($activeSlug == 'fee-submission-notice') ? 'active' : '' ?>">Notice For Fees Submission</a>
        <a href="manage_pages.php?slug=syllabus" class="submenu-item <?= ($activeSlug == 'syllabus') ? 'active' : '' ?>">Syllabus</a>
        <a href="manage_pages.php?slug=e-resources" class="submenu-item <?= ($activeSlug == 'e-resources') ? 'active' : '' ?>">E-Resources</a>
        <a href="manage_pages.php?slug=value-added-courses" class="submenu-item <?= ($activeSlug == 'value-added-courses') ? 'active' : '' ?>">Value-Added Courses</a>
        <a href="manage_pages.php?slug=calendar" class="submenu-item <?= ($activeSlug == 'calendar') ? 'active' : '' ?>">Academic Calendar</a>
        <a href="manage_pages.php?slug=collaborations" class="submenu-item <?= ($activeSlug == 'collaborations') ? 'active' : '' ?>">Collaborations</a>
        <a href="manage_pages.php?slug=feedback" class="submenu-item <?= ($activeSlug == 'feedback') ? 'active' : '' ?>">Feedback Analysis</a>
        <a href="manage_pages.php?slug=skills-enhancement" class="submenu-item <?= ($activeSlug == 'skills-enhancement') ? 'active' : '' ?>">Skills Enhancement</a>
        <a href="manage_pages.php?slug=annual-report" class="submenu-item <?= ($activeSlug == 'annual-report') ? 'active' : '' ?>">University Annual Report</a>
        <a href="manage_pages.php?slug=staff" class="submenu-item <?= ($activeSlug == 'staff') ? 'active' : '' ?>">Teaching Staff</a>
        <a href="manage_pages.php?slug=lms" class="submenu-item <?= ($activeSlug == 'lms') ? 'active' : '' ?>">LMS Portal</a>
        <a href="manage_pages.php?slug=convocation-2023-24" class="submenu-item <?= ($activeSlug == 'convocation-2023-24') ? 'active' : '' ?>">Convocation Medals 2023-24</a>
        <a href="manage_pages.php?slug=convocation-2024-25" class="submenu-item <?= ($activeSlug == 'convocation-2024-25') ? 'active' : '' ?>">Convocation Medals 2024-25</a>
      </div>

      <!-- 5. EXAMINATION (Dropdown) -->
      <?php
      $examSlugs = ['exam-notice','exam-timetable','result','verification-form','marksheet-form','name-correction-form','migration-hindi','migration-english','alumni-form','student-portal'];
      $isExamActive = in_array($activeSlug, $examSlugs);
      ?>
      <div id="btn-exam" class="menu-item menu-dropdown-toggle <?= $isExamActive ? 'active open' : '' ?>" onclick="toggleSubmenu('exam')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-file-pen"></i>
          <span>Examination</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-exam" class="menu-submenu <?= $isExamActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=exam-notice" class="submenu-item <?= ($activeSlug == 'exam-notice') ? 'active' : '' ?>">Examination Notice</a>
        <a href="manage_pages.php?slug=exam-timetable" class="submenu-item <?= ($activeSlug == 'exam-timetable') ? 'active' : '' ?>">Exam Time Table</a>
        <a href="manage_pages.php?slug=result" class="submenu-item <?= ($activeSlug == 'result') ? 'active' : '' ?>">Examination Results</a>
        <a href="manage_pages.php?slug=verification-form" class="submenu-item <?= ($activeSlug == 'verification-form') ? 'active' : '' ?>">Document Verification Form</a>
        <a href="manage_pages.php?slug=marksheet-form" class="submenu-item <?= ($activeSlug == 'marksheet-form') ? 'active' : '' ?>">Form for Duplicate/Corrected Marksheet</a>
        <a href="manage_pages.php?slug=name-correction-form" class="submenu-item <?= ($activeSlug == 'name-correction-form') ? 'active' : '' ?>">Form for Name Correction Marksheet</a>
        <a href="manage_pages.php?slug=migration-hindi" class="submenu-item <?= ($activeSlug == 'migration-hindi') ? 'active' : '' ?>">Degree Migration Form (Hindi)</a>
        <a href="manage_pages.php?slug=migration-english" class="submenu-item <?= ($activeSlug == 'migration-english') ? 'active' : '' ?>">Degree Migration Form (English)</a>
        <a href="manage_pages.php?slug=alumni-form" class="submenu-item <?= ($activeSlug == 'alumni-form') ? 'active' : '' ?>">Alumni Registration Form</a>
        <a href="manage_pages.php?slug=student-portal" class="submenu-item <?= ($activeSlug == 'student-portal') ? 'active' : '' ?>">Student Portal Login</a>
      </div>

      <!-- 6. R&D ACTIVITIES (Dropdown) -->
      <?php
      $rndSlugs = ['rnd-projects','rnd-glance','journals','rnd-presentation','rnd-formats','funding-agencies','publications','mou-list','patents','conferences','rnd-videos'];
      $isRndActive = in_array($activeSlug, $rndSlugs);
      ?>
      <div id="btn-rnd" class="menu-item menu-dropdown-toggle <?= $isRndActive ? 'active open' : '' ?>" onclick="toggleSubmenu('rnd')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-flask"></i>
          <span>R&amp;D Activities</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-rnd" class="menu-submenu <?= $isRndActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=rnd-projects" class="submenu-item <?= ($activeSlug == 'rnd-projects') ? 'active' : '' ?>">List of Projects</a>
        <a href="manage_pages.php?slug=rnd-glance" class="submenu-item <?= ($activeSlug == 'rnd-glance') ? 'active' : '' ?>">Projects At A Glance</a>
        <a href="manage_pages.php?slug=journals" class="submenu-item <?= ($activeSlug == 'journals') ? 'active' : '' ?>">Shodh Sangam Journals</a>
        <a href="manage_pages.php?slug=rnd-presentation" class="submenu-item <?= ($activeSlug == 'rnd-presentation') ? 'active' : '' ?>">Overview Presentation</a>
        <a href="manage_pages.php?slug=rnd-formats" class="submenu-item <?= ($activeSlug == 'rnd-formats') ? 'active' : '' ?>">R&amp;D Formats (Download)</a>
        <a href="manage_pages.php?slug=funding-agencies" class="submenu-item <?= ($activeSlug == 'funding-agencies') ? 'active' : '' ?>">Funding Agencies</a>
        <a href="manage_pages.php?slug=publications" class="submenu-item <?= ($activeSlug == 'publications') ? 'active' : '' ?>">List of Publications</a>
        <a href="manage_pages.php?slug=mou-list" class="submenu-item <?= ($activeSlug == 'mou-list') ? 'active' : '' ?>">List of MoU</a>
        <a href="manage_pages.php?slug=patents" class="submenu-item <?= ($activeSlug == 'patents') ? 'active' : '' ?>">University Patents</a>
        <a href="manage_pages.php?slug=conferences" class="submenu-item <?= ($activeSlug == 'conferences') ? 'active' : '' ?>">Industrial Visits &amp; Conferences</a>
        <a href="manage_pages.php?slug=rnd-videos" class="submenu-item <?= ($activeSlug == 'rnd-videos') ? 'active' : '' ?>">R&amp;D Videos</a>
      </div>

      <!-- 7. RESEARCH SECTION (Dropdown) -->
      <?php
      $resSlugs = ['phd-subjects','phd-admission','phd-syllabus','phd-students','phd-admissions-2026','supervisors','research-policy','consultancy-policy','institutional-distinctiveness','govt-projects','csir-projects','solar-carbon-report','incubation'];
      $isResActive = in_array($activeSlug, $resSlugs);
      ?>
      <div id="btn-research" class="menu-item menu-dropdown-toggle <?= $isResActive ? 'active open' : '' ?>" onclick="toggleSubmenu('research')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-microscope"></i>
          <span>Research Section</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-research" class="menu-submenu <?= $isResActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=phd-subjects" class="submenu-item <?= ($activeSlug == 'phd-subjects') ? 'active' : '' ?>">Subjects Offered (Ph.D)</a>
        <a href="manage_pages.php?slug=phd-admission" class="submenu-item <?= ($activeSlug == 'phd-admission') ? 'active' : '' ?>">Admission in Ph.D Programme</a>
        <a href="manage_pages.php?slug=phd-syllabus" class="submenu-item <?= ($activeSlug == 'phd-syllabus') ? 'active' : '' ?>">Course Work-Scheme &amp; Syllabus</a>
        <a href="manage_pages.php?slug=phd-students" class="submenu-item <?= ($activeSlug == 'phd-students') ? 'active' : '' ?>">Ph.D Students Directory</a>
        <a href="manage_pages.php?slug=phd-admissions-2026" class="submenu-item <?= ($activeSlug == 'phd-admissions-2026') ? 'active' : '' ?>">Ph.D Admissions 2026</a>
        <a href="manage_pages.php?slug=supervisors" class="submenu-item <?= ($activeSlug == 'supervisors') ? 'active' : '' ?>">List of Supervisors</a>
        <a href="manage_pages.php?slug=research-policy" class="submenu-item <?= ($activeSlug == 'research-policy') ? 'active' : '' ?>">Research Policy of University</a>
        <a href="manage_pages.php?slug=consultancy-policy" class="submenu-item <?= ($activeSlug == 'consultancy-policy') ? 'active' : '' ?>">Consultancy Policy of University</a>
        <a href="manage_pages.php?slug=institutional-distinctiveness" class="submenu-item <?= ($activeSlug == 'institutional-distinctiveness') ? 'active' : '' ?>">Institutional Distinctiveness</a>
        <a href="manage_pages.php?slug=govt-projects" class="submenu-item <?= ($activeSlug == 'govt-projects') ? 'active' : '' ?>">Projects of Govt of India</a>
        <a href="manage_pages.php?slug=csir-projects" class="submenu-item <?= ($activeSlug == 'csir-projects') ? 'active' : '' ?>">CSIR Projects at RKDF</a>
        <a href="manage_pages.php?slug=solar-carbon-report" class="submenu-item <?= ($activeSlug == 'solar-carbon-report') ? 'active' : '' ?>">Solar Carbon Capture Plant Report</a>
        <a href="manage_pages.php?slug=incubation" class="submenu-item <?= ($activeSlug == 'incubation') ? 'active' : '' ?>">Incubation Centre</a>
      </div>

      <!-- 8. ADMISSIONS (Dropdown) -->
      <?php
      $admSlugs = ['admission-notice','admission-rules','cuet-mapping','prospectus','international-admissions','academic-departments','bank-details','fee-structure','campus-facility','scholarship','pay-paytm','inhouse-scheme','meritorious-scheme','admission-apply'];
      $isAdmActive = in_array($activeSlug, $admSlugs);
      ?>
      <div id="btn-admissions" class="menu-item menu-dropdown-toggle <?= $isAdmActive ? 'active open' : '' ?>" onclick="toggleSubmenu('admissions')">
        <span style="display:flex;align-items:center;gap:12px;">
          <i class="fa-solid fa-user-plus"></i>
          <span>Admissions</span>
        </span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </div>
      <div id="sub-admissions" class="menu-submenu <?= $isAdmActive ? 'open' : '' ?>">
        <a href="manage_pages.php?slug=admission-notice" class="submenu-item <?= ($activeSlug == 'admission-notice') ? 'active' : '' ?>">Admission Notice, Courses &amp; Last Date</a>
        <a href="manage_pages.php?slug=admission-rules" class="submenu-item <?= ($activeSlug == 'admission-rules') ? 'active' : '' ?>">Admission Rules 2026-27</a>
        <a href="manage_pages.php?slug=cuet-mapping" class="submenu-item <?= ($activeSlug == 'cuet-mapping') ? 'active' : '' ?>">Mapping list for CUET(UG)</a>
        <a href="manage_pages.php?slug=prospectus" class="submenu-item <?= ($activeSlug == 'prospectus') ? 'active' : '' ?>">University Prospectus</a>
        <a href="manage_pages.php?slug=international-admissions" class="submenu-item <?= ($activeSlug == 'international-admissions') ? 'active' : '' ?>">For International Admissions</a>
        <a href="manage_pages.php?slug=academic-departments" class="submenu-item <?= ($activeSlug == 'academic-departments') ? 'active' : '' ?>">Faculties and Departments</a>
        <a href="manage_pages.php?slug=bank-details" class="submenu-item <?= ($activeSlug == 'bank-details') ? 'active' : '' ?>">University Bank Account Details</a>
        <a href="manage_pages.php?slug=fee-structure" class="submenu-item <?= ($activeSlug == 'fee-structure') ? 'active' : '' ?>">Fees Structure</a>
        <a href="manage_pages.php?slug=campus-facility" class="submenu-item <?= ($activeSlug == 'campus-facility') ? 'active' : '' ?>">Campus Facility</a>
        <a href="manage_pages.php?slug=scholarship" class="submenu-item <?= ($activeSlug == 'scholarship') ? 'active' : '' ?>">Scholarships</a>
        <a href="manage_pages.php?slug=pay-paytm" class="submenu-item <?= ($activeSlug == 'pay-paytm') ? 'active' : '' ?>">Pay Fees Through Paytm</a>
        <a href="manage_pages.php?slug=inhouse-scheme" class="submenu-item <?= ($activeSlug == 'inhouse-scheme') ? 'active' : '' ?>">Inhouse Scheme Policy</a>
        <a href="manage_pages.php?slug=meritorious-scheme" class="submenu-item <?= ($activeSlug == 'meritorious-scheme') ? 'active' : '' ?>">Meritorious Scheme Policy</a>
        <a href="manage_pages.php?slug=admission-apply" class="submenu-item <?= ($activeSlug == 'admission-apply') ? 'active' : '' ?>">Online Admission Application →</a>
      </div>

      <!-- 9. Global Site Settings (LAST ITEM under CMS Content) -->
      <a href="manage_settings.php" class="menu-item <?= ($currentPage == 'manage_settings.php') ? 'active' : '' ?>" style="margin-top: 8px;">
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
