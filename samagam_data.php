<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF UNIVERSITY || SANGRAAM — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0;
      background: var(--p-paper);
      color: var(--p-navy-deep);
      font-size: 16px;
      line-height: 1.8;
    }
    .sp-main-box table {
      width: 100%;
      border-collapse: collapse;
      margin: 28px 0;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      border: 1px solid var(--p-hairline);
    }
    .sp-main-box th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 16px 20px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .sp-main-box td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
    }
    .sp-main-box tr:hover td {
      background: rgba(220,38,38,0.03);
    }
    .sp-main-box a {
      color: var(--p-gold);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s;
    }
    .sp-main-box a:hover {
      text-decoration: underline;
      color: #b91c1c;
    }
    .sp-main-box img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: contain;
    }
    .glossymenu a.menuitem {
      display: inline-block;
      padding: 10px 18px;
      margin: 4px;
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 8px;
      color: var(--p-navy-deep);
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s;
    }
    .glossymenu a.menuitem:hover {
      background: var(--p-gold);
      color: #ffffff;
      border-color: var(--p-gold);
    }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">RKDF University Bhopal</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF UNIVERSITY || SANGRAAM</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
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
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
