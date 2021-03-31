<?php

class AddressService {
    
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function getAddressById(?int $id){
        $conn = $this->database->getConnection();
        $addressDAO = new AddressDAO();
        $address = $addressDAO->getAddressById($id, $conn);
        $conn->close();
        return $address;
    }
}

?>