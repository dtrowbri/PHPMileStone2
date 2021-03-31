<?php

class AddressDAO {
    
    public function getAddressIdByUserId(?int $userid, $conn){
        $query = "SELECT ID FROM ADDRESSES WHERE USERS_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows == 1){
            $results = $results->fetch_assoc();
            return $results["ID"];
        } else {
            return -1;
        }
    }
    
    public function getAddressById(?int $id, $conn){
        $query ="SELECT CONCAT(STREET, ' ', CITY, ' ', STATE, ' ', POSTALCODE) AS 'ADDRESS' FROM ADDRESSES WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $address = $result["ADDRESS"];
            return $address;
        } else {
            return null;
        }
    }
    
}

?>