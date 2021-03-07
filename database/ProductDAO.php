<?php

//require_once "database.php";
require_once "AutoLoader.php";

class ProductDAO
{
    public function getAllProducts(){
        $database = new database();
        $conn = $database->getConnection();
        
        $productQuery = "SELECT `ID`, `PRODUCTNAME`, `DESCRIPTION`, `PRICE` FROM `products`";
        $stmt = $conn->prepare($productQuery);
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $products = array();
            
            $results = $results->fetch_all();

            foreach($results as $r){
                $product = new Product($r[0],$r[1], $r[2], $r[3]);
                array_push($products, $product);
            }
                      
            return $products;
        }
    }
}

?>