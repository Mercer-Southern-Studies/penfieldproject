<!DOCTYPE html>
<html>
<head>
<title>History DB</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
  <h1>Penfield Project</h1>
  <h2>Mercer University History Department</h2>
<?php
    session_start();
    if ($_SESSION['loggedin']!=1){
?>
<h3>Returning Users Login: </h3>
<form action="login.php" method="post">
          <table style="margin:auto; width:400px; border:solid; padding: 20px;">
            <tr>
              <td style="text-align:right;">User Name : </td>
              <td><label for="username"></label>
              <input name="username" type="text" id="username" size="35" /></td>
            </tr>
            <tr>
              <td style="text-align:right;">Password : </td>
              <td><label for="pass"></label>
              <input name="password" type="password" id="pass" size="35" /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="submit" id="submit" value="Login" /></td>
            </tr>
          </table>
        </form>
        <h3><a href="./register.php">New user? Register here</a></h3>
<?php
    }
    else{
        echo "Welcome, " . $_SESSION['username'] . "!";
        ?>
	<h3>Actions</h3>
		<h4><a href="./viewrecords.php">View Records in the Database</a></h4>
	<h4><a href="./addrecord.php">Add a record to the Database</a><h4>
<!-- <h4><a href="./editrecord.php">Edit a record in the Database</a></h4>
     -->     <form method="post" action="./logout.php">
            <input type="submit" name="submit" id="submit" value="Logout" />
          </form>
        <?php
    }
?>

</body>
</html>
