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
            <!-- You can add dummy data to populate the table here --> 
        <table>
    </div>

</div>

<?php include(SHARED_PATH . "/public_footer.php"); ?>