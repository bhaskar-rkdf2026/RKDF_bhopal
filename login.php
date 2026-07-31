<?php
session_start();
 $rno=$_REQUEST["rno"];
 
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
	if(!$con)
	{
	  die ('could not connect').mysql_error();
	}
	mysql_select_db("rkhare_result2013",$con);
	$qry=" select * from phdresult  where rollno='".$rno."'";						
	$result=mysql_query($qry);	
    $row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	{
	    $rno=$row["rollno"]; 
		$_SESSION['xrno']=$rno;		
	header("Location: phdresult.php");
	}
	else
	{
	mysql_close($con);
	header("Location: resultiindsem.php?err=1");
	}
?>