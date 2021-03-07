<?php

echo "require<br>";
require_once 'AutoLoader.php';

$dao = new ProductService();

$results = $dao->getAllProducts();


foreach($results as $r){
    echo "id: " . $r->getId() . " ";
    echo "name: " . $r->getName() . " ";
    echo "description: " . $r->getDescription() . " ";
    echo "price: " . $r->getPrice() . "<br>";
}

/*$testarr = array("orange", "banana");
array_push($testarr, "apple", "raspberry");
foreach($testarr as $test){
    echo $test . "<br>";
}#/

echo "finished";
?>