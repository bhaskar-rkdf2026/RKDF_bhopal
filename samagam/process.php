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
 
// create a variable
$part_team=$_POST['part_team'];
$col_ins=$_POST['col_ins'];
$university=$_POST['university'];
$branch_cource=$_POST['branch_cource'];
$year=$_POST['year'];
$number_contact=$_POST['number_contact'];
$email=$_POST['email'];
$part_teamf=$_POST['part_teamf']; 
$sem=$_POST['sem']; 
$event=$_POST['event']; 
//Execute the query
 
		
	
		
?>
	
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
						
					<font size="50px" align="center">SAMAGAM 2K17</font>	<br/>
				<font style="float:right">Number of registration "<?php	echo $_POST['number_contact']; ?>"</font><br/><br/>
				
			<font style="float:left">Name : <?php echo $_POST['part_team']; ?></font> <br/>
			<font style="float:left">College : <?php echo $_POST['col_ins']; ?></font> <br/>	
				<font style="float:left">Event : <?php echo $_POST['event']; ?></font> <br/><br/>
			
						
					<font style="float:right">Contact information:-</font>	<br/>
			
			<font style="float:left">Mobile number : <?php echo $_POST['number_contact']; ?></font> <br/>
			<font style="float:left">Email : <?php echo $_POST['email']; ?></font> <br/>
			
			</header>									
					</section><hr width="50%"/>
						<section id="main">
						<header>
						
					<font size="25px" align="center">Receiving Slip:-</font>	<br/>
		
				
			<font style="float:left">Name : <?php echo $_POST['part_team']; ?></font> <br/>
			<font style="float:left">Event : <?php echo $_POST['event']; ?></font> <br/>
			<font style="float:right"> Signature:Incharge_______________________/Candidate________________________</font><br/><br/><br/>
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