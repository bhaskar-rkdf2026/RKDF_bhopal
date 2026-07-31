<?php
//error_reporting(0);
//if (isset($_GET["date"]))
//{
//$date=$_GET["date"];
//}
//?>
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
.style8 {
	color:#006F00;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
}
.style9 {color: #A40000}
-->
</style>
</head>

<body bgcolor="#0080C0">
<div align="center">
  <table width="1000"  border="0" bgcolor="#EEEEF7">
    <tr>
      <td width="97">&nbsp;
      <div align="right"><img src="rkdflogo.JPG" width="60" height="67" /></div></td>
          <td width="797" colspan="3">&nbsp;<span class="style6">RKDF UNIVERSITY GATE ENTRY DATA</span></td>
    </tr>
  </table>
</div>
<div align="center">
  <table width="1000"  border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
    <tr bgcolor="#FFFFFF" >
   <td colspan="10" >
  
    <table width="1000" border="0">
      <tr>
        <td width="65" height="29">&nbsp;</td>
        <td width="20">&nbsp;</td>
        <td width="157">&nbsp;</td>
        <td width="134">&nbsp;</td>
        <td width="208">&nbsp;</td>
        <td width="173">&nbsp;</td>
        <td width="156">&nbsp;</td>
        <td width="12">&nbsp;</td>
        <td width="12">&nbsp;</td>
        <td width="21">&nbsp;</td>
      </tr>
      <tr bgcolor="#F1F1E4">
        <td height="31"><span class="style9"></span></td>
        <td><span class="style9"></span></td>
        <td><a href="index.php"><span class="style9">GATEPASS ENTRY </span></a></td>
        <td><span class="style9"></span></td>
        <td><a href="gatepassdetails.php"><span class="style9">SEARCH BY DATE </span></a></td>
        <td>&nbsp;</td>
        <td><span class="style9"></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="3">
		
		 <form method="post" action="gatepass.php"> 
	  <table width="457" height="142" border="0" bgcolor="#E1F0FF">
        <tr>
          <td width="132">&nbsp;</td>
          <td width="10">&nbsp;</td>
          <td width="301">&nbsp;</td>
        </tr>
        <tr>
          <td height="38">&nbsp;<span class="style8">Start Date : </span></td>
          <td>&nbsp;</td>
          <td><input type="date" name="sdate"  required/></td>
        </tr>
        <tr>
          <td height="37"><span class="style8">&nbsp;End Date : </span></td>
          <td>&nbsp;</td>
          <td><input type="date" name="edate" required /> </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;<input type="submit" name="Submit" value="Show Record" /></td>
        </tr>
      </table>
	  </form>		</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="143">&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="83">&nbsp;</td>
        <td>&nbsp;</td>
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
        <td height="41">&nbsp;</td>
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
   </table>
</div>
</body>
</html>
