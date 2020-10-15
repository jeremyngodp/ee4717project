<?php 
require_once("../private/initialize.php"); 
session_start();

if (!isset($_SESSION['cart'])) {
    redirect_to('menu.php');
}

else {
   $cart = $_SESSION['cart'];
   $itemNameList =  $_SESSION['item-id'];
}

?>

<?php include( SHARED_PATH . "/public_header.php"); ?>
    <h1>Your Cart</h1>

    <div>
        <table>
            <tr>
                <th>Item</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>

            <!-- Add Dummy Data first -->
            
        </table>
    </div>
    <div>
        <a href="#">
            <button>Place Order</button>
        </a>
    </div>
<?php include(SHARED_PATH . "/public_footer.php"); ?>