<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF UNIVERSITY — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF UNIVERSITY</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<section id="content" class="wrapper ">
  <!--- spotlight -->
<section id="contentLeft">
	<div id="collegeDetail">
	<h2 class="titleDescription"><a class="menuitem" href="Hostel.php"><span>&nbsp;</span> Hostel </a></h2>
	<p class="titleDescription">&nbsp;</p>
	<p class="titleDescription"><img src="images/img/Hostel.jpg" width="604" height="453" /></p>
	<p class="titleDescription">&nbsp;</p>
	<p class="titleDescription">&nbsp;</p>
	<p class="titleDescription">&nbsp;</p>
	<p class="titleDescription">&nbsp;</p>
	<p class="titleDescription">&nbsp;</p>
	<p>Education cannot take its true shape if your life away from classrooms is not healthy and peaceful. And while studying in the your life away from classrooms will generally be at hostels. Thus, it goes without saying that the hostel facilities of your selected college must also be top-class and must receive equal scrutiny from you like the college’s faculty strength and curriculum. If your hostel life does not sit well with you, you can never concentrate well in the classrooms and your degree will suffer. </p>
	
	<p>The rooms, to be more specific. Every room must come with the basic set of furniture a student need. A bed, a private wardrobe, study table, and a chair – these are must-haves. Plus, in case the room is sharing, there should be sufficient space between the furniture of adjacent students so that everyone gets their necessary personal space. The top hostels will facilitate for all and these are the first things that you should look into. </p>
	<p>&nbsp;</p>
	<table width="660" height="236" border="1" cellspacing="0" cellpadding="1">
      <tr>
        <td width="189" height="53"><div align="center"><strong>Hostel Name</strong></div></td>
        <td width="96"><div align="center"><strong>Type</strong></div></td>
        <td width="96"><div align="center"><strong>Capacity</strong></div></td>
        <td width="113"><div align="center"><strong>Caretaker</strong></div></td>
        <td width="134"><div align="center"><strong>Incharge/ Warden</strong></div></td>
      </tr>
      <tr>
        <td height="53"><div align="center"><span class="style1">&nbsp;Kasturba Gandhi Girls Hostel</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Girls</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;95</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Ms. Pukhraj </span></div></td>
		  <td><div align="center"><span class="style1">&nbsp;Dr. V.K. Pandey</span></div></td>
      </tr>
      <tr>
        <td height="53"><div align="center"><span class="style1">&nbsp; Rabindranath Tagore International Hostel </span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Boys</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;117</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Mr. Malanand</span></div></td>
		 <td><div align="center"><span class="style1">&nbsp;Dr. V.K. Pandey</span></div></td>
      </tr>
	   <tr>
        <td height="53"><div align="center"><span class="style1">&nbsp;Swami Vivekanand Hostel </span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Boys</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;86</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Mr. Manjeet Yadav</span></div></td>
		 <td><div align="center"><span class="style1">&nbsp;Dr. V.K. Pandey</span></div></td>
      </tr>
	   <tr>
        <td height="53"><div align="center"><span class="style1">&nbsp;Dr. C V Raman Hostel </span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Boys</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;66</span></div></td>
        <td><div align="center"><span class="style1">&nbsp;Mr. Jasim Ansari</span></div></td>
		 <td><div align="center"><span class="style1">&nbsp;Dr. V.K. Pandey</span></div></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	 
	   <p>&nbsp;</p>
	   <p>&nbsp;<a href="#" class="style2">Application Forms and Rules</a></p>
	</div>
	
                <p>&nbsp;</p>
               
                <p>&nbsp;<img src="" /></p>
                <p>&nbsp;</p>
                <div align="justify"></div>
</section>
			<!--- contentLeft -->
  <section id="sideBar">
						<aside id="customMenu" class="sidebarWidget">
			<h2> Hostel </h2>
            <div class="glossymenu">
<a class="menuitem" href="Laboratories.php"><img src="images/bullet.png" /> Laboratories </a>
<a class="menuitem" href="Transport.php"><img src="images/bullet.png" /> Transport </a>
<a class="menuitem" href="Canteen.php"><img src="images/bullet.png" /> Canteen </a>
<a class="menuitem" href="Library.php"><img src="images/bullet.png" /> Library </a>
<a class="menuitem" href="Discipline-Comittee.php"><img src="images/bullet.png" /> Discipline Committee </a>
<a class="menuitem" href="Bank-And-ATM.php"><img src="images/bullet.png" /> Bank And ATM </a>
<a class="menuitem" href="Health-Care-Medical-Center.php"><img src="images/bullet.png" /> Health Care & Medical Center </a>
<a class="menuitem" href="Wi-Fi.php"><img src="images/bullet.png" />Wi-Fi Campus </a>
<a class="menuitem" href="Conference-Center.php"><img src="images/bullet.png" />Conference Center</a>
<a class="menuitem" href="Hostel.php"><img src="images/bullet.png" />Hostel</a>
<a class="menuitem" href="Campus-Radio.php"><img src="images/bullet.png" />Campus Radio</a>

</div>
            <!--<a name="ex1" id="ex1"></a>
        			-->
		</aside>
			</section>
			<!--- sideBar -->
			<br class="clear" />
		</section>
<!--- content -->		
<script type="text/javascript">
				jQuery(document).ready(function($){
						$('#mainNav li').hover(
					function(){ jQuery(this).find('.dropdown').fadeIn(300); },
					function(){ jQuery(this).find('.dropdown').fadeOut(200); }
				);
				});	
</script>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
