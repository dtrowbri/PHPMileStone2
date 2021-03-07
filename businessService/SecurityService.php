<?php

require_once '../../database/SecurityDAO.php';

class SecurityService {
    
    public function Authenticate(?string $username, ?string $password){
        $dao = new SecurityDAO();
        $results = $dao->Authenticate($username, $password);
        return $results;
    }
}

?>