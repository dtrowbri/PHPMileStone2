<?php

require_once '../shared/header.php';
require_once '../../Autoloader.php';
include_once '../shared/AuthenticationCheck.php';

if(!isset($_SESSION['cart']) || $_SESSION['cart']->getTotal_price() <=0 || !isset($_SESSION['userid'])){
    header("Location: ShowCart.php");
}

$userid = $_SESSION['userid'];

$creditCardService = new CreditCardService();
$creditCards = $creditCardService->getCreditCardsByUserId($userid);

echo '<div class="container">';
echo '<form action="CheckOutPage.php" method="post">';
echo '<table class="table"><thead><tr><th>Select</th><th>Name on Card</th><th>Credit Card Number</th><th>Expiration Date</th></tr></thead>';
echo "<tbody>";

    foreach($creditCards as $creditCard){
        echo "<tr>";
        echo '<td><input type="radio" name="creditCard" value = "' . $creditCard->getid() . '"></td>'; 
        echo "<td>" . $creditCard->getName_On_Card() . "</td>";
        echo "<td>" . $creditCard->getCredit_Card_Number() . "</td>";
        echo "<td>" . $creditCard->getExpiration_Date(). "</td>";
        echo "</tr>";
    }
echo "</tbody></table>";
echo '<input type="submit" value="Use This Card">';
echo "</form>";
echo '<form action="CreditCardEntryForm.php" method="get"><input type="submit" value="Add Card"></form>';
echo "</div>";

?>