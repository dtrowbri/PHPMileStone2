<html>
<head>
</head>
<body>
<?php
require_once '../shared/header.php';
require_once '../../_navbar.php';
?>
<div class="container">
	<form action="../handlers/LoginHandler.php" method="post">
		<div class="form-group">
    		<label for="usernameInput">Username:</label>
    		<input type="text" class="form-control" placeholder="Username" name="usernameInput">
		</div>
		<div class="form-group">
    		<label for="passwordInput">Password:</label>
    		<input type="password" class="form-control" placeholder="Password" name="passwordInput">
		</div>
		<input type="submit" value="Login" class="btn btn-primary"/>
	</form>
</div>
</body>
</html>