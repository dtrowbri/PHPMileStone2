<?php

require_once '../shared/header.php';
require_once '../../Autoloader.php';
include_once '../shared/AuthenticationCheck.php';


if(!isset($_SESSION['cart']) || $_SESSION['cart']->getTotal_price() <=0 || !isset($_SESSION['userid'])){
    header("Location: ShowCart.php");
}

$userid = $_SESSION['userid'];
$creditcard = $_POST['creditCard'];
$cart = $_SESSION['cart'];
$cartItems = $cart->getItems();

$couponId = null;

if($cart->getCouponCode() != null){
    $couponService = new CouponService();
    $couponId = $couponService->getCouponId($cart->getCouponCode());
}

$orderService = new OrdersService();
$results = $orderService->addOrder($userid, $cartItems, $creditcard, $couponId);

echo '<div class="container">';
if($results > 0){
    unset($_SESSION['cart']);
    echo "Your order id is " . $results . "<br>";
}else {
    echo $results;
}
echo '</div>';
?>