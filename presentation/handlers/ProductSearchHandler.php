
<?php

require_once '../shared/header.php';
require_once '../../AutoLoader.php';
//require_once '../../businessService/ProductService.php';


$searchString = $_POST["searchStringInput"];

$service = new ProductService();
$results = $service->getProductsBySearch($searchString);

?>

<form action="/ecommerce/presentation/handlers/ProductSearchHandler.php" method="post">
	<input type="text" name="searchStringInput">
	<input type="submit" value="search">
</form>
<h2>Search Results</h2>
<?php
if($results){
    include("_displaySearchResults.php");
} else {
    echo "No search results found.";
}
?>