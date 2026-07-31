<?php
session_start();
 include "include/dblogin.php";

 $hid=$_POST["id"];
 $password=$_POST["password"];
// $con=mysql_connect("localhost","root","rootwdp");
$con=mysql_connect($host,$user,$pass);

							if(!$con)
							{
							     die ('could not connect').mysql_error();
							}
							mysql_select_db($db,$con);
	$qry=" select * from hmlogin where id='".$hid."' and password='".$password."'";						
	$result=mysql_query($qry);						
    $num= mysql_num_rows($result);
	if ($num>=1)
	{
	 $_SESSION["user"]=$hid;
	 header("Location: home_login.php");
	}
	else
	{
	 header("Location: home_login.php?err=1");
	}
	mysql_close($con);
?>