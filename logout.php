<?php 
session_start();
$email=$_SESSION['contact'];
session_destroy();
header("location:index.html");
?>