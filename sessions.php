<?php 

session_start();
if(isset($_SESSION['user']))
{
$email=$_SESSION['user'];
}

if(!isset($_SESSION['user']))
{
header("location:home.php");
}

?>
