<?php require_once("../private/initialize.php"); 
    session_start();
    if($_SESSION['user']['role'] != 1){
        redirect_to('menu.php'); 
    }

    else {
        $allContacts = findAllContact();
    }
?>

<?php include( SHARED_PATH . "/public_header.php"); ?>

    <div class="wrapper">
        <div class="box1">
            <div class="box1content">

                <h1>View All Messages</h1>

                <?php if ($allContacts->num_rows == 0 ) { ?>
                    <h3>No messages received.</h3>
                <?php } else { ?>
                <div>
                    <table id="messagetable">
                        <tr>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Contact Number</th>
                            <th id="message">Message</th>
                            <th>Date Received</th>
                        </tr>
                        
                        <?php while ($contacts = $allContacts->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $contacts['name']; ?></td>
                            <td><?php echo $contacts['email']; ?></td>
                            <td><?php echo $contacts['contactno']; ?></td>
                            <td><?php echo $contacts['message']; ?></td>
                            <td><?php echo $contacts['currentdate']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php } ?>
            </div> <!-- box1 content -->
        </div> <!-- box1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>