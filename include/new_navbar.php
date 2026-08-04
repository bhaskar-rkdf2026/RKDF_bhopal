<?php
// ============================================================
// RKDF University — Approved Navbar (Exact Prototype Match)
// Matches user design: Logo + 7 Nav items + Search + Student Login + Red APPLY NOW ↗
// ============================================================
require_once __DIR__ . '/site_settings.php';
require_once __DIR__ . '/../config/db.php';

$siteTitle = get_site_setting('site_title', 'RKDF University');
$siteTagline = get_site_setting('site_tagline', 'BHOPAL · SINCE 2011');
$admissionYear = get_site_setting('admission_year', '2026-27');
$admissionPolicyPdf = get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf');
$prospectusPdf = get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf');
$feePdf = get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf');
$erpPortalUrl = get_site_setting('erp_portal_url', 'https://erplive.rkdf.ac.in');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="css/rkdf-navbar.css" />

<!-- ══════════════════════════════════════════════════════════ -->
<!--  RKDF STICKY NAVBAR (Prototype Exact Match)                -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="rkdf-navbar-wrap">
<nav class="rkdf-nav-bar" id="rkdfNavBar" role="navigation" aria-label="Main navigation">
  <div class="rkdf-nav-inner">

    <!-- ── LEFT: Shield Logo + Brand Name ── -->
    <a href="index.php" class="rkdf-brand" title="<?= htmlspecialchars($siteTitle) ?> — Home">
      <svg class="rkdf-badge" viewBox="0 0 90 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M45 2L4 18V50C4 76 45 98 45 98C45 98 86 76 86 50V18L45 2Z" fill="#C9192A"/>
        <path d="M45 9L11 23V50C11 72 45 91 45 91C45 91 79 72 79 50V23L45 9Z" fill="#A8101F"/>
        <circle cx="45" cy="38" r="18" fill="#F5F5F5"/>
        <rect x="37" y="30" width="16" height="12" rx="1.5" fill="#C9192A"/>
        <line x1="45" y1="30" x2="45" y2="42" stroke="white" stroke-width="1.5"/>
        <line x1="37" y1="36" x2="53" y2="36" stroke="white" stroke-width="1"/>
        <rect x="29" y="62" width="32" height="3.5" rx="1" fill="rgba(255,255,255,0.80)"/>
        <rect x="32" y="70" width="26" height="3" rx="1" fill="rgba(255,255,255,0.55)"/>
        <rect x="36" y="77" width="18" height="2.5" rx="1" fill="rgba(255,255,255,0.35)"/>
      </svg>

      <div class="rkdf-brand-info">
        <span class="rkdf-brand-name"><?= htmlspecialchars($siteTitle) ?></span>
        <span class="rkdf-brand-loc"><?= htmlspecialchars($siteTagline) ?></span>
      </div>
    </a>

    <!-- ── CENTER: Main Nav Links (Admissions, Academics, Research, Campus Life, Placements, About, News) ── -->
    <ul class="rkdf-nav-list" id="rkdfNavList" role="menubar">

      <!-- ADMISSIONS -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Admissions <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <span class="rkdf-drop-head"><?= htmlspecialchars($admissionYear) ?></span>
          <a href="<?= htmlspecialchars($admissionPolicyPdf) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">Admission Policy <?= htmlspecialchars($admissionYear) ?></a>
          <a href="<?= htmlspecialchars($prospectusPdf) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">University Prospectus</a>
          <a href="<?= htmlspecialchars($feePdf) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">Fee Structure</a>
          <a href="scholarship.php" class="rkdf-drop-link" role="menuitem">Scholarships</a>
          <a href="admissionform.php" class="rkdf-drop-link" role="menuitem">Application Form</a>
        </div>
      </li>

      <!-- ACADEMICS -->
      <li class="rkdf-nav-item" role="none">
        <a href="academic&departments.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Academics <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Faculties &amp; Schools</span>
            <a href="Engineering.php" class="rkdf-drop-link" role="menuitem">Engineering &amp; Technology</a>
            <a href="Management.php" class="rkdf-drop-link" role="menuitem">Management Studies</a>
            <a href="pharmacy.php" class="rkdf-drop-link" role="menuitem">Pharmacy</a>
            <a href="Science.php" class="rkdf-drop-link" role="menuitem">Basic &amp; Applied Sciences</a>
            <a href="Agriculture.php" class="rkdf-drop-link" role="menuitem">Agriculture</a>
            <a href="nursing.php" class="rkdf-drop-link" role="menuitem">Nursing &amp; Paramedical</a>
            <a href="Law.php" class="rkdf-drop-link" role="menuitem">Law</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Academic Resources</span>
            <a href="Syllabus.php" class="rkdf-drop-link" role="menuitem">Academic Syllabi</a>
            <a href="acadmiccalander.php" class="rkdf-drop-link" role="menuitem">Academic Calendar</a>
            <a href="Library.php" class="rkdf-drop-link" role="menuitem">Central Library</a>
            <a href="phd.php" class="rkdf-drop-link" role="menuitem">Ph.D. Programs</a>
          </div>
        </div>
      </li>

      <!-- RESEARCH -->
      <li class="rkdf-nav-item" role="none">
        <a href="r&d.php" class="rkdf-nav-link" role="menuitem">
          Research
        </a>
      </li>

      <!-- CAMPUS LIFE -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Campus Life <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <a href="Hostel.php" class="rkdf-drop-link" role="menuitem">Hostels (Boys &amp; Girls)</a>
          <a href="Laboratories.php" class="rkdf-drop-link" role="menuitem">Laboratories &amp; R&amp;D</a>
          <a href="Transport.php" class="rkdf-drop-link" role="menuitem">Transport Facilities</a>
          <a href="imggallery.php" class="rkdf-drop-link" role="menuitem">Photo Gallery</a>
        </div>
      </li>

      <!-- PLACEMENTS -->
      <li class="rkdf-nav-item" role="none">
        <a href="placements.php" class="rkdf-nav-link" role="menuitem">
          Placements
        </a>
      </li>

      <!-- ABOUT -->
      <li class="rkdf-nav-item" role="none">
        <a href="About_Us.pdf" target="_blank" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          About <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <a href="Chancellor.php" class="rkdf-drop-link" role="menuitem">Chancellor's Desk</a>
          <a href="Vice-Chancellor-Desk.php" class="rkdf-drop-link" role="menuitem">Vice Chancellor's Desk</a>
          <a href="Governingbody.php" class="rkdf-drop-link" role="menuitem">Governing Body</a>
          <a href="BoM.php" class="rkdf-drop-link" role="menuitem">Board of Management</a>
          <a href="Academic_Council.php" class="rkdf-drop-link" role="menuitem">Academic Council</a>
          <a href="BOS.php" class="rkdf-drop-link" role="menuitem">Board of Studies (BOS)</a>
          <a href="Vision&mission.php" class="rkdf-drop-link" role="menuitem">Vision &amp; Mission</a>
          <a href="Objectives.php" class="rkdf-drop-link" role="menuitem">University Objectives</a>
        </div>
      </li>

      <!-- NEWS -->
      <li class="rkdf-nav-item" role="none">
        <a href="Announcements.php" class="rkdf-nav-link" role="menuitem">
          News
        </a>
      </li>

    </ul>

    <!-- ── RIGHT: Search Icon + Student Login Outline + Red APPLY NOW ↗ ── -->
    <div class="rkdf-nav-right">
      <!-- Search Icon -->
      <a href="academic&departments.php" class="rkdf-search-btn" title="Search">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </a>

      <!-- Student Login Outline Box -->
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" class="rkdf-login-btn">
        Student Login
      </a>

      <!-- Red Solid APPLY NOW Button -->
      <a href="admissionform.php" class="rkdf-apply-red-btn">
        APPLY NOW ↗
      </a>

      <!-- Hamburger toggle (mobile) -->
      <button class="rkdf-burger" id="rkdfBurger" aria-label="Toggle Navigation Menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div><!-- /rkdf-nav-inner -->
</nav><!-- /rkdf-nav-bar -->
</div><!-- /rkdf-navbar-wrap -->
