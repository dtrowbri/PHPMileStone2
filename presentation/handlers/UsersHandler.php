<?php 
require_once "../shared/header.php";
include_once '../shared/AuthenticationCheck.php';

$service = new UserService();
$users = $service->getAllUsers();

echo '<div class="container">';
if(count($users) > 0){
    include("../admin/_UsersSearchResults.php");
} else {
    echo "No results found.<br>";
}
echo '</div>';

include_once '../../footer.php';
?>