<html>
	<head>
		<title>My first PHP website</title>
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
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$email = mysql_real_escape_string($_POST['email']);
	$address = mysql_real_escape_string($_POST['address']);
 	$fname = mysql_real_escape_string($_POST['fname']);
	$lanme = mysql_real_escape_string($_POST['lname']);
	$phn = mysql_real_escape_string($_POST['phn']);

    $bool = true;
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("bookworm") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from Customers"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['User_name']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_User_name) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("Register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO Customers (User_name,Password,First_name,Last_name,Email,Address,Phone_number) VALUES ('$username','$password','$fname','$lname','$email','$address','$phn')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("Register.php");</script>'; // redirects to register.php
	}
}
?>
