<?php

require_once '../shared/header.php';
require_once '../../businessService/SecurityService.php';

$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];
$service = new SecurityService();


if($username != null && $password != null && $service->Authenticate($username, $password)){
    $_SESSION['principal'] = true;
    include "../login/LoginSuccess.php";
} else {
    $_SESSION['principal'] = false;
    include "../login/LoginFailure.php";
}

?>