<?php
if (isset($_POST["Submit"]))
{
$name=$_POST["nm"];
$fname=$_POST["fnm"];
$email=$_POST["eid"];
$mob=$_POST["mob"];
$dob=$_POST["dob"];
$city=$_POST["city"];
$state=$_POST["state"];
$pin=$_POST["pin"];
$dom=$_POST["dom"];
$cat=$_POST["cat"];
$gen=$_POST["gen"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.style4 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-family: Arial, Helvetica, sans-serif;
font-size:50px}
.style5 {
	color: #400000;
	font-weight: bold;
}
.style6 {
	color: #007100;
	font-weight: bold;
}
.style7 {
	color: #2D2DFF;
	font-weight: bold;
}
.style8 {font-family: "Times New Roman", Times, serif}
.style9 {color: #007100; font-weight: bold; font-family: "Times New Roman", Times, serif; }
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF UNIVERSITY</title>
</head>

<body topmargin="35px" leftmargin="80" >
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
</body>
</html>
