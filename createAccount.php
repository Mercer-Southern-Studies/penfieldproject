<?php
if (isset($_POST['password1']))
{
	if ($_POST['password1'] == $_POST['password2'])
	{
		$hashedPass = password_hash($_POST['password1'],PASSWORD_DEFAULT);
		$con = new mysqli('localhost','root','bSccPS3saECo3Z','penfield');
		if ($con->connect_error)
  		{
  		die('Could not connect to mySQL: ' . $con->connect_error);
  		}

		$sql = "INSERT INTO users (userid, FirstName, LastName, Password) VALUES ('$_POST[username]','$_POST[firstname]', '$_POST[lastname]', '$hashedPass')";

	        if (!$con->query($sql)=== TRUE)
       		   {
       		   die('Error adding User: ' . $con->error);
       		   }
				  header("Location: index.php");
       	 }
			


	else
	{
		die('Passwords do not match');
	}
}
else
{
  echo "Send me the data";
}
?>
