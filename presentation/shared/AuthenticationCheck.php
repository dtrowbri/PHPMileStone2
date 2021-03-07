<?php

include_once '../shared/header.php';

if(isset($_SESSION['principal']) == false || $_SESSION['principal'] == null || $_SESSION['principal'] == false){
    header("Location: ../login/Login.html");
}
?>