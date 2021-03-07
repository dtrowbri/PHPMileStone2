<?php

require_once "../../database/database.php";

class RegistrationDAO {
    
    public function doesUserExist(?string $username){
        $database = new database();
        $conn = $database->getConnection();
        
        $userCheckQuery = "select id from users where username like ?";
        $stmt = $conn->prepare($userCheckQuery);
        $stmt->bind_param('s', $username);
        
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }
    
    
    public function AddUser(?string $firstname, ?string $lastname, ?string $username, ?string $password, ?string $street, ?string $city, ?string $state, ?string $zip){
        $database = new database();
        $conn = $database->getConnection();
        
        $insertUserQuery = "INSERT INTO `users`(`ID`, `ROLE`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`) VALUES (null,1,?,?,?,?)";
        
        $stmt = $conn->prepare($insertUserQuery);
        $stmt->bind_param('ssss', $firstname, $lastname, $username, $password);
        
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $id = $stmt->insert_id;
            
            $insertAddress = "INSERT INTO `addresses`(`ID`, `ADDRESSTYPE`, `ISDEFAULT`, `USERS_ID`, `STREET`, `CITY`, `STATE`, `POSTALCODE`) VALUES (null,1,1,?,?,?,?,?)";
            $stmt = $conn->prepare($insertAddress);
            $stmt->bind_param('issss', $id, $street, $city, $state, $zip);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                return 2;
            } else {
                return 1;
            }
            
        } else {
            return 0;
        }
    }
    
}

?>