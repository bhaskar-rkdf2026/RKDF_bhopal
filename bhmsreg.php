<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF UNIVERSITY — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF UNIVERSITY</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<table width="1000" border="0" bgcolor="#EAF1E2">
  <tr>
    <td colspan="4">&nbsp;
        <table width="999" bgcolor="#FFDDBB" height="135" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="133" rowspan="4" class="style4"><div align="center"><img src="letter ped logo.JPG" width="70" height="77" /></div></td>
            <td width="1009" class="style3" align="center"><strong>RKDF UNIVERSITY</strong> </td>
          </tr>
          <tr>
            <td height="29" class="style4"><div align="center"><strong>Airport Bypass Road, Gandhi Nagar, Bhopal</strong> (462033)</div></td>
          </tr>
          <tr>
            <td height="26" class="style4"><div align="center"><strong>http:www.rkdf.ac.in, Email: <a href="mailto:info@rkdf.ac.in">info@rkdf.ac.in</a> Phone No:-(0755)-6455562</strong></div></td>
          </tr>
          <tr>
            <td height="21" class="style4">&nbsp;</td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td height="37" colspan="4"><div align="center" class="style5"><u>B.H.M.S. REGISTRATION FORM : </u> </div></td>
  </tr>
</table>
<form method="post" action="bhmsreg.php" >
  <table width="1000" border="0" bgcolor="#FFFFD2">
  <tr>
    <td width="228">&nbsp;</td>
    <td width="209">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="540">&nbsp;</td>
  </tr>
   <tr>
    <td width="228" height="34">&nbsp;</td>
    <td width="209">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="540"><?php
	  if (isset($_POST["Submit"]))
             {    
              $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	               if(!$con)
			        {
			         die ('could not connect').mysql_error();
		  	       }
				mysql_select_db("rkhare_result2013",$con);
	$qry="insert into bhms(name,fname,eid,mob,dob,city,state,pin,dom,cat,gen)
	  values('".$name."','".$fname."','".$email."','".$mob."','".$dob."','".$city."','".$state."','".$pin."','".$dom."','".$cat."','".$gen."')";						
	//echo $qry;
	//exit;
	mysql_query($qry);	
	mysql_close($con); 
	echo "<h3><font color='red'>Data Sucsessfully insert</font></h3>";
        }
	      ?></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">FULL NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="nm" onblur="this.value=this.value.toUpperCase()"/>	 </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">FATHER'S NAME </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="fnm" onblur="this.value=this.value.toUpperCase()"/>     </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">EMAIL ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="email" name="eid"  onblur="this.value=this.value.toUpperCase()"/>     </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">MOBILE NO. </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="mob"  />      </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DATE OF BIRTH </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="date" name="dob"    />  </td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">ADDRESS </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="city" onblur="this.value=this.value.toUpperCase()"/ ></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">STATE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="state" onblur="this.value=this.value.toUpperCase()" ></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">PINCODE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="pin" onblur="this.value=this.value.toUpperCase()"/></td>
  </tr>
 
 

  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">DOMICILE </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><select name="dom" style="width:110px" >
    <option value="MP">MP </option>
         <option value="AI"> AI</option>
         </select></td>
  </tr>
 <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">CATEGORY</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><select name="cat" >
	<option value="SC">SC</option>
	<option value="ST">ST</option>
	<option value="OBC">OBC</option>
	<option value="GEN">GEN</option>
	<option value="OTHER">OTHER</option>
    </select></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">GENDER</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><select name="gen" >
            <option value='MALE' >MALE</option>
           <option value='FEMALE' >FEMALE </option>
            </select></td>
  </tr>
  
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" /> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
