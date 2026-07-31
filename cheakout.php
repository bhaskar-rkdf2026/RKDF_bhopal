<?php
session_start();
include "include/dblogin.php";

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
$mob=$row["mob"];
$email=$row["email"];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>

<body topmargin="20px" leftmargin="160" bgcolor="#AAD5FF">
<form method="post" action="PaytmKit/pgRedirect.php">
		<table width="704" height="325" border="0" bgcolor="#FFE4CA" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="48" height="22">&nbsp;</td>
					<td width="155"><label></label></td>
					<td width="501"><input type="hidden" id="ORDER_ID"  maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">	</td>
				</tr>
				<tr>
					<td height="37">&nbsp;</td>
					<td><span class="style6">
					  <label>CUST_ID ::</label>
					  </span></td>
					<td><input id="CUST_ID"  maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $xid; ?>" ></td>
				</tr>
				
				<tr>
					<td height="35">&nbsp;</td>
					<td><span class="style6">
					  <label>MOBILE NO. ::</label>
					  </span></td>
				  <td><input title="Mobile no." id="MSISDN"	type="text" name="MSISDN" value="<?php echo $mob; ?>" > </td>
				</tr>
				<tr>
					<td height="34">&nbsp;</td>
					<td><span class="style6">
					  <label>EMAIL ID ::</label>
					  </span></td>
					<td><input title="email" id="EMAIL" type="text" name="EMAIL" value="<?php echo $email; ?>" > </td>
				</tr>
				<tr>
					<td height="53">&nbsp;</td>
					<td><span class="style6">
					  <label>TXN AMOUNT <span class="style7">*</span></label>
					  </span></td>
					<td><input title="REGISTRATION AMOUNT" type="number" id="TXN_AMOUNT" min="1000" name="TXN_AMOUNT" required> <span class="style1">(Plz Fill Only Amount You Pay Minimum 1000/-)</span>
				  </td>
				</tr>

				<tr>
					<td height="44"></td>
					<td></td>
					<td><input value=" PAYNOW " type="submit"	onclick=""></td>
				</tr>
				<tr>
					<td height="48">&nbsp;</td>
					<td><label></label></td>
					<td><input type="hidden" id="INDUSTRY_TYPE_ID"  maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="PrivateEducation"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><label></label></td>
					<td><input type="hidden" id="CHANNEL_ID"  maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">					</td>
				</tr>
			</tbody>
  </table>
		<span class="style7">*</span> -<span class="style8"> Mandatory Fields</span>
</form>
</body>
</html>
