<?php

require_once "../../AutoLoader.php";

class ProductService{
    
    public function getAllProducts(){
        $dao = new ProductDAO();
        $results = $dao->getAllProducts();
        return $results;
    }
 
    public function getProductsBySearch(?string $searchString){
        $dao = new ProductDAO();
        $results = $dao->getSearchResults($searchString);
        return $results;
    }
    
    public function updateProduct(?Product $product){
        $dao = new ProductDAO();
        $dao->updateProduct($product);
    }
    
    public function deleteProduct(?int $id, ?string $productName){
        $dao = new ProductDAO();
        $dao->deleteProduct($id, $productName);
    }
}

?>