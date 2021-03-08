<html>
<head>
</head>
<body>
<?php
require_once '../shared/header.php';
?>

<form action="../handlers/RegistrationHandler.php" method="post">
<label>First Name:</label>
<input type="text" name="firstNameInput">
<br>
<label>Last Name:</label>
<input type="text" name="lastNameInput">
<br>
<label>Username:</label>
<input type="text" name="usernameInput">
<br>
<label>Password:</label>
<input type="password" name="passwordInput">
<br>
<label>Street:</label>
<input type="text" name="streetInput">
<br>
<label>City:</label>
<input type="text" name="cityInput">
<br>
<label>State:</label>
<input type="text" name="stateInput">
<br>
<label>Zip Code:</label>
<input type="text" name="zipInput">
<br>
<input type="submit" value="Register">
</form>
</body>
</html>