<?php require_once("../private/initialize.php"); 
    session_start();
    if(isset($_SESSION['cart'])) {
        unset($_SESSION ['item-name']);
        unset($_SESSION ['item-price']);
        unset($_SESSION['cart']);
    }

    $db->close();

    redirect_to('cart.php');
?>