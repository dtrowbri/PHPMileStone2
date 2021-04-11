<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
include_once '../shared/AuthenticationCheck.php';
?>

<div class="container">
<h2>Add Product</h2>
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
<?php include_once '../../footer.php'; ?>