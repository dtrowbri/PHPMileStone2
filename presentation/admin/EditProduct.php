<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
require_once '../../_navbar.php';

$id = $_POST["productId"];
$name = $_POST["productName"];
$description = $_POST["productDescription"];
$price = $_POST["productPrice"];
$image = $_POST["productImage"];


?>
<div class="container">
    <form action="../handlers/EditProductHandler.php" method="post">
    	<div class="form-group">
    		<img src="<?php echo $image?>" width="150px" height="150px">
    		<input type="hidden" name="image" value="<?php $image?>">
    	</div>
    	<div class="form-group">
    		<label for="id">Id</label>
    		<input type="text" class="form-control" disabled=true name="id" value="<?php echo $id?>">
    		<input type="hidden" for="id" name="id" value="<?php echo $id?>">
    	</div>
    	<div class="form-group">
    		<label for="name">Product Name</label>
    		<input type="text" class="form-control" name="name" value="<?php echo $name?>">
    	</div>
    	<div class="form-group">
    		<label for="description">Description</label>
    		<input type="text" class="form-control" name="description" value="<?php echo $description?>">
    	</div>
    	<div class="form-group">
    		<label for="price">Price</label>
    		<input type="text" class="form-control" name="price" value="<?php echo $price?>">
    	</div>
    	<input type="submit" value="submit" class="btn btn-primary">
    </form>
</div>
<?php include_once '../../footer.php'; ?>