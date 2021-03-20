<?php 
require_once '../shared/header.php';
require_once '../../Autoloader.php';
require_once '../../_navbar.php';
session_start();

$id = $_POST['id'];
$cart = null;

if(isset($_SESSION['cart'])){
    echo 'setting cart';
    $cart = $_SESSION['cart'];
    echo $cart == null;
    echo  $cart->getUserid();
} else {
    if(isset($_SESSION['userid'])){
        $cart = new Cart($_SESSION['userid']);
    } else {
        echo 'login';
        echo "Please login first<br>";
        exit;
    }
}

echo $cart->getUserid();
echo isset($cart);

$cart->addItem($id);

$_SESSION['cart'] = $cart;

print_r($_SESSION['cart']->getItems());
//print_r($cart->getItems());

//header("Location: showCart.php");
?>