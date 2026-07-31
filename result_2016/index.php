<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
<form method="post" action="login.php">
  <table width="879" border="1">
    <tr>
      <td width="191">&nbsp;</td>
      <td width="140">&nbsp;</td>
      <td width="526">vk;qosZn fl)kar 'kjhj jpuk ,oa 'kjhj fØ;k foKku LokLF;o`r ,oa jk"Vªh; dk;ZZØe n`O; xq.k</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Enter Your Rollno : </td>
      <td><input type="text" name="rno" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
	  			<?php
			 if (isset($_GET["err"]))
			 {
			 echo "<font color=red> This Rollno Does Not Exist...</font>";
			 }
			?>

	  
	  </td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>
