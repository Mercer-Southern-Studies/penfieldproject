<?php
session_start();
   $con = new mysqli('localhost','root','bSccPS3saECo3Z','penfield');
   if ($con->connect_error)
     {
     die('Could not connect to mySQL: ' . $con->connect_error);
     } 
   $sql1 = "INSERT INTO people (fname, lname, maritalstatus";
$sql2=") VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[marital]'";

   if(isset($_POST['birth'])){
	   $sql1 = $sql1 . ", birthdate";
	   $sql2 = $sql2 . ",'$_POST[birth]'";
   }
   if(isset($_POST['death'])){
	$sql1 = $sql1 . ", deathdate";
	$sql2 = $sql2 . ",'$_POST[death]'";
   }
   
   if(isset($_POST['prop'])){
	$sql1 = $sql1 . ", property";
	$sql2 = $sql2 . ",'$_POST[prop]'";
   }

   if(isset($_POST['arrive'])){
	$sql1 = $sql1 . ", arrivaldate";
	$sql2 = $sql2 . ",'$_POST[arrive]'";
   }
 
   if(isset($_POST['left'])){
	$sql1 = $sql1 . ", leavedate";
	$sql2 = $sql2 . ",'$_POST[left]'";
   }
   $sqlfinal = $sql1 . $sql2 . ");";

   echo $sqlfinal;
   echo "<br><br>";

    if (!$con->query($sqlfinal)===TRUE){
        die('Error adding record: ' . $con->error);

    }
    $_SESSION['added']=1;
    header("Location: addrecord.php");

?>
