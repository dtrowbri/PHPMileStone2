<?php

require_once "AutoLoader.php";

class ProductService{
    
    public function getAllProducts(){
        $dao = new ProductDAO();
        $results = $dao->getAllProducts();
        return $results;
    }
    
}

?>