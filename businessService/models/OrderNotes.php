<?php

class OrderNotes
{
    private $id;
    private $notes;
    private $date;
    private $orders_id;
    private $users_id;
    
    public function __construct(?string $notes, $date, ?int $orderid, ?int $userid){
        $this->notes = $notes;
        $this->date = $date;
        $this->orders_id = $orderid;
        $this->users_id = $userid;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getOrders_id()
    {
        return $this->orders_id;
    }

    public function getUsers_id()
    {
        return $this->users_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setOrders_id($orders_id)
    {
        $this->orders_id = $orders_id;
    }

    public function setUsers_id($users_id)
    {
        $this->users_id = $users_id;
    }
    
}

?>