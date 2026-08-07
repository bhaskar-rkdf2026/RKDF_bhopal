<?php
// ============================================================
// RKDF University — Modern Navbar Component
// Complete Navigation Titles, Submenus & Redirections
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
<nav class="rkdf-nav-bar" id="rkdfNavBar" role="navigation" aria-label="Main navigation">
  <div class="rkdf-nav-inner">

    <!-- ── BRAND LOGO + CREST + TYPOGRAPHY ── -->
    <a href="index.php" class="rkdf-brand" title="<?= htmlspecialchars($siteTitle) ?> — Home">
      <div class="rkdf-badge-box">
        <img src="images/lovable/rkdf-logo.png" alt="RKDF University Crest Logo" class="rkdf-badge-img" style="height:44px;max-height:44px;width:auto;max-width:40px;object-fit:contain;display:block;" onError="this.src='images/rkdflogo.JPG';">
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
          About Us <i class="rkdf-chev">▾</i>
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
            <a href="other-officers.php" class="rkdf-drop-link" role="menuitem">Other Officer's</a>
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
          Academic <i class="rkdf-chev">▾</i>
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
            <a href="Constituent Units.pdf" target="_blank" class="rkdf-drop-link" role="menuitem">Constituent Units</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Academic Resources &amp; Notices</span>
            <a href="University_Fees_Structure.pdf" target="_blank" class="rkdf-drop-link" role="menuitem">Fees Structure</a>
            <a href="Fees Notice.pdf" target="_blank" class="rkdf-drop-link" role="menuitem">Notice For Fees Submission</a>
            <a href="Syllabus.php" class="rkdf-drop-link" role="menuitem">Syllabus</a>
            <a href="https://rkdfu.org/E_Resource.php" target="_blank" class="rkdf-drop-link" role="menuitem">E-Resources</a>
            <a href="https://rkdfu.org/syllabus_Value-added.php" target="_blank" class="rkdf-drop-link" role="menuitem">Value-Added Courses</a>
            <a href="acadmiccalander.php" class="rkdf-drop-link" role="menuitem">Academic Calendar</a>
            <a href="international-relation.php" class="rkdf-drop-link" role="menuitem">Collaborations</a>
            <a href="Feedback_Analysis.php" target="_blank" class="rkdf-drop-link" role="menuitem">Feedback Analysis</a>
            <a href="skill.php" class="rkdf-drop-link" role="menuitem">Skills Enhancement</a>
            <a href="Annual_Report_University.php" class="rkdf-drop-link" role="menuitem">University Annual Report</a>
            <a href="staffLnew.php" target="_blank" class="rkdf-drop-link" role="menuitem">Teaching Staff</a>
            <a href="LMS.php" class="rkdf-drop-link" role="menuitem">LMS Portal</a>
            <span class="rkdf-drop-head" style="margin-top:10px;">Convocations</span>
            <a href="Content/Documents/Convocation_2026/List of Gold Medal and Silver Medal Academic Session 2023-24.pdf" target="_blank" class="rkdf-drop-link" role="menuitem">Convocation Medals 2023-24</a>
            <a href="Content/Documents/Convocation_2026/List of Gold Medal and Silver Medal Academic Session 2024-25.pdf" target="_blank" class="rkdf-drop-link" role="menuitem">Convocation Medals 2024-25</a>
          </div>
        </div>
      </li>

      <!-- EXAMINATION -->
      <li class="rkdf-nav-item" role="none">
        <a href="page.php?slug=exam-notice" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Examination <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:280px;">
          <span class="rkdf-drop-head">Examination &amp; Student Forms</span>
          <a href="page.php?slug=exam-notice" class="rkdf-drop-link" role="menuitem">Examination Notice</a>
          <a href="page.php?slug=exam-timetable" class="rkdf-drop-link" role="menuitem">Exam Time Table</a>
          <a href="page.php?slug=result" class="rkdf-drop-link" role="menuitem">Examination Results</a>
          <a href="page.php?slug=verification-form" class="rkdf-drop-link" role="menuitem">Document Verification Form</a>
          <a href="page.php?slug=marksheet-form" class="rkdf-drop-link" role="menuitem">Form for Duplicate/Corrected Marksheet</a>
          <a href="page.php?slug=name-correction-form" class="rkdf-drop-link" role="menuitem">Form for Name Correction Marksheet</a>
          <a href="page.php?slug=migration-hindi" class="rkdf-drop-link" role="menuitem">Degree Migration Form (Hindi)</a>
          <a href="page.php?slug=migration-english" class="rkdf-drop-link" role="menuitem">Degree Migration Form (English)</a>
          <a href="page.php?slug=alumni-form" class="rkdf-drop-link" role="menuitem">Alumni Registration Form</a>
          <a href="page.php?slug=student-portal" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-red);font-weight:600;">Student Portal Login →</a>
        </div>
      </li>

      <!-- R&D ACTIVITIES -->
      <li class="rkdf-nav-item" role="none">
        <a href="page.php?slug=rnd-projects" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          R&amp;D Activities <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:280px;">
          <span class="rkdf-drop-head">Research &amp; Innovation</span>
          <a href="page.php?slug=rnd-projects" class="rkdf-drop-link" role="menuitem">List of Projects</a>
          <a href="page.php?slug=rnd-glance" class="rkdf-drop-link" role="menuitem">Projects At A Glance</a>
          <a href="page.php?slug=journals" class="rkdf-drop-link" role="menuitem">Shodh Sangam Journals</a>
          <a href="page.php?slug=rnd-presentation" class="rkdf-drop-link" role="menuitem">Overview Presentation</a>
          <a href="page.php?slug=rnd-formats" class="rkdf-drop-link" role="menuitem">R&amp;D Formats (Download)</a>
          <a href="page.php?slug=funding-agencies" class="rkdf-drop-link" role="menuitem">Funding Agencies</a>
          <a href="page.php?slug=publications" class="rkdf-drop-link" role="menuitem">List of Publications</a>
          <a href="page.php?slug=mou-list" class="rkdf-drop-link" role="menuitem">List of MoU</a>
          <a href="page.php?slug=patents" class="rkdf-drop-link" role="menuitem">University Patents</a>
          <a href="page.php?slug=conferences" class="rkdf-drop-link" role="menuitem">Industrial Visits &amp; Conferences</a>
          <a href="page.php?slug=rnd-videos" class="rkdf-drop-link" role="menuitem">R&amp;D Videos</a>
        </div>
      </li>

      <!-- RESEARCH SECTION -->
      <li class="rkdf-nav-item" role="none">
        <a href="page.php?slug=phd-subjects" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Research Section <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:290px;">
          <span class="rkdf-drop-head">Doctor of Philosophy (Ph.D)</span>
          <a href="page.php?slug=phd-subjects" class="rkdf-drop-link" role="menuitem">Subjects Offered (Ph.D)</a>
          <a href="page.php?slug=phd-admission" class="rkdf-drop-link" role="menuitem">Admission in Ph.D Programme</a>
          <a href="page.php?slug=phd-syllabus" class="rkdf-drop-link" role="menuitem">Course Work-Scheme &amp; Syllabus</a>
          <a href="page.php?slug=phd-students" class="rkdf-drop-link" role="menuitem">Ph.D Students Directory</a>
          <a href="page.php?slug=phd-admissions-2026" class="rkdf-drop-link" role="menuitem">Ph.D Admissions 2026</a>
          <a href="page.php?slug=supervisors" class="rkdf-drop-link" role="menuitem">List of Supervisors</a>
          <span class="rkdf-drop-head" style="margin-top:10px;">Policies &amp; Projects</span>
          <a href="page.php?slug=research-policy" class="rkdf-drop-link" role="menuitem">Research Policy of University</a>
          <a href="page.php?slug=consultancy-policy" class="rkdf-drop-link" role="menuitem">Consultancy Policy of University</a>
          <a href="page.php?slug=institutional-distinctiveness" class="rkdf-drop-link" role="menuitem">Institutional Distinctiveness</a>
          <a href="page.php?slug=govt-projects" class="rkdf-drop-link" role="menuitem">Projects of Govt of India</a>
          <a href="page.php?slug=csir-projects" class="rkdf-drop-link" role="menuitem">CSIR Projects at RKDF</a>
          <a href="page.php?slug=solar-carbon-report" class="rkdf-drop-link" role="menuitem">Solar Carbon Capture Plant Report</a>
          <a href="page.php?slug=incubation" class="rkdf-drop-link" role="menuitem">Incubation Centre</a>
        </div>
      </li>

      <!-- ADMISSIONS -->
      <li class="rkdf-nav-item" role="none">
        <a href="admissionform.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Admissions <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:300px;">
          <span class="rkdf-drop-head">Admissions 2026-27</span>
          <a href="page.php?slug=admission-notice" class="rkdf-drop-link" role="menuitem">Admission Notice, Courses &amp; Last Date</a>
          <a href="page.php?slug=admission-rules" class="rkdf-drop-link" role="menuitem">Admission Rules 2026-27</a>
          <a href="page.php?slug=cuet-mapping" class="rkdf-drop-link" role="menuitem">Mapping list for CUET(UG)</a>
          <a href="prospectus.php" class="rkdf-drop-link" role="menuitem">University Prospectus</a>
          <a href="page.php?slug=international-admissions" class="rkdf-drop-link" role="menuitem">For International Admissions</a>
          <a href="page.php?slug=academic-departments" class="rkdf-drop-link" role="menuitem">Faculties and Departments</a>
          <a href="page.php?slug=bank-details" class="rkdf-drop-link" role="menuitem">University Bank Account Details</a>
          <a href="page.php?slug=fee-structure" class="rkdf-drop-link" role="menuitem">Fees Structure</a>
          <a href="page.php?slug=campus-facility" class="rkdf-drop-link" role="menuitem">Campus Facility</a>
          <a href="scholarship.php" class="rkdf-drop-link" role="menuitem">Scholarships</a>
          <a href="page.php?slug=pay-paytm" class="rkdf-drop-link" role="menuitem">Pay Fees Through Paytm</a>
          <a href="page.php?slug=inhouse-scheme" class="rkdf-drop-link" role="menuitem">Inhouse Scheme Policy</a>
          <a href="page.php?slug=meritorious-scheme" class="rkdf-drop-link" role="menuitem">Meritorious Scheme Policy</a>
          <a href="admissionform.php" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-red);font-weight:600;">Online Admission Application →</a>
        </div>
      </li>

    </ul>

    <!-- ── RIGHT ACTIONS: SEARCH + STUDENT LOGIN + RED APPLY NOW ── -->
    <div class="rkdf-nav-right">
      <!-- Search Button -->
      <a href="academic&departments.php" class="rkdf-search-btn" aria-label="Search" title="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.3-4.3"></path>
        </svg>
      </a>

      <!-- Student Login Button -->
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" class="rkdf-login-btn">
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
</nav><!-- /rkdf-nav-bar -->

<!-- Mobile Navigation Drawer -->
<div class="rkdf-mobile-drawer" id="rkdfMobileDrawer">
  <a href="About_Us.pdf" target="_blank" class="rkdf-mobile-link">About Us</a>
  <a href="academic&amp;departments.php" class="rkdf-mobile-link">Academic</a>
  <a href="exam.php" class="rkdf-mobile-link">Examination</a>
  <a href="r&amp;d.php" class="rkdf-mobile-link">R&amp;D Activities</a>
  <a href="phd.php" class="rkdf-mobile-link">Research Section (Ph.D)</a>
  <a href="admissionform.php" class="rkdf-mobile-link">Admissions</a>
  <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" class="rkdf-mobile-link" style="color:var(--nav-red);margin-top:12px;">Student Login →</a>
</div>
</div><!-- /rkdf-navbar-wrap -->

<!-- Dynamic Scroll Handler & Mobile Toggle Script -->
<script>
(function() {
  const navBar = document.getElementById('rkdfNavBar');
  const burger = document.getElementById('rkdfBurger');
  const drawer = document.getElementById('rkdfMobileDrawer');

  function updateNavScroll() {
    if (window.scrollY > 20) {
      navBar.classList.add('scrolled');
    } else {
      navBar.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', updateNavScroll, { passive: true });
  updateNavScroll(); // Initialize on page load

  if (burger && drawer) {
    burger.addEventListener('click', function() {
      const isOpen = drawer.classList.toggle('active');
      burger.setAttribute('aria-expanded', isOpen);
    });
  }
})();
</script>


