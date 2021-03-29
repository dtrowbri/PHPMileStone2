<?php

require_once '../../Autoloader.php';

class OrderDAO {
    
    public function insertOrder(?Order $order, $conn){
        $query = "INSERT INTO orders(ID, DATE, USERS_ID, ADDRESSES_ID, CREDIT_CARD_ID) VALUES (null,now(),?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iii', $order->getUsers_id(), $order->getAddress_id(), $order->getCredit_card_id());
        $stmt->execute();
        
        if($stmt->affected_rows == 1 ){
            return $stmt->insert_id;
        } else {
            return 0;
        }
    }
}

?>