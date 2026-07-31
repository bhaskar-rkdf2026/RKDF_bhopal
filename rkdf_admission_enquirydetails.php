<?php
session_start();

include "include/dblogin.php";
if (isset($_GET["id"]))
{
$rid=$_GET["id"];
}
?>

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
<?php
	if (isset($_SESSION["user"]))
	{
	?>
<table width="100%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/header.jpg" width="1027" height="202"    /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="285" height="54" align="left"></td>
    <td width="911"  colspan="3">
    <div align="left" class="style5"><u>SHOW ALL ADMISSION ENQUIRY - 2021-22  </u> </div></td>
  </tr>
</table>

<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="1800">
<table width="1800" border="1"  cellspacing="0"  cellpadding="0" bgcolor="#FFFFD2" >
  <tr>
<td width="16" height="64"><span class="style11"><a href="rkdf_admission_enquirydetails.php?id=regid">REG ID </a></span></td>
<td width="14"><span class="style11"><a href="rkdf_admission_enquirydetails.php?id=nm">NAME</a></span></td>
    <td width="15"><span class="style11">FNAME</span></td>
    <td width="25"><span class="style11">COURSE</span></td>
    <td width="25"><span class="style11">BRANCH</span></td>
	    <td width="40"><span class="style11">REFERENCE BY </span></td>
    <td width="14"><span class="style11">AADHAR ID </span></td>
    <td width="14"><span class="style11">MOBILE</span></td>
    <td width="14"><span class="style11">EMAIL</span></td>
    <td width="8"><span class="style11">GENDER</span></td>
    <td width="10"><span class="style11">CATEGORY</span></td>
    <td width="35"><span class="style11">ADDRESS</span></td>
    <td width="5"><span class="style11">DOMICILE</span></td>
    <td width="14"><span class="style11">10TH_NOB</span></td>
    <td width="14"><span class="style11">10TH_YOP</span></td>
    <td width="8"><span class="style11">10TH_TM</span></td>
    <td width="8"><span class="style11">10TH_MO</span></td>
    <td width="8"><span class="style11">10TH%</span></td>
    <td width="14"><span class="style11">12TH_NOB</span></td>
    <td width="10"><span class="style11">12TH_YOP</span></td>
    <td width="8"><span class="style11">12TH_TM</span></td>
    <td width="8"><span class="style11">12TH_MO</span></td>
    <td width="8"><span class="style11">12TH%</span></td>
    <td width="14"><span class="style11">D_NOB</span></td>
    <td width="10"><span class="style11">D_YOP</span></td>
    <td width="8"><span class="style11">D_TM</span></td>
    <td width="8"><span class="style11">D_MO</span></td>
    <td width="10"><span class="style11">DIP%</span></td>
    <td width="14"><span class="style11">G_NOB</span></td>
    <td width="10"><span class="style11">G_YOP</span></td>
    <td width="8"><span class="style11">G_TM</span></td>
    <td width="8"><span class="style11">G_MO</span></td>
    <td width="8"><span class="style11">GRAD%</span></td>
    <td width="14"><span class="style11">P_NOB</span></td>
    <td width="10"><span class="style11">P_YOP</span></td>
    <td width="10"><span class="style11">P_TM</span></td>
    <td width="10"><span class="style11">P_MO</span></td>
    <td width="8"><span class="style11">POSTGRAD%</span></td>
  </tr>
  <?php
$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
		 
   	 $qry=" select * from student";
	  if (isset($_GET["id"]))
      {
	  if ($rid=="regid")
		{
         $qry=" select * from student order by id DESC";
		}
	  }
	  if ($rid=="nm")
		{
         $qry=" select * from student order by name";
		} 
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			//echo "<td>".$row["id"]."</td>";
			echo "<td><a href='studentdetail.php?currentpar=".$row["id"]."&paramsvar=".$row["adhar"]."'>".$row["id"]."</a></td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["course"]."</td>";
			echo "<td>".$row["branch"]."</td>";
		    echo "<td>".$row["ref"]."</td>"; 
			echo "<td>".$row["adhar"]."</td>";
			echo "<td>".$row["mob"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["gen"]."</td>";
			echo "<td>".$row["cat"]."</td>";
			echo "<td>".$row["address"]."</td>";
			echo "<td>".$row["dom"]."</td>";
			echo "<td>".$row["t_brd"]."</td>"; 
			echo "<td>".$row["t_yr"]."</td>";  
			echo "<td>".$row["t_tm"]."</td>";  
			echo "<td>".$row["t_mo"]."</td>";  
			echo "<td>".$row["t_per"]."</td>";  
			echo "<td>".$row["tw_brd"]."</td>"; 
			echo "<td>".$row["tw_yr"]."</td>";  
			echo "<td>".$row["tw_tm"]."</td>";  
			echo "<td>".$row["tw_mo"]."</td>";  
			echo "<td>".$row["tw_per"]."</td>";  
			echo "<td>".$row["d_brd"]."</td>"; 
			echo "<td>".$row["d_yr"]."</td>";  
			echo "<td>".$row["d_tm"]."</td>";  
			echo "<td>".$row["d_mo"]."</td>";  
			echo "<td>".$row["d_per"]."</td>";  
			echo "<td>".$row["g_brd"]."</td>"; 
			echo "<td>".$row["g_yr"]."</td>";  
			echo "<td>".$row["g_tm"]."</td>";  
			echo "<td>".$row["g_mo"]."</td>";  
			echo "<td>".$row["g_per"]."</td>";  
			echo "<td>".$row["p_brd"]."</td>"; 
			echo "<td>".$row["p_yr"]."</td>";  
			echo "<td>".$row["p_tm"]."</td>";  
			echo "<td>".$row["p_mo"]."</td>";  
			echo "<td>".$row["p_per"]."</td>";  
			//echo "<td width="40"><a href='delete.php?roll=".$row["rollno"]."'><img src='images/b_drop.png' border='none'></a></td>"; 
			echo "</tr>";
			echo "<tr hight='3' bgcolor='#FF8040'>";
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
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>"; 
			//echo "<td></td>";   
			echo "</tr>";
			}
  mysql_close($con);
	  ?>
</table>

</td>
</tr>
</table>
<?php
 }
  else
	{
	 echo "<b>Sorry ! You Not Show This Page plz First</b><a href='home_login.php'> Login !</a>";
	}
	 ?>
<p>&nbsp;</p>
</body>
</html>
