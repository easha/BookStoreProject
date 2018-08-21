<html>
	<head>
		<title>Sign In</title>
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
 <h2>BookWorms Sign In</h2>
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
	<a href="#popup1" class="m"> <span class="fa fa-envelope-o" aria-hidden="true"></span>Sign in With Email</a>
</li>
</ul>

<div id="popup1" class="overlay">
	<div class="popup">
		  <form action="Checklogin.php" method="post">
			  	<div class="form-group">
                <input type="text" name="username" placeholder="User Name" required="required">
				</div>
				<div class="form-group">
                <input type="password" name="password" placeholder="Passwrord" required="required">
				</div>
                <input type="submit" value="Sign In">
              </form>
		<a class="close" href="#">&times;</a>
	</div>
</div>
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