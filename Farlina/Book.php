<html>
	<head>
		<title>Bookworms</title>
	</head>
<h2>Books</h2>
	<body>
<a href="Home.php">Click here to go back</a><br/><br/>

		
		
		
		
	</body>


<?php


$link = mysqli_connect("localhost", "root", "") or die($link);


session_start();
	
	
 
	

   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); 
	$bookid = $_SESSION['bookid'];
	$typee = $_SESSION['type'];
	$query9= mysqli_query($link,"Select * from Books where Book_id = '$bookid'  ");
		while($row3= mysqli_fetch_assoc($query9))
			{
				 echo "Book name:  " . $row3["Title"]. "<br>";
		echo "Book Price:  " . $row3["Price"]. "<br>";
		echo "Author name:  " . $row3["Author_name"]. "<br>";
		echo "Publisher:  " . $row3["Publisher_name"]. "<br>";


	
echo "About:  " . $row3["About"]. "<br>";


				}



		


 
		//Print '<script>alert("Successfully submitted");</script>'; 
		//Print '<script>window.location.assign("Profile.php");</script>'; 
	

?>

<body>

<form action="Book.php" method="post">
Give Rating: <input type="text" name="rating" /> <br/>
Give Review: <input type="text" name="review" /> <br/>


		
			<input type="submit" value="Submit"/>
		</form>
		
		
		
		
	</body>

<?php
$link2 = mysqli_connect("localhost", "root", "") or die($link2);

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	$customerid =  $_SESSION['customerid'];
        $rating = mysqli_real_escape_string($link2,$_POST['rating']);
	$review = mysqli_real_escape_string($link2,$_POST['review']);

		 $bool = true;
	mysqli_select_db($link2,"bookworm") or die("Cannot connect to database"); //Connect to database
	//mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	//mysqli_select_db("bookworm") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query($link2,"Select * from Review"); //Query the users table




		while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			

		
		if(($customerid == $row['Customer_id']) && ($bookid == $row['Book_id']) ) // checks if there are any matching fields
		{               Print '<script>alert("Already exists");</script>'; //Prompts the user
			Print '<script>window.location.assign("Home.php");</script>'; // redirects to login.php
		}
		else
		{
			mysqli_query($link2,"INSERT INTO Review (Customer_id,Review,Book_id,Type,Rating) VALUES 			('$customerid','$review','$bookid','$typee','$rating')"); 
 
		}
	

}





}
  
	
?>

</html>
