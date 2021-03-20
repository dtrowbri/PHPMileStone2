<?php

require_once '../shared/header.php';
require_once '../../AutoLoader.php';
require_once '../../_navbar.php';


$searchString = $_POST["searchStringInput"];

$service = new ProductService();
$results = $service->getProductsBySearch($searchString);

?>
<h2>Product Admin</h2>
<?php
if($results){
    include("../admin/_adminProductResults.php");
} else {
    echo "No search results found.";
}
?>