<?php
require_once "../../AutoLoader.php";
require_once '../shared/header.php';
include_once '../shared/AuthenticationCheck.php';

$service = new OrdersService();
$orders = $service->getOrderQuantityReport("2021-03-01", "2021-03-31");
//print_r($orders);
//echo gettype($orders);
$serializedOrders = json_encode($orders);

echo $serializedOrders;

?>