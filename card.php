<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.style4 {font-family: Arial, Helvetica, sans-serif}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF UNIVERSITY</title>
</head>

<body topmargin="35px" leftmargin="30px" >
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
</body>
</html>
