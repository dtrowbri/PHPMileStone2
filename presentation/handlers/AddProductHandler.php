<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";

$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];

if($name == null || $description == null || $price == null){
    echo "One of the fields has been left empty. Please fill out all fields.<br>";
}else {
    $product = new Product(null, $name, $description, $price, null);
    
    $service = new ProductService();
    $service->addProduct($product);
}
?>