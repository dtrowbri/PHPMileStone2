<?php
require_once '../shared/header.php';
include_once '../shared/AuthenticationCheck.php';

if(!isset($_SESSION['cart']) || $_SESSION['cart']->getTotal_price() <=0 || !isset($_SESSION['userid'])){
    header("Location: ShowCart.php");
}

?>

<div class="container">
	<form>
		<div class="row">
			<div class="col">
				<label for="name">Name on Card</label>
				<input type="text" class="form-control" placeholder="Name on Card" name="name">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="cardNumber">Credit Card Number</label>
				<input type="text" class="form-control" placeholder="Credit Card Number" name="cardNumber">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="expDate">Expiration Date</label>
				<input type="text" class="form-control" placeholder="Expiration Date" name="expDate">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="ccv">CCV</label>
				<input type="text" class="form-control" placeholder="CCV" name="ccv">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="zipCode">Zip Code</label>
				<input type="text" class="form-control" placeholder="Zip Code" name="zipCode">
			</div>
		</div>
		<input type="submit" value="submit" class="btn btn-primary">
	</form>
</div>