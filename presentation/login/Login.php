<html>
<head>
</head>
<body>
<?php
require_once '../shared/header.php';
?>

	<form action="../handlers/LoginHandler.php" method="post">
		<label>Username:</label>
		<input type="text" name="usernameInput">
		<br>
		<label>Password:</label>
		<input type="password" name="passwordInput">
		<br>
		<input type="submit" value="Login"/>
	</form>
</body>
</html>