<?php

require_once '../../AutoLoader.php';
include_once '../shared/AuthenticationCheck.php';

$userid = $_SESSION["userid"];
$couponCode = $_POST['couponCode'];
$cart = $_SESSION['cart'];

$cart->clearCoupon();

$service = new CouponService();
$result = $service->checkCoupon($couponCode, $userid);

$cart->setCouponCode($couponCode);

if(!($result > 0)){
    $cart->setCouponError($result);
} else {
    $cart->setDiscountPercentage($result);
}

$_SESSION['cart'] = $cart;

header("Location: ShowCart.php");
?>