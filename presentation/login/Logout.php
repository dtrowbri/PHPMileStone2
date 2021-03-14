<?php
session_destroy();
$_SESSION['principal'] = false;
include_once 'Login.php';
?>
