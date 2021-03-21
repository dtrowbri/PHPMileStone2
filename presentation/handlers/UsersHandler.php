<?php 
require_once "../shared/header.php";
include_once '../shared/AuthenticationCheck.php';

$service = new UserService();
$users = $service->getAllUsers();

if(count($users) > 0){
    include("../admin/_UsersSearchResults.php");
} else {
    echo "No results found.<br>";
}
?>