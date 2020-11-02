<?php require_once("../private/initialize.php"); 
    session_start();
?>

<body>

    <?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <div class="backgroundimage">
            <div class="imagecontent">
            <h1>Welcome to Yum Yum Bakery!</h1>
            <p>Hello, we are Yum Yum Bakery, a small bakery launched in 2020. </p>
            <h2>What We Cater</h2>
            <p>We have a selection of fresh pastries and baked goods, ranging from iced cookies and afternoon tea to birthday and anniversary cakes, perfect for any celebration and party.</p><br>

            </div> <!-- imagecontent -->
        </div> <!-- bakeryimage -->

        <div class="box2">
            <div class="box2content">
                <h2>Navigation</h2>
                <div class="indexcolumn">
                <a href="menu.php"><img src="css/cake.png" alt="Cake" id="center"></a>
                <h3>One</h3>
                <p>
                Head to our ever-changing menu and add the dessert you would like to order to your cart.</p></div>

                <div class="indexcolumn">
                <a href="cart.php"><img src="css/cart.png" alt="Cart" id="center"></a>
                <h3>Two</h3>
                <p>Proceed to your cart and double confirm your list before submission of order.</p></div>

                <div class="indexcolumn">
                <a href="contact.php"><img src="css/happy.png" alt="Happy" id="center"></a>
                <h3>Three</h3>
                <p>Our team will process your order and email you once it is confirmed. Otherwise, you can also contact us for any enquiries!</p></div>
                

            
                
                
            </div> <!-- box2content -->
        </div> <!-- box2 -->
    </div> <!-- wrapper -->
    
<?php include(SHARED_PATH . "/public_footer.php"); ?>
