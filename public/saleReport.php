<?php require_once("../private/initialize.php"); 
    session_start();
    if($_SESSION['user']['role'] != 1){
        redirect_to('menu.php'); 
    }
    if($_POST['end'] && $_POST['start']) {
        $result =  saleByItemAndPeriod($_POST['start'], $_POST['end']);
    }
?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <div class="box1">
            <div class="box1content">
                <div>
                    <h3>Sale By Item</h3>
                    <?php 
                        $saleByItem = saleByItem();
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Item ID</th>';
                        echo '<th>Item Name</th>';
                        echo '<th>Quantity</th>';
                        echo '<th>Amount ($)</th>';
                        echo '</tr>'; 
                        if ($saleByItem->num_rows == 0){
                            echo "nothing To show";
                        }
                        while($item = $saleByItem->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $item['itemid'] .'</td>';
                            echo '<td>' . $item['dish_name'] .'</td>';
                            echo '<td>' . $item['amount_sold'] .'</td>';
                            echo '<td>' . $item['amount_sold'] * $item['price'] .'</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    ?>
                </div> 

                <div>
                    <h3>Sale By Item In Period</h3>
                    <form action="saleReport.php" method="post">
                        <label>Start (inclusive): </lable><input type="date" value="" name="start"><br/>
                        <label>End (inclusive): </lable><input type="date" value="" name="end"> <br/> 
                        <input type="submit" value="Search Period">
                    </form>
                    <?php
                        if($result->num_rows == 0) {
                            echo '<p>No sale report for this period</p>';
                        }

                        else {
                            echo '<table>';
                            echo '<tr>';
                            echo '<th>Item ID</th>';
                            echo '<th>Item Name</th>';
                            echo '<th>Quantity</th>';
                            echo '<th>Amount ($)</th>';
                            echo '</tr>'; 
                            
                            while($item = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $item['itemid'] .'</td>';
                                echo '<td>' . $item['dish_name'] .'</td>';
                                echo '<td>' . $item['qty'] .'</td>';
                                echo '<td>' . $item['qty'] * $item['price'] .'</td>';
                                echo '</tr>';
                            }
                        }
                        
                        echo '</table>';
                    ?>
                </div>
            </div> <!-- box1 content -->
        </div> <!-- box1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>