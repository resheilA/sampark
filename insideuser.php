<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php include("sessions.php");?>
<html>
	<head>
		<title>Suvidha</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="right-sidebar">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">संपर्क</a></h1>
					
				

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<div class="row">
					
						<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
								<header class="major">
									<h2>Suvidha</h2>
									<span class="byline">What type of support you want</span><br>
									<ul tyle='circle'><br><b>
									<li><a href='pollingq.php'>1. Put up a question for polling?</a></li>
									<br>
									<li><a href='awareness.php'>2. Want to know about all the NGO/GOVT activities in your area? </a></li>
									<br>
									<li><a href='medical.php'>3. Need Medical Help?</a></li>
									<br>
									<li><a href='agriculture.php'>4. Help for Farmers</a></li>
									</ul></b>
									<br>
									<h2> Answers to your question</h2>
									<?php
									include('connect.php');

								    $sql88 = "SELECT * FROM polls where Village = '$village'"						
											 or die("Couldnt find the table");
											 
											 $sql_result88 = mysql_query($sql88,$connection) or die ( mysql_error());
											 											 											 
											 while($row88 = mysql_fetch_array($sql_result88))
											 {
											$event = $row88["Action"];
											
											echo "$event<br>";
											}
								  ?>
								  	<?php
									include('connect.php');

								    $sql88 = "SELECT * FROM medical_help where Contact = '$contact'"						
											 or die("Couldnt find the table");
											 
											 $sql_result88 = mysql_query($sql88,$connection) or die ( mysql_error());
											 											 											 
											 while($row88 = mysql_fetch_array($sql_result88))
											 {
											$event = $row88["Solution"];
											
											echo "$event<br>";
											}
								  ?>
								  	<?php
									include('connect.php');

								    $sql88 = "SELECT * FROM farm_help where Contact = '$contact'"						
											 or die("Couldnt find the table");
											 
											 $sql_result88 = mysql_query($sql88,$connection) or die ( mysql_error());
											 											 											 
											 while($row88 = mysql_fetch_array($sql_result88))
											 {
											$event = $row88["Solution"];
											
											echo "$event<br>";
											}
								  ?>
								</header>
								
								
								
								</section>
						</div>

						<!-- Sidebar -->
						<div id="sidebar" class="4u sidebar">
							<section>
								<header class="major">
									<h2>Vote here</h2>
								</header>
								<div class="row half">
									<ul class="default">
								
								
				<?php				
											include('connect.php');

											// Collects data from "Notificaiton" table 
											 $sql = "SELECT * FROM polls where Village = '$village' ORDER BY Put_in LIMIT 4;"
											 or die("Couldnt find the table");
											 
											 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
											 
											 
											 
											 while($row = mysql_fetch_array($sql_result))
											 {
											$question=$row["Question"];										
											$number = $row["Number"];		
											$people = $row["People"];
												
											if (strpos($people,$contact) == false) {																			
											echo "<li>$question<br>
													<form method='post'>
													<input type='hidden' name='quest' value='$question'>
													<input type='radio' name='ans' value='Yes'>Yes
													<input type='radio' name='ans' value='No'>No
													<input type='hidden' name='spkey' value='543'>
													&nbsp<input type='submit' value='Go' style='width:.4cm;height:.6cm;padding:0cm;font-size:0.3cm;'>
													</form><br></li>													
											";
											}
											}
											
											
											
											    if ($_SERVER['REQUEST_METHOD'] == 'POST')
												{
												$login_time = date('Y-m-d H:i:s');												
												$key=$_POST['spkey']; 
												include('connect.php');  
										         
												if($key == 543)
												{
												include("connect.php");											
												$ans=$_POST['ans']; 
												$quest=$_POST['quest'];
												$contacts = $contact;
												if($ans == 'Yes')
												{
												$sql12 = "UPDATE polls
														  SET Yes = Yes + 1
														  WHERE Question = '$quest'";																				
												}
												else
												{
												$sql12 = "UPDATE polls
														  SET No = No + 1
														  WHERE Question = '$quest'";		
														  
												}
													
														  
												$sql_result12 = mysql_query($sql12,$connection);
												
													  $sql14 = "UPDATE polls
														  SET People=CONCAT(People,'+$contact')
														  WHERE Question = '$quest'"; 
												$sql_result14 = mysql_query($sql14,$connection);
													if(!$sql_result14)
												{
												echo "<br><h2> Couldnt add record.".mysql_error();
												} 
												
												if(!$sql_result12)
												{
												echo "<br><h2> Couldnt add record.";
												} 
												else 
												{
												
												echo("Thanks For submitting");
												echo "<script>location.href = 'insideuser.php'</script>";
												}
												}
												else 
												{
												// THE OTHER INSERT QUERY
												}
												}
								?>

								
								
								<!-----------
								<li>Is there jaundice in your area?	<br>
								<form action="" method='post'>
								<input type="radio" name="sex" value="Yes">Yes
								<input type="radio" name="sex" value="No">No
								&nbsp<input type='submit' value='Go' style='width:.4cm;height:.6cm;padding:0cm;font-size:0.3cm;'>
								</form><br></li>
								
								<li>The school teacher in govt school is harassing your kids? </li>
								<form action="" method='post'>
								<input type="radio" name="sex" value="Yes">Yes
								<input type="radio" name="sex" value="No">No
								&nbsp<input type='submit' value='Go' style='width:.4cm;height:.6cm;padding:0cm;font-size:0.3cm;'>
								</form><br></li>
																	
								<li>The school teacher in govt school is harassing your kids? <form></li>
								<form action="" method='post'>
								<input type="radio" name="sex" value="Yes">Yes
								<input type="radio" name="sex" value="No">No
								&nbsp<input type='submit' value='Go' style='width:.4cm;height:.6cm;padding:0cm;font-size:0.3cm;'>
								</form><br></li>
							
							</ul>
									----------------->
								</div>
							</section>
							<section>
								<header class="major">
									<h2>Govt/NGO Updates</h2>
								</header>
								<ul class="default">
								<?php
									include('connect.php');

								 $sql = "SELECT * FROM events where Village = '$village' ORDER BY Put_in LIMIT 5;"
											 or die("Couldnt find the table");
											 
											 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
											 											 											 
											 while($row = mysql_fetch_array($sql_result))
											 {
											$event = $row["Event"];
											
											echo "<li>$event</li>";
											}
								?>
								</ul>
							</section>
						</div>
						
					</div>
				</div>
			</div>



					<!-- Copyright -->
						<div class="copyright">
								<h2>मोबाइल फोन कॉल के माध्यम से समस्या को हल करने के लिए , 9824213256 पर कॉल करें |</h2>			
						</div>

				</div>
			</div>

	</body>
</html>