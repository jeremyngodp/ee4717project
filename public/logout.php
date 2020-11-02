<?php require_once("../private/initialize.php"); 
session_start();
if(!isset($_SESSION['user'])) {
    redirect_to ('login.php');
}

else {
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
    unset($_SESSION['item-name']);
    unset($_SESSION['item-quantity']);
    redirect_to('index.php');
}
?>