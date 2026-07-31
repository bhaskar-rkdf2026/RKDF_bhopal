<?php
session_start();
 $regid=$_POST["id"];
  $mob=$_POST["mob"];
  
   include "include/dblogin.php";
 
$con=mysql_connect($host,$user,$pass);
	if(!$con)
	{
	  die ('could not connect').mysql_error();
	}
    mysql_select_db($db,$con);
	//$xid=$_SESSION['rid'];
	$qry=" select * from pay  where id='".$regid."' and mob='".$mob."'";						
	$result=mysql_query($qry);
    $row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	{
	    $regid=$row["id"]; 
		$mob=$row["mob"]; 
		$_SESSION['rid']=$regid;
		$_SESSION['rmob']=$mob;		
	header("Location: show_detail.php");
	}
	else
	{
	mysql_close($con);
	header("Location: Admission_search.php?err=1");
	}
?>