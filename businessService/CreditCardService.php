<?php

require_once "../../AutoLoader.php";

class CreditCardService {
    
    private $database;
    
    public function CreditCardService(){
        $this->database = new database();
    }
    
    public function addCreditCard(?CreditCard $creditcard){           
        $conn = $this->database->getConnection();
        $creditCardDAO = new CreditCardDAO();
        $results = $creditCardDAO->addCreditCard($creditcard, $conn);
        $conn->close();
        return $results;
    }
    
    public function getCreditCardsByUserId(?int $userid){
        $conn = $this->database->getConnection();
        $creditCardDAO = new CreditCardDAO();
        $creditcards = $creditCardDAO->getCreditCardsByUserId($userid, $conn);
        $conn->close();
        return $creditcards;
    }
}

?>