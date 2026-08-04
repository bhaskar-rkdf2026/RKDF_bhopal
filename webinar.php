<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF UNIVERSITY || SANGRAAM — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF UNIVERSITY || SANGRAAM</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img/logo33.png" height="129" />
 <img src="images/img/logo22.png" width="1077" height="124" />
<table bgcolor="#F0F0E1" width="1140" align="center" valign="top" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="6" height="900" width="802">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://us02web.zoom.us/webinar/register/WN_CGrrZ22xRH2HXEUZKGILAw" target="_blank"><img src="images/img/Webinar on Career.jpg"  width="798" />    </td>
    <td width="319" height="55"><span class="style1">To Join  (follow any one procedure)</span></td>
  </tr>
  <tr>
    <td height="46">&nbsp;<a href="https://us02web.zoom.us/webinar/register/WN_CGrrZ22xRH2HXEUZKGILAw" target="_blank"><span class="style2">1. Please Register (free) via link <br /> 
    &nbsp;&nbsp;&nbsp; Join Us Live on Zoom App</span> </a></td>
  </tr>
  <tr>
    <td height="25">(Zoom Meeting Id-  816 6861 1520)</td>
	
	  <td width="19" height="25">&nbsp;</td>
  </tr>
  <tr>
    <td height="90">&nbsp; <a href="https://docs.google.com/forms/d/e/1FAIpQLSfLWgna208MXmCsHNMowPBwnU87tG19lRaOfEFplafpJJeCFg/viewform" target="_blank"><span class="style2">2.	Fill form (free) </span> </a><br />
    <br /><span class="style2">&nbsp;&nbsp;<a href="https://www.facebook.com/rkdfuniversitybhopal/" target="_blank">3. Like our facebook page</a> </span><br /> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
