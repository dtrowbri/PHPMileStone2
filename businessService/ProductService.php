<?php

require_once "../../AutoLoader.php";

class ProductService{
    
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function getAllProducts(){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $results = $dao->getAllProducts($conn);
        $conn->close();
        return $results;
    }
 
    public function getProductsBySearch(?string $searchString){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $results = $dao->getSearchResults($searchString, $conn);
        $conn->close();
        return $results;
    }
    
    public function updateProduct(?Product $product){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $dao->updateProduct($product, $conn);
        $conn->close();
    }
    
    public function deleteProduct(?int $id, ?string $productName){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $dao->deleteProduct($id, $productName, $conn);
        $conn->close();
    }
    
    public function addProduct(?Product $product){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $dao->addProduct($product, $conn);
        $conn->close();
    }
    
    public function findProductById(?int $id){
        $conn = $this->database->getConnection();
        $dao = new ProductDAO();
        $product = $dao->findProductById($id, $conn);
        $conn->close();
        return $product;
    }
}

?>