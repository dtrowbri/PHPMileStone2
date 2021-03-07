<?php

require_once '../../database/RegistrationDAO.php';

class RegistrationService {
    
    public function doesUserExist(?string $username){
        $dao = new RegistrationDAO();
        $results = $dao->doesUserExist($username);
        return $results;
    }
    
    public function AddUser(?string $firstname, ?string $lastname, ?string $username, ?string $password, ?string $street, ?string $city, ?string $state, ?string $zip){
        $dao = new RegistrationDAO();
        $results = $dao->AddUser($firstname, $lastname, $username, $password, $street, $city, $state, $zip);
        return $results;
    }
}
?>