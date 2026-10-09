<?php
// ============================================================
// RKDF University — Modern Navbar Component
// Matching Exact Menu Items From User Screenshot:
// [Home] [About H.E.I. ▾] [Syllabus & Courses ▾] [Academics ▾]
// [Admission & Fee ▾] [Research ▾] [Departments ▾] [Student Life ▾]
// [Alumni ▾] [Info Corner ▾] | [CONTACT Button]
// ============================================================
require_once __DIR__ . '/site_settings.php';
require_once __DIR__ . '/../config/db.php';

$siteTitle          = get_site_setting('site_title', 'RKDF UNIVERSITY');
$siteTagline        = get_site_setting('site_tagline', 'BHOPAL');
$admissionYear      = get_site_setting('admission_year', '2026-27');
$admissionPolicyPdf = get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf');
$prospectusPdf     = get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf');
$feePdf             = get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf');
$erpPortalUrl       = get_site_setting('erp_portal_url', 'https://erplive.rkdf.ac.in');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/rkdf-navbar.css" />

<!-- ══════════════════════════════════════════════════════════ -->
<!--  RKDF STICKY NAVBAR                                         -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="rkdf-navbar-wrap">

<!-- ── TOP UTILITY STRIP ── -->
<div class="rkdf-top-utility-bar">
  <div class="rkdf-utility-inner">
    <div class="rkdf-utility-left">
      <a href="https://vps.rkdfu.org:2096/" target="_blank" rel="noopener noreferrer" class="rkdf-util-link highlight-mail" title="WebMail Access Portal">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        WebMail Login ↗
      </a>
      <span class="rkdf-util-divider">|</span>
      <span class="rkdf-util-org">RAM KRISHNA DHARMARTH FOUNDATION (RKDF) GROUP</span>
    </div>

    <div class="rkdf-utility-right">
      <a href="imggallery.php" class="rkdf-util-link">Photo Gallery</a>
      <a href="alumni.php" class="rkdf-util-link">Alumni</a>
      <a href="t&amp;p.php" class="rkdf-util-link">T&amp;P Cell</a>
      <a href="Careers.php" class="rkdf-util-link">Careers</a>
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" rel="noopener noreferrer" class="rkdf-util-link highlight-erp">Student Login ↗</a>
      <a href="Announcements.php?cat=tender" class="rkdf-util-link highlight-tender">⚡ E-Tenders</a>
    </div>
  </div>
</div>

<nav class="rkdf-nav-bar" id="rkdfNavBar" role="navigation" aria-label="Main navigation">
  <div class="rkdf-nav-inner">

    <!-- ── BRAND LOGO + CREST + TYPOGRAPHY ── -->
    <a href="index.php" class="rkdf-brand" title="RKDF University Bhopal — Home">
      <div class="rkdf-badge-box">
        <img src="images/rkdf_logo_naac.png" alt="RKDF University NAAC A+ Logo" width="60" height="68" class="rkdf-badge-img" onError="this.src='images/rkdflogo.JPG';">
      </div>

      <div class="rkdf-brand-info">
        <div class="rkdf-brand-name">RKDF University</div>
        <div class="rkdf-brand-sub">BHOPAL &bull; SINCE 2011</div>
      </div>
    </a>

    <!-- ── EXACT MENU OPTIONS REQUESTED ── -->
    <ul class="rkdf-nav-list" id="rkdfNavList" role="menubar">

      <!-- 1. Home -->
      <li class="rkdf-nav-item" role="none">
        <a href="index.php" class="rkdf-nav-link active" role="menuitem">Home</a>
      </li>

      <!-- 2. About -->
      <li class="rkdf-nav-item" role="none">
        <a href="about.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          About <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:560px;">
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
            <a href="approvals.php" class="rkdf-drop-link" role="menuitem">Approvals &amp; Accreditations</a>
            <a href="public-disclosure.php" class="rkdf-drop-link" role="menuitem">Public Self Disclosure</a>
            <a href="imggallery.php" class="rkdf-drop-link" role="menuitem">Photo Gallery</a>
          </div>
        </div>
      </li>

      <!-- 3. Courses -->
      <li class="rkdf-nav-item" role="none">
        <a href="Syllabus.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Courses <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:540px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Programmes &amp; Schemes</span>
            <a href="Undergraduate-Admissions.php" class="rkdf-drop-link" role="menuitem">Undergraduate Programmes</a>
            <a href="Post-Graduate-Admissions.php" class="rkdf-drop-link" role="menuitem">Postgraduate Programmes</a>
            <a href="Diploma-Admissions.php" class="rkdf-drop-link" role="menuitem">Diploma &amp; Polytechnic Courses</a>
            <a href="Doctoral(Ph.D).php" class="rkdf-drop-link" role="menuitem">Doctoral (Ph.D) Programmes</a>
            <a href="Certificate-Courses.php" class="rkdf-drop-link" role="menuitem">Certificate &amp; Vocational Courses</a>
            <a href="syllabus_Value-added.php" class="rkdf-drop-link" role="menuitem">Value-Added Courses</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Syllabus &amp; Structure</span>
            <a href="Syllabus.php" class="rkdf-drop-link" role="menuitem">Complete Syllabus Directory</a>
            <a href="syllabusBe.php" class="rkdf-drop-link" role="menuitem">Engineering Syllabus</a>
            <a href="syllabuspharmacy.php" class="rkdf-drop-link" role="menuitem">Pharmacy Syllabus</a>
            <a href="syllabusMba.php" class="rkdf-drop-link" role="menuitem">Management Syllabus</a>
            <a href="syllabusLaw.php" class="rkdf-drop-link" role="menuitem">Law Syllabus</a>
            <a href="University_Fees_Structure.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Fees Structure ↗</a>
          </div>
        </div>
      </li>

      <!-- 4. Academics -->
      <li class="rkdf-nav-item" role="none">
        <a href="acadmiccalander.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Academics <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:580px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Academic Resources</span>
            <a href="acadmiccalander.php" class="rkdf-drop-link" role="menuitem">Academic Calendar</a>
            <a href="E_Resource.php" class="rkdf-drop-link" role="menuitem">E-Resources &amp; Digital Library</a>
            <a href="LMS.php" class="rkdf-drop-link" role="menuitem">LMS E-Learning Portal</a>
            <a href="international-relation.php" class="rkdf-drop-link" role="menuitem">Academic Collaborations</a>
            <a href="Feedback_Analysis.php" class="rkdf-drop-link" role="menuitem">Student Feedback Analysis</a>
            <a href="staffLnew.php" class="rkdf-drop-link" role="menuitem">Teaching Staff Directory</a>
            <a href="Convocation.php" class="rkdf-drop-link" role="menuitem">Convocation Portal</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Examinations &amp; Forms</span>
            <a href="Exam_Notice.php" class="rkdf-drop-link" role="menuitem">Examination Notices</a>
            <a href="examtimetable.php" class="rkdf-drop-link" role="menuitem">Exam Time Table</a>
            <a href="Result.php" class="rkdf-drop-link" role="menuitem">Examination Results</a>
            <a href="Verification_Form.php" class="rkdf-drop-link" role="menuitem">Degree Verification Form</a>
            <a href="Marksheet_Form.php" class="rkdf-drop-link" role="menuitem">Duplicate Marksheet Form</a>
            <a href="Name_Correction_Form.php" class="rkdf-drop-link" role="menuitem">Name Correction Form</a>
            <a href="Migration_English.php" class="rkdf-drop-link" role="menuitem">Degree Migration Form</a>
            <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-gold);font-weight:700;">Student ERP Portal ↗</a>
          </div>
        </div>
      </li>

      <!-- 5. Admission -->
      <li class="rkdf-nav-item" role="none">
        <a href="admissionform.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Admission <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:300px;">
          <span class="rkdf-drop-head">Admissions <?= htmlspecialchars($admissionYear) ?></span>
          <a href="admission.php" class="rkdf-drop-link" role="menuitem">Admission Notice &amp; Last Date</a>
          <a href="ADMISSION POLICY 2026-27.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Admission Policy &amp; Rules ↗</a>
          <a href="prospectus.php" class="rkdf-drop-link" role="menuitem">University Prospectus</a>
          <a href="University_Fees_Structure.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">University Fees Structure ↗</a>
          <a href="Fees Notice.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Notice For Fees Submission ↗</a>
          <a href="foreign_stud/index.html" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">International Admissions ↗</a>
          <a href="scholarship.php" class="rkdf-drop-link" role="menuitem">Scholarships Scheme</a>
          <a href="Bank-And-ATM.php" class="rkdf-drop-link" role="menuitem">University Bank Details</a>
          <a href="admissionquery.php" class="rkdf-drop-link" role="menuitem">Admission Enquiry</a>
          <a href="admissionform.php" class="rkdf-drop-link" role="menuitem" style="color:var(--nav-gold);font-weight:700;">Apply Online <?= htmlspecialchars($admissionYear) ?> →</a>
        </div>
      </li>

      <!-- 6. Research -->
      <li class="rkdf-nav-item" role="none">
        <a href="RnD_Projects.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Research <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:540px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Innovation &amp; Publications</span>
            <a href="RnD_Projects.php" class="rkdf-drop-link" role="menuitem">R&amp;D Projects List</a>
            <a href="RnD_Projects.php#glance" class="rkdf-drop-link" role="menuitem">Projects At A Glance</a>
            <a href="journals.php" class="rkdf-drop-link" role="menuitem">Shodh Sangam Journals</a>
            <a href="patent.php" class="rkdf-drop-link" role="menuitem">University Patents</a>
            <a href="r&amp;d.php" class="rkdf-drop-link" role="menuitem">Research &amp; Incubation Cell</a>
            <a href="Confrence-Seminar.php" class="rkdf-drop-link" role="menuitem">Conferences &amp; Seminars</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Doctoral Studies (Ph.D)</span>
            <a href="phdsubjects.php" class="rkdf-drop-link" role="menuitem">Ph.D Offered Subjects</a>
            <a href="phd_entrance.php" class="rkdf-drop-link" role="menuitem">Ph.D Entrance Examination</a>
            <a href="phdsyllabus.php" class="rkdf-drop-link" role="menuitem">Ph.D Scheme &amp; Syllabus</a>
            <a href="phdstudent.php" class="rkdf-drop-link" role="menuitem">Ph.D Scholars Directory</a>
            <a href="supervisors01.php" class="rkdf-drop-link" role="menuitem">List of Supervisors</a>
            <a href="policies.php" class="rkdf-drop-link" role="menuitem">Research &amp; Consultancy Policies</a>
          </div>
        </div>
      </li>

      <!-- 7. Departments -->
      <li class="rkdf-nav-item" role="none">
        <a href="academic&amp;departments.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Departments <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:620px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Technical &amp; Professional</span>
            <a href="Engineering.php" class="rkdf-drop-link" role="menuitem">Department of Engineering</a>
            <a href="Management.php" class="rkdf-drop-link" role="menuitem">Department of Management</a>
            <a href="pharmacy.php" class="rkdf-drop-link" role="menuitem">Department of Pharmacy</a>
            <a href="Computer-Application.php" class="rkdf-drop-link" role="menuitem">Department of Computer Applications</a>
            <a href="Agriculture.php" class="rkdf-drop-link" role="menuitem">Department of Agriculture</a>
            <a href="architect.php" class="rkdf-drop-link" role="menuitem">Department of Architecture</a>
            <a href="Law.php" class="rkdf-drop-link" role="menuitem">Department of Law</a>
            <a href="Commerce.php" class="rkdf-drop-link" role="menuitem">Department of Commerce</a>
            <a href="Science.php" class="rkdf-drop-link" role="menuitem">Department of Science</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Medical, AYUSH &amp; Allied</span>
            <a href="BHMS.php" class="rkdf-drop-link" role="menuitem">Department of Homoeopathy (BHMS)</a>
            <a href="BAMS.php" class="rkdf-drop-link" role="menuitem">Department of Ayurveda (BAMS)</a>
            <a href="nursing.php" class="rkdf-drop-link" role="menuitem">Department of Nursing</a>
            <a href="paramdical.php" class="rkdf-drop-link" role="menuitem">Department of Paramedical</a>
            <a href="Education.php" class="rkdf-drop-link" role="menuitem">Department of Education (B.Ed)</a>
            <a href="Social-Science.php" class="rkdf-drop-link" role="menuitem">Department of Social Sciences</a>
            <a href="Library.php" class="rkdf-drop-link" role="menuitem">Department of Library Science</a>
            <a href="Constituent Units.pdf" target="_blank" rel="noopener noreferrer" class="rkdf-drop-link" role="menuitem">Constituent Units ↗</a>
          </div>
        </div>
      </li>

      <!-- 8. Student Life -->
      <li class="rkdf-nav-item" role="none">
        <a href="Campus.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Student Life <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop rkdf-drop-wide" role="menu" style="min-width:540px;">
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Facilities &amp; Infrastructure</span>
            <a href="Campus.php" class="rkdf-drop-link" role="menuitem">Campus Facilities Overview</a>
            <a href="Hostel.php" class="rkdf-drop-link" role="menuitem">Hostel &amp; Accommodation</a>
            <a href="Library.php" class="rkdf-drop-link" role="menuitem">Central Library</a>
            <a href="Laboratories.php" class="rkdf-drop-link" role="menuitem">Specialized Laboratories</a>
            <a href="Health-Care-Medical-Center.php" class="rkdf-drop-link" role="menuitem">Healthcare Center</a>
            <a href="Canteen.php" class="rkdf-drop-link" role="menuitem">Canteen &amp; Dining</a>
            <a href="Transport.php" class="rkdf-drop-link" role="menuitem">Transport Facility</a>
          </div>
          <div class="rkdf-drop-col">
            <span class="rkdf-drop-head">Activities, Wings &amp; Fests</span>
            <a href="ncc.php" class="rkdf-drop-link" role="menuitem">National Cadet Corps (NCC)</a>
            <a href="Activities.php" class="rkdf-drop-link" role="menuitem">National Service Scheme (NSS)</a>
            <a href="Games.php" class="rkdf-drop-link" role="menuitem">Sports &amp; Athletics Arena</a>
            <a href="samagam.php" class="rkdf-drop-link" role="menuitem">Samagam Cultural Fest</a>
            <a href="sangram.php" class="rkdf-drop-link" role="menuitem">Sangraam Sports Meet</a>
            <a href="videogallery.php" class="rkdf-drop-link" role="menuitem">Virtual Campus Tour</a>
            <a href="imggallery.php" class="rkdf-drop-link" role="menuitem">Photo Gallery</a>
          </div>
        </div>
      </li>

      <!-- 9. Alumni -->
      <li class="rkdf-nav-item" role="none">
        <a href="alumni.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Alumni <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:280px;">
          <span class="rkdf-drop-head">Alumni &amp; Placements</span>
          <a href="alumni.php" class="rkdf-drop-link" role="menuitem">Alumni Association Network</a>
          <a href="Alumni_Form.php" class="rkdf-drop-link" role="menuitem">Alumni Registration Form</a>
          <a href="t&amp;p.php" class="rkdf-drop-link" role="menuitem">Training &amp; Placement Cell</a>
          <a href="t&amp;p.php#recruiters" class="rkdf-drop-link" role="menuitem">Top Recruiters &amp; Stats</a>
          <a href="Careers.php" class="rkdf-drop-link" role="menuitem">Career Opportunities</a>
          <a href="skill.php" class="rkdf-drop-link" role="menuitem">Skill Development Center</a>
        </div>
      </li>

      <!-- 10. Info Corner -->
      <li class="rkdf-nav-item" role="none">
        <a href="Announcements.php" class="rkdf-nav-link" role="menuitem" aria-haspopup="true">
          Info Corner <span class="rkdf-caret">▼</span>
        </a>
        <div class="rkdf-drop" role="menu" style="min-width:300px;">
          <span class="rkdf-drop-head">Notices, Reports &amp; Disclosures</span>
          <a href="Announcements.php" class="rkdf-drop-link" role="menuitem">Announcements &amp; Circulars</a>
          <a href="News_Letter.php" class="rkdf-drop-link" role="menuitem">University Newsletters</a>
          <a href="Annual_Report_University.php" class="rkdf-drop-link" role="menuitem">University Annual Reports</a>
          <a href="antiragging.php" class="rkdf-drop-link" role="menuitem">Anti-Ragging Committee</a>
          <a href="womengrievance.php" class="rkdf-drop-link" role="menuitem">Women Grievance Cell</a>
          <a href="Discipline-Comittee.php" class="rkdf-drop-link" role="menuitem">Discipline Committee</a>
          <a href="public-disclosure.php" class="rkdf-drop-link" role="menuitem">Public Self Disclosures</a>
          <a href="Announcements.php?cat=tender" class="rkdf-drop-link" role="menuitem">E-Tenders &amp; Procurement ↗</a>
        </div>
      </li>

    </ul>

    <!-- ── RIGHT ACTION: CONTACT BUTTON + MOBILE TOGGLE ── -->
    <div class="rkdf-nav-right">
      <!-- Contact Button -->
      <a href="contact-us.php" class="rkdf-contact-btn" role="button" aria-label="Contact Us">
        <span>CONTACT</span>
      </a>

      <!-- Mobile Hamburger Button -->
      <button class="rkdf-burger" id="rkdfBurger" aria-label="Toggle Menu" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="4" x2="20" y1="12" y2="12"></line>
          <line x1="4" x2="20" y1="6" y2="6"></line>
          <line x1="4" x2="20" y1="18" y2="18"></line>
        </svg>
      </button>
    </div>

  </div><!-- /rkdf-nav-inner -->

</nav><!-- /rkdf-nav-bar -->

<!-- Mobile Navigation Accordion Drawer -->
<div class="rkdf-mobile-drawer" id="rkdfMobileDrawer">
  <div class="rkdf-mobile-accordion">
    
    <!-- 1. Home -->
    <a href="index.php" class="rkdf-mob-single-link active">Home</a>

    <!-- 2. About -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>About</span>
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
        <a href="approvals.php" class="rkdf-mob-sublink">Approvals &amp; Accreditations</a>
        <a href="public-disclosure.php" class="rkdf-mob-sublink">Public Self Disclosures</a>
      </div>
    </div>

    <!-- 3. Courses -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Courses</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="Syllabus.php" class="rkdf-mob-sublink">Complete Syllabus Directory</a>
        <a href="Undergraduate-Admissions.php" class="rkdf-mob-sublink">Undergraduate Programmes</a>
        <a href="Post-Graduate-Admissions.php" class="rkdf-mob-sublink">Postgraduate Programmes</a>
        <a href="Diploma-Admissions.php" class="rkdf-mob-sublink">Diploma &amp; Polytechnic</a>
        <a href="Doctoral(Ph.D).php" class="rkdf-mob-sublink">Doctoral (Ph.D) Programmes</a>
        <a href="Certificate-Courses.php" class="rkdf-mob-sublink">Certificate &amp; Vocational</a>
        <a href="syllabus_Value-added.php" class="rkdf-mob-sublink">Value-Added Skill Courses</a>
        <a href="University_Fees_Structure.pdf" target="_blank" class="rkdf-mob-sublink">Fee Structure ↗</a>
      </div>
    </div>

    <!-- 4. Academics -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Academics</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="acadmiccalander.php" class="rkdf-mob-sublink">Academic Calendar</a>
        <a href="Exam_Notice.php" class="rkdf-mob-sublink">Examination Notices</a>
        <a href="examtimetable.php" class="rkdf-mob-sublink">Exam Time Table</a>
        <a href="Result.php" class="rkdf-mob-sublink">Examination Results</a>
        <a href="Verification_Form.php" class="rkdf-mob-sublink">Degree Verification Form</a>
        <a href="Marksheet_Form.php" class="rkdf-mob-sublink">Duplicate Marksheet Form</a>
        <a href="Name_Correction_Form.php" class="rkdf-mob-sublink">Name Correction Form</a>
        <a href="Migration_English.php" class="rkdf-mob-sublink">Degree Migration Form</a>
        <a href="E_Resource.php" class="rkdf-mob-sublink">E-Resources &amp; Library</a>
        <a href="LMS.php" class="rkdf-mob-sublink">LMS E-Learning Portal</a>
        <a href="Convocation.php" class="rkdf-mob-sublink">Convocations</a>
      </div>
    </div>

    <!-- 5. Admission -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Admission</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="admissionform.php" class="rkdf-mob-sublink">Online Admission Form</a>
        <a href="admission.php" class="rkdf-mob-sublink">Admission Notice &amp; Last Date</a>
        <a href="ADMISSION POLICY 2026-27.pdf" target="_blank" class="rkdf-mob-sublink">Admission Rules <?= htmlspecialchars($admissionYear) ?> ↗</a>
        <a href="prospectus.php" class="rkdf-mob-sublink">University Prospectus</a>
        <a href="University_Fees_Structure.pdf" target="_blank" class="rkdf-mob-sublink">University Fees Structure ↗</a>
        <a href="foreign_stud/index.html" target="_blank" class="rkdf-mob-sublink">International Admissions ↗</a>
        <a href="scholarship.php" class="rkdf-mob-sublink">Scholarships</a>
        <a href="Bank-And-ATM.php" class="rkdf-mob-sublink">Bank Details</a>
        <a href="admissionquery.php" class="rkdf-mob-sublink">Admission Enquiry</a>
      </div>
    </div>

    <!-- 6. Research -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Research</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="RnD_Projects.php" class="rkdf-mob-sublink">R&amp;D Projects</a>
        <a href="journals.php" class="rkdf-mob-sublink">Shodh Sangam Journals</a>
        <a href="patent.php" class="rkdf-mob-sublink">University Patents</a>
        <a href="r&amp;d.php" class="rkdf-mob-sublink">Research Incubation</a>
        <a href="phdsubjects.php" class="rkdf-mob-sublink">Ph.D Offered Subjects</a>
        <a href="phd_entrance.php" class="rkdf-mob-sublink">Ph.D Entrance Exam</a>
        <a href="phdsyllabus.php" class="rkdf-mob-sublink">Ph.D Syllabus</a>
        <a href="supervisors01.php" class="rkdf-mob-sublink">Research Supervisors</a>
      </div>
    </div>

    <!-- 7. Departments -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Departments</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="Engineering.php" class="rkdf-mob-sublink">Engineering &amp; Technology</a>
        <a href="Management.php" class="rkdf-mob-sublink">Management Studies</a>
        <a href="pharmacy.php" class="rkdf-mob-sublink">Pharmaceutical Sciences</a>
        <a href="Computer-Application.php" class="rkdf-mob-sublink">Computer Applications</a>
        <a href="Agriculture.php" class="rkdf-mob-sublink">Agriculture</a>
        <a href="architect.php" class="rkdf-mob-sublink">Architecture &amp; Design</a>
        <a href="Law.php" class="rkdf-mob-sublink">Law &amp; Legal Studies</a>
        <a href="BHMS.php" class="rkdf-mob-sublink">Homoeopathy (BHMS)</a>
        <a href="BAMS.php" class="rkdf-mob-sublink">Ayurveda (BAMS)</a>
        <a href="nursing.php" class="rkdf-mob-sublink">Nursing</a>
        <a href="paramdical.php" class="rkdf-mob-sublink">Paramedical Sciences</a>
        <a href="Science.php" class="rkdf-mob-sublink">Science</a>
        <a href="Commerce.php" class="rkdf-mob-sublink">Commerce</a>
        <a href="Education.php" class="rkdf-mob-sublink">Education (B.Ed)</a>
        <a href="Social-Science.php" class="rkdf-mob-sublink">Social Sciences</a>
        <a href="Library.php" class="rkdf-mob-sublink">Library Science</a>
      </div>
    </div>

    <!-- 8. Student Life -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Student Life</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="Campus.php" class="rkdf-mob-sublink">Campus Overview</a>
        <a href="Hostel.php" class="rkdf-mob-sublink">Hostel &amp; Accommodation</a>
        <a href="Library.php" class="rkdf-mob-sublink">Central Library</a>
        <a href="ncc.php" class="rkdf-mob-sublink">National Cadet Corps (NCC)</a>
        <a href="Activities.php" class="rkdf-mob-sublink">National Service Scheme (NSS)</a>
        <a href="Games.php" class="rkdf-mob-sublink">Sports Arena</a>
        <a href="samagam.php" class="rkdf-mob-sublink">Samagam Fest</a>
        <a href="sangram.php" class="rkdf-mob-sublink">Sangraam Meet</a>
        <a href="videogallery.php" class="rkdf-mob-sublink">Virtual Tour</a>
        <a href="imggallery.php" class="rkdf-mob-sublink">Photo Gallery</a>
      </div>
    </div>

    <!-- 9. Alumni -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Alumni</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="alumni.php" class="rkdf-mob-sublink">Alumni Association Network</a>
        <a href="Alumni_Form.php" class="rkdf-mob-sublink">Alumni Registration Form</a>
        <a href="t&amp;p.php" class="rkdf-mob-sublink">Training &amp; Placement</a>
        <a href="t&amp;p.php#recruiters" class="rkdf-mob-sublink">Top Recruiters</a>
        <a href="Careers.php" class="rkdf-mob-sublink">Careers</a>
      </div>
    </div>

    <!-- 10. Info Corner -->
    <div class="rkdf-mob-acc-item">
      <button type="button" class="rkdf-mob-acc-btn">
        <span>Info Corner</span>
        <svg class="rkdf-mob-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="rkdf-mob-acc-body">
        <a href="Announcements.php" class="rkdf-mob-sublink">Announcements &amp; Circulars</a>
        <a href="News_Letter.php" class="rkdf-mob-sublink">University Newsletters</a>
        <a href="Annual_Report_University.php" class="rkdf-mob-sublink">Annual Reports</a>
        <a href="antiragging.php" class="rkdf-mob-sublink">Anti-Ragging Committee</a>
        <a href="womengrievance.php" class="rkdf-mob-sublink">Women Grievance Cell</a>
        <a href="public-disclosure.php" class="rkdf-mob-sublink">Public Disclosures</a>
        <a href="Announcements.php?cat=tender" class="rkdf-mob-sublink">E-Tenders ↗</a>
      </div>
    </div>

    <!-- Direct Contact Button in Mobile -->
    <div class="rkdf-mob-quick-links">
      <a href="contact-us.php" class="rkdf-mobile-link rkdf-mob-apply-btn">CONTACT US →</a>
      <a href="admissionform.php" class="rkdf-mobile-link rkdf-mob-login-btn">APPLY ONLINE <?= htmlspecialchars($admissionYear) ?> ↗</a>
      <a href="<?= htmlspecialchars($erpPortalUrl) ?>" target="_blank" rel="noopener noreferrer" class="rkdf-mobile-link">Student ERP Portal ↗</a>
    </div>

  </div>
</div>
</div><!-- /rkdf-navbar-wrap -->

<!-- Mobile Navigation Drawer Handler -->
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

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      if (drawer && drawer.classList.contains('active')) {
        drawer.classList.remove('active');
        if (burger) burger.setAttribute('aria-expanded', 'false');
      }
    }
  });
})();
</script>
