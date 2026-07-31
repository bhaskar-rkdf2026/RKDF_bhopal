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
</body>
</html>
