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

    public function updateProduct(?Product $product){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "update products set PRODUCTNAME = ?, DESCRIPTION = ?, PRICE = ?, IMAGE = ? WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssdbi', $product->getName(), $product->getDescription(), $product->getPrice(), $product->getImage(), $product->getId());
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            echo "The product " . $product->getName() . " has successfully been updated.<br>";
        } else {
            echo "There was an issue updating the product " . $product->getName() . "<br>";
        }
    }

    public function deleteProduct(?int $id, ?string $productName){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "delete from products where id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            echo "The product " . $productName . " was successfully deleted.<br>";
        } else {
            echo "The product " . $productName . " was not successfully deleted. Please try again later.<br>";
        }
    }

    public function addProduct(?Product $product){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "insert into products (ID, PRODUCTNAME, DESCRIPTION, PRICE, IMAGE) VALUES (null, ?, ?,?, null)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssd', $product->getName(), $product->getDescription(), $product->getPrice());
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            echo $product->getName() . " has successfully been added to the database.<br>";
        } else {
            echo "The product was not successfully added to the database. Please try again.<br>";
        }
    }
}

?>