<html>
	<head>
		<title>Bookworms</title>
	</head>
<h2>Category</h2>
	<body>
<a href="Home.php">Click here to go back</a><br/><br/>
<form action="Category.php" method="post">

<br/>
 <input type="radio" name="type"value="horror">Horror
  <input type="radio" name="type" value="cooking">Cooking
<input type="radio" name="type" value="liturature">Liturature
<input type="radio" name="type" value="action">Action
<input type="radio" name="type" value="mystery">Mystery
<input type="radio" name="type" value="biography">Biography
<input type="radio" name="type" value="history">History
<input type="radio" name="type" value="religion">Religion
<input type="radio" name="type" value="romance">Romance
<input type="radio" name="type" value="science_fiction">Science fiction
<input type="radio" name="type" value="poetry">Poetry
<input type="radio" name="type" value="comic">Comic
<input type="radio" name="type" value="manga">Manga

  <br><br>
  
<input type="submit" value="Search"/>

</form>
		
		
		
		
	</body>
</html>

<?php
session_start();
$link = mysqli_connect("localhost", "root", "") or die($link);

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$type =  mysqli_real_escape_string($link,$_POST['type']);
	
  
	

   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); 
$query = mysqli_query($link,"Select * from Books "); //Query the users table
	$table_type="";
while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_type = $row['Category']; 

			if($table_type == $type )
			{ echo "Book name: " . $row["Title"]. "<br>";
		 echo "About: " . $row["About"]. "<br>";//showing info of the book
echo "Price: " . $row["Price"]. "<br>";}


			
		}


	



		


 
	
}
?>
