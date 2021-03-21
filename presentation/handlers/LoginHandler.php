<?php

require_once '../shared/header.php';
//require_once '../../businessService/SecurityService.php';
require_once '../../AutoLoader.php';


$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];
$service = new SecurityService();

$userid = $service->Authenticate($username, $password);

if($username != null && $password != null && $userid > 0){
    $_SESSION['principal'] = true;
    $_SESSION['userid'] = $userid;
    header("Location: ProductSearchHandler.php");
} else {
    $_SESSION['principal'] = false;
    include "../login/LoginFailure.php";
}

?>