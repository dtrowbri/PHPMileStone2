<?php

class OrderDetailsDAO {
    public function insertOrderDetails(?OrderDetials $details, $conn){      
        $query = "INSERT INTO orderdetails(ID, ORDERS_ID, PRODUCTS_ID, QUANTITY, CURRENTPRICE, CURRENTDESCRIPTION) VALUES (null,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiids', $details->getOrders_id(), $details->getProducts_id(), $details->getQuantity(), $details->getCurrentPrice(), $details->getCurrentDescription());
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            return true;
        } else {
            return false;
        }
    }
}

?>