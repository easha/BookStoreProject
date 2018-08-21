<!DOCTYPE html>
<html>
<body>
	<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="admin_add.php">Add new book</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Book Id</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Title</th>
			<th>Image</th>
			<th>Category</th>
			<th>Publication Year</th>
			<th>Price</th>
			<th>Condition</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['Book_id']; ?></td>
			<td><?php echo getAutName($conn, $row['Author_id']); ?></td>
			<td><?php echo getPubName($conn, $row['Publisher_id']); ?></td>
			<td><?php echo $row['Title']; ?></td>
			<td><?php echo $row['book_image']; ?></td>
			<td><?php echo $row['Catagory']; ?></td>
			<td><?php echo $row['Publication_Year']; ?></td>
			<td><?php echo $row['Price']; ?></td>
			<td><?php echo $row['Condition']; ?></td>
			<td><?php echo $row['Quantity']; ?></td>
			<td><?php echo $row['About']; ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<?php
  		require "./template/adminFooter.php";
	?>
</body>
</html>