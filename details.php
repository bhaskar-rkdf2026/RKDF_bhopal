<?php
session_start();
include "include/dblogin.php";

?>
<?php
$id=$_GET["cnslwis"];
$BANKTXNID=$_GET["regtestwid"];

$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
$qry=" select * from pay where id=".$id." and bankid=".$BANKTXNID."";
	 $result=mysql_query($qry);
	 //where payment.id =".$id."
			while($row=mysql_fetch_array($result))
			{
			$id=$row["id"];
			$ORDER_ID=$row["order_id"];
			$STATUS=$row["status"];
			$TXNDATE=$row["txndate"];
			$TXN_AMOUNT=$row["txnamount"];
			$name=$row["name"];
			$fname=$row["fname"];
			$course=$row["course"];
			$branch=$row["branch"]; 
			$mob=$row["mob"];
			$email=$row["email"];
			$ref=$row["ref"];  
			$TXN_ID=$row["txnid"];
			$BANKTXNID=$row["bankid"];
			$BANKNAME=$row["bankname"];
			$PAYMENT_MOD=$row["payment_mode"];
			}
  mysql_close($con);
	  ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.style6 {
	color: #007100;
	font-weight: bold;
}
.style5 {
	color: #D70000;
	font-weight: bold;
}
.style7 {
	color: #2D2DFF;
	font-weight: bold;
}
.style8 {font-family: "Times New Roman", Times, serif}
.style9 {color: #007100; font-weight: bold; font-family: "Times New Roman", Times, serif; }
.style10 {
	color: #5B0000;
	font-weight: bold;
}
.style11 {color: #0000FF}
.style12 {
	color: #CA0000;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><img src="images/header.jpg"  width="79%" height="46%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="333" height="54" align="left"></td>
    <td width="967"  colspan="3"> 
    <div align="left" class="style5"><u> <?php echo $name; ?> &nbsp;&nbsp; PAYMENT DETAILS</u> </div></td>
  </tr>
</table>




<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  
  <tr>
    <td width="288" height="32">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
 <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $id; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td width="250"><div align="right" class="style6 style8">
      <div align="left">ORDER ID </div>
    </div></td>
    <td width="13"><span class="style7">:</span></td>
    <td width="553"><span class="style10">&nbsp;<?php echo $ORDER_ID; ?></span></td>
  </tr>  
  <tr>
    <td height="25">&nbsp;</td>
    <td width="250"><div align="right" class="style6 style8">
      <div align="left">STATUS </div>
    </div></td>
    <td width="13"><span class="style7">:</span></td>
    <td width="553"><span class="style10">&nbsp;<?php echo $STATUS; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">TXN DATE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $TXNDATE; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">PAID AMOUNT </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $TXN_AMOUNT; ?></span></td>
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
      <div align="left"> F/ H NAME </div>
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
      <div align="left">REFRENCE BY </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $ref; ?></span></td>
  </tr>
 <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">TRANSACTION ID  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $TXN_ID; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BANK TXN ID  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $BANKTXNID; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BANK NAME  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $BANKNAME; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">PAYMENT MODE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $PAYMENT_MOD; ?></span></td>
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
</body>
</html>
