<?php
require_once "../../AutoLoader.php";
require_once '../shared/header.php';
include_once '../shared/AuthenticationCheck.php';

if(isset($_GET["startdate"])){
    $date1 = $_GET["startdate"];
}else{
    $date1 = "1970-01-01";
}
if(isset($_GET["enddate"])){
    $date2 = $_GET["enddate"];
}else{
    $date2 = date("Y-m-d");
}

$service = new OrdersService();
$orders = $service->getOrderQuantityReport($date1, $date2);

$serializedOrders = json_encode($orders);

echo $serializedOrders;

?>