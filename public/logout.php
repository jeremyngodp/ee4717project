<?php require_once("../private/initialize.php"); 
session_start();
unset($_SESSION['user']);
unset($_SESSION['cart']);
unset($_SESSION['item-name']);
unset($_SESSION['item-quantity']);
redirect_to('index.php');
?>