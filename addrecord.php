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
        ?>
<hr>
            <h3>Add a new record to the database</h3>
    
<?php
    if ($_SESSION['added']==1){
	echo "Successfully added!";
	$_SESSION['added']=0;
    }?>
           <form method="post" action="add.php" >
            First name*:<br>
            <input type="text" name="firstname" required><br>
            Last name*:<br>
            <input type="text" name="lastname" required><br><br>
            Birthdate:<br>
            <input type="date" name="birth"><br><br>
            Deathdate:<br>
            <input type="date" name="death"><br><br>
            Property Owner?:<br>
            <input type="text" name="prop" placeholder="y/n"><br><br>
            Marital Status*:<br>
            <input type="text" name="marital" placeholder="Married/Single/Divorced" required><br><br>
            Date Arrived to Penfield:<br>
            <input type="date" name="arrive"><br><br>
            Date Left Penfield:<br>
            <input type="date" name="left"><br><br>
            <input type="submit" value="Add Record">
</form> 
<br>
<form method="post" action="./index.php">
	<input type="submit" name="return" id="return2" value="Return to Main Menu">
</form>
    <?php
    }
    else {
        echo "Unauthorized, not logged in";
    }
    ?>
