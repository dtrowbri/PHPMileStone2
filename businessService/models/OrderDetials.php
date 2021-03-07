<?php

class OrderDetials
{
    private $id;
    private $orders_id;
    private $products_id;
    private $quantity;
    private $currentPrice;
    private $currentDescription;
    
    public function __construct(?int $productid, ?int $quantity, ?float $price, ?string $description){
        $this->products_id = $productid;
        $this->quantity = $quantity;
        $this->currentPrice = $price;
        $this->currentDescription = $description;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getOrders_id()
    {
        return $this->orders_id;
    }

    public function getProducts_id()
    {
        return $this->products_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    public function getCurrentDescription()
    {
        return $this->currentDescription;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setOrders_id($orders_id)
    {
        $this->orders_id = $orders_id;
    }

    public function setProducts_id($products_id)
    {
        $this->products_id = $products_id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    public function setCurrentDescription($currentDescription)
    {
        $this->currentDescription = $currentDescription;
    }

}

?>