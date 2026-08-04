<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDUCATION GLORIFIES NATION — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0;
      background: var(--p-paper);
      color: var(--p-navy-deep);
      font-size: 16px;
      line-height: 1.8;
    }
    .sp-main-box table {
      width: 100%;
      border-collapse: collapse;
      margin: 28px 0;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      border: 1px solid var(--p-hairline);
    }
    .sp-main-box th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 16px 20px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .sp-main-box td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
    }
    .sp-main-box tr:hover td {
      background: rgba(220,38,38,0.03);
    }
    .sp-main-box a {
      color: var(--p-gold);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s;
    }
    .sp-main-box a:hover {
      text-decoration: underline;
      color: #b91c1c;
    }
    .sp-main-box img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: contain;
    }
    .glossymenu a.menuitem {
      display: inline-block;
      padding: 10px 18px;
      margin: 4px;
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 8px;
      color: var(--p-navy-deep);
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s;
    }
    .glossymenu a.menuitem:hover {
      background: var(--p-gold);
      color: #ffffff;
      border-color: var(--p-gold);
    }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">RKDF University Bhopal</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">EDUCATION GLORIFIES NATION</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<section id="content" class="wrapper ">
        <!--- spotlight -->
        <section id="contentLeft">
            <div id="collegeDetail">
                <h2 class="titleDescription"><a href="academic&departments.php"><span>&nbsp;</span> Policies of the
                        University </a></h2>
                <p class="titleDescription">&nbsp;</p>
                <p class="titleDescription">&nbsp;</p>
                <!-- <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="approval/NIRF/RKDF University-Overall.pdf" target="_blank"><strong>RKDF University - Overall (NIRF 2023)</strong></a></p>
                               <br /><br /><br />-->
                <img src="images/policy.jpg" />
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p>&nbsp; </p>
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/strategic_plan.pdf"
                        target="_blank"><strong>Strategic Plan</strong></a></p>
                <br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/"
                        target="_blank"><strong>Financial Regulation</strong></a></p>
                <br />
				 <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="research/Research_Policy_RKDF_University.pdf"
                        target="_blank"><strong>Research Policy</strong></a></p>
                <br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/IT_policy.pdf"
                        target="_blank"><strong>IT Policy</strong></a></p>
                <br />

                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="https://rkdf.ac.in/research/consultancy_policy.pdf" target="_blank"
                        title="consultancy Policy"><strong>Consultancy Policy</strong></a></p>
                <br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="images/06/antiragging/antiragging_form.pdf" target="_blank"><strong>Antiragging Policy and
                            Committee</strong></a></p>
                <br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/maintenance_policy.pdf"
                        target="_blank"><strong>Maintenance Policy</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Code_of_ethics_Policy.pdf" target="_blank"><strong>Code of Ethics for Teachers and
                            Students</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="images/06/Student Grievance Redressal Committee (SGRC)- 2022.pdf"
                        target="_blank"><strong>Policy for Grievance Redressal for Students</strong></a></p>
                <br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="images/06/Woman_Grievance_Cell.pdf" target="_blank"><strong>Policy for Grievance Redressal
                            for Employee</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/HR_Policy.pdf" title=""
                        target="_blank"><strong>HR Policy</strong></a></p><br />

                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Green Campus policy.pdf" title="" target="_blank"><strong>Green Campus</strong></a>
                </p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="Policy/students code of conduct.pdf" title="" target="_blank"><strong>Code of Conduct for
                            Students</strong></a>
                </p><br />

                <!-- Human Value and Professional Ethics -->
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="Policy/Handbook_for_Human_values_and_Professional_Ethics.pdf" title="" target="_blank"><strong>Handbook - Human Value and Professional Ethics</strong></a>
                </p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="Policy/Manual_Human_Value_Manual.pdf" title="" target="_blank"><strong>Manual - Human Value and Professional Ethics</strong></a>
                </p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="Policy/Brochures_on_Human_Value_and_Professional_Ethics.pdf" title="" target="_blank"><strong>Brochure - Human Value and Professional Ethics</strong></a>
                </p><br />
                <!-- Human values complete -->

                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Divyangjan_friendly policy.pdf" title="" target="_blank"><strong> Divyangjan-Friendly Policy</strong></a></p><br />
							 <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Inhouse_Scheme_Policy.pdf" title="Inhouse Policy" target="_blank"><strong> Inhouse Scheme Policy</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Savitribai_Phule_Scholarship_Policy.pdf" title=""
                        target="_blank"><strong>Savitribai Phule Scholarship Policy</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Meritorious_Scheme_Policy.pdf" title="" target="_blank"><strong>Meritorious Scheme
                            Policy</strong></a></p><br />


                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Single use plastic ban policy.pdf" title="" target="_blank"><strong>Single Use
                            Plastic Ban Policy</strong></a></p><br />


                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Policy/Welfare_Policy.pdf"
                        target="_blank"><strong>Welfare Policy</strong></a></p><br />
                <p class="titleDescription"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="Policy/Performance_Appraisal_Policy" target="_blank"><strong>Performance Appraisal
                            Policy</strong></a></p><br />

                <p class="titleDescription">&nbsp;</p>
                <p class="titleDescription">&nbsp;</p>
                <p class="titleDescription">&nbsp;</p>

                <p class="titleDescription style3">&nbsp;</p>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </section>
        <!--- contentLeft -->
        <section id="sideBar">
            <aside id="customMenu" class="sidebarWidget">
            </aside>
        </section>
        <!--- sideBar -->
        <br class="clear" />
    </section>
    <!--- content -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#mainNav li').hover(
                function () {
                    jQuery(this).find('.dropdown').fadeIn(300);
                },
                function () {
                    jQuery(this).find('.dropdown').fadeOut(200);
                }
            );
        });
    </script>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
