<?php

require_once '../../AutoLoader.php';
include_once '../shared/AuthenticationCheck.php';

$couponCode = $_POST['couponCode'];

$service = new CouponService();
$result = $service->checkCoupon($couponCode);
echo "result " . $result;

echo "<br> checking onetime use";
$result = $service->test(1, $couponCode);
echo "<br>coupon used status: " . $result;
?>