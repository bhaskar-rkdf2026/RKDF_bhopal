<?php
session_start();
 $mobile=$_REQUEST["mob"];
 $dob=$_REQUEST["dobf"];
 
  /*?>$con=mysql_connect("localhost","root","rootwdp");<?php */
 $con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
if(!$con)
	{
	  die ('could not connect').mysql_error();
	}
	mysql_select_db("rkhare_rkdfadmitcard",$con);
	$qry="select * from phd_admitcard23 where mob='".$mobile."' and dob='".$dob."'";						
	$result=mysql_query($qry);	
    $row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	 {
		$mobile=$row["mob"];
		$_SESSION['xmob']=$mobile;                                      
	   header("Location: phdadmitcard.php");
	 }
	else
	{
	mysql_close($con);
	header("Location: phd_ent_admitcard.php?err=1");
	}
?>