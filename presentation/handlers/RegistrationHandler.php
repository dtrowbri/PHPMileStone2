<?php

require_once "../shared/header.php";
require_once "../../businessService/RegistrationService.php";

$firstname = $_POST["firstNameInput"];
$lastname = $_POST["lastNameInput"];
$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];
$street = $_POST["streetInput"];
$city = $_POST["cityInput"];
$state = $_POST["stateInput"];
$zip = $_POST["zipInput"];

if($firstname == null || $lastname == null || $username == null || $password == null || $street == null || $city == null || $state == null || $zip == null){
    include "../register/registrationerror.php";
}

$service = new RegistrationService();

if($service->doesUserExist($username)){
    include "../register/UserAlreadyExists.php";
} else {
    $results = $service->AddUser($firstname, $lastname, $username, $password, $street, $city, $state, $zip);
    if($results == 0){
        echo "Failed to add user and address.";
    } elseif($results == 1){
        echo "Added user but failed to add the address.";
    } elseif($results == 2){
        echo "User and address have been added successfully";
    } else {
        echo "an unexpected error has occured.";
    }
}

?>