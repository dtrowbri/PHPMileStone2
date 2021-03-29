<?php

class Order
{
    private $id;
    private $date;
    private $users_id;
    private $address_id;
    private $credit_card_id;
    
    public function __construct(?int $userid, ?int $addressid, ?int $credit_card_id){
        $this->users_id = $userid;
        $this->address_id = $addressid;
        $this->credit_card_id = $credit_card_id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUsers_id()
    {
        return $this->users_id;
    }

    public function getAddress_id()
    {
        return $this->address_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setUsers_id($users_id)
    {
        $this->users_id = $users_id;
    }

    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;
    }

    public function getCredit_card_id()
    {
        return $this->credit_card_id;
    }

    public function setCredit_card_id($credit_card_id)
    {
        $this->credit_card_id = $credit_card_id;
    }


    
    
}

?>