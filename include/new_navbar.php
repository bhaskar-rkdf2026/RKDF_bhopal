<?php
// ============================================================
// RKDF University — Approved Navbar Component (v2 — Dynamic)
// ============================================================
require_once __DIR__ . '/site_settings.php';
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="css/rkdf-navbar.css" />

<!-- ══════════════════════════════════════════════════════════ -->
<!--  RKDF STICKY NAVBAR                                        -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="rkdf-navbar-wrap">
<nav class="rkdf-nav-bar" id="rkdfNavBar" role="navigation" aria-label="Main navigation">
  <div class="rkdf-nav-inner">

    <!-- ── LEFT: RKDF Shield + Brand ── -->
    <a href="index.php" class="rkdf-brand" title="<?= htmlspecialchars(get_site_setting('site_title', 'RKDF University Bhopal')) ?> — Home">
      <!-- Pixel-accurate red shield badge SVG crest -->
      <svg class="rkdf-badge" viewBox="0 0 90 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Shield body -->
        <path d="M45 2L4 18V50C4 76 45 98 45 98C45 98 86 76 86 50V18L45 2Z" fill="#C9192A"/>
        <path d="M45 9L11 23V50C11 72 45 91 45 91C45 91 79 72 79 50V23L45 9Z" fill="#A8101F"/>
        <!-- White circular disc -->
        <circle cx="45" cy="38" r="18" fill="#F5F5F5"/>
        <!-- Red "RKDF" crest: book symbol -->
        <rect x="37" y="30" width="16" height="12" rx="1.5" fill="#C9192A"/>
        <line x1="45" y1="30" x2="45" y2="42" stroke="white" stroke-width="1.5"/>
        <line x1="37" y1="36" x2="53" y2="36" stroke="white" stroke-width="1"/>
        <!-- Lines at bottom for classic university shield -->
        <rect x="29" y="62" width="32" height="3.5" rx="1" fill="rgba(255,255,255,0.80)"/>
        <rect x="32" y="70" width="26" height="3" rx="1" fill="rgba(255,255,255,0.55)"/>
        <rect x="36" y="77" width="18" height="2.5" rx="1" fill="rgba(255,255,255,0.35)"/>
      </svg>

      <div class="rkdf-brand-info">
        <span class="rkdf-brand-name">RKDF University</span>
        <span class="rkdf-brand-loc">BHOPAL &nbsp;·&nbsp; SINCE 2011</span>
      </div>
    </a>

    <!-- ── CENTER: Main Nav Links ── -->
    <ul class="rkdf-nav-list" id="rkdfNavList" role="menubar">

      <!-- ADMISSIONS -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Admissions <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <span class="rkdf-drop-head"><?= htmlspecialchars(get_site_setting('admission_year', '2026-27')) ?></span>
          <a href="<?= htmlspecialchars(get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf')) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">Admission Policy <?= htmlspecialchars(get_site_setting('admission_year', '2026-27')) ?></a>
          <a href="<?= htmlspecialchars(get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf')) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">Admission Rules <?= htmlspecialchars(get_site_setting('admission_year', '2026-27')) ?></a>
          <a href="<?= htmlspecialchars(get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf')) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">University Prospectus</a>
          <a href="<?= htmlspecialchars(get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf')) ?>" target="_blank" class="rkdf-drop-link" role="menuitem">Fee Structure</a>
          <a href="scholarship.php" class="rkdf-drop-link" role="menuitem">Scholarship Schemes</a>
          <a href="admissionform.php" class="rkdf-drop-link" role="menuitem">Application Form</a>
          <a href="foreign_stud/index.html" target="_blank" class="rkdf-drop-link" role="menuitem">International Admissions</a>
        </div>
      </li>


      <!-- ACADEMICS -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Academics <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop mega" role="menu">
          <div class="rkdf-drop-cols">
            <div class="rkdf-drop-col">
              <span class="rkdf-drop-head">Faculties</span>
              <a href="Engineering.php" class="rkdf-drop-link">Engineering &amp; Tech</a>
              <a href="Management.php" class="rkdf-drop-link">Management</a>
              <a href="pharmacy.php" class="rkdf-drop-link">Pharmacy</a>
              <a href="Science.php" class="rkdf-drop-link">Science</a>
              <a href="Commerce.php" class="rkdf-drop-link">Commerce</a>
              <a href="Education.php" class="rkdf-drop-link">Education</a>
              <a href="Computer-Application.php" class="rkdf-drop-link">Computer Application</a>
              <a href="Agriculture.php" class="rkdf-drop-link">Agriculture</a>
              <a href="architect.php" class="rkdf-drop-link">Architecture</a>
              <a href="Law.php" class="rkdf-drop-link">Law</a>
              <a href="BHMS.php" class="rkdf-drop-link">Homeopathy (BHMS)</a>
              <a href="BAMS.php" class="rkdf-drop-link">Ayurveda (BAMS)</a>
              <a href="nursing.php" class="rkdf-drop-link">Nursing</a>
              <a href="paramdical.php" class="rkdf-drop-link">Paramedical</a>
              <a href="Library.php" class="rkdf-drop-link">Library Science</a>
            </div>
            <div class="rkdf-drop-col">
              <span class="rkdf-drop-head">Resources</span>
              <a href="Syllabus.php" class="rkdf-drop-link">Syllabus</a>
              <a href="acadmiccalander.php" class="rkdf-drop-link">Academic Calendar</a>
              <a href="staffLnew.php" class="rkdf-drop-link">Teaching Staff</a>
              <a href="LMS.php" class="rkdf-drop-link">LMS Portal</a>
              <a href="Feedback_Analysis.php" class="rkdf-drop-link">Feedback Analysis</a>
              <a href="skill.php" class="rkdf-drop-link">Skills Enhancement</a>
              <a href="Annual_Report_University.php" class="rkdf-drop-link">Annual Report</a>
              <a href="academic&departments.php" class="rkdf-drop-link">All Departments</a>
            </div>
          </div>
        </div>
      </li>

      <!-- RESEARCH -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Research <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <span class="rkdf-drop-head">R&amp;D &amp; Ph.D</span>
          <a href="r&d.php" class="rkdf-drop-link">R&amp;D Activities</a>
          <a href="phd.php" class="rkdf-drop-link">Doctor of Philosophy (Ph.D)</a>
          <a href="phd_entrance.php" class="rkdf-drop-link">Ph.D Admission &amp; Entrance</a>
          <a href="phdsubjects.php" class="rkdf-drop-link">Subjects Offered (Ph.D)</a>
          <a href="phdstudent.php" class="rkdf-drop-link">Ph.D Students List</a>
          <a href="stafflist.php" class="rkdf-drop-link">List of Ph.D Supervisors</a>
          <a href="patent.php" class="rkdf-drop-link">University Patents</a>
          <a href="http://shodhsangam.rkdfuniv.in/" target="_blank" class="rkdf-drop-link">Shodhsangam Journal</a>
        </div>
      </li>

      <!-- CAMPUS LIFE -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Campus Life <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" role="menu">
          <a href="Laboratories.php" class="rkdf-drop-link">Laboratories</a>
          <a href="Hostel.php" class="rkdf-drop-link">Hostel &amp; Accommodation</a>
          <a href="Transport.php" class="rkdf-drop-link">Transport</a>
          <a href="Canteen.php" class="rkdf-drop-link">Canteen &amp; Cafeteria</a>
          <a href="Wi-Fi.php" class="rkdf-drop-link">Wi-Fi &amp; Digital Campus</a>
          <a href="Games.php" class="rkdf-drop-link">Sports &amp; Athletics</a>
          <a href="Cultural.php" class="rkdf-drop-link">Cultural Fests &amp; Clubs</a>
          <a href="ncc.php" class="rkdf-drop-link">NCC &amp; NSS Wings</a>
          <a href="Health-Care-Medical-Center.php" class="rkdf-drop-link">Health Care Center</a>
          <a href="Library.php" class="rkdf-drop-link">Central Library</a>
        </div>
      </li>

      <!-- PLACEMENTS -->
      <li class="rkdf-nav-item" role="none">
        <a href="t&p.php" class="rkdf-nav-link" role="menuitem">
          Placements
        </a>
      </li>

      <!-- ABOUT -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          About <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop mega" style="left:auto; right:0; transform:translateX(0) translateY(8px);" role="menu">
          <div class="rkdf-drop-cols">
            <div class="rkdf-drop-col">
              <span class="rkdf-drop-head">University</span>
              <a href="About_Us.pdf" target="_blank" class="rkdf-drop-link">About RKDF</a>
              <a href="Vision&mission.php" class="rkdf-drop-link">Vision &amp; Mission</a>
              <a href="Objectives.php" class="rkdf-drop-link">Objectives</a>
              <a href="Chancellor.php" class="rkdf-drop-link">Chancellor's Desk</a>
              <a href="ProChancellor.php" class="rkdf-drop-link">Pro-Chancellor</a>
              <a href="Vice-Chancellor-Desk.php" class="rkdf-drop-link">Vice Chancellor</a>
              <a href="Registrar.php" class="rkdf-drop-link">Registrar Profile</a>
            </div>
            <div class="rkdf-drop-col">
              <span class="rkdf-drop-head">Governance</span>
              <a href="dean.php" class="rkdf-drop-link">Deans</a>
              <a href="hod.php" class="rkdf-drop-link">HODs / Institute Heads</a>
              <a href="Governingbody.php" class="rkdf-drop-link">Governing Body</a>
              <a href="BoM.php" class="rkdf-drop-link">Board of Management</a>
              <a href="Academic_Council.php" class="rkdf-drop-link">Academic Council</a>
              <a href="BOS.php" class="rkdf-drop-link">Board of Studies</a>
              <a href="Public Self Disclosure.pdf" target="_blank" class="rkdf-drop-link">Public Self Disclosure</a>
            </div>
          </div>
        </div>
      </li>

      <!-- NEWS -->
      <li class="rkdf-nav-item" role="none">
        <a href="#" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          News <i class="rkdf-chev">▾</i>
        </a>
        <div class="rkdf-drop" style="left:auto; right:0; transform:translateX(0) translateY(8px);" role="menu">
          <a href="exam.php" class="rkdf-drop-link">Examination Notices</a>
          <a href="examtimetable.php" class="rkdf-drop-link">Exam Time Table</a>
          <a href="Result.php" class="rkdf-drop-link">Results Portal</a>
          <a href="Announcements.php" class="rkdf-drop-link">Latest Announcements</a>
          <a href="Careers.php" class="rkdf-drop-link">Careers &amp; Recruitment</a>
          <a href="imggallery.php" class="rkdf-drop-link">Photo Gallery</a>
          <a href="videogallery.php" class="rkdf-drop-link">Video Gallery</a>
        </div>
      </li>

    </ul>
    <!-- END nav-list -->

    <!-- ── RIGHT: Actions ── -->
    <div class="rkdf-actions">

      <!-- Search icon button -->
      <button class="rkdf-search-btn" id="rkdfSearchOpen" title="Search" aria-label="Open search">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="11" cy="11" r="8"/>
          <path d="M21 21l-4.35-4.35"/>
        </svg>
      </button>

      <!-- Student Login – outlined -->
      <a href="https://erplive.rkdf.ac.in/" target="_blank" rel="noopener" class="rkdf-btn-login">
        Student Login
      </a>

      <!-- APPLY NOW – red CTA -->
      <a href="ADMISSION POLICY 2026-27.pdf" target="_blank" rel="noopener" class="rkdf-btn-apply">
        APPLY NOW <span class="rkdf-btn-apply-arrow">↗</span>
      </a>

      <!-- Mobile hamburger -->
      <button class="rkdf-hamburger" id="rkdfHamburger" aria-label="Open navigation menu" aria-expanded="false">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </button>

    </div>

  </div><!-- /rkdf-nav-inner -->
</nav>
</div><!-- /rkdf-navbar-wrap -->

<!-- ══ Search Overlay ══ -->
<div class="rkdf-search-overlay" id="rkdfSearchOverlay" role="dialog" aria-modal="true" aria-label="Site search">
  <button class="rkdf-search-close" id="rkdfSearchClose" aria-label="Close search">&times;</button>
  <div class="rkdf-search-inner">
    <form action="Admission_search.php" method="get" role="search">
      <input id="rkdfSearchInput" type="search" name="q" class="rkdf-search-input"
             placeholder="Search courses, results, notices, exams…" autocomplete="off" />
    </form>
  </div>
</div>

<!-- ══ Navbar Interaction JS ══ -->
<script>
(function(){
  var ham      = document.getElementById('rkdfHamburger');
  var navList  = document.getElementById('rkdfNavList');
  var openBtn  = document.getElementById('rkdfSearchOpen');
  var closeBtn = document.getElementById('rkdfSearchClose');
  var overlay  = document.getElementById('rkdfSearchOverlay');
  var inp      = document.getElementById('rkdfSearchInput');

  /* Mobile hamburger */
  if (ham && navList) {
    ham.addEventListener('click', function() {
      var isOpen = navList.classList.toggle('open');
      ham.setAttribute('aria-expanded', isOpen);
    });
  }

  /* Mobile accordion sub-menus */
  document.querySelectorAll('.rkdf-nav-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
      if (window.innerWidth > 900) return;
      var drop = this.parentElement.querySelector('.rkdf-drop');
      if (!drop) return;
      e.preventDefault();
      this.parentElement.classList.toggle('open');
    });
  });

  /* Search overlay */
  if (openBtn && overlay && closeBtn && inp) {
    openBtn.addEventListener('click', function() {
      overlay.classList.add('open');
      setTimeout(function(){ inp.focus(); }, 80);
    });
    closeBtn.addEventListener('click', function() {
      overlay.classList.remove('open');
    });
    overlay.addEventListener('click', function(e) {
      if (e.target === overlay) overlay.classList.remove('open');
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') overlay.classList.remove('open');
    });
  }

  /* Scroll: darken navbar when past hero */
  var navBar = document.getElementById('rkdfNavBar');
  if (navBar) {
    var scrollThreshold = window.innerHeight * 0.65;
    window.addEventListener('scroll', function() {
      if (window.scrollY > scrollThreshold) {
        navBar.classList.add('scrolled');
      } else {
        navBar.classList.remove('scrolled');
      }
    }, { passive: true });
  }

})();
</script>
