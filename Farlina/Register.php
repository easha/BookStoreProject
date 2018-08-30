<html>
	<head>
		<title>Bookworms</title>
	</head>
	<body>
		<h2>Registration Page</h2>
		<a href="Index.php">Click here to go back</a><br/><br/>
		<form action="Register.php" method="post">
			Enter Username: <input type="text" name="username" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
Enter email: <input type="text" name="email" required="required" /> <br/>
Enter Address: <input type="text" name="address" required="required" /> <br/>
Enter First name: <input type="text" name="fname" required="required" /> <br/>
Enter Last name: <input type="text" name="lname" required="required" /> <br/>
Enter Phone number: <input type="text" name="phn" required="required" /> <br/>


			<input type="submit" value="Register"/>
		</form>
	</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "") or die($link);
$link1 = mysqli_connect("localhost", "root", "") or die($link1);
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$address = mysqli_real_escape_string($link,$_POST['address']);
 	$fname = mysqli_real_escape_string($link,$_POST['fname']);
	$lname = mysqli_real_escape_string($link,$_POST['lname']);
	$phn = mysqli_real_escape_string($link,$_POST['phn']);

    $bool = true;
mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); //Connect to database
mysqli_select_db($link1,"bookworm") or die("Cannot connect to database"); //Connect to database
	//mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	//mysqli_select_db("bookworm") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query("Select * from Customers"); //Query the users table
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['User_name']; 
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; 
			Print '<script>alert("Username has been taken!");</script>'; 
			Print '<script>window.location.assign("Register.php");</script>'; 
		}
	}
	if($bool) 
	{
 
		

		mysqli_query($link,"INSERT INTO Customers (User_name,Password,First_name,Last_name,Email,Address,Phone_number) VALUES 			('$username','$password','$fname','$lname','$email','$address','$phn')"); 
 
		
		 


		


 
		Print '<script>alert("Successfully Registered!");</script>'; 
		Print '<script>window.location.assign("Register.php");</script>'; 
	}
}
?>
