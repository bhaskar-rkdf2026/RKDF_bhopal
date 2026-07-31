<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	color: #400000;
	font-size:22px;
}
.msgarea {margin-left:10px;}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-style: italic;
	color: #A80000;
	font-size:20px;
	background:#FFAA55
}
.style12 {font-weight: bold}
-->
</style>


</head>

<body background="../images/dBg.jpg">
<table  background="../images/footerBg.png"  align="center" width="1026" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="3"><table width="945" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td height="146" bgcolor="#000046">
		<img src="../images/img/logo22.png" width="812"
                height="111" />
            <img src="../images/img/approval.gif" width="100" height="118" />		</td>
      </tr>
    </table></td>
  </tr>
  <tr >
    <td height="45" colspan="3"><table width="946" border="0" background="images/dropdownBg.png">
      
    </table></td>
  </tr>
 
 
  <tr>
    <td width="6">&nbsp;</td>
    <td width="965">
<form method="post" action="firesafety_login.php">
	<table  width="965" height="249" border="0" background="../images/dropdownBg.png">
      <tr>
        <td width="8" height="55">&nbsp;</td>
        <td width="320">&nbsp;</td>
        <td width="623"> &nbsp;<span class="style11">&nbsp;FIRE  &  SAFETY RESULT- 2020. &nbsp; </span></td>
      </tr>
      <tr>
        <td height="41">&nbsp;</td>
        <td><div align="center"><span class="style3">&nbsp; Enter Your Rollno. </span></div></td>
        <td><input type="text" name="rno" style="color:#0067CE; font-weight:bold;"  /></td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit"  value="Show Result" style="background-color:#418B38; border:#95F964 solid; color:#DFDF00; font-weight:bold;/></td>
      </tr>
      <tr>
        <td height="45">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td>&nbsp;</td>
        <td><span class="style12">
          <?php
			 if (isset($_GET["err"]))
			 {
			 echo "<font color=red> This Rollno Does Not Exist Please Enter Valid Rollno...</font>";
			 }
			?>
        </span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="24">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>	</td>
    <td width="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    </td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="220">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
