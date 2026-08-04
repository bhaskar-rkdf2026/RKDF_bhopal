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
<?php
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
			if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	mysql_select_db("rkhare_result2013",$con);
	$xrno=$_SESSION['xrno'];
$qry = "SELECT * FROM  phdresult WHERE rollno='".$xrno."'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
	$rno=$row["rollno"];
	$name=$row["name"];	
	$enroll=$row["enrollmentno"];		
	$course=$row["course"];		
	$subcode=$row["subcode1"];
	$subcode2=$row["subcode2"];	
	$subcode3=$row["subcode3"];	
	$paper=$row["subname1"];
	$paper2=$row["subname2"];
	$paper3=$row["subname3"];
	$theory1=$row["theory1"];	
	$theory2=$row["theory2"];	
	$theory3=$row["theory3"];	
	$marks=$row["marks"];
	$inwords=$row["inword"];		
	$result=$row["result"];		
	
?>
<table class="bg" width="65%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" rowspan="3"><img src="result2013/RKDF LOGO2.png" width="118" height="160" /></td>
    <td height="75" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span></td>
  </tr>
  <tr>
    <td height="41" colspan="2" align="center"><span class="style9">&quot;Established under M.P. Govt. Act and Registered with UGC under Act2(f) 1956&quot;</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center"><span class="style1 style7">STATEMENT OF MARKS </span></td>
  </tr>
   <tr>
    <td colspan="3">
	<table width="93%" height="105"  border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="4" ><div align="center"><strong>EXAMINATION JUN - 2013 </strong></div></td>
        </tr>
		<tr>
          <td width="23%" height="25" class="fonttb" ><strong>&nbsp;ROLL NO : </strong></td>
          <td width="49%" class="fonttb" ><strong><?php echo $rno; ?></strong> </td>
          <td width="16%" class="fonttb" ><div align="center"><strong>STATUS :</strong></div></td>
          <td width="12%" class="fonttb"><div align="center"><strong>Regular</strong></div></td>
        </tr>
        <tr>
          <td height="27" class="fonttb" ><strong>&nbsp;NAME OF STUDENT : </strong></td>
          <td colspan="3" class="fonttb" ><strong><?php echo $name; ?></strong></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><strong>&nbsp;ENROLLMENT NO : </strong></td>
          <td colspan="3" class="fonttb"><strong><?php echo $enroll; ?></strong> </td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td height="34" colspan="3" align="center"><strong><?php echo $course; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="93%" height="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="174" class="fonttb"><div align="center"><strong>SUBJECT CODE </strong></div></td>
          <td width="416" class="fonttb"><div align="center"><strong>TITLE OF PAPER </strong></div></td>
          <td width="150" class="fonttb"><div align="center"><strong>MARKS TOTAL</strong></div></td>
		  
          <td colspan="5" class="fonttb"><div align="center"><strong>MARKS OBTAINED </strong></div></td>
        </tr>
        
        
        <tr>
          <td height="29" class="fonttb"><div align="center"><strong><?php echo $subcode; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong>100</strong></div></td>
          <td width="119" class="fonttb"><div align="center"><strong><?php echo $theory1; ?></strong></div></td>
        </tr>
        <tr>
          <td height="30" class="fonttb"><div align="center"><strong><?php echo $subcode2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong>100</strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory2 ?></strong></div></td>
        </tr>
        <tr>
          <td height="34" class="fonttb"><div align="center"><strong><?php echo $subcode3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong>100</strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory3 ?></strong></div></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td height="114" colspan="3">
	<table width="87%" height="77" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="231" rowspan="2" class="fonttb"><div align="center"><strong>GRAND TOTAL : </strong></div></td>
          <td width="132" height="27" class="fonttb"><strong>IN FIGURES </strong></td>
          <td width="432" class="fonttb"><strong><?php echo $marks; ?></strong></td>
        </tr>
        <tr>
          <td class="fonttb"><strong>IN WORDS </strong></td>
          <td class="fonttb"><strong><?php echo $inwords; ?></strong></td>
        </tr>
        <tr>
          <td class="fonttb"><div align="center"><strong>RESULT : </strong></div></td>
          <td colspan="3" class="fonttb"><strong><?php echo $result; ?></strong></td>
        </tr>
    </table>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>NOTE:-</strong> This is a Computer Generated Statement Should Not Be Treated As Original* </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
}
?>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
