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
<?php
	$con=mysql_connect("localhost","root","rootwdp");
			if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	mysql_select_db("rkhare_rkdfadmitcard",$con);
	$xemail=$_SESSION['xemail'];
$qry = "SELECT * FROM  phd_admit WHERE email='$xemail'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
	$name=$row["name"];		
	$fname= $row["fname"];
	$add= $row["center"];
    $rollno= $row["rollno"];
	$dob= $row["dob"];
	$subject= $row["faculty"];
?>
  <table width="798" border="1" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="4">
        <table width="692" height="122" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="76" rowspan="4" class="style4"><img src="images/phd_result/letter ped logo.JPG" width="80" height="80" /></td>
          <td width="616" class="style4" align="center"><font size="6"><strong>RKDF UNIVERSITY</strong></font> </td>
        </tr>
          <tr>
            <td class="style4">
            <div align="center"><strong>Airport By-pass Road,Gandhi Nagar,Bhopal (462033)</strong></div></td>
        </tr>
          <tr>
            <td class="style4"><div align="center"><strong>http:rkdf.ac.in, email: <a href="mailto:info@rkdf.ac.in">info@rkdf.ac.in</a> Phone No:-(0755)-2740305</strong></div></td>
        </tr>
          <tr>
            <td height="32" class="style4"><div align="center"><strong>Admit Card for Written Entrance Examination of Ph.D</strong></div></td>
        </tr>
      </table>	  </td>
    </tr>
    <tr>
      <td width="266"><strong><span class="style4">
        
      </span>Name of The Candidate </strong></td>
      <td width="347"><strong>
          <?php
	echo $row["name"];
		?>
      </strong></td>
      <td width="168" colspan="2" rowspan="6" align="center">(Please Afix Self Attested Latest Passport Size Photograph.) </td>
    </tr>
    <tr>
      <td><strong>Father's /Husband Name </strong></td>
      <td><strong>
          <?php
		echo $fname;
		?>
      </strong></td>
    </tr>
    <tr>
      <td><strong>Name and Address of Examination Center </strong></td>
      <td><strong>
          <?php
		echo $add;
		?>
      </strong></td>
    </tr>
    <tr>
      <td><strong>Discipline</strong></td>
      <td><strong>
          <?php
		echo $subject;
		?>
      </strong></td>
    </tr>
    <tr>
      <td><strong>Roll No.</strong></td>
      <td><strong>
          <?php
		echo $rollno;
		?>
      </strong></td>
    </tr>
    <tr>
      <td><strong>Date of Birth </strong></td>
      <td><strong>
          <?php
		echo $dob;
		?>
      </strong></td>
    </tr>
    <tr>
      <td colspan="4"><table width="729" border="" cellpadding="4" cellspacing="0">
        <tr>
          <td width="139"><strong>Examination Date</strong></td>
            <td width="154"><strong><span class="style4">17-03-2013<br />
          (Sunday)</span></strong></td>
            <td width="106"><strong> &nbsp;&nbsp;&nbsp;Time</strong></td>
            <td width="280"><strong>12:00 to 02:00 pm</strong></td>
        </tr>
      </table></td>
    </tr>
</table>
<?php
}
?>
<br />
<div>
  <div align="right"><strong><img src="images/phd_result/sign2.png" width="90" height="45" /><br />Exam Controller</strong></div>
</div>
<div style="margin-left:5px"><strong>INSTRUCTION:-</strong></strong></div>
<table width="748" align="center"  border="0">
  <tr>
    <td colspan="4"><p>1.  Please bring copy of this Admit Card .<br />
      2.  Candidate should bring original photo identity  card issued from appropriate authority.<br />
      3.  You should report to reach Examination Centre at least 30 minutes before the  commencement of the Examination.<br />
      4.  &nbsp;For any discrepciancy in admit card please report to <strong><a href="mailto:info@rkdf.ac.in">info@rkdf.ac.in</a> </strong><br />
  <br />
  <br />
    </p></td>
  </tr>
</table>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
