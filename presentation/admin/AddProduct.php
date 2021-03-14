<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
?>
<h2 class>Add Product</h2>
<div class="container">
	<form action="../handlers/AddProductHandler.php" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control" placeholder="Name of the Product">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<input type="text" name="description" class="form-control" placeholder="Description of the Product">
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			<input type="text" name="price" class="form-control" placeholder="Price {##.##}">
		</div>
		<input type="Submit" value="Add Product" class="btn btn-primary">
	</form>
</div>