<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style7 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; color: #840000; }
-->
</style>
</head>

<body>
<table width="972" height="85" border="1" bgcolor="#EFEFDE" cellpadding="0" cellspacing="0">
  <tr>
    <td width="61" height="23">&nbsp;</td>
    <td width="893">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFE6CC">
    <td height="29">&nbsp;</td>
    <td><span class="style7"> &nbsp;&nbsp;&nbsp;Your Comments </span></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><?php
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	if(!$con)
	{
	 die("could not connect".mysql_error());
	}
    mysql_select_db("rkhare_ugc",$con);
	$qry="select * from comments";
	$result=mysql_query($qry);
	while($row=mysql_fetch_array($result))
	{
	//echo "<table border='1' width='600px' bgcolor='#DBDBB7'>";
	echo "<tr>";
	echo "<td width='50px'>".$row["sno"]."</font></td>";
	echo "<td width='550px'>".$row["comment"]."</td>";
	echo "</tr>";
	//echo "</table>";
	}	
	mysql_close($con);
	?></td>
  </tr>
</table>
</body>
</html>
