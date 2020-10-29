<?php require_once("../private/initialize.php"); 
    session_start();
    if($_SESSION['user']['role'] != 1){
        redirect_to('menu.php'); 
    }

    else {
        $allOrders = findAllOrder();
    }
?>

<?php include( SHARED_PATH . "/public_header.php"); ?>

    <div class="wrapper">
        <div class="box1">
            <div class="box1content">
                <?php if ($allOrders->num_rows == 0 ) { ?>
                    <h3>There has not been any order</h3>
                <?php } else { ?>
                <div>
                    <table id="ordertable">
                        <tr>
                            <th>Customer ID</th>
                            <th>Order ID</th>
                            <th>Date Ordered</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>More Details</th>
                        </tr>
                        
                        <?php while ($order = $allOrders->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $order['customer_id']; ?></td>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><?php echo ($order['status']==1? "fulfilled":"not fullfilled"); ?></td>
                            <td><?php echo $order['amount']; ?></td>
                            <td><a href=<?php echo '"orderDetail.php?order_id='. $order['id'] .'"';?> >View More<a></td> 
                        <tr>
                        <?php } ?>
                    </table>
                </div>
                <?php } ?>
            </div> <!-- box1 content -->
        </div> <!-- box1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>