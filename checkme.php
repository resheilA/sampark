<?php                           
include("connect.php");

$email=$_POST['user_email'];
$password=$_POST['user_pass'];   
$login_time = date('Y-m-d H:i:s');


echo $sql="SELECT * FROM ngo_details WHERE (Username = '$email' AND Password = '$password AND Logged_in = '0'')";

$result=mysql_query($sql);

echo $result;
$count=mysql_num_rows($result);


if($count==1)
{

include('connect.php');

		$sql2 = "UPDATE ngo_details
		            SET Logged_in='1', Sign_in='$login_time'
					WHERE Username = '$email'";
 
					$sql_result2 = mysql_query($sql2,$connection);


 
session_start();
$_SESSION['user']=$email;

// This is for log

$date = date("F jS Y, h:iA.");
$ipaddress = getenv("REMOTE_ADDR");
$browser = getenv('HTTP_USER_AGENT');
$newfile= fopen("records/$email.txt", "a+");
fwrite($newfile, "Login on $date : $ipaddress || $browser ");
fclose($newfile);


echo "Done";
}
else 
{
echo"Fail flag";
die(mysql_error());
}

/*
else
{
die("<script>location.href = 'http://localhost/Webportal/home.php'</script>");
}
*/
?>
