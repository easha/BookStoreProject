<?php
	$book_id = $_GET['Book_id'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM books WHERE Book_id = '$book_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_book.php");
?>