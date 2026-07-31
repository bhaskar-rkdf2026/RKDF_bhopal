<?php 
	if(isset($_POST["Submit"]))
	{
	$msg=$_POST["msg"];

	$error=1;

if($msg=="")
{
$msg1="First enter  ur Comments";
$error=0;
}
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	text-decoration:none;
}
.style3 {	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	color: #400000;
}
.msgarea {margin-left:10px;}
.style6 {font-weight: bold}
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #FDFDFD; }
-->
</style>


</head>

<body>
<table width="900" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="3"><table width="948" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td width="745"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="738" height="140">
          <param name="movie" value="images/rkdf4.swf" />
          <param name="quality" value="high" />
          <embed src="images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="738" height="140"></embed>
        </object></td>
        <td width="203"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="92" height="92">
          <param name="movie" value="images/nba1.swf" />
          <param name="quality" value="high" />
          <embed src="images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="92" height="92"></embed>
        </object></td>
      </tr>
    </table></td>
  </tr>
  <tr >
    <td height="40" colspan="3"><table width="946" border="0" background="images/dropdownBg.png">
      <tr>
        <td width="95" height="30"><a href="http://rkdf.ac.in/index.php"><span class="style1">Home</span></a></td>
        <td width="841">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td ><span class="style6"><img src="images/img/ugc_logo.jpg" width="236" height="148" /></span></td>
    <td width="4" >&nbsp;</td>
  </tr>
  <tr>
    <td height="101">&nbsp;</td>
    <td>                    <p align="center"><a href="images/06/UGC Report submitted on dated 14-03-2013.pdf" target="_blank" title="UGC Report submitted"><strong> UGC Report submitted on dated 14-03-2013</strong></a></p>
</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
<!--  <form  method="post" name="frm" action="ugccomnt.php" >    -->

<form  method="post" name="frm" action="" >
	<table width="658" border="0">

      <tr>
        <td width="8">&nbsp;</td>
        <td width="279"><span class="style3">Enter Your Comments :</span></td>
        <td width="347"><span class="form_settings">
          <textarea  class="msgarea" title="Enter Your Comments " rows="5" cols="50" name="msg"  value="<?php echo $msg; ?>"></textarea>
        </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="padding-top: 15px">
          <input class="msgarea" type="submit" name="Submit" value="  SEND  " />
       <?php
		echo "<font color=red>".$msg1."</font>";
        ?> </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php
	if(isset($_POST["Submit"]))
	{
	if($error==1)
	{
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	if(!$con)
	{
	 die("could not connect".mysql_error());
	}
    mysql_select_db("rkhare_ugc",$con);
	$qry="insert into comments(comment) values('".$msg."')";
	$result=mysql_query($qry);	
	mysql_close($con);
	echo "<h2><font color='red'>Thanks For Comments....</font></h2>";
	}
	}
	?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <div align="center">
	  
        <a href="yrcoment.php" target="_blank" title="SHOW All Comments"><input type="submit" name="sub" value="SHOW All Comments" /></a>
      </div></td>
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
</table>
</body>
</html>
