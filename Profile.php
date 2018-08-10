<html>
	<head>
		<title>Bookworms</title>
	</head>
	<body>
		<h2>Profile</h2>
		<a href="Home.php">Click here to go back</a><br/><br/>
<a href="Edit.php">Click here to edit profile</a><br/><br/>
<form action="Register.php" method="post">
			
		</form>
		
	</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "") or die($link);
session_start();
	$username =  $_SESSION['user'];
mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); //Connect to database

	$query = mysqli_query($link,"Select * from Customers WHERE Customers.User_name='$username'")  or die( mysqli_error($link)); //Query the users table
	while($row = mysqli_fetch_array($query))
	{
 		 echo "First name: " . $row["First_name"]. "<br>";
		 echo "Last name: " . $row["Last_name"]. "<br>";
		
	}
	
?>
