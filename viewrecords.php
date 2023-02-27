<!DOCTYPE html>
<html>
	<head>
		<title>Penfield Project</title>
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
  <h1>Penfield Project</h1>
  <h2>Mercer University History Department</h2>
<?php
    session_start();
    if ($_SESSION['loggedin']==1){
	    
		$con = new mysqli('localhost','root','bSccPS3saECo3Z','penfield');
    
		if ($con->connect_error){
			die('Could not connect to mySQL: ' . $con->connect_error);
		}
  		
		$sql = "SELECT * FROM people;";
	
		if ($result=mysqli_query($con,$sql)){
			$rowcount = mysqli_num_rows($result);
			if ($rowcount == 0){
?><form method="post" action="./index.php">
				<input type="submit" name="return" id="return" value="Return to Main Menu">
				</form><?php
				die('Nothing returned from database');
			}
			?>
			<table border="1" style="margin:auto">
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Brithdate</th>
					<th>Deathdate</th>
					<th>Property Owner?</th>
					<th>Marrital Status</th>
					<th>Date of Arrival to Penfield</th>
					<th>Date Left Penfield</th>
				</tr>
			
			<?php

			foreach ($result as $row) {
				echo "<tr><td>" . $row['peopleID'] . "</td><td> " . $row['fname']. " </td><td> " . $row['lname'] .
				       	"</td><td>" . $row['birthdate'] . "</td><td> " . $row ['deathdate'] . "</td><td> " . $row['property'] ."</td><td>" . $row['maritalstatus'] . "</td><td>" . $row['arrivaldate'] . "</td><td>" . $row['leavedate']  .  "</td></tr>";
			}
			?>
			</table>
			<br>
			<form method="post" action="./index.php">
				<input type="submit" name="return" id="return" value="Return to Main Menu">
			</form>
			<?php
		}
		else {
			echo "No";
		}
	}
?>
	</body>
</html>
