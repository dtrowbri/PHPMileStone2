<?php

require_once '../shared/header.php';

$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];

$ordersService = new OrdersService();
$orders = $ordersService->getOrderbyDateSortedByQuantity($startdate, $enddate);


include_once "OrderReport.php";

echo '<div class="container">';

if(!isset($orders) || $orders == null || count($orders) == 0){
    echo 'No results found.';
} else {
    $addressService = new AddressService();
    $userService = new UserService();
    $creditCardService = new CreditCardService();
    
    echo "<table><thead><tr><th>OrderId</th><th>User ID</th><th>Quantity</th><th>Date</th><th>Address</th><th>Credit Card</th></tr></thead><tbody>";
    foreach($orders as $order=>$quantity){
        $order = $ordersService->getOrderById($order);
        echo "<tr>";
        echo "<td>" . $order->getId() . "</td>";
        echo "<td>" . $userService->getUserById($order->getUsers_id()) . "</td>";
        echo "<td>" . $quantity . "</td>";
        echo "<td>" . $order->getDate() . "</td>";
        echo "<td>" . $addressService->getAddressById($order->getAddress_id()) . "</td>";
        echo "<td>" . $creditCardService->getCreditCardById($order->getCredit_card_id()) . "</td>";
        echo "</tr>"; 
    }
    
    echo "</tbody></table>";
}

echo "</div>";
?>