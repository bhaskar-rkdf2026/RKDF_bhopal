<?php
error_reporting(0);
 if (isset($_POST["Submit"]))
 {
  $name=$_POST["name"];
  $email=$_POST["email"];
  $cont=$_POST["cont"];
  $college=$_POST["college"];
  $portf=$_POST["portf"];  
  $acc=$_POST["meal"];
  $ac=$_POST["ac"];
  $queries=$_POST["queries"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FACULTY OF LAW || MEGAMINDSS 2K18 </title>
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
	color: #B30000;
	font-style: italic;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
	font-size:38px;
}
.style20 {
	color: #B30000;
	font-style: italic;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
	font-size:16px;
}
.style27 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #005B00;}
.style29 {color: #FB0000; font-weight: bold; }
.style33 {color: #804040}
.style36 {color: #400080}
.style38 {color: #800040;
font-size:24px;}
.style39 {
	color: #A60000;
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
          <td width="13%" height="38"><a href="megamindss.php" title="Home" class="style18">Home</a></td>
    <td width="19%"><a href="megamindss/Rules & regulations.pdf"  target="_blank" title="Rules & Regulations" class="style18">Event's Rulebook</a> </td>
          <td width="19%"><a href="megamindss_event.php"  title="Events" class="style18">Categories Rules</a></td>
          <td width="19%"><a href="megamindss_reg.php" title="Registration" class="style18">MM Reg. Form </a></td>
		   <td width="17%"><a href="megamindss_ypreg.php" title="Registration" class="style18">YP Reg. Form </a></td>
          <td width="13%"><a href="megamindss_cont.php" title="CONTACT US" class="style18">Contact_us</a> </td>
        </tr>
      </table></td>
  </tr>
	<tr background="images/dropdownBg.png">
    <td colspan="3" height="685" width="90%" valign="top"><div align="center">
	<form method="post"  action="megamindss_ypreg.php" name="frm1"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
	 
      <table width="1029" border="0"  bgcolor="#FFFFCA">
         
          <tr>
            <td height="27" colspan="4"><span class="style33">&nbsp;&nbsp;FACULTY OF LAW </span></td>
          </tr>
          <tr>
            <td height="22" colspan="4"><span class="style33">&nbsp;&nbsp;RKDF UNIVERSITY,BHOPAL(M.P.) </span></td>
          </tr>
          <tr>
            <td height="22" colspan="4"><div align="center" class="style19">&nbsp;MEGAMINDSS-2018</div></td>
          </tr>
		  <tr>
            <td height="22" colspan="4"><div align="center" class="style19">&nbsp;RKDF’s 1st Mock Youth Parliament</div></td>
          </tr>
          <tr>
            <td height="25" colspan="4"><div align="center" class="style20"> DELEGATE REGISTRATION FORM </div></td>
          </tr>
          <tr>
            <td width="73" height="29">&nbsp;</td>
            <td width="345"><span class="style27">Name *  </span></td>
            <td width="5"><span class="style29">:</span></td>
            <td width="588"><input type="text" name="name" style="text-transform:uppercase"/></td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td><span class="style27">Email ID * </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="email" style="text-transform:lowercase" /></td>
          </tr>
		  <tr>
            <td height="32">&nbsp;</td>
            <td><span class="style27">Contact Number * </span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="cont" style="text-transform:uppercase" /></td>
          </tr>
          <tr>
            <td height="33">&nbsp;</td>
            <td><span class="style27">Name of the School/College*</span></td>
            <td><span class="style29">:</span></td>
            <td><input type="text" name="college" style="text-transform:uppercase"/></td>
          </tr>
          <tr>
            <td height="31">&nbsp;</td>
           <td><span class="style27">Committee   </span></td>
            <td><span class="style29">:</span></td>
            <td><span class="style36">
              <input name="ent" type="radio" value="lok sabha" />
              Lok Sabha&nbsp;&nbsp;
            </span></td>
          </tr>
		   <tr valign="top">
		     <td height="58">&nbsp;</td>
		     <td><span class="style27">Portfolio Preference *(Any 3) </span></td>
		     <td><span class="style29">:</span></td>
		     <td><textarea name="portf" rows="3" cols="25"></textarea></td>
	        </tr>
		   <tr valign="top">
            <td height="84">&nbsp;</td>
           <td><span class="style27">Accomodation *  </span></td>
            <td><span class="style29">:</span></td>
           <td><span class="style36">
              <input name="meal" type="radio" value="Yes" />
              Yes   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="ac" type="radio"  value="AC Room" />
                Ac Room &nbsp;&nbsp;&nbsp;
			     <input name="ac" type="radio" value="Non AC Room" />
			     Non Ac Room<br />
			     <input name="meal" type="radio" value="No" />
			     No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2000/head)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(900/head)<br />
		      (*Refer event's rules & regulations) </span></td>
          </tr>
		 
           <tr>
             <td height="61">&nbsp;</td>
             <td>&nbsp;<span class="style27">Queries,if any * </span></td>
             <td><span class="style29">:</span></td>
             <td><label>
               <textarea name="queries" rows="3" cols="25"></textarea>
             </label></td>
           </tr>
           <tr>
            <td height="61">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
             <td><span class="style36">
               <input type="checkbox" name="checkbox" value="check" id="agree" /> 
              I Accept the Terms and Conditions (<a href="megamindss/Sponsors TnC.pdf"  target="_blank">plz click here</a>)</span> <br />
              <span class="style39">Registration Amount- 600/-</span></td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;
			 <input type="submit" name="Submit" value="Submit" />
			  <input type="reset" name="Submit" value="Reset" />			</td>
          </tr>
		 
          <tr>
            <td height="32">&nbsp;</td>
            <td colspan="3"><div align="center">
              <?php
	if(isset($_POST["Submit"]))
	{
	$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	//$con=mysql_connect("localhost","root","rootwdp");
	if(!$con)
	{
	 die("could not connect".mysql_error());
	}
    mysql_select_db("rkhare_result2013",$con);
	$qry="insert into ypregform(name,email,cont,college,portf,acc,ac,queries) values('".$name."','".$email."','".$cont."','".$college."','".$portf."','".$acc."','".$ac."','".$queries."')";
	$result=mysql_query($qry);	
	mysql_close($con);
	echo "<b><font color='red'>Thanks For Registration <br>
	</font></b>";
	}
	?>
            </div></td>
            </tr>
			 <tr>
            <td height="24">&nbsp;</td>
            <td><div align="left"><span class="style27">AGENDA :</span>  </div></td>
            <td>&nbsp;</td>
            <td>&nbsp; </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3"><span class="style38">&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;Delebration over laws regarding violence against <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;women & empowring their status in the society.</strong></span></td>
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
          </tr><tr>
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
