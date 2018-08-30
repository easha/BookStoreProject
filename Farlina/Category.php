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
<input type="radio" name="type" value="adventure">Adventure
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
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$type =  mysqli_real_escape_string($link,$_POST['type']);
	$username =  $_SESSION['user'];
	
  
	
   	 $bool = true;
	mysqli_select_db($link,"bookworm") or die("Cannot connect to database"); 
	$query = mysqli_query($link,"Select * from Books "); //Query the users table
	$table_type="";
	while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_type = $row['Category']; 
			if($table_type == $type )
			{ 	echo "Book name: " . $row["Title"]. "<br>";
		 		echo "About: " . $row["About"]. "<br>";//showing info of the book
				echo "Price: " . $row["Price"]. "<br>";
 
		
				echo "Author:  " . $row["Author_name"]. "<br>";
			}
			
		}
 	echo "Recommended for you: <br>";
	$query2 = mysqli_query($link,"Select * from Customers "); //Query the users table
	while($row = mysqli_fetch_assoc($query2)) //display all rows from query
		{
			$table_name= $row['User_name']; 
			if($table_name == $username)
			{ $customer_id = $row['Customer_id'];
			}
			
		}
	$query3 = mysqli_query($link,"Select * from Recommendation "); //Query the users table
	while($row = mysqli_fetch_assoc($query3)) //display all rows from query
		{
			$table_reco= $row['Customer_id']; 
			if($table_reco == $customer_id)
				{ 
					if($type == 'horror')
						{
							mysqli_query($link," UPDATE Recommendation  SET Horror = Horror +1");
						}
					else if($type == 'cooking')
						{
							mysqli_query($link," UPDATE Recommendation  SET Cooking = Cooking +1");
						}
					else if($type == 'liturature')
						{
							mysqli_query($link," UPDATE Recommendation  SET Liturature = Liturature +1");
						}
					else if($type == 'biography')
						{
							mysqli_query($link," UPDATE Recommendation  SET Biography = Biography +1");
						}
					else if($type == 'mystery')
						{
							mysqli_query($link," UPDATE Recommendation  SET Mystery = Mystery+1");
						}
					else if($type == 'history')
						{
							mysqli_query($link," UPDATE Recommendation  SET History = History +1");
						}
					else if($type == 'religion')
						{
							mysqli_query($link," UPDATE Recommendation  SET Religion = Riligion +1");
						}
					else if($type == 'romance')
						{
							mysqli_query($link," UPDATE Recommendation  SET Romance = Romance +1");
						}
					else if($type == 'poetry')
						{
							mysqli_query($link," UPDATE Recommendation  SET Poetry = Poetry +1");
						}
					else if($type == 'comic')
						{
							mysqli_query($link," UPDATE Recommendation  SET Comic = Comic +1");
						}
					else if($type == 'manga')
						{
							mysqli_query($link," UPDATE Recommendation  SET Manga = Manga +1");
						}
					else if($type == 'adventure')
						{
							mysqli_query($link," UPDATE Recommendation  SET Adventure = Adventure +1");
						}
					else if($type == 'science_fiction')
						{
							mysqli_query($link," UPDATE Recommendation  SET Science_fiction = Science_fiction +1");
						}
					
					
				}
			
		}
$query4 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
$rec1='';
$rec2='';
while($row = mysqli_fetch_assoc($query4)) //display all rows from query
		{
			$table_type= $row['Horror']; 
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec1 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec1 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec1 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec1 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec1 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec1 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec1 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec1 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec1 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec1 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec1 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec1 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec1 = 'science_fiction';
				}
			
			
		}
if($rec1 == 'horror')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			//$table_type= $row['Horror']; 
			if($row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && 					$row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 						$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			
			else if($row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 							$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if( $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 							$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if( $row['History'] >= $row['Cooking'] && $row['History']>= 							$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 							$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if( $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 							$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && 					$row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 							$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Cooking'] && $row['Romance']>= 							$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && 					$row['Manga'] >= $row['Biography'] && $row['Manga'] >= 								$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 							$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if( $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && 					$row['Science_fiction'] >= 											$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		}
}
else if($rec1 == 'cooking')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if( $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if( $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 							$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= 					$row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] 					>=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			
			else if($row['Liturature'] >= $row['Horror'] &&  $row['Liturature']>= 							$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography']>= 							$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History']>= 					$row['Liturature'] && 					$row['History'] >= $row['Mystery'] && $row['History'] >= 							$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery']>= 					$row['History'] && 					$row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 							$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion']>= 							$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] &&$row['Poetry']>= 					$row['History'] && 						$row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 							$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance']>= 							$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga']>= 					$row['History'] && 					$row['Manga'] >= $row['Biography'] && $row['Manga'] >= 								$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure']>= 							$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] &&  					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && 					$row['Science_fiction'] >= 											$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		}
}
else if($rec1 == 'liturature')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			//$table_type= $row['Horror']; 
			if($row['Horror'] >= $row['Cooking'] &&  $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] &&  $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] &&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] &&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] &&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] &&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] &&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'biography')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			//$table_type= $row['Horror']; 
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] &&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History']  && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History']  && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'mystery')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			//$table_type= $row['Horror']; 
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography']  && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2  = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{  $rec2  = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography']  && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature']  && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2  = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature']  && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{  $rec2 = 'history';
				}
			
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2  = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{  $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{  $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{  $rec2  = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{  $rec2  = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'history')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			//$table_type= $row['Horror']; 
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery']  && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] &&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] &&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking']  && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking']  && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking']  && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking']  && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'religion')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance']  && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry']  && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'romance')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 			&& 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'poetry')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance']  && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance']&& $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance']  && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance']  && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance']  && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance']  && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance']&& $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $re2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'comic')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry']  					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry']					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry']  					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion']  					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion']				&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2 = 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion']  					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga']&&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] 				&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga']&&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'manga')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					 $row['Horror']>= $row['Adventure']&&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror']  && $row['Comic']>= $row['Adventure']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					 && $row['Cooking']>= $row['Adventure']&&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 	 && 						$row['Liturature']>= $row['Adventure']&&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 				&& 						$row['Biography']>= $row['Adventure']&&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2= 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 				&& 						$row['History']>= $row['Adventure']&&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& 						$row['Mystery']>= $row['Adventure']&&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 			&& 						$row['Religion']>= $row['Adventure']&&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 				 && 						$row['Poetry']>= $row['Adventure']&&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					 && 						$row['Romance']>= $row['Adventure']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] &&$row['Adventure'] >= 							$row['Science_fiction'])
				{ $rec2 = 'adventure';
				}
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] &&$row['Science_fiction'] >= 							$row['Adventure'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'adventure')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] &&$row['Horror'] >= 					$row['Science_fiction'] )
				{ $rec2= 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga']&&$row['Comic'] >= 					$row['Science_fiction'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] &&$row['Cooking'] >= 					$row['Science_fiction'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] &&$row['Liturature'] >= 						$row['Science_fiction'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] &&$row['Biography'] >= 						$row['Science_fiction'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] &&$row['History'] >= 						$row['Science_fiction'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] &&$row['Mystery'] >= 						$row['Science_fiction'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] &&$row['Religion'] >= 						$row['Science_fiction'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] &&$row['Poetry'] >= 							$row['Science_fiction'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga']&&$row['Romance'] >= 							$row['Science_fiction'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance']&&$row['Manga'] >= 							$row['Science_fiction'])
				{ $rec2= 'manga';
				}
		
			else if($row['Science_fiction'] >= $row['Horror'] && $row['Science_fiction'] >= $row['Cooking'] && 					$row['Science_fiction']>= 					$row['History'] && $row['Science_fiction'] >= 					$row['Biography'] && $row['Science_fiction'] >= 								$row['Liturature']&&$row['Science_fiction'] 					>= 						$row['Mystery']&& $row['Science_fiction'] >=$row['Poetry'] && 							$row['Science_fiction'] >= $row['Religion'] && $row['Science_fiction'] >= 						$row['Comic'] 					&& $row['Science_fiction'] >= $row['Romance'] && 						$row['Science_fiction']>= $row['Manga'])
				{ $rec2 = 'science_fiction';
				}
		
}
}
else if($rec1 == 'science_fiction')
{$query5 = mysqli_query($link,"Select * from Recommendation Where Customer_id  = '$customer_id'");
while($row = mysqli_fetch_assoc($query5)) //display all rows from query
		{
			if($row['Horror'] >= $row['Cooking'] && $row['Horror'] >= $row['Liturature'] && $row['Horror']>= $row['Biography'] && 					$row['Horror'] >= $row['Mystery'] && $row['Horror'] >= $row['History'] && $row['Horror'] >= $row['Religion']&& 					$row['Horror'] >= $row['Romance'] && $row['Horror'] >= $row['Poetry'] && $row['Horror'] >= $row['Comic'] && 					$row['Horror'] >= $row['Manga'] && $row['Horror']>= $row['Adventure'] )
				{ $rec2 = 'horror';
				}
			
			else if($row['Comic'] >= $row['Cooking'] && $row['Comic'] >= $row['Liturature'] && $row['Comic']>= 					$row['Biography'] && $row['Comic'] >= $row['Mystery'] && $row['Comic'] >= $row['History'] && $row['Comic'] >= 					$row['Religion']&& $row['Comic'] >=$row['Romance'] && $row['Comic'] >= $row['Poetry'] && $row['Comic'] >= 					$row['Horror'] && $row['Comic'] >= $row['Manga'] && $row['Comic']>= $row['Adventure'])
				{ $rec2 = 'comic';
				}
			else if($row['Cooking'] >= $row['Horror'] && $row['Cooking'] >= $row['Liturature'] && $row['Cooking']>= 				$row['Biography'] && $row['Cooking'] >= $row['Mystery'] && $row['Cooking'] >= $row['History']&&$row['Cooking'] 					>= 					$row['Religion']&& $row['Cooking'] >=$row['Romance'] && 				$row['Cooking'] >= $row['Poetry'] && $row['Cooking'] >= 					$row['Comic'] 					&& $row['Cooking'] >= $row['Manga'] && $row['Cooking']>= $row['Adventure'])
				{ $rec2 = 'cooking';
				}
			else if($row['Liturature'] >= $row['Horror'] && $row['Liturature'] >= $row['Cooking'] && $row['Liturature']>= 					$row['Biography'] && $row['Liturature'] >= $row['Mystery'] && $row['Liturature'] >= 					$row['History']&&$row['Liturature'] 					>= 						$row['Religion']&& $row['Liturature'] >=$row['Romance'] && 						$row['Liturature'] >= $row['Poetry'] && $row['Liturature'] >= 						$row['Comic'] 					&& $row['Liturature'] >= $row['Manga'] && 						$row['Liturature']>= $row['Adventure'])
				{ $rec2 = 'liturature';
				}
			else if($row['Biography'] >= $row['Horror'] && $row['Biography'] >= $row['Cooking'] && $row['Biography']>= 					$row['Liturature'] && $row['Biography'] >= $row['Mystery'] && $row['Biography'] >= 					$row['History']&&$row['Biography'] 					>= 						$row['Religion']&& $row['Biography'] >=$row['Romance'] && 						$row['Biography'] >= $row['Poetry'] && $row['Biography'] >= 						$row['Comic'] 					&& $row['Biography'] >= $row['Manga'] && 						$row['Biography']>= $row['Adventure'])
				{ $rec2 = 'biography';
				}
			else if($row['History'] >= $row['Horror'] && $row['History'] >= $row['Cooking'] && $row['History']>= 					$row['Liturature'] && $row['History'] >= $row['Mystery'] && $row['History'] >= 					$row['Biography']&&$row['History'] 					>= 						$row['Religion']&& $row['History'] >=$row['Romance'] && 						$row['History'] >= $row['Poetry'] && $row['History'] >= 						$row['Comic'] 					&& $row['History'] >= $row['Manga'] && 						$row['History']>= $row['Adventure'])
				{ $rec2 = 'history';
				}
			else if($row['Mystery'] >= $row['Horror'] && $row['Mystery'] >= $row['Cooking'] && $row['Mystery']>= 					$row['History'] && $row['Mystery'] >= $row['Biography'] && $row['Mystery'] >= 					$row['Liturature']&&$row['Mystery'] 					>= 						$row['Religion']&& $row['Mystery'] >=$row['Romance'] && 						$row['Mystery'] >= $row['Poetry'] && $row['Mystery'] >= 						$row['Comic'] 					&& $row['Mystery'] >= $row['Manga'] && 						$row['Mystery']>= $row['Adventure'])
				{ $rec2 = 'mystery';
				}
			else if($row['Religion'] >= $row['Horror'] && $row['Religion'] >= $row['Cooking'] && $row['Religion']>= 					$row['History'] && $row['Religion'] >= $row['Biography'] && $row['Religion'] >= 					$row['Liturature']&&$row['Religion'] 					>= 						$row['Mystery']&& $row['Religion'] >=$row['Romance'] && 						$row['Religion'] >= $row['Poetry'] && $row['Religion'] >= 						$row['Comic'] 					&& $row['Religion'] >= $row['Manga'] && 						$row['Religion']>= $row['Adventure'])
				{ $rec2 = 'religion';
				}
			else if($row['Poetry'] >= $row['Horror'] && $row['Poetry'] >= $row['Cooking'] && $row['Poetry']>= 					$row['History'] && $row['Poetry'] >= $row['Biography'] && $row['Poetry'] >= 					$row['Liturature']&&$row['Poetry'] 					>= 						$row['Mystery']&& $row['Poetry'] >=$row['Romance'] && 							$row['Poetry'] >= $row['Religion'] && $row['Poetry'] >= 						$row['Comic'] 					&& $row['Poetry'] >= $row['Manga'] && 						$row['Poetry']>= $row['Adventure'])
				{ $rec2 = 'poetry';
				}
			else if($row['Romance'] >= $row['Horror'] && $row['Romance'] >= $row['Cooking'] && $row['Romance']>= 					$row['History'] && $row['Romance'] >= $row['Biography'] && $row['Romance'] >= 					$row['Liturature']&&$row['Romance'] 					>= 						$row['Mystery']&& $row['Romance'] >=$row['Poetry'] && 							$row['Romance'] >= $row['Religion'] && $row['Romance'] >= 						$row['Comic'] 					&& $row['Romance'] >= $row['Manga'] && 						$row['Romance']>= $row['Adventure'])
				{ $rec2 = 'romance';
				}
			else if($row['Manga'] >= $row['Horror'] && $row['Manga'] >= $row['Cooking'] && $row['Manga']>= 					$row['History'] && $row['Manga'] >= $row['Biography'] && $row['Manga'] >= 					$row['Liturature']&&$row['Manga'] 					>= 						$row['Mystery']&& $row['Manga'] >=$row['Poetry'] && 							$row['Manga'] >= $row['Religion'] && $row['Manga'] >= 						$row['Comic'] 					&& $row['Manga'] >= $row['Romance'] && 						$row['Manga']>= $row['Adventure'])
				{ $rec2= 'manga';
				}
			else if($row['Adventure'] >= $row['Horror'] && $row['Adventure'] >= $row['Cooking'] && $row['Adventure']>= 					$row['History'] && $row['Adventure'] >= $row['Biography'] && $row['Adventure'] >= 					$row['Liturature']&&$row['Adventure'] 					>= 						$row['Mystery']&& $row['Adventure'] >=$row['Poetry'] && 							$row['Adventure'] >= $row['Religion'] && $row['Adventure'] >= 						$row['Comic'] 					&& $row['Adventure'] >= $row['Romance'] && 						$row['Adventure']>= $row['Manga'])
				{ $rec2 = 'adventure';
				}
			
		
}
}
$query7= mysqli_query($link,"Select * from Review where  Review.Type = '$rec1'  Order by Rating DESC limit 2");
while($row1= mysqli_fetch_assoc($query7)) //display all rows from query
		
	{	$query9= mysqli_query($link,"Select * from Books ");
		while($row3= mysqli_fetch_assoc($query9))
			{ if($row1['Book_id']==$row3['Book_id'])
{
				 echo "Book name:  " . $row3["Title"]. "<br>";
		echo "Book Price:  " . $row3["Price"]. "<br>";
		echo "Author:  " . $row3["Author_name"]. "<br>";}
				}
			
				
				
				
}
$query8= mysqli_query($link,"Select * from Review where Review.Type = '$rec2' Order by Rating DESC limit 2");
while($row2= mysqli_fetch_assoc($query8)) //display all rows from query
		
	{	
			
$query10= mysqli_query($link,"Select * from Books ");
		while($row4= mysqli_fetch_assoc($query10))
			{ if($row2['Book_id']==$row4['Book_id'])
{
				 echo "Book name:  " . $row4["Title"]. "<br>";
		echo "Book Price:  " . $row4["Price"]. "<br>";
		echo "Author:  " . $row4["Author_name"]. "<br>";}
				}
 
				
				
}			
		
	
}
?>
