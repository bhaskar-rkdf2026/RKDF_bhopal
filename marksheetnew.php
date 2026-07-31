<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style8 {font-size: 35px;
	font-weight: bold;
}
.style1 {	font-size: 24px;
	font-weight: bold;
}
.bg
{background-image:url(result2013/logobg_2.png);
background-repeat:no-repeat;
background-position:center;
background-attachment:scroll;
}
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.fonttb
{font-size:15px;}
-->
</style>
</head>

<body >
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
</body>
</html>
