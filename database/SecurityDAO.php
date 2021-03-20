<?php
//require_once '../../database/database.php';
require_once '../../AutoLoader.php';

class SecurityDAO {
    
    public function Authenticate(?string $username, ?string $password){
        $database = new database();
        $conn = $database->getConnection();
       
        $authenticationQuery = "select id from users where username like ? and password like ?";
        $stmt = $conn->prepare($authenticationQuery);
        $stmt->bind_param('ss', $username, $password);
        
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        if($results->num_rows != 1){
            return -1;
        } else {
            $results = $results->fetch_assoc();
            return $results["id"];
        }
    }
}