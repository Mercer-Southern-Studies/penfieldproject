<?php
session_start();
if (isset($_POST['password']))
{
    $con = new mysqli('localhost','root','bSccPS3saECo3Z','penfield');
    

		if ($con->connect_error)
  		{
  		  die('Could not connect to mySQL: ' . $con->connect_error);
  		}
		echo "Hello<br>";
      $passquery = (mysqli_query($con, "SELECT Password FROM users WHERE userid='$_POST[username]'"));
	$row = $passquery->fetch_assoc();
	$password = $row["Password"];
		echo $password[0] . "<br>";
      $pass = password_verify($_POST['password'],$password);
	if ($pass) {
   $sql = "SELECT  * FROM users Where userid='$_POST[username]';";
	}
	else {
		die('wrong password, try again');
	}

echo $sql . "<br>";
if ($result=mysqli_query($con,$sql))
  {
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    if ($rowcount == 1)
    {
	    $_SESSION['loggedin']=1;
      $_SESSION['username']=$_POST['username'];
    }
      else
    {
	    echo $sql . "<br>";
   	  die('Error adding User: ' . $con->error);
    }
  }
else
  {
	die('Need a password');
  }
}
header("Location: index.php");
?>
