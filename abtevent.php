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
	<h2 class="titleDescription"><a href=""><span>&nbsp;</span>RKDF UNIVERSITY</a></h2>
	<p>&nbsp;</p>
	<p><a href="" class="thump"><img src="images/samagam logo.jpg" alt=" RKDF UNIVERSITY SANGRAAM" width="145" height="94" /></a>	  </p>
	<p><strong>SAMAGAM</strong><br />
        <strong>SCRIPTING THE FUTURE</strong></p>
	<p align="justify"><br/>
	  SAMAGAM is a National level sports Carnival being held at RKDF University Bhopal including various indoor and outdoor games.<br />
	  All the games have grand and lucrative prizes.<br />
	  The University has been organising such sports tournaments for many years, but this time the University has expanded its horizons and make this time the tournament at national level where several colleges and universities would gather together at -&quot;SAMAGAM&quot;.<br/>
	  <br/>
	</p>
				</div>
  </section>
			<!--- contentLeft -->
			<section id="sideBar">
						<aside id="customMenu" class="sidebarWidget">
			<h2> SAMAGAM </h2>
            <div class="glossymenu">
<a class="menuitem" href="samagam.php" target="_blank"><img src="images/bullet.png" />Samagam-2017</a>
<a class="menuitem" href="abtevent.php"><img src="images/bullet.png" />About The Event</a>
<a class="menuitem" href="event.php"><img src="images/bullet.png" />Events</a>
<a class="menuitem" href="samagam_reg.php"><img src="images/bullet.png" />Registration</a>
<a class="menuitem" href="samagamgallery.php" target="_blank"><img src="images/bullet.png" />Photo Gallery</a>
<a class="menuitem" href="https://www.facebook.com/samagamrkdf" target="_blank"><img src="images/bullet.png"/>Social Page</a>
<a class="menuitem" href="contactsamagam.php"><img src="images/bullet.png" />Contact Us</a>
</div>
<!--<a name="ex1" id="ex1"></a>
        			-->
		</aside>				
			</section><!--- sideBar -->
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
