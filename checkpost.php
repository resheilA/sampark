<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php 
session_start();
if(isset($_SESSION['contact']))
{
header("location:insideuser.php");
}
?>
<html>
	<head>
		<title>Sampark India - Registration</title>
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
	<body class="no-sidebar">

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
					<section>
						<header class="major">
							<h2>Registration</h2>
<form method='post'>
Enter your mobile number
<input type='text' placeholder='Enter Your mobile number' name='number'>
<br>
Choose your village
<br>
<select name='village' placeholder='Village' style='width:10cm;'>
			
			<?php
			
			// FETCH THE Village NAME
			
					// echo $timenow = date('Y-m-d H:m:s');	
					include('connect.php');

					// Collects data from "Notificaiton" table 
					 $sql = "SELECT * FROM villages;"
					 or die("Couldnt find the table");
					 
					 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
					 
					 while($row = mysql_fetch_array($sql_result))
					 {
					$name=$row["Name"];
					echo "<option value='$name'> $name</option>
					";
					}
		?>



			
			
</select>
<br><br>
<input type='submit' value='Go >>>'>
</form>


<?php

//FETCH THE NAME IF THERE THEN TO OTHER DATABASE IF NOT THEN REGISTER AND OPEN ALL
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

include("connect.php");

$email=$_POST['number'];
$password=$_POST['village'];                           

 
session_start();
$_SESSION['contact']=$email;


$sql1="SELECT * FROM user_database WHERE Contact='$email'";

$result1=mysql_query($sql1);

$count1=mysql_num_rows($result1);
$login_time = date('Y-m-d H:i:s');
if($count1==1)
{
// THE RECORD IS ALREADY PRESNT

//UPDATING THE LOGIN TIME FOR NEXT TIME

$sql12 = "UPDATE user_details
		            SET In_time = '$login_time  
					WHERE Contact = '$email'";
 
					$sql_result12 = mysql_query($sql12,$connection);


die("<script>location.href = 'insideuser.php'</script>");


}
else 
{

// INSERTING THE RECORD IF NEW


include('connect.php');  

echo $sql2="INSERT INTO user_database (Contact, Village, In_time) VALUES ('$email','$password','$login_time')";          //<------ Validation for table signup
$sql_result2 = mysql_query($sql2,$connection) or die();

if(!$sql_result2)
{
echo "<br><h2> Couldnt add record.";
} 
else 
{
//echo"<h2><br>Thanks for signing up";



// ADD SESSIONS


echo("<script>location.href = 'insideuser.php'</script>");


}


}


}
?>
		</section>
				</div>
			</div>
				
				

					<!-- Copyright -->
						<div class="copyright">
							<h2>मोबाइल फोन कॉल के माध्यम से समस्या को हल करने के लिए , 9824213256 पर कॉल करें |</h2>					</div>

				</div>
			</div>

	</body>
</html>