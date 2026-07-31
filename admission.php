<?php
session_start();
//error_reporting(0);
 include "include/dblogin.php";

if (isset($_POST["Submit"]))
{
$name=$_POST["nm"];
$fname=$_POST["fnm"];
$course=$_POST["category"];
$branch=$_POST["choices"];
$adhar=$_POST["adhar"];
$mob=$_POST["mob"];
$email=$_POST["eid"];
$gen=$_POST["gen"];
$cat=$_POST["cat"];
$add1=$_POST["address"];
$dom=$_POST["dom"];
$nob1=$_POST["nob1"];
$yop1=$_POST["yop1"];
$tm1=$_POST["tm1"];
$mo1=$_POST["mo1"];
$per1=$_POST["per1"];
$nob2=$_POST["nob2"];
$yop2=$_POST["yop2"];
$tm2=$_POST["tm2"];
$mo2=$_POST["mo2"];
$per2=$_POST["per2"];
$nob3=$_POST["nob3"];
$yop3=$_POST["yop3"];
$tm3=$_POST["tm3"];
$mo3=$_POST["mo3"];
$per3=$_POST["per3"];
$nob4=$_POST["nob4"];
$yop4=$_POST["yop4"];
$tm4=$_POST["tm4"];
$mo4=$_POST["mo4"];
$per4=$_POST["per4"];
$nob5=$_POST["nob5"];
$yop5=$_POST["yop5"];
$tm5=$_POST["tm5"];
$mo5=$_POST["mo5"];
$per5=$_POST["per5"];
$ref=$_POST["ref"];
}
?>


 <?php
	   if (isset($_POST["Submit"]))
 {
$con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
       $qry= "insert into student(name,fname,course,branch,adhar,mob,email,gen,cat,address,dom,t_brd,t_yr,t_tm,t_mo,t_per,tw_brd,tw_yr,tw_tm,tw_mo,tw_per,d_brd,d_yr,d_tm,d_mo,d_per,g_brd,g_yr,g_tm,g_mo,g_per,p_brd,p_yr,p_tm,p_mo,p_per,ref,session) 
	        values('".$name."','".$fname."','".$course."','".$branch."','".$adhar."','".$mob."','".$email."','".$gen."','".$cat."','".$add1."','".$dom."','".$nob1."','".$yop1."','".$tm1."','".$mo1."','".$per1."','".$nob2."','".$yop2."','".$tm2."','".$mo2."','".$per2."','".$nob3."','".$yop3."','".$tm3."','".$mo3."','".$per3."','".$nob4."','".$yop4."','".$tm4."','".$mo4."','".$per4."','".$nob5."','".$yop5."','".$tm5."','".$mo5."','".$per5."','".$ref."','2021')";
			
	//echo $qry;
	//exit;		
	 mysql_query($qry);
	mysql_close($con); 
	 //echo "One record inserted";
}	 
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
</style>
<script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>
</head>

<body topmargin="35px" leftmargin="80" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="" >

<table width="1162" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  <tr>
    <td width="287">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="621">&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">REGISTRATION  ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php
$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	   mysql_select_db("rkhare_result2013",$con);
   	 //$qry=" select id from student where adhar='".$adhar."'";
	$qry="select id from student where id = (SELECT MAX(ID) from student)";
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			$xid= $row["id"];
			$_SESSION["rid"]=$xid;
			echo $xid;
			}
  mysql_close($con);
			 ?> <span class="style11">&nbsp;&nbsp;(Plz save this ID )</span></span></td>
  </tr>
  
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">STUDENT  NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10">&nbsp;<?php echo $name; ?></span></td>
  </tr>

  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">FATHER'S NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $fname; ?></span></td>
  </tr>
 <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">COURSE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $course; ?></span></td>
 </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BRANCH</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $branch; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">ADHAR ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $adhar; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">

      <div align="left">MOBILE NO. </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $mob; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">EMAIL ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $email; ?></span></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">GENDER</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $gen; ?></span></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">CATEGORY</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $cat; ?></span></td>
  </tr>
  

  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">RESIDENTIAL ADDRESS</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $add1; ?></span></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DOMICILE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $dom; ?></span></td>
  </tr>
    
  <tr>
    <td height="31">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">REFRENCE BY</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><span class="style10"><?php echo $ref; ?></span></td>
  </tr>

  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;<a href="cheakout.php">
      <input type="submit" name="Submit" value="PAYNOW" /></a>
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
</body>
</html>
