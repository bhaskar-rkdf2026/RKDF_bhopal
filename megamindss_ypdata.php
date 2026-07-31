<?php
error_reporting(0);
 if (isset($_POST["Submit"]))
 {
  $name=$_POST["name"];
  $email=$_POST["email"];
  $cont=$_POST["cont"];
  $college=$_POST["college"];
  $portf=$_POST["portf"];  
  $acc=$_POST["acc"];
  $ac=$_POST["ac"];
  $acc=$_POST["queries"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FACULTY OF LAW || MEGAMINDSS 2K18 </title>
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
	color: #B30000;
	font-style: italic;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
	font-size:38px;
}
.style33 {color: #804040}
.style60 {color: #B90000}
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
        <td width="766"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="763" height="140">
          <param name="movie" value="images/rkdf4.swf" />
          <param name="quality" value="high" />
          <embed src="images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="763" height="140"></embed>
        </object></td>
        <td width="534"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="92" height="92">
          <param name="movie" value="images/nba1.swf" />
          <param name="quality" value="high" />
          <embed src="images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="92" height="92"></embed>
        </object></td>
      </tr>
    </table>
<tr background="images/dropdownBg.png">
	  <td height="34" colspan="3"><table width="95%" border="0">
        <tr>
         <td height="34" colspan="3"><table width="100%" border="0">
        <tr>
          <td width="13%" height="38"><a href="megamindss.php" title="Home" class="style18">Home</a></td>
    <td width="19%"><a href="megamindss/Rules & regulations.pdf"  target="_blank" title="Rules & Regulations" class="style18">Event's Rulebook</a> </td>
          <td width="19%"><a href="megamindss_event.php"  title="Events" class="style18">Categories Rules</a></td>
          <td width="19%"><a href="megamindss_reg.php" title="Registration" class="style18">MM Reg. Form </a></td>
		   <td width="17%"><a href="megamindss_ypreg.php" title="Registration" class="style18">YP Reg. Form </a></td>
          <td width="13%"><a href="megamindss_cont.php" title="CONTACT US" class="style18">Contact_us</a> </td>
        </tr>
      </table></td>
  </tr>
	<tr background="images/dropdownBg.png">
    <td colspan="3" height="685" width="80%" valign="top"><div align="center">
	 
      <table width="1155" border="0"  bgcolor="#FFFFCA">
         
          <tr>
            <td height="27" colspan="6"><span class="style33">&nbsp;&nbsp;FACULTY OF LAW </span></td>
          </tr>
          <tr>
            <td height="22" colspan="6"><span class="style33">&nbsp;&nbsp;RKDF UNIVERSITY,BHOPAL(M.P.) </span></td>
          </tr>
          <tr>
            <td height="22" colspan="6"><div align="center" class="style19">&nbsp;MEGAMINDSS-2018</div></td>
          </tr>
          <tr>
            <td colspan="6">
			<table width="1144" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <th width="67" scope="col"><span class="style60">FORM NO. </span></th>
                <th width="185" scope="col"><span class="style60">NAME</span></th>
                <th width="164" scope="col"><span class="style60">EMAIL</span></th>
                <th width="91" scope="col"><span class="style60">CONTACT</span></th>
                <th width="134" scope="col"><span class="style60">COLLEGE</span></th>
                <th width="168" scope="col"><span class="style60">PORTFOLIO</span></th>
                <th width="62" scope="col"><span class="style60">ACC.</span></th>
                <th width="76" scope="col"><span class="style60">AC/NON AC </span></th>
			<th width="177" scope="col"><span class="style60">QUERIES </span></th>

              </tr>
			   <?php
	$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	//$con=mysql_connect("localhost","root","rootwdp");
	if(!$con)
	{
	 die("could not connect".mysql_error());
	}
    mysql_select_db("rkhare_result2013",$con);
   	 $qry=" select * from ypregform";
	 $result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
			echo "<tr bgcolor='#FFFFD5'>";
			echo "<td>".$row["formno"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["cont"]."</td>";
			echo "<td>".$row["college"]."</td>";
			echo "<td>".$row["portf"]."</td>";
			echo "<td>".$row["acc"]."</td>";  
		    echo "<td>".$row["ac"]."</td>";  
			echo "<td>".$row["queries"]."</td>";  
			echo "</tr>";
			echo "<tr hight='8' bgcolor='#FF8040'>";
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
			echo "</tr>";
			}
  mysql_close($con);
	  ?>
            </table></td>
          </tr>
		  <tr>	      </tr>
          </table>
		  </div></td>
  </tr>
	
	</td>
  </tr>
</table>
</body>
</html>
