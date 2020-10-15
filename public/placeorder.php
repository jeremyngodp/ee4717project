<?php 
require_once("../private/initialize.php"); 
session_start();

if (!isset($_SESSION['cart'])) {
    redirect_to('menu.php');
}

else {
    addOrder($_SESSION['cart'], 'user@email.com');
    unset($_SESSION['cart']);
    redirect_to('menu.php'); // should be order summary page but I have not include.
}

?>