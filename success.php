<?php
session_start();
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
	    if (isset($_POST["ORDERID"],$_POST["TXNID"],$_POST["TXNAMOUNT"],$_POST["BANKTXNID"],$_POST["STATUS"],$_POST["GATEWAYNAME"],$_POST["BANKNAME"],$_POST["MID"],$_POST["PAYMENTMODE"],$_POST["TXNDATE"]))
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

 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	mysql_select_db("rkhare_result2013",$con);
	$xid=$_SESSION['rid'];
   	 $qry=" select * from student where id='".$xid."'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
//$xid=$_POST["id"];
$id=$_SESSION['rid'];
$name=$row["name"];
$fname=$row["fname"];
$course=$row["course"];
$branch=$row["branch"];
$adhar=$row["adhar"];
$mob=$row["mob"];
$email=$row["email"];
$gen=$row["gen"];
$cat=$row["cat"];
$add1=$row["address"];
$dom=$row["dom"];
$nob1=$row["nob1"];
$yop1=$row["yop1"];
$tm1=$row["tm1"];
$mo1=$row["mo1"];
$per1=$row["per1"];
$nob2=$row["nob2"];
$yop2=$row["yop2"];
$tm2=$row["tm2"];
$mo2=$row["mo2"];
$per2=$row["per2"];
$nob3=$row["nob3"];
$yop3=$row["yop3"];
$tm3=$row["tm3"];
$mo3=$row["mo3"];
$per3=$row["per3"];
$nob4=$row["nob4"];
$yop4=$row["yop4"];
$tm4=$row["tm4"];
$mo4=$row["mo4"];
$per4=$row["per4"];
$nob5=$row["nob5"];
$yop5=$row["yop5"];
$tm5=$row["tm5"];
$mo5=$row["mo5"];
$per5=$row["per5"];
$ref=$row["ref"];
}
?>

<?php
$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   mysql_select_db("rkhare_result2013",$con);
       $qry= "insert into payment(id,order_id,txn_id,txnamount,banktxnid,status,gateway,bankname,mid,payment_method,txndate) 
	        values('".$id."','".$ORDER_ID."','".$TXN_ID."','".$TXN_AMOUNT."','".$BANKTXNID."','".$STATUS."','".$GATEWAYNAME."','".$BANKNAME."','".$MID."','".$PAYMENTMODE."','".$TXN_DATE."')";
			
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

<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  
  <tr>
    <td width="383" height="32">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
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
      <div align="left">TRANSACTION ID </div>
    </div></td>
    <td width="5"><span class="style7">:</span></td>
    <td width="458"><span class="style10">&nbsp;<?php echo $TXN_ID; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $id; ?></span></td>
  </tr>  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">PAID AMOUNT </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $TXN_AMOUNT."/Rs."; ?></span></td>
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
      <div align="left">FATHER'S NAME </div>
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
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">AADHAR ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $adhar; ?></span></td>
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
      <div align="left">GENDER </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $gen; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">CATEGORY </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $cat; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">RESIDENTIAL ADDRESS </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $add1; ?></span></td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DOMICILE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>&nbsp;<span class="style10"><?php echo $dom; ?></span></td>
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
    <td>
     <div align="right"><a href="http://rkdf.ac.in" title="RETURN TO HOME PLZ CLICK HERE"><img src="images/return.jpg" width="163" height="48" title="RETURN TO HOME PLZ CLICK HERE" /></a></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
</body>
</html>
