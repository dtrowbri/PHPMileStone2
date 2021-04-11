<?php

require_once '../shared/header.php';
require_once '../../Autoloader.php';


if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
} else {
    if(isset($_SESSION['userid'])){
        $cart = new Cart($_SESSION['userid']);
    } else {
        echo 'Please login.';
        exit;
    }
}

$productService = new ProductService();


echo '<div class="container">';
echo '<h2>Shopping Cart</h2>';
echo '<table class="table table-bordered"><thead><tr class="table-light"><td>Product</td><td>Quantity</td><td>Price</td><td>Subtotal</td></tr></thead><tbody>';

foreach($cart->getItems() as $id=>$Quantity){
    $product = $productService->findProductById($id);
    echo "<tr>";
    echo '<td><a href="../handlers/ProductDetailHandler.php?productId=' . $product->getId() . '">' . $product->getName() . "</a></td>";
    echo "<td>";
    echo '<form action="UpdateCart.php" method="post">';
    echo '<input type="hidden" name="id" value="' . $id .'">';
    echo '<input type="number" name="quantity" min="0" max="99" value="' . $Quantity . '" onchange="this.form.submit()">';
    echo '</form>';
    echo '</td>';
    echo '<td>' . $product->getPrice() . "</td>";
    echo "<td>" . $Quantity * $product->getPrice() . "</td>";
    echo "</tr>";
}
$couponError = $cart->getCouponError();
echo '<tr class="table-light">';
echo '<td colspan="3" style="text-align: right;">Coupon Code: ';
if(!isset($couponError)){
   echo $cart->getCouponCode();
}
echo '</td>';
echo '<td>';


if(isset($couponError) && $couponError != null){
    echo '$0.00';
}elseif($cart->getDiscountPrice() == null){
    echo '$0.00';
}else{
    echo '$' . $cart->getDiscountPrice();
}

echo '</td>';
echo '</tr>';

echo '<tr class="table-light"><td colspan="3" style="text-align: right;">Total:</td><td>$' . $cart->getTotal_price() . "</td></tr>";
echo "</tbody></table>";

echo '<form action="CouponHandler.php" method="post"><div class="row"><div class="form-group"><label style="margin-right: 5px">Coupon Code:</label>';
echo '<input type="text" name="couponCode" style="margin-right: 5px"><input type="submit" value="Add Coupon"></div></form>';

if(isset($couponError)){
    echo "<br>";
    echo '<label style="color: red">' . $couponError . '</label>';
}

echo '<div>';
echo '<div style="display: inline-block;"><form action="../handlers/ProductSearchHandler.php"><input type="submit" value="Keep Shopping"></form></div>';
echo '<div style="display: inline-block;"><form action="CreditCardSelector.php"><input type="submit" value="Proceed to Checkout"></form></div>';
echo '</div>';
echo "</div>";
echo "</div>";

include_once '../../footer.php';
?>