<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>RKDF SAMAGAM REGISTRATION PORTAL</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-labels-on-top.css">

</head>


	<header>
		<h1>RKDF SAMAGAM 2k17</h1>
    </header>


    <div class="main-content">


<?php 
include 'database.php';?>
 

<?php
 
// create a variable
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$department=$_POST['department'];
$email=$_POST['email'];
 
//Execute the query
 
mysqli_query($connect,"INSERT INTO employees1(first_name,last_name,department,email)
				VALUES('$first_name','$last_name','$department','$email')");
		

         
<div class="form-title-row"><h1>DETAILS echo $_POST[' first_name'];  </h1></div>
echo '<br />';
echo $_POST['email'];

		 
?>

</div>

</body>

</html>
