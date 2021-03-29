<?php

//require_once "../../database/database.php";
require_once '../../AutoLoader.php';

class RegistrationDAO {
   
    
    public function doesUserExist(?User $user, $conn){
        //$database = new database();
        //$conn = $database->getConnection();
        
        $userCheckQuery = "select id from users where username like ?";
        $stmt = $conn->prepare($userCheckQuery);
        $stmt->bind_param('s', $user->getUsername());
        
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }
    
    
    public function AddUser(?User $user, ?Address $address, $conn){
        //$database = new database();
        //$conn = $database->getConnection();
        
        $insertUserQuery = "INSERT INTO `users`(`ID`, `ROLE`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`) VALUES (null,?,?,?,?,?)";
        
        $stmt = $conn->prepare($insertUserQuery);
        $stmt->bind_param('issss', $user->getRole(), $user->getFirstname(), $user->getLastname(), $user->getUsername(), $user->getPassword());
        
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $id = $stmt->insert_id;
            
            $insertAddress = "INSERT INTO `addresses`(`ID`, `ADDRESSTYPE`, `ISDEFAULT`, `USERS_ID`, `STREET`, `CITY`, `STATE`, `POSTALCODE`) VALUES (null,1,1,?,?,?,?,?)";
            $stmt = $conn->prepare($insertAddress);
            $stmt->bind_param('issss', $id, $address->getStreet(), $address->getCity(), $address->getState(), $address->getZip());
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