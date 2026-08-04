<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Untitled Document — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Untitled Document</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<table width="100%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><img src="images/header.jpg"  width="79%" height="46%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="297" height="54" align="left"></td>
    <td width="1003"  colspan="3"> 
    <div align="left" class="style5"><u> <?php echo $name; ?> &nbsp;&nbsp; ADMISSION ENQUIERY DETAILS</u> </div></td>
  </tr>
</table>
<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  
  <tr>
    <td width="163" height="32">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
 <tr>
    <td height="25">&nbsp;</td>
    <td width="213"><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td width="5"><span class="style7">:</span></td>
    <td width="723"><span class="style10">&nbsp;<?php echo $id; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">STUDENT  NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $name; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">FATHER'S NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $fname; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">COURSE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $course; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BRANCH </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $branch; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">AADHAR ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $adhar; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">

      <div align="left">MOBILE NO. </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $mob; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">EMAIL ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $email; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">GENDER </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $gen; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">CATEGORY </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $cat; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">RESIDENTIAL ADDRESS </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $address; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DOMICILE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $dom; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">REFRENCE BY </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $ref; ?></span></td>
  </tr>
    <tr>
    <td height="228">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">ACADEMIC QUALIFICATION</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>
	<table width="625" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td width="152" height="46"><strong>Exam passed</strong></td>
        <td width="139"><strong>Name of Board/University</strong></td>
        <td width="76"><strong>Year of Passing</strong></td>
        <td width="65"><strong>Total Mark</strong></td>
        <td width="76"><strong>Mark Obtained</strong></td>
        <td width="67"><strong>% of Marks</strong></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;&nbsp;10Th</strong></td>
        <td><input type="text" name="nob1" size="20" style="text-transform: uppercase;" value="<?php echo $nob1; ?>" required></td>
        <td><input type="text" name="yop1" size="6" value="<?php echo $yop1; ?>" required></td>
        <td><input type="text" name="tm1" size="6" value="<?php echo $tm1; ?>" required></td>
        <td><input type="text" name="mo1" size="6" value="<?php echo $mo1; ?>" required></td>
        <td><input type="text" name="per1" size="6" value="<?php echo $per1; ?>" required /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;&nbsp;12Th</strong></td>
        <td><input type="text" name="nob2" style="text-transform: uppercase;" value="<?php echo $nob2; ?>" size="20" /></td>
        <td><input type="text" name="yop2" size="6" value="<?php echo $yop2; ?>" /></td>
        <td><input type="text" name="tm2" size="6" value="<?php echo $tm2; ?>" /></td>
        <td><input type="text" name="mo2" size="6" value="<?php echo $mo2; ?>" /></td>
        <td><input type="text" name="per2" size="6" value="<?php echo $per2; ?>" /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;DIPLOMA</strong></td>
        <td><input type="text" name="nob3" style="text-transform: uppercase;" value="<?php echo $nob3; ?>" size="20" /></td>
        <td><input type="text" name="yop3" size="6" value="<?php echo $yop3; ?>"/></td>
        <td><input type="text" name="tm3" size="6"  value="<?php echo $tm3; ?>"/></td>
        <td><input type="text" name="mo3" size="6"  value="<?php echo $mo3; ?>"/></td>
        <td><input type="text" name="per3" size="6" value="<?php echo $per3; ?>" /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;GRADUATION</strong></td>
        <td><input type="text" name="nob4" style="text-transform: uppercase;" value="<?php echo $nob4; ?>" size="20" /></td>
        <td><input type="text" name="yop4" size="6" value="<?php echo $yop4; ?>" /></td>
        <td><input type="text" name="tm4" size="6" value="<?php echo $tm4; ?>" /></td>
        <td><input type="text" name="mo4" size="6" value="<?php echo $mo4; ?>"/></td>
        <td><input type="text" name="per4" size="6" value="<?php echo $per4; ?>" /></td>
      </tr>
	  <tr>
        <td height="36"><strong>&nbsp;&nbsp;&nbsp;POST GRAD.</strong></td>
        <td><input type="text" name="nob5" style="text-transform: uppercase;" value="<?php echo $nob5; ?>" size="20" /></td>
        <td><input type="text" name="yop5" size="6" value="<?php echo $yop5; ?>"/></td>
        <td><input type="text" name="tm5" size="6" value="<?php echo $tm5; ?>"/></td>
        <td><input type="text" name="mo5" size="6" value="<?php echo $mo5; ?>"/></td>
        <td><input type="text" name="per5" size="6" value="<?php echo $per5; ?>" /></td>
      </tr>
    </table></td>
    </tr>
   <tr>
    <td height="64">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
     <div align="right"><a href="http://rkdf.ac.in/admission_success_details.php" title="RETURN TO HOME PLZ CLICK HERE"><img src="images/return.jpg" width="163" height="48" title="RETURN TO HOME PLZ CLICK HERE" /></a></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>

</td>
</tr>
</table>
<p>&nbsp;</p>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
