<?php 
    require_once("../private/initialize.php"); 
    // process to add order to the database
    // add  customer id to order (order.id is auto increment)
    // get back the order id after the query, to use for the next query
    // for every item in cart, add to orderitem (need order id and item and quantity)
    session_start();

    if (!isset($_SESSION['cart'])) {
        redirect_to('menu.php');
    }

    else{
        $cart = $_SESSION['cart'];
        $itemPrice = $_SESSION['item-price'];
        $total_amount = 0;
        
        foreach ($cart as $id => $quantity){
            $total_amount += $quantity * $itemPrice[$id];
        }

        $order_id = addToOrder(1, $total_amount); //Will extract user_id from session place here
        addToOrderItem($order_id, $cart);
        redirect_to('order.php');
    }
?>