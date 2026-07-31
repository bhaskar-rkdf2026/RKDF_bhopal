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
.style8 {font-size: 30px;
	font-weight: bold;
}
.style1 {	font-size: 21px;
	font-weight: bold;
}
.bg
{background-image:url(logobg_2.png);
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

<body  bgcolor="#E6E9D1" >
<?php
 /*?>$con=mysql_connect("localhost","root","rootwdp"); 
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");

<?php */?>
<?php
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	mysql_select_db("rkhare_result2013",$con);
	$xrno=$_SESSION['xrno'];
$qry = "SELECT * FROM  industrialsafety WHERE rollno='".$xrno."'";
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
	$paper=$row["paper1"];
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
	$prectical=$row["internal"];
	$prectical2=$row["internal2"];	
	$prectical3=$row["internal3"];	
	$prectical4=$row["internal4"];	
	$prectical5=$row["internal5"];	
	$practical8=$row["practical8"];
	$omarkstotal=$row["omarkstotal"];
	$omarkstotal2=$row["omarkstotal2"];
	$omarkstotal3=$row["omarkstotal3"];
	$omarkstotal4=$row["omarkstotal4"];
	$omarkstotal5=$row["omarkstotal5"];
	$omarkstotal8=$row["omarkstotal8"];	
	$grandtotalfig=$row["grandtotalfig"];		
	$grandtotalwrd=$row["grandtotalwrd"];		
	$fresult=$row["fresult"];	
		
	
?>
<table class="bg" width="65%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13%" rowspan="3"><img src="RKDF LOGO2.png" width="102" height="122" /></td>
    <td height="52" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span></td>
  </tr>
  <tr>
    <td height="42" colspan="2" align="center"><span class="style9">&quot;Established under M.P. Govt. Act and Registered with UGC under Act2(f) 1956&quot;</span></td>
  </tr>
  <tr>
    <td height="26" colspan="2" align="center"><span class="style1 ">STATEMENT OF MARKS </span></td>
  </tr>
   <tr>
    <td colspan="3">
	<table width="94%" cellpadding="0" cellspacing="0"  border="1">
        <tr>
          <td height="22" colspan="4" >&nbsp;</td>
        </tr>
		<tr>
          <td width="29%" class="fonttb" ><strong>ROLL NO. : </strong></td>
          <td width="44%" class="fonttb" ><strong><?php echo $rno; ?> </strong></td>
          <td width="16%" class="fonttb" ><div align="left"><strong>STATUS :</strong></div></td>
          <td width="11%" class="fonttb"><div align="left"><strong>Regular</strong></div></td>
        </tr>
		<tr>
          <td width="29%" class="fonttb" ><strong>NAME OF STUDENT : </strong></td>
        <td width="44%" class="fonttb" ><strong><?php echo $name; ?> </strong></td>
          <td width="16%" class="fonttb" ><div align="left"><strong>&nbsp;</strong></div></td>
          <td width="11%" class="fonttb"><div align="left"></div></td>
        </tr>
       
        <tr>
          <td height="23" class="fonttb"><strong>FATHER'S/HUSBAND NAME : </strong></td>
          <td colspan="3" class="fonttb"><strong><?php echo $fname; ?> </strong></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td height="25" colspan="3" align="center"><strong><?php echo $course; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="94%" height="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="124" rowspan="3" class="fonttb"><div align="center"><strong>SUBJECT CODE </strong></div></td>
          <td width="263" rowspan="3" class="fonttb"><div align="center"><strong>TITLE OF PAPER </strong></div></td>
          <td width="93" rowspan="3" class="fonttb"><div align="center"><strong>MARKS TOTAL</strong></div></td>
		  
          <td colspan="5" class="fonttb"><div align="center"><strong>MARKS OBTAINED </strong></div></td>
        </tr>
        <tr>
		  <td width="84" height="29" class="fonttb"><div align="center"><strong>THEORY</strong></div></td>
          <td width="117" class="fonttb"><div align="center"><strong>PRACTICAL</strong></div></td>
          <td width="120" class="fonttb"><div align="center"><strong>TOTAL MARKS </strong></div></td>
        </tr>
        <tr> </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode2; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal2; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode3; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal3; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode4; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal4; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode5; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal5; ?></strong></div></td>
        </tr>
		<tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode6; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong>-</strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $practical8; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal8; ?></strong></div></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="87%" height="71" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="196" rowspan="2" class="fonttb"><div align="center"><strong>GRAND TOTAL : </strong></div></td>
          <td width="141" height="27" class="fonttb"><strong>IN FIGURES </strong></td>
          <td width="447" class="fonttb"><strong><?php echo $grandtotalfig; ?> </strong></td>
        </tr>
        <tr>
          
         
        </tr>
        <tr>
          <td height="42" class="fonttb"><div align="center"><strong>RESULT : </strong></div></td>
         
		  <?php /*?><td colspan="3" class="fonttb"><strong><?php echo $fresult; ?> </strong></td><?php */?>
		   <td colspan="3" class="fonttb"><strong> PASS </strong></td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="83%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
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