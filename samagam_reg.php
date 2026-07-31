<?php
 //error_reporting(0);

 if (isset($_POST["Submit"]))
 {
  $name=$_POST["name"];
  $fname=$_POST["fname"];  
  $college=$_POST["college"];
  $sem=$_POST["sem"];
  $cont=$_POST["cont"];
  $email=$_POST["email"];
  $event=$_POST["event"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF UNIVERSITY || SANGRAAM </title>
<style type="text/css">
<!--
.msgarea {margin-left:10px;}
.style18 {
font-weight: bold;
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
text-decoration:none;
color:#ffffff;
 }
 a.style18:hover
 {
 font-weight: bold;
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
text-decoration:overline;
color:#D20000;

}
.style19 {
	color: #9D004F;
	font-style: italic;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
	font-size:24px;
}
.style20 {color: #B30000}
.style27 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #005B00; }
.style29 {color: #FB0000; font-weight: bold; }
.style30 {color: #FF0000}
-->
</style>
</head>
<body >
<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td width="730"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="708" height="140">
          <param name="movie" value="images/rkdf4.swf" />
          <param name="quality" value="high" />
          <embed src="images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="708" height="140"></embed>
        </object></td>
        <td width="433"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="92" height="92">
          <param name="movie" value="images/nba1.swf" />
          <param name="quality" value="high" />
          <embed src="images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="92" height="92"></embed>
        </object></td>
      </tr>
    </table>
	<tr background="images/dropdownBg.png">
	  <td height="34" colspan="3"><table width="100%" border="0">
        <tr>
         <td height="34" colspan="3"><table width="100%" border="0">
        <tr>
       <td width="11%" height="48"><div align="center"><a href="sangram.php" title="Home" class="style18">Home</a></div></td>
        <td width="19%"><div align="center"><a href="abtsangram.php"  title="About EVENT" class="style18">About The Event</a> </div></td>
          <td width="14%"><div align="center"><a href="event.php"  title="Events" class="style18"> Events</a></div></td>
          <td width="17%"><div align="center"><a href="" title="PHOTO GALLERY" class="style18">Gallery</a> </div></td>
          <td width="24%"><div align="center"><a href="samagam_reg.php" title="Ruels & Regulations" class="style18">Registration </a></div></td>
          <td width="15%"><div  align="left"><a href="contactsamagam.php" title="PHOTO GALLERY" class="style18">Contact_us</a> </div></td>
        </tr>
      </table></td>
  </tr>
	<tr background="images/dropdownBg.png">
    <td colspan="3" height="685" width="90%" valign="top"><div align="center">
	<form method="post"  action="samagam_reg.php">
	 
      <table width="952" border="0"  bgcolor="#FFFFCA">
          <tr>
            <td height="69" colspan="4"><div align="center" class="style19 style20">SANGRAAM 2K-17, REGISTRATION FORM </div></td>
          </tr>
          <tr>
            <td width="38" height="29"><div align="center"><strong>1.</strong></div></td>
            <td width="350"><span class="style27">Name of Participant/Team Name </span></td>
            <td width="11"><span class="style29">:</span></td>
            <td width="535"><input type="text" name="name" style="text-transform:uppercase"/></td>
          </tr>
          <tr>
            <td height="25"><div align="center"><strong>2.</strong></div></td>
            <td><span class="style27">Father's Name  </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="fname" style="text-transform:uppercase" /></td>
          </tr>
          <tr>
            <td height="25"><div align="center"><strong>3.</strong></div></td>
            <td><span class="style27">Name of College</span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="college" style="text-transform:uppercase"/></td>
          </tr>
          <tr>
            <td height="25"><div align="center"><strong>4.</strong></div></td>
            <td><span class="style27">Semester  </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="sem" style="text-transform:uppercase" /></td>
          </tr>
          <tr>
            <td height="26"><div align="center"><strong>5.</strong></div></td>
            <td><span class="style27">Contact Number </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="cont" style="text-transform:uppercase" /></td>
          </tr>
          <tr>
            <td height="29"><div align="center"><strong>6.</strong></div></td>
            <td><span class="style27">Email ID </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="email" style="text-transform:lowercase" /></td>
          </tr>
          <tr>
            <td height="33"><div align="center"><strong>7.</strong></div></td>
            <td><span class="style27">Name of Event  </span></td>
            <td><span class="style29">:</span></td>
            <td><select name="event">
			<option value="null" selected="selected">--------SELECT--------</option>
			<option value="CRICKET">CRICKET</option>
			<option value="VOLLEYBALL">VOLLEYBALL</option>
			<option value="CHESS">CHESS</option>
			<option value="CARROM">CARROM</option>
			<option value="CARROM">CARROM DOUBLES</option>
			<option value="KABADDI">KABADDI</option>
			<option value="KHO KHO">KHO KHO</option>
			<option value="LUDO">LUDO</option>
			<option value="BASKETBALL">BASKETBALL</option>
			<option value="BADMINTON">BADMINTON</option>
			<option value="BADMINTON DOUBLES">BADMINTON DOUBLES</option>
			<option value="GULLY CRICKET">GULLY CRICKET(GIRLS)</option>
			<option value="RELAY RACE">RELAY RACE</option>
			<option value="RACE 100M">RACE 100M.</option>
			<option value="RACE 200M">RACE 200M.</option>
			<option value="SHOT PUT">SHOT PUT</option>
			<option value="LONG JUMP">LONG JUMP</option>
			<option value="HIGH JUMP">HIGH JUMP</option>
			<option value="HAND WRESTLING">HAND WRESTLING</option>
			<option value="TABLE TENNIS">TABLE TENNIS</option>
			<option value="TABLE TENNIS DOUBLE">TABLE TENNIS DOUBLE</option>
			<option value="FOOTBALL">FOOTBALL</option>
            </select>  </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span id="ext"></span></td>
          </tr>
          <tr>
            <td height="38">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
              <input type="submit" name="Submit" value="Submit" />
			  <input type="reset" name="Submit" value="Reset" />			  </td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php
	if(isset($_POST["Submit"]))
	{
	$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	if(!$con)
	{
	 die("could not connect".mysql_error());
	}
    mysql_select_db("rkhare_result2013",$con);
	$qry="insert into samagam(name,fname,college,sem,cont,email,event) values('".$name."','".$fname."','".$college."','".$sem."','".$cont."','".$email."','".$event."')";
	$result=mysql_query($qry);	
	mysql_close($con);
	echo "<b><font color='red'>Thanks For Registration</font></b>";
	}
	?></td>
          </tr>
          <tr>
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
          </tr>
          </table>
		</form>   </div></td>
  </tr>
	
	</td>
  </tr>
</table>
</body>
</html>
