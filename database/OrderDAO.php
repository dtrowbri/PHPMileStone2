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
        $query = "SELECT ORDERS.ID, SUM(ORDERDETAILS.QUANTITY) AS 'QUANTITY' 
                    FROM ORDERS INNER JOIN ORDERDETAILS ON ORDERDETAILS.ORDERS_ID = ORDERS.ID WHERE ORDERS.DATE BETWEEN ? AND ? 
                    GROUP BY ORDERS.ID ORDER BY SUM(ORDERDETAILS.QUANTITY) DESC";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $date1, $date2);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $results = $results->fetch_all();
            $ordersArr = array();
            
            foreach($results as $result){
                $ordersId = $result[0];
                $quantity = $result[1];
                $ordersArr = $ordersArr + array($ordersId=>$quantity);
            }

            return $ordersArr;
        } 
    }

    public function getOrderById(?int $id, $conn){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "SELECT ID, DATE, USERS_ID, ADDRESSES_ID, CREDIT_CARD_ID FROM ORDERS WHERE ID = ?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $order = new Order($result["USERS_ID"], $result["ADDRESSES_ID"], $result["CREDIT_CARD_ID"]);
            $order->setId($result["ID"]);
            $order->setDate($result["DATE"]);
            return $order;
        } else {
            return null;
        }
    }
}

?>