<?php 
require_once("../private/initialize.php"); 
session_start();

if (!isset($_SESSION['cart'])) {
    redirect_to('menu.php');
}

else {
   $cart = $_SESSION['cart'];
   $itemNameList =  $_SESSION['item-name'];
   $itemPriceList = $_SESSION['item-price'];
}

// foreach($itemNameList as $key => $value){
//     echo $key . " => " . $value . " => " . $cart[$key] . "<br/>";
// }

// foreach($cart as $id => $quantity){
//     echo $quantity * $itemPriceList[$id] .' <br/>';
// }
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Yum Yum Bakery!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>

    

    <div class="wrapper">
            <?php include( SHARED_PATH . "/public_header.php"); ?>
        <div class="box1">
            <div class="box1content">
        <h1>Your Cart</h1>
        <table id= "carttable">
            <tr>
                <th>Item</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            <?php foreach($itemNameList as $key => $value ) { ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
                <td>$ <?php echo $itemPriceList[$key]; ?></td>
                <td><?php echo $cart[$key];?></td>
                <td>$ <?php echo  $cart[$key] * $itemPriceList[$key] ;?></td>
            </tr>

            <?php }?>





            <!-- Add Dummy Data first -->
            
        </table> <br>
    
        <a href="#">
            <button class="placeorder">Place Order</button>
        </a>
    
</div> <!-- box1content -->
</div> <!-- box1 -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>
</div> <!-- wrapper -->
</html>

