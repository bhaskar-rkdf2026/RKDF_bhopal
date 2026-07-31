<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF University Ph.D Admit Card</title>
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
.style13 {color:#A60000;
font-size:24px;}
.style14 {color:#A60000;
font-size:16px;}
-->
</style>


</head>

<body background="images/dBg.jpg" >
<table  background="images/footerBg.png"  align="center" width="1000" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="3"><table width="945" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td> <img src="images/img/logo33.png" height="129" /> <img src="images/img/logo22.png" width="715"
                height="123" /><img src="images/img/approval.gif" width="110" height="122" /></td>
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
<form method="get"  action="phdent_login.php">
	<table  width="965" height="266" border="0" background="images/dropdownBg.png">
      <tr>
        <td width="7" height="55">&nbsp;</td>
        <td width="295">&nbsp;</td>
        <td width="639"> &nbsp;<span class="style11">ADMIT CARD FOR THE Ph.D ENTRANCE EXAM-2023-24</span></td>
      </tr>
      <tr>
        <td height="58">&nbsp;</td>
        <td><div align="center"><span class="style3">&nbsp; Enter Your Mobile Number. </span></div></td>
        <td><input type="text" pattern="[7-9]{1}[0-9]{9}" name="mob" style="color:#0067CE; font-weight:bold;" width="130"  height="28" maxlength="10"  placeholder="Mobile Number"  required/> <span class="style13">&</span> </td>
      </tr>
	  <tr>
        <td height="41">&nbsp;</td>
        <td><div align="center"><span class="style3">&nbsp; Enter Your Date of Birth. </span></div></td>
        <td><input  type="text" name="dobf" style="color:#0067CE; font-weight:bold;" width="130" height="28"  placeholder="YYYY-MM-DD" required /> <span class="style14"> (YYYY-MM-DD Formate)</span></td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit"  value="Show Admit Card" style="background-color:#418B38; border:#95F964 solid; color:#DFDF00; font-weight:bold;"/></td>
      </tr>
      <tr>
        <td height="45">&nbsp;</td>
        <td width="1">&nbsp;</td>
        <td width="1">&nbsp;</td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td>&nbsp;</td>
        <td><span class="style12">
          <?php
			 if (isset($_GET["err"]))
			 {
			 echo "<font color=red>Mobile Number or DOB Does Not Match Please Enter True Details.</font>";
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
	   <tr>
        <td height="24">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
