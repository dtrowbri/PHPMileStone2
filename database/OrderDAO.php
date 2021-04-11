<?php

require_once '../../Autoloader.php';

class OrderDAO {
    
    public function insertOrder(?Order $order, $conn){
        $query = "INSERT INTO orders(ID, DATE, USERS_ID, ADDRESSES_ID, CREDIT_CARD_ID, COUPON_ID) VALUES (null,now(),?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiii', $order->getUsers_id(), $order->getAddress_id(), $order->getCredit_card_id(), $order->getCouponId());
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

    public function getOrderQuantityReport($date1, $date2, $conn){
       
        $query = "select 
                    	o.id as 'OrderId', 
                        concat(u.FIRSTNAME, ' ', u.LASTNAME) as 'UserName', 
                        sum(od.QUANTITY) as 'Quantity', 
                        o.date as 'Date',
                        concat(a.street, ' ', a.city, ' ', a.state, ' ', a.postalcode) as 'Address', 
                        cc.CREDIT_CARD_NUMBER as 'CreditCardNumber'
                      from orders o
                    join users u on u.id = o.USERS_ID
                    join orderdetails od on od.ORDERS_ID = o.id
                    join addresses a on a.id = o.addresses_id
                    join creditcards cc on cc.id = o.CREDIT_CARD_ID
                    where date between ? and ?
                    group by o.id
                    order by sum(od.QUANTITY)desc";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $date1, $date2);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $results = $results->fetch_all();
            $orderReports = array();
            
            
            foreach($results as $order){
                $orderReport = new OrderReport($order[0], $order[1], $order[2], $order[3], $order[4], $order[5]);
                array_push($orderReports, $orderReport);
            }
            return $orderReports;
        } else {
            return null;
        }
    }
}

?>