<?php 

session_start();
<<<<<<< HEAD
if(isset($_SESSION['contact']))
{
// ADD SESSIONS

$contact=$_SESSION['contact'];

									include('connect.php');

											// Collects data from "Notificaiton" table 
											 $sql = "SELECT * FROM user_database where Contact = '$contact';"
											 or die("Couldnt find the table");
											 
											 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
											 											 
											 while($row = mysql_fetch_array($sql_result))
											 {
										  	$village=$row["Village"];		
											 }

}

if(!isset($_SESSION['contact']))
{
header("location:insideuser.php");
}

?>


=======
if(isset($_SESSION['user']))
{
$email=$_SESSION['user'];
}

if(!isset($_SESSION['user']))
{
header("location:home.php");
}

?>
>>>>>>> origin/master
