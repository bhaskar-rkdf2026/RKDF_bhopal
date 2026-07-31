<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.style4 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-family: Arial, Helvetica, sans-serif;
font-size:34px}
.style5 {
	color: #D70000;
	font-weight: bold;
}
.style10 {
	color: #EA0000;
	font-weight: bold;
}
.style11 {
	color: #C10000;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/header.jpg"  width="76%" height="51%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="285" height="54" align="left"></td>
    <td width="911"  colspan="3">
    <div align="left" class="style5"><u>SHOW ALL PAYMENT DETAILS OF ADMISSION ENQUIRY - 2020-21  </u> </div></td>
  </tr>
</table>

<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="1300">
<table width="1787" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
    <td width="142" height="106"><span class="style11">REGISTRATION ID </span></td>
    <td width="146"><span class="style11">ORDER ID</span></td>
	<td width="352"><span class="style11">TRANSACTION ID</span></td>
   <td width="203"><span class="style11">TRANSACTION AMOUNT</span></td>
 <td width="174"><span class="style11">BANK TXN ID</span></td>
    <td width="98"><span class="style11">STATUS</span></td>
    <td width="153"><span class="style11">GATEWAY NAME ID </span></td>
    <td width="128"><span class="style11">BANK NAME</span></td>
    <td width="100"><span class="style11">MID</span></td>
    <td width="100"><span class="style11">PAYMENT MOD</span></td>
    <td width="167"><span class="style11">TXN DATE & TIME</span></td>
    </tr>
  <?php
	   $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   mysql_select_db("rkhare_result2013",$con);
		 
   	 $qry=" select * from payment";
	
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			echo "<td>".$row["reg_id"]."</td>";
			echo "<td>".$row["order_id"]."</td>";
			echo "<td>".$row["txn_id"]."</td>";
			echo "<td>".$row["txnamount"]."</td>";
			echo "<td>".$row["banktxnid"]."</td>";
			echo "<td>".$row["status"]."</td>";
			echo "<td>".$row["gateway"]."</td>";
			echo "<td>".$row["bankname"]."</td>";
			echo "<td>".$row["mid"]."</td>";
			echo "<td>".$row["payment_method"]."</td>";
			echo "<td>".$row["txndate"]."</td>";
			echo "</tr>";
			echo "<tr hight='5' bgcolor='#FF8040'>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";  
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "</tr>";
			}
  mysql_close($con);
	  ?>
</table>

</td>
</tr>
</table>
<p>&nbsp;</p>
</body>
</html>
