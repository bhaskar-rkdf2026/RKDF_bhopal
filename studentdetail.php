<?php
session_start();
include "include/dblogin.php";

?>
<?php
$id=$_GET["currentpar"];
$aadhar=$_GET["paramsvar"];

$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
$qry=" select * from student where id=".$id." and adhar=".$aadhar."";
	 $result=mysql_query($qry);
	 //where payment.id =".$id."
			while($row=mysql_fetch_array($result))
			{
			$id=$row["id"];
			$name=$row["name"];
			$fname=$row["fname"];
			$course=$row["course"];
			$branch=$row["branch"]; 
			$adhar=$row["adhar"]; 
			$mob=$row["mob"];
			$email=$row["email"];
			$gen=$row["gen"];
			$cat=$row["cat"];
			$address=$row["address"];
			$dom=$row["dom"];
			$ref=$row["ref"]; 
			$nob1=$row["t_brd"];
			$yop1=$row["t_yr"];
			$tm1=$row["t_tm"];
			$mo1=$row["t_mo"];
			$per1=$row["t_per"]; 
			$nob2=$row["tw_brd"];
			$yop2=$row["tw_yr"];
			$tm2=$row["tw_tm"];
			$mo2=$row["tw_mo"];
			$per2=$row["tw_per"]; 
			$nob3=$row["d_brd"];
			$yop3=$row["d_yr"];
			$tm3=$row["d_tm"];
			$mo3=$row["d_mo"];
			$per3=$row["d_per"]; 
			$nob4=$row["g_brd"];
			$yop4=$row["g_yr"];
			$tm4=$row["g_tm"];
			$mo4=$row["g_mo"];
			$per4=$row["g_per"]; 
			$nob5=$row["p_brd"];
			$yop5=$row["p_yr"];
			$tm5=$row["p_tm"];
			$mo5=$row["p_mo"];
			$per5=$row["p_per"]; 
			}
  mysql_close($con);
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.style6 {
	color: #007100;
	font-weight: bold;
}
.style5 {
	color: #D70000;
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
</head>

<body>
<table width="100%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><img src="images/header.jpg"  width="79%" height="46%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="297" height="54" align="left"></td>
    <td width="1003"  colspan="3"> 
    <div align="left" class="style5"><u> <?php echo $name; ?> &nbsp;&nbsp; ADMISSION ENQUIERY DETAILS</u> </div></td>
  </tr>
</table>
<table border="1" cellspacing="0"  cellpadding="0">
<tr>
<td width="2000">
<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  
  <tr>
    <td width="163" height="32">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
 <tr>
    <td height="25">&nbsp;</td>
    <td width="213"><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td width="5"><span class="style7">:</span></td>
    <td width="723"><span class="style10">&nbsp;<?php echo $id; ?></span></td>
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
    <td>&nbsp;<span class="style10"><?php echo $address; ?></span></td>
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
    <td height="228">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">ACADEMIC QUALIFICATION</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td>
	<table width="625" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td width="152" height="46"><strong>Exam passed</strong></td>
        <td width="139"><strong>Name of Board/University</strong></td>
        <td width="76"><strong>Year of Passing</strong></td>
        <td width="65"><strong>Total Mark</strong></td>
        <td width="76"><strong>Mark Obtained</strong></td>
        <td width="67"><strong>% of Marks</strong></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;&nbsp;10Th</strong></td>
        <td><input type="text" name="nob1" size="20" style="text-transform: uppercase;" value="<?php echo $nob1; ?>" required></td>
        <td><input type="text" name="yop1" size="6" value="<?php echo $yop1; ?>" required></td>
        <td><input type="text" name="tm1" size="6" value="<?php echo $tm1; ?>" required></td>
        <td><input type="text" name="mo1" size="6" value="<?php echo $mo1; ?>" required></td>
        <td><input type="text" name="per1" size="6" value="<?php echo $per1; ?>" required /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;&nbsp;12Th</strong></td>
        <td><input type="text" name="nob2" style="text-transform: uppercase;" value="<?php echo $nob2; ?>" size="20" /></td>
        <td><input type="text" name="yop2" size="6" value="<?php echo $yop2; ?>" /></td>
        <td><input type="text" name="tm2" size="6" value="<?php echo $tm2; ?>" /></td>
        <td><input type="text" name="mo2" size="6" value="<?php echo $mo2; ?>" /></td>
        <td><input type="text" name="per2" size="6" value="<?php echo $per2; ?>" /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;DIPLOMA</strong></td>
        <td><input type="text" name="nob3" style="text-transform: uppercase;" value="<?php echo $nob3; ?>" size="20" /></td>
        <td><input type="text" name="yop3" size="6" value="<?php echo $yop3; ?>"/></td>
        <td><input type="text" name="tm3" size="6"  value="<?php echo $tm3; ?>"/></td>
        <td><input type="text" name="mo3" size="6"  value="<?php echo $mo3; ?>"/></td>
        <td><input type="text" name="per3" size="6" value="<?php echo $per3; ?>" /></td>
      </tr>
      <tr>
        <td height="30"><strong>&nbsp;&nbsp;&nbsp;GRADUATION</strong></td>
        <td><input type="text" name="nob4" style="text-transform: uppercase;" value="<?php echo $nob4; ?>" size="20" /></td>
        <td><input type="text" name="yop4" size="6" value="<?php echo $yop4; ?>" /></td>
        <td><input type="text" name="tm4" size="6" value="<?php echo $tm4; ?>" /></td>
        <td><input type="text" name="mo4" size="6" value="<?php echo $mo4; ?>"/></td>
        <td><input type="text" name="per4" size="6" value="<?php echo $per4; ?>" /></td>
      </tr>
	  <tr>
        <td height="36"><strong>&nbsp;&nbsp;&nbsp;POST GRAD.</strong></td>
        <td><input type="text" name="nob5" style="text-transform: uppercase;" value="<?php echo $nob5; ?>" size="20" /></td>
        <td><input type="text" name="yop5" size="6" value="<?php echo $yop5; ?>"/></td>
        <td><input type="text" name="tm5" size="6" value="<?php echo $tm5; ?>"/></td>
        <td><input type="text" name="mo5" size="6" value="<?php echo $mo5; ?>"/></td>
        <td><input type="text" name="per5" size="6" value="<?php echo $per5; ?>" /></td>
      </tr>
    </table></td>
    </tr>
   <tr>
    <td height="64">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
     <div align="right"><a href="http://rkdf.ac.in/admission_success_details.php" title="RETURN TO HOME PLZ CLICK HERE"><img src="images/return.jpg" width="163" height="48" title="RETURN TO HOME PLZ CLICK HERE" /></a></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>

</td>
</tr>
</table>
<p>&nbsp;</p>
</body>
</html>
