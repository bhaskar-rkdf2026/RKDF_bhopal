<?php
if(isset($_POST["Submit"]))
{
$rollno=$_POST["rollno"];
$name=$_POST["name"];
$fname=$_POST["fname"];
$course=$_POST["course1"];
$subcode=$_POST["subcode"];
$subcode2=$_POST["subcode2"];
$subcode3=$_POST["subcode3"];
$subcode4=$_POST["subcode4"];
$subcode5=$_POST["subcode5"];
$subcode6=$_POST["subcode6"];
$paper=$_POST["paper"];
$paper2=$_POST["paper2"];
$paper3=$_POST["paper3"];
$paper4=$_POST["paper4"];
$paper5=$_POST["paper5"];   
$paper6=$_POST["paper6"];   
$dmarkstotal=$_POST["dmarkstotal"];   
$dmarkstotal2=$_POST["dmarkstotal2"];   
$dmarkstotal3=$_POST["dmarkstotal3"];   
$dmarkstotal4=$_POST["dmarkstotal4"];   
$dmarkstotal5=$_POST["dmarkstotal5"];   
$dmarkstotal6=$_POST["dmarkstotal6"];   
$theory=$_POST["theory"];   
$theory2=$_POST["theory2"];  
$theory3=$_POST["theory3"];   
$theory4=$_POST["theory4"];   
$theory5=$_POST["theory5"];   
$theory6=$_POST["theory6"];   
$internal=$_POST["internal"];   
$internal2=$_POST["internal2"];   
$internal3=$_POST["internal3"];   
$internal4=$_POST["internal4"];   
$internal5=$_POST["internal5"];   
$internal6=$_POST["internal6"];   
$practical=$_POST["practical"];   
$practical2=$_POST["practical2"];   
$practical3=$_POST["practical3"];   
$practical4=$_POST["practical4"];   
$practical5=$_POST["practical5"];   
$practical6=$_POST["practical6"];   
$omarkstotal=$_POST["omarkstotal"];   
$omarkstotal2=$_POST["omarkstotal2"];   
$omarkstotal3=$_POST["omarkstotal3"];   
$omarkstotal4=$_POST["omarkstotal4"];   
$omarkstotal5=$_POST["omarkstotal5"];   
$omarkstotal6=$_POST["omarkstotal6"];   
$grandtotalfig=$_POST["grandtotalfig"];   
$grandtotalwrd=$_POST["grandtotalwrd"];   
$fresult=$_POST["fresult"];
//echo "data received";

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style12 {font-size: 24px; color: #330000; }
.style13 {
	font-size: 50px;
	font-style: italic;
	font-weight: bold;
	color: #990000;
}
.style17 {color:#DD0000; font-size:18px; font-weight: bold; background-color:#FFDDBB }
-->
</style>
</head>

<body>
<table align="center" bgcolor="#FFC4C4" width="90%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="41"> <div align="center">
      <h1 class="style13">RKDF UNIVERSITY RESULT</h1>
    </div></td>
  </tr>

  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr bgcolor="#ECECFF">
        <td><div align="center"><span class="style12"><a href="index.php">Home</a></span></div></td>
        <td><div align="center"><span class="style12"><a href="insert.php">Insert</a></span></div></td>
        <td><div align="center"><span class="style12"><a href="">Display</a></span></div></td>
        <td><div align="center"><span class="style12"><a href="">Update</a></span></div></td>
        <td><div align="center"><span class="style12"><a href="">Search</a></span></div></td>
      </tr>
     
    </table></td>
  </tr>

  <tr>
    <td>
	<form action="insert.php" method="post">
	  <table bgcolor="#D6D6D6" width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style17">&nbsp;&nbsp;Roll Number : </td>
        <td colspan="2"><input type="text" name="rollno" size="50" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td class="style17">&nbsp;&nbsp;Name : </td>
        <td colspan="2"><input type="text" name="name" size="50"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style17">&nbsp;&nbsp;Father's Name : </td>
        <td colspan="2"><input type="text" name="fname" size="50" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style17">&nbsp;&nbsp;Course : </td>
        <td colspan="2"><input type="text" name="course1" size="50" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style17">subcode1</td>
        <td class="style17">subcode2</td>
        <td class="style17">subcode3</td>
        <td class="style17">subcode4</td>
        <td class="style17">subcode5</td>
        <td class="style17">subcode6</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td><input type="text" name="subcode" /></td>
        <td><input type="text" name="subcode2" /></td>
        <td><input type="text" name="subcode3" /></td>
        <td><input type="text" name="subcode4" /></td>
        <td><input type="text" name="subcode5" /></td>
        <td><input type="text" name="subcode6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style17">Paper 1 </td>
        <td class="style17">Paper2 </td>
        <td class="style17">Paper3 </td>
        <td class="style17">Paper4 </td>
        <td class="style17">Paper5 </td>
        <td class="style17">Paper6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32">&nbsp;</td>
        <td><input type="text" name="paper" /></td>
        <td><input type="text" name="paper2" /></td>
        <td><input type="text" name="paper3" /></td>
        <td><input type="text" name="paper4" /></td>
        <td><input type="text" name="paper5" /></td>
        <td><input type="text" name="paper6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 1 </td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 2 </td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 3 </td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 4 </td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 5 </td>
        <td bgcolor="#FFFF66" class="style17">Total Marks 6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td><input type="text" name="dmarkstotal" /></td>
        <td><input type="text" name="dmarkstotal2" /></td>
        <td><input type="text" name="dmarkstotal3" /></td>
        <td><input type="text" name="dmarkstotal4" /></td>
        <td><input type="text" name="dmarkstotal5" /></td>
        <td><input type="text" name="dmarkstotal6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Theory 1</td>
        <td bgcolor="#FFFF66" class="style17">Theory 2 </td>
        <td bgcolor="#FFFF66" class="style17">Theory 3 </td>
        <td bgcolor="#FFFF66" class="style17">Theory 4 </td>
        <td bgcolor="#FFFF66" class="style17">Theory 5 </td>
        <td bgcolor="#FFFF66" class="style17">Theory 6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td><input type="text" name="theory" /></td>
        <td><input type="text" name="theory2" /></td>
        <td><input type="text" name="theory3" /></td>
        <td><input type="text" name="theory4" /></td>
        <td><input type="text" name="theory5" /></td>
        <td><input type="text" name="theory6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Internal 1</td>
        <td bgcolor="#FFFF66" class="style17">Internal 2 </td>
        <td bgcolor="#FFFF66" class="style17">Internal 3 </td>
        <td bgcolor="#FFFF66" class="style17">Internal 4 </td>
        <td bgcolor="#FFFF66" class="style17">Internal 5 </td>
        <td bgcolor="#FFFF66" class="style17">Internal 6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32">&nbsp;</td>
        <td><input type="text" name="internal" /></td>
        <td><input type="text" name="internal2" /></td>
        <td><input type="text" name="internal3" /></td>
        <td><input type="text" name="internal4" /></td>
        <td><input type="text" name="internal5" /></td>
        <td><input type="text" name="internal6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Practical 1 </td>
        <td bgcolor="#FFFF66" class="style17">Practical 2 </td>
        <td bgcolor="#FFFF66" class="style17">Practical 3 </td>
        <td bgcolor="#FFFF66" class="style17">Practical 4 </td>
        <td bgcolor="#FFFF66" class="style17">Practical 5 </td>
        <td bgcolor="#FFFF66" class="style17">Practical 6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td><input type="text" name="practical" /></td>
        <td><input type="text" name="practical2" /></td>
        <td><input type="text" name="practical3" /></td>
        <td><input type="text" name="practical4" /></td>
        <td><input type="text" name="practical5" /></td>
        <td><input type="text" name="practical6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 1 </td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 2 </td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 3 </td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 4 </td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 5 </td>
        <td bgcolor="#FFFF99" class="style17">Obtained Marks total 6 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td><input type="text" name="omarkstotal" /></td>
        <td><input type="text" name="omarkstotal2" /></td>
        <td><input type="text" name="omarkstotal3" /></td>
        <td><input type="text" name="omarkstotal4" /></td>
        <td><input type="text" name="omarkstotal5" /></td>
        <td><input type="text" name="omarkstotal6" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="32">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Total Marks in figure </td>
        <td><input type="text" name="grandtotalfig" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Total Marks in Words </td>
        <td><input type="text" name="grandtotalwrd" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td bgcolor="#FFFF66" class="style17">Final Result </td>
        <td><input type="text" name="fresult" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="35">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="   SUBMIT  "  style="background:#C89191; color:#0000FF; font-weight:bold; word-spacing:2PX;" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="1%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="22%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
    </table>
	</form>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<?php /*?>$con=mysql_connect("localhost","root","rootwdp");
	
 */?>
	<?php
if(isset($_POST["Submit"]))
{	
     $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
		if(!$con)
		{
		die ('Database not connected'.mysql_error());
		}
        mysql_select_db("rkhare_result2013",$con);
		$qry="insert into resultivsem (rollno,name,fname,course,subcode,subcode2, subcode3,subcode4,subcode5,subcode6,paper,paper2,paper3,paper4,paper5,paper6, dmarkstotal, dmarkstotal2,dmarkstotal3,dmarkstotal4,dmarkstotal5,dmarkstotal6, theory,theory2,theory3,theory4,theory5,theory6,internal,internal2,internal3,internal4,internal5,internal6, practical,practical2,practical3,practical4,practical5,practical6,omarkstotal,omarkstotal2,omarkstotal3,omarkstotal4,omarkstotal5,omarkstotal6,grandtotalfig,grandtotalwrd,fresult) values('".$rollno."','".$name."','".$fname."','".$course."','".$subcode."','".$subcode2."','".$subcode3."','".$subcode4."','".$subcode5."','".$subcode6."','".$paper."','".$paper2."','".$paper3."','".$paper4."','".$paper5."','".$paper6."','".$dmarkstotal."','".$dmarkstotal2."','".$dmarkstotal3."','".$dmarkstotal4."','".$dmarkstotal5."','".$dmarkstotal6."','".$theory."','".$theory2."','".$theory3."','".$theory4."','".$theory5."','".$theory6."','".$internal."','".$internal2."','".$internal3."','".$internal4."','".$internal5."','".$internal6."','".$practical."','".$practical2."','".$practical3."','".$practical4."','".$practical5."','".$practical6."','".$omarkstotal."','".$omarkstotal2."','".$omarkstotal3."','".$omarkstotal4."','".$omarkstotal5."','".$omarkstotal6."','".$grandtotalfig."','".$grandtotalwrd."','".$fresult."')";
		mysql_query($qry);
		echo "Record Save Successfully";
		
		mysql_close($con);
}		
		?></td>
  </tr>
</table>
</body>
</html>
