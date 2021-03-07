<?php

//require_once '../../database/RegistrationDAO.php';
require_once '../../AutoLoader.php';

class RegistrationService {
    
    public function doesUserExist(?User $user){
        $dao = new RegistrationDAO();
        $results = $dao->doesUserExist($user);
        return $results;
    }
    
    public function AddUser(?User $user, ?Address $address){
        $dao = new RegistrationDAO();
        $results = $dao->AddUser($user, $address);
        return $results;
    }
}
?>