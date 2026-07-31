<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admission form</title>
<style type="text/css">
.style6 {
	color:#0000F4;
	font-weight: bold;
}
.style2 {font-family: Arial, Helvetica, sans-serif; font-weight: bold;
font-size:21px; }
.style8 {font-family: "Times New Roman", Times, serif}
</style>
<script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>
</head>

<body topmargin="35px" leftmargin="30" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="" >
<table width="900" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><img src="images/header.jpg" width="895" height="144"    /></td>
  </tr>
  
</table>
<table width="901" border="0"  cellspacing="2"  cellpadding="6" bgcolor="#FFFFD2">
  <tr>
    <td width="43">&nbsp;</td>
    <td width="328">&nbsp;</td>
    <td width="42">&nbsp;</td>
    <td width="430">&nbsp;</td>
  </tr>
    
  <tr>
    <td height="47" colspan="4">
	<table width="822" border="0">
      <tr bgcolor="#FFCF9F">
        <td width="173"><a href="home_login.php" class="style2"><strong>Home</strong></a></td>
        <td width="192"></td>
        <td width="219"></td>
        <td width="220"><a href="#" class="style2"><strong></strong></a></td>
      </tr>
    </table>
	</td>
  </tr>

  <tr>
    <td height="185">&nbsp;</td>
    <td>
	<?php
	if (isset($_SESSION["user"]))
	{
	?>
    <p>&nbsp;<a href="admission_success_details.php" class="style2" target="_blank">Payment Success Details</a></p><br />
    <p>&nbsp; <a href="rkdf_admission_enquirydetails.php" class="style2" target="_blank">Admission Enquiry</a> </p>
	<?php
	}
	
	?>
	</td>
    <td>&nbsp;</td>
    <td>
	<div align="center">
	  <?php
	  if (isset($_SESSION["user"]))
	  {
	  echo "Welcome ".$_SESSION["user"]."! <a href='logout.php'>Logout</a>";
	  }
	
	else
	{
	?>
	  </div>
	<form method="post" action="hmlogin.php">
      <table width="368" border="0" bgcolor="#D5F1FF" style="border:2px solid #0080C0">
          <tr>
            <td width="6">&nbsp;</td>
            <td colspan="3"><div align="center" class="style8">User Login </div>
            <div align="left"></div>              <div align="left"></div></td>
          </tr>
          <tr>
            <td height="31">&nbsp;</td>
            <td width="101"><div align="left" class="style6">ID</div></td>
            <td width="7"><div align="left" class="style6">:</div></td>
            <td width="232"><div align="left" class="style6">
              <input type="text" name="id" />
            </div></td>
          </tr>
          <tr>
            <td height="39">&nbsp;</td>
            <td><div align="left" class="style6">Password</div></td>
            <td><div align="left" class="style6">:</div></td>
            <td><div align="left" class="style6">
              <input type="password" name="password" />
            </div></td>
          </tr>
          <tr>
            <td height="27">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span class="style6">
              <input type="submit" name="Submit" value="login" />
            </span></td>
          </tr>
          <tr>
            <td height="32">&nbsp;</td>
            <td colspan="3"><div align="left">
			<?php
			 if (isset($_GET["err"]))
			 {
			 
			 echo "<font color=red> Invalid user detail</font>";
			 
			 }
			?>
			</div>  </td>
          </tr>
        </table>
      </form>	
	  <?php
		}
		?>
    </td>
  </tr>
  <tr>
    <td height="96">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
