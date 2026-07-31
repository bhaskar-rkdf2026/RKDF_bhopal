<?php
//$link= mysqli_connect(host,username,password,databasename) or die("Can't connect");
try{
    $link= mysqli_connect("localhost","rkhare_prashant","Vcwbtbcpii09") or die("Can't  connect");
    mysqli_select_db($link,"rkhare_result2013");
}catch(Exception $e)
{
    echo "Error Occured while Connecting...";
}

try{
	//$db= new PDO('mysql:host=127.0.0.1;dbname=questionpaper','root','prajesh');
$db= new PDO('mysql:host=localhost','rkhare_prashant','Vcwbtbcpii09');
$db->exec('USE rkhare_result2013');
}catch(Exception $e)
{
    echo "Connection can't be established";
}
?>