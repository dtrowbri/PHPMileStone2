<?php

require_once '../../AutoLoader.php';


class UserService
{
    
    public $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    
    public function getAllUsers(){
        $conn = $this->database->getConnection();
        $dao = new UserDAO();
        $users = $dao->getAllUsers($conn);
        $conn->close();
        return $users;
    }
 
    public function updateUser(?user $user){
        $conn = $this->database->getConnection();
        $dao = new UserDAO();
        $dao->updateUser($user, $conn);
        $conn->close();
    }
    
    public function deleteUser(?int $id, ?string $username){
        $conn = $this->database->getConnection();
        $dao = new UserDAO();
        $dao->deleteUser($id, $username, $conn);
        $conn->close();
    }
}

?>