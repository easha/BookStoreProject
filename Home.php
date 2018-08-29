<html>
    <head>
        <title>Bookworms</title>
  <h2>Recommended for you </h2>
    </head>
   <?php

   session_start(); 
$link = mysqli_connect("localhost", "root", "") or die($link);
   if($_SESSION['user']){ 
   }
   else{
      header("location: Index.php"); 
   }
   $user = $_SESSION['user']; //assigns user value

   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); 

//new books recommendation

$query4 = mysqli_query($link,"Select * from Books  ORDER BY Book_id DESC
LIMIT 3")  or die( mysqli_error($link)); //recent book suggestion
	while($row = mysqli_fetch_array($query4))
	{
 		  echo "Book name:  " . $row["Title"]. "<br>";
		echo "Book Price:  " . $row["Price"]. "<br>";
		echo "Author:  " . $row["Author_name"]. "<br>";
		
		
	}







$query = mysqli_query($link,"Select * from Customers "); //Query the users table
	$table_cus="";
while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_cus = $row['User_name']; 

			if($table_cus == $user )
			{

 $customer_id = $row['Customer_id'];}


			
		}
$query2 = mysqli_query($link,"Select * from Recommendation "); //Query the users table
	$table_rec="";
while($row = mysqli_fetch_assoc($query2)) //display all rows from query
		{
			$table_rec = $row['Customer_id']; 

			if($table_rec == $customer_id )
			{
$bool=false;
}


			
		}

if($bool)
{mysqli_query($link,"INSERT INTO Recommendation (Customer_id,Horror,Cooking,Liturature,Adventure,Mystery,Biography,History,Religion,Romance,Science_fiction,Poetry,Comic,Manga) VALUES ('$customer_id','0','0','0','0','0','0','0','0','0','0','0','0','0')");}





   ?>
    <body>
        <h2>Home Page</h2>
        
<p>Hello <?php Print "$user"?>!</p>

        <a href="Logout.php">Click here to go logout</a><br/><br/>
	<a href="Profile.php">profile</a><br/><br/>
	<a href="Category.php">Category</a><br/><br/>
	<a href="Payment.php">Click here to pay</a><br/><br/>
        <form action="Home.php" method="post">
			Book name: <input type="text" name="book_name" /> <br/>
			Author<input type="text" name="author" /> <br/>


			
			


			<input type="submit" value="Search"/>
		</form>
 
   



 
<body>



 <?php


$link = mysqli_connect("localhost", "root", "") or die($link);
 
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$book_name =  mysqli_real_escape_string($link,$_POST['book_name']);
$author =  mysqli_real_escape_string($link,$_POST['author']);
   $user = $_SESSION['user']; //assigns user value

   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); 

//search
 
			

$query4 = mysqli_query($link,"Select * from Books  where Books.Title = '$book_name' OR  Books.Author_name = '$author'")  or die( mysqli_error($link)); 
	while($row = mysqli_fetch_array($query4))
	{	
		

	
 		 echo "Book name:  " . $row["Title"]. "<br>";
		echo "Book Price:  " . $row["Price"]. "<br>";
		echo "Author:  " . $row["Author_name"]. "<br>";
		
		
		

		
		
	}

}



   ?>
</html>
