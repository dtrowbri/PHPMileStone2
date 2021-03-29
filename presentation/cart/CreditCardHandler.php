<?php

require_once '../shared/header.php';
require_once '../../AutoLoader.php';

$nameOnCard = $_POST["name"];
$creditCardNumber = $_POST["cardNumber"];
$expDate = $_POST["expDate"];
$ccv = $_POST["ccv"];
$userid = $_SESSION["userid"];

if($nameOnCard == null || $creditCardNumber == null || $expDate == null || $ccv == null || $userid == null){
    echo "One of the fields is incorrect<br>";
}

$creditcard = new CreditCard($nameOnCard, $creditCardNumber, $expDate, $ccv, $userid);
$creditCardService = new CreditCardService();
$results = $creditCardService->addCreditCard($creditcard);

if($results > 0){
    //$_SESSION['creditcard'] = $results;
    include("CreditCardSelector.php");
} else {
    echo '<div class="container"><h3>There was an error processing your card</h3></div>';
    include("CreditCardEntryForm.php");
}
?>