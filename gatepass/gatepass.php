<?php
error_reporting(0);
if (isset($_POST["Submit"]))
{
$sdate=$_POST["sdate"];
$enddate=$_POST["edate"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF GATEPASS</title>
<style type="text/css">
<!--
.style6 {
	color: #1C0000;
	font-weight: bold;
	font-size:28px;
}
.style7 {color: #9B0000;
font-weight:bold;
font-family:"Times New Roman", Times, serif}
.style8 {color: #800000}
-->
</style>
</head>

<body bgcolor="#0080C0">
<div align="center">
  <table width="1073"  border="0" bgcolor="#EEEEF7">
    <tr>
      <td width="176" height="97">&nbsp;
      <div align="right"><img src="rkdflogo.JPG" width="62" height="75" /></div></td>
          <td width="887" colspan="3">&nbsp;<span class="style6">RKDF UNIVERSITY GATE ENTRY DATA</span></td>
    </tr>
  </table>
</div>
<div align="center">
  <table width="1073"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
  <td width="40" height="51">&nbsp;</td>
   <td width="218"><a href="index.php" class="style8"> GATEPASS ENTRY </a></td>
   
	<td width="189"><a href="gatepassdetails.php" class="style8">SEARCH BY DATE </a></td>
	  <td colspan="6"> 	  </td>
	   <td width="310">&nbsp; <strong><?php echo "DATE -: &nbsp; ".$sdate." to &nbsp;" .$enddate." " ?></strong></td>
  </tr>
    <tr bgcolor="#FFFFFF" >
   <td colspan="10" >
    <?php
	if (isset($_POST["Submit"]))
{

	   $con=mysql_connect(localhost,rkhare_prashant,Vcwbtbcpii09);
	   mysql_select_db(rkhare_result2013,$con);
   	// $qry=" select * from rkdfgatepass where indate like '".$date."%'";
	  $qry=" select * from rkdfgatepass where indate between '".$sdate."' and '".$enddate."'";
	 $result=mysql_query($qry);
	 $num=mysql_num_rows($result);
	  if ($num <=0)
	  {
	    echo " <h3 align='center'>No Record Found for this date :<font color='blue'>".$sdate." to &nbsp;" .$enddate."</font> </h3>";
	  } 
	else
	{
	?>
   <table width="1066" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#EBEBD6" >
    <td width="201" height="47"><span class="style7">&nbsp;NAME</span></td>
    <td width="45"><span class="style7">AGE</span></td>
	  <td width="120"><span class="style7">REASON FOR VISITING </span></td>
	   <td width="98"><span class="style7">MEETING WITH </span></td>
	    <td width="93"><span class="style7">SPO2 LEVEL </span></td>
		  <td width="56"><span class="style7">TEMP</span></td>
	      <td width="54"><span class="style7">PULSE</span></td>
	      <td width="102"><span class="style7">DATE</span></td>
	      <td width="186"><span class="style7">ADDRESS</span></td>
	    <td width="88"><span class="style7">NOTE</span></td>
   </tr>
   <?php
	 
			while($row=mysql_fetch_array($result))
			{
			echo "<tr font-family:Arial>";
			echo "<td> &nbsp;".$row["name"]."</td>";
			echo "<td>".$row["age"]."</td>";
			echo "<td>".$row["reason"]."</td>";
			echo "<td>".$row["meet"]."</td>";
			echo "<td>".$row["spo2"]."</td>";
			echo "<td>".$row["temp"]."</td>";
			echo "<td>".$row["pulse"]."</td>";  
			echo "<td>".$row["indate"]."</td>";  
			echo "<td>".$row["address"]."</td>";  
			echo "<td>".$row["note"]."</td>";  
			echo "</tr>";
			}
  mysql_close($con);
    }
	}
   ?>
</table>   </td>
    </tr>
	 <tr>
        <td height="47">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="24">&nbsp;</td>
        <td width="11">&nbsp;</td>
        <td width="56">&nbsp;</td>
        <td width="79">&nbsp;</td>
        <td width="131">&nbsp;</td>
        <td width="15">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
	   <tr>
        <td>&nbsp;</td>
        <td>&nbsp;<strong>Submitted to CAO Office</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>&nbsp;Security Incharge</strong></td>
      </tr>
  </table>
 
</div>
</body>
</html>
