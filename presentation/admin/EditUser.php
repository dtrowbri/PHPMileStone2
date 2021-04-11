<?php

require_once '../shared/header.php';
require_once '../../AutoLoader.php';
require_once '../../_navbar.php';

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
				<select class="form-control" name="role">
					<option <?php if($role == 1){echo "selected='selected'";}?>>1</option>
					<option <?php if($role == 2){echo "selected='selected'";}?>>2</option>
					<option <?php if($role == 3){echo "selected='selected'";}?>>3</option>
					<option <?php if($role == 4){echo "selected='selected'";}?>>4</option>
				</select>
		</div>
		<input type="submit" value="Submit">
	</form>
</div>
<?php include_once '../../footer.php'; ?>
</body>
</html>