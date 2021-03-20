<?php
require_once '../../Autoloader.php';

$service= new ProductService();
$results = $service->getAllProducts();

$cart = new Cart(1);
$cart->addItem(2);
$cart->addItem(3);
$cart->addItem(3);
$cart->addItem(4);
$cart->addItem(6);
$cart->addItem(6);
$cart->addItem(6);

$cartitems = $cart->getItems();
echo print_r($cartitems) . "<br>";

$cart->updateQTY(2, 13);
echo print_r($cart->getItems()) . "<br>";

$cart->updateQTY(4, 0);
echo print_r($cart->getItems()) . "<br>";

$product = $service->findProductById(645);


$cart->caculateCartTotat();

echo print_r($cart->getSubtotals()) . "<br>";
echo $cart->getTotal_price() . "<br>";
?>