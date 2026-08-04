<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EEAM TIMETABLE — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">EEAM TIMETABLE</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<section id="content" class="wrapper ">
        <!--- spotlight -->
      <section id="contentLeft">
            <div id="collegeDetail">
                <h2 class="titleDescription"><a class="menuitem" href=""><span>&nbsp;</span>Examination AUG-SEP </a> 2021</h2>
                <h2 class="style6"> <strong><em><a href="#"><img src="images/img/exam.jpg" /></a></em></strong></h2>
                <p class="style6">&nbsp;</p>
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
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <!--<p><a href="examtimetable_1styr.php"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style6">Examination Time Table for 1st & 3rd Sem (Reg and Ex) Including Lateral Entry<!--<img src="images/img/new12.gif" />--></span></span></strong></a>&nbsp;
            </p>
            <!--<p>&nbsp;</p>-->

            <!--Updated on 19-Mar-2021 -->
			
			 
						<p class="table_pading">&nbsp;</p>
						
						 <a href="exam/timetable_2021/dpharm_supply.pdf" target="_blank">
                    <strong><img src="images/img/new24.gif" />
                        <span class="style1"> DIPLOMA IN PHARMACY (D.PHARMA)-<span class="style6"> SUPPLY EXAM</span></span></strong></a><img src="images/img/new11.gif" /></p>
						 
              <p class="table_pading">&nbsp;</p>
          <!--
				<p>
			<a href="exam/timetable_dec20/B.Com 2-6.pdf" target="_blank">
			<strong><img src="images/img/new24.gif" /> <span class="style1">B.COM 2nd to 6th Sem<span class="style6"> (Plain & Computer)</span></span></strong></a>
			</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Com Hons.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">B.COM 2nd to 6th Sem<span class="style6"> ( B.Com Hons )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.E AG.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">B.TECH AGRICULTUR<span class="style6"> ( B.TECH AG. )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Sc AG.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">B.SC. AGRICULTUR<span class="style6"> ( B.Sc. (Hons) )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Sc.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF SCIENCE<span class="style6"> ( B.SC. )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BA.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF ART<span class="style6"> ( BA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BALLB.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF LAW<span class="style6"> ( BALLB )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/LLB.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF LAW<span class="style6"> ( LLB )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BBA.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BBA<span class="style6"> ( BBA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BCA.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BCA<span class="style6"> ( BCA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BSW.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BSW<span class="style6"> ( BSW )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Arch.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">B.ARCH<span class="style6"> ( B.ARCH )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BHMS.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BHMS<span class="style6"> ( BHMS )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Pharmacy OLD.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF PHARMACY<span class="style6"> ( B.PHARM OLD SCHEME )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.Pharmacy NEW.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF PHARMACY<span class="style6"> ( B.PHARM NEW SCHEME )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BE.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF ENGINEERING<span class="style6"> ( BE )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/BE Eng Part Time.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF ENGINEERING<span class="style6"> ( BE-PART TIME)</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/B.ED.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BACHELOR OF EDUCATION<span class="style6"> ( B.ED)</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/Diploma.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">DIPLOMA ENGINEERING<span class="style6"> ( DIPLOMA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/Diploma Eng   Part Time.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">DIPLOMA ENGINEERING<span class="style6"> ( DIPLOMA PART TIME )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/LLM.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF LAW<span class="style6"> ( LLM )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/M.Com.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF COMMERCE<span class="style6"> ( M.COM )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/M.Tech.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF TECHNOLOGY<span class="style6"> ( M.TECH )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/M.Pharm.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF PHARMACY<span class="style6"> ( M.Pharm )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/MA.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF ARTS <span class="style6"> ( MA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/MSC.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF SCIENCE<span class="style6"> ( MSC )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/MED.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF EDUCATION<span class="style6">( M.ED)</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/MSC AG.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MASTER OF AGRICULTUR<span class="style6">( M.Sc(Ag))</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
                <p><a href="exam/timetable_dec20/MBA New.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MBA NEW SCHEME<span class="style6"> ( MBA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				 <p><a href="exam/timetable_dec20/MBA Old.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MBA OLD SCHEME<span class="style6"> ( MBA )</span></span></strong></a>&nbsp;</p>
                 <p>&nbsp;</p>
				 <p><a href="exam/timetable_dec20/MCA.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MCA<span class="style6"> ( MCA )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/MSW.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">MSW<span class="style6"> ( MSW )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>
				<p><a href="exam/timetable_dec20/M.Arch.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">M.ARCH<span class="style6"> ( M.ARCH )</span></span></strong></a>&nbsp;</p>
                <p>&nbsp;</p>-->
          <p>&nbsp;</p>
          <!--<p><a href="exam/timetable_june20/special_online/B.pharm old scheme.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">B.Pharma (Old Scheme) <span class="style6">( All Sem)</span></span> </strong></a>&nbsp;</p>
                <p>&nbsp;</p>-->

          <!--<p><a href="exam/timetable_june20/BE Eng Part time.pdf" target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/new24.gif" /><span class="style1">BE  (Part Time) <span class="style6">(All Sem)</span></span> </strong></a>&nbsp;</p>
                <p>&nbsp;</p>-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div align="justify"></div>
      </section>

        <!--- contentLeft -->
        <section id="sideBar">

            <aside id="customMenu" class="sidebarWidget">

                <h2> Exam Alert </h2>
                <div class="glossymenu">
                    <a class="menuitem" href="exam.php"><img src="images/bullet.png" /> Examination Alert</a>
                    <a class="menuitem" href="examtimetable.php"><img src="images/bullet.png" /> Online Assessmen Time Table</a>
                    <a class="menuitem" href="Result.php"><img src="images/bullet.png" /> Result </a>
                    <a class="menuitem" href="https://erplive.rkdf.ac.in/" target="_blank"><img
                           src="images/bullet.png" />Student Login</a>
                    <a class="menuitem" href="exam/Degree _Migration form Hnd.pdf" target="_blank"><img
                           src="images/bullet.png" />Degree form Hindi </a>
                    <a class="menuitem" href="exam/Degree _Migration form Eng.pdf" target="_blank"><img
                           src="images/bullet.png" />Degree form Eng </a>               </div>
                <!--<a name="ex1" id="ex1"></a>-->
           </aside>
        </section>
        <!--- sideBar -->
        <br class="clear" />
    </section>

    <!--- content -->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#mainNav li').hover(
            function() {
                jQuery(this).find('.dropdown').fadeIn(300);
            },
            function() {
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
