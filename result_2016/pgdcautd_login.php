<?php
session_start();
 $rno=$_REQUEST["rno"];
 /*?>$con=mysql_connect("localhost","root","rootwdp");
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
<?php */

 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
 //$con=mysql_connect("localhost","root","rootwdp");
if(!$con)
	{
	  die ('could not connect').mysql_error();
	}
	mysql_select_db("rkhare_result2013",$con);
	$qry=" select * from pgdca_2017  where rollno='".$rno."'";						
	$result=mysql_query($qry);	
    $row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	{
	    $rno=$row["rollno"]; 
		$_SESSION['xrno']=$rno;		
	header("Location: pgdcautd.php");
	}
	else
	{
	mysql_close($con);
	header("Location: pgdcautdresult.php?err=1");
	}
?>