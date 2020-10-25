<?php 
    require_once("../private/initialize.php"); 
    session_start();
    $order_history =  findAllOrderByUser($id)
?>

<?php include( SHARED_PATH . "/public_header.php"); ?>

<div class="wrapper">
    <h1>Order History</h1>
    <div>
        <table>
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
        <table>
    </div>

</div>

<?php include(SHARED_PATH . "/public_footer.php"); ?>