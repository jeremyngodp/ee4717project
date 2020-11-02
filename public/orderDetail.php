<?php require_once("../private/initialize.php"); 
    session_start();
    if(!isset($_SESSION['user'])){
        redirect_to('login.php');
    }

    else {
        if (!isset($_GET['order_id'])){
            redirect_to('order.php');
        }

        else {
            $result =findItemByOrderId ($_GET['order_id']);
        }
    }
?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <div class="box1"> <!-- for whole segment of menu -->
            <div class="box1content">
            <?php  
                if (!$result) {
                    echo '<p>Error retrieving order data. Please try again later!<p>';
                }

                else {
                    echo '<h2>Order Id: '. $_GET['order_id'] .'</h2>';
                  
                    echo '<table id="ordertable">';
                    echo '<tr>';
                    echo '<th>Item ID</th>';
                    echo '<th>Item Name</th>';
                    echo '<th>Price</th>';
                    echo '<th>Quantity</th>';
                    echo '</tr>';
                    $sum = 0; 
                    while ($item = $result->fetch_assoc()) { ?> 
                        <tr>
                            <td><?php echo $item['itemid'];?></td>
                            <td><?php echo $item['dish_name'];?></td>
                            <td><?php echo $item['price'];?></td>
                            <td><?php echo $item['quantity'];?></td>
                        </tr>
                    <?php 
                            $sum += $item['price'] * $item['quantity'];
                        }

                        echo '</table>';

                        echo "<h4>Total Amount: $" . $sum . "</h4>";
                        
                    } ?>
                    <?php $result = findOrderStatus($_GET['order_id']) -> fetch_assoc();
                    
                    if ($result['order_status'] == 0) { ?>
                            <a href="completeOrder.php?order_id=<?php echo $_GET['order_id'];?>">
                                    <button class="placeorder">Complete Order</button>
                                </a>
                    <?php } ?>   

                    <?php if ($_SESSION['user']['role'] == 0) {?>
                        <a href="order.php"><button class="placeorder">Back to Order List</button></a>
                    <?php } else if($_SESSION['user']['role'] == 1) { ?>
                        <a href="viewOrder.php"><button class="placeorder">Back to Order List</button></a>
                    <?php }?>

                    

            </div> <!-- box1 contents -->
        </div> <!-- box 1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>