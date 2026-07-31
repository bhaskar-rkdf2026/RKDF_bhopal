<?php
session_start();
 $rno=$_REQUEST["rno"];
 
 /*?>$con=mysql_connect("localhost","root","rootwdp");
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
<?php */?>
<?php
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
if(!$con)
	{
	  die ('could not connect').mysql_error();
	}
	mysql_select_db("rkhare_result2013",$con);
	$qry=" select * from bed14  where rollno='".$rno."'";						
	$result=mysql_query($qry);	
    $row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	{
	    $rno=$row["rollno"]; 
		$_SESSION['xrno']=$rno;		
	header("Location: bed2014.php");
	}
	else
	{
	mysql_close($con);
	header("Location: bed_14.php?err=1");
	}
?>