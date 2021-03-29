<?php

require_once "../../AutoLoader.php";

class CreditCardDAO {
    
    public function addCreditCard(?CreditCard $creditcard, $conn){           
        $query = "insert into creditcards (ID, NAME_ON_CARD, CREDIT_CARD_NUMBER, EXPIRATION_DATE, CCV, USER_ID) values (null, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $creditcard->getName_On_Card(), $creditcard->getCredit_Card_Number(), $creditcard->getExpiration_Date(), $creditcard->getCcv(), $creditcard->getUser_id());
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            return $stmt->insert_id;
        } else {
            return -1;
        }
    }
    
    public function getCreditCardsByUserId(?int $userid, $conn){
        $query = "SELECT ID, NAME_ON_CARD, CREDIT_CARD_NUMBER, EXPIRATION_DATE, CCV, USER_ID FROM creditcards where USER_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows > 0){
            $creditCardArray = array();
            
            $results = $results->fetch_all();
            foreach($results as $result){
                $creditCard = new CreditCard($result[1], $result[2],  $result[3], $result[4], $result[5]);
                $creditCard->setId($result[0]);
                array_push($creditCardArray, $creditCard);
            }
            
            return $creditCardArray;
        }
    }
    
}

?>