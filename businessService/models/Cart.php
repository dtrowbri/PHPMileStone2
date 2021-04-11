<?php

require_once '../../AutoLoader.php';

class Cart
{
    private $userid;
    private $items = array();
    private $subtotals = array();
    private $total_price;
    private $couponCode;
    private $discountPercentage;
    private $couponError;
    
    public function __construct(?int $userid){
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->total_price = 0;
    }

    public function getUserid()
    {
        return $this->userid;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getSubtotals()
    {
        return $this->subtotals;
    }

    public function getTotal_price()
    {
        return $this->total_price + $this->getDiscountPrice();
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }
    
    public function caculateCartTotal(){
        $subtotalArr = array();
        $service = new ProductService();
        $this->total_price = 0;
        
        foreach($this->items as $itemId => $qty){
            $product = $service->findProductById($itemId);
            $subtotal_price = $product->getPrice() * $qty;
            $subtotalArr = $subtotalArr + array($itemId => $subtotal_price);
            $this->total_price += $subtotal_price;
        }
        
        $this->subtotals = $subtotalArr;
    }
    
    public function addItem( $product_id)
    {
        if(array_key_exists($product_id, $this->items)){
            $this->items[$product_id] += 1;
        }else{
            $this->items = $this->items + array($product_id => 1);
        }
        
        $this->caculateCartTotal();
    }
    
    public function updateQTY(?int $product_id, ?int $newqty){
        if(array_key_exists($product_id, $this->items)){
            $this->items[$product_id] = $newqty;
        }else{
            $this->items = $this->items + array($product_id => $newqty);
        }
        
        if($this->items[$product_id] == 0){
            unset($this->items[$product_id]);
        }
        
        $this->caculateCartTotal();
    }
    
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }

    public function getCouponCode()
    {
        return $this->couponCode;
    }

    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
    }

    public function getCouponError(){
        return $this->couponError;
    }
    
    public function setCouponError(?string $error){
        $this->couponError = $error;
    }

    public function clearCoupon(){
        unset($this->coupon);
        unset($this->couponError);
        unset($this->discountPercentage);
    }

    public function getDiscountPrice(){
        if(isset($this->discountPercentage) && $this->couponError == null){
            return round($this->total_price * (($this->discountPercentage)/100), 2) * -1;
        }
    }
}
?>