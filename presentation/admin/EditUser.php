<?php

require_once '../shared/header.php';
require_once '../../AutoLoader.php';

$id = $_POST["userId"];
$firstname = $_POST["firstName"];
$lastname = $_POST["lastName"];
$username = $_POST["username"];
$role = $_POST["userRole"];
?>
<html>
<head>
</head>
<body>
<div class="container">
	<form action="UpdateUser.php" method="post">
		<div class="form-group">
    			<label for="idNumber">Id</label>
    			<input type="text" class="form-control" disabled=true value="<?php echo $id; ?>" name="idNumber">
    			<input type="hidden" value="<?php echo $id ?>" name="userid">
		</div>
		<div class="form-group">
    			<label for="firstName">First Name</label>
    			<input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstName">
		</div>
		<div class="form-group">
    			<label for="lastName">Last Name</label>
    			<input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastName">
		</div>
		<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" value="<?php echo $username?>" name="username">
		</div>
		<div class="form-group">
				<label for="role">Role</label>
				<input type="text" class="form-control" value="<?php echo $role?>" name="role">
		</div>
		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>