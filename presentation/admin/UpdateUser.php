<?php
require_once "../../AutoLoader.php";
require_once "../shared/header.php";
require_once '../../_navbar.php';

$id = $_POST["userid"];
$firstname = $_POST["firstName"];
$lastname = $_POST["lastName"];
$username = $_POST["username"];
$role = $_POST["role"];

$user = new User($firstname, $lastname, $username, null, $role);
$user->setId($id);

$service = new UserService();
$service->updateUser($user);

?>