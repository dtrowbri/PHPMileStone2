<?php
require_once '../../AutoLoader.php';

class UserDAO
{
    public function getAllUsers(){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "select ID, FIRSTNAME, LASTNAME, USERNAME, ROLE, PASSWORD from users";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->get_result();
        
        if($results->num_rows){
            $usersarray = array();
            $results = $results->fetch_all();
            
            foreach($results as $row){
                $user = new User($row[1], $row[2], $row[3], $row[5], $row[4]);
                $user->setId($row[0]);
                $user->setRole($row[4]);
                array_push($usersarray, $user);
            }
            
            return $usersarray;            
        } else {
            echo "No users found or an error occured on the database";
        }
    }
    
    public function updateUser(?User $user){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "update users set FIRSTNAME = ?, LASTNAME = ?, ROLE = ?, USERNAME = ? WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssisi', $user->getFirstname(), $user->getLastname(), $user->getRole(), $user->getUsername(), $user->getId());
        $stmt->execute();

        if($stmt->affected_rows == 1){
            echo "User " . $user->getUsername() . " has been updated successfully.<br>";
        } else {
            echo "There was an error updating user " . $user->getUsername() . ". Please try again later.<br>";
        }
    }
    
    public function deleteUser(?int $id, ?string $username){
        $database = new database();
        $conn = $database->getConnection();
        
        $query = "delete from users where id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            echo "User: " . $username . " with id " . $id . " has successfully been deleted.<br>";
        }else {
            echo "User: " . $username . " was not successfully deleted. Please try again.";
        }
    }
}

?>