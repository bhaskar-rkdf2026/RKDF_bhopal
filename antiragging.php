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
<table width="1000" height="207" border="0" bgcolor="#EAF1E2">
  <tr>
    <td colspan="4">&nbsp;
	     <table width="999" bgcolor="#FFDDBB" height="130" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="270" rowspan="4" class="style4"><div align="right"><img src="letter ped logo.JPG" width="70" height="77" /></div></td>
          <td width="729" height="59" align="left" class="style3" valign="bottom"><strong>RKDF UNIVERSITY</strong> </td>
        </tr>
          <tr>
            <td height="29" class="style4">
            <div align="left"><strong>Airport Bypass Road, Gandhi Nagar, Bhopal</strong> (462033)</div></td>
        </tr>
          <tr>
            <td height="21" class="style4"><div align="center"><strong> <a href=""></a> </strong></div></td>
        </tr>
          <tr>
            <td height="21" class="style4">&nbsp;</td>
        </tr>
      </table>	</td>
  </tr>
  <tr>
    <td height="43" colspan="4">
    <div align="center" class="style5"><u>ANTIRAGGING FORM  </u> </div></td>
  </tr>
</table>
  <form method="post" action="email_form.php" >
  <table width="1000" border="0" bgcolor="#FFFFD2">
 
 
  <tr>
    <td width="202">&nbsp;</td>
    <td width="243">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="528">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style6 style8">
      <div align="left">Full Name*</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="first_name"  placeholder="Full name"  size="35" required />	        </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Father's Name* </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="fnm" placeholder="Father's name" size="35" required />     </td>
  </tr>
 
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Enrollment No.* </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="enroll" placeholder="Enrollment No." size="35" required />     </td>
  </tr>
   <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Email Id*</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="email" placeholder="Email ID" size="35" required />     </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Mobile No.*  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="tel" name="telephone" minlength="10" maxlength="11" placeholder="Mobile no." size="35" required />      </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Institute/ Department Name* </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="inst" placeholder="Enter your Institute/ Department name" size="35" required />     </td>
  </tr>
   <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Course Name  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="cname" placeholder="Course name" size="35"/ ></td>
  </tr>
   <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Year/ Semester  </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="year" placeholder="Year/ Semester" size="35"/ ></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Subject of Complaint* </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="comp" placeholder="Complaint subject" size="35"/ required ></td>
  </tr>
  <tr>
    <td height="55">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">Your Complaint*</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><textarea name="comments" rows="4" cols="33" placeholder="Write here your complaint" required ></textarea></td>
  </tr>
  <!--<tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">PINCODE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="text" name="pin" ></td>
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
	<option selected="selected">----SELECT----</option>
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
	<option selected="selected">----SELECT----</option>
            <option value='MALE' >MALE</option>
           <option value='FEMALE' >FEMALE </option>
            </select></td>
  </tr>
  -->
  
   <tr>
    <td height="80">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td> 
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><br /><input type="text" name="user_answer" required />
			<br /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
   </td>
  </tr>
  <tr>
    <td height="71">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<input type="submit"  value="  SUBMIT  " style="border:ridge #0000FF; font:bolder;height: 35px; color:#FF0000"/  /> </td>
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
</table>
</form>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
