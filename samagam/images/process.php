<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>FORMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

	
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
		
	
		
?>
	
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
						<h1>
						
					<?php	echo $_POST['first_name']; ?>


</h1>	
						<p><?php echo $_POST['email']; ?></p>
						</header>									
					</section>
					
					
					
			
					<section id="main">
						<header>
						<h1>Alpha Bilal</h1>	
						<p>Professional Ethical Hacker</p>
						</header>
						</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Alpha Bilal</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>