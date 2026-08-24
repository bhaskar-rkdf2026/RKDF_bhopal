<?php
// ============================================================
// RKDF University — Modern Navbar Component
// Complete Navigation Titles, Submenus, Accordion Mobile Drawer & Redirections
// ============================================================
require_once __DIR__ . '/site_settings.php';
require_once __DIR__ . '/../config/db.php';

$siteTitle          = get_site_setting('site_title', 'RKDF University');
$siteTagline        = get_site_setting('site_tagline', 'Bhopal · Since 2011');
$admissionYear      = get_site_setting('admission_year', '2026-27');
$admissionPolicyPdf = get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf');
$prospectusPdf     = get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf');
$feePdf             = get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf');
$erpPortalUrl       = get_site_setting('erp_portal_url', 'https://erplive.rkdf.ac.in');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="css/rkdf-navbar.css" />

<!-- ══════════════════════════════════════════════════════════ -->
<!--  RKDF STICKY NAVBAR                                         -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="rkdf-navbar-wrap">

<!-- ── UTILITY HEADER STRIP (TOP OF HEADER) ── -->
<div class="rkdf-top-utility-bar">
  <div class="rkdf-utility-inner">
    <div class="rkdf-utility-left">
      <a href="https://vps.rkdfu.org:2096/" target="_blank" rel="noopener noreferrer" class="rkdf-util-link highlight-mail" title="WebMail Access Portal">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        WebMail Login ↗
      </a>
      <span class="rkdf-util-divider">|</span>
      <span class="rkdf-util-org">RAM KRISHNA DHARMARTH FOUNDATION (RKDF)</span>
    </div>

    <div class="rkdf-utility-right">
      <a href="imggallery.php" class="rkdf-util-link">Photo Gallery</a>
      <a href="alumni.php" class="rkdf-util-link">Alumni</a>
      <a href="t&amp;p.php" class="rkdf-util-link">T&amp;P Cell</a>
      <a href="Careers.php" class="rkdf-util-link">Careers</a>
      <a href="Announcements.php?cat=tender" class="rkdf-util-link highlight-tender">⚡ E-Tenders</a>
    </div>
  </div>
</div>

<nav class="rkdf-nav-bar" id="rkdfNavBar" role="navigation" aria-label="Main navigation">
  <div class="rkdf-nav-inner">

    <!-- ── BRAND LOGO + CREST + TYPOGRAPHY ── -->
    <a href="index.php" class="rkdf-brand" title="<?= htmlspecialchars($siteTitle) ?> — Home">
      <div class="rkdf-badge-box">
        <img src="images/lovable/rkdf-logo.png" alt="RKDF University Crest Logo" width="40" height="44" class="rkdf-badge-img" style="height:44px;max-height:44px;width:auto;max-width:40px;object-fit:contain;display:block;" onError="this.src='images/rkdflogo.JPG';">
      </div>

      <div class="rkdf-brand-info">
        <div class="rkdf-brand-name"><?= htmlspecialchars($siteTitle) ?></div>
        <div class="rkdf-brand-loc"><?= htmlspecialchars($siteTagline) ?></div>
      </div>
    </a>

    <!-- ── CENTER NAV LINKS & DROPDOWNS ── -->
    <ul class="rkdf-nav-list" id="rkdfNavList" role="menubar">

      <!-- ABOUT US -->
      <li class="rkdf-nav-item" role="none">
        <a href="about.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          About Us 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:540px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">About &amp; Leadership</span>
            <a href="about.php" class="rkdf-drop-link" role="menuitem">About Us Overview</a>
            <a href="Vision&amp;mission.php" class="rkdf-drop-link" role="menuitem">Vision &amp; Mission</a>
            <a href="Objectives.php" class="rkdf-drop-link" role="menuitem">Objectives</a>
            <a href="idp.php" class="rkdf-drop-link" role="menuitem">Institutional Development Plan</a>
            <a href="org-structure.php" class="rkdf-drop-link" role="menuitem">Organizational Structure</a>
            <a href="Chancellor.php" class="rkdf-drop-link" role="menuitem">Chancellor's Desk</a>
            <a href="ProChancellor.php" class="rkdf-drop-link" role="menuitem">Pro-Chancellor</a>
            <a href="Vice-Chancellor-Desk.php" class="rkdf-drop-link" role="menuitem">Vice Chancellor's Desk</a>
            <a href="dgm.php" class="rkdf-drop-link" role="menuitem">DGM Profile</a>
            <a href="dgr.php" class="rkdf-drop-link" role="menuitem">DGR Profile</a>
            <a href="Registrar.php" class="rkdf-drop-link" role="menuitem">Registrar Profile</a>
            <a href="other-officers.php" class="rkdf-drop-link" role="menuitem">Other Officers</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Academic &amp; Governance Bodies</span>
            <a href="dean.php" class="rkdf-drop-link" role="menuitem">Dean's Profile</a>
            <a href="hod.php" class="rkdf-drop-link" role="menuitem">Institute Head / HOD's</a>
            <a href="Governingbody.php" class="rkdf-drop-link" role="menuitem">Governing Body</a>
            <a href="BoM.php" class="rkdf-drop-link" role="menuitem">Board of Management</a>
            <a href="Academic_Council.php" class="rkdf-drop-link" role="menuitem">Academic Council</a>
            <a href="BOS.php" class="rkdf-drop-link" role="menuitem">Board of Studies</a>
            <a href="Statuary-Bodies.php" class="rkdf-drop-link" role="menuitem">National Core Advisory Group</a>
            <a href="localadvisory.php" class="rkdf-drop-link" role="menuitem">Local Core Advisory Group</a>
            <a href="public-disclosure.php" class="rkdf-drop-link" role="menuitem">Public Self Disclosure</a>
            <a href="imggallery.php" class="rkdf-drop-link" role="menuitem">Photo Gallery</a>
          </div>
        </div>
      </li>

      <!-- ACADEMIC -->
      <li class="rkdf-nav-item" role="none">
        <a href="academic&amp;departments.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Academic 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:600px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Faculties &amp; Departments</span>
            <a href="Management.php" class="rkdf-drop-link" role="menuitem">Management</a>
            <a href="Science.php" class="rkdf-drop-link" role="menuitem">Science</a>
            <a href="Commerce.php" class="rkdf-drop-link" role="menuitem">Commerce</a>
            <a href="Engineering.php" class="rkdf-drop-link" role="menuitem">Engineering &amp; Technology</a>
            <a href="pharmacy.php" class="rkdf-drop-link" role="menuitem">Pharmacy</a>
            <a href="Computer-Application.php" class="rkdf-drop-link" role="menuitem">Computer Application</a>
            <a href="Education.php" class="rkdf-drop-link" role="menuitem">Education</a>
            <a href="Social-Science.php" class="rkdf-drop-link" role="menuitem">Social Science</a>
            <a href="Agriculture.php" class="rkdf-drop-link" role="menuitem">Agriculture</a>
            <a href="architect.php" class="rkdf-drop-link" role="menuitem">Architecture</a>
            <a href="Law.php" class="rkdf-drop-link" role="menuitem">Law</a>
            <a href="BHMS.php" class="rkdf-drop-link" role="menuitem">Homeopathy (BHMS)</a>
            <a href="BAMS.php" class="rkdf-drop-link" role="menuitem">Ayurveda (BAMS)</a>
            <a href="nursing.php" class="rkdf-drop-link" role="menuitem">Nursing</a>
            <a href="paramdical.php" class="rkdf-drop-link" role="menuitem">Paramedical</a>
            <a href="Library.php" class="rkdf-drop-link" role="menuitem">Library &amp; Info Sciences</a>
            <a href="Constituent Units.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Constituent Units ↗</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Academic Resources &amp; Notices</span>
            <a href="University_Fees_Structure.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Fees Structure ↗</a>
            <a href="Fees Notice.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Notice For Fees Submission ↗</a>
            <a href="Syllabus.php" class="rkdf-drop-link" role="menuitem">Syllabus Directory</a>
            <a href="E_Resource.php" class="rkdf-drop-link" role="menuitem">E-Resources</a>
            <a href="syllabus_Value-added.php" class="rkdf-drop-link" role="menuitem">Value-Added Courses</a>
            <a href="acadmiccalander.php" class="rkdf-drop-link" role="menuitem">Academic Calendar</a>
            <a href="international-relation.php" class="rkdf-drop-link" role="menuitem">Collaborations</a>
            <a href="Feedback_Analysis.php" class="rkdf-drop-link" role="menuitem">Feedback Analysis</a>
            <a href="skill.php" class="rkdf-drop-link" role="menuitem">Skills Enhancement</a>
            <a href="Annual_Report_University.php" class="rkdf-drop-link" role="menuitem">University Annual Report</a>
            <a href="staffLnew.php" class="rkdf-drop-link" role="menuitem">Teaching Staff</a>
            <a href="LMS.php" class="rkdf-drop-link" role="menuitem">LMS Portal</a>
            <span class="rkdf-drop-head" style="margin-top:10px;">Convocations</span>
            <a href="Convocation.php" class="rkdf-drop-link" role="menuitem">Convocation Portal</a>
            <a href="Content/Documents/Convocation_2026/List of Gold Medal and Silver Medal Academic Session 2023-24.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Convocation Medals 2023-24 ↗</a>
            <a href="Content/Documents/Convocation_2026/List of Gold Medal and Silver Medal Academic Session 2024-25.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Convocation Medals 2024-25 ↗</a>
          </div>
        </div>
      </li>

      <!-- EXAMINATION -->
      <li class="rkdf-nav-item" role="none">
        <a href="Exam_Notice.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Examination 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:290px;">
          <span class="rkdf-drop-head">Examination &amp; Student Forms</span>
          <a href="Exam_Notice.php" class="rkdf-drop-link" role="menuitem">Examination Notice</a>
          <a href="examtimetable.php" class="rkdf-drop-link" role="menuitem">Exam Time Table</a>
          <a href="Result.php" class="rkdf-drop-link" role="menuitem">Examination Results</a>
          <a href="Verification_Form.php" class="rkdf-drop-link" role="menuitem">Document Verification Form</a>
          <a href="Marksheet_Form.php" class="rkdf-drop-link" role="menuitem">Form for Duplicate/Corrected Marksheet</a>
          <a href="Name_Correction_Form.php" class="rkdf-drop-link" role="menuitem">Form for Name Correction Marksheet</a>
          <a href="Migration_Hindi.php" class="rkdf-drop-link" role="menuitem">Degree Migration Form (Hindi)</a>
          <a href="Migration_English.php" class="rkdf-drop-link" role="menuitem">Degree Migration Form (English)</a>
          <a href="Alumni_Form.php" class="rkdf-drop-link" role="menuitem">Alumni Registration Form</a>
          <a href="Student_Portal.php" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-red);font-weight:600;">Student Portal Gateway →</a>
        </div>
      </li>

      <!-- R&D ACTIVITIES -->
      <li class="rkdf-nav-item" role="none">
        <a href="RnD_Projects.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          R&amp;D Activities 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:280px;">
          <span class="rkdf-drop-head">Research &amp; Innovation</span>
          <a href="RnD_Projects.php" class="rkdf-drop-link" role="menuitem">List of Projects</a>
          <a href="RnD_Projects.php#glance" class="rkdf-drop-link" role="menuitem">Projects At A Glance</a>
          <a href="journals.php" class="rkdf-drop-link" role="menuitem">Shodh Sangam Journals</a>
          <a href="RnD_Projects.php#formats" class="rkdf-drop-link" role="menuitem">R&amp;D Formats (Download)</a>
          <a href="patent.php" class="rkdf-drop-link" role="menuitem">University Patents</a>
          <a href="Confrence-Seminar.php" class="rkdf-drop-link" role="menuitem">Conferences &amp; Seminars</a>
          <a href="videogallery.php" class="rkdf-drop-link" role="menuitem">R&amp;D Videos</a>
        </div>
      </li>

      <!-- RESEARCH SECTION -->
      <li class="rkdf-nav-item" role="none">
        <a href="phdsubjects.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Research Section 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:300px;">
          <span class="rkdf-drop-head">Doctor of Philosophy (Ph.D)</span>
          <a href="phdsubjects.php" class="rkdf-drop-link" role="menuitem">Subjects Offered (Ph.D)</a>
          <a href="phd_entrance.php" class="rkdf-drop-link" role="menuitem">Admission in Ph.D Programme</a>
          <a href="phdsyllabus.php" class="rkdf-drop-link" role="menuitem">Course Work-Scheme &amp; Syllabus</a>
          <a href="phdstudent.php" class="rkdf-drop-link" role="menuitem">Ph.D Students Directory</a>
          <a href="phd_entrance.php" class="rkdf-drop-link" role="menuitem">Ph.D Admissions 2026</a>
          <a href="supervisors01.php" class="rkdf-drop-link" role="menuitem">List of Supervisors</a>
          <span class="rkdf-drop-head" style="margin-top:10px;">Policies &amp; Projects</span>
          <a href="policies.php" class="rkdf-drop-link" role="menuitem">Research Policy of University</a>
          <a href="policies.php" class="rkdf-drop-link" role="menuitem">Consultancy Policy of University</a>
          <a href="RnD_Projects.php" class="rkdf-drop-link" role="menuitem">Projects of Govt of India</a>
          <a href="RnD_Projects.php" class="rkdf-drop-link" role="menuitem">CSIR Projects at RKDF</a>
          <a href="r&amp;d.php" class="rkdf-drop-link" role="menuitem">Incubation Centre</a>
        </div>
      </li>

      <!-- ADMISSIONS -->
      <li class="rkdf-nav-item" role="none">
        <a href="admissionform.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Admissions 
          <svg class="rkdf-chev-svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:300px;">
          <span class="rkdf-drop-head">Admissions <?= htmlspecialchars($admissionYear) ?></span>
          <a href="admission.php" class="rkdf-drop-link" role="menuitem">Admission Notice, Courses &amp; Last Date</a>
          <a href="ADMISSION POLICY 2026-27.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Admission Rules <?= htmlspecialchars($admissionYear) ?> ↗</a>
          <a href="prospectus.php" class="rkdf-drop-link" role="menuitem">University Prospectus</a>
          <a href="foreign_stud/index.html" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">International Admissions ↗</a>
          <a href="academic&amp;departments.php" class="rkdf-drop-link" role="menuitem">Faculties and Departments</a>
          <a href="Bank-And-ATM.php" class="rkdf-drop-link" role="menuitem">University Bank Account Details</a>
          <a href="University_Fees_Structure.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Fees Structure ↗</a>
          <a href="Campus.php" class="rkdf-drop-link" role="menuitem">Campus Facility</a>
          <a href="scholarship.php" class="rkdf-drop-link" role="menuitem">Scholarships</a>
          <a href="admissionform.php" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-red);font-weight:600;">Online Admission Application →</a>
        </div>
      </li>

    </ul>

    <!-- ── RIGHT ACTIONS: SEARCH + STUDENT LOGIN + RED APPLY NOW ── -->
    <div class="rkdf-nav-right">
      <!-- Interactive Search Trigger Button -->
      <button type="button" class="rkdf-search-btn" id="rkdfSearchBtn" aria-label="Toggle Search" title="Click to open search">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.3-4.3"></path>
        </svg>
      </button>

      <!-- Student Login Button -->
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" rel="noopener noreferrer" class="rkdf-login-btn">
        Student Login
      </a>

      <!-- Solid Red APPLY NOW Button -->
      <a href="admissionform.php" class="rkdf-apply-red-btn">
        <span>APPLY NOW</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right rkdf-arrow-svg">
          <path d="M7 7h10v10"></path>
          <path d="M7 17 17 7"></path>
        </svg>
      </a>

      <!-- Mobile Menu Toggle Button -->
      <button class="rkdf-burger" id="rkdfBurger" aria-label="Toggle Menu" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
          <line x1="4" x2="20" y1="12" y2="12"></line>
          <line x1="4" x2="20" y1="6" y2="6"></line>
          <line x1="4" x2="20" y1="18" y2="18"></line>
        </svg>
      </button>
    </div>

  </div><!-- /rkdf-nav-inner -->

  <!-- Expandable Active Search Overlay Bar -->
  <div class="rkdf-search-overlay" id="rkdfSearchOverlay">
    <div class="rkdf-search-box">
      <form action="search.php" method="GET" class="rkdf-search-form" id="rkdfSearchForm">
        <input type="text" name="q" id="rkdfSearchInput" placeholder="Search programs, admissions, results, syllabus, research..." autocomplete="off">
        <button type="submit" class="rkdf-search-submit">Search ↵</button>
        <button type="button" class="rkdf-search-close" id="rkdfSearchClose" aria-label="Close search">✕</button>
      </form>
      
      <!-- Live Typeahead Results Container -->
      <div class="rkdf-live-search-results" id="rkdfLiveSearchResults" style="display:none;"></div>

      <div class="rkdf-search-tags">
        <span>Popular:</span>
        <a href="search.php?q=Engineering">B.Tech / Engineering</a>
        <a href="search.php?q=Pharmacy">Pharmacy</a>
        <a href="search.php?q=Management">MBA / BBA</a>
        <a href="search.php?q=Agriculture">Agriculture</a>
        <a href="search.php?q=BAMS">BAMS / AYUSH</a>
        <a href="search.php?q=Result">Exam Results</a>
        <a href="admissionform.php">Apply Online 2026</a>
      </div>
    </div>
  </div>

</nav><!-- /rkdf-nav-bar -->

<!-- Mobile Navigation Accordion Drawer -->
<div class="rkdf-mobile-drawer" id="rkdfMobileDrawer">
  <div class="rkdf-mobile-accordion">
    
    <!-- Category 1: About Us -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>About Us</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="about.php" class="rkdf-mob-sublink">About Us Overview</a>
        <a href="Vision&amp;mission.php" class="rkdf-mob-sublink">Vision &amp; Mission</a>
        <a href="Objectives.php" class="rkdf-mob-sublink">Objectives</a>
        <a href="idp.php" class="rkdf-mob-sublink">Institutional Development Plan</a>
        <a href="org-structure.php" class="rkdf-mob-sublink">Organizational Structure</a>
        <a href="Chancellor.php" class="rkdf-mob-sublink">Chancellor's Desk</a>
        <a href="ProChancellor.php" class="rkdf-mob-sublink">Pro-Chancellor</a>
        <a href="Vice-Chancellor-Desk.php" class="rkdf-mob-sublink">Vice Chancellor's Desk</a>
        <a href="Registrar.php" class="rkdf-mob-sublink">Registrar Profile</a>
        <a href="dean.php" class="rkdf-mob-sublink">Faculty Deans</a>
        <a href="hod.php" class="rkdf-mob-sublink">Institute Heads &amp; HODs</a>
        <a href="Governingbody.php" class="rkdf-mob-sublink">Governing Body</a>
        <a href="BoM.php" class="rkdf-mob-sublink">Board of Management</a>
        <a href="Academic_Council.php" class="rkdf-mob-sublink">Academic Council</a>
        <a href="BOS.php" class="rkdf-mob-sublink">Board of Studies</a>
        <a href="public-disclosure.php" class="rkdf-mob-sublink">Public Disclosures</a>
      </div>
    </div>

    <!-- Category 2: Academic -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Academic</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="academic&amp;departments.php" class="rkdf-mob-sublink">All Faculties &amp; Departments</a>
        <a href="Engineering.php" class="rkdf-mob-sublink">Engineering &amp; Technology</a>
        <a href="pharmacy.php" class="rkdf-mob-sublink">Pharmacy</a>
        <a href="Management.php" class="rkdf-mob-sublink">Management</a>
        <a href="Computer-Application.php" class="rkdf-mob-sublink">Computer Application</a>
        <a href="Agriculture.php" class="rkdf-mob-sublink">Agriculture</a>
        <a href="Law.php" class="rkdf-mob-sublink">Law</a>
        <a href="BHMS.php" class="rkdf-mob-sublink">Homeopathy (BHMS)</a>
        <a href="BAMS.php" class="rkdf-mob-sublink">Ayurveda (BAMS)</a>
        <a href="Syllabus.php" class="rkdf-mob-sublink">Syllabus Directory</a>
        <a href="acadmiccalander.php" class="rkdf-mob-sublink">Academic Calendar</a>
        <a href="LMS.php" class="rkdf-mob-sublink">LMS E-Learning Portal</a>
        <a href="Convocation.php" class="rkdf-mob-sublink">Convocations</a>
      </div>
    </div>

    <!-- Category 3: Examination -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Examination</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="Exam_Notice.php" class="rkdf-mob-sublink">Examination Notices</a>
        <a href="examtimetable.php" class="rkdf-mob-sublink">Exam Time Table</a>
        <a href="Result.php" class="rkdf-mob-sublink">Declared Results</a>
        <a href="Verification_Form.php" class="rkdf-mob-sublink">Degree Verification Form</a>
        <a href="Marksheet_Form.php" class="rkdf-mob-sublink">Duplicate Marksheet Form</a>
        <a href="Name_Correction_Form.php" class="rkdf-mob-sublink">Name Correction Form</a>
        <a href="Migration_Hindi.php" class="rkdf-mob-sublink">Migration Form (Hindi)</a>
        <a href="Migration_English.php" class="rkdf-mob-sublink">Migration Form (English)</a>
        <a href="Student_Portal.php" class="rkdf-mob-sublink" style="color:var(--nav-red);font-weight:700;">Student Portal Login →</a>
      </div>
    </div>

    <!-- Category 4: R&D and Research -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Research &amp; Innovation</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="RnD_Projects.php" class="rkdf-mob-sublink">R&amp;D Projects</a>
        <a href="journals.php" class="rkdf-mob-sublink">Shodh Sangam Journals</a>
        <a href="patent.php" class="rkdf-mob-sublink">University Patents</a>
        <a href="phdsubjects.php" class="rkdf-mob-sublink">Ph.D Offered Subjects</a>
        <a href="phd_entrance.php" class="rkdf-mob-sublink">Ph.D Entrance Exam</a>
        <a href="phdsyllabus.php" class="rkdf-mob-sublink">Ph.D Syllabus</a>
        <a href="phdstudent.php" class="rkdf-mob-sublink">Ph.D Students Directory</a>
        <a href="supervisors01.php" class="rkdf-mob-sublink">Research Supervisors</a>
      </div>
    </div>

    <!-- Direct Quick Links -->
    <div class="rkdf-mob-quick-links">
      <a href="admissionform.php" class="rkdf-mobile-link rkdf-mob-apply-btn">Apply Online (Admissions) →</a>
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" rel="noopener noreferrer" class="rkdf-mobile-link rkdf-mob-login-btn">Student ERP Login ↗</a>
      <a href="https://vps.rkdfu.org:2096/" target="_blank" rel="noopener noreferrer" class="rkdf-mobile-link">WebMail Portal ↗</a>
      <a href="alumni.php" class="rkdf-mobile-link">Alumni Network</a>
      <a href="Careers.php" class="rkdf-mobile-link">Careers &amp; Openings</a>
      <a href="contact-us.php" class="rkdf-mobile-link">Contact &amp; Location</a>
    </div>

  </div>
</div>
</div><!-- /rkdf-navbar-wrap -->

<!-- Dynamic Scroll Handler & Mobile/Search Toggle Script -->
<script>
(function() {
  const navBar = document.getElementById('rkdfNavBar');
  const burger = document.getElementById('rkdfBurger');
  const drawer = document.getElementById('rkdfMobileDrawer');
  const searchBtn = document.getElementById('rkdfSearchBtn');
  const searchOverlay = document.getElementById('rkdfSearchOverlay');
  const searchClose = document.getElementById('rkdfSearchClose');
  const searchInput = document.getElementById('rkdfSearchInput');

  function updateNavScroll() {
    if (window.scrollY > 20) {
      navBar.classList.add('scrolled');
    } else {
      navBar.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', updateNavScroll, { passive: true });
  updateNavScroll();

  // Burger drawer toggle
  if (burger && drawer) {
    burger.addEventListener('click', function() {
      const isOpen = drawer.classList.toggle('active');
      burger.setAttribute('aria-expanded', isOpen);
    });
  }

  // Mobile Accordion functionality
  const accBtns = document.querySelectorAll('.rkdf-mob-acc-btn');
  accBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      const item = this.parentElement;
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.rkdf-mob-acc-item').forEach(function(el) { el.classList.remove('open'); });
      if (!isOpen) {
        item.classList.add('open');
      }
    });
  });

  // Search overlay & auto focus
  const liveResultsBox = document.getElementById('rkdfLiveSearchResults');
  let searchDebounceTimer = null;

  if (searchBtn && searchOverlay) {
    searchBtn.addEventListener('click', function(e) {
      e.preventDefault();
      const isActive = searchOverlay.classList.toggle('active');
      if (isActive && searchInput) {
        setTimeout(function() { searchInput.focus(); }, 120);
      }
    });
  }

  if (searchClose && searchOverlay) {
    searchClose.addEventListener('click', function() {
      searchOverlay.classList.remove('active');
      if (liveResultsBox) liveResultsBox.style.display = 'none';
    });
  }

  // Real-time Live Typeahead Search
  if (searchInput && liveResultsBox) {
    searchInput.addEventListener('input', function() {
      const q = this.value.trim();
      clearTimeout(searchDebounceTimer);

      if (q.length < 2) {
        liveResultsBox.innerHTML = '';
        liveResultsBox.style.display = 'none';
        return;
      }

      searchDebounceTimer = setTimeout(function() {
        fetch('api_search.php?q=' + encodeURIComponent(q))
          .then(function(res) { return res.json(); })
          .then(function(data) {
            if (data && data.results && data.results.length > 0) {
              let html = '';
              data.results.forEach(function(item) {
                html += '<a href="' + item.url + '" class="rkdf-live-item">' +
                  '<div class="rkdf-live-title">' +
                    '<span class="rkdf-live-badge">' + item.badge + '</span>' +
                    '<span>' + item.title + '</span>' +
                  '</div>' +
                  '<span class="rkdf-live-cat">' + item.category + ' ↗</span>' +
                '</a>';
              });
              html += '<a href="search.php?q=' + encodeURIComponent(q) + '" class="rkdf-live-view-all">View all ' + data.count + ' search results for "' + q + '" ↵</a>';
              liveResultsBox.innerHTML = html;
              liveResultsBox.style.display = 'block';
            } else {
              liveResultsBox.innerHTML = '<div style="padding:16px;text-align:center;color:#64748b;font-size:14px;">No quick matches found. Press <strong style="color:#0c1424;">Enter</strong> to search full directory.</div>';
              liveResultsBox.style.display = 'block';
            }
          })
          .catch(function() {
            liveResultsBox.style.display = 'none';
          });
      }, 150);
    });
  }

  // Keyboard navigation trap & ESC to close
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      if (searchOverlay && searchOverlay.classList.contains('active')) {
        searchOverlay.classList.remove('active');
        if (liveResultsBox) liveResultsBox.style.display = 'none';
      }
      if (drawer && drawer.classList.contains('active')) {
        drawer.classList.remove('active');
        if (burger) burger.setAttribute('aria-expanded', 'false');
      }
    }
  });
})();
</script>
