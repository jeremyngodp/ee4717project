<?php 
    require_once("../private/initialize.php"); 
    session_start();
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $order_history =  findAllOrderByUser($current_user['id']);
    }
?>

<?php include( SHARED_PATH . "/public_header.php"); ?>

<div class="box1">
            <div class="box1content">
    <?php if(isset($order_history)) {?>
        <h1>Order History</h1>
        <?php if ($order_history->num_rows == 0 ) { ?>
        <h3>You have no order yet. <a href='menu.php'>Order Here !</a></h3>
        <?php } else { ?>
        <div>
            <table id="ordertable">
                <tr>
                    <th>Order ID</th>
                    <th>Date Ordered</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>More Details</th>
                </tr>
                
                <?php while ($order = $order_history->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['date']; ?></td>
                    <td><?php echo ($order['status']==1? "fulfilled":"not fullfilled"); ?></td>
                    <td><?php echo $order['amount']; ?></td>
                    <td><a href="#">View More<a></td> 
                <tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>
        
    <?php } else { ?>
        <h3> You are not logged in yet!</h3>
        <h3><a href="login.php">Login to See Your Order</a></h3>
    <?php } ?>                    
</div> <!-- box1 content -->
</div> <!-- box1 -->

<?php include(SHARED_PATH . "/public_footer.php"); ?>