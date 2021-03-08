<?php

//require_once "database.php";
require_once "../../AutoLoader.php";

class ProductDAO
{
    public function getAllProducts(){
        $database = new database();
        $conn = $database->getConnection();
        
        $productQuery = "SELECT `ID`, `PRODUCTNAME`, `DESCRIPTION`, `PRICE`, `IMAGE` FROM `products`";
        $stmt = $conn->prepare($productQuery);
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $products = array();
            
            $results = $results->fetch_all();

            foreach($results as $r){
                $product = new Product($r[0],$r[1], $r[2], $r[3], $r[4]);
                array_push($products, $product);
            }
                      
            return $products;
        }
    }

    public function getSearchResults(?string $searchString){
        $database = new database();
        $conn = $database->getConnection();
        
        $searchQuery = "SELECT `ID`, `PRODUCTNAME`, `DESCRIPTION`, `PRICE`, `IMAGE` FROM `products` where PRODUCTNAME LIKE ? OR DESCRIPTION LIKE ?";
        $stmt = $conn->prepare($searchQuery);
        $searchString = "%" . $searchString . "%";
        $stmt->bind_param('ss', $searchString, $searchString);
        
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $products = array();
            
            $results = $results->fetch_all();
            
            foreach($results as $r){
                $product = new Product($r[0],$r[1], $r[2], $r[3], $r[4]);
                array_push($products, $product);
            }
            return $products;
        }
    }
}

?>