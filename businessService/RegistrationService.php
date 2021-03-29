<?php

//require_once '../../database/RegistrationDAO.php';
require_once '../../AutoLoader.php';

class RegistrationService {
    
    
    public $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function doesUserExist(?User $user){
        $conn = $this->database->getConnection();
        $dao = new RegistrationDAO();
        $results = $dao->doesUserExist($user, $conn);
        $conn->close();
        return $results;
    }
    
    public function AddUser(?User $user, ?Address $address){
        $conn = $this->database->getConnection();
        $dao = new RegistrationDAO();
        $results = $dao->AddUser($user, $address, $conn);
        $conn->close();
        return $results;
    }
}
?>