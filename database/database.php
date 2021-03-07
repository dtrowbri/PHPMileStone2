<?php

class database {
    private $server = "localhost";
    private $user = "root";
    private $password = "root";
    private $database = "ecommercesite";
    private $port = "3307";
    
    public function getConnection(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        
        if($conn->connect_error){
            echo "Connection failed " . $conn->connect_error;
        } else {
            return $conn;
        }
    }
}
?>