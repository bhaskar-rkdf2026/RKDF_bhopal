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
    <td colspan="4" align="center"><img src="images/header.jpg" width="872" height="155"   /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="285" height="54" align="left"></td>
    <td width="911"  colspan="3">
    <div align="left" class="style5"><u>SHOW ALL ADMISSION ENQUIRY - 2021-22  </u> </div></td>
  </tr>
</table>
<?php
	if (isset($_SESSION["user"]))
	{
	?>
<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="2000" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
    <td width="76" height="75"><span class="style11">REG ID </span></td>
	<td width="98" height="75"><span class="style11">ORDER ID </span></td>
	 <td width="94" height="75"><span class="style11">STATUS </span></td>
	 <td width="139" height="75"><span class="style11">TXN DATE </span></td>
    <td width="95" height="75"><span class="style11">TXN AMOUNT </span></td>
	    <td width="113"><span class="style11">REFERENCE BY </span></td>
    <td width="151"><span class="style11">STUDENT NAME</span></td>
    <td width="133"><span class="style11">F/H NAME</span></td>
    <td width="165"><span class="style11">COURSE</span></td>
    <td width="132"><span class="style11">BRANCH</span></td>
    <td width="105"><span class="style11">MOBILE</span></td>
    <td width="128"><span class="style11">EMAIL ID</span></td>
	<td width="254" height="75"><span class="style11">TXN ID </span></td>
	<td width="99" height="75"><span class="style11">BANK TXN ID </span></td>
	 <td width="91" height="75"><span class="style11">BANK NAME </span></td>
    <td width="93" height="75"><span class="style11">PAYMENT MODE </span></td>
  </tr>
  
 <?php
 
$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
$qry="select * from pay order by id DESC ";
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			//echo "<td>".$row["id"]."</td>";
			echo "<td><a href='details.php?cnslwis=".$row["id"]."&regtestwid=".$row["bankid"]."'>".$row["id"]."</a></td>";
			echo "<td>".$row["order_id"]."</td>";
			echo "<td>".$row["status"]."</td>";
			echo "<td>".$row["txndate"]."</td>";
			echo "<td>".$row["txnamount"]."</td>";
			echo "<td>".$row["ref"]."</td>";  
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["course"]."</td>";
			echo "<td>".$row["branch"]."</td>"; 
			echo "<td>".$row["mob"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["txnid"]."</td>";
			echo "<td>".$row["bankid"]."</td>";
			echo "<td>".$row["bankname"]."</td>";
			echo "<td>".$row["payment_mode"]."</td>";
			echo "</tr>";
			echo "<tr hight='4' bgcolor='#FF8040'>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";  
			echo "<td></td>";
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
 <div align="center">
   <?php
 }
  else
	{
	 echo "<b>Sorry ! You Not Show This Page plz First</b><a href='home_login.php'> Login !</a>";
	}
	 ?>
 </div>
 <p>&nbsp;</p>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
