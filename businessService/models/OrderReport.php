<?php

class OrderReport{
    
    public $orderid;
    public $users_name;
    public $quantity;
    public $date;
    public $address;
    public $creditcard;
    
    public function __construct(?int $orderid, ?string $users_name, ?int $quantity, $date, ?string $address, ?string $creditcard){
        $this->orderid = $orderid;
        $this->users_name = $users_name;
        $this->quantity = $quantity;
        $this->date = $date;
        $this->address = $address;
        $this->creditcard = $creditcard;
    }
    /**
     * @return int
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * @return int
     */
    public function getUsers_Name()
    {
        return $this->users_name;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCreditcard()
    {
        return $this->creditcard;
    }

    /**
     * @param int $orderid
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
    }

    /**
     * @param int $userid
     */
    public function setUsers_Name($users_name)
    {
        $this->users_name = $users_name;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param string $creditcard
     */
    public function setCreditcard($creditcard)
    {
        $this->creditcard = $creditcard;
    }

    
    
}
?>