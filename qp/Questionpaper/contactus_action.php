<?php 
include './include/common.php';
if($link)
{
 if(isset($_POST['name']))
 {
 //Get name
 $name=$_POST['name'];
 //Get email
 $email=$_POST['email'];
 //Get phone
 $phone=$_POST['phone'];
 //Get college
 $college=$_POST['college'];
 
 $message=$_POST['message'];
    
$query="insert into contactus(name,email,phone,college,messages) values('$name','$email','$phone','$college','$message')"; 
$result= mysqli_query($link, $query);
if($result)
{
 echo 'Message sent successfully.';
}else{
    echo 'Error occured try again';
}
 }
}else{
    echo 'Error occured in the form please check and try again';
}
?>



