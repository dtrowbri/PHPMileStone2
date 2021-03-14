<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";

$id = $_POST["id"];
$productName = $_POST["productName"];

$service = new ProductService();
$service->deleteProduct($id, $productName);

?>