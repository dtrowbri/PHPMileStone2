<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";


$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$image = $_POST["image"];

$product = new Product($id, $name, $description, $price, $image);

$service = new ProductService();
$service->updateProduct($product);

?>