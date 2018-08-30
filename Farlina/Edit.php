<html>
	<head>
		<title>Bookworms</title>
	</head>
	<body>
		<h2>Profile</h2>
		<a href="Profile.php">Click here to go back</a><br/><br/>
		<form action="Edit.php" method="post">
			Edit email: <input type="text" name="email" /> <br/>
Edit Address: <input type="text" name="address" /> <br/>
Edit First name: <input type="text" name="fname"  /> <br/>
Edit Last name: <input type="text" name="lname"/> <br/>
Edit Phone number: <input type="text" name="phn"  /> <br/>
Edit Password: <input type="password" name="password"/> <br/>

			Enter Card number: <input type="text" name="card_number" /> <br/>
		
			


			<input type="submit" value="Submit"/>
		</form>
	</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "") or die($link);
$link1 = mysqli_connect("localhost", "root", "") or die($link1);
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$card_number = mysqli_real_escape_string($link,$_POST['card_number']);
	
	session_start();
	$username =  $_SESSION['user'];
        $password = mysqli_real_escape_string($link,$_POST['password']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$address = mysqli_real_escape_string($link,$_POST['address']);
 	$fname = mysqli_real_escape_string($link,$_POST['fname']);
	$lname = mysqli_real_escape_string($link,$_POST['lname']);
	$phn = mysqli_real_escape_string($link,$_POST['phn']);
	
  
	

   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); //Connect to database
	//mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	//mysqli_select_db("bookworm") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query($link,"Select * from Card"); //Query the users table

///entering card info
if(!empty($card_number)){
	while($row = mysqli_fetch_array($query))
	{
		
		$table_users = $row['Card_number']; 
		if($card_number == $table_users) // checks if there are any matching fields
		{
			$bool = false; 
			Print '<script>alert("Already exits");</script>'; 
			Print '<script>window.location.assign("Profiler.php");</script>'; 
		}
	}
	if($bool) 
	{
$query11 =  mysqli_query($link,"Select * from Customers "); 
	while($row = mysqli_fetch_array($query11))
	{
		$customer_id = $row['Customer_id'];
mysqli_query($link,"INSERT INTO Card (Customer_id,Card_number,User_name) VALUES ('$customer_id','$card_number','$username') "); 
		
		
	}

		

		



             

}
}

//editing password and address


mysqli_select_db($link1,"bookworm") or die("Cannot connect to database"); //Connect to database
$query1 = mysqli_query($link1,"Select * from Customers"); 

if(!empty($password)){

while($row1 = mysqli_fetch_array($query1))
	{
		$table_username1 = $row1['User_name']; 
		if($username == $table_username1) // checks if there are any matching fields
		{
			mysqli_query($link1," UPDATE Customers SET Customers.Password='$password' WHERE User_name='$username'");


			Print '<script>alert(" submitted");</script>'; 
			
		}
	}




} 
if(!empty($address)){

while($row1 = mysqli_fetch_array($query1))
	{
		$table_username1 = $row1['Address']; 
		if($username == $table_username1) // checks if there are any matching fields
		{
			mysqli_query($link1," UPDATE Customers SET Customers.Address='$address' WHERE User_name='$username'");


			Print '<script>alert(" submitted");</script>'; 
			
		}
	}




} 


		


 
		Print '<script>alert("Successfully submitted");</script>'; 
		Print '<script>window.location.assign("Profile.php");</script>'; 
	
}
?>
