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
$qry = "SELECT * FROM  resultiindsem WHERE rollno='".$xrno."'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
	$rno=$row["rollno"];
	$name=$row["name"];	
	$fname=$row["fname"];		
	$course=$row["course"];		
	$subcode=$row["subcode"];
	$subcode2=$row["subcode2"];	
	$subcode3=$row["subcode3"];	
	$subcode4=$row["subcode4"];	
	$subcode5=$row["subcode5"];	
	$subcode6=$row["subcode6"];			
	$paper=$row["paper"];
	$paper2=$row["paper2"];
	$paper3=$row["paper3"];
	$paper4=$row["paper4"];
	$paper5=$row["paper5"];
	$paper6=$row["paper6"];		
	$dmarkstotal=$row["dmarkstotal"];
	$dmarkstotal2=$row["dmarkstotal2"];
	$dmarkstotal3=$row["dmarkstotal3"];
	$dmarkstotal4=$row["dmarkstotal4"];
	$dmarkstotal5=$row["dmarkstotal5"];
	$dmarkstotal6=$row["dmarkstotal6"];
	$theory=$row["theory"];
	$theory2=$row["theory2"];	
	$theory3=$row["theory3"];	
	$theory4=$row["theory4"];	
	$theory5=$row["theory5"];	
	$theory6=$row["theory6"];			
	$internal=$row["internal"];	
	$internal2=$row["internal2"];	
	$internal3=$row["internal3"];	
	$internal4=$row["internal4"];	
	$internal5=$row["internal5"];	
	$internal6=$row["internal6"];		
	$prectical=$row["prectical"];
	$prectical2=$row["prectical2"];	
	$prectical3=$row["prectical3"];	
	$prectical4=$row["prectical4"];	
	$prectical5=$row["prectical5"];	
	$prectical6=$row["prectical6"];					
	$omarkstotal=$row["omarkstotal"];
	$omarkstotal2=$row["omarkstotal2"];
	$omarkstotal3=$row["omarkstotal3"];
	$omarkstotal4=$row["omarkstotal4"];
	$omarkstotal5=$row["omarkstotal5"];
	$omarkstotal6=$row["omarkstotal6"];		
	$grandtotalfig=$row["grandtotalfig"];		
	$grandtotalwrd=$row["grandtotalwrd"];		
	$fresult=$row["fresult"];		
	
?>
<table class="bg" width="71%"  border="0" align="center" cellpadding="0" cellspacing="0">
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
	<table width="98%" cellpadding="0" cellspacing="0"  border="1">
        <tr>
          <td colspan="4" ><div align="center"><strong>EXAMINATION JUN - 2013 </strong></div></td>
        </tr>
		<tr>
          <td width="39%" class="fonttb" ><strong>&nbsp;ROLL NO. : </strong></td>
          <td width="33%" class="fonttb" ><strong><?php echo $rno; ?></strong> </td>
          <td width="16%" class="fonttb" ><div align="center"><strong>STATUS :</strong></div></td>
          <td width="12%" class="fonttb"><div align="center"><strong>Regular</strong></div></td>
        </tr>
        <tr>
          <td class="fonttb" ><strong>&nbsp;NAME OF STUDENT : </strong></td>
          <td class="fonttb" ><strong><?php echo $name; ?></strong></td>
          <td class="fonttb" ><div align="center"><strong>SEMESTER</strong></div></td>
          <td class="fonttb"><div align="center"><strong>SECOND</strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><strong>&nbsp;FATHER'S/HUSBAND NAME : </strong></td>
          <td colspan="3" class="fonttb"><strong><?php echo $fname; ?></strong> </td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><?php echo $course; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="98%" height="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="124" rowspan="3" class="fonttb"><div align="center"><strong>SUBJECT CODE </strong></div></td>
          <td width="271" rowspan="3" class="fonttb"><div align="center"><strong>TITLE OF PAPER </strong></div></td>
          <td width="98" rowspan="3" class="fonttb"><div align="center"><strong>MARKS TOTAL</strong></div></td>
		  
          <td colspan="5" class="fonttb"><div align="center"><strong>MARKS OBTAINED </strong></div></td>
        </tr>
        <tr>
          <td width="97" rowspan="2" class="fonttb"><div align="center"><strong>THEORY</strong></div></td>
          <td width="97" rowspan="2" class="fonttb"><div align="center"><strong>INTERNAL</strong></div></td>
          <td width="97" rowspan="2" class="fonttb"><div align="center"><strong>PRACTICAL</strong></div></td>
          <td width="100" rowspan="2" class="fonttb"><div align="center"><strong>TOTAL</strong> <strong>MARKS </strong></div></td>
        </tr>
        <tr>        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal2; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal3; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal4; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal5; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $paper6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal6; ?></strong></div></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="87%" height="77" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="231" rowspan="2" class="fonttb"><div align="center"><strong>GRAND TOTAL : </strong></div></td>
          <td width="132" height="27" class="fonttb"><strong>IN FIGURES </strong></td>
          <td width="432" class="fonttb"><strong><?php echo $grandtotalfig; ?></strong></td>
        </tr>
        <tr>
          <td class="fonttb"><strong>IN WORDS </strong></td>
          <td class="fonttb"><strong><?php echo $grandtotalwrd; ?></strong></td>
        </tr>
        <tr>
          <td class="fonttb"><div align="center"><strong>RESULT : </strong></div></td>
          <td colspan="3" class="fonttb"><strong><?php echo $fresult; ?></strong></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
