<html>
<head>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/fav.png">
  <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/fav.png">
<style>
label{display:inline-block;width:100px;margin-bottom:10px;}
</style>
 
 
<title>Add Employee</title>
</head>
<body>
 
<form method="post" action="process.php">
<label>First Name</label>
<input type="text" name="first_name" />
<br />
<label>Last Name</label>
<input type="text" name="last_name" />
<br />
<label>Department</label>
<input type="text" name="department" />
<br />
<label>Email</label>
<input type="text" name="email" />
 
<br />
<input type="submit" value="Add Employee">
</form>
 
 
 
</body>
</html>