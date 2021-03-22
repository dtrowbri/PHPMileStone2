<?php

require_once '../../AutoLoader.php';

class Cart
{
    private $userid;
    private $items = array();
    private $subtotals = array();
    private $total_price;
    
    public function __construct(?int $userid){
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->total_price = 0;
    }
    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return multitype:
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return multitype:
     */
    public function getSubtotals()
    {
        return $this->subtotals;
    }

    /**
     * @return number
     */
    public function getTotal_price()
    {
        return $this->total_price;
    }

    /**
     * @param int $userid
     */
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
    
    /**
     * @param multitype: $items
     */
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
    
    /**
     * @param multitype: $subtotals
     */
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    /**
     * @param number $total_price
     */
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }

    
    
}
?>