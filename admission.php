<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admission form — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">admission form</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  <tr>
    <td width="287">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="621">&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php
$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   mysql_select_db("rkhare_result2013",$con);
   	 //$qry=" select id from student where adhar='".$adhar."'";
	$qry="select id from student where id = (SELECT MAX(ID) from student)";
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			$xid= $row["id"];
			$_SESSION["rid"]=$xid;
			echo $xid;
			}
  mysql_close($con);
			 ?> <span class="style11">&nbsp;&nbsp;(Plz save this ID )</span></span></td>
  </tr>
  
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">STUDENT  NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $name; ?></span></td>
  </tr>

  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">FATHER'S NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $fname; ?></span></td>
  </tr>
 <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">COURSE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $course; ?></span></td>
 </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BRANCH</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $branch; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">ADHAR ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $adhar; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">

      <div align="left">MOBILE NO. </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $mob; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">EMAIL ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $email; ?></span></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">GENDER</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $gen; ?></span></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">CATEGORY</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $cat; ?></span></td>
  </tr>
  

  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">RESIDENTIAL ADDRESS</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $add1; ?></span></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DOMICILE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $dom; ?></span></td>
  </tr>
    
  <tr>
    <td height="31">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">REFRENCE BY</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $ref; ?></span></td>
  </tr>

  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;<a href="cheakout.php">
      <input type="submit" name="Submit" value="PAYNOW" /></a>
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
