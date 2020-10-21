<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Yum Yum Bakery!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
 
    </head>


<?php require_once("../private/initialize.php"); ?>


<body>
<div class="wrapper">
    <?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="box1">
        <div class="box1content">
            <img src="media/bakery.jpg" height="200px" id="floatright">
        <h1>Welcome to Yum Yum Bakery!</h1>
        
        <p>Hello, we are Yum Yum Bakery, a small bakery launched in 2020. </p>
        <h3>What We Cater</h3>
        <p>We have a selection of fresh pastries and baked goods, ranging from iced cookies and afternoon tea to birthday and anniversary cakes, perfect for any celebration and party.</p><br>

        </div> <!-- box1content -->
    </div> <!-- box1 -->

    <div class="box2">
        <div class="box2content">
        <h2> How to Order </h2>
        
            <dl>
                <dt>One</dt>
                <dd>Head to the menu icon and add the item you would like to order to your cart.</p>
                <dt>Two</dt>
                <dd>Proceed to your cart and double confirm your list before submission of order.</p>
                <dt>Three</dt>
                <dd>Our team will process your order and email you once it is confirmed.</p>
                <dt>Four</dt>
                <dd>You may check your order again in the order tab. Please contact us if you have any further enquiries!</p>
                <!-- Can add more step if needed -->
            </dl>
        </dd>
            
    </div> <!-- box2content -->
    </div> <!-- box2 -->
    
        <?php include(SHARED_PATH . "/public_footer.php"); ?>
</div>




</body>
</html>