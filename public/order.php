<?php 
    require_once("../private/initialize.php"); 
    $order_history =  findAllOrderByUser($id)
?>

<?php include( SHARED_PATH . "/public_header.php"); ?>

<div>
    <h1>Order History</h1>
    <div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Items</th>
                <th>Date</th>
                <th>Status</th>
                <th>Amount</th>
            </tr>
            <?php for ($i = 0; $i < $order_history->num_rows; $i++) {
                $order = $order_history->fetch_assoc();

            }?>
        <table>
    </div>

</div>

<?php include(SHARED_PATH . "/public_footer.php"); ?>