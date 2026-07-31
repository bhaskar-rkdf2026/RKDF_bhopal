<?php

 $emailTo="premsah42@gmail.com";
 $subject="Test message of email using php";
 $body="If the message is sent successfully,please reply as soon as possible.";
 $headers="From: premsah42@gmail.com";
 
 if(mail($emailTo,$subject,$body,$headers)){
     echo "Email was sent successfully.";
 }else{
     echo "Email could not be sent";
 }

?>