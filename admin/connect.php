<?php
error_reporting(E_ALL ^ E_DEPRECATED); 


//Database connectivity statements
$connection= mysql_connect("localhost","root","")
or die ("Couldn't connect to the server.");            //<---- Server validation

//select a database to work with
$db = mysql_select_db("sampark",$connection)
  or die("Could not connect to database.");                 //<----- Database Validation

 ?>