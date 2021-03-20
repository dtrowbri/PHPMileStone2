<?php 
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
require_once '../../_navbar.php';

$service = new UserService();
$users = $service->getAllUsers();

if(count($users) > 0){
    include("../admin/_UsersSearchResults.php");
} else {
    echo "No results found.<br>";
}
?>