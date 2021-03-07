<?php
namespace businessService\models;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $username;
    private $role;
    private $password;
    
    public function __construct(?string $firstname, ?string $lastname, ?string $username, ?string $password){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
    }
 
    public function getId()
    {
        return $this->id;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }


    public function getLastname()
    {
        return $this->lastname;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }


    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }


    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function setRole($role)
    {
        $this->role = $role;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
}

?>