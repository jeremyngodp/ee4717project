<?php 
    require_once("../private/initialize.php"); 
    // process to add order to the database
    // add  customer id to order (order.id is auto increment)
    // get back the order id after the query, to use for the next query
    // for every item in cart, add to orderitem (need order id and item and quantity)
    session_start();

    if (!isset($_SESSION['user'])) {
        $db->close();
        redirect_to('login.php');
    }

    else {
        if (!isset($_SESSION['cart'])) {
            $db->close();
            redirect_to('menu.php');
        }
    
        else{
            $user = $_SESSION['user'];
            $currentdate = date_format(date_create("Asia/Singapore"),"Y-m-d");
            $cart = $_SESSION['cart'];
            $itemPrice = $_SESSION['item-price'];
            $total_amount = 0;
            foreach ($cart as $id => $quantity){
                $total_amount += $quantity * $itemPrice[$id];
            }
    
    
            $order_id = addToOrder($user['id'], $total_amount, $currentdate); //Will extract user_id from session place here
            if($order_id != null) {
                addToOrderItem($order_id, $cart);
            }
    
            unset($_SESSION['cart']);
            unset($_SESSION ['item-name']);
            unset($_SESSION ['item-price']);
            $db->close();
    
            redirect_to('order.php');
        }
    }
    

    
?>