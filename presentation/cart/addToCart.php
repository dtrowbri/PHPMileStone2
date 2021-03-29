<?php 
require_once '../shared/header.php';
require_once '../../Autoloader.php';
include_once '../shared/AuthenticationCheck.php';

$id = $_POST['id'];
$cart = null;

if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
} else {
    if(isset($_SESSION['userid'])){
        $cart = new Cart($_SESSION['userid']);
    } else {
        echo "Please login first<br>";
        exit;
    }
}


$cart->addItem($id);
$_SESSION['cart'] = $cart;


header("Location: ShowCart.php");
?>