
<?php
 error_reporting(0);

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
.style31 {
	color: #800000;
	font-weight: bold;
}
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
	<form method="get"  action="samagam_data.php">
	 
      <table width="1148" height="240" border="0"  bgcolor="#FFFFCA">
          <tr>
            <td height="51" colspan="4"><div align="center" class="style19 style20">REGISTERED STUDENTS </div></td>
          </tr>
          <tr>
            <td height="22" colspan="4">&nbsp;
			 <?php /*?><?php 
	 $con=mysql_connect("localhost","root","rootwdp");
	 mysql_select_db("rkhare_result2013",$con);
   	 $qry=" select * from samagam where name like '%".$name."%'";
	 $result=mysql_query($qry);
	 $num=mysql_num_rows($result);
	  if ($num <=0)
	  {
	    echo " <h3 align='center'>No Record Found for <font color='blue'>".$name."</font> Keyword</h3>";
	  } 
	else
	{<?php */?>
				</td>
            </tr>
          <tr>
            <td height="76" colspan="4"><table width="1133" border="1">
              <tr>
                <th width="58"><span class="style31">Reg No.</span></th>
                <th width="170"><span class="style31">Name</span></th>
                <th width="190"><span class="style31">FATHERS NAME</span></th>
                <th width="104"><span class="style31">COLLEGE</span></th>
                <th width="49"><span class="style31">SEM</span></th>
                <th width="105"><span class="style31">CONTACT</span></th>
                <th width="224"><span class="style31">&nbsp;EMAIL</span></th>
                <th width="181"><span class="style31">EVENT</span></th>
              </tr>
              <tr>
                <td colspan="8">
				<?php
                 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");	       
                 mysql_select_db("rkhare_result2013",$con);
			    $qry=" select * from samagam";
			    $result=mysql_query($qry);
			  while($row=mysql_fetch_array($result))
			   {
			echo "<tr bgcolor='#FFFFD5'>";
			echo "<td>".$row["regid"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["college"]."</td>";
			echo "<td>".$row["sem"]."</td>"; 
			echo "<td>".$row["cont"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["event"]."</td>"; 
			echo "</tr>";
			echo "</tr>";
			}
  mysql_close($con);

	  ?></td>
                </tr>
            </table></td>
            </tr>
          <tr>
            <td width="46" height="22">&nbsp;</td>
            <td width="406">&nbsp;</td>
            <td width="28">&nbsp;</td>
            <td width="650">&nbsp;</td>
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
