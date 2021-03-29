<?php

//require_once '../../database/SecurityDAO.php';
require_once '../../AutoLoader.php';

class SecurityService {
    
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    
    public function Authenticate(?string $username, ?string $password){
        $conn = $this->database->getConnection();
        $dao = new SecurityDAO();
        $results = $dao->Authenticate($username, $password, $conn);
        $conn->close();
        return $results;
    }
}

?>