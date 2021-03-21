<?php
require_once '../shared/header.php';
require_once '../../Autoloader.php';

$quantity = $_POST["quantity"];
$id = $_POST["id"];

$cart = $_SESSION['cart'];
$cart->updateQTY($id, $quantity);

header("Location: ShowCart.php");
?>