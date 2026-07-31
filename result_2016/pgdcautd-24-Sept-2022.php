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

<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>
</head>

<body bgcolor="#E6E9D1" >
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
$qry = "SELECT * FROM  pgdca_2017 WHERE rollno='".$xrno."'";
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
	$subcode7=$row["subcode7"];	
	$subcode8=$row["subcode8"];			
	$paper=$row["paper"];
	$paper2=$row["paper2"];
	$paper3=$row["paper3"];
	$paper4=$row["paper4"];
	$paper5=$row["paper5"];
	$paper6=$row["paper6"];	
	$paper7=$row["paper7"];	
	$paper8=$row["paper8"];		
	$dmarkstotal=$row["dmarkstotal"];
	$dmarkstotal2=$row["dmarkstotal2"];
	$dmarkstotal3=$row["dmarkstotal3"];
	$dmarkstotal4=$row["dmarkstotal4"];
	$dmarkstotal5=$row["dmarkstotal5"];
	$dmarkstotal6=$row["dmarkstotal6"];
	$dmarkstotal7=$row["dmarkstotal7"];
	$dmarkstotal8=$row["dmarkstotal8"];
	$theory=$row["theory"];
	$theory2=$row["theory2"];	
	$theory3=$row["theory3"];	
	$theory4=$row["theory4"];	
	$theory5=$row["theory5"];	
	$theory6=$row["theory6"];
	$theory7=$row["theory7"];
	$theory8=$row["theory8"];			
	$internal=$row["internal"];	
	$internal2=$row["internal2"];	
	$internal3=$row["internal3"];	
	$internal4=$row["internal4"];	
	$internal5=$row["internal5"];	
	$internal6=$row["internal6"];
	$internal7=$row["internal7"];
	$internal8=$row["internal8"];		
	$prectical=$row["practical"];
	$prectical2=$row["practical2"];	
	$prectical3=$row["practical3"];	
	$prectical4=$row["practical4"];	
	$prectical5=$row["practical5"];	
	$prectical6=$row["practical6"];	
	$prectical7=$row["practical7"];
	$prectical8=$row["practical8"];				
	$omarkstotal=$row["omarkstotal"];
	$omarkstotal2=$row["omarkstotal2"];
	$omarkstotal3=$row["omarkstotal3"];
	$omarkstotal4=$row["omarkstotal4"];
	$omarkstotal5=$row["omarkstotal5"];
	$omarkstotal6=$row["omarkstotal6"];	
	$omarkstotal7=$row["omarkstotal7"];	
	$omarkstotal8=$row["omarkstotal8"];		
	$grandtotalfig=$row["grandtotalfig"];		
	$grandtotalwrd=$row["grandtotalwrd"];		
	$fresult=$row["fresult"];	
?>
<table class="bg" width="68%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" rowspan="3"><img src="RKDF LOGO2.png" width="118" height="160" /></td>
    <td height="75" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span></td>
  </tr>
  <tr>
    <td height="48" colspan="2" align="center"><span class="style9">&quot;Established under M.P. Govt. Act and Registered with UGC under Act2(f) 1956&quot;</span></td>
  </tr>
  <tr>
    <td height="57" colspan="2" align="center"><span class="style1 style7">STATEMENT OF MARKS </span></td>
  </tr>
   <tr>
    <td colspan="3">
	<table width="98%" cellpadding="0" cellspacing="0"  border="1">
        <tr>
          <td colspan="4" >&nbsp;</td>
        </tr>
		<tr>
          <td width="34%" class="fonttb" ><strong>ROLL NO. : </strong></td>
          <td width="42%" class="fonttb" ><strong><?php echo $rno; ?> </strong></td>
          <td width="13%" class="fonttb" ><div align="left"><strong>STATUS :</strong></div></td>
          <td width="11%" class="fonttb"><div align="left"><strong>Regular</strong></div></td>
        </tr>
		<tr>
          <td width="34%" class="fonttb" ><strong>NAME OF STUDENT : </strong></td>
        <td width="42%" class="fonttb" ><strong><?php echo $name; ?> </strong></td>
          <td width="13%" class="fonttb" >&nbsp;</td>
          <td width="11%" class="fonttb">&nbsp;</td>
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
	<table width="98%" height="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="124" rowspan="3" class="fonttb"><div align="center"><strong>SUBJECT CODE </strong></div></td>
          <td width="263" rowspan="3" class="fonttb"><div align="center"><strong>TITLE OF PAPER </strong></div></td>
          <td width="93" rowspan="3" class="fonttb"><div align="center"><strong>MARKS TOTAL</strong></div></td>
		  
          <td colspan="5" class="fonttb"><div align="center"><strong>MARKS OBTAINED </strong></div></td>
        </tr>
        <tr>
		  <td height="29" class="fonttb"><div align="center"><strong>THEORY</strong></div></td>
          <td class="fonttb"><div align="center"><strong>INTERNAL</strong></div></td>
          <td class="fonttb"><div align="center"><strong>PRACTICAL</strong></div></td>
          <td class="fonttb"><div align="center"><strong>TOTAL MARKS </strong></div></td>
        </tr>
        <tr> </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode2; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical2; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal2; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode3; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical3; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal3; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode4; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical4; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal4; ?></strong></div></td>
        </tr>
        <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode5; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical5; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal5; ?></strong></div></td>
        </tr>
		 <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode6; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical6; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal6; ?></strong></div></td>
        </tr>
		 <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode7; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper7; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal7; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory7; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal7; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical7; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $omarkstotal7; ?></strong></div></td>
        </tr>
		 <tr>
          <td height="23" class="fonttb"><div align="center"><strong><?php echo $subcode8; ?></strong></div></td>
          <td class="fonttb"><div align="left"><strong><?php echo $paper8; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $dmarkstotal8; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $theory8; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $internal8; ?></strong></div></td>
          <td class="fonttb"><div align="center"><strong><?php echo $prectical8; ?></strong></div></td>
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
          <td width="447" class="fonttb"><strong><?php echo $grandtotalfig; ?></strong></td>
        </tr>
        <tr>
          
         
        </tr>
        <tr>
          <td height="42" class="fonttb"><div align="center"><strong>RESULT : </strong></div></td>
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
