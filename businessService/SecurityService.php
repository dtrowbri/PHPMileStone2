<?php

//require_once '../../database/SecurityDAO.php';
require_once '../../AutoLoader.php';

class SecurityService {
    
    public function Authenticate(?string $username, ?string $password){
        $dao = new SecurityDAO();
        $results = $dao->Authenticate($username, $password);
        return $results;
    }
}

?>