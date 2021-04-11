<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
require_once '../../_navbar.php';

$id = $_POST["id"];
$productName = $_POST["productName"];

$service = new ProductService();
$service->deleteProduct($id, $productName);

include_once '../../footer.php';
?>