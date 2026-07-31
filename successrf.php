<?php
session_start();
include "include/dblogin.php";

?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg



//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>"; // i hidden
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h2 align='center'><b><font color='#CA0000'> Transaction status is success</font></b><h2>";
	    if (isset($_POST["ORDERID"],$_POST["TXNID"],$_POST["TXNAMOUNT"],$_POST["BANKTXNID"],$_POST["STATUS"],$_POST["GATEWAYNAME"],$_POST["MID"],$_POST["PAYMENTMODE"],$_POST["TXNDATE"]))
		{
	    $ORDER_ID=$_POST["ORDERID"];
		$TXN_ID=$_POST["TXNID"];
		$TXN_AMOUNT=$_POST["TXNAMOUNT"];
		$BANKTXNID=$_POST["BANKTXNID"];
		$STATUS=$_POST["STATUS"];
		//$TXNTYPE=$_POST["TXNTYPE"];
		$GATEWAYNAME=$_POST["GATEWAYNAME"];
		//$RESPCODE=$_POST["RESPCODE"];
		//$RESPMSG=$_POST["RESPMSG"];
		$BANKNAME=$_POST["BANKNAME"];
		$MID=$_POST["MID"];
		$PAYMENTMODE=$_POST["PAYMENTMODE"];
		//$REFUNDAMT=$_POST["REFUNDAMT"];
		$TXN_DATE=$_POST["TXNDATE"];
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		if (isset($_POST["ORDERID"],$_POST["TXNAMOUNT"]))
		{
	    //echo "ID".$ORDER_ID;
		//echo "AMOUNT".$TXN_AMOUNT;
	}
		
	}
	}
	}

else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
<?php
$con=mysql_connect($host,$user,$pass);
if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	 mysql_select_db($db,$con);
	$xid=$_SESSION['rid'];
   	 $qry=" select * from student where id='".$xid."'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
//$xid=$_POST["id"];
$xid=$_SESSION['rid'];
$name=$row["name"];
$fname=$row["fname"];
$course=$row["course"];
$branch=$row["branch"];
$mob=$row["mob"];
$email=$row["email"];
$ref=$row["ref"];
}
?>

<?php
$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
       $qry= "insert into pay(id,order_id,status,txndate,txnamount,name,fname,course,branch,mob,email,ref,txnid,bankid,bankname,payment_mode) 
	        values('".$xid."','".$ORDER_ID."','".$STATUS."','".$TXN_DATE."','".$TXN_AMOUNT."','".$name."','".$fname."','".$course."','".$branch."','".$mob."','".$email."','".$ref."','".$TXN_ID."','".$BANKTXNID."','".$BANKNAME."','".$PAYMENTMODE."')";
			
	//echo $qry;
	//exit;		
	 mysql_query($qry);
	mysql_close($con); 
	 //echo "One record inserted";
	 
	  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admission form</title>
<style type="text/css">
.style6 {
	color: #007100;
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
<script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>
</head>

<body topmargin="40px" leftmargin="40"  >

<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  
  <tr>
    <td width="383" height="32">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
 <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $xid; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td width="258"><div align="right" class="style6 style8">
      <div align="left">ORDER ID </div>
    </div></td>
    <td width="5"><span class="style7">:</span></td>
    <td width="458"><span class="style10">&nbsp;<?php echo $ORDER_ID; ?></span></td>
  </tr>  
  <tr>
    <td height="25">&nbsp;</td>
    <td width="258"><div align="right" class="style6 style8">
      <div align="left">STATUS </div>
    </div></td>
    <td width="5"><span class="style7">:</span></td>
    <td width="458"><span class="style10">&nbsp;<?php echo $STATUS; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">TXN DATE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $TXN_DATE; ?></span></td>
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
      <div align="left">PAYMENT MODE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $PAYMENTMODE; ?></span></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;<div align="right" class="style9">
      <div align="left">PRINT OR DOWNLOAD </div>
    </div></td>
    <td>&nbsp;</td>
  <td>&nbsp;<button onclick="window.print()"><img src="images/print.jpg" title="SAVE PDF YOUR INVOCE FOR FUTURE" /></button></td>
  </tr>
   <tr>
    <td height="64">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">
	<div align="right"><a href="http://rkdf.ac.in" title="RETURN TO HOME PLZ CLICK HERE"><img src="images/return.jpg" width="163" height="48" title="RETURN TO HOME PLZ CLICK HERE" /></a></div>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>

</td>
</tr>
</table>
</body>
</html>
