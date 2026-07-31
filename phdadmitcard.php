<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF University Ph.D Admit Card</title>
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
	font-size:36px;
}
.style2 {color: #000000;
font-size:20px;}
.style5 {color: #200000; font-weight: bolder;
font-size:19px }
-->
.brd {
  border: 3px solid #FF8000;
  border-radius: 10px;
}
.style6 {
	color: #000000;
	font-weight:bolder;
	font-size:18px;
}
</style>
</head>

<body>
<?php
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
if(!$con)
			 {
			    die ('could not connect').mysql_error();
		  	 }
	mysql_select_db("rkhare_rkdfadmitcard",$con);
	$xmob=$_SESSION['xmob'];
$qry = "SELECT * FROM phd_admitcard23 WHERE mob='".$xmob."'";
$result = mysql_query($qry) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  
  {
	$name=$row["name"];		
	$fname= $row["fname"];
	$add= $row["center"];
    $rollno= $row["rollno"];
	$subject= $row["faculty"];
?>

<table width="900"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td >
	
	<table width="900"  border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="253" height="74" style="border-radius: 10px;" >
          <div align="right"><img src="images/img/letter ped logo.JPG" width="57" height="75" /> &nbsp; </div></td>
        <td width="562" class="brd"><span class="style1">&nbsp;RKDF UNIVERSITY, BHOPAL </span><br /> 
          <span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Airport Bypass Road, Gandhi Nagar, Bhopal-462033</span></td>
        <td width="127" rowspan="2"  style="border-radius: 10px;" ><div align="center"><font size="1">Please Paste <br />
          Self Attested <br />
          Passport size <br />
          Color Photograph</font> </div></td>
      </tr>
      <tr >
        <td height="45"  class="brd">&nbsp;<font size="6" style="font-weight:bold"> ADMIT CARD </font> </td>
        <td  class="brd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4" style="font-weight:bold"> Ph.D ENTRANCE EXAMINATION-2023</font></td>
        </tr>
    </table>
	
      <table width="900" cellpadding="0" cellspacing="0" height="493" border="1">
        <tr>
          <td width="203" height="31"><span class="style6">&nbsp;Roll No.</span></td>
          <td width="366">&nbsp;<strong>
          <?php
	echo $row["rollno"];
		?>
      </strong></td>
          <td width="123">&nbsp; <span class="style6">Course</span></td>
          <td width="198">&nbsp; <span class="style6">Ph.D. </span></td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Name of Student</span></td>
          <td>&nbsp;<strong>
          <?php
	echo $row["name"];
		?>
      </strong></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Father's/ Husband Name</span></td>
          <td>&nbsp;<strong>
          <?php
	echo $row["fname"];
		?>
      </strong></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Subject/ Discipline</span></td>
          <td>&nbsp;<strong>
          <?php
	echo $row["faculty"];
		?>
      </strong></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFE8DD">
          <td height="30"><div align="center"><span class="style5">Exam</span></div></td>
          <td><div align="center"><span class="style5">Exam Center</span></div></td>
          <td><div align="center"><span class="style5">&nbsp;Date</span></div></td>
          <td><div align="center"><span class="style5">&nbsp;Time</span></div></td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Entrance Exam</span></td>
          <td><strong>
          <?php
	echo $row["center"];
		?>
      </strong></td>
          <td>&nbsp;<strong><div align="center">08/10/2023</div></strong></td>
          <td>&nbsp;<strong><div align="center">10:00-12:00 PM</div></strong></td>
        </tr>
        <tr>
          <td height="36"><span class="style6">&nbsp;Personal Interview</span></td>
          <td><strong>FACULTY OF MANAGEMENT, ADMINISTRATIVE BLOCK, RKDF UNIVERSITY, BHOPAL</strong></td>
         <td>&nbsp;<strong><div align="center">08/10/2023</div></strong></td>
          <td>&nbsp;<strong><div align="center">01 PM ONWARDS</div> </strong></td>
        </tr>
        <tr>
          <td height="34" colspan="4">&nbsp;<span class="style6">Important Instructions:-</span></td>
        </tr>
        <tr>
          <td height="229" colspan="4">
		  <ol>
		  <li>Candidates without admit card will not be allowed to enter in the examination hall.		  </li>
		  <li>Candidate has to paste his recent passport size color photograph at indicated places and sign on the photo..		  </li>
		  <li>Candidate must report at the Examination Centre at least half an hour before scheduled time of start of exam.		  </li>
		  <li>Candidate must bring pen (Blue or Black Ball pen).		  </li>
		  <li>Electronic gadgets, calculators, mobile phones or memory devices are not allowed in the examination hall.		  </li>
		  <li>The candidates must carry any one photo-ID proof (viz. driving license, Aadhar Card, PAN card, Voters Card etc.) with them.		  </li>
		  <li>Candidates who have submitted their form through email need to submit their original form in hard copy along with all enclosure including proof of fees paid, failing which they shall not be allowed for the exam.		  </li>
		  <li>Candidate must carry two extra passport size photographs with them. </li>
		   <li>Eligibility for PhD Program shall be subject to confirmation and verification of requisite qualification by scrutiny committee. </li>
		  </ol>		
		  
		  <div align="right"><strong>Controller of Examination  </strong></div></td>
        </tr>
    </table></td>
  </tr>
</table>

<hr align="left" style="height:2px; width:900px; border-width:1;color:gray;background-color:gray">
<table width="900" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="900" height="45">
	<table width="900"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="134" height="74" style="border-radius: 10px;" >
          <div align="right"><img src="images/img/letter ped logo.JPG" width="57" height="75" /> &nbsp; </div></td>
        <td width="644" class="brd"><span class="style1">&nbsp;RKDF UNIVERSITY, BHOPAL </span><br /> 
          <span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Airport Bypass Road, Gandhi Nagar, Bhopal-462033</span></td>
        <td width="122" rowspan="2"  style="border-radius: 10px;" ><div align="center"><font size="1">Please Paste <br />
          Self Attested <br />
          Passport size <br />
          Color Photograph</font> </div></td>
      </tr>
      <tr >
        <td height="45" colspan="2"  class="brd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4" style="font-weight:bold"> Ph.D Entrance Examination 2023 - Record of Answer Book and Attendance</font></td>
        </tr>
    </table>
	
	<table width="900" cellpadding="0" cellspacing="0" height="410" border="1">
        <tr>
          <td width="203" height="31"><span class="style6">&nbsp;Roll No.</span></td>
          <td width="366">&nbsp;<strong>
          <?php
	echo $row["rollno"];
		?>
      </strong></td>
          <td width="123">&nbsp; <span class="style6">Course</span></td>
          <td width="198">&nbsp; <span class="style6">Ph.D. </span></td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Name of Student</span></td>
         <td>&nbsp;<strong>
          <?php
	echo $row["name"];
		?>
      </strong></td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Father's/ Husband Name</span></td>
         <td>&nbsp;<strong>
          <?php
	echo $row["fname"];
		?>
      </strong></td>
        </tr>
        <tr>
          <td height="31"><span class="style6">&nbsp;Subject/ Discipline</span></td>
          <td>&nbsp;<strong>
          <?php
	echo $row["faculty"];
		?>
      </strong></td>
        </tr>
        <tr>
          <td height="295" colspan="4" valign="top" >
		   
		    <table width="899" height="214" border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td width="48" height="95">&nbsp;<span class="style6">S.No </span></td>
                <td width="169">&nbsp;<span class="style6">Exam</span></td>
                <td width="120">&nbsp;<span class="style6">Date</span></td>
                <td width="191">&nbsp;<span class="style6">Question Booklet No</span></td>
                <td width="197">&nbsp;<span class="style6">Signature of Candidate at the Exam Center
(In Presence of Invigilator)</span></td>
                <td width="160">&nbsp;<span class="style6">Signature of Invigilator/
Competent Authority</span></td>
              </tr>
              <tr>
                <td height="54"><span class="style6">1.</span></td>
                <td>&nbsp;<span class="style6">Entrance Exam</span></td>
                <td>&nbsp;<span class="style6">08/10/2023</span></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="55"><span class="style6">2.</td>
                <td>&nbsp;<span class="style6">Personal Interview</span></td>
                <td>&nbsp;<span class="style6">08/10/2023</span></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
          </table>	     </td>
        </tr>
    </table>
	 <div align="right"><strong>Center Superintendent </strong></div></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
