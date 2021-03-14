<?php

require_once '../../AutoLoader.php';


class UserService
{
    
    public function getAllUsers(){
        $dao = new UserDAO();
        $users = $dao->getAllUsers();
        return $users;
    }
 
    public function updateUser(?user $user){
        $dao = new UserDAO();
        $dao->updateUser($user);
    }
    
    public function deleteUser(?int $id, ?string $username){
        $dao = new UserDAO();
        $dao->deleteUser($id, $username);
    }
}

?>