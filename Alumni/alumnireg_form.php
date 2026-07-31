<?php
error_reporting(0);
 include "include/dblogin.php";
 
 
if (isset($_POST["Submit"]))
{
$name=$_POST["name"];
$fname=$_POST["fname"];
$gender=$_POST["gender"];
$marital=$_POST["marital"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$add=$_POST["add"];
$enrollment=$_POST["enrollment"];
$college=$_POST["college"];
$course=$_POST["course"];
$branch=$_POST["branch"];
$occupation=$_POST["occupation"];
$company=$_POST["company"];
$job=$_POST["job"];
$city=$_POST["city"];
$course_study=$_POST["course_study"];
$college_study=$_POST["college_study"];
$univ=$_POST["univ"];
$contribute=$_POST["contribute"];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.style5 {
	color: #D70000;
	font-weight: bold;
	font-size:20px;
	
}
.style6 {
	color: #480000;
	font-weight: bold;
}
.style7 {color: #480000}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF Admission Form 2020-21</title>
<script> 
function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }
	 </script>

</head>

<body topmargin="20px" leftmargin="20" >
<table width="92%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"> <img src="images/header.jpg"  width="73%" height="48%"  /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="319" height="40" align="left"><a href="#" title="BACK TO HOME"><img src="images/home1.jpg" width="102" height="28"  /></a></td>
    <td  colspan="2">
    <span class="style5"> <u>ALUMNI REGISTRATION FORM  </u> </span></td>
	<td width="149" height="40" align="left">&nbsp; </td>
  </tr>
</table>
<form method="post" action="alumnireg_form.php">
<table bgcolor="#F8F8EF" width="1181" height="872" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="58">&nbsp;</td>
    <td width="447">&nbsp;</td>
    <td width="95">&nbsp;</td>
    <td width="581">&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><span class="style6">Name</span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>Father's Name </strong></span></td>
  </tr>
  <tr valign="top">
    <td height="37">&nbsp;</td>
    <td><input name="name" type="text" style="text-transform: uppercase;" size="60" maxlength="50"  minlength="2"  placeholder="Full Name" required></td>
    <td><span class="style7"></span></td>
    <td><input name="fname" type="text" style="text-transform: uppercase;"  size="60"  placeholder="Father's Name" required /></td>
  </tr>
   <tr>
    <td height="25">&nbsp;</td>
    <td> <span class="style7"><strong>
      <label for="edit-gender" >Gender</label>
    </strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>
      <label for="edit-gender" >Marital Status</label>
    </strong></span></td>
  </tr>
  <tr valign="top">
    <td height="41">&nbsp;</td>
    <td><span class="style7"><strong>
      <select  id="edit-gender" name="gender" required="required" aria-required="true">
        <option value="" selected="selected">-- Select --</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Transgender">Transgender</option>
      </select>
    </strong></span></td>
    <td><span class="style7"></span></td>
    <td> 
	  <span class="style7"><strong>
	  <select   name="marital" required="required" aria-required="true">
	    <option
            value="" selected="selected">-- Select --</option>
	    <option value="Married">Married</option>
	    <option value="Unmarried">Unmarried</option>
	    </select>
	  </strong></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Mobile Number </strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>Personal Emai ID </strong></span></td>
  </tr>
  <tr valign="top">
    <td height="43">&nbsp;</td>
    <td><input name="mobile"  type="tel" value="" size="60" maxlength="10" autocomplete="off" pattern="[0-9]{10}" placeholder="Mobile Number" required="required" aria-required="true" /></td>
    <td><span class="style7"></span></td>
    <td> <input name="email" type="email" id="edit-email-address" value="" size="60" maxlength="254" autocomplete="off" data-drupal-selector="edit-email-address" placeholder="Email Address" required="required" aria-required="true" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="29"><span class="style7"><strong>Date of Birth</strong></span></td>
    <td>&nbsp;</td>
    <td><span class="style7"><strong>Permanent Address</strong></span></td>
  </tr>
  <tr valign="top">
    <td height="70">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><textarea name="add" rows="3" cols="55" ></textarea></td>
  </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td><span class="style7"><strong>Enrollment Number</strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>College</strong></span></td>
  </tr>
  <tr valign="top">
    <td height="41">&nbsp;</td>
    <td><input name="enrollment" type="text" style="text-transform: uppercase;" size="60" maxlength="100"  minlength="2"  placeholder="Enrollment Number" required></td>
    <td><span class="style7"></span></td>
    <td><input name="college" type="text" style="text-transform: uppercase;" size="60" maxlength="100"  minlength="2"  placeholder="Your college Name" required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Course</strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>Branch</strong></span></td>
  </tr>
  <tr valign="top">
    <td height="43">&nbsp;</td>
    <td><input name="course" type="text" style="text-transform: uppercase;" size="60" maxlength="100"  minlength="2"  placeholder="course Name" required></td>
    <td><span class="style7"></span></td>
    <td><input name="branch" type="text" style="text-transform: uppercase;" size="60" maxlength="100"  minlength="2"  placeholder="Branch" required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Occupation</strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>Company (Presently Working)</strong></span></td>
  </tr>
   <tr valign="top">
    <td height="42">&nbsp;</td>
    <td> <div class="select-gender style7"><strong>
      <select  id="edit-occupation" name="occupation" required="required" aria-required="true">
        <option
            value="" selected="selected">---- Select ----</option>
        <option value="Private">Private Job</option>
        <option value="Goverment">Goverment Job</option>
        <option value="Self">Self Employed</option>
      </select>
    </strong></div></td>
    <td><span class="style7"></span></td>
    <td><input name="company" type="text" style="text-transform: uppercase;" size="60" maxlength="100"  minlength="2"  placeholder="Your Company Name" required></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Job Title </strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>Job Current City</strong></span></td>
  </tr>
   <tr valign="top">
    <td height="37">&nbsp;</td>
    <td><input name="job" type="text" style="text-transform: uppercase;" size="60"  minlength="2" maxlength="100"  placeholder="" required></td>
    <td>&nbsp;</td>
    <td><input name="city" type="text" style="text-transform: uppercase;" size="60"  minlength="2" maxlength="100"  placeholder="" required></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Further Study </strong></span></td>
    <td><span class="style7"></span></td>
    <td>&nbsp;</td>
  </tr>
   <tr valign="top">
    <td height="63">&nbsp;</td>
    <td colspan="3"><label for="chkYes">
    <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" />
    Yes
</label>
<label for="chkNo">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" id="chkNo" name="chk" onclick="ShowHideDiv()" />
    No&nbsp;<br>
</label>
<div id="dvtext" style="display: none">
   <span class="style7"><strong> Course:</strong>
    <input type="text"  name="course_study" size="20"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="style7"><strong>College:</strong>
	 <input type="text"  name="college_study" size="30"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="style7"><strong> University:</strong>
	  <input type="text"  name="univ" size="40"  />
</div></td>
    </tr>
	 <tr>
    <td>&nbsp;</td>
    <td height="25"><span class="style7"><strong>Contribution Towards RKDF University</strong></span></td>
    <td><span class="style7"></span></td>
    <td><span class="style7"><strong>      </strong></span></td>
  </tr>
   <tr valign="top">
    <td height="42">&nbsp;</td>
    <td> <div class="select-gender style7"><strong>
      <select  name="contribute" required="required" aria-required="true">
        <option
            value="" selected="selected">------------------------ Select ------------------------</option>
        <option value="Guest Lecture">For Delivering Guest Lecture</option>
        <option value="Mentor">As a Mentor</option>
        <option value="Donor">As a Donor</option>
        <option value="BOS Member">As a BOS Member</option>
        <option value="R&D">Support in R&D Activities </option>
        <option value="Teaching Learning process">As a Evaluator of Teaching Learning process</option>
        <option value="Conferences and Workshop">As a Resource Person for Conferences and Workshop</option>
      </select>
    </strong></div></td>
    <td><span class="style7"></span></td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td height="32">&nbsp;</td>
    <td colspan="3" align="center"> <input type="reset" name="ref" value="Refresh" style="bold:ridge #0000FF; font:bolder;height: 30px; color:#FF0000" /> &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit" name="Submit"  value="  SUBMIT  "   style="border:ridge #0000FF; font:bolder;height: 35px; color:#FF0000"/></td>
    </tr> 
	<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
	
  
  <tr>
    <td>&nbsp;</td>
    <td><?php
	   if (isset($_POST["Submit"]))
 {
	   $con=mysql_connect($host,$user,$pass);
	   mysql_select_db($db,$con);
       $qry=" insert into alumni (name,  fname,  gender,  marital,  mobile,  email,  add ,  enrollment,  college, course,  branch,  occupation, company,  job,  city, course_study, college_study, univ, contribute) 
	       values('".$name."', '".$fname."', '".$gender."', '".$marital."', ".$mobile.", '".$email."', '".$add."', '".$enrollment."', '".$college."', '".$course."','".$branch."', '".$occupation."', '".$company."', '".$job."','".$city."','".$course_study."','".$college_study."','".$univ."','".$contribute."')";

	//echo $qry;
	//exit;		
	 mysql_query($qry);
	mysql_close($con); 
	echo "One record inserted";
}	 
	  ?></td>
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
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
</form>



</body>
</html>
