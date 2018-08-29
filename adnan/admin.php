<?php
	$title = "Administration section";
	require_once "./template/header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<hr>
	</div>
	<form class="form-horizontal" method="post" action="admin_verify.php">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Email</label>
			<div class="col-md-4">
				<input type="text" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-md-4">Password</label>
			<div class="col-md-4">
				<input type="password" name="password" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>
	<hr>
        <footer class="page-footer font-small blue">
          <div class="footer-copyright text-center py-3"> © 2018 Copyright: bookworms.com
          </div>
        </footer>
    </div>
    <script type="text/javascript" src="./bootstrap/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>>