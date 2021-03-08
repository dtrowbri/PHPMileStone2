<?php

$id = $_POST["productId"];
$name = $_POST["productName"];
$description = $_POST["productDescription"];
$price = $_POST["productPrice"];
$image = $_POST["productImage"];

echo '<img src="' . $image .'" width="150px" heigth="150px"><br>';
echo '<label>Id: ' . $id . '</label><br>';
echo '<label>Name: ' . $name . '</label><br>';
echo '<label>Description: ' . $description . '</label><br>';
echo '<label>Price: ' . $price . '</label><br>';
?>