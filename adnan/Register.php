<html>
	<head>
		<title>Sign In/Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Emporium registration Form Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!--//webfonts-->

	<style media="screen">
	  #fb-btn{
	    margin-top: 10px;
	    padding: 10px;
	    background-color: #4C69B9;
	    text-align: center;
	    }
	  #profile, #logout{
	    display: none;
	  }
	  #logout{
	    color: #000000;
	    background-color: #ff6666;
	  }
	</style>

</head>
<body>


 <div class="w3l_frm">
 <div class="container">
 <h2>BookWorm Registration Form</h2>
			<div class="header-social wthree">

				<ul>
          <li id="logout" onclick="logout()"><a  href="#" >Log Out</a></li>

          <li>

            <fb:login-button
                id ="fb-btn"
                scope="public_profile,email, user_birthday, user_location"
                onlogin="checkLoginState();">
            </fb:login-button>

          </li>

				</ul>


				<div class="line-mid">
					<h4>or</h4>
				</div>
			</div>
			<div class="header-social wthree">
			<ul>
<li>
	<a href="#popup1" class="m"> <span class="fa fa-envelope-o" aria-hidden="true"></span>Register With Email</a>
</li>
</ul>

<div id="popup1" class="overlay">
	<div class="popup">
		  <form action="#" method="post">
			  <div class="form-group">
                <input type="text" name="username" placeholder="User Name" required="required">
				</div>
				<div class="form-group">
                <input type="password" name="password" placeholder="Password" required="required">
				</div>
				<div class="form-group">
                <input type="email" name="email" placeholder="Email" required="required">
				</div>
				<div class="form-group">
                <input type="text" name="fname" placeholder="Full Name" required="required"><br>
				</div>
				<div class="form-group">
                <input type="text" name="address" placeholder="Home Address" required="required"><br>
				</div>
				<div class="form-group">
                <input type="text" name="phn" placeholder="Phone Number" required="required"><br>
				</div>
                <input type="submit" value="Register">
              </form>
		<a class="close" href="#">&times;</a>

	</div>
</div>

			</div>
			<h3>By Signing I agree to the <a href="#">Terms and Conditions</a></h3>

			<div class="w3_acc">
			<ul>
					<li><h4>Already had an Account?</h4></li>
					<li>
						<div class="w3ls_su">
							<a href="Login.php">Sign In</a>
						</div>
					</li>
			</ul>
			</div>

		</div>
 </div>

 <div class="container">
   <h3 id="heading">Log in to view your profile</h3>
   <div id="profile"></div>
 </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="app.js"></script>

</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "") or die($link);
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$address = mysqli_real_escape_string($link,$_POST['address']);
 	$fname = mysqli_real_escape_string($link,$_POST['fname']);
	$phn = mysqli_real_escape_string($link,$_POST['phn']);

    $bool = true;
mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); //Connect to database
	//mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	//mysqli_select_db("bookworm") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query("Select * from Customers"); //Query the users table
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['User_name']; 
		if($username == $table_User_name) // checks if there are any matching fields
		{
			$bool = false; 
			Print '<script>alert("Username has been taken!");</script>'; 
			Print '<script>window.location.assign("Register.php");</script>'; 
		}
	}
	if($bool) 
	{
		mysqli_query($link,"INSERT INTO Customers (Full_name,Email,Address,Phone_number,User_name,Password) VALUES ('$fname','$email','$address','$phn','$username','$password')"); 
		Print '<script>alert("Successfully Registered!");</script>'; 
		Print '<script>window.location.assign("Login.php");</script>'; 
	}
}
?>
