<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Yum Yum Bakery!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="javascript/validateform.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <header>
                <div class="container">
                        
                    <a href="index.php"><img src="media/logo.png" alt="Yum Yum Bakery!" class="logo"></a>
                    
                    <nav class="side">
                        <a href="menu.php"> <img src="media/menu.png" alt="Menu" class="icons"><br> Menu</a> <!-- https://www.flaticon.com/free-icon/menu_151409?term=menu&page=2&position=67 -->
                        <?php if($_SESSION['user']['role'] == 0 || !isset($_SESSION['user'])){ ?>
                            <a href="order.php"> <img src="media/cookies.png" alt="Order" class="icons"><br> Order</a> <!-- https://www.flaticon.com/free-icon/cookies_3637351?term=bakery&page=1&position=4 -->    
                            <a href="cart.php"> <img src="media/cart.png" alt="Cart" class="icons"><br> Cart</a><!-- https://www.flaticon.com/free-icon/shopping-cart_1051037?term=cart&page=1&position=15 -->
                            <a href="contact.php"> <img src="media/call.png" alt="Contact" class="icons"><br> Contact</a> <!-- https://www.flaticon.com/free-icon/phone-call_785869?term=call&page=1&position=22 -->
                        <?php } else if ($_SESSION['user']['role'] == 1) {  ?>
                            <a href="viewOrder.php"> <img src="media/cookies.png" alt="Order" class="icons"><br>View Orders</a>
                            <a href="saleReport.php"> <img src="media/cart.png" alt="Sale Report" class="icons"><br>Sale Report</a>
                            <a href="viewMessage.php"> <img src="media/call.png" alt="View Messages" class="icons"><br>View Messages</a>
                        <?php } ?>
                        
                        <?php if(!isset($_SESSION['user'])){
                                echo '<a href="login.php"><img src="media/user.png" alt="user" class="icons"><br>Log In</a>';
                            }
                            else {
                                echo '<a href="logout.php"><img src="media/user.png" alt="user" class="icons"><br>Log Out</a>';
                            }
                        ?>
                       

                       <!--  <input type="text" placeholder="Search...">  TODO: Insert search box --> 
                    
                    </nav>
                </div>
                <div>
                <?php echo display_session_message(); ?>
                </div>

            </header>
        </div>
        
