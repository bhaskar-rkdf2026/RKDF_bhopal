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
    <td colspan="4" align="center"><img src="images/header.jpg"  width="79%" height="51%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="285" height="54" align="left"></td>
    <td width="911"  colspan="3">
    <div align="left" class="style5"><u>SHOW ALL ADMISSION ENQUIRY - 2020-21  </u> </div></td>
  </tr>
</table>

<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="2000" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
    <td width="76" height="75"><span class="style11">REG ID </span></td>
	<td width="98" height="75"><span class="style11">ORDER ID </span></td>
	 <td width="94" height="75"><span class="style11">STATUS </span></td>
	 <td width="139" height="75"><span class="style11">TXN DATE </span></td>
    <td width="95" height="75"><span class="style11">TXN AMOUNT </span></td>
    <td width="151"><span class="style11">STUDENT NAME</span></td>
    <td width="133"><span class="style11">F/H NAME</span></td>
    <td width="165"><span class="style11">COURSE</span></td>
    <td width="132"><span class="style11">BRANCH</span></td>
    <td width="105"><span class="style11">MOBILE</span></td>
    <td width="128"><span class="style11">EMAIL ID</span></td>
    <td width="113"><span class="style11">REFERENCE BY </span></td>
	<td width="254" height="75"><span class="style11">TXN ID </span></td>
	<td width="99" height="75"><span class="style11">BANK TXN ID </span></td>
	 <td width="91" height="75"><span class="style11">BANK NAME </span></td>
    <td width="93" height="75"><span class="style11">PAYMENT MODE </span></td>
  </tr>
 <?php
  $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   mysql_select_db("rkhare_result2013",$con);
$qry="select * from pay";
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			//echo "<td>".$row["id"]."</td>";
			echo "<td><a href='details.php?id=".$row["id"]."'>".$row["id"]."</a></td>";
			echo "<td>".$row["order_id"]."</td>";
			echo "<td>".$row["status"]."</td>";
			echo "<td>".$row["txndate"]."</td>";
			echo "<td>".$row["txnamount"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["course"]."</td>";
			echo "<td>".$row["branch"]."</td>"; 
			echo "<td>".$row["mob"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["ref"]."</td>";  
			echo "<td>".$row["txnid"]."</td>";
			echo "<td>".$row["bankid"]."</td>";
			echo "<td>".$row["bankname"]."</td>";
			echo "<td>".$row["payment_mode"]."</td>";
			echo "</tr>";
			echo "<tr hight='4' bgcolor='#FF8040'>";
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
