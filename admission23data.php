<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF Admission 2023 — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF Admission 2023</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<table width="1200" border="0" bgcolor="#EAF1E2">
  <tr>
    <td width="1153" colspan="4">&nbsp;
	     <table width="1199" bgcolor="#FFDDBB" height="135" border="0" cellpadding="3" cellspacing="4">
          <tr>
            <td width="311" rowspan="4" class="style4"><div align="right"><img src="images/img/letter ped logo.JPG" width="70" height="77" />&nbsp;&nbsp;</div></td>
          <td width="855" class="style3" align="left"><span class="style10"> RKDF UNIVERSITY</span> </td>
        </tr>
          <tr>
            <td height="29" class="style4">
            <div align="left"><strong> Airport Bypass Road, Gandhi Nagar, Bhopal</strong> (462033)</div></td>
        </tr>
          <tr>
            <td height="26" class="style4"><div align="left"><strong> http:www.rkdf.ac.in, Email: <a href="mailto:info@rkdf.ac.in">info@rkdf.ac.in</a></strong></div></td>
        </tr>
          <tr>
            <td height="21" class="style4">&nbsp;</td>
        </tr>
    </table>	</td>
  </tr>
  <tr>
    <td height="37" colspan="4">
    <div align="center" class="style5"><u> SHOW ADMISSION QUERY DETAILS- 2023-2024 : </u> </div></td>
  </tr>
</table>

<table width="1205" border="1"  cellpadding="0" cellspacing="0">
<tr>
<td width="1249">
<table width="1200" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
    <td width="61" height="64"><span class="style11">S.NO. </span></td>
    <td width="191"><span class="style11">NAME</span></td>
    <td width="235"><span class="style11">COURSE</span></td>
    <td width="178"><span class="style11">BRANCH</span></td>
    <td width="154"><span class="style11">MOBILE</span></td>
    <td width="196"><span class="style11">EMAIL</span></td>
    <td width="169"><span class="style11">PLACE</span></td>
   
  </tr>
  <?php
	   $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   //$con=mysql_connect("localhost","root","rootwdp");
	   mysql_select_db("rkhare_result2013",$con);
		 
   	 $qry=" select * from admission23";
	
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			echo "<td>".$row["sno"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["course"]."</td>";
			echo "<td>".$row["branch"]."</td>";
			echo "<td>".$row["mob"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["place"]."</td>";
			echo "</tr>";
			echo "<tr hight='1' bgcolor='#FF8040'>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "</tr>";
			}
  mysql_close($con);
	  ?>
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
