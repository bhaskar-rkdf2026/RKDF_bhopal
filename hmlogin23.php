<?php
session_start();
 //include "include/dblogin.php";

 $hid=$_POST["id"];
 $password=$_POST["password"];
$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
       //$con=mysql_connect("localhost","root","rootwdp");

							if(!$con)
							{
							     die ('could not connect').mysql_error();
							}
							mysql_select_db("rkhare_result2013",$con);
	$qry=" select * from hmlogin where id='".$hid."' and password='".$password."'";						
	$result=mysql_query($qry);						
    $num= mysql_num_rows($result);
	if ($num>=1)
	{
	 $_SESSION["user"]=$hid;
	 header("Location: admission23login.php");
	}
	else
	{
	 header("Location: admission23login.php?err=1");
	}
	mysql_close($con);
?>