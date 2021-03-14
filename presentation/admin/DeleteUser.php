<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";

$id = $_POST["userId"];
$username = $_POST["username"];

$service = new UserService();
$service->deleteUser($id, $username);

?>