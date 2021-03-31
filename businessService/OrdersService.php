<?php

class OrdersService {
 
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function addOrder(?int $userid, $cartItems, ?int $creditcardid){
        $conn = $this->database->getConnection();
        
        $addressDAO = new AddressDAO();
        $addressId = $addressDAO->getAddressIdByUserId($userid, $conn);
        
        if($addressId < 1){
            return "There was an issue finding an address for this order.<br>";
        }

        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        $order = new Order($userid, $addressId, $creditcardid);

        $ordersDAO = new OrderDAO();
        $orderid = $ordersDAO->insertOrder($order, $conn);
        
        if($orderid == false || $orderid == null || !isset($orderid)){
            $conn->rollback();
            return "There was an error creating the order.<br>Please try again.<br>";
        }
        
        $productDAO = new ProductDAO();
        $orderDetailsDAO = new OrderDetailsDAO();
        foreach($cartItems as $id=>$quantity){            
            $product = $productDAO->findProductById($id, $conn);
            $details = new OrderDetials($product->getId(), $quantity, $product->getPrice(), $product->getDescription());
            $details->setOrders_id($orderid);
            
            $orderDetailsId = $orderDetailsDAO->insertOrderDetails($details, $conn);
            if($orderDetailsId == false || $orderDetailsId == null || !isset($orderDetailsId)){
                $conn->rollback();
                return "There was an processing the items in your cart.<br>Please try again later.<br>";   
            }
        }
        $conn->commit();
        $conn->close();
        return $orderid;
    }

    public function getOrderbyDateSortedByQuantity($date1, $date2){
        $conn = $this->database->getConnection();
        $ordersDAO = new OrderDAO();
        $results = $ordersDAO->getOrderbyDateSortedByQuantity($date1, $date2, $conn);
        $conn->close();
        return $results;
    }
    
    public function getOrderById(?int $id){
        $conn = $this->database->getConnection();
        $orderDAO = new OrderDAO();
        $result = $orderDAO->getOrderById($id, $conn);
        $conn->close();
        return $result;
    }
}
?>