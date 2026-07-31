<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF Admission 2023</title>
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
<table width="1200" border="0" bgcolor="#EAF1E2">
  <tr>
    <td width="1153" colspan="4">&nbsp;
	     <table width="1199" bgcolor="#FFDDBB" height="135" border="0" cellpadding="3" cellspacing="4">
          <tr>
            <td width="311" rowspan="4" class="style4"><div align="right"><img src="images/img/letter ped logo.JPG" width="70" height="77" />&nbsp;&nbsp;</div></td>
          <td width="855" class="style3" align="left"><span class="style10"> RKDF UNIVERSITY</span> </td>
        </tr>
          <tr>
            <td height="29" class="style4">
            <div align="left"><strong> Airport Bypass Road, Gandhi Nagar, Bhopal</strong> (462033)</div></td>
        </tr>
          <tr>
            <td height="26" class="style4"><div align="left"><strong> http:www.rkdf.ac.in, Email: <a href="mailto:info@rkdf.ac.in">info@rkdf.ac.in</a></strong></div></td>
        </tr>
          <tr>
            <td height="21" class="style4">&nbsp;</td>
        </tr>
    </table>	</td>
  </tr>
  <tr>
    <td height="37" colspan="4">
    <div align="center" class="style5"><u> SHOW ADMISSION QUERY DETAILS- 2023-2024 : </u> </div></td>
  </tr>
</table>

<table width="1205" border="1"  cellpadding="0" cellspacing="0">
<tr>
<td width="1249">
<table width="1200" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
    <td width="61" height="64"><span class="style11">S.NO. </span></td>
    <td width="191"><span class="style11">NAME</span></td>
    <td width="235"><span class="style11">COURSE</span></td>
    <td width="178"><span class="style11">BRANCH</span></td>
    <td width="154"><span class="style11">MOBILE</span></td>
    <td width="196"><span class="style11">EMAIL</span></td>
    <td width="169"><span class="style11">PLACE</span></td>
   
  </tr>
  <?php
	   $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   //$con=mysql_connect("localhost","root","rootwdp");
	   mysql_select_db("rkhare_result2013",$con);
		 
   	 $qry=" select * from admission23";
	
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			echo "<td>".$row["sno"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["course"]."</td>";
			echo "<td>".$row["branch"]."</td>";
			echo "<td>".$row["mob"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["place"]."</td>";
			echo "</tr>";
			echo "<tr hight='1' bgcolor='#FF8040'>";
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
