	<?php 

	session_start();
	if(isset($_SESSION['contacts']))
	{
	header("location:topfeeds.php");
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
							<h2>Login</h2>
<form method='post'>
Enter your mobile number
<input type='text' placeholder='Enter Your mobile number' name='number'>
<br>
Your Passkey
<input type='password' placeholder='Enter Your password' name='password'>
<br>
<input type='submit' value='Submit'>
</form>
<?php 


//FETCH THE NAME IF THERE THEN TO OTHER DATABASE IF NOT THEN REGISTER AND OPEN ALL
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

include("connect.php");

$email=$_POST['number'];
$password=$_POST['password'];                           

$sql1="SELECT * FROM sub_admins WHERE Contact='$email'";

$result1=mysql_query($sql1);

$count1=mysql_num_rows($result1);
$login_time = date('Y-m-d H:i:s');
if($count1==1)
{
$sql2="SELECT * FROM sub_admins WHERE Password='$password'";

$result2=mysql_query($sql2);

$count2=mysql_num_rows($result2);

if($count1==1)
{

// ADD SESSIONS
session_start();
$_SESSION['contacts']=$email;
die("<script>location.href = 'topfeeds.php'</script>");



}
else
{
die("<script>location.href = 'index.php'</script>");
}
}
else
{
die("<script>location.href = 'index.php'</script>");
}


}			

?>