<head>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<style>
#orders {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#orders td, #orders th {
  border: 1px solid #ddd;
  padding: 8px;
}

#orders tr:nth-child(even){background-color: #f2f2f2;}

#orders tr:hover {background-color: #ddd;}

#orders th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
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
    
    echo '<table id="orders" class="display"><thead><tr><th>OrderId</th><th>User Name</th><th>Quantity</th><th>Date</th><th>Address</th><th>Credit Card</th></tr></thead><tbody>';
    foreach($orders as $order=>$quantity){
        $order = $ordersService->getOrderById($order);
        echo "<tr>";
        echo "<td>" . $order->getId() . "</td>";
        echo "<td>" . $userService->getUserById($order->getUsers_id()) . "</td>";
        echo "<td>" . $quantity . "</td>";
        echo "<td>" . $order->getDate() . "</td>";
        echo "<td>" . $addressService->getAddressById($order->getAddress_id()) . "</td>";
        echo "<td>****-****-****-" . substr($creditCardService->getCreditCardById($order->getCredit_card_id()),15,19) . "</td>";
        echo "</tr>"; 
    }
    
    echo "</tbody></table>";
}

echo "</div>";
?>

<script>
$(document).ready( function () {
    $('#orders').DataTable({
		"order" : [[2, "desc"]]
    });
} );
</script>