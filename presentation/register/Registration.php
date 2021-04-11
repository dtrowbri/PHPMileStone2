<html>
<head>
</head>
<body>
<?php
require_once '../shared/header.php';
require_once '../../_navbar.php';
?>
<div class="container">

    <form action="../handlers/RegistrationHandler.php" method="post">
    	<div class="row">
            <div class="col">
                <label for="firstNameInput">First Name:</label>
                <input type="text" class="form-control" placeholder="First Name" name="firstNameInput">
        	</div>
        	<div class="col">
                <label for="lastNameInput">Last Name:</label>
                <input type="text" class="form-control" placeholder="Last Name" name="lastNameInput">
            </div>
        </div>
       	<div class="row">
            <div class="col">
                <label for="usernameInput">Username:</label>
                <input type="text" class="form-control" placeholder="Username" name="usernameInput">
			</div>
			<div class="col">
                <label for="passwordInput">Password:</label>
                <input type="password" class="form-control" placeholder="Password" name="passwordInput">
            </div>
        </div>
        <div class="form-group">
            <label for="streetInput">Street:</label>
            <input type="text" class="form-control" placeholder="Street" name="streetInput">
        </div>
        <div class="row">
        	<div class="col">
                <label for="cityInput">City:</label>
                <input type="text" class="form-control" placeholder="City" name="cityInput">
      		</div>
            <div class="col">
                <label for="stateInput">State:</label>
                <input type="text" class="form-control" placeholder="State" name="stateInput">
            </div>
            <div class="col">
                <label for="zipInput">Zip Code:</label>
                <input type="text" class="form-control" placeholder="Zip Code" name="zipInput">
        	</div>
        </div>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
</div>
<?php include_once '../../footer.php'; ?>
</body>
</html>