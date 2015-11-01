<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<?php include("sessions.php");?>
<?php include("header.php"); ?>
		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<div class="row">
					
						<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
								<header class="major">
									<h2>Jaagrat</h2>
									<span class="byline">Know what is going around you</span><br>
									<br>
									<ul>Updates
									<?php
									include('connect.php');

									$sql = "SELECT * FROM events where Village = '$village' ORDER BY Put_in;"
											 or die("Couldnt find the table");
											 
											 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
											 											 											 
											 while($row = mysql_fetch_array($sql_result))
											 {
											$event = $row["Event"];
											
											echo "<li>$event<hr></li>";
											}
								?>
									</ul>
									<br><br>
									<table><tr><td><a href="tel:+900300400">To get the latest info click here</a></td></tr></table>
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
											 $sql = "SELECT * FROM polls where Village = '$village' ORDER BY Put_in;"
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