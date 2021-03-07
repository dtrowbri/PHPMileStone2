<?php

class Order
{
    private $id;
    private $date;
    private $users_id;
    private $address_id;
    
    private function __construct($date, ?int $userid, ?int $addressid){
        $this->date = $date;
        $this->users_id = $userid;
        $this->address_id = $addressid;
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

    
    
}

?>