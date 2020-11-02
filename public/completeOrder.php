<?php 
require_once("../private/initialize.php"); 
session_start();
if ($_SESSION['user']['role'] != 1) {
    redirect_to('index.php');
}

else {
    updateOrderStatus($_GET["order_id"]);
    $_SESSION['message'] = "Order " . $_GET['order_id'] . " is completed";
    redirect_to('viewOrder.php');
}


?>