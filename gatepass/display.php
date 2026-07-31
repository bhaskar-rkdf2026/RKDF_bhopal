<?php
 //error_reporting(0);

 if (isset($_POST["Submit"]))
 {
  $name=$_POST["nm"];
   $age=$_POST["age"];
  $reason=$_POST["visit"];
  $meet=$_POST["meet"];  
  $spo2=$_POST["spo2"];
  $temp=$_POST["temp"];
  $pulse=$_POST["pulse"];
  $inrdate=$_POST["inrdate"];
  //$indate=date("Y-m-d", strtotime($_POST['inrdate']));
  $add=$_POST["add"];
  $note=$_POST["note"];
}
//echo $indate;
?>

<?php
	   if (isset($_POST["Submit"]))
 {
	   $con=mysql_connect(localhost,rkhare_prashant,Vcwbtbcpii09);
	   mysql_select_db(rkhare_result2013,$con);
       $qry=" insert into rkdfgatepass (name, age, reason,  meet,  spo2,  temp, pulse, indate,  address,  note) 
	        values('".$name."', ".$age.", '".$reason."', '".$meet."', '".$spo2."','".$temp."','".$pulse."','".$inrdate."','".$add."','".$note."')";
			
	//echo $qry;
	//exit;		
	 mysql_query($qry);
	 mysql_close($con); 
	
}	 

	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF GATEPASS</title>
<style type="text/css">
<!--
.style5 {color: #0080C0; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style6 {
	color: #1C0000;
	font-weight: bold;
	font-size:24px;
}
.style8 {color:#8C0000; font-family: Arial, Helvetica, sans-serif; font-size:16px; }
.style9 {
	color: #0078F0;
	font-weight: bold;
}
.style10 {color: #800000}
-->
</style>
</head>

<body bgcolor="#0080C0">
<div align="center">
  <table width="516" border="0" bgcolor="#FFFFFF">
    <tr>
      <td height="19">		  </td>
    </tr>
   
    <tr>
      <td height="77" valign="top"><div align="center">
	  
        <table width="635" border="0" bgcolor="#EEEEF7">
		<tr>
              <td>&nbsp;
                <div align="right"><img src="rkdflogo.JPG" width="60" height="67" /></div></td>
              <td colspan="3">&nbsp;<span class="style6">RKDF UNIVERSITY GATE ENTRY SLIP</span></td>
              </tr>
            <tr>
              <td width="87">&nbsp;</td>
              <td width="225"><div align="left"></div></td>
              <td width="8"><div align="left"></div></td>
              <td width="297"><div align="left"></div></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td><div align="left" class="style5">VISITOR'S NAME</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $name; ?></strong></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">AGE </div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $age; ?></strong></td>
            </tr>
			 <tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">REASON FOR VISITING </div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $reason; ?></strong></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">MEETING WITH</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $meet; ?></strong></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">SPO2 LEVEL</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $spo2; ?></strong></td>
            </tr>
            <tr>
              <td height="36">&nbsp;</td>
              <td><div align="left" class="style5">BODY TEMPRATURE (F&deg;)</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $temp; ?></strong></td>
            </tr>
			 <tr>
              <td height="36">&nbsp;</td>
              <td><div align="left" class="style5">PULSE RATE</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $pulse; ?></strong></td>
            </tr>
			<tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">DATE OF VISIT </div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $inrdate; ?></strong></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
              <td><div align="left" class="style5">ADDRESS </div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $add; ?></strong></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td><div align="left" class="style5">NOTE</div></td>
              <td><div align="left" class="style9">:</div></td>
              <td><strong><?php echo $note; ?></strong></td>
            </tr>
			  <tr>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td><div align="left"></div></td>
              <td><div align="left" class="style5"></div></td>
            </tr>
			  <tr>
              <td height="50">&nbsp;</td>
              <td colspan="3">  <div align="left" class="style8"> Visitors are directed  to follow the instructions of RKDF University and Government protocol for Covid-19 compulsorily. </div></td>
              </tr>
			   <tr>
              <td height="21">&nbsp;</td>
              <td colspan="3"> </td>
              </tr>
			   
			 <tr>
              <td height="55">&nbsp;</td>
              <td rowspan="3"><button onclick="window.print()"><img src="print.jpg" title="SAVE PDF YOUR INVOCE FOR FUTURE" /></button>                <div align="left"></div></td>
              <td><div align="left"></div></td>
              <td>&nbsp; <div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature</div></td>
			 </tr>
            <tr>
              <td height="21">&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
           
            <tr>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td><div align="left" class="style5"></div></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td><div align="left"></div></td>
              <td><div align="left" class="style5"></div></td>
            </tr>
                  </table>
		 
      </div></td>
    </tr>
    <tr>
      <td height="27"><a href="gatepassdetails.php">
      <div align="left" class="style10">&nbsp;&nbsp;&nbsp;&nbsp;SEARCH BY DATE</div></a></td>
    </tr>
    <tr>
      <td height="42">	  </td>
    </tr>
  </table>
</div>
</body>
</html>
