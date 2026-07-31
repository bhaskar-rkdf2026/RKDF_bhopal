<?php
session_start();
session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">

body
{background-image:url(images/dBg.jpg);
}
.style1 {color: #CA0000}
</style>
<script type="text/javascript" >

   function Validate()
{
var phno= document.frm1.phno.value;
    if (phno=="")
	{
	  window.alert("please enter valid Phone Number");
	  window.document.frm1.phno.focus();
	  return false; 
	}

var email= document.frm1.email.value;
   if (email=="")
	    {
	       var dob= document.frm1.dob.value;
	          if (dob=="")
	                {
	                   window.alert("please enter date in yyyy-mm-dd format or Valid Email Id" );
	                   window.document.frm1.dob.focus();
	                   return false; 
	                  }
	           /*else
	                 {
	                    window.alert("please enter email");
	                    window.document.frm1.email.focus();
	                    return false; 
	                  }*/
	}

/*var dob= document.frm1.dob.value;
    if (dob=="")
	{
	  	  
	  window.alert("please enter date in yyyy-mm-dd format");
	  window.document.frm1.dob.focus();
	  return false; 
	}*/

}
</script>
</head>

<body bgcolor="#2424FF">
   <form method="post" action="login.php" name="frm1"  onsubmit="return Validate()">
<table width="100%"  border="0" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" >
  <tr>
    <td colspan="5" background="images/dBg.jpg">&nbsp;</td>
    </tr>
  <tr>
    <td height="158" colspan="5" background="images/dBg.jpg"><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="750" height="147">
        <param name="movie" value="images/rkdf4.swf" />
        <param name="quality" value="high" />
        <embed src="images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="750" height="147"></embed>
      </object>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="92" height="92">
        <param name="movie" value="images/nba1.swf" />
        <param name="quality" value="high" />
        <embed src="images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="92" height="92"></embed>
      </object>
    </div></td>
    </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td width="196">&nbsp;</td>
    <td width="450">&nbsp;</td>
    <td width="395">&nbsp;</td>
    <td width="188">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Enter Your Phone No.</strong> </td>
    <td><input type="text" name="phno"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Email id </strong></td>
    <td><input type="text" name="email"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Or</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Date Of Birth</strong></td>
    <td><input type="text" name="dob" />
      <span class="style1">    (yyyy-mm-dd) </span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php
			 if (isset($_GET["err"]))
			 {
			 
			 echo "<font color=red> Please Must Enter Valid Phone No. and email ID or DOB </font>"; 
			 
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="78">&nbsp;</td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="76" colspan="5" background="images/footerBg.png">&nbsp;</td>
    </tr>
  <tr bgcolor="#333">
    <td height="42">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#333">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
