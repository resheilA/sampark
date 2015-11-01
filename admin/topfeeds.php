	<?php 

	session_start();
	if(isset($_SESSION['contacts']))
	{
	$email=$_SESSION['contacts'];
	}

	if(!isset($_SESSION['contacts']))
	{
	header("location:index.php");
	}

	?>
	
	<p>
	Sampark
			Top 10 latest feeds from our website
	</p>	
	<?php
		// FETCH THE Village NAME
			
					// echo $timenow = date('Y-m-d H:m:s');	
					include('connect.php');

					// Collects data from "Notificaiton" table 					 
					 $sql = "SELECT * FROM polls where To_media = 1 ORDER BY Put_in ASC LIMIT 4;"
					 or die("Couldnt find the table");
					 
					 $sql_result = mysql_query($sql,$connection) or die ( mysql_error());
					 
					 while($row = mysql_fetch_array($sql_result))
					 {
					$name=$row["Question"];
					$village = $row["Village"];
					$yes = $row["Yes"];
					$no = $row["No"];
					echo "Questions<br>";
					echo "<br>$name.<br>";
					echo "Yes : $yes";
					echo "&nbsp NO : $no";
					echo "&nbsp Village : $village";
					}
		?>

