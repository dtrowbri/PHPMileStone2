<?php
require_once '../shared/header.php';
require_once '../../_navbar.php';

$id = $_GET["productId"];

$service = new ProductService();
$product = $service->findProductById($id);

echo '<div class="container">';
echo '<form action="../cart/addToCart.php" method="post">';
echo '<img src="' . $product->getImage() .'" width="150px" heigth="150px"><br>';
echo '<label>Id: ' . $product->getId() . '</label><br>';
echo '<input type="hidden" name="id" value="' . $product->getId() . '">';
echo '<label>Name: ' . $product->getName() . '</label><br>';
echo '<label>Description: ' . $product->getDescription() . '</label><br>';
echo '<label>Price: ' . $product->getPrice() . '</label><br>';
echo '<input type="submit" value="Add to Cart">';
echo '</form>';
echo '</div>';

include_once '../../footer.php';
?>