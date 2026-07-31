<?php
	if(isset($_POST["Submit"]))
	{
	$msg=$_POST["msg"];

	$error=1;

if($msg=="")
{
$msg1="First enter  ur Comments";
$error=0;
}
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
input[type=checkbox] { width: 25px; height: 16px; }

.style1 {
	color: #FFFFFF;
	font-weight: bold;
	text-decoration:none;
}
.msgarea {margin-left:10px;}
.style2 {
	color: #000040;
	font-style: italic;
	font-weight: bold;
	font-size:36px;
}
.style3 {
	color: #B30000;
	font-style: italic;
	font-weight: bold;
	font-size:24px;
}
.style4 {
	color: #004A95;
	font-weight: bold;
	font-size:22px;
}
.style5 {
	color: #0080C0;
	font-weight: bold;
	font-size:19px;
}
.style6 {color: #FF0000}
-->
</style>


</head>

<body>
<form method="post" action="">
<table width="1214" bgcolor="#EFF0CE" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="4"><table width="1109" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td width="775"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="715" height="140">
          <param name="movie" value="images/rkdf4.swf" />
          <param name="quality" value="high" />
          <embed src="images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="715" height="140"></embed>
        </object></td>
        <td width="334">
          <div align="justify">
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="99" height="92">
              <param name="movie" value="images/nba1.swf" />
              <param name="quality" value="high" />
              <embed src="images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="99" height="92"></embed>
            </object>
            </div></td>
      </tr>
    </table></td>
  </tr>
  <tr >
    <td height="40" colspan="4"><table width="1109" border="0" background="images/dropdownBg.png">
      <tr>
        <td width="95" height="41"><div align="center"><a href="http://rkdf.ac.in/index.php"><span class="style1">Home</span></a></div></td>
        <td width="1004">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" colspan="4" ><div align="center" class="style2">RKDF UNIVERSITY , BHOPAL </div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center" class="style3 style6">International Collaboration <br />
      for<br />
    Training Abroad / Certificate Course of Foreign Universities</div></td>
  </tr>
  
  <tr>
    <td width="61">&nbsp;</td>
    <td width="536">&nbsp;</td>
    <td width="24">&nbsp;</td>
    <td width="593">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4">APPLICATION PROCESS : </span></td>
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
    <td height="34">&nbsp;</td>
    <td><span class="style5">Course for which student is applying :</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>i)	Graduate Certificate of Management (CBS, Australia)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox"    /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ii)	Graduate Certificate of Management (Technology Management) (CBS, Australia)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox2"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>iii)	Graduate Certificate in Project  Management (CBS, Australia)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox3"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>iv)	Graduate Diploma of Management (CBS, Australia)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox4"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>v)  Graduate Diploma of Management (Technology Management) (CBS, Australia)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox5"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>vi)	15 days Training (Communication/ PD/Leadership &                                                            Management/ Sub Specialism) (Dudley college, UK)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox6"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>vii)1 Month Training (Communication/ PD/Leadership &                                                            Management/ Sub Specialism) (Dudley college, UK)</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox7"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>viii)	3 Month Training (Communication/ PD/Leadership &                                                            Management/ Sub Specialism)   (Dudley college, UK)                 </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox8"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>b)	Please select which month you want to commence your studies:</td>
    <td>&nbsp;</td>
    <td>
	 </select>
                                        <select name="month">
                                          <option class="seldate" value="0">--Month--</option>
                                          <option value="01">Jan</option>
                                          <option value="02">Feb</option>
                                          <option value="03">Mar</option>
                                          <option value="04">Apr</option>
                                          <option value="05">May</option>
                                          <option value="06">Jun</option>
                                          <option value="07">Jul</option>
                                          <option value="08">Aug</option>
                                          <option value="09">Sep</option>
                                          <option value="10">Oct</option>
                                          <option value="11">Nov</option>
                                          <option value="12">Dec</option>
                                        </select>
	
	<select name='year'>
  <option class="seldate" selected="selected" value="0">--Year--</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option> 
</select>
	</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td><span class="style5">Personal Details :</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>First Name                   </td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield" /></td>
  </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td>Last Name                   </td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield2" /></td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>Date of Birth</td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield3" /></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>Gender </td>
    <td>&nbsp;</td>
    <td>MALE
      <input name="radiobutton" type="radio" value="radiobutton" />  
      FEMALE 
      <input name="radiobutton" type="radio" value="radiobutton" /></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td>Email </td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield4" /></td>
  </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td>Tel (Home)</td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield5" /></td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>Mobile</td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield6" /></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>Address </td>
    <td>&nbsp;</td>
    <td><textarea name="textarea"></textarea></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>City</td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield7" /></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>Pin Code       </td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield8" /></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>State</td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield9" /></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>Country </td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield10" /></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td><span class="style5">Whether Student has a Valid Passport ?</span></td>
    <td>&nbsp;</td>
    <td>YES 
      <input name="radiobutton" type="radio" value="radiobutton" />
    NO 
    <input name="radiobutton" type="radio" value="radiobutton" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style5">QUALIFICATIONS   (Present status of Student)</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>Under-graduate </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox82" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Post-graduate</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox83" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Any Other </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox84" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style5">PAYMENT (Registration Charges)</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Certificate Course (Rs. 5,000 /-)     </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox85" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Diploma Course (Rs. 5,000 /-)     </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox86" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Training Course (Rs. 5,000 /-)        </td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox87" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style5">MODE OF PAYMENT</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>Demand Draft</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox88" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Cheque</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox89" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Cash</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox810" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">
      <input type="submit" name="Submit" value="     Submit Form      " />
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td colspan="3"> * If you do not hold an undergraduate Bachelors degree, you must supply additional documentation as per Special Entry requirements. Please refer to the website for details.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3"> ** Demand Draft & Cheque must be made in favor of “RKDF University”.</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"> ** After submitting filled form, kindly submit hardcopy of filled form with two recent passport size colored photographs and DD/Cheque in the Management Dept. of RKDF University.</td>
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
</body>
</html>
