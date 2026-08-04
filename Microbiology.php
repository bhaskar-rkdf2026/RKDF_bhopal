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
	<h2 class="titleDescription"><a href="Microbiology.php"><span>&nbsp;</span> Microbiology </a></h2>
	<p class="titleDescription">&nbsp;</p>
	<blockquote>
	  
	  <p class="style14"> The backbone of the department is the intellectual rigor provided by a dedicated faculty and students coming from all across the country. The Department has a strong base in Microbial technology and the main focus of the program is on Genetics, Molecular Biology, Industrial Microbiology, Immunology and other contemporary areas allied to Microbiology and Biotechnology. Basic training is given in Microbiology, Biochemistry, Genetics, Developmental Biology, Genetic Engineering, Biochemical Engineering and some aspects of Biophysics, Biostatistics, Environmental Biology. </p>
	  </blockquote>
	</div>
                <div align="justify"></div>
</section>
			<!--- contentLeft -->
  <section id="sideBar">
						<aside id="customMenu" class="sidebarWidget">
			<h2>Microbiology</h2>
            <div class="glossymenu"> 
			<a class="menuitem" href="Science-Faculty.php"><img src="images/bullet.png" /> Science Faculty </a>
			<a class="menuitem" href="Mathematics.php"><img src="images/bullet.png" /> Mathematics </a>
			<a class="menuitem" href="Physics.php"><img src="images/bullet.png" /> Physics </a>
			<a class="menuitem" href="Biology.php"><img src="images/bullet.png" /> Biology </a>
			 <a class="menuitem" href="Zoology.php"><img src="images/bullet.png" /> Zoology </a>
			  <a class="menuitem" href="Botany.php"><img src="images/bullet.png" /> Botany </a>
			   <a class="menuitem" href="Chemistry.php"><img src="images/bullet.png" /> Chemistry </a> 
			   <a class="menuitem" href="Biotechnology.php"><img src="images/bullet.png" /> Biotechnology </a>
			    <a class="menuitem" href="Microbiology.php"><img src="images/bullet.png" /> Microbiology </a>
				 <a class="menuitem" href="Environmental.php"><img src="images/bullet.png" /> Environmental </a>
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
