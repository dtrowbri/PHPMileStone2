<?php

echo "require<br>";
require_once '/businessService/ProductService.php';

//$dao = new ProductDAO();
$dao = new ProductService();

$results = $dao->getProductsBySearch("");
//$results = $dao->getSearchResults("oil");


foreach($results as $r){
    echo "id: " . $r->getId() . " ";
    echo "name: " . $r->getName() . " ";
    echo "description: " . $r->getDescription() . " ";
    echo "price: " . $r->getPrice() ;
    //echo "base encoded: " . base64_encode($r->getImage());
    //echo '<img src = "data:image/png;base64,' . base64_encode($r->getImage()) . '" width = "50px" height = "50px"/>';
    echo '<img src="'. $r->getImage() . '" heigth="50px" width="50px"/>';
}

/*$testarr = array("orange", "banana");
array_push($testarr, "apple", "raspberry");
foreach($testarr as $test){
    echo $test . "<br>";
}#/

echo "finished";
?>