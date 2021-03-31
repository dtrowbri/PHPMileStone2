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
    
    public function getOrderbyDateSortedByQuantity($date1, $date2, $conn){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "SELECT ORDERS.ID, DATE, USERS_ID, ADDRESSES_ID, CREDIT_CARD_ID, SUM(ORDERDETAILS.QUANTITY) AS 'QUANTITY' 
                    FROM ORDERS INNER JOIN ORDERDETAILS ON ORDERDETAILS.ORDERS_ID = ORDERS.ID WHERE ORDERS.DATE BETWEEN ? AND ? 
                    GROUP BY ORDERS.ID ORDER BY SUM(ORDERDETAILS.QUANTITY) DESC";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $date1, $date2);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            
        } 
    }
}

?>