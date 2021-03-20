<?php
require_once '../shared/header.php';
require_once '../../_navbar.php';

$id = $_POST["productId"];
$name = $_POST["productName"];
$description = $_POST["productDescription"];
$price = $_POST["productPrice"];
$image = $_POST["productImage"];

echo '<form action="../cart/addToCart.php" method="post">';
echo '<img src="' . $image .'" width="150px" heigth="150px"><br>';
echo '<label>Id: ' . $id . '</label><br>';
echo '<input type="hidden" name="id" value="' . $id . '">';
echo '<label>Name: ' . $name . '</label><br>';
echo '<label>Description: ' . $description . '</label><br>';
echo '<label>Price: ' . $price . '</label><br>';
echo '<input type="submit" value="Add to Cart">';
echo '</form>';
?>